<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//modelos
use App\Busine;
use App\SocialNetwork;
use App\Horario;
use App\Categoria;
use App\Start;
use App\Like;

use Artesaos\SEOTools\Facades\SEOTools;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //SEO Tools
        SEOTools::setTitle(setting('site.title'));
        SEOTools::setDescription(setting('site.description'));
        
        $categorias = DB::table('categorias as c')
                            ->select('c.*')
                            ->whereIn('c.id', function($q){
                                $q->select('categoria_id')->from('busines')->where('deleted_at', null);
                            })
                            ->where('c.deleted_at', NULL)->get();
        return view('index', compact('categorias'));
        
    }

    public function companies_list($orden, $categoria, $busqueda){
        switch ($orden) {
            case 'views':
                $ordering = "b.views DESC";
                break;
            case 'comments':
                $ordering = "comments DESC";
                break;
            case 'rating':
                $ordering = "rating DESC";
                break;
            default:
                $ordering = "b.name DESC";
                break;
        }

        $filtro_categoria = $categoria != 'all' ? "c.id = $categoria" : 1;
        $filtro_busqueda = $busqueda != 'all' ? "(b.name like '%$busqueda%' or c.name like '%$busqueda%')" : 1;
        
        $empresas = DB::table('busines as b')
                            ->join('categorias as c', 'c.id', 'b.categoria_id')
                            ->selectRaw("   b.id, b.name, b.image, b.slug, c.name as category,
                                            (select AVG(s.puntuacion) from starts s where s.busine_id = b.id) as rating,
                                            (select COUNT(co.id) from comments co where co.commentable_id = b.id) as comments
                                        ")
                            ->whereRaw($filtro_categoria)
                            ->whereRaw($filtro_busqueda)
                            ->where('b.deleted_at', NULL)
                            ->orderByRaw($ordering)
                            ->paginate(setting('site.paginador_lp'));
                            // dd($empresas);
        return view('companies_list', compact('empresas'));
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
    public function show($slug)
    {
        //CONSULTAS
        $detail=Busine::where('slug',$slug)->first();
        // return $detail;
        $redes=SocialNetwork::where('busine_id',$detail->id)->get();

        $horario = Horario::where('busine_id',$detail->id)->first();
        $categoria = Categoria::where('id', $detail->categoria_id)->first();
         //SEO Tools
         SEOTools::setTitle($detail->name);
         SEOTools::setDescription($detail->description);

        return view('company',compact('detail','redes','horario', 'categoria'));
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
    public function rating($slug, $rating, $request){
        $detail=Busine::where('slug', $slug)->first();
        $var=Start::where('user_id', Auth::user()->id)
                    ->where('busine_id', $detail->id)
                    ->first();
        if ($var) {
            if($request == 'ajax'){
                return response()->json(['icon' => 'warning', 'title' => 'Ya calificaste este negocio!']);
            }
            return redirect()->route('company', ['slug' => $slug])
                        ->with(['icon' => 'warning', 'title' => 'Ya calificaste este negocio!']);
        }

        Start::create([
            'puntuacion' => $rating ?? 1,
            'busine_id' => $detail->id,
            'user_id' => Auth::user()->id
        ]);
        if($request == 'ajax'){
            return response()->json(['icon' => 'success', 'title' => 'Gracias por calificarnos!']);
        }
        return redirect()->route('company', ['slug' => $slug])
                    ->with(['icon' => 'success', 'title' => 'Gracias por calificarnos!']);
    }

    public function like($slug, $request){
        $detail=Busine::where('slug', $slug)->first();
        $var=Like::where('user_id', Auth::user()->id)
                    ->where('busine_id', $detail->id)
                    ->first();
        if ($var) {
            if($request == 'ajax'){
                return response()->json(['icon' => 'warning', 'title' => 'Ya indicaste que te gusta este negocio!']);
            }
            return redirect()->route('company', ['slug' => $slug])
                        ->with(['icon' => 'warning', 'title' => 'Ya indicaste que te gusta este negocio!']);
        }

        Like::create([
            'busine_id' => $detail->id,
            'user_id' => Auth::user()->id
        ]);
        if($request == 'ajax'){
            return response()->json(['icon' => 'success', 'title' => 'Gracias por indicar que te gusta este negocio!']);
        }
        return redirect()->route('company', ['slug' => $slug])
                    ->with(['icon' => 'success', 'title' => 'Gracias por indicar que te gusta este negocio!']);
        
    }
    
    public function get_category(){

        $categoria=Categoria::all();
        $bussiness=Busine::all();

        return view('category', compact('categoria','bussiness'));

    }
    public function views($id){
        //obtener
         $view=Busine::find($id);
        $suma=$view->views + 1;
        $view->views=$suma;
        $view->save();
    }
    public function orderby($type){
        switch ($type) {
            case 'default':
            $categoria=Categoria::all();
            $listacategoria=Busine::all();
            return view('category', compact('categoria','listacategoria'));
                break;
            case 'popularity':
                $listacategoria=Busine::orderBy('views', 'desc')->get();
                $categoria=Categoria::all();
                return view('category', compact('categoria','listacategoria'));
                break;
            case 'comments':
                $listacategoria= DB::table('busines as b' )
                                //->join('comments as c', 'c.commentable_id', 'b.id')
                                ->select(DB::raw("b.*, (select count(c.id) from comments as c where c.commentable_id = b.id ) as comments"))
                                ->orderBy('comments', 'DESC')->get();
                //$count = DB::table('comments')->where('commentable_id', 5)->count();
                $categoria=Categoria::all();
                return view('category', compact('categoria','listacategoria'));
            
                break;
            default:
                # code...
                break;
        }
        
    }

    public function contact(){
        SEOTools::setTitle('LoginWeb');
        SEOTools::setDescription('Empresa de tecnología especializada en desarrollo de Hardware y Software');
        return view('contact');
    }
   
}
