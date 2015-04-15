<?php
	$args = array( 'post_type' => 'portfolio',
								 'posts_per_page' => 9,
								 'orderby' => 'rand' );
	$portfolio = new WP_Query( $args );
?>
<div class="latest-portfolio">
	<div class="container">
		<div class="title-wrapper">
			<h2 class="title"><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Portfólio' ) ) ); ?>">Portfólio</a></h2>
			<hr>
		</div>
		<?php if( $portfolio->have_posts() ): ?>
			<div class="portfolio-grid">
				<?php while ( $portfolio->have_posts() ) : $portfolio->the_post(); ?>	
					<?php
						$id = get_the_id();						
						$categories = get_the_terms( $id, 'categorias' );
						$cats = array();
						$portfolio_category = false;

						if($categories):
							foreach($categories as $category):
								$cats[] = $category->name;
							endforeach;

							$portfolio_category = join(', ', $cats);
						endif;
					?>					
					<div class="portfolio">
						<a href="<?php echo the_permalink(); ?>">
							<?php the_post_thumbnail('300x300'); ?>
							<div class="info">
								<p class="title"><?php the_title(); ?></p>
									<p class="category"><?php echo $portfolio_category; ?></p>
							</div>
						</a>
					</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>

			<div class="read-more-wrapper">
				<p class="button-wrapper"><a class="read-more" type="button" href="<?php echo esc_url( get_permalink( get_page_by_title( 'Portfólio' ) ) ); ?>">Ver todos</a></p>
				<hr>
			</div>
		<?php else: ?>
			<p>Nenhum trabalho cadastrado.</p>
		<?php endif; ?>
	</div>
</div>
