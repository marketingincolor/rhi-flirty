<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 */

get_header(); ?>
			
	<div class="content">
	
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
	
		    <main class="main small-12 medium-8 large-8 cell" role="main">
		    
			    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			 
					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop', 'archive' ); ?>
				    
				<?php endwhile; ?>	

					<?php joints_page_navi(); ?>
					
				<?php else : ?>
											
					<?php get_template_part( 'parts/content', 'missing' ); ?>
						
				<?php endif; ?>
																								
		    </main> <!-- end #main -->
		    
		    <?php get_sidebar(); ?>

		</div> <!-- end #inner-content -->

		<div style="left: 274px; width: 688px; position: absolute; top: 1px; height: 26px;" class="proclaim">
			<b class="proclaim_tl"></b><b class="proclaim_tr"></b><b class="proclaim_bl"></b><b class="proclaim_br"></b>
			<div class="proclaimbg"></div>
			<div class="proclaiminlineContent">
				<div style="left: 19px; width: 650px; position: absolute; min-height: 11px; pointer-events: none; top: 5px;" class="txtNew">
					<p style="font-size:14px;">“Our services are available to all members of the public regardless of race, gender or sexual orientation.”</p>
				</div>
			</div>
		</div>

	</div> <!-- end #content -->

<?php get_footer(); ?>