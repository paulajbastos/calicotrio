<?php
	/*
	 * Template Name: A Factoria
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

				<div class="container-wrapper">
					<div class="container">
						<div class="title-wrapper">
							<h1 class="title"><?php the_title(); ?></h1>
							<hr>
						</div>
						<div class="post-content">
							<?php the_content(); ?>
						</div>
					</div>

					<!-- .team -->
					<div class="team">
						<div class="title-wrapper">
							<div class="container">							
								<h2 class="title"><?php echo get_field('team_title'); ?></h2>
							</div>
						</div>
						<div class="container">
							<div class="post-content">
								<?php the_field('team_description'); ?>
							</div>
						</div>
					</div>

					<?php if( have_rows('services') ): ?>
						<!-- .services -->
						<div class="services">
							<div class="container">
								<div class="title-wrapper">
									<h2 class="title"><?php echo get_field('services_title'); ?></h2>
								</div>
								<div class="services-wrapper">
									<ul class="services-list">
										<?php while ( have_rows('services') ) : the_row(); ?>
											<li class="service"><?php the_sub_field('name'); ?></li>
										<?php endwhile; ?>
									</ul>
								</div>
							</div>
						</div>
						<!-- .services -->
					<?php endif; ?>	
				</div>

			</section>
			<!-- #m -->

		<?php endwhile; wp_reset_postdata(); ?>
	<?php endif; ?>

<?php get_footer(); ?>
