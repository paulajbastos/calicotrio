<?php get_header(); ?>

	<?php if(have_posts()): ?>
		<?php while(have_posts()):  the_post(); ?>

			<!-- #m -->
			<section id="m">

				<?php if( has_post_thumbnail() ): ?>
					<?php
						$image_id = get_post_thumbnail_id();
						$image = wp_get_attachment_image_src($image_id, 'full');
					?>
					<div class="header" data-background="<?php echo $image[0]; ?>">
						<div class="frame"><?php the_post_thumbnail(); ?></div>
					</div>
				<?php endif; ?>

				<div class="container-wrapper">
					<div class="container">
							<h1 class="title"><?php the_title(); ?></h1>
							<div class="date-wrapper">
								<?php
									$full_date = get_the_date('M-Y');
									$date = explode("-", $full_date);
								?>								
								<p class="date"><?php echo $date[0] ?><span class="year">/<?php echo $date[1]; ?></span></p>
							</div>
							<div class="post-content">
								<?php the_content(); ?>
							</div>
					</div>
				</div>

				<div class="container-info-wrapper">
					<div class="container">
						<?php if( get_field('video') ): ?>
							<div class="video">
								<?php the_field('video'); ?>
							</div>
						<?php endif; ?>
					</div>

				<?php if( get_field('banner') ): ?>
					<?php $banner = get_field('banner'); ?>
					<div class="header" data-background="<?php echo $banner['url']; ?>">
						<div class="frame"><img src="<?php echo $banner['url']; ?>" alt="<?php echo $banner['alt']; ?>"></div>
					</div>
				<?php endif; ?>

				</div>
				
			</section>
			<!-- #m -->

		<?php endwhile; wp_reset_postdata(); ?>
	<?php endif; ?>

<?php get_footer(); ?>
