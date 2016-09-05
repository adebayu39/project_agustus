{!! Form::open(['url' => 'postImport', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data', 'method' => 'POST']) !!}

  <div class="form-group">
    {!! Form::label('import', 'Import File', array('class' => 'col-lg-3 control-label')) !!}
    <div class="col-lg-9">
      {!! Form::file('article', null, array('class' => 'form-control')) !!}
      {!! $errors->first('article') !!}
    </div>
    <div class="clear"></div>
  </div> 

  <div class="form-group">
  <div class="col-lg-3"></div>
    <div class="col-lg-9">
      {!! Form::submit('Import!', array('class' => 'btn btn-primary')) !!}
    </div>
    <div class="clear"></div>
  </div>

{!! Form::close() !!}