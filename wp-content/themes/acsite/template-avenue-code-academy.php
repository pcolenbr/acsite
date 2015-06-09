<?php
	/*
	Template Name: Avenue Code Academy Page Template
	*/
?>
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

		<?php $services_header = get_post_meta( $post->ID, 'services_header', true ); ?>
		<div class="service-title container">
	        <div class="hexagon-services">
	        	<div class="hexagon-mask">
	            	<span class="mask"></span>
	                <span class="mask-bg"></span>
	             	<?php $image = get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
	                <?php echo $image; ?>
	        	</div>
	        </div>

	        <div class="div-title">
                <?php if(!empty($services_header[0]['title'])) { ?>
					<h1><?php echo $services_header[0]['title'];?></h1>
				<?php } ?>

				<hr class="border-title"></hr>

				<?php if(!empty($services_header[0]['subtitle'])) { ?>
					<h2><?php echo $services_header[0]['subtitle'];?></h1>
				<?php } ?>
	        </div>

	        <div class="div-body">
	        	<?php if(!empty($services_header[0]['body'])) { ?>
					<?php echo $services_header[0]['body'];?>
				<?php } ?>
	        </div>
        </div>
		
		<section id="trainings" class="container">
			<h1>CERTIFICATIONS & TRAININGS</h1>
			<hr class="border-title"></hr>

		<?php 
			$args = array( 
					'post_type' => 'product',
					'meta_query' => array(array('key' => '_stock_status', 'value' => 'instock','compare' => '='))
					);
			$products = new WP_Query($args);
			if ($products->have_posts()) {
				while ( $products->have_posts() ) : $products->the_post(); global $product;
		?>
			<div class="row">
				<div class="col-md-4 image-div">
					<?php echo get_the_post_thumbnail($products->post->ID, 'shop_catalog'); ?>
				</div>

				<div class="col-md-8">
					<h3 class="training-title"><?php the_title(); ?></h3>
					<div class="traning-description">
						<?php the_excerpt(); ?>
					</div>
					<a class="btn btn-blue" href="<?php echo get_permalink( $loop->post->ID ) ?>">More Details</a>
				</div>
			</div>
        <?php 
        		endwhile;
        	} else {}
        ?>
		<?php wp_reset_query(); ?>
		</section>

	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>