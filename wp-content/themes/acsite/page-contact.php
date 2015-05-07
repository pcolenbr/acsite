<?php get_header(); ?>
<?php $currentlang = pll_current_language(); ?>
<div id="wrap-contact">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<header>
			<?php get_template_part('menu'); ?>
		</header>

		<section id="head">
			<div class="container">
				<h1 class="title">CONTACT</h1>

				<hr class="border-title"></hr>

				<p id="intro">Headquartered in San Francisco, one of the most beautiful cities in the world,<br>Avenue Code has several development centers. Click to see each location:</p>
			</div>
		</section>

		<section id="location-menu">
			<div class="container">
				<ul class="list-inline">
					<li class="location-item"><a class="location-link location-link-active" data-location="SF">San Francisco, U.S.</a></li>
					<li class="location-item"><a class="location-link" data-location="SP">São Paulo, Brazil</a></li>
					<li class="location-item"><a class="location-link" data-location="BH">Belo Horizonte, Brazil</a></li>
				</ul>
			</div>
		</section>

		<section id="gmap">
			<div id="gmail-overlay">
				<div id="button-div">
					<a href="javascript:;" class="btn btn-blue">CLICK TO ACTIVATE</a>
				</div>
			</div>

			<iframe width="100%" height="380" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3152.866917500437!2d-122.40253129999998!3d37.793158499999976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085808a698fd8eb%3A0xcfad419c0e900b47!2s400+Montgomery+St+%23305!5e0!3m2!1sen!2s!4v1400803033706" id="mapFrame"></iframe>
		</section>

	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>