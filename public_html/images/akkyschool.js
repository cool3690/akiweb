
	$('.dropdown').hover(function () {
		$(this).find('.dropdown-menu').stop(true, true).delay(200).slideDown(200);
	}, function () {
		$(this).find('.dropdown-menu').stop(true, true).delay(200).slideUp(200);
	});