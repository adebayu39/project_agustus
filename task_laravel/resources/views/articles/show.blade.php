@extends("layouts.application")
@section("content")

  <div class="container">
  <div class="row">
  	<div class="col-md-10">
  	<center><img src="{{ asset('upload/image/'.$article->id.'/'.$article->photo) }}" height="200"><h1>{!! $article->title !!}</h1></center>
    <p>{!! $article->content!!}</p>
    <i>By {!! $article->author !!}</i>
    <hr>
		<center><h3>Comments Goes Here!</h3></center>
@foreach ($comments as $comment)
		<div style="outline: 1px solid #74AD1B; padding: 25px;">
		<h4><u><b>{!! $comment->user !!}</b></u></h4>
		<p>{!! $comment->content !!}</p>
		{!! Form::open(array('route' => array('comments.destroy', $article->id), 'method' => 'delete')) !!}
    {!! Form::submit('Delete', array('class' => 'btn btn-danger', "onclick" => "return confirm('are you sure?')")) !!}
    {!! Form::close() !!}</p>
		</div>
@endforeach

<hr>
    {!! Form::open(['url' => 'comments', 'class' => 'form-horizontal', 'role' => 'form']) !!}

		    <div class="form-group">
		      {!! Form::label('article_id', 'ID', array('class' => 'col-lg-3 control-label')) !!}
		      <div class="col-lg-9">
		    {!! Form::text('article_id', $value = $article->id, array('class' => 'form-control', 'readonly')) !!}
		      </div>

		      <div class="clear"></div>
		    </div>
    	
			  <div class="form-group">
			    {!! Form::label('content', 'Write Comments Here', array('class' => 'col-lg-3 control-label')) !!}
			    <div class="col-lg-9"> 
			      {!! Form::textarea('content', null, array('class' => 'form-control', 'rows' => 10)) !!}
			      {!! $errors->first('content') !!}
			    </div>
			    <div class="clear"></div>
			  </div>

			  <div class="form-group">
		      {!! Form::label('user', 'UserName', array('class' => 'col-lg-3 control-label')) !!}
		      <div class="col-lg-9">
		        {!! Form::text('user', $value = Auth::user()->name.' (Admin)'  , array('class' => 'form-control', 'readonly')) !!}
		      </div>
		      <div class="clear"></div>
		    </div>
			    
			  <div class="form-group">
		      <div class="col-lg-3"></div>
		      <div class="col-lg-9">
		        {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
		      </div>
		      <div class="clear"></div>
		    </div>
				

    {!! Form::close() !!}

  </div>
  </div>
  </div>

@stop