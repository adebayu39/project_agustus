<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function index(){
		    		$articles = Article::orderBy('id', 'DESC')->paginate(6);
		        return view ('welcome')
		            ->with('articles', $articles);
    }

    public function show($id){
        $article = Article::find($id);
        return view('guest_show')
            ->with('article', $article);
    }

    public function store(Request $request){
    				$add = new Comment();
            $add->comment = $request['comment'];
            $add->name = $request['name'];
            $add->save();
    }

}
