<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Validator, Input, File, Session;
use App\Http\Requests;
use App\Http\Controllers\Redirect;
use Intervention\Image\ImageManager;
use App\Repositories\ImageRepository;


class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        return view ('images.index')
            ->with('images', $images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = new Image;
        $validate = Validator::make($request->all(), Image::valid());
        if($validate->fails()) {
            return back()
            ->withErrors($validate)
            ->withInput();
        } else {
            try{
                $image = $request->file('image');
                $name = $image->getClientOriginalName();
                $image_location = public_path().'upload/images'.$name;
                $request->file('image')->move($image_location, $name);
                if(!File::exists($image_location)){
                  File::makeDirectory($image_location, $mode=0777, true, true);
                }
                $img = Image::make($image);
                $img->save($image_location, $name);
                Session::flash('notice', 'Success add article');
                return redirect ('/');

            } catch(\Exception $e) {
                  dd($e);
              }
        }
                
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        if ($image->delete()) {
            Session::flash('notice', 'Image deleted');
            return redirect ('/');
        } else {
            Session::flash('error', 'Image fails to delete');
            return redirect ('/');
        }
    }
}

