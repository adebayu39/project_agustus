@extends("layouts.application")
@section("content")
  <div>{!! link_to('articles/create', 'Write Article', array('class' => 'btn btn-success')) !!}</div>
  </br>
    <div id="list-article">
        @include('articles.list')
    </div>

@stop