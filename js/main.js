jQuery(document).ready(function($) {
	
	console.log('Ready WAButton, Go Baby!', wabutton_ajax);

	var button_whatsapp = jQuery('<a>');
	
	button_whatsapp
		.addClass('whatsapp-button')
		.css({
			'position' : 'fixed',
			'bottom' : wabutton_ajax.conf.bottom,
			'right' : wabutton_ajax.conf.right,
			'width' : wabutton_ajax.conf.width,
			'height' : wabutton_ajax.conf.height,
			'z-index' : wabutton_ajax.conf.zindex,
		});


	var logo = jQuery('<img>');

	logo
		.addClass('whatsapp-button')
		.prop({ "src" : wabutton_ajax.logo_whatsapp });


	jQuery( button_whatsapp ).append( logo );
	jQuery('body').append( button_whatsapp );

});