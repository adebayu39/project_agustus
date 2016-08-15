<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
     protected $table = 'uploads';

     public static function valid($id='') {
      return array(
        'image' => 'required'.($id ? ",$id" : '')
      );
    }
    
}