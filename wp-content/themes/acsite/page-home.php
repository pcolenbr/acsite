<?php get_header(); ?>
<?php $currentlang = pll_current_language(); ?>
<div id="wrap-home">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<header class="header">

			<div class="home-cover-header container">
				<div class = "title-box">
					<?php $cover_texts = get_post_meta( $post->ID, 'homecovertexts', true ); ?>

					<h1><?php if(!empty($cover_texts[0]['title']))
															echo $cover_texts[0]['title']; ?></h1>
						
					<p><?php if(!empty($cover_texts[0]['subtext']))
														echo $cover_texts[0]['subtext']; ?></p>
				</div>
			</div>

			<div id="header-carousel" class="owl-carousel owl-theme">
				<?php 			
					foreach( get_cfc_meta( 'headerimage' ) as $key => $value ) {
	    		?>
	    			<div class="item"><img class="img-responsive" src="<?php the_cfc_field( 'headerimage','carousel-image', false, $key ); ?>"/></div>
	    		<?php
					}
			 	?>
			</div>

			<?php get_template_part('menu'); ?>
		</header>

		<?php $ac_section = get_post_meta( $post->ID, 'home-avenuecodesection', true ); ?>
		
		<section class="container" id="what-we-do">
			<?php if(!empty($ac_section[0]['title'])) { ?>
				<h1 class="title"><?php echo $ac_section[0]['title'];?></h1>
			<?php } ?>

			<hr class="border-title"></hr>

			<?php if(!empty($ac_section[0]['subtitle'])) { ?>
				<h2><?php echo $ac_section[0]['subtitle'];?></h2>
			<?php } ?>

			<?php if(!empty($ac_section[0]['body-text'])) { ?>
				<div>
					<?php echo $ac_section[0]['body-text'];?>
				</div>
			<?php } ?>
		</section>

		<section class="container" id="services">
			<?php if($currentlang=="en"):?>
				<h1 class="title">SERVICES</h1>
			<?php elseif($currentlang=="pt"):?>
				<h1 class="title">SERVIÇOS</h1>
			<?php endif; ?>
			<hr class="border-title"></hr>

			<div class="row">
				<?php get_template_part('home-services-buttons') ?>							
			</div>
		</section>

		<section class="container" id="clients">
			<?php $home_portfolio_header = get_post_meta( $post->ID, 'home-portfolioheader', true ); ?>
			
			<?php if( !empty( $home_portfolio_header[0]['title'] ) ) { ?>
				<h1 class="title"><?php echo $home_portfolio_header[0]['title'] ?></h1>
			<?php } ?>

			<hr class="border-title"></hr>

			<?php if( !empty( $home_portfolio_header[0]['subtitle'] ) ) { ?>
				<h3 class="subtitle"><?php echo $home_portfolio_header[0]['subtitle']; ?></h3>
			<?php } ?>

			<nav id="clients-partners-filters">
				<ul>

					<?php if($currentlang=="en") { ?>
						<li class="active"><a href="#" data-filter-value="*">ALL</a></li>
						<li><a href="#" data-filter-value=".partner">PARTNER</a></li>
						<li><a href="#" data-filter-value=".client">CLIENT</a></li>	
					<?php } elseif($currentlang=="pt") { ?>
						<li class="active"><a href="#" data-filter-value="*">TODOS</a></li>
						<li><a href="#" data-filter-value=".partner">PARCEIROS</a></li>
						<li><a href="#" data-filter-value=".client">CLIENTES</a></li>						
					<?php } ?>
					
				</ul>
			</nav>


			<div id="clients-partners-isotopes">
				<?php $args_events = array('post_type' => 'clients_partners', 'posts_per_page' => -1, ); ?>

				<?php $query = new WP_Query( $args_events ); ?>

				<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

					<?php $client_info = get_post_meta( $post->ID, 'client_info', true ); ?>
					<?php if(!empty($client_info)): ?>
						<?php if(get_the_content() != '' ): ?>
							<a href="<?php the_permalink(' ') ?>">
						<?php endif; ?>		

						<div class="clients-partners-item <?php echo $client_info[0]["tag"]; ?>">
							<span class="clients-partners-hover">
								<span class="table">
									<span class="middle">
										<?php if (!empty($client_info[0]["description"])){ ?>
											<p class="description"><?php echo $client_info[0]["description"]; ?></p>
										<?php } ?>
									</span>
								</span>
							</span>
							
							<?php $background_src = wp_get_attachment_image_src( $client_info[0]['background-image'], 'full' ); ?>
							<img src="<?php echo $background_src[0]; ?>" alt="">
						</div>

						<?php if(get_the_content() != '' ): ?>
							</a>	
						<?php endif; ?>
					<?php endif; ?>

				<?php endwhile; ?>

				<?php else : ?>

					<h2>No Clients and Partners</h2>

				<?php endif; ?>
			</div>

		</section>

	<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>