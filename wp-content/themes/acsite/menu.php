<?php $currentlang = pll_current_language(); ?>
<div id="wrap-menu">
	<div class="container">			
		<nav class="navbar navbar-custom navbar-static-top" role="navigation" id="nav">
			<!-- We use the fluid option here to avoid overriding the fixed width of a normal container within the narrow content columns. -->
		   	<div class="container-fluid">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-bar" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="<?php echo get_bloginfo('url') ?>" class="navbar-brand nav-logo">
					<img src="<?php bloginfo('template_directory'); ?>/images/dev/white-logo.png" alt="Logo" id="white-logo" class="hidden-xs">
					<img src="<?php bloginfo('template_directory'); ?>/images/dev/white-short-logo.png" alt="Logo" id="white-short-logo" class="visible-xs">
				</a>

				<div class="navbar-collapse collapse" id="nav-bar" aria-expanded="false">

					<ul id="main-menu" class="nav-overwrited navbar-nav navbar-right">
						<?php if($currentlang=="en") { ?>
							<?php wp_nav_menu(array( 'menu' => 'menu_en', 'container' => false, 'items_wrap' => '%3$s' )); ?>
						<?php } elseif($currentlang=="pt") { ?>
							<?php wp_nav_menu(array( 'menu' => 'menu_pt', 'container' => false, 'items_wrap' => '%3$s' )); ?>
						<?php } ?>

						<hr id="menu-underline"></hr>

						<ul id="submenu" class="nav-overwrited navbar-nav"></ul>
					</ul>

				</div>
			</div>	
		</nav>
	</div>
</div>