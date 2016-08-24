@extends("layouts.application")
@section("content")

  <div class="container">
  <div class="row">
  	<div class="col-md-10">
  	<center><img src="{{ asset('upload/image/'.$article->id.'/'.$article->photo) }}" height="200"><h1>{!! $article->title !!}</h1></center>
    <p>{!! $article->content!!}</p>
    <i>By {!! $article->author !!}</i>
  </div>
  </div>
  </div>

@stop