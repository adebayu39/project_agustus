<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
//use Request;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function tampil(Request $request){
      //dd($requests);
      try {
        $articles = Article::paginate(3);
          if($request->ajax()) {
            if($request->keywords) {
              $articles = Article::where('title', 'like', '%'.$request->keywords.'%')
               ->orWhere('content', 'like', '%'.$request->keywords.'%')
               ->paginate(2);
                }
            $view = (String)view('_list')
             ->with('articles', $articles)
             ->render();
            return response()->json(['view' => $view ]);
          } else {
            //$articles = Article::orderBy('id', 'DESC')->paginate(3);
            return view ('welcome')
             ->with('articles', $articles);
            }
      } catch (Exception $e) {
        dd($e);
      }
    }

    public function show($id){
        $article = Article::find($id);
        $comments = Article::find($id)->comments;
        return view('guest_show')
            ->with('article', $article)
            ->with('comment', $comments);
        //return view('guest_show')
          //  ->with('article', $article);
    }

}
