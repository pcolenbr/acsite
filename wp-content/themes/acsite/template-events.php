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

		<div class="container">
			<div class="col-xs-12 col-md-9">
				<?php
					$events_cat_id = get_cat_ID("events");
					$args = array( 'child_of' => $events_cat_id );
					$cats = get_categories($args);
					$cats_length = count($cats);
				?>
				<section class="events">
					<?php for ($c = 0; $c < $cats_length; $c++){ ?>
						<h1 class="category-title"><?php echo $cats[$c]->name ?></h1> 
						<hr class="border-title"></hr>
						<div class="row">
							<div class="hidden-xs col-sm-3">
								<div class="hexagon-events">
									<div class="hexagon-mask">
										<span class="mask"></span>
										<span class="mask-bg"></span>
										<img src="<?php echo z_taxonomy_image_url($cats[$c]->term_id); ?>" alt="<?php echo $cats[$c]->name ?>"/>
									</div>
								</div>
							</div>

							<div class="col-xs-12 col-sm-9 event-posts">
								<?php $args = array('post_type' => 'event', 'category_name' => $cats[$c]->slug);?>
								<?php $posts = get_posts( $args ); ?>
								<?php $posts_length = count($posts); ?>
								<?php for ($p = 0; $p <= $posts_length; $p++) { ?>
									
									<h2 class="event-title"><?php echo $posts[$p]->post_title; ?></h2>
									<?php $events_att = get_post_meta( $posts[$p]->ID, 'events_attributes', true); ?>
									<div class="event-date">
										<?php echo $events_att[0]['date']; ?>
									</div>
									<div class="event-local">
										<?php echo $events_att[0]['location']; ?>								
									</div>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</section>
			</div>
		</div>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
