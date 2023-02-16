jQuery(document).ready(function($) {

  var $lightbox = $('.lightbox'); 

  $('.embed-container a').click(function(e) {
      e.preventDefault(); 
      var url = $(this).attr('href'); 
      var url = url.replace("watch?v=", "embed/");
  
      $lightbox.html('<div class="container-lightbox"><iframe width="1215" height="665" src="' + url + '" frameborder="0" allowfullscreen=""></iframe></div>');
      $lightbox.fadeIn(); 
  });
  
  $lightbox.click(function () {
      $lightbox.fadeOut();
  });

});