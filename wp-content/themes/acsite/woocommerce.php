<?php get_header(); ?>
<?php $currentlang = pll_current_language(); ?>
<div id="wrap-product">
	<header>
		<?php get_template_part('menu'); ?>
	</header>
	
	<section class="section">
		<div class="container">	
			<?php woocommerce_content(); ?>
		</div>
	</section>
</div>
<?php get_footer(); ?>