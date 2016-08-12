<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

class ArticlesController extends  Controller
{
   function __construct(){

    }
    
    public function index(){
        $articles = Article::all();
        return view ('article.index')
            ->with('articles', $articles);
    }


    public function create(){
        return view('articles.create');
    }


    public function store(){
        $$validate = Validator::make($request->all(), Article::valid());
        if ($validate->fails()) {
            return back()
            ->withErrors($validate)
            ->withInput();
        } else {
            Article::create($request->all());
            Session::flash('notice', 'Success add article');
            return Redirect::to('articles');
        }
    }


    public function show($id){
        $articles = Article::find($id);
        return view('article.show')
            ->with('article', $articles);
    }


    public function edit($id){
        $articles = Article::find($id);
        return view('article.edit')
            ->with('article', $articles);
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
            Session::Flash('notoce', 'Success update article');
            return Redirect::to('articles');
        }
    }


    public function destroy($id){
        $article = Article::find($id);
        if ($article->delete()) {
            Session::flash('notice', 'Article success delet');
            return Redirect::to('articles');
        } else {
            Session::flash('error', 'Article fails delete');
            return Redirect::to('articles');
        }
    }
}
