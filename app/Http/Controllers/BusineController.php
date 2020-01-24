<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

//requerido para la template de voyager
use TCG\Voyager\Facades\Voyager;

use Intervention\Image\ImageManagerStatic as Image;

use App\Busine;

class BusineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataType = Voyager::model('DataType')->where('slug', '=', 'busines')->first();
        $this->authorize('browse', app($dataType->model_name));
        $dataTypeContent = Busine::paginate(6);
        return view('backend.index',compact('dataType','dataTypeContent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // =====================================================

    public function negocios_index(){
        $company = Busine::where('deleted_at', NULL)->where('user_id', Auth::user()->id)->get();
        return view('backend.company.company_index', compact('company'));
    }

    public function negocios_view($id){
        $company = Busine::findOrFail($id);
        return view('backend.company.company_view', compact('company'));
    }

    public function negocios_update(Request $request){
        $company = Busine::findOrFail($request->id);
        $company->name = $request->name;
        $company->phone = $request->phone;
        $company->site = $request->site;
        $company->description = $request->description;
        $company->addres = $request->addres;

        $ubicacion = explode(',', $request->ubicacion);
        $company->latitude = $ubicacion[0];
        $company->longitude = $ubicacion[1];

        $company->description_long = $request->description_long;
        $company->description_app = $request->description_app;

        // Cambiar portada si se eligió un archivo
        if($request->hasFile('archivo')) {
            Storage::makeDirectory('/public/busines/'.date('F').date('Y'));
            try{
                $imagen = $this->save_image($request->file('archivo'));
                if($imagen){
                    $company->image = $imagen;
                }
            }catch (\Throwable $th) {
            }
        }

        $company->save();

        return redirect()->route('negocios_index')->with(['message' => 'Información actualizada exitosamenete.', 'alert-type' => 'success']);
    }

    public function list_images($id){
        $company = Busine::findOrFail($id);
        $company_images = $company->images ? json_decode($company->images) : [];
        return view('backend.company.partials.company_images', compact('company_images'));
    }

    public function add_images($id, Request $request){
        if($request->hasFile('file')) {
            Storage::makeDirectory('/public/busines/'.date('F').date('Y'));
            try{
                $company = Busine::findOrFail($id);
                $company_images = $company->images ? json_decode($company->images) : [];
                $imagen = $this->save_image($request->file('file'));

                if($imagen){
                    array_push($company_images, $imagen);
                    $imagenes = '';
                    foreach($company_images as $item){
                        $imagenes .= '"'.$item.'",';
                    }
                    $company->images = '['.substr($imagenes,0,-1).']';
                    $company->save();
                }
                return response()->json(['data'=>'success']);
            }catch (\Throwable $th) {
                return response()->json(['data'=>$th]);
            }
        }else{
            return response()->json(['error'=>"Archivo no válido"]);
        }
    }

    public function save_image($file){
        try{
            $base_name = str_random(20);
            // imagen normal
            $filename = $base_name.'.'.$file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath())->orientate();
            $image_resize->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $path =  'busines/'.date('F').date('Y').'/'.$filename;
            $image_resize->save(public_path('../storage/app/public/'.$path));

            // imagen mediana
            $filename_medium = $base_name.'_medium.'.$file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath())->orientate();
            $image_resize->resize(512, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $path_medium = 'busines/'.date('F').date('Y').'/'.$filename_medium;
            $image_resize->save(public_path('../storage/app/public/'.$path_medium));

            // imagen pequeña
            $filename_small = $base_name.'_small.'.$file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath())->orientate();
            $image_resize->resize(128, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $path_small = 'busines/'.date('F').date('Y').'/'.$filename_small;
            $image_resize->save(public_path('../storage/app/public/'.$path_small));
            
            return $path;

        }catch (\Throwable $th) {
            return 0;
        }
    }
}


