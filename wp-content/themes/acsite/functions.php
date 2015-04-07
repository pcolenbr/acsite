<?php

require_once 'utilities/informations_menu.php';

// Resgister styles and scripts using WP function to improve cache
function ac_load_utilities() {
	ac_styles();
	ac_scripts();
}
add_action ('wp_enqueue_scripts', 'ac_load_utilities');

function ac_scripts() {
	wp_enqueue_script('jquery');
	
	wp_register_script( 'ac_owl_carousel', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.2/owl.carousel.min.js', array('jquery') );
	wp_enqueue_script('ac_owl_carousel', array('jquery'));

	wp_register_script( 'ac_isotope', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.1.1/isotope.pkgd.min.js', array('jquery') );
	wp_enqueue_script('ac_isotope', array('jquery'));

	wp_register_script( 'ac_script', get_template_directory_uri() .'/scripts/dist/main_script.min.js', array('jquery', 'ac_owl_carousel'), null );
	wp_enqueue_script('ac_script', array('jquery', 'ac_owl_carousel', 'ac_isotope'));
}

function ac_styles() {
	
	wp_register_style('ac_boostrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css');
	wp_enqueue_style('ac_boostrap');

	wp_register_style('ac_fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
	wp_enqueue_style('ac_fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array('ac_boostrap') );

	wp_register_style('ac_owl_carousel', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.2/owl.carousel.min.css');
	wp_enqueue_style('ac_owl_carousel', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.2/owl.carousel.min.css', array('ac_boostrap') );
	
	wp_register_style('ac_owl_carousel_theme', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.2/owl.theme.min.css');
	wp_enqueue_style('ac_owl_carousel_theme', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.2/owl.theme.min.css', array('ac_boostrap', 'ac_owl_carousel') );

	wp_register_style('ac_owl_carousel_transitions', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.2/owl.transitions.min.css');
	wp_enqueue_style('ac_owl_carousel_transitions', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.2/owl.transitions.min.css', array('ac_boostrap', 'ac_owl_carousel') );

	wp_register_style('ac_style', get_template_directory_uri() . '/styles/dist/ac_styles.min.css');
	wp_enqueue_style('ac_style', get_template_directory_uri() . '/styles/dist/ac_styles.min.css', array('ac_boostrap', 'ac_owl_carousel') );

	wp_enqueue_style( 'style', get_stylesheet_uri() );
}

// Change the logo of the wp-admin login
function login() {
	$html = '';

	$html .= '<style type="text/css">';
	$html .= '    body.login div#login h1 a {';
	$html .= '        background: url(' . get_stylesheet_directory_uri () . '/images/logo-login.png) center top no-repeat;';
	$html .= '        width: 100%;';
	$html .= '        height: 100px;';
	$html .= '    }';
	$html .= '</style>';
	$html .= '<link rel="shortcut icon"	href="' . get_stylesheet_directory_uri () . '/images/favicon.png" />';
	
	echo $html;
}
add_action ( 'login_enqueue_scripts', 'login' );

// Register menus
function register_my_menu() {
  register_nav_menus(
    array(
      'header-menu-en' => __( 'Header Menu EN' ),
      'header-menu-pt' => __( 'Header Menu PT' )
    )
  );
}
add_action( 'init', 'register_my_menu' );

?>