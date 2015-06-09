<?php get_header(); ?>
<?php $currentlang = pll_current_language(); ?>
<div id="wrap-single-code-highway">

	<header>
		<?php get_template_part('menu'); ?>
	</header>

	<section class="section">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="container">
				<div id="post-code-highway">
					<section id="post-header">
						<div id="authorAvatar">
							<div class="hexagon-profile">
								<div class="hexagon-mask" id="maskPost">
									<span class="mask"></span>
									<img src="<?php echo get_wp_user_avatar_src($user_id); ?>" alt="Author Avatar">
								</div>
							</div>
						</div>

						<div id="postAttributes">
							<div class ="postAttributeItem">
								<img src="<?php bloginfo('template_directory'); ?>/images/clock.png" >
								<span><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
							</div>	

							<div class ="postAttributeItem">
								<img src="<?php bloginfo('template_directory'); ?>/images/comments.png" >
								<span><?php echo comments_number( )?></span>
							</div>
						</div>

						<hr class="post-border-title"></hr>
					
						<?php $sub_title = get_post_meta( $post->ID, 'code_highway_post_subtitle', true ); ?>
						<h1 class="post-title"><?php echo get_the_title(); ?></h1>			
						<?php if( !empty( $sub_title[0]['subtitle'] ) ){ ?>
					 		<h2 class="post-subtitle"><?php echo $sub_title[0]['subtitle']; ?></h2>
					 	<?php } ?>

					 	<div id="by-author">
							<span>By <?php the_author(); ?></span>
						</div>
					</section>

					<section id="post-content">
						<div id="text">
							<?php the_content(); ?>
						</div>

						<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
						
						<?php comments_template(); ?>
					</section>
				</div>
			</div>
		<?php endwhile; endif; ?>
	</section>
</div>
<?php get_footer(); ?>