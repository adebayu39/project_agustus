{{-- 
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

  {!! $articles->render() !!} --}}


<div class="row">
  <div class="col-lg-12" id="enrolls-list">
    <h1>Articles</h1>
    <table class="table table-hover">
      <thead>
        <tr>
          <th class="text-center"><a id="id">ID<i id="ic-direction"></i></a></th>
          <th class="text-center">Title</th>
          <th class="text-center" colspan="3">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($articles as $article)
          <tr>
            <td>{!! $article->id !!}</td>
            <td class="text-center">{!! $article->title !!}</td>
            <td width="50">
              {!!link_to('articles/'.$article->id, 'Show', array('class' => 'btn btn-info'))!!}</td>
            <td width="50">
              {!!link_to('articles/'.$article->id.'/edit', 'Edit', array('class' => 'btn btn-warning'))!!}</td>
            <td width="50">
              {!! Form::open(array('route' => array('articles.destroy', $article->id), 'method' => 'delete' )) !!}
                {!! Form::submit('Delete', array('class' => 'btn btn-danger', "onclick" => "return confirm('are you sure?')")) !!}
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div>
      {!! $articles->render() !!}
    </div>
  </div>
  <input id="direction" type="hidden" value="asc" />
</div>