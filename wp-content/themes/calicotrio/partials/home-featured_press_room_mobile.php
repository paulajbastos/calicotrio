<?php
	$pressroom_args = array( 'post_type' => 'pressroom',
								 					 'tax_query' => array(
													 array(
															'taxonomy' => 'pressroom_properties',
															'field'    => 'slug',
															'terms'    => 'destaque',
														)),
								 'orderby' => 'rand' );
	$pressroom = new WP_Query( $pressroom_args );	
?>

<?php if( $pressroom->have_posts() ): ?>
	<div class="featured-press-room-mobile-wrapper">
		<h2 class="title"><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Sala de Imprensa' ) ) ); ?>">Sala de Imprensa</a></h2>
		<div class="carousel">
			<?php while ( $pressroom->have_posts() ) : $pressroom->the_post(); ?>	
				<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($pressroom->ID, 'full') ); ?>
				<div class="slide" data-background="<?php echo $feat_image; ?>">					
					<p class="event"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
<?php endif; ?>
