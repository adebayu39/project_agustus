@extends("layouts.application")
@section("content")
  <div>{!! link_to('images/create', 'Write Article', array('class' => 'btn btn-success')) !!}</div>
  @foreach ($images as $image)
    <div>
      <img src="{{$image->image}}">
      <h1>{{$article->title}}</h1>
      <div>
      {!! Form::open(array('route' => array('images.destroy', $article->id), 'method' => 'delete')) !!}
        {!! Form::submit('Delete', array('class' => 'btn btn-danger', "onclick" => "return confirm('are you sure?')")) !!}
      {!! Form::close() !!}
      </div>
    </div>
  @endforeach
@stop