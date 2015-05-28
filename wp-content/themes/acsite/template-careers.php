<?php
	/*
	Template Name: Careers Page Template
	*/
?>
<?php get_header(); ?>
<?php $currentlang = pll_current_language(); ?>
<div id="wrap-careers">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<header>
			<?php get_template_part('menu'); ?>
		</header>

		<section id="want-to-join" data-submenu="<?php echo ($currentlang == 'en')? 'want to join the team?' :  (($currentlang == 'pt')? 'deseja fazer parte do nosso time?' : '') ?>">
			<div class="container">
				<h1 class="title">WANT TO JOIN THE TEAM?</h1>

				<hr class="border-title"></hr>
				
				<div class="row">
					<div class="col-xs-12 col-md-6 want-to-join-box">
						<div class="want-to-join-img-box">
							<img class="img-responsive want-to-join-img" src="<?php bloginfo('template_directory'); ?>/images/careers_tech.png">
						</div>
						<div class="want-to-join-inner-box">
							<?php if($currentlang=="en") { ?>
								<h4 class="want-to-join-title">TECH</h4>
								<p class="want-to-join-description">Do you own multiple superhero t-shirts? Do you spend more of your time looking at screens than the real world? Do people tell you that you are a bit of a geek? Well, even if you aren't, but you are a hardcore developer, engineer, or Agile coach, etc., you should check out our open positions.</p>
								<a class="btn btn-blue want-to-join-btn" href="<?php get_permalink(); ?>">OPEN POSITIONS (United States)</a>
								<br>
								<a class="btn btn-blue want-to-join-btn" href="http://www.jobs.net/jobs/avenuecode/en-us/">OPEN POSITIONS (Brazil)</a>
							<?php } elseif($currentlang=="pt") { ?>
								<h4 class="want-to-join-title">TECNOLOGIA</h4>
								<p class="want-to-join-description">Você possui várias camisetas de super-herói? Você passa a maior parte do seu tempo olhando para telas do que no mundo real? As pessoas dizem que você é meio nerd? Bem, mesmo que você não seja, mas você é um ótimo desenvolvedor, engenheiro ou instrutor de Agile e etc, você deveria dar uma olhada em nossas vagas disponíveis.</p>
								<a class="btn btn-blue want-to-join-btn" href="http://www.jobs.net/jobs/avenuecode/en-us/">VAGAS DISPONÍVEIS</a>
							<?php } ?>
						</div>
					</div>

					<div class="col-xs-12 col-md-6 want-to-join-box">
						<div class="want-to-join-img-box">
							<img class="img-responsive want-to-join-img" src="<?php bloginfo('template_directory'); ?>/images/careers_recruiting.png">
						</div>
						<div class="want-to-join-inner-box">
							<?php if($currentlang=="en") { ?>
								<h4 class="want-to-join-title">RECRUITING/ACCOUNT MANAGEMENT</h4>
								<p class="want-to-join-description">You love helping people to succeed. You are people-savvy, funny, and outgoing. Yes, you are wickedly smart and good at finding the right talent, right consultants, and right projects. If people call you a go-getter, social butterfly, or entrepreneur, you are pretty close to being exactly what we are looking for.</p>
								<a class="btn btn-blue want-to-join-btn" href="mailto:jobs@avenuecode.com">SUBMIT RESUME (United States)</a>
								<br>
								<a class="btn btn-blue want-to-join-btn" href="http://www.jobs.net/jobs/avenuecode/en-us/">SUBMIT RESUME (Brazil)</a>
							<?php } elseif($currentlang=="pt") { ?>
								<h4 class="want-to-join-title">GERENTE DE CONTA / DESENVOLVIMENTO DE NEGÓCIOS</h4>
								<p class="want-to-join-description">Você adora ajudar as pessoas a terem sucesso. Você é conhecedor de gente, engraçado e extrovertido. Sim, você é muito inteligente e bom em encontrar o talento certo, o consultor certo e os projetos certos. Se as pesoas te chamam de 'gente que faz', 'amigo de todos' ou 'empreendedor', você está bem perto do que estamos procurando.</p>
								<a class="btn btn-blue want-to-join-btn" href="http://www.jobs.net/jobs/avenuecode/en-us/">ENVIAR CURRÍCULO</a>								
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php $main_new = get_post_meta( $post->ID, 'career_main_new', true ); ?>
		<?php if(!empty($main_new)) { ?>
			<section id="main-new" data-submenu="<?php echo ($currentlang == 'en')? 'training program' :  (($currentlang == 'pt')? 'programa de treinamento' : '') ?>">
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

		<section id="open-positions" data-submenu="<?php echo ($currentlang == 'en')? 'open positions' :  (($currentlang == 'pt')? 'vagas disponíveis' : '') ?>">
			<div class="container">
				<h1 class="title">OPEN POSITIONS</h1>
				<hr class="border-title"></hr>
				
				<ul class="list-inline">
					<?php if($currentlang=="en") { ?>
						<li class="open-position-location-item"><a href="#open-positions" class="btn btn-blue open-position-location-link">San Francisco</a></li>
					<?php } ?>
					<li class="open-position-location-item"><a href="http://www.jobs.net/jobs/avenuecode/en-us/" target="_blank" class="btn btn-blue open-position-location-link">São Paulo</a></li>
					<li class="open-position-location-item"><a href="http://www.jobs.net/jobs/avenuecode/en-us/" target="_blank" class="btn btn-blue open-position-location-link">Belo Horizonte</a></li>
				</ul>

				<?php if($currentlang=="en") { ?>
					<div class="list-inline" id="job-list">
						<table id="jobs-table" class="positions-list"></table>
					</div>
					<div id="job-details">
						<h2 id="job-title"></h2>
						<h4 id="job-city-and-type"></h4>
						<p id="job-description"></p>
						<div>
							<div id="back-apply-btn">
								<a class="btn btn-blue back-btn" id="back-to-table" href="#open-positions"><i class="fa fa-arrow-left back"></i>BACK</a>
								<a href="" class="btn btn-blue" id="btnApply" target="_blank">APPLY NOW</a>
							</div>
							<div class="jobShareBtn">
								<a id="shareFacebook" target="_blank" href="http://www.facebook.com/sharer.php?u=avenuecode.com/acnew/careers"><img src="<?php bloginfo('template_directory'); ?>/images/share_facebook.png"></a>
							</div>
						</div>	
					</div>
				<?php } ?>
			</div>
		</section>

		<?php
			$working_at_items = get_post_meta( $post->ID, 'careers_working_at_ac', true );
			if(!empty($working_at_items)) {
		?>
		<section id="working-at-ac" data-submenu="<?php echo ($currentlang == 'en')? 'working at avenue code' :  (($currentlang == 'pt')? 'trabalhando na avenue code' : '') ?>">
			<div class="container">
				<?php if($currentlang=="en") { ?>
					<h1 class="title">WORKING AT AVENUE CODE</h1>
				<?php } elseif($currentlang=="pt") { ?>
					<h1 class="title">TRABALHANDO NA AVENUE CODE</h1>
				<?php } ?>
				<hr class="border-title"></hr>
			</div>

			<nav id="working-at-ac-filters">
				<ul class="list-unstyled">
					<?php if($currentlang=="en") { ?>
						<li class="active"><a href="#" data-filter-value="*">ALL</a></li>
						<li><a href="#" data-filter-value=".events">EVENTS</a></li>
						<li><a href="#" data-filter-value=".activities">ACTIVITIES</a></li>
						<li><a href="#" data-filter-value=".perks">PERKS</a></li>
						<li><a href="#" data-filter-value=".acfamily">AC FAMILY</a></li>
						<li><a href="#" data-filter-value=".brazil">BRAZIL</a></li>
					<?php } elseif($currentlang=="pt") { ?>
						<li class="active"><a href="#" data-filter-value="*">TUDO</a></li>
						<li><a href="#" data-filter-value=".events">EVENTOS</a></li>
						<li><a href="#" data-filter-value=".activities">ATIVIDADES</a></li>
						<li><a href="#" data-filter-value=".perks">VANTAGENS</a></li>
						<li><a href="#" data-filter-value=".acfamily">FAMÍLIA AC</a></li>
						<li><a href="#" data-filter-value=".brazil">BRASIL</a></li>
					<?php } ?>
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