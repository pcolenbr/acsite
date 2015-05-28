<?php

require_once 'utilities/informations_menu.php';

add_theme_support( 'post-thumbnails' ); 

add_action( 'wp_ajax_nopriv_ac_contact_send_email', 'ac_contact_send_email');
add_action( 'wp_ajax_ac_contact_send_email', 'ac_contact_send_email');

// Resgister styles and scripts using WP function to improve cache
function ac_load_utilities() {
	ac_styles();
	ac_scripts();
}
add_action ('wp_enqueue_scripts', 'ac_load_utilities');

function ac_scripts() {
	wp_deregister_script('jquery');
	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js' );
	wp_enqueue_script('jquery');

	wp_register_script( 'bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js' );
	wp_enqueue_script('bootstrap');
	
	wp_register_script( 'ac_owl_carousel', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.2/owl.carousel.min.js', array('jquery') );
	wp_enqueue_script('ac_owl_carousel', array('jquery'));

	wp_register_script( 'ac_owl_carousel', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.2/owl.carousel.min.js', array('jquery') );
	wp_enqueue_script('ac_owl_carousel', array('jquery'));

	wp_register_script( 'ac_isotope', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.0/isotope.pkgd.min.js', array('jquery') );
	wp_enqueue_script('ac_isotope', array('jquery'));

	wp_register_script( 'ac_infinitescroll', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-infinitescroll/2.0b2.120519/jquery.infinitescroll.min.js', array('jquery', 'ac_isotope') );
	wp_enqueue_script('ac_infinitescroll', array('jquery'));

	wp_register_script( 'ac_imagesloaded', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/3.1.8/imagesloaded.pkgd.min.js', array('jquery', 'ac_isotope') );
	wp_enqueue_script('ac_imagesloaded', array('jquery'));

	wp_register_script( 'ac_script', get_template_directory_uri() .'/scripts/dist/main_script.min.js', array('jquery', 'ac_owl_carousel'), array('jquery', 'ac_owl_carousel', 'ac_isotope', 'ac_infinitescroll') );
	wp_enqueue_script('ac_script', array('jquery', 'ac_owl_carousel', 'ac_isotope', 'ac_infinitescroll'));

	wp_localize_script( 'ac_script', 'ACAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
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

// Remove text editor from pages. Only custom fields are used to edit pages
function remove_pages_editor(){
    remove_post_type_support( 'page', 'editor' );
}   
add_action( 'init', 'remove_pages_editor' );

// The the execerpt length to 30 words
function custom_excerpt_length( $length ) {
  return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function create_team($bios) {
	$numb_of_bios = 0;
	for($i = 0; $i < count($bios); $i++) {
		if(($numb_of_bios % 4) == 0) {
			echo '<div class="row">';
		}

		echo '<div class="col-md-3 bio">';
		echo '<div class="hexagon-profile">';
		echo '<div class="hexagon-mask">';
		echo '<span class="mask"></span>';
		echo '<div class="hexagon-social">';

		if( !empty( $bios[$i]['facebook-link'] ) ) 
			echo '<a href="' .$bios[$i]['facebook-link']. '" class="fa fa-facebook animated" target="_blank"></a>';
		if( !empty( $bios[$i]['twitter-link'] ) ) 
			echo '<a href="' .$bios[$i]['twitter-link']. '" class="fa fa-twitter animated" target="_blank"></a>';
		if( !empty( $bios[$i]['linkedin-link'] ) ) 
			echo '<a href="' .$bios[$i]['linkedin-link']. '" class="fa fa-linkedin animated" target="_blank"></a>';

		echo			'</div>';
		echo			'<span class="mask-bg"></span>';						

		$headshot_src = wp_get_attachment_image_src( $bios[$i]['picture'], 'full' );	
		echo '<img src="' .$headshot_src[0]. '" alt="">';

		echo '</div>';
		echo '<div class="name">' .$bios[$i]['name']. '</div>';
		echo '<div class="job">' .$bios[$i]['role']. '</div>';
		echo '<p class="whoiam">' .$bios[$i]['bio']. '</p>';
		echo '</div>';
		echo '</div>';

		if(($numb_of_bios % 4) == 3) {
			echo '</div>';
		}
		$numb_of_bios++;

		if($i == (count($bios) - 1)) {
			echo '<div class="col-md-3 team_message">';
			echo '<p class="number_of_members">+ 200<br><span class="message">passionate team members</span></p>';
			echo '</div>';
		}
	}

	if(($numb_of_bios % 4) != 0) {
		echo '</div>';
	}
}

function ac_contact_send_email() {
	$response = json_encode( array( 'success' => false ) );	

	$location = $_POST ['location'];
	$name = $_POST ['name'];
	$email = $_POST ['email'];
	$website = $_POST ['website'];
	$message = $_POST ['message'];

	if($location == 1 ) {
		$mail_to = 'info@avenuecode.com';		
	} else {
		$mail_to = 'brazil.info@avenuecode.com';
	}

	$subject = 'Website email submission from '. $location;

	$body_message = 'From: '. $name . "<br>";
	$body_message .= 'E-mail: ' . $email . "<br>";
	$body_message .= 'Website: ' . $website . "<br>";
	$body_message .= 'Message: ' . $message;

	$headers = 'Content-Type: text/html; charset=UTF-8' . "\r\n";
	$headers .= 'From: ' . $email . "\r\n";
	$headers .= 'Reply-To: '. $email . "\r\n";

	$status = wp_mail( $mail_to, $subject, $body_message, $headers );

	if($status == true) {
		$response = json_encode( array( 'success' => true ) );	
	}

	header( "Content-Type: application/json" );
	echo $response;
	exit;
}

?>