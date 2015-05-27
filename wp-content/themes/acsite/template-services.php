<?php
	/*
	Template Name: Services Page Template
	*/
?>
<?php get_header(); ?>
<?php $currentlang = pll_current_language(); ?>
<div id="wrap-services">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<header>
			<?php get_template_part('menu'); ?>
		</header>

		<section id="top" data-submenu="services">
			<div class="container">
				<?php if($currentlang=="en") { ?>
					<h1 class="title">SERVICES</h1>
				<?php } elseif($currentlang=="pt") { ?>
					<h1 class="title">SERVIÇOS</h1>
				<?php } ?>
				<hr class="border-title"></hr>

				<?php get_template_part('home-services-buttons') ?>
			</div>
		</section>

		<section id="clients_partners" data-submenu="clients &amp; partners">
			<?php get_template_part('clients-partners-isotopes'); ?>
		</section>

		<section id="multimidias" data-submenu="multimedia">
			<?php 
				$args = array('post_type' => 'multimedia', 'posts_per_page' => 15);
				$multimedias = get_posts($args);
			?>
			<div class="container">
				<?php if($currentlang=="en") { ?>
					<h1 class="title">MULTIMEDIA</h1>
				<?php } elseif($currentlang=="pt") { ?>
					<h1 class="title">MULTIMÍDIA</h1>
				<?php } ?>
				<hr class="border-title"></hr>		
		
				<div id="container-multimedias" class="col-xs-12 col-md-8" filter-layout="masonry">
					<?php
						if(!empty($multimedias)) { 
							$i = 0;
							foreach($multimedias as $multimedia) {
								$post_id = $multimedia->ID;
								$custom_fields = get_post_custom( $post_id );
								$frameID = "iframe-" . $post_id;
								$post_cat = get_the_category($post_id);

								echo '<div class="multimedia-element ' . $post_cat[0]->slug . ' all">';
								echo '<iframe id="' . $frameID . '" class="multimedia-iframe" src="//' . $custom_fields["multimedia-link"][0] . '" allowfullscreen frameborder="0"></iframe>';
						
								echo '<h4 class="multimedia-title">' . $multimedia->post_title . '</h4>';
								echo '</div>';
							}
						}
					?>
				</div>

				<div class="hidden-xs hidden-sm col-md-4">
					<?php if($currentlang=="en") { ?>
						<h4 class="subtitle">CATEGORIES</h4>
					<?php } elseif($currentlang=="pt") { ?>
						<h4 class="subtitle">CATEGORIAS</h4>
					<?php } ?>
					
					<?php
						$multimedia_cat_id = get_cat_ID("multimedia");
						$args = array('parent' => $multimedia_cat_id);
						$multimedia_sub_cats = get_categories($args);

						echo '<ul id="multimedia-filters" class="list-unstyled">';
						if($currentlang=="en") {
							echo '<li class="multimedia-menu-item"><a class="btn btn-blue multimedia-menu-item-link active" href="#" data-filter-value=".all">All</a></li>';
						} elseif($currentlang=="pt") {
							echo '<li class="multimedia-menu-item"><a class="btn btn-blue multimedia-menu-item-link active" href="#" data-filter-value=".all">Tudo</a></li>';
						}
						foreach ($multimedia_sub_cats as $cat) {
							echo '<li class="multimedia-menu-item"><a class="btn btn-blue multimedia-menu-item-link" href="#" data-filter-value=".' . $cat->slug . '">' . $cat->name . '</a></li>';
						}
						echo '</ul>';
					?>

				</div>
			</div>
		</section>

	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>