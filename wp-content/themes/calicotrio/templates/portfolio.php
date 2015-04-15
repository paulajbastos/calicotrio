<?php
	/*
	 * Template Name: Portfólio
	 */
?>

<?php get_header(); ?>

	<?php if(have_posts()): ?>
		<?php while(have_posts()):  the_post(); ?>

			<!-- #m -->
			<section id="m">

				<?php if(get_field('header')): ?>
					<?php $header = get_field('header'); ?>
					<div class="header" data-background="<?php echo $header['url']; ?>">
						<div class="frame"><img src="<?php echo $header['url']; ?>"></div>
					</div>
				<?php endif; ?>

				<!-- .portfolio-grid -->
				<?php get_template_part( 'partials/portfolio', 'loop' ); ?>
				
			</section>
			<!-- #m -->

		<?php endwhile; wp_reset_postdata(); ?>
	<?php endif; ?>

<?php get_footer(); ?>
