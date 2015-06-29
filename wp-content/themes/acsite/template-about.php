<?php
	/*
	Template Name: About Page Template
	*/
?>
<?php get_header(); ?>
<?php $currentlang = pll_current_language(); ?>
<div id="wrap-about">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<header>
			<?php get_template_part('menu'); ?>
		</header>

		<!-- This part comes from the home page -->
		<?php if($currentlang=="en") { ?>
			<?php $home_page = get_page_by_path('/home');?>
		<?php } elseif($currentlang=="pt") { ?>
			<?php $home_page = get_page_by_path('/inicio');?>
		<?php } ?>
		<?php $ac_section = get_post_meta( $home_page->ID, 'home-avenuecodesection', true ); ?>
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

		<section id="acmoto">
			<div class="container">
				<div id="acmoto-carousel" class="owl-carousel owl-theme">
					<?php if($currentlang=="en") { ?>
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
					<?php } elseif($currentlang=="pt") { ?>
						<div id="missionTexts" class="item">
							<h2>MISSÃO</h2>
							<p>"Garantir excelência na entrega de produtos e serviços de consultoria, maximizando valores para clientes e parceiros."</p>
						</div>

						<div id="visionTexts" class="item">
							<h2>VISÃO</h2>
							<p>"Estar entre os principais players do mercado e ser referência em inovação de software empregando a metodologia Agile em nossos projetos."</p>
						</div>

						<div id="valuesTexts" class="item">
							<h2>VALORES</h2>
							<p>"Forncer produtos e serviços de alta qualidade, mantendo relacionamentos transparentes com clientes e parceiros, baseado na responsabilidade e confiança entre os mesmos."</p>
						</div>

					<?php } ?>
				</div>
			</div>
		</section>

		<section id="leadership" data-submenu="<?php echo ($currentlang == 'en')? 'leadership' :  (($currentlang == 'pt')? 'liderança' : '') ?>">
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
							Prior to Avenue Code, Amir was most recently a Director of Engineering at Gap's online division delivering a single shopping experience across all Gap's brands, integrating Athleta athletic attire brand into the main site, and internationalizing the shopping experience for product delivery across continental Europe. Aside Gap Amir has held various technology leadership positions at MyBuys, Sychron, ATG (Acquired by Oracle), and IBM. He is also co-founder of a socially conscious website called Favorpals and an investor in a print-on-demand e-commerce company Called Fotomoto.<br><br>
							Amir has lead delivery of various products in e-Commerce, Grid, and e-Marketing verticals, for companies ranging from Fortune 100—with budgets reaching $20 MM—to startups. Amir has managed 70+ staff members in multiple engineering groups.<br><br>
							Amir holds a Bachelor's degree in Computer Science from York University.</p>
						</div>

						<div class="hidden-xs about_box" id="about_zeo">
							<p>After completing his undergraduate studies at UC Berkeley, Zeo began his career in the Nuclear/Astrospace industry, working as a Nuclear engineer, astrophysicist and a spacecraft manager. He quit when he discovered that the red button he was in charge of pushing was not connected to anything!<br><br>
							Zeo made the shift to Internet technology after his graduate studies in technology management at Stanford. He launched his first startup, the international portal dalili.com back in 1997. Dalili was later acquired before shutting down during the .com bust. He then Joined ATG, which was later acquired by Oracle, he then Joined MGN, which was acquired by Prosodie Commerce, which was later acquired by Prosodie France.<br><br>
							Zeo founded Avenue Code in 2007, as a company with a mission not to ever get acquired again, and provide excellent technology services. <br><br>
							Zeo has been actively ingrained in large IT organizations as well as tech startups leading some of the largest web initiatives to date. His accomplishments include spearheading e-commerce internationalizations across Europe, Asia and the Middle East, design and deployment of Avenue Code’s Value Based Development process within fortune 100 e-commerce companies and nurturing the flourish of Agile framework throughout the valley.</p>
						</div>
					<?php } elseif($currentlang=="pt") { ?>
						<div id="amir_button" class="col-xs-6">
							<h4>Amir Razmara</h4>
							<p>Sócio</p>
						</div>

						<div id="zeo_button" class="col-xs-6">
							<h4>Zeo Solomon</h4>
							<p>Sócio</p>
						</div>

						<div class="hidden-xs about_box"  id="about_amir">
							<p>Amir é um líder técnico experiente, com 18 anos de atuação na área. Ele está focado na estratégia de tecnologia, inovação de processos e na expansão da Avenue Code em mercados internacionais.<br><br>
							Antes de atuar na Avenue Code, Amir era Diretor de Engenharia na divisão online da GAP, responsável por entregar uma experiência única de compras em todas as marcas da GAP, integrando a marca de roupas esportivas Athleta ao site principal e internacionalizando a experiência de compras para a entrega de produtos em toda a Europa continental. Além da GAP, Amir já atuou em diversas posições de liderança em tecnologia em empresas como MyBuys, Synchron, ATG (adquirida pela Oracle) e IBM. Ele também é cofundador de um site com consciência social chamado Favorpals, além de ser um investidor em uma empresa de e-commerce de impressão sob demanda chamada Fotomoto.<br><br>
							Amir já liderou a entrega de diversos produtos de e-commerce, Grid e verticais de e-marketing para empresas do porte de membros do Fortune 100, com orçamentos atingindo $20 milhões, até startups. Amir já gerenciou equipes com 70 membros ou mais em diversos grupos de engenharia.<br><br>
							Amir possui Bacharelado em Ciência da Computação pela York University.</p>
						</div>

						<div class="hidden-xs about_box" id="about_zeo">
							<p>pós completar seus estudos de gradução na UC Berkeley, Zeo começou sua carreira na indústria nuclear/aeroespacial, trabalhando como engenheiro nuclear, astrofísico e gerente de espaçonaves. Ele desistiu da área ao descobrir que o botão vermelho pelo qual era responsável não estava conectado a nada!<br><br>
							Zeo então mudou para o campo de tecnologia da Internet após seus estudos de pós-graduação em gestão da tecnologia em Stanford. Ele lançou sua primeira startup, o portal internacional dalili.com, em 1997. Dalili foi adquirido posteriormente antes de ser fechado durante a bolha .com. Então ele se juntou à ATG, que foi adquirida pela Oracle. Em seguida ele se juntou à MGN, que foi adquirida pela Prosodie Commerce, que foi adquirida posteriormente pela Prosodie France.<br><br>
							Zeo fundou a Avenue Code em 2007 com uma missão em mente: jamais ser adquirida por outros novamente e fornecer excelentes serviços de tecnologia.<br><br>
							Zeo está ativamente envolvido em organizações de TI, assim como startups de tecnologia, liderando algumas das maiores iniciativas web até então. Suas conquistas incluem a liderança da internacionalização do e-commerce pela Europa, Ásia e Oriente Médio, desenho e entrega do processo de desenvolvimento baseado em valor da Avenue Code para empresas de e-commerce membros da Fortune 100 e favorecimento da expansão do framework Agile pelo Vale do Silício.</p>
						</div>
					<?php } ?>
				</div>
			</div>

			<img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/images/leadership_photo.jpg" alt="Amir and Zeo" id="leadership_img">
		</section>

		<section id="team" data-submenu="<?php echo ($currentlang == 'en')? 'team' :  (($currentlang == 'pt')? 'time' : '') ?>">
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
					<?php if($currentlang=="en") { ?>
						<h1 class="title">USA TEAM</h1>
					<?php } elseif($currentlang=="pt") { ?>
						<h1 class="title">TIME EUA</h1>
					<?php } ?>

					<hr class="border-title"></hr>

					<?php
						if(!empty( $usaBios)) {
							create_team($usaBios);							
						}
					?>
				</div>

				<div id="team_brazil">
					<?php if($currentlang=="en") { ?>
						<h1 class="title">BRAZIL TEAM</h1>
					<?php } elseif($currentlang=="pt") { ?>
						<h1 class="title">TIME BRASIL</h1>
					<?php } ?>

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
				<?php if($currentlang=="en") { ?>
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
				<?php } elseif($currentlang=="pt") { ?>
					<h1 class="title">CULTURA</h1>

					<hr class="border-title"></hr>

					<h3 class="subtitle">"Você tem cérebro na cabeça. Você tem pés nos seus sapatos. Você pode se levar a qualquer direção que escolher.<br>Você está por sua conta e sabe o que você sabe. E VOCÊ é quem decide aonde ir... "<br><br>-Dr. Seuss</h3>

					<div id="content" class="row">
						<div class="col-xs-12 col-sm-12 col-md-6">
							<p>Nós valorizamos os grandes sonhos. Acreditamos que a jornada para alcançar esses sonhos começa com nossa cultura.</p>
					        <p>Na Avenue Code promovemos:</p>
					        
					        <h1 class="culture-keyword">CRESCIMENTO</h1>
					        <p>Iniciativa para aprender novas coisas que possam interessar a você e beneficiar a equipe.</p>
					        
					        <h1 class="culture-keyword">IGUALDADE</h1>
					        <p>Em nosso escritório livre de egos, nossa política é a da porta aberta. Leve suas ideias até o topo.</p>
					        
					        <h1 class="culture-keyword">EXCELÊNCIA CRIATIVA</h1>
					        <p>Somos uma comunidade diversa de estrategistas que adoram encontrar soluçoes originais para desafios complexos.</p>
						</div>

						<div class="col-xs-12 col-sm-12 col-md-6">
							<img src="<?php bloginfo('template_directory'); ?>/images/suitcaseNoBkg.png" class="img-responsive">
						</div>
					</div>				
				<?php } ?>
			</div>
		</section>

		<section id="beginning" data-submenu="<?php echo ($currentlang == 'en')? 'company' :  (($currentlang == 'pt')? 'companhia' : '') ?>">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6">
						<img src="<?php bloginfo('template_directory'); ?>/images/in_the_beginning_2.jpg" alt="USA Beginning Photo" id="usaBeginningPhoto" class="img-responsive"/>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-6">
						<?php if($currentlang=="en") { ?>
							<h5 class="subtitle">IN THE BEGINNING...</h5>
							<p>We started as a small group of people in a one-room office in San Francisco’s Financial District. Zeo began by helping a big IT organization with their Agile transformation and soon had a desire to develop more talent with these skills and help IT organizations become more innovative, efficient, and Agile. Amir joined the journey early on, bringing his expertise in large-scale software development to the table. Today Avenue Code has multiple offices in different countries with a plethora of Fortune 100 clients.</p>
						<?php } elseif($currentlang=="pt") { ?>
							<h5 class="subtitle">NO COMEÇO...</h5>
							<p>Nós começamos como um pequeno grupo em um escritório de uma sala no Distrito Financeiro de São Franciso. Zeo começou a ajudar uma grande organização de TI com sua transformação em Agile e logo quis desenvolver mais talentos com essas habilidades e ajudar outras organizações de TI a serem mais inovadoras, eficientes e ágeis. Amir se juntou à jornada logo no começo, trazendo sua experiência em desenvolvimento de software em grande escala. Hoje a Avenue Code possui diversos escritórios em diferentes países com uma diversidade de clientes Fortune 100.</p>
						<?php } ?>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-8">
						<?php if($currentlang=="en") { ?>
							<h5 class="subtitle">THE ORIGIN OF OUR BRAZIL TEAM...</h5>
							<p>We started in a very small office, where the bathroom served as a phone booth, in the middle of multi-cultural Belo Horizonte's Savassi neighborhood. As a group of four people we concept-proofed the nearshore strategy, exercising Agile methodologies and leveraging video conferences, often streaming continuous live video feed so that the remote team felt like they were in the same room as their peers. Two people covered administration, human resources, finances, accountability, recruiting, facilities, engineering management and UI training, and coaching the team with their English.</p>
							<p>In nine months we had tripled in size and had to move to a larger office in Savassi. We created a recruiting group, and established a mentoring team known as "buddies." We were able to accelerate our growth, expanding to over 50 people. By the second year, our third office was set up in partnership with Pontifícia Universidade Católica (PUC) university, on the university campus. Avenue Code started to take part in larger conferences and events around the development of the Agile community in Brazil. We gained clients in São Paulo and today have grown to more than 150 people. Avenue Code consolidated the teams in Belo Horizonte into a single expansive office in Savassi, adding a new office in São Paulo, and we serve an expanding set of clients in the United States and Brazil.</p>
						<?php } elseif($currentlang=="pt") { ?>
							<h5 class="subtitle">A origem de nosso time no Brasil...</h5>
							<p>Começamos com um escritório bem pequeno, onde um banheiro era usado como cabine telefônica, no meio da Savassi, em Belo Horizonte. Como um grupo de quatro pessoas, criamos uma prova de conceito de uma estratégia nearshore, exercitando metodologias Agile e realizando vídeo conferências, frequentemente transmitindo ao vivo num streaming contínuo para que a equipe remota se sentisse no mesmo local que seus companheiros. Apenas duas pessoas com suas habilidades na língua inglesa atuavam nas seguintes áreas: administração, recursos humanos, contabilidade, recrutamento, instalações, gestão de engenharia, treinamento em interface e assessoria do time. </p>
							<p>Em nove meses nós triplicamos de tamanho e nos mudamos para um escritório maior na Savassi. Criamos um grupo de recrutamento e estabelecemos uma equipe de mentoria chamada "buddies". Conseguimos acelerar o crescimento, expandindo nosso tamanho para 50 pessoas. No segundo ano, nosso terceiro escritório foi montado em parceria com a Pontifícia Universidade Católica (PUC), no campus da universidade. A Avenue Code começou a participar de conferências maiores e eventos sobre o desenvolvimento da comunidade Agile no Brasil. Ganhamos clientes em São Paulo e hoje já somos mais de 150 pessoas. A Avenue Code possui equipes em Belo Horizonte, um novo escritório em São Paulo. Atendemos um crescente grupo de clientes nos Estados Unidos e Brasil.</p>
						<?php } ?>
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
				<?php if($currentlang=="en") { ?>
					<h1 class="title">...and now here we are</h1>
					<hr class="border-title"></hr>
					<h3>we are continuously growing - as a company, as individuals, and as a driven team...</h3>
				<?php } elseif($currentlang=="pt") { ?>
					<h1 class="title">...e agora aqui estamos</h1>
					<hr class="border-title"></hr>
					<h3>estamos sempre crescendo - como empresa, como indivíduos e como uma equipe focada...</h3>
				<?php } ?>
			</div>

			<div id="make_inovation">
				<div class="container">
					<?php if($currentlang=="en") { ?>
						<h2 class="text">MAKE WAY FOR INNOVATION</h2>
					<?php } elseif($currentlang=="pt") { ?>
						<h2 class="text">ABRAM CAMINHO PARA A INOVAÇÃO</h2>
					<?php } ?>
				</div>
			</div>
		</section>

		<section id="events" data-submenu="<?php echo ($currentlang == 'en')? 'events' :  (($currentlang == 'pt')? 'eventos' : '') ?>">
			<?php 
				$args = array('post_type' => 'event', 'posts_per_page' => 1,);
				$event = get_posts($args);
			?>

			<div class="container">
				<?php if($currentlang=="en") { ?>
					<h1 class="title">EVENTS</h1>
				<?php } elseif($currentlang=="pt") { ?>
					<h1 class="title">EVENTOS</h1>
				<?php } ?>

				<hr class="border-title"></hr>
				
				<div class="content">
					<?php if (!empty($event)) { ?>
						<?php $events_att = get_post_meta( $event[0]->ID, 'events_attributes', true); ?>
						<?php if ($events_att[0]['show'] === "True") { ?>
							<h3 class="post_title"><?php echo $event[0]->post_title ?></h3>
							<div class="details"><?php echo $events_att[0]['date'] .'<br>'. $events_att[0]['local']; ?></div>	
						<?php } else { ?>
							<?php if($currentlang=="en") { ?>
								<h3 class="empty_array">No Upcoming Events</h3>
							<?php } elseif($currentlang=="pt") { ?>
								<h3 class="empty_array">Nenhum evento marcado</h3>
							<?php } ?>
						<?php } ?>		
					<?php } else { ?>
						<?php if($currentlang=="en") { ?>
							<h3 class="empty_array">No Upcoming Events</h3>
						<?php } elseif($currentlang=="pt") { ?>
							<h3 class="empty_array">Nenhum evento marcado</h3>
						<?php } ?>
					<?php } ?>
				</div>

				<?php if($currentlang=="en") { ?>
					<a href="<?php echo esc_url(get_permalink(get_page_by_title('events'))); ?>" class="btn btn-blue">See More Events</a>
				<?php } elseif($currentlang=="pt") { ?>
					<a href="<?php echo esc_url(get_permalink(get_page_by_title('events'))); ?>" class="btn btn-blue">Veja mais Eventos</a>
				<?php } ?>
			</div>
		</section>

		<section id="press">
			<?php 
				$args = array('post_type' => 'releases', 'posts_per_page' => 1,);
				$releases = get_posts($args);
			?>

			<div class="container">
				<?php if($currentlang=="en") { ?>
					<h1 class="title">PRESS</h1>
				<?php } elseif($currentlang=="pt") { ?>
					<h1 class="title">IMPRENSA</h1>
				<?php } ?>

				<hr class="border-title"></hr>

				<div class="content">
					<?php if (!empty($releases)) { ?>
						<a class="press_link" href="<?php echo get_permalink($releases->ID) ?>">
							<h3 class="post_title"><?php echo $releases[0]->post_title ?></h3>
							<div class="excerpt"><?php echo $releases[0]->post_excerpt ?></div>	
						</a>
					<?php } else { ?>
						<?php if($currentlang=="en") { ?>
							<h3 class="empty_array">No Press Releases</h3>
						<?php } elseif($currentlang=="pt") { ?>
							<h3 class="empty_array">Nenhuma notícia cadastrada</h3>
						<?php } ?>
					<?php } ?>
				</div>

				<?php if($currentlang=="en") { ?>
					<a href="<?php echo esc_url(get_permalink(get_page_by_title('press'))); ?>" class="btn btn-blue">Read More Articles</a>
				<?php } elseif($currentlang=="pt") { ?>
					<a href="<?php echo esc_url(get_permalink(get_page_by_title('press'))); ?>" class="btn btn-blue">Leia mais artigos</a>
				<?php } ?>
			</div>
		</section>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>