jQuery(document).ready(function($) {
	if (window.innerWidth < 992) {
		$('.fancybox').fancybox({
			padding		: '0',
			autoHeight	: true,
			maxHeight	: '100%'
		});
	} else {
		$('.fancybox').fancybox({
			padding		: '0',
			autoHeight	: true,
			maxHeight	: '85%'
		});
	}
});
