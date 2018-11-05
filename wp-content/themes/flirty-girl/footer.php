<?php
/**
 * The template for displaying the footer. 
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */			
 ?>
					
				<footer class="footer" role="contentinfo">

					<div class="grid-container">

						<div class="inner-footer grid-x grid-margin-x grid-padding-x">
							
							<div class="small-12 medium-6 large-6 cell">

								<div class="grid-x grid-margin-x">
									<div class="small-12 cell">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/site-logo.png" class="footer-logo">
									</div>
									<div class="small-12 medium-4 cell edged">
										<nav role="navigation">
				    						<?php joints_footer_links(); ?>
				    					</nav>
									</div>
									<div class="small-12 medium-4 cell edged">
										<nav role="navigation">
				    						<?php joints_footer_links_two(); ?>
				    					</nav>
									</div>
									<div class="small-12 medium-4 cell">
										<nav role="navigation">
				    						<?php joints_footer_links_three(); ?>
				    					</nav>
									</div>
								</div>

		    				</div>
							
							<div class="mailing small-12 medium-6 large-6 cell">
								<h3 class="handwrite" style="padding:0.5em 0.5em 0em 0.5em; margin:0;">join our mailng list</h3>
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/fgl-envelop-heart.png" class="contact-heart" style="max-width:64px; padding-bottom:1.5em;">
								<iframe src="https://gem.godaddy.com/signups/409811/iframe" scrolling="no" frameborder="0" height="299" style="max-width: 400px; width: 100%;"></iframe>
								<?php get_template_part( 'parts/site', 'social' ); ?>
		    				</div>

							<div class="small-12 medium-12 large-12 cell">
								<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> FLITYGIRLLASHSTUDIO LLC</p>
							</div>
						
						</div> <!-- end #inner-footer -->

					</div>

				</footer> <!-- end .footer -->
			
			</div>  <!-- end .off-canvas-content -->
					
		</div> <!-- end .off-canvas-wrapper -->
		
		<?php wp_footer(); ?>
		
	</body>
	
</html> <!-- end page -->