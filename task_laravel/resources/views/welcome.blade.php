@extends("layouts.application")
@section("content")
  <div class="col-md--offset-12 search">
    <div class="col-md-offset-8">
      <div class="input-group input-group-sm">
          <input type="text" class="form-control" id="keywords" placeholder="Search">
          <span class="input-group-btn">
          <button id="search-ajax" class="search btn btn-info btn-flat" type="button">
            <i class="glyphicon glyphicon-search"></i>
          </button>
          </span>
      </div><!-- /input-group -->
    </div>
  </div>

{{-- <div id="list-article"> --}}
  @include("list")
{{-- </div> --}}

<script>
$('.search').on('click', function(){
  $.ajax({
    url : '/',
    type : 'GET',
    dataType : 'json',
    data : {
      'keywords' : $('#keywords').val()
    },
    success : function(data) {
      $('.list-article').html(data);
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

<script>

$(function() {
            $.ajaxSetup({
                headers: {
                    'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
        });

  $(document).on('click', '.pagination a', function(e) {
    e.preventDefault();
    getList($(this).attr('href').split('page=')[1]);
  });

function getList(page){
  $.ajax({
    url : '/?page=' + page,
    type : 'GET',
    dataType : 'json',
    success : function(data) {
      /*console.log(data['view']);*/
      $('.list-article').html(data);
      location.hash = page;
    },
    error : function(xhr, status, error) {
      console.log(xhr.error + "\n ERROR STATUS : " + status + "\n" + error);
    },
    complete : function() {
      alreadyloading = false;
    }
  }); 
}
</script>
      <!--</div>-->
@stop