(function ($) {
	"use strict";

	/*** Sticky header */
	$(window).scroll(function(){
		if($("body").scrollTop() > 0 || $("html").scrollTop() > 0) {
			$(".navbar").addClass("stop");
		} else {
			$(".navbar").removeClass("stop");
		}
	});

	$('.scrollDown').click(function() {
		  var target = $('#primary');
		  if (target.length) {
		    $('html,body').animate({
		      scrollTop: target.offset().top - 120
		    }, 1000);
		  }
	});

	/*** Header height = gutter height */
	function setGutterHeight(){
		var header = document.querySelector('.navbar'),
			  gutter = document.querySelector('.header_gutter');
		if (gutter) {
			gutter.style.height = header.offsetHeight + 'px';
		}
	}
	window.onload = setGutterHeight;
	window.onresize = setGutterHeight;

}(jQuery));