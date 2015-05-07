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

		<section id="culture">
			<div class="container">
				<h1 class="title">CULTURE</h1>

				<hr class="border-title"></hr>

				<h3 class="subtitle">"You have brains in your head. You have feet in your shoes. You can steer yourself any direction you chose.<br>You're on your own. And you know what you know. And YOU are the who'll decide where to go... "<br><br>-Dr. Seuss</h3>

				<div id="content" class="row">
					<div class="col-xs-12 col-sm-12 col-md-6">
						<p>We encourage big dreams. We believe the journey to achieving these dreams starts with our culture.</p>
				        <p>At Avenue Code, we promote:</p>
				        
				        <h1 class="culture-keyword">GROWTH</h1>
				        <p>Take initiative to learn to new things that interest you and benefit the team.</p>
				        
				        <h1 class="culture-keyword">EQUALITY</h1>
				        <p>In our ego-free office, we have an open door policy.<br>Take your ideas all the way to the top.</p>
				        
				        <h1 class="culture-keyword">CREATIVE EXCELLENCE</h1>
				        <p>We are a diverse community of strategists who love to find original solutions to complex challenges.</p>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-6">
						<img src="<?php bloginfo('template_directory'); ?>/images/suitcaseNoBkg.png" class="img-responsive">
					</div>
				</div>
			</div>
		</section>

		<section id="beginning">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6">
						<img src="<?php bloginfo('template_directory'); ?>/images/in_the_beginning_2.jpg" alt="USA Beginning Photo" id="usaBeginningPhoto" class="img-responsive"/>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-6">
						<h5 class="subtitle">IN THE BEGINNING...</h5>
						<p>We started as a small group of people in a one-room office in San Francisco’s Financial District. Zeo began by helping a big IT organization with their Agile transformation and soon had a desire to develop more talent with these skills and help IT organizations become more innovative, efficient, and Agile. Amir joined the journey early on, bringing his expertise in large-scale software development to the table. Today Avenue Code has multiple offices in different countries with a plethora of Fortune 100 clients.</p>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-8">
						<h5 class="subtitle">THE ORIGIN OF OUR BRAZIL TEAM...</h5>
						<p>We started in a very small office, where the bathroom served as a phone booth, in the middle of multi-cultural Belo Horizonte's Savassi neighborhood. As a group of four people we concept-proofed the nearshore strategy, exercising Agile methodologies and leveraging video conferences, often streaming continuous live video feed so that the remote team felt like they were in the same room as their peers. Two people covered administration, human resources, finances, accountability, recruiting, facilities, engineering management and UI training, and coaching the team with their English.</p>
						<p>In nine months we had tripled in size and had to move to a larger office in Savassi. We created a recruiting group, and established a mentoring team known as "buddies." We were able to accelerate our growth, expanding to over 50 people. By the second year, our third office was set up in partnership with Pontifícia Universidade Católica (PUC) university, on the university campus. Avenue Code started to take part in larger conferences and events around the development of the Agile community in Brazil. We gained clients in São Paulo and today have grown to more than 150 people. Avenue Code consolidated the teams in Belo Horizonte into a single expansive office in Savassi, adding a new office in São Paulo, and we serve an expanding set of clients in the United States and Brazil.</p>
					</div>

					<div id="brPhotosContainer" class = "col-xs-12 col-sm-12 col-md-4">
						<img src="<?php bloginfo('template_directory'); ?>/images/in_the_beginning_br01.jpg" alt="Brazil's Beginning Photo" class="brBeginningPhoto img-responsive"/>
						<img src="<?php bloginfo('template_directory'); ?>/images/in_the_beginning_br02.jpg" alt="Brazil's Beginning Photo" class="brBeginningPhoto img-responsive"/>
					</div>
				</div>
			</div>
		</section>

		<section id="here-we-are">
			<div id="header" class="container">
				<h1 class="title">...and now here we are</h1>
				<hr class="border-title"></hr>
				<h3>we are continuously growing - as a company, as individuals, and as a driven team...</h3>
			</div>

			<div id="make_inovation">
				<div class="container">
					<h2 class="text">MAKE WAY FOR INNOVATION</h2>
				</div>
			</div>
		</section>

		<section id="events">
			<?php 
				$args = array('post_type' => 'event', 'posts_per_page' => 1,);
				$event = get_posts($args);
			?>

			<div class="container">
				<h1 class="title">EVENTS</h1>
				<hr class="border-title"></hr>

				<div class="content">
					<?php if (!empty($event)) { ?>
						<?php $events_att = get_post_meta( $event[0]->ID, 'events_attributes', true); ?>
						<h3 class="post_title"><?php echo $event[0]->post_title ?></h3>
						<div class="details"><?php echo $events_att[0]['event-date'] .'<br>'. $events_att[0]['event-local']; ?></div>	
					<?php } else { ?>
						<h3 class="empty_array">No Upcoming Events</h3>
					<?php } ?>
				</div>

				<a href="<?php echo esc_url(get_permalink(get_page_by_title('events'))); ?>" class="btn btn-blue">See More Events</a>
			</div>
		</section>

		<section id="press">
			<?php 
				$args = array('post_type' => 'releases', 'posts_per_page' => 1,);
				$releases = get_posts($args);
			?>

			<div class="container">
				<h1 class="title">PRESS</h1>
				<hr class="border-title"></hr>

				<div class="content">
					<?php if (!empty($releases)) { ?>
						<a class="press_link" href="<?php echo get_permalink($releases->ID) ?>">
							<h3 class="post_title"><?php echo $releases[0]->post_title ?></h3>
							<div class="excerpt"><?php echo $releases[0]->post_excerpt ?></div>	
						</a>
					<?php } else { ?>
						<h3 class="empty_array">No Press Releases</h3>
					<?php } ?>
				</div>

				<a href="<?php echo esc_url(get_permalink(get_page_by_title('press'))); ?>" class="btn btn-blue">Read More Articles</a>
			</div>
		</section>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>