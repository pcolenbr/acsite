<?php
	/*
	Template Name: Press Page Template
	*/
?>
<?php get_header(); ?>
<?php $currentlang = pll_current_language(); ?>
<div id="wrap-press">
	<header>
		<?php get_template_part('menu'); ?>
	</header>

	<div class="header container">
		<h1 class="title">PRESS</h1>
		<hr class="border-title"></hr>
	</div>
	
	<div class="container">
		<div class="col-sm-12 col-md-9">
			<section id="releases">
				<?php
					if (get_query_var('paged')) {
						$paged = get_query_var('paged');
					} elseif (get_query_var('page')) {
						$paged = get_query_var('page');
					} else {
						$paged = 1;
					}

					query_posts('post_type=release&posts_per_page=6&paged=' . $paged);

					if (have_posts()) : while (have_posts()) : the_post();
				?>	
				
					<div class="release">
						<h3 class="release-title"><?php the_title(); ?></h3>
						<div class="release-excerpt"><?php the_excerpt(); ?></div>
						<div class="release-read-more-div">
							<a class="release-read-more btn btn-blue" href="<?php the_permalink(' ') ?>">READ MORE...</a>
						</div>
					</div>

				<?php endwhile; else : ?>
					<h2>No posts found</h2>
				<?php endif; ?>

				<nav id="navlinks_post">
					<?php next_posts_link( 'Older posts' ); ?>
					<?php previous_posts_link( 'Newer posts' ); ?>
				</nav>
			</section>
		</div>
	</div>
</div>
<?php get_footer(); ?>
