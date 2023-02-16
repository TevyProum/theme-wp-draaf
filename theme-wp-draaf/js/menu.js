jQuery(document).ready(function($) {
	$('#slideMe').hide();
   	$('a#clickMe').click(function() {
		$(this).toggleClass("is-active");
   		$('#slideMe').slideToggle();
   		return false;
   	});
});