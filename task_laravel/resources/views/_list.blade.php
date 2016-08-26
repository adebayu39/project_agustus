@foreach ($articles as $article)
  <div>
    <p><a href="{{ url('articles/'.$article->id) }}">{{substr($article->title, 0, 20)}} </a></p>
    <p>{{ substr($article->content, 0, 50)}}</p>
    <i>By {!!$article->author!!}</i>
    <div>
      {!!link_to('articles/'.$article->id, 'Show', array('class' => 'btn btn-info'))!!}
    </div>
  </div>

@endforeach