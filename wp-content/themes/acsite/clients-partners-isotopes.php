<?php $currentlang = pll_current_language(); ?>
<section class="container" id="clients-partners-isotopes-section">		
	<h1 class="title">CLIENTS & PARTNERS</h1>

	<hr class="border-title"></hr>

	<h3 class="subtitle">
		<p>&ldquo;I don&rsquo;t see Avenue Code as a mere vendor that provides us with on-demand service. They are our partner.<br />They engage in our conversations. They understand our concerns. They really care about our success.&rdquo;<br />-- SVP of a Fortune 50 Retailer</p>
	</h3>

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
		<?php $args_events = array('post_type' => 'clients_partners', 'posts_per_page' => -1); ?>

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