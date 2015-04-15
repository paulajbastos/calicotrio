<?php
	/*
	 * Template Name: Home
	 */
?>

<?php get_header(); ?>

	<section id="m">
		home.php
	</section>

	
	<?php /*if(have_posts()): ?>
		<?php while(have_posts()):  the_post(); ?>

			<!-- #m -->
			<section id="m">

				<!-- .featured-press-room -->
				<?php
					$useragent = $_SERVER['HTTP_USER_AGENT'];
					$isMobile = preg_match ( "/phone|iphone|ipad|itouch|ipod|symbian|android|htc_|htc-|palmos|blackberry|opera mini|iemobile|windows ce|nokia|fennec|hiptop|kindle|mot |mot-|webos\/|samsung|sonyericsson|^sie-|nintendo/i", $useragent );

					if($isMobile){
						get_template_part( 'partials/home', 'featured_press_room_mobile' );
					}else{
						get_template_part( 'partials/home', 'featured_press_room' );
					}
				?>

				<!-- .overview -->
				<div class="overview">
					<div class="container">
						<?php the_content(); ?>
					</div>
				</div>

				<!-- .latest-portfolio -->
				<?php get_template_part( 'partials/home', 'latest_portfolio' ); ?>

			</section>
			<!-- #m -->

		<?php endwhile; wp_reset_postdata(); ?>
	<?php endif;*/ ?>




	</div> <?php /* CLOSE PAGE */ ?>
<?php get_footer(); ?>
