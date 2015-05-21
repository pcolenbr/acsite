<?php get_header(); ?>
<?php $currentlang = pll_current_language(); ?>
<div id="wrap-code-highway">
	<header>
		<?php get_template_part('menu'); ?>
	</header>

	<section id="blog">
		<div class="container">
			<div class="row">
			<div class="col-xs-12 col-md-8">
				<h1 class="title">CODE HIGHWAY</h1>
				<hr class="border-title"></hr>

				<div id="code-highway-isotopes">
				<?php
					if (get_query_var('paged')) {
							$paged = get_query_var('paged');
					} elseif (get_query_var('page')) {
						$paged = get_query_var('page');
					} else {
						$paged = 1;
					}

					query_posts('posts_per_page=6&paged=' . $paged); 

					$cat_array = array();
					
					if (have_posts()) : while (have_posts()) : the_post(); 
						$post_categories = get_the_category( $post->ID );
						$cat_class = "";

					foreach($post_categories as $cat){
						if(get_cat_ID("blog") == $cat->category_parent) {
							$cat_class .= " " . $cat->slug;

							if($cat->slug != "all"){
								$cat_array[$cat->slug] = $cat->name;
							}
						}
					}

					$post_image_url = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'large' );

					$background_color = mt_rand(0, 1);
					$color_class = "baseBackground";
					if ($background_color == 1) {
						$color_class = "orangeBackground";	
					}
				?>
				
					
					<div class="code-highway-item<?php echo $cat_class; ?>">
						<a class="code-highway-item-link" href="<?php the_permalink() ?>">
							<?php if(!empty($post_image_url)) { ?>
								<img class="code-highway-img" src="<?php echo $post_image_url[0]; ?>">
							<?php } ?>

							<div class="blogItemTitle <?php echo $color_class ?>">
								<?php the_title(); ?>
							</div>

							<div class="blogItemDate">
								<span><?php the_author(); ?> - <?php echo get_the_date('M j, Y'); ?></span>
							</div>
							<div class="blogItemExcerpt">
								<?php the_excerpt() ?>
							</div>
						</a>
					</div>
				<?php endwhile; else : ?>
					<h2>No posts found</h2>
				<?php endif; ?>	
				</div>

				<nav id="navlinks_post">
					<?php next_posts_link( 'Older posts' ); ?>
					<?php previous_posts_link( 'Newer posts' ); ?>
				</nav>	
			</div>

			<div class="col-xs-12 col-md-4">
				<nav id="code-highway-filters">
					<h4 id="code-highway-filters-title">CATEGORIES</h4>
					<ul class="list-unstyled">
						<li class="active code-highway-filters-item"><a class="btn btn-blue code-highway-filters-link" href="#" data-filter-value="*">ALL</a></li>
						<?php foreach ($cat_array as $slug => $name) { ?>
							<li class="code-highway-filters-item"><a class="btn btn-blue code-highway-filters-link" href="#" data-filter-value=".<?php echo $slug; ?>"><?php echo $name ?></a></li>
						<?php }; ?>
					</ul>
				</nav>
			</div>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>