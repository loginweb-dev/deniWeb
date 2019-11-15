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
        //CONSULTAS ELOQUEN
        $busine=Busine::all();
        $category=Categoria::limit(7)
                ->where('deleted_at', null)
                ->orderBy('updated_at', 'desc')
                ->get();
        // return $category;
        return view('welcome',compact('busine','category'));
        
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

        $horario=Horario::where('busine_id',$detail->id)->first();
         //SEO Tools
         SEOTools::setTitle($detail->name);
         SEOTools::setDescription($detail->description);

        return view('company',compact('detail','redes','horario'));
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
    public function like($slug){
        $detail=Busine::where('slug', $slug)->first();
        // return $detail;
        // $var=Start::where('')
        $var=Start::where('user_id', Auth::user()->id)
                    ->where('busine_id', $detail->id)
                    ->first();
     if ($var) {
         return back();
     }else{
        Start::create([
            'puntuacion'=>1,
            'busine_id'=>$detail->id,
            'user_id'=>Auth::user()->id
        ]);
        return back();  
     }
        
    }
    
    public function search(Request $request)
    {
        //return $request->criterio;
        //SEO Tools
        SEOTools::setTitle(setting('site.title'));
        SEOTools::setDescription(setting('site.description'));
        //CONSULTAS ELOQUEN4
        $busine=Busine::where('name', 'like', '%'.$request->criterio.'%')->get();
        //return $busine;
        $category=Categoria::limit(7)
                ->where('deleted_at', null)
                ->orderBy('updated_at', 'desc')
                ->get();
        // return $category;
        return view('welcome',compact('busine','category'));
        
    }
    public function get_category(){

        $categoria=Categoria::all();
        $listacategoria=Busine::all();

        return view('category', compact('categoria','listacategoria'));

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
   
}
