@extends("layouts.application")
@section("content")
  <div>{!! link_to('articles/create', 'Write Article', array('class' => 'btn btn-success')) !!}</div>
  </br>
      <!--<div class="row">-->
        <div class="container">
          <div class="content-columns">
  @foreach ($articles as $article)
        <div class="boxed">
          <img src="{{ asset('upload/image/'.$article->photo) }}" width="150">
            <p>{{$article->title}}</p>
      
            <p>{{ substr($article->content, 0, 2)}}</p>
            <i>By {{$article->author}}</i>
            <p>{!! link_to('articles/'.$article->id, 'Show', array('class' => 'btn btn-info')) !!}
            {!! link_to('articles/'.$article->id.'/edit', 'Edit', array('class' => 'btn btn-warning')) !!}
            {!! Form::open(array('route' => array('articles.destroy', $article->id), 'method' => 'delete')) !!}
            {!! Form::submit('Delete', array('class' => 'btn btn-danger', "onclick" => "return confirm('are you sure?')")) !!}
            {!! Form::close() !!}</p>
          </div>
  @endforeach
  </div>
  </div>
      <!--</div>-->
@stop