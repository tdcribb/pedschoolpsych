$(document).ready(function() {

	centerServiceOverlay();
	pageHeight();

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

	$('.serv-title span').click(function() {
		var servTitle = $(this).attr('rel');
		$('.service-overlay').each(function() {
			var overlayTitle = $(this).attr('rel');
			if (servTitle == overlayTitle) {
				$(this).fadeIn();
			}
		});
	});


});

$(window).resize(function() {
    centerServiceOverlay();
    pageHeight();
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

function pageHeight() {
	var winW = $(window).width(),
		winH = $(window).height(),
		headerH = $('#masthead').height(),
		footerH = $('#colophon').height(),
		minusH = headerH + footerH,
		newH = winH - minusH;
	$('#main, #main #primary').css('min-height',newH);
}






