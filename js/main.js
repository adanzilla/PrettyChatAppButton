jQuery(document).ready(function($) {
	
	console.log('Ready WAButton, Go Baby!', wabutton_ajax.conf);

	var button_whatsapp = jQuery('<a>');
	
	button_whatsapp
		.addClass('whatsapp-button')
		.prop({ 
			'href' : 'https://wa.me/'+wabutton_ajax.conf.number+'?text=' + wabutton_ajax.conf.message,
			'target' : '_blank'
		})
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