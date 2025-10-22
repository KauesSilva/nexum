jQuery('.moreless-button').click(function () {
	jQuery('.moretext').slideToggle();
	if (jQuery('.moreless-button').text() == "Read More") {
		jQuery(this).text("Read less")
	} else {
		jQuery(this).text("Read more")
	}
});

jQuery('.moreless-button1').click(function () {
	jQuery('.moretext1').slideToggle();
	if (jQuery('.moreless-button1').text() == "Read More") {
		jQuery(this).text("Read less")
	} else {
		jQuery(this).text("Read more")
	}
});

jQuery('.moreless-button2').click(function () {
	jQuery('.moretext2').slideToggle();
	if (jQuery('.moreless-button2').text() == "Read More") {
		jQuery(this).text("Read less")
	} else {
		jQuery(this).text("Read more")
	}
});