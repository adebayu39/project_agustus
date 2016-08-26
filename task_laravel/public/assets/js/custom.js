$(document).on('click','.article-list',(function(e){
    e.preventDefault();
    var page = $(this).attr('href').split('articles');

    getArticles(page);

}));

function getArticles(page){
    $.ajax({
      url:'/articles',
      type:"GET",
      dataType: "json",
      success: function (data)
      {
        $('.panel-body').html(data);
      },
      error: function (xhr, status)
      {
        console.log(xhr.error);
      }
    });

  }