@extends("layouts.application")
@section("content")

  <div class="container">
  <div class="row">
  	<div class="col-md-10">
  	<center><img src="{{ asset('upload/image/'.$article->photo) }}" height="200"><h1>{!! $article->title !!}</h1></center>
    <p>{!! $article->content!!}</p>
    <i>By {!! $article->author !!}</i>
<br><br>
		<hr>
		<center><h3>Your Comments Goes Here!</h3></center>
@foreach ($comment as $comments)
		<div style="outline: 1px solid #74AD1B;">
		<h5>{!! $comments->user !!}</h5>
		<hr>
		<p>{!! $comments->content !!}</p>
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
			      {!! Form::textarea('content', null, array('class' => 'form-control', 'rows' => 10, 'autofocus' => 'true')) !!}
			      {!! $errors->first('content') !!}
			    </div>
			    <div class="clear"></div>
			  </div>

			  <div class="form-group">
		      {!! Form::label('user', 'UserName', array('class' => 'col-lg-3 control-label')) !!}
		      <div class="col-lg-9">
		        {!! Form::text('user', null, array('class' => 'form-control')) !!}
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