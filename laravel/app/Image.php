<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = 'images';

    public static function valid($id= '') {
    	return array(
    		'image' => 'required|image|mimes:png, jpg, jpeg, bmp, gif'),
    		'title' => 'required|min:6|uniques:images,title'($id ? ",$id": ''),
    		);
    }
}
