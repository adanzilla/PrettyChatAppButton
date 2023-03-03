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


		$wabutton_option = get_option( "wabutton_option" );
		$custom = [];

		if( $wabutton_option ){

			$options = [
				'number',
				'width',
				'height',
				'message'
			];

			foreach ($options as $option) {
				if( isset( $wabutton_option[ $option ] ) ){
					$custom[ $option ] = $wabutton_option[ $option ];
				}
			}


		}

		$default = [
			'bottom' => '5%',
			'right'  => '5%',
			'zindex' => '9',	
			'width'  => '30px',
			'height' => '30px',
			'number' => '5555555555',
			'message' => 'Hi, I need more info please',
		];

		$conf = array_merge( $default, $custom );

		wp_localize_script('WAButton', 'wabutton_ajax', [ 
			'ajax_url'            => admin_url( 'admin-ajax.php'), 
			'wabutton_plugin_url' => WABUTTON_PLUGIN_URL, 
			'site_url'            => site_url( "/" ),
			'logo_whatsapp'       => WABUTTON_SRC_LOGO,
			'conf'                => $conf
        ]);

	}

	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	function customize_register( $wp_customize ) {

	    $wp_customize->add_section('wabutton_section', array(
			'title'       => 'WhatsApp Button',
			'description' => '',
			'priority'    => 120,
	    ));

	    $wp_customize->add_setting('wabutton_option[number]', [
			'default'    => '5555555555',
			'capability' => 'edit_theme_options',
			'type'       => 'option',
	    ]);

	    $wp_customize->add_control( 'wabutton_control_number', array(
			'label'    => 'WhatsApp number',
			'section'  => 'wabutton_section',
			'settings' => 'wabutton_option[number]',
		) );

		$wp_customize->add_setting('wabutton_option[width]', [
			'default'    => '30px',
			'capability' => 'edit_theme_options',
			'type'       => 'option',
	    ]);

	    $wp_customize->add_control( 'wabutton_control_width', array(
			'label'    => 'Button Width',
			'section'  => 'wabutton_section',
			'settings' => 'wabutton_option[width]',
		) );

		$wp_customize->add_setting('wabutton_option[height]', [
			'default'    => '30px',
			'capability' => 'edit_theme_options',
			'type'       => 'option',
	    ]);

	    $wp_customize->add_control( 'wabutton_control_height', array(
			'label'    => 'Button Height',
			'section'  => 'wabutton_section',
			'settings' => 'wabutton_option[height]',
		) );

		$wp_customize->add_setting('wabutton_option[message]', [
			'default'    => 'Hi, I need more info',
			'capability' => 'edit_theme_options',
			'type'       => 'option',
	    ]);

	    $wp_customize->add_control( 'wabutton_control_message', array(
			'label'    => 'Message',
			'section'  => 'wabutton_section',
			'settings' => 'wabutton_option[message]',
		) );
	}

}