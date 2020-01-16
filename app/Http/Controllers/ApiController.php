<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use App\Busine;
use App\User;
use App\Like;

class ApiController extends Controller
{
    public function index($user_id){
        $carousel = DB::table('busines as b')
                            ->select(
                                        'b.id', 'b.name', 'b.description', DB::raw("REPLACE(b.image, '\\\\', '/') as image"), 'b.range_id')
                            ->where('b.state', 1)->where('b.deleted_at', NULL)->where('b.image', '<>', NULL)
                            ->orderBy('b.range_id', 'DESC')
                            ->inRandomOrder()
                            ->limit(5)
                            ->get();

        $business = DB::table('busines as b')
                            ->select(
                                        'b.id', 'b.name', 'b.description', DB::raw("REPLACE(b.image, '\\\\', '/') as image"), 'b.range_id', 'b.views',
                                        DB::raw("(SELECT COUNT(l.id) FROM likes as l where l.busine_id = b.id and l.user_id = $user_id and l.deleted_at is null) as user_like")
                                    )
                            ->where('b.state', 1)->where('b.deleted_at', NULL)->where('b.image', '<>', NULL)
                            ->orderBy('b.range_id', 'DESC')
                            ->inRandomOrder()
                            // ->limit(5)
                            ->get();
        return response()->json(['carousel' => $carousel, 'business' => $business]);
    }
    
    public function company_favorites($user_id){

        $business = DB::table('busines as b')
                            ->join('likes as l', 'l.busine_id', 'b.id')
                            ->select('b.id', 'b.name', 'b.description', DB::raw("REPLACE(b.image, '\\\\', '/') as image"), 'b.range_id', 'b.views')
                            ->where('l.user_id', $user_id)->where('b.state', 1)->where('b.deleted_at', NULL)->where('b.image', '<>', NULL)->where('l.deleted_at', NULL)
                            ->orderBy('b.range_id', 'DESC')
                            ->orderBy('b.views', 'DESC')
                            ->get();
        return response()->json($business);
    }
    
    public function company_like($id, $user_id, $value){
        
        DB::beginTransaction();
        try {
            // Eliminar los datos anteriores para evitar que haya doble registro
            DB::table('likes')->where('busine_id', $id)->where('user_id', $user_id)->update(['deleted_at' => Carbon::now()]);
            
            // Si el valor es 1 (like) devolver que se eliminó el registro, sino agregar uno nuevo
            $res = [];
            if($value){
                $res = ['type' => 'info', 'title' => 'Eliminado de mis favoritos', 'message' => 'Se quitó la empresa de la lista de favoritos.', 'value' => 0];
            }else{
                Like::create(['busine_id' => $id, 'user_id' => $user_id]);
                $res = ['type' => 'success', 'title' => 'Añadido a favoritos', 'message' => 'Se agregó la empresa a la lista favoritos.', 'value' => 1];
            }

            DB::commit();
            return response()->json($res);
            
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['type' => 'error', 'title' => 'Error', 'message' => 'Ocurrio un error en el servidor.', 'value' => $value]);
        }
    }
    
    public function company($id){
        Busine::find($id)->increment('views', 1);
        $company = DB::table('busines as b')
                        ->join('categorias as c', 'c.id', 'b.categoria_id')
                        ->select(   'b.id', 'b.name', 'b.description', 'b.phone', 'b.addres', 'b.latitude', 'b.longitude', 'b.description_app', 'c.name as category',
                                    DB::raw("REPLACE(b.image, '\\\\', '/') as image"), 'b.views',
                                    DB::raw("REPLACE(b.images, '\\\\', '/') as images"))
                        ->where('b.state', 1)->where('b.deleted_at', NULL)->where('b.image', '<>', NULL)->where('b.images', '<>', NULL)
                        ->where('b.id', $id)->first();
        if($company){
            $company->images = json_decode(str_replace('//', '/',$company->images));
        }
        return response()->json(['company' => $company]);
    }
    
    
    // Login and Register
    public function login_social(Request $request)
    {
        DB::beginTransaction();
        try {
            $user_data = DB::table('users')->select('*')->where('email', $request->email)->first();
            // Si el correo ya está registrado
            if($user_data){
                $user = User::find($user_data->id);
                return response()->json($user);
            }
            
            $new_user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'avatar' => $request->avatar,
                'password' => Hash::make(str_random(10)),
            ]);
            
            $user = User::find($new_user->id);

            DB::commit();
            return response()->json($user);
            
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Ocurrio un error al obtener los datos de facebook']);
        }
    }
    
    public function profile_update(Request $request)
    {
        DB::beginTransaction();
        try {
            $mail_exist = DB::table('users')->select('id')->where('email', $request->email)->where('id', '<>', $request->id)->first();
            if($mail_exist){
                return response()->json(['error' => 1, 'title' => 'Email incorrecto', 'description' => 'El Email ingresado ya está registrado.']);
            }
            
            $user = User::findOrFail($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();

            DB::commit();
            return response()->json($user);
            
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 1, 'title' => 'Error inesperado', 'description' => 'Ocurrió un error en el servidor.']);
        }
    }
}
