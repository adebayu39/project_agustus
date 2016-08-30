$(document).ready(function() {
  $(document).on('click', '#id', function(e) {
    sort_articles();
    e.preventDefault();
  });
});

function sort_articles() {
  $('#id').on('click', function() {
    $.ajax({
      url : '/articles',
      typs : 'GET',
      dataType : 'json',
      data : {
        "direction" : $('#direction').val()
      },
      success : function(data) {
        $('#articles-list').html(data['view']);
        $('#direction').val(data['direction']);
        if(data['direction'] == 'asc') {
          $('i#ic-direction').attr({class: "fa fa-arrow-up"});
        } else {
          $('i#ic-direction').attr({class: "fa fa-arrow-down"});
        }
      },
      error : function(xhr, status, error) {
        console.log(xhr.error + "\n ERROR STATUS : " + status + "\n" + error);
      },
      complete : function() {
        alreadyloading = false;
      }
    });
  });
}