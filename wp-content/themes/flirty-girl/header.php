<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section
 *
 */
?>
<!doctype html>
  <html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8">
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">
		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />	
	    <?php } ?>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700" rel="stylesheet">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<div class="off-canvas-wrapper flirty">
			
			<!-- Load off-canvas container. Feel free to remove if not using. -->			
			<?php get_template_part( 'parts/content', 'offcanvas' ); ?>
			
			<div class="off-canvas-content" data-off-canvas-content>
				
				<header class="header notgrid-container" role="banner">
					<div class="content grid-container">
						<div class="inner-content grid-x grid-margin-x grid-padding-x">
							<div class="cell medium-4 logo">
								<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/site-logo.png" class="nav-logo"></a>
							</div>
							<div class="cell medium-8">

								<?php get_template_part( 'parts/site', 'disclaimer' ); ?>

								<div class="grid-x grid-margin-x align-right">
									<div class="cell shrink">
										<?php get_template_part( 'parts/site', 'social' ); ?>
									</div>
									<div class="cell show-for-medium medium-3 shrink">
										<a href="<?php echo home_url(); ?>/locations" class="book-appt-link"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fgl-book-appt.png" class="book-appt-img"></a>
									</div>
								</div>

							</div>
						</div>
					</div>
	 				<div class="white-bar show-for-large"> &nbsp; </div>
					<div class="content grid-container">		
						<!-- This navs will be applied to the topbar, above all content 
							 To see additional nav styles, visit the /parts directory -->
						<?php get_template_part( 'parts/nav', 'custom' ); ?>
						<?php //get_template_part( 'parts/nav', 'title-bar' ); ?>
	 				</div>
				</header> <!-- end .header -->