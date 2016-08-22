@extends("layouts.application")
@section("content")
<div class="col-md-12 search">
    <div class="col-md-6">
      <div class="input-group input-group-sm">
        <input type="text" class="form-control" id="keywords" placeholder="Keywords">
        <span class="input-group-btn">
        <button id="search" class="btn btn-info btn-flat" type="button">
          Search!
        </button>
        </span>
      </div><!-- /input-group -->
    </div>
  </div>

      <!--<div class="row">-->
        <div class="container" style="padding-top: 25px;">
          <div class="content-columns">
  @foreach ($articles as $article)
        <div class="boxed">
            <a href="{{ url('article/'.$article->id) }}">
                <img src="{{ asset('upload/image/'.$article->photo) }}" width="150">
            </a>
            <p><a href="{{ url('articles/'.$article->id) }}">{{substr($article->title, 0, 20)}} </a></p>
      
            <p>{{ substr($article->content, 0, 50)}}</p>
            <i>By {{$article->author}}</i>
            
            </div>
  @endforeach
  {!! $articles->render() !!}

  </div>
  </div>

<script>
$('#search').on('click', function(){
  $.ajax({
    url : '/articles',
    type : 'GET',
    dataType : 'json',
    data : {
      'keywords' : $('#keywords').val()
    },
    success : function(data) {
      $('#articles-list').html(data['view']);
    },
    error : function(xhr, status) {
      console.log(xhr.error + " ERROR STATUS : " + status);
    },
    complete : function() {
      alreadyloading = false;
    }
  });
});
</script>

      <!--</div>-->
@stop