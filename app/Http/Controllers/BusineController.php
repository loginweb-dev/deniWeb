<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

//requerido para la template de voyager
use TCG\Voyager\Facades\Voyager;

use Intervention\Image\ImageManagerStatic as Image;

use App\Categoria;
use App\Busine;
use App\SocialNetwork;
use App\Horario;

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
        $role_id = Auth::user()->role_id;
        $filtro = $role_id === 1 ? 1 : ' b.user_id = '.Auth::user()->id;
        $company = DB::table('busines as b')
                        ->select(
                                    'b.id', 'b.name', 'b.image', 'b.views', 'b.phone', 'b.addres', 'b.updated_at',
                                    DB::raw('(SELECT AVG(puntuacion) FROM starts where busine_id = b.id) as stars')
                                )
                        ->where('deleted_at', NULL)
                        ->whereRaw($filtro)
                        ->get();
        // dd($company);
        return view('backend.company.company_index', compact('company'));
    }

    public function negocios_view($id){
        $company = Busine::findOrFail($id);
        $redes = SocialNetwork::where('busine_id',$company->id)->where('deleted_at', NULL)->get();
        $horario = Horario::where('busine_id',$company->id)->where('deleted_at', NULL)->get();
        $categoria = Categoria::where('id', $company->categoria_id)->first();

        $categories = categoria::where('deleted_at', NULL)->get();
        return view('backend.company.company_view', compact('categories', 'company', 'redes', 'horario', 'categoria'));
    }

    public function negocios_create(){
        $categories = categoria::where('deleted_at', NULL)->get();
        return view('backend.company.company_create', compact('categories'));
    }

    public function negocios_store(Request $request){
        $company = new Busine;
        $company->categoria_id = $request->categoria_id;
        $company->name = $request->name;
        $company->phone = $request->phone;
        $company->site = $request->site;
        $company->description = $request->description;
        $company->addres = $request->addres;
        $company->state = 1;
        $company->range_id = 1;
        $company->user_id = Auth::user()->id;

        $ubicacion = explode(',', $request->ubicacion);
        if(count($ubicacion)==2){
            $company->latitude = $ubicacion[0];
            $company->longitude = $ubicacion[1];   
        }

        $company->description_long = $request->description_long;
        $company->description_app = $request->description_app;

        // Cambiar portada si se eligió un archivo
        Storage::makeDirectory('/public/busines/'.date('F').date('Y'));
        if($request->hasFile('imagen')) {
            try{
                $imagen = $this->save_image($request->file('imagen'));
                if($imagen){
                    $company->image = $imagen;
                }
            }catch (\Throwable $th) {
            }
        }
        // guardar galería imagenes si se agregó
        if($request->hasFile('imagenes')){
            try{
                $imagenes_aux = '';
                for ($i=0; $i < count($request->file('imagenes')); $i++) {
                    $imagenes_aux .= '"'.$this->save_image($request->file('imagenes')[$i]).'",';
                }
                $company->images = $imagenes_aux ?  "[".substr($imagenes_aux, 0, -1)."]" : NULL;
            }catch (\Throwable $th) {
            }
        }

        $company->save();

        if($company){
            // Agregar horarios
            for ($i=0; $i < count($request->hora_inicio1); $i++) { 
                if(!empty($request->hora_inicio1[$i]) || !empty($request->hora_final1[$i]) || !empty($request->hora_inicio2[$i]) || !empty($request->hora_final2[$i])){
                    Horario::create([
                        'busine_id' => $company->id,
                        'dia' => $i+1,
                        'hora_inicio1' => $request->hora_inicio1[$i],
                        'hora_final1' => $request->hora_final1[$i],
                        'hora_inicio2' => $request->hora_inicio2[$i],
                        'hora_final2' => $request->hora_final2[$i]
                    ]);
                }
            }

            // Agregar redes sociales
            for ($i=0; $i < count($request->link_social); $i++) { 
                if(!empty($request->link_social[$i])){
                    SocialNetwork::create([
                        'busine_id' => $company->id,
                        'link' => $request->link_social[$i],
                        'icon' => $request->icon_social[$i]
                    ]);
                }
            }
        }

        if($company){
            return redirect()->route('negocios_index')->with(['message' => 'Datos guardados exitosamenete.', 'alert-type' => 'success']);
        }else{
            return redirect()->back()->with(['message' => 'Errro vuelva a intentarlo.', 'alert-type' => 'error']);
        }
    }

    public function negocios_update(Request $request){
        $company = Busine::findOrFail($request->id);
        $company->categoria_id = $request->categoria_id;
        $company->name = $request->name;
        $company->phone = $request->phone;
        $company->site = $request->site;
        $company->description = $request->description;
        $company->addres = $request->addres;

        $ubicacion = explode(',', $request->ubicacion);
        if(count($ubicacion)==2){
            $company->latitude = $ubicacion[0];
            $company->longitude = $ubicacion[1];   
        }

        $company->description_long = $request->description_long;
        $company->description_app = $request->description_app;

        // Cambiar portada si se eligió un archivo
        if($request->hasFile('imagen')) {
            Storage::makeDirectory('/public/busines/'.date('F').date('Y'));
            try{
                $imagen = $this->save_image($request->file('imagen'));
                if($imagen){
                    $company->image = $imagen;
                }
            }catch (\Throwable $th) {
            }
        }

        $company->save();

        // Agregar horarios
        DB::table('horarios')->where('busine_id', $request->id)->update(['deleted_at' => Carbon::now()]);
        for ($i=0; $i < count($request->hora_inicio1); $i++) { 
            if(!empty($request->hora_inicio1[$i]) || !empty($request->hora_final1[$i]) || !empty($request->hora_inicio2[$i]) || !empty($request->hora_final2[$i])){
                Horario::create([
                    'busine_id' => $company->id,
                    'dia' => $i+1,
                    'hora_inicio1' => $request->hora_inicio1[$i],
                    'hora_final1' => $request->hora_final1[$i],
                    'hora_inicio2' => $request->hora_inicio2[$i],
                    'hora_final2' => $request->hora_final2[$i]
                ]);
            }
        }

        // Agregar redes sociales
        DB::table('social_networks')->where('busine_id', $request->id)->update(['deleted_at' => Carbon::now()]);
        for ($i=0; $i < count($request->link_social); $i++) { 
            if(!empty($request->link_social[$i])){
                SocialNetwork::create([
                    'busine_id' => $company->id,
                    'link' => $request->link_social[$i],
                    'icon' => $request->icon_social[$i]
                ]);
            }
        }

        return redirect()->route('negocios_index')->with(['message' => 'Información actualizada exitosamenete.', 'alert-type' => 'success']);
    }

    public function list_images($id){
        $company = Busine::findOrFail($id);
        $company_images = $company->images ? json_decode($company->images) : [];
        return view('backend.company.partials.company_images', compact('company_images', 'id'));
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

    public function remove_images(Request $request){
        try{
            $company = Busine::findOrFail($request->id);
            $company_images = $company->images ? json_decode($company->images) : [];


            if(count($company_images)){
                $imagenes = '';
                foreach($company_images as $item){
                    if($item != $request->imagen){
                        $imagenes .= '"'.$item.'",';
                    }
                }
                $company->images = '['.substr($imagenes,0,-1).']';
                $company->save();
            }
            return 1;
        }catch (\Throwable $th) {
            return 0;
        }
    }

    public function save_image($file){
        try{
            $base_name = str_random(20);
            // imagen normal
            $filename = $base_name.'.'.$file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath())->orientate();
            $image_resize->resize(1024, null, function ($constraint) {
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

            // imagen facebook
            $filename_fb = $base_name.'_facebook.'.$file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath())->orientate();
            $image_resize->resizeCanvas(1000, 523);
            $path_fb =  'busines/'.date('F').date('Y').'/'.$filename_fb;
            $image_resize->save(public_path('../storage/app/public/'.$path_fb));
            
            return $path;

        }catch (\Throwable $th) {
            return 0;
        }
    }
}


