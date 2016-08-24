<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;

class Comment extends Model
{
    
    protected $fillable =[
    	'user', 'content', 'article_id'
    ];

    public static function valid(){
    	return array(
    			'content' => 'required'
    		);
    }

    public function article() {
    return $this->belongsTo('App\Article', 'article_id');
  }
}
