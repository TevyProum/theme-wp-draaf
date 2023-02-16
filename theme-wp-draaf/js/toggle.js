jQuery(document).ready(function($) {

  // $("#map-apprentissage").hide();
  $("input[name='map']:radio").change(function() {
    $("#map-scolaire").toggle($(this).val() == "scolaire");
    $("#map-apprentissage").toggle($(this).val() == "apprentissage"); 
  });

  $('iframe').on('load', function(){
    $('#map').contents().css('height','800px !important;')
    $('#map').contents().addClass('min-height');
  });

});