<?php

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'xzopro_required_plugins' );


function xzopro_required_plugins() {

	$plugins = array(
		array(
			'name'      			=> esc_html__('Contact Form 7', 'xzopro'),
			'slug'      			=> 'contact-form-7',
			'version'				=> '5.0.5',
			'required'     		=> false
		),

		array(
			'name'         		=> esc_html__('One Click Demo Import', 'xzopro'),
			'slug'         		=> 'one-click-demo-import',
			'version'				=> '2.5.1',
			'required'     		=> false,
		),

		array(
			'name'         		=> esc_html__('Breadcrumb NavXT', 'xzopro'),
			'slug'         		=> 'breadcrumb-navxt',
			'version'				=> '6.2.1',
			'required'     		=> true,
		),

		array(
			'name'         		=> esc_html__('MailChimp for WordPress', 'xzopro'),
			'slug'         		=> 'mailchimp-for-wp',
			'version'				=> '4.3.1',
			'required'     		=> false,
		),

		array(
			'name'      			=> esc_html__('WPBakery Visual Composer', 'xzopro'),
			'slug'      			=> 'js_composer',
			'source'					=> get_template_directory(). '/inc/plugins/js_composer.zip',
			'version'				=> '5.6',
			'required'     		=> true
		),

		array(
			'name'      			=> esc_html__('Codestar Framework', 'xzopro'),
			'slug'      			=> 'cs-framework',
			'source'					=> get_template_directory(). '/inc/plugins/cs-framework.zip',
			'version'				=> '1.0.2',
			'required'     		=> true
		),

		array(
			'name'      			=> esc_html__('Xzopro Toolkit', 'xzopro'),
			'slug'      			=> 'xzopro-toolkit',
			'source'					=> get_template_directory(). '/inc/plugins/xzopro-toolkit.zip',
			'version'				=> '1.0',
			'required'     		=> true
		),

	);
    
	$config = array(
		'id'           => 'xzopro',
		'default_path' => '',
		'menu'         => 'xzopro-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '', 
	);

	tgmpa( $plugins, $config );
}