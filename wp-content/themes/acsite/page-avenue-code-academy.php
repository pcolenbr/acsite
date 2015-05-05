<?php get_header(); ?>
<?php $currentlang = pll_current_language(); ?>
<div id="wrap-avenue-code-academy">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<header>
			<?php get_template_part('menu'); ?>
		</header>

		<div class="container" id="services-menu">
			<div class="row">
				<?php get_template_part('home-services-buttons') ?>
			</div>
		</div>


	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>