<?php

namespace App\Http\Controllers;
//require 'vendor/autoload.php';
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use Validator, Session, Input, File, Image;
use App\Http\Controllers\Redirect;
use Intervention\Image\ImageManager;
use App\Repositories\ImageRepository;



class ArticlesController extends Controller
{
   function __construct(){

    }
    
    public function index(){
        $articles = Article::all();
        return view ('articles.index')
            ->with('articles', $articles);
    }


    public function create(){
        return view('articles.create');
    }


    public function store(Request $request){
        //dd($request->file('image'));
        
        $validate = Validator::make($request->all(), Article::valid());
        //$validate = Image::make($_FILE['image']['tmp_name']), Article::valid();
            if($validate->fails()) {
            return back()
            ->withErrors($validate)
            ->withInput();
        } else {
            try{
            $add = new Article();
            $add->title = $request['title'];
            $add->content = $request['content'];
            $add->author = $request['author'];
            $photo = $request->file('photo');
            $image_location = public_path().'/upload/image/';
            $name = $photo->getClientOriginalName();
            $request->file('photo')->move($image_location, $name);
            //dd($request->all());
            //$name_db = $photo->getFilename();
            $add->photo=$name;
            $add->save();
            
            //$request->save();
            //Article::create($request->all());
            if(!File::exists($image_location)){
              File::makeDirectory($image_location, $mode=0777, true, true);
            }
            //$img = Image::make($image);
            //$img->save($image_location, $name);            
            Session::flash('notice', 'Success add article');

            //$add->image = $name;
            return redirect ('articles');

          } catch(\Exception $e) {
            dd($e);
          }
  
      }

    }


    public function show($id){
        $article = Article::find($id);
        return view('articles.show')
            ->with('article', $article);
    }


    public function edit($id){
        $article = Article::find($id);
        return view('articles.edit')
            ->with('article', $article);
    }   


    public function update(Request $request, $id){
        $validate = Validator::make($request->all(), Article::valid($id));
        if ($validate->fails()){
            return back()
            ->withErrors($validate)
            ->withInput();
        } else {
            $article = Article::find($id);
            $article->update($request->all());
            Session::Flash('notice', 'Success update article');
            return redirect ('articles');
        }
    }


    public function destroy($id){
        $article = Article::find($id);
        if ($article->delete()) {
            Session::flash('notice', 'Article success delet');
            return redirect ('articles');
        } else {
            Session::flash('error', 'Article fails delete');
            return redirect ('articles');
        }
    }
}
