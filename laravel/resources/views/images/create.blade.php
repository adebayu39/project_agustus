@extends("layouts.application")
@section("content")
{!! Form::open(['url' => '/', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
  <div class="form-group">
    {!! Form::label('title', 'Title', array('class' => 'col-lg-3 control-label')) !!}
    <div class="col-lg-9">
      {!! Form::text('title', null, array('class' => 'form-control', 'autofocus' => 'true')) !!}
      {!! $errors->first('title') !!}
    </div>
    <div class="clear"></div>
  </div>

  <div class="form-group">
    {!! Form::label('image', 'Upload Image', array('class' => 'col-lg-3 control-label')) !!}
    <div class="col-lg-9">
      {!! Form::file('image', null, array('class' => 'form-control')) !!}
      {!! $errors->first('image') !!}
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

@stop