<?php
	/*
	Template Name: Home Page Template
	*/
?>
<?php get_header(); ?>
<?php $currentlang = pll_current_language(); ?>
<div id="wrap-home">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<header class="header">

			<div class="home-cover-header container">
				<div class = "title-box">
					<?php if($currentlang=="en") { ?>
						<h1>SOFTWARE INNOVATION IS A JOURNEY</h1>
						
						<p>Let us be your guide. Delivering the world's largest ebusiness solutions</p>
					<?php } elseif($currentlang=="pt") { ?>
						<h1>INOVAÇÃO EM SOFTWARE É UMA JORNADA</h1>
						
						<p>Entregando as maiores soluções em e-business do mundo através de um desenvolvimento superior</p>
					<?php } ?>
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
		
		<section class="container" id="what-we-do" data-submenu="avenue code">
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

		<section class="container" id="services-menu" data-submenu="<?php echo ($currentlang == 'en')? 'services' :  (($currentlang == 'pt')? 'serviços' : '') ?>">
			<?php if($currentlang == "en") { ?>
				<h1 class="title">SERVICES</h1>
			<?php } elseif($currentlang == "pt") { ?>
				<h1 class="title">SERVIÇOS</h1>
			<?php } ?>
			<hr class="border-title"></hr>

			<div class="row">
				<?php get_template_part('home-services-buttons') ?>							
			</div>
		</section>

		<section id="home-portfolio" data-submenu="<?php echo ($currentlang == 'en')? 'portfolio' :  (($currentlang == 'pt')? 'portfólio' : '') ?>">
			<?php get_template_part('clients-partners-isotopes'); ?>
		</section>

	<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>