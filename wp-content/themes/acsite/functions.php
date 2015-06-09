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

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_filter( 'add_to_cart_text', 'woo_custom_cart_button_text' );
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );
function woo_custom_cart_button_text() {
	return __( 'REGISTER', 'woocommerce' ); 
}

// Remove Woocommer from pages that it is not used
// Remove Woocommerce scripts on unnecessary pages
function woocommerce_de_script() {
    if (function_exists( 'is_woocommerce' )) {
    	if (!is_woocommerce() && !is_cart() && !is_checkout() && !is_account_page()) {
    		wp_dequeue_script('wc-add-to-cart');
    		wp_dequeue_script('jquery-blockui');
    		wp_dequeue_script('jquery-placeholder');
    		wp_dequeue_script('woocommerce');
    		wp_dequeue_script('jquery-cookie');
    		wp_dequeue_script('wc-cart-fragments');
     	}
    }
}
add_action( 'wp_print_scripts', 'woocommerce_de_script', 100 );

add_action( 'wp_enqueue_scripts', 'remove_woocommerce_generator', 99 );
function remove_woocommerce_generator() {
    if (function_exists( 'is_woocommerce' )) {
		if (!is_woocommerce()) {
			remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
		}
    }
}

function child_manage_woocommerce_css(){
    if (function_exists( 'is_woocommerce' )) {
		if (!is_woocommerce()) {
			wp_dequeue_style('woocommerce-layout');
			wp_dequeue_style('woocommerce-smallscreen');
			wp_dequeue_style('woocommerce-general');
		}
    }
}
add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_css' );

// CUSTOM FIELDS FOR CHECKOUT PAGE
add_filter('woocommerce_enable_order_notes_field', '__return_false');
add_action( 'woocommerce_after_order_notes', 'my_custom_checkout_field' );
function my_custom_checkout_field( $checkout ) {
	global $woocommerce;

    $num_of_courses = $woocommerce->cart->cart_contents_count;
 
    echo '<div id="my_custom_checkout_field"><h3 style="margin-bottom:53px;">' . __('Registration Details') . '</h3>';
    
    for ($i = 0; $i < $num_of_courses; $i++) {
		echo '<div class="regist_form">';

      	echo '<h4><b>Student #' .($i + 1).'</b></h4>';

      	woocommerce_form_field( 'Registration_First_Name'.$i, array(
        	'type'          => 'text',
        	'class'         => array('my-field-class form-row-first'),
        	'label'         => __('First Name'),
        	'placeholder'   => __(''),
        	'required'      => true,
        ), $checkout->get_value( 'Registration_First_Name'.$i ));

    	woocommerce_form_field( 'Registration_Last_Name'.$i, array(
        	'type'          => 'text',
        	'class'         => array('my-field-class form-row-last'),
        	'label'         => __('Last Name'),
        	'placeholder'   => __(''),
        	'required'      => true,
        ), $checkout->get_value( 'Registration_Last_Name'.$i ));

    	woocommerce_form_field( 'Registration_email'.$i, array(
	        'type'          => 'text',
        	'class'         => array('my-field-class form-row-first validate-email'),
        	'label'         => __('Email Address'),
        	'placeholder'   => __(''),
        	'required'      => true,
        ), $checkout->get_value( 'Registration_email'.$i ));

    	woocommerce_form_field( 'Registration_phone'.$i, array(
        	'type'          => 'text',
        	'class'         => array('my-field-class form-row-last'),
        	'label'         => __('Phone'),
        	'placeholder'   => __(''),
        ), $checkout->get_value( 'Registration_phone'.$i ));

    	echo '</div>';
    }    
    echo '</div>';
}

add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');
function my_custom_checkout_field_process() {
  	global $woocommerce;

  	$num_of_courses = $woocommerce->cart->cart_contents_count;

  	for($i = 0; $i < $num_of_courses; $i++){
      	if ( ! $_POST['Registration_First_Name'.$i] ) {
        	wc_add_notice( __( '<b>Student #'.($i+1).' First Name</b> is a required field.'), 'error' );
      	}
      	if ( ! $_POST['Registration_Last_Name'.$i] ) {
        	wc_add_notice( __( '<b>Student #'.($i+1).' Last Name</b> is a required field.'), 'error' );
      	}
      	if ( ! $_POST['Registration_email'.$i] ) {
			wc_add_notice( __( '<b>Student #'.($i+1).' Email Address</b> is a required field.'), 'error' );
      	}
    }
}

  /**
 * Update the order meta with field value
 */
add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );
function my_custom_checkout_field_update_order_meta( $order_id ) {
    global $woocommerce;

    $num_of_courses = $woocommerce->cart->cart_contents_count;

    for($i = 0; $i < $num_of_courses; $i++){
    	if ( ! empty( $_POST['Registration_First_Name'.$i] ) ) {
        	update_post_meta( $order_id, 'Student #'.($i+1).' First Name', sanitize_text_field( $_POST['Registration_First_Name'.$i] ) );
        }
        if ( ! empty( $_POST['Registration_Last_Name'.$i] ) ) {
          	update_post_meta( $order_id, 'Student #'.($i+1).' Last Name', sanitize_text_field( $_POST['Registration_Last_Name'.$i] ) );
        }
        if ( ! empty( $_POST['Registration_email'.$i] ) ) {
          	update_post_meta( $order_id, 'Student #'.($i+1).' Email', sanitize_text_field( $_POST['Registration_email'.$i] ) );
        }
        if ( ! empty( $_POST['Registration_phone'.$i] ) ) {
          	update_post_meta( $order_id, 'Student #'.($i+1).' Phone', sanitize_text_field( $_POST['Registration_phone'.$i] ) );
        }
    }
}


/**
 * Display field value on the order edit page
 */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 ); 
function my_custom_checkout_field_display_admin_order_meta($order){
	global $woocommerce;

    $num_of_courses = $woocommerce->cart->cart_contents_count;

    for($i = 0; $i < $order->get_item_count(); $i++){
		echo '<hr><h4><b>Student #'.($i +1).':</b></h4>';
      	echo '<p><strong>'.__('First Name').':</strong> ' . get_post_meta( $order->id, 'Student #'.($i +1).' First Name', true ) . '</p>';
      	echo '<p><strong>'.__('Last Name').':</strong> ' . get_post_meta( $order->id, 'Student #'.($i +1).' Last Name', true ) . '</p>';
      	echo '<p><strong>'.__('Email').':</strong> ' . get_post_meta( $order->id, 'Student #'.($i +1).' Email', true ) . '</p>';
      	echo '<p><strong>'.__('Phone').':</strong> ' . get_post_meta( $order->id, 'Student #'.($i +1).' Phone', true ) . '</p>';
    }      
}

?>