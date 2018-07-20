$(document).ready(function(){
  $('#iconSearch').click(function(){
      $('#barrederecherche').toggleClass('display-none');
      $(this).slideLeft(1);
  });
  $('#inputFile').click(function() {
    $('.upup').addClass('display-block');
  });
  $('.btn').click(function() {
  $('#uploadfilemobile').removeClass('display-block');
});
});
