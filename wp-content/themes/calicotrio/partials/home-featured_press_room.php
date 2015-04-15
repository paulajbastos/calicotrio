<?php
	$pressroom_args = array( 'post_type' => 'pressroom',
								 'tax_query' => array(
								 		array(
											'taxonomy' => 'pressroom_properties',
											'field'    => 'slug',
											'terms'    => 'destaque',
										)),
								 'posts_per_page' => 1,
								 'orderby' => 'rand' );
	$pressroom = new WP_Query( $pressroom_args );	
?>

<?php if( $pressroom->have_posts() ): ?>
	<?php while ( $pressroom->have_posts() ) : $pressroom->the_post(); ?>	
		<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($pressroom->ID, 'full') ); ?>
		<div class="featured-press-room" data-background="<?php echo $feat_image; ?>">
			<div class="container">
				<div class="featured-event">		
					<h2 class="title"><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Sala de Imprensa' ) ) ); ?>">Sala de Imprensa</a></h2>
					<p class="event"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
				</div>

				<?php	
					$carousel_args = array( 'post_type' => 'pressroom',
																	'tax_query' => array(
																	 array(
																			'taxonomy' => 'pressroom_properties',
																			'field'    => 'slug',
																			'terms'    => 'destaque'
																	 )),
																	'post__not_in' => array( get_the_id() )
																);
					$carousel = new WP_Query( $carousel_args );	
				?>

				<?php if( $carousel->have_posts() ): ?>
					<div class="carousel">
						<div class="container">
							<ul class="carousel-list">
								<?php while ( $carousel->have_posts() ) : $carousel->the_post(); ?>	
									<li class="item">
										<a href="<?php echo the_permalink(); ?>">
											<?php if(has_post_thumbnail()): ?>
												<?php the_post_thumbnail('294x168'); ?>
											<?php else: ?>
												<img src="<?php echo get_template_directory_uri(); ?>/assets/img/featured_pressroom_placeholder.jpg">
											<?php endif; ?>
											<p class="title"><?php the_title(); ?></p>
										</a>
									</li>
								<?php endwhile; wp_reset_postdata(); ?>
							</ul>
						</div>
					</div>
				<?php endif; ?>
				<p class="scroll-down-wrapper">
					<button class="scroll-down">
						<span></span>
						<span></span>
					</button>
				</p>
			</div>
		</div>
	<?php endwhile; wp_reset_postdata(); ?>
<?php endif; ?>
