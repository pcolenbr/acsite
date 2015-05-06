<?php get_header(); ?>
<?php $currentlang = pll_current_language(); ?>
<div id="wrap-about">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<header>
			<?php get_template_part('menu'); ?>
		</header>

		<!-- This part comes from the home page -->
		<?php $home_page = get_page_by_title("home");?>
		<?php $ac_section = get_post_meta( $home_page->ID, 'home-avenuecodesection', true ); ?>
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

		<section id="acmoto">
			<div class="container">
				<div id="acmoto-carousel" class="owl-carousel owl-theme">
					<div id="missionTexts" class="item">
						<h2>MISSION</h2>
						<p>"Assure excellence in delivering products and consulting services, maximizing value for customers and partners."</p>
					</div>

					<div id="visionTexts" class="item">
						<h2>VISION</h2>
						<p>"Being one of the main players in the market and be a reference in software innovation using Agile methodology in our projects."</p>
					</div>

					<div id="valuesTexts" class="item">
						<h2>VALUES</h2>
						<p>"Delivering high quality products and services while maintaining a transparent relationship with customers and partners, based on responsibility and reliability between the parties."</p>
					</div>
				</div>
			</div>
		</section>

		<section id="leadership">
			<div class="container" id="external-leadership-container">
				<div id="internal-leadership-container">
					<?php if($currentlang=="en") { ?>
						<div id="amir_button" class="col-xs-6">
							<h4>Amir Razmara</h4>
							<p>Managing Partner</p>
						</div>

						<div id="zeo_button" class="col-xs-6">
							<h4>Zeo Solomon</h4>
							<p>Managing Partner</p>
						</div>

						<div class="hidden-xs about_box"  id="about_amir">
							<p>Amir is a seasoned technical leader with over 18 years of experience. He is focused on technology strategy, process innovation, and expanding Avenue Code into international market.<br><br>
							Prior to Avenue Code, Amir was most recently a Director of Engineering at Gap's online division delivering a singleshopping experience across all Gap's brands, integrating Athleta athletic attire brand into the main site, and internationalizing the shopping experience for product delivery across continental Europe. Aside Gap Amir has held various technology leadership positions at MyBuys, Sychron, ATG (Acquired by Oracle), and IBM. He is also co-founder of a socially conscious website called Favorpals and an investor in a print-on-demand eCommerce company Called Fotomoto.<br><br>
							Amir has lead delivery of various products ineCommerce, Grid, and e-Marketing verticals, for companies ranging from Fortune 100—with budgets reaching $20 MM—to startups. Amir has managed 70+ staff members in multiple engineering groups.<br><br>
							Amir holds a Bachelor's degree in Computer Science from York University.</p>
						</div>

						<div class="hidden-xs about_box" id="about_zeo">
							<p>After completing his undergraduate studies at UC Berkeley,  Zeo began his career in the Nuclear/Astrospace industry, working as a Nuclear engineer, astrophysicist and a spacecraft manager.  He quit when he discovered that the red button he was in charge of pushing was not connected to any thing!<br><br>
							Zeo made the shift to Internet technology after his graduate studies in technology management at Stanford. He launched his first start up, the international portal dalili.com back in 1997.  Dalili was later acquired before shutting down during the .com bust. He then Joined ATG, which was later acquired by Oracle, he then Joined MGN, which was acquired by Prosodie Commerce, which was later acquired by Prosodie France.<br><br>
							Zeo founded Avenue Code in 2007, with one mission minded, not to ever get acquired again, and provide excellent technology services. Ok two mission minded.<br><br>
							Zeo has been actively ingrained in large IT organizations as well as tech startups leading some of the largest web initiatives to date.  His 	accomplishments include spearheading ecommerce internationalizations across Europe, Asia and the Middle East, design and deployment of Avenue Code’s Value Based Development process within fortune 100 ecommerce companies and nurturing the flourish of Agile framework throughout the valley.</p>
						</div>
					<?php } ?>
				</div>
			</div>

			<img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/images/leadership_photo.jpg" alt="Amir and Zeo" id="leadership_img">
		</section>

		<section id="team">
			<?php
				$bios = get_post_meta( $post->ID, 'about_team', true );
				$usaBios = array();
				$brBios = array();

				if(!empty( $bios)) {
					foreach($bios as $bio) {
						if ($bio['location'] == 'USA') {
							array_push($usaBios, $bio);	
						} else {
							array_push($brBios, $bio);	
						}
					}	
				}
			?>
			<div class="container">				
				<div id="team_usa">
					<h1 class="title">USA MANAGEMENT TEAM</h1>

					<hr class="border-title"></hr>

					<?php
						if(!empty( $usaBios)) {
							create_team($usaBios);							
						}
					?>
				</div>

				<div id="team_brazil">
					<h1 class="title">TEAM BRAZIL</h1>

					<hr class="border-title"></hr>

					<?php
						if(!empty( $brBios)) {
							create_team($brBios);							
						}
					?>
				</div>

			</div>
		</section>


	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>