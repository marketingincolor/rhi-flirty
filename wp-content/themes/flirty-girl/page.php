<?php 
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default. It does NOT have a sidebar
 */

get_header(); ?>
			
	<div class="content grid-container">
	
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
	
		    <main class="main small-12 medium-12 large-12 cell" role="main">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php get_template_part( 'parts/loop', 'page' ); ?>
					
				<?php endwhile; endif; ?>							

			</main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->
	
	</div> <!-- end #content -->

<?php get_template_part( 'parts/cta', 'primary' ); ?>

<?php get_footer(); ?>
