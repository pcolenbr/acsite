<?php get_header(); ?>
<?php $currentlang = pll_current_language(); ?>
<div id="wrap-page">
	<header>
		<?php get_template_part('menu'); ?>
	</header>

	<section class="section">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="container">
				<?php the_content(); ?>
			</div>
		<?php endwhile; endif; ?>
	</section>
</div>
<?php get_footer(); ?>