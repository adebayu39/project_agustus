
      <!--<div class="row">-->
        <div class="container">
          <div class="content-columns">
  @foreach ($articles as $article)
        <div class="boxed">
        <a href="{{ url('articles/'.$article->id) }}">
          <img src="{{ asset('upload/image/'.$article->id.'/'.$article->photo) }}" width="150">
        </a>
            <p>{{$article->title}}</p>
      
            <p>{{ substr($article->content, 0, 100)}}</p>
            <i>By {{$article->author}}</i>
            <table>
            <tr><td style="padding-left: 10px;">{!! link_to('articles/'.$article->id.'/edit', 'Edit', array('class' => 'btn btn-warning')) !!}</td>
            <td style="padding:5px; padding-top: 21px; padding-left: 10px; ">{!! Form::open(array('route' => array('articles.destroy', $article->id), 'method' => 'delete')) !!}
            {!! Form::submit('Delete', array('class' => 'btn btn-danger', "onclick" => "return confirm('are you sure?')")) !!}
            {!! Form::close() !!}</td>
            </tr>
            </table>
          </div>
  @endforeach
  
  

  </div>
  </div>

  {!! $articles->render() !!}