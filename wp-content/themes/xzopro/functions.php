<?php
/**
 * Xzopro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Xzopro
 */



if ( ! function_exists( 'xzopro_setup' ) ) :
	function xzopro_setup() {
		load_theme_textdomain( 'xzopro', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		//Gutenberg support
        add_theme_support(
            'gutenberg',
            array( 'wide-images' => true )
        );
        add_theme_support( 'align-wide' );
        add_theme_support( 'wp-block-styles' );

        //Custom Image Size
        add_image_size('xzopro-blog-thumb', 1200, 600, true );
        add_image_size('xzopro-team', 200, 200, true );
        add_image_size('xzopro-border-image', 530, 355, true );
        add_image_size('xzopro-image-gallery', 750, 450, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Primary Menu', 'xzopro' ),
			'footer-bottom-menu' => esc_html__( 'Footer bottom menu', 'xzopro' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'xzopro_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
        // Shortcode on widgets
        add_filter('widget_text', 'do_shortcode');

		/**
		 * Add support for core custom logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 108,
			'width'       => 320,
			'flex-width'  => true,
			'flex-height' => true,
		) );

        /**
         * Add editor style.
         */

		add_editor_style('assets/css/xzopro-editor-style.css');
	}
endif;
add_action( 'after_setup_theme', 'xzopro_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function xzopro_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'xzopro_content_width', 640 );
}
add_action( 'after_setup_theme', 'xzopro_content_width', 0 );

/**
 * Register widget area.
 */
function xzopro_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'xzopro' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'xzopro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget', 'xzopro' ),
        'id'            => 'footer-widget',
        'description'   => esc_html__( 'Add footer widgets here.', 'xzopro' ),
        'before_widget' => '<div id="%1$s" class="widget col-lg-3 col-md-6 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'xzopro_widgets_init' );

/**
 * Google FONTS.
 */

require get_template_directory() . '/inc/google-fonts.php';
/**
 * Enqueue Js and stylesheet
 */
require get_template_directory() . '/inc/css-and-js.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load inline style.
 */
require get_template_directory() . '/inc/dynamic-style.php';

/**
 * Custom Comment Template.
 */
require get_template_directory() . '/inc/xzopro-comment-template.php';

/**
 * Load metabox and options.
 */

if(function_exists('cs_framework_init') || class_exists('CSFramework')){
    require get_template_directory() . '/inc/metabox-and-options/metabox-and-options.php';
}

if ( !function_exists( 'xzopro_option' ) ) {
    function xzopro_option($xzopro_field){
        if ( function_exists( 'cs_get_option' ) ) {
            return cs_get_option($xzopro_field);
        } else {
            return '';
        }
    }
}

/**
 * Load Required Plugins
 */
require get_template_directory() . '/inc/required-plugins.php';

/**
 * Import demo data.
 */

function xzopro_import_demo_files() {
	return array(
		array(
			'import_file_name'             => esc_html__('Xzopro Demo Import', 'xzopro'),

			'local_import_file'            => trailingslashit( get_template_directory() ) . '/inc/demo-content/demo-content.xml',

			'local_import_widget_file'            => trailingslashit( get_template_directory() ) . '/inc/demo-content/widgets.wie',

	        'local_import_customizer_file' => trailingslashit( get_template_directory() ) . '/inc/demo-content/customizer.dat',

			'import_notice'                => esc_html__( 'After import demo, just set static homepage from settings > reading, Set menus. You will be done! :-)', 'xzopro' ),
		)
	);
}
add_filter( 'pt-ocdi/import_files', 'xzopro_import_demo_files' );
/*
function send_smtp_email( $phpmailer )
{
    // Define que estamos enviando por SMTP
    $phpmailer->isSMTP();
 
    // La dirección del HOST del servidor de correo SMTP p.e. smtp.midominio.com
    $phpmailer->Host = "smtp.serviciodecorreo.es";
 
    // Uso autenticación por SMTP (true|false)
    $phpmailer->SMTPAuth = true;
 
    // Puerto SMTP - Suele ser el 25, 465 o 587
    $phpmailer->Port = "465";
 
    // Usuario de la cuenta de correo
    $phpmailer->Username = "vo@vo-traducciones.com";
 
    // Contraseña para la autenticación SMTP
    $phpmailer->Password = "MariaCris197";
 
    // El tipo de encriptación que usamos al conectar - ssl (deprecated) o tls
    $phpmailer->SMTPSecure = "tls";
 
    $phpmailer->From = "vo@vo-traducciones.com";
    $phpmailer->FromName = "vo@vo-traducciones.com";
}


function configure_smtp( PHPMailer $phpmailer ){
    $phpmailer->isSMTP(); //switch to smtp
    $phpmailer->Host = 'smtp.serviciodecorreo.es';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 465;
    $phpmailer->Username = 'vo@vo-traducciones.com';
    $phpmailer->Password = 'MariaCris197';
    $phpmailer->SMTPSecure = 'ssl';
    $phpmailer->From ='vo@vo-traducciones.com';
    //$phpmailer->FromName='Cristina Vega';
    $mail->CharSet = "UTF8";
    $mail->Encoding = "quotedprintable"; 
}



add_action( 'phpmailer_init', 'send_smtp_email' );


*/