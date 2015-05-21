<?php

add_action ( 'admin_menu', 'create_informations_menu' );
add_action ( 'admin_init', 'create_informations_settings' );

function create_informations_menu () {
	add_submenu_page ( 'themes.php', 'Informations', 'Informations', 'manage_options', 'informacao', 'create_informations_page' );
}

add_action ( 'admin_init', 'create_informations_settings' );
function create_informations_settings() {
	register_setting ( 'informations', 'informations' );
	add_settings_section ( 'informations', 'Informations', 'section_informacao', 'ac_theme_information' );
	function section_informacao() {
	}
	
	add_settings_field ( 'facebook_us', 'Facebook US', 'facebook_us_field', 'ac_theme_information', 'informations' );
	add_settings_field ( 'twitter_us', 'Twitter US', 'twitter_us_field', 'ac_theme_information', 'informations' );
	add_settings_field ( 'googleplus_us', 'Google+ US', 'googleplus_us_field', 'ac_theme_information', 'informations' );
	add_settings_field ( 'linkedin_us', 'LinkedIn US', 'linkedin_us_field', 'ac_theme_information', 'informations' );
	add_settings_field ( 'Youtube_us', 'Youtube US', 'youtube_us_field', 'ac_theme_information', 'informations' );
	add_settings_field ( 'Flickr_us', 'Flickr US', 'flickr_us_field', 'ac_theme_information', 'informations' );


	add_settings_field ( 'facebook_br', 'Facebook BR', 'facebook_br_field', 'ac_theme_information', 'informations' );
	add_settings_field ( 'twitter_br', 'Twitter BR', 'twitter_br_field', 'ac_theme_information', 'informations' );
	add_settings_field ( 'googleplus_br', 'Google+ BR', 'googleplus_br_field', 'ac_theme_information', 'informations' );
	add_settings_field ( 'linkedin_br', 'LinkedIn BR', 'linkedin_br_field', 'ac_theme_information', 'informations' );
	add_settings_field ( 'Youtube_br', 'Youtube BR', 'youtube_br_field', 'ac_theme_information', 'informations' );
	add_settings_field ( 'Flickr_br', 'Flickr BR', 'flickr_br_field', 'ac_theme_information', 'informations' );
	
}
function create_informations_page() {
	echo '<div id="theme-options-wrap">';
	echo '<form method="post" action="options.php" enctype="multipart/form-data">';
	settings_fields('informations');
	do_settings_sections('ac_theme_information');
	echo '<p class="submit">';
	submit_button();
	echo '</p>';
	echo '</form>';
	echo '</div>';
}

function facebook_us_field() {
	$options = get_option ( 'informations' );
	echo '<input required name="informations[facebook_us]" type="text" value="' . $options["facebook_us"] . '" />';
}
function twitter_us_field() {
	$options = get_option ( 'informations' );
	echo '<input required name="informations[twitter_us]" type="text" value="' . $options["twitter_us"] . '" />';
}
function googleplus_us_field() {
	$options = get_option ( 'informations' );
	echo '<input required name="informations[googleplus_us]" type="text" value="' . $options["googleplus_us"] . '" />';
}
function linkedin_us_field() {
	$options = get_option ( 'informations' );
	echo '<input required name="informations[linkedin_us]" type="text" value="' . $options["linkedin_us"] . '" />';
}
function youtube_us_field() {
	$options = get_option ( 'informations' );
	echo '<input required name="informations[youtube_us]" type="text" value="' . $options["youtube_us"] . '" />';
}
function flickr_us_field() {
	$options = get_option ( 'informations' );
	echo '<input required name="informations[flickr_us]" type="text" value="' . $options["flickr_us"] . '" />';
}

function facebook_br_field() {
	$options = get_option ( 'informations' );
	echo '<input name="informations[facebook_br]" type="text" value="' . $options["facebook_br"] . '" />';
}
function twitter_br_field() {
	$options = get_option ( 'informations' );
	echo '<input name="informations[twitter_br]" type="text" value="' . $options["twitter_br"] . '" />';
}
function googleplus_br_field() {
	$options = get_option ( 'informations' );
	echo '<input name="informations[googleplus_br]" type="text" value="' . $options["googleplus_br"] . '" />';
}
function linkedin_br_field() {
	$options = get_option ( 'informations' );
	echo '<input name="informations[linkedin_br]" type="text" value="' . $options["linkedin_br"] . '" />';
}
function youtube_br_field() {
	$options = get_option ( 'informations' );
	echo '<input name="informations[youtube_br]" type="text" value="' . $options["youtube_br"] . '" />';
}
function flickr_br_field() {
	$options = get_option ( 'informations' );
	echo '<input name="informations[flickr_br]" type="text" value="' . $options["flickr_br"] . '" />';
}

function get_information($rs) {
	$options = get_option ( 'informations' );
	return $options [$rs];
}