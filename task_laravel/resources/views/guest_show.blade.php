@extends("layouts.application")
@section("content")

  <div class="container">
  <div class="row">
  	<div class="col-md-10">
  	<center><img src="{{ asset('upload/image/'.$article->photo) }}" height="200"><h1>{!! $article->title !!}</h1></center>
    <p>{!! $article->content!!}</p>
    <i>By {!! $article->author !!}</i>
    <p>Add Comment Here</p>
    {!! Form::open(['url' => 'article', 'class' => 'form-horizontal', 'role' => 'form']) !!}
    	
    {!! Form::close() !!}
  </div>
  </div>
  </div>

@stop