<!--<div class="row">-->
        <div class="container" style="padding-top: 25px;">
          <div class="content-columns">
            <div class="list-article">
            @foreach ($articles as $article)
              <div class="boxed">
                <a href="{{ url('article/'.$article->id) }}">
                  <img src="{{ asset('upload/image/'.$article->id.'/'.$article->photo) }}" width="250">
                </a>
                <p><a href="{{ url('articles/'.$article->id) }}">{{substr($article->title, 0, 20)}} </a></p>
                <p>{{ substr($article->content, 0, 100)}}</p>
                <i>By {{$article->author}}</i>
              </div>
            @endforeach
            </div>
          </div>
        </div>

{!! $articles->render() !!}