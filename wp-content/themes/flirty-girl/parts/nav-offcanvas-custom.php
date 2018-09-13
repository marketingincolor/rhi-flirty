<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="top-bar" id="top-bar-menu">
	<div class="top-bar-left float-left">
		<ul class="menu">
			<li><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/site-logo.png" class="nav-logo"></a></li>
		</ul>
	</div>
	<div class="top-bar-right show-for-medium">
		<?php //joints_top_nav(); ?>	insert social here
	</div>
	<div class="top-bar-right float-right show-for-small-only">
		<ul class="menu">
			<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
			<li><a data-toggle="off-canvas"><?php _e( 'Menu', 'jointswp' ); ?></a></li>
		</ul>
	</div>
</div>

<div class="top-bar" id="top-bar-menu">
		<div class="top-bar-nav show-for-medium">
		<?php joints_top_nav(); ?>	
	</div>
</div>
