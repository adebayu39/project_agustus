@extends("layouts.application")
@section("content")
  <div class="panel panel-default">
  	<div class="panel-heading">
  	{!! link_to('articles/create', 'Write Article', array('class' => 'btn btn-success')) !!}
  	</div>
  

    <div class="panel-body">
    	<div id="list-article">
        @include('articles.list')
      </div>
    </div>

  </div>
<script>
$(function() {
	$.ajaxSetup({
  headers: {
  'X-XSRF-Token': $('meta[name="_token"]').attr('content')
  }
 });
});

$(document).ready(function() {
  $(document).on('click', '.pagination a', function(e) {
    get_page($(this).attr('href').split('page=')[1]);
    e.preventDefault();
  });
});

function get_page(page) {
  $.ajax({
    url : '/articles?page=' + page,
    type : 'GET',
    dataType : 'json',
    success : function(data) {
      $('#list-article').html(data['view']);
      location.hash = page
    	//console.log(data['view']);
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

@stop