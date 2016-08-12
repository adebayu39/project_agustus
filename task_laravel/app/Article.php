<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable =[
    	'title', 'content', 'author'
    ]

    public static function valid($id='') {
      return array(
        'title' => 'required|min:10|unique:articles,title'.($id ? ",$id" : ''),
        'content' => 'required|min:100|unique:articles,content'.($id ? ",$id" : ''),
        'author' => 'required'
      );
    }

    Article::create(['title' => 'laravel 5', 'content' => 'lorem ipsum dolor sir amet', 'author' => 'ade bayu martin']);

    Article::all()->orderBy('title', 'desc');

    $new_article = Article::find(1);
    $new_article->title = "Learn Laravel Edited";
    $new_article->


    Article::destroy(1);

}
