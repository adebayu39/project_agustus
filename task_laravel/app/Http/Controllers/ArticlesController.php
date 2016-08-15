<?php

namespace App\Http\Controllers;
//require 'venodor/autoload.php';
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use Validator, Session, Input, File;
use App\Http\Controllers\Redirect;
use Intervention\Image\ImageManager;
use App\Repositories\ImageRepository;



class ArticlesController extends  Controller
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
        $validate = Validator::make($request->all(), Article::valid());
        //$validate = Image::make($_FILE['image']['tmp_name']), Article::valid();
            if($validate->fails()) {
            return back()
            ->withErrors($validate)
            ->withInput();
        } else {
            Article::create($request->all());
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $path = public_path("/image/$name");
            Storage::put($path, File::get(getRealPath()));
            Session::flash('notice', 'Success add article');
            return redirect ('articles');
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
