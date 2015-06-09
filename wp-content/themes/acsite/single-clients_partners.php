<?php get_header(); ?>
<?php $currentlang = pll_current_language(); ?>
<div id="wrap-single-client-partners">

	<header>
		<?php get_template_part('menu'); ?>
	</header>

	<section class="section">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="container">
				<div id="client-partners-post-title">
					<h1 class="title"><?php echo get_the_title(); ?></h1>
					<hr class="border-title"></hr>
				</div>

				<div id="client-partners-post-content">
					<?php the_content(); ?>
				</div>

				<div id="div-back-button">
					<a class="btn btn-blue back-btn" href="<?php echo get_home_url() ?>"><i class="fa fa-arrow-left back"></i>BACK</a>
				</div>
			</div>
		<?php endwhile; endif; ?>
	</section>
</div>
<?php get_footer(); ?>