<?php get_header(); ?>
<?php $currentlang = pll_current_language(); ?>
<div id="wrap-careers">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<header>
			<?php get_template_part('menu'); ?>
		</header>

		<section id="want-to-join">
			<div class="container">
				<h1 class="title">WANT TO JOIN THE TEAM?</h1>

				<hr class="border-title"></hr>
				
				<div class="row">
					<div class="col-xs-12 col-md-6 want-to-join-box">
						<div class="want-to-join-img-box">
							<img class="img-responsive want-to-join-img" src="<?php bloginfo('template_directory'); ?>/images/careers_tech.png">
						</div>
						<div class="want-to-join-inner-box">
							<h4 class="want-to-join-title">TECH</h4>
							<p class="want-to-join-description">Do you own multiple superhero t-shirts? Do you spend more of your time looking at screens than the real world? Do people tell you that you are a bit of a geek? Well, even if you aren't, but you are a hardcore developer, engineer, or Agile coach, etc., you should check out our open positions.</p>
							<a class="btn btn-blue want-to-join-btn" href="<?php get_permalink(); ?>">OPEN POSITIONS (United States)</a>
							<br>
							<a class="btn btn-blue want-to-join-btn" href="http://www.jobs.net/jobs/avenuecode/en-us/">OPEN POSITIONS (Brazil)</a>
						</div>
					</div>

					<div class="col-xs-12 col-md-6 want-to-join-box">
						<div class="want-to-join-img-box">
							<img class="img-responsive want-to-join-img" src="<?php bloginfo('template_directory'); ?>/images/careers_recruiting.png">
						</div>
						<div class="want-to-join-inner-box">
							<h4 class="want-to-join-title">RECRUITING/ACCOUNT MANAGEMENT</h4>
							<p class="want-to-join-description">You love helping people to succeed. You are people-savvy, funny, and outgoing. Yes, you are wickedly smart and good at finding the right talent, right consultants, and right projects. If people call you a go-getter, social butterfly, or entrepreneur, you are pretty close to being exactly what we are looking for.</p>
							<a class="btn btn-blue want-to-join-btn" href="mailto:jobs@avenuecode.com">SUBMIT RESUME (United States)</a>
							<br>
							<a class="btn btn-blue want-to-join-btn" href="http://www.jobs.net/jobs/avenuecode/en-us/">SUBMIT RESUME (Brazil)</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php $main_new = get_post_meta( $post->ID, 'career_main_new', true ); ?>
		<?php if(!empty($main_new)) { ?>
			<section id="main-new">
				<?php
					$bg_img_src = "";
					if(!empty($main_new[0]['background-image'])) {
	 					$bg_img_src = wp_get_attachment_image_src( $main_new[0]['background-image'], 'full' );
	 				}
	 			?>
				<div id="main-new-bg-div" style="background-image: url('<?php echo $bg_img_src[0]; ?>');>">
					<div class="container">
						<h1 class="title"><?php echo $main_new[0]['title']; ?></h1>
						<hr class="border-title"></hr>
						<?php if( !empty( $main_new[0]['subtitle'] ) ){ ?>
			 				<h2 class="subtitle"><?php echo $main_new[0]['subtitle']; ?></h2>
			 			<?php } ?>

			 			<?php if(!empty($main_new[0]['text'])) { ?>
							<div id="main-new-white-box">
								<?php echo $main_new[0]['text']; ?>
							</div>
						<?php } ?>
					</div>

				</div>

				<div id="main-new-banner">
					<?php 
						$img1_src = wp_get_attachment_image_src( $main_new[0]['image-1'], 'full' ); 
						$img2_src = wp_get_attachment_image_src( $main_new[0]['image-2'], 'full' ); 
						$img3_src = wp_get_attachment_image_src( $main_new[0]['image-3'], 'full' );  
						$img4_src = wp_get_attachment_image_src( $main_new[0]['image-4'], 'full' );
					?>

					<img class="main-new-banner-img" src="<?php echo $img1_src[0] ?>" />
					<img class="main-new-banner-img" src="<?php echo $img2_src[0] ?>" />
					<img class="main-new-banner-img" src="<?php echo $img3_src[0] ?>" />
					<img class="main-new-banner-img" src="<?php echo $img4_src[0] ?>" />
				</div>
			</section>
		<?php } ?>

		<section id="open-positions">
			<div class="container">
				<h1 class="title">OPEN POSITIONS</h1>
				<hr class="border-title"></hr>

				<ul class="list-inline">
					<li class="open-position-location-item"><a href="#" class="btn btn-blue open-position-location-link">San Francisco</a></li>
					<li class="open-position-location-item"><a href="http://www.jobs.net/jobs/avenuecode/en-us/" target="_blank" class="btn btn-blue open-position-location-link">São Paulo</a></li>
					<li class="open-position-location-item"><a href="http://www.jobs.net/jobs/avenuecode/en-us/" target="_blank" class="btn btn-blue open-position-location-link">Belo Horizonte</a></li>
				</ul>
			</div>
		</section>

		<?php
			$working_at_items = get_post_meta( $post->ID, 'careers_working_at_ac', true );
			if(!empty($working_at_items)) {
		?>
		<section id="working-at-ac">
			<div class="container">
				<h1 class="title">WORKING AT AVENUE CODE</h1>
				<hr class="border-title"></hr>
			</div>

			<nav id="working-at-ac-filters">
				<ul class="list-unstyled">
					<li class="active"><a href="#" data-filter-value="*">ALL</a></li>
					<li><a href="#" data-filter-value=".events">EVENTS</a></li>
					<li><a href="#" data-filter-value=".activities">ACTIVITIES</a></li>
					<li><a href="#" data-filter-value=".perks">PERKS</a></li>
					<li><a href="#" data-filter-value=".acfamily">AC FAMILY</a></li>
					<li><a href="#" data-filter-value=".brazil">BRAZIL</a></li>
				</ul>
			</nav>

			<div id="working-at-ac-isotopes">
				<?php
					foreach($working_at_items as $working_at_item) {
						$tags = explode(', ', $working_at_item['tag']);
						$image = wp_get_attachment_image_src( $working_at_item['image'], 'full' );
				?>
						<div class="working-at-ac-item <?php foreach ($tags as $tag) {echo $tag . ' ';} ?>">
							<span class="working-at-ac-hover">
								<span class="table">
									<span class="middle">
										<p class="description"><?php echo $working_at_item["description"]?></p>
									</span>
								</span>
							</span>
							<img src="<?php echo $image[0] ?>">
						</div>
				<?php } ?>
			</div>
		</section>
		<?php } ?>

	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>