jQuery(document).ready(function($) {

	$( '.wp-html5vp-video-row' ).each(function( index ) {
		
		var popup_id   = $(this).attr('id');
		var popup_conf = $.parseJSON( $(this).find('.wp-html5vp-popup-conf').text());

		if( typeof(popup_id) != 'undefined' ) {
			jQuery('#'+popup_id+ ' .popup-youtube').magnificPopup({					 
				type: 'iframe',
				mainClass: 'mfp-fade wp-html5vp-popup-main-wrp',
				removalDelay: 160,
				preloader: false,
				fixedContentPos: popup_conf.popup_fix == 'true' ? true : 0,
			});
			
			jQuery('#'+popup_id+ ' .popup-modal').magnificPopup({					 					 
				mainClass: 'mfp-fade wp-html5vp-popup-main-wrp',
				removalDelay: 160,
				preloader: false,
				fixedContentPos: popup_conf.popup_fix == 'true' ? true : 0,
			});
		}
	});
});