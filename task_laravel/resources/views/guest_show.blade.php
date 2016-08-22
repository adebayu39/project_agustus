@extends("layouts.application")
@section("content")

  <div class="container">
  <div class="row">
  	<div class="col-md-10">
  	<center><img src="{{ asset('upload/image/'.$article->photo) }}" height="200"><h1>{!! $article->title !!}</h1></center>
    <p>{!! $article->content!!}</p>
    <i>By {!! $article->author !!}</i>
<br><br>

    {!! Form::open(['url' => 'article/add', 'class' => 'form-horizontal', 'role' => 'form']) !!}
    	
			  <div class="form-group">
			    {!! Form::label('comment', 'Write Comments Here', array('class' => 'col-lg-9')) !!}
			      {!! Form::textarea('comment', null, array('class' => 'form-control', 'rows' => 10)) !!}
			      {!! $errors->first('comment') !!}
			    </div>
			    <div class="clear"></div>
			  </div>

				<div class="form-group">
			    <div class="col-lg-9">
			      {!! Form::submit('Add Comment', array('class' => 'btn btn-primary')) !!}
			    </div>
			    <div class="clear"></div>
			  </div>

    {!! Form::close() !!}
  </div>
  </div>
  </div>

@stop