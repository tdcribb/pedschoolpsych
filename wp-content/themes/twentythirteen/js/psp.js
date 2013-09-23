$(document).ready(function() {

	centerServiceOverlay();

	$('.service-view-more .view-more-button').click(function() {
		var service = $(this).attr('rel');
		$('.service-overlay').each(function() {
			var overlay = $(this).attr('rel');
			if (service == overlay) {
				$(this).fadeIn();
				$('#page-fade').fadeIn()
			}
		}); 
	});

	$('.close-overlay').click(function() {
		$('.service-overlay').fadeOut();
		$('#page-fade').fadeOut()
	});


});

$(window).resize(function() {
    centerServiceOverlay();
});

function centerServiceOverlay() {
	var winW = $(window).width(),
		winH = $(window).height(),
		width = $('.service-overlay').width(),
		height = $('.service-overlay').height(),
		newLeft = (winW - width) / 2,
		newTop = (winH - height) / 2;
	$('.service-overlay').css({'left':newLeft, 'top':newTop});
}