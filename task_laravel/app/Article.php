<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable =[
    	'title', 'content', 'author', 'photo'
    ];

    public static function valid($id='') {
      return array(
        'title' => 'required|min:10|unique:articles,title'.($id ? ",$id" : ''),
        'content' => 'required|min:100|unique:articles,content'.($id ? ",$id" : ''),
        'photo' => 'required|image|mimes:png,jpg,jpeg,gif,bmp',
        'author' => 'required',
      );
    }

    public function comments() {
      return $this->hasMany('App\Comment', 'article_id');
    }


    public static function excel() {
      Excel::create('Article', function ($excel) {
        $excel->sheet('Articles', function ($sheet) {

          // first row styling and writing content
          $sheet->mergeCells('A1:W1');
          $sheet->row(1, function ($row) {
              $row->setFontFamily('Arial');
              $row->setFontSize(30);
          });

          $sheet->row(1, array('Some big header here'));

          // second row styling and writing content
          $sheet->row(2, function ($row) {

              // call cell manipulation methods
              $row->setFontFamily('Arial');
              $row->setFontSize(15);
              $row->setFontWeight('bold');

          });

          $sheet->row(2, array('Something else here'));

          // getting data to display - in my case only one record
          $articles = Article::get()->toArray();

          // setting column names for data - you can of course set it manually
          $sheet->appendRow(array_keys($articles[0])); // column names

          // getting last row number (the one we already filled and setting it to bold
          $sheet->row($sheet->getHighestRow(), function ($row) {
              $row->setFontWeight('bold');
          });

          // putting users data as next rows
          foreach ($articles as $article) {
              $sheet->appendRow($article);
          }

        });

      })->export('csv');

    }
  

   
}
