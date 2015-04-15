<?php
	$args = array( 'post_type' => 'pressroom', 'posts_per_page' => -1 );
	$portfolio = new WP_Query( $args );
?>

<div class="press-room-grid-wrapper">
	<?php if( $portfolio->have_posts() ): ?>
		<?php while ( $portfolio->have_posts() ) : $portfolio->the_post(); ?>	
			<div class="portfolio">
				<p class="title"><?php the_title(); ?></p>
				<a href="<?php the_permalink(); ?>">
					<?php if(has_post_thumbnail()): ?>
						<?php the_post_thumbnail('459x239'); ?>
					<?php else: ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/pressroom_placeholder.jpg">
					<?php endif; ?>
				</a>
				<div class="info">
					<a class="read-more" href="<?php the_permalink(); ?>">ver +</a>
					<?php if(get_field('presskit')): ?>
						<?php $presskit = get_field('presskit'); ?>
						<a class="btn-download" href="<?php echo $presskit['url']; ?>">baixar presskit</a>
					<?php endif; ?>
				</div>
			</div>
		<?php endwhile; wp_reset_postdata(); ?>
	<?php else: ?>
		<p>Nenhum trabalho cadastrado.</p>
	<?php endif; ?>
</div>
