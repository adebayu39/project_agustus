<?php

namespace App\Http\Controllers;
//require 'vendor/autoload.php';
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use App\Comment;
use Validator, Session, Input, File, Image, Storage, Excel;
use App\Http\Controllers\Redirect;
use Intervention\Image\ImageManager;
use App\Repositories\ImageRepository;



class ArticlesController extends Controller
{
   function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Request $request){
      /*$articles = Article::paginate(5);//->toJson();
      if ($request->ajax()) {
       $view = (String)view('articles._list')
          ->with('articles', $articles)
          ->render();
       return response()->json(['view' => $view ]);*/
      $articles = Article::paginate(5);
      if ($request->ajax()) {
      $articles = Article::orderBy('id', $request->direction)
       ->paginate(5);
      $request->direction == 'asc' ? $direction = 'desc' : $direction = 'asc';
      $view = (String)view('articles._list')
       ->with('articles', $articles)
       ->render();
      return response()->json(['view' => $view, 'direction' => $direction]);
      } else {
           return view ('articles.index')
          ->with('articles', $articles);
       }
    }

    public function create(){
        return view('articles.create');
    }


    public function store(Request $request){
        //dd($request->file('image'));
        
        $validate = Validator::make($request->all(), Article::valid());
        //$validate = Image::make($_FILE['image']['tmp_name']), Article::valid();
            if($validate->fails()) {
            return back()
            ->withErrors($validate)
            ->withInput();
        } else {
            try{
            $add = new Article();
            $add->title = $request['title'];
            $add->content = $request['content'];
            $add->author = $request['author'];
            $photo = $request->file('photo');
            $name = $photo->getClientOriginalName();
            $add->photo=$name;
            $add->save();
            $image_location = public_path().'/upload/image/'.$add->id;
            if(!File::exists($image_location)){
             File::makeDirectory($image_location, $mode=0777, true, true);
            }
            $request->file('photo')->move($image_location, $name);
            /*$path = $image_location.'/resize-'.$name;
            $img = Image::make($photo);
            $img->resize(200, null, function ($constraint) {
              $constraint->aspectRatio();
            });
            $img->save($path);*/
            Session::flash('notice', 'Success add article');
            return redirect ('articles');
          } catch(\Exception $e) {
            dd($e);
          }
  
      }

    }


    public function show($id){
        $article = Article::find($id);
        $comments = Article::find($id)->comments;
        return view('articles.show')
            ->with('article', $article)
            ->with('comments', $comments);
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
            $update = Article::where('id',$id)->first();
            $update->title = $request['title'];
            $update->content = $request['content'];
            $update->author = $request['author'];            
            if($request->file('photo') == ""){
                $update->photo = $update->photo;
            } else {
                $image_location = public_path().'/upload/image/'.$id.'/'.$update->photo;
                //unlink($image_location);
                $photo = $request->file('photo');
                $image_location = public_path().'/upload/image/'.$id;
                $name = $photo->getClientOriginalName();
                $request->file('photo')->move($image_location, $name);
                $update->photo = $name;  
            }
            
            $update->update();
            Session::Flash('notice', 'Success update article');
            return redirect ('articles');
        }
    }


    public function destroy($id){
        $article = Article::find($id);
        $image_location = public_path().'/upload/image/'.$id.'/'.$article->photo;
        //unlink($image_location);
        $dir = public_path().'/upload/image/'.$id;
        File::deleteDirectory($dir);
        $article->comments()->delete();
        if ($article->delete()) {
            Session::flash('notice', 'Article deleted');
            return redirect ('articles');
        } else {
            Session::flash('error', 'Article fails to delete');
            return redirect ('articles');
        }
    }








    
}
