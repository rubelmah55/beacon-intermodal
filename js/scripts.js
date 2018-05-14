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

	$(".navbar-toggle").click(function() {
		$(this).toggleClass('in');
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

	/*** Animation Counter */
	$('.counter').counterUp({
        delay: 10,
        time: 1000
    });

    $(".playVideo").colorbox({
		iframe:true,
		fixed: true,
		reposition: true,
		scrolling: false,
		innerWidth: 500, 
		innerHeight: 409
    });

    /*** Custom File Upload */
	$('.custom_file_upload .screen-reader-text').html('No File Attached');
	$('.custom_file_upload input[type="file"]').change(function(){
		var val = $(this).val();
		$('.custom_file_upload .screen-reader-text').html(val.replace("C:\\fakepath\\", ""));
	});

    /*** Smooth scroll */
	
	$('.smoothScroll').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});
	
}(jQuery));