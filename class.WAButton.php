<?php

class WAButton {

	private static $initiated = false;

	public static function init() {
		if ( ! self::$initiated ) {
			self::init_hooks();
		}
	}

	private static function init_hooks() {
		self::$initiated = true;
	}

	public function enqueue_scripts(){
		
		wp_enqueue_script( 'WAButton', WABUTTON_PLUGIN_URL . 'js/main.js', [ "jquery" ], WABUTTON_VERSION, true );

	}
	
	public function enqueue_styles(){
		
		wp_enqueue_style( "WAButton", WABUTTON_PLUGIN_URL . 'css/main.css', [], WABUTTON_VERSION );
		
	}

	public function localize_script(){

		wp_localize_script('WAButton', 'wabutton_ajax', [ 
			'ajax_url'            => admin_url( 'admin-ajax.php'), 
			'wabutton_plugin_url' => WABUTTON_PLUGIN_URL, 
			'site_url'            => site_url( "/" ),
			'logo_whatsapp'       => WABUTTON_SRC_LOGO,
			'conf' => [
				'bottom' => '5%',
				'right'  => '5%',
				'zindex' => '9',
				'width'  => '30px',
				'height' => '30px',
			]
        ]);

	}

}