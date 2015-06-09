<?php
	/*
	Template Name: Events Page Template
	*/
?>
<?php get_header(); ?>
<?php $currentlang = pll_current_language(); ?>
<div id="wrap-events">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<header>
			<?php get_template_part('menu'); ?>
		</header>

		<div class="col-xs-12 col-md-9">
			<?php
				$events_categories = array('public', 'internal', 'academy');
				$events_categories_title = array('Public Events', 'Internal Events', 'Avenue Code Academy');
				$args = array( 'post_type' => 'event', 'category_name' => $events_categories[0]);
				$posts = get_posts( $args );
			?>

			<section class="events">
				<h1 class="title"><?php echo $events_categories_title[0] ?></h1>
				<hr class="border-title"></hr>


			</section>							
		</div>

	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
