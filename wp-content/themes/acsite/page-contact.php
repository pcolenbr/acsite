<?php get_header(); ?>
<?php $currentlang = pll_current_language(); ?>
<div id="wrap-contact">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<header>
			<?php get_template_part('menu'); ?>
		</header>

		<section id="head">
			<div class="container">
				<h1 class="title">CONTACT</h1>

				<hr class="border-title"></hr>

				<p id="intro">Headquartered in San Francisco, one of the most beautiful cities in the world,<br>Avenue Code has several development centers. Click to see each location:</p>
			</div>
		</section>

		<section id="location-menu">
			<div class="container">
				<ul class="list-inline">
					<li class="location-item"><a class="location-link location-link-active" data-location="SF">San Francisco, U.S.</a></li>
					<li class="location-item"><a class="location-link" data-location="SP">São Paulo, Brazil</a></li>
					<li class="location-item"><a class="location-link" data-location="BH">Belo Horizonte, Brazil</a></li>
				</ul>
			</div>
		</section>

		<section id="gmap">
			<div id="gmap-overlay">
				<div id="button-div">
					<a class="btn btn-blue">CLICK TO ACTIVATE</a>
				</div>
			</div>

			<iframe width="100%" height="380" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3152.866917500437!2d-122.40253129999998!3d37.793158499999976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085808a698fd8eb%3A0xcfad419c0e900b47!2s400+Montgomery+St+%23305!5e0!3m2!1sen!2s!4v1400803033706" id="mapFrame"></iframe>
		</section>

		<section id="form">
			<div class="container">
				<h2 id="form-title">Get in Touch with Us</h2>

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6">
						<h3 id="officeID">Contact info (Headquarters)</h3>
						
						<ul class="list-unstyled">
							<li class="form-list-item">
								<img class="icon" src="<?php bloginfo('template_directory'); ?>/images/map_marker.png"><span id="officeAddress">400 Montgomery Street, Suite 305<br>San Francisco, CA 94104</span>
							</li>
						
							<li class="form-list-item">
								<img class="icon" src="<?php bloginfo('template_directory'); ?>/images/phone1.png">
								<span id="officePhone">Accounting Department: +1 415-990-3689<br>Marketing Department: +1 415 766-4179<br>Human Resources: +1 415-259-4214<br>Recruiting Department: +1 415-766-4177<br>General Inquiries: +1 415-766-4178</span>
							</li>
							
							<li class="form-list-item">
								<img class="icon" src="<?php bloginfo('template_directory'); ?>/images/print.png"><span id="officeFax">+1 415 766 4252</span>
							</li>				
							
							<li class="form-list-item">
								<img class="icon" src="<?php bloginfo('template_directory'); ?>/images/message.png"><span><a href="mailto:info@avenuecode.com" id="mailLink">info@avenuecode.com</a></span>
							</li>				
						</ul>
					</div>

					<div id="div_form" class="col-xs-12 col-sm-12 col-md-6">
						
						<div id="block_screen"></div>

						<div style="display: none;" id="cf_success" class="alert alert-success">Thank you for the message. We will contact you shortly.</div>
						<div style="display: none;" id="cf_error" class="alert alert-danger">Message failed. Please, send an email to info@avenuecode.com</div>
						<div style="display: none;" id="cf_warning" class="alert alert-warning"></div>

						<div id="form">
							<div class="form-group">
								<select class="form-control contact-form-input" id="cf_location" name="cf_option">
									<option value="1" selected>US Business Inquiry</option>
									<option value="2">Brazil Business Inquiry</option>
								</select>
							</div>
							<div class="form-group">
								<input type="text" class="form-control contact-form-input" id="cf_name" placeholder="Your name" name="cf_name">
							</div>
							<div class="form-group">
								<input type="email" class="form-control contact-form-input" id="cf_email" placeholder="Your email" name="cf_email">
							</div>
							<div class="form-group">
								<input type="text" class="form-control contact-form-input" id="cf_website" placeholder="Website (optional)" name="cf_website">
							</div>					
							<div class="form-group">
								<textarea class="form-control contact-form-input" rows="8" id="cf_message" placeholder="Your message" name="cf_message"></textarea>
							</div>
							 
							<a href="#" id="cf_send_button" class="btn btn-blue" >SEND MESSAGE</a>
						</div>
					</div>
				</div>
			</div>
		</section>

	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>