<?php
	/*
	Template Name: Management Consulting Page Template
	*/
?>
<?php get_header(); ?>
<?php $currentlang = pll_current_language(); ?>
<div id="wrap-management-consulting">
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

        <?php $services_items = get_post_meta( $post->ID, 'services_body', true ); ?>
		<?php if(!empty($services_items)) { ?>
	        <div class="service-onpage-menu container">
	        	<ul class="text-center">
	                <?php 
	                	foreach( $services_items as $management_consulting_item) {
	                	$div_id = strtolower(str_replace(' ', '-', $management_consulting_item["link-title"]));
	                ?>
	                    <li><a href="#<?php echo $div_id; ?>"> <?php echo $management_consulting_item["link-title"] ?></a></li>
	                <?php } ?>
				</ul>
	        </div>
        <?php } ?>

        <section class="container" id="management-consulting-text">
	        <?php
	        	foreach( $services_items as $management_consulting_item){
	        	$div_id = strtolower(str_replace(' ', '-', $management_consulting_item["link-title"]));
	        ?>
				<div class="row" id="<?php echo $div_id; ?>">
					<div class="col-md-4 image-div">                
			        	<?php $src_management_consulting_img = wp_get_attachment_image_src( $management_consulting_item['image'], 'full' ); ?>
			            <img class="img-responsive" src= <?php echo $src_management_consulting_img[0]; ?> alt="">
	                </div>

	                <div class="col-md-8 text">
	                 	<h3><?php echo $management_consulting_item["title"]; ?></h3>
	                   	<?php echo $management_consulting_item["body"]; ?>
	                </div>
				</div>
			<?php } ?>
		</section>

	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>