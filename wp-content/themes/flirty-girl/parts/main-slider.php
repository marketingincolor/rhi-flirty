<?php
/**
 * Template part for Slider
 *
 * Used for single, index, archive, search.
 */
?>

	<div class="orbit" role="region" aria-label="Favorite Text Ever" data-orbit>
		<ul class="orbit-container">
			<button class="orbit-previous" aria-label="previous"><span class="show-for-sr">Previous Slide</span>&#9664;</button>
			<button class="orbit-next" aria-label="next"><span class="show-for-sr">Next Slide</span>&#9654;</button>
			<li class="orbit-slide">
				<div class="single-orbit-slide">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/Shy Girl LARGE1.jpg" class="home-slide">
				</div>
			</li>
			<li class="orbit-slide">
				<div class="single-orbit-slide">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/Shy Girl LARGE2.jpg" class="home-slide">
				</div>
			</li>
			<li class="orbit-slide">
				<div class="single-orbit-slide">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/Shy Girl LARGE3.jpg" class="home-slide">
				</div>
			</li>
			<li class="orbit-slide">
				<div class="single-orbit-slide">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/Shy Girl LARGE4.jpg" class="home-slide">
				</div>
			</li>
		</ul>
		<nav class="orbit-bullets">
			<button data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
			<button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
			<button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
			<button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
		</nav>
	</div><!-- end #orbit -->
