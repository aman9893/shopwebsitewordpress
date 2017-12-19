jQuery(document).ready(function($) {
	$(document).on('click', '.cosmica-nav-tabs li a', function(event) {
		event.preventDefault();
		var tab = $(this).attr('href');
		$('.cosmica-nav-tabs li').removeClass('active');
		$(this).parent('li').addClass('active');
		$('.tab-pane').removeClass('active');
		$('.tab-pane').removeAttr('style');
		$(tab).fadeIn();
		$(tab).addClass('active');
	});
});