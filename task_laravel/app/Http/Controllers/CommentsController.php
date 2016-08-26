<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Session;
use App\Comment;
use App\Article;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
      try {
      //dd(Comment::create($request->all()));  
        Comment::create($request->all());
        Session::flash('notice', 'Success add comment');
        return redirect ('article/'. $request->article_id);
      } catch (Exception $e) {
      	dd($e);
      }
    }


    public function destroy($id)
    {
      $comment = Comment::find($id);
      if ($comment->delete()) {
            Session::flash('notice', 'Article deleted');
            return redirect ('articles');
        } else {
            Session::flash('error', 'Article fails to delete');
            return redirect ('articles');
        }
    }

}
