<?php wp_footer(); ?>

<?php $currentlang = pll_current_language(); ?>

<?php

$fb_url = get_information('facebook_us');
$twitter_url = get_information('twitter_us');
$gplus_url = get_information('googleplus_us');
$linkedin_url = get_information('linkedin_us');
$youtube_url = get_information('youtube_us');
$flickr_url = get_information('flickr_us');

if($currentlang == "br") {
	if ( get_information('facebook_br') != false ) {
		$fb_url = get_information('facebook_br');
	}

	if ( get_information('twitter_br') != false ) {
		$twitter_url = get_information('twitter_br');
	}

	if ( get_information('googleplus_br') != false ) {
		$gplus_url = get_information('googleplus_br');
	}

	if ( get_information('linkedin_br') != false ) {
		$linkedin_url = get_information('linkedin_br');
	}

	if ( get_information('youtube_br') != false ) {
		$youtube_url = get_information('youtube_br');
	}

	if ( get_information('flickr_br') != false ) {
		$flickr_url = get_information('flickr_br');
	}
}
?>

<footer>
	<div class="container">
		<div class="col-xs-12 col-sm-4">
			<span>&copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?></span>
		</div>

		<div class="col-xs-12 col-sm-8">
			<ul class="social-icons">
				<li><a href="<?php echo $fb_url ?>" title="Facebook" target="_blank"><i class="fa fa-facebook fa-2"></i></a></li>

				<li><a href="<?php echo $twitter_url ?>" title="Twitter" target="_blank"><i class="fa fa-twitter fa-2"></i></a></li>

				<li><a href="<?php echo $linkedin_url ?>" title="LinkedIn" target="_blank"><i class="fa fa-linkedin fa-2"></i></a></li>
				
				<li><a href="<?php echo $gplus_url ?>" title="Google+" target="_blank"><i class="fa fa-google-plus fa-2"></i></a></li>
				
				<li><a href="<?php echo $youtube_url ?>" title="Youtube" target="_blank"><i class="fa fa-youtube-play fa-2"></i></a></li>

				<li><a href="<?php echo $flickr_url ?>" title="Flickr" target="_blank"><i class="fa fa-flickr fa-2"></i></a></li>
			</ul>
		</div>
	</div>
</footer>

</body>
</html>