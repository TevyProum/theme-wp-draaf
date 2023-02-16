(function($){

    $(document).ready(function(){

      $(document).on('click','.filter-button', function(){
        var val = $(this).attr('data-val');
  
        $.ajax({
          url: my_ajax_object.ajax_url,
          type: "POST",
          data: {
            'action': 'filter_blog',
            'value': val
          }
        }).done(function(response) {
          $('.res-filter').html(response); 
          // $('input:checked+label').addClass('actfilter');
        });
      });

     $('#filter_type').on('change', function() {
      $type = $('#filter_type option:selected').attr('data-type');

      $.ajax({
        url: my_ajax_object.ajax_url,
        type: "POST",
        data: {
          'action': 'filter_type',
          'type': $type
        }
      }).done(function(response) {
        $('.res-filter3').html(response); 
      });
    });
      
    });
  })(jQuery);