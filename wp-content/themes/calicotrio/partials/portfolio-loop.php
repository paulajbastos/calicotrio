<?php
	if( $_GET['terms'] ):
		$categories = $_GET['terms'];
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args = array( 'post_type' => 'portfolio',
									 'tax_query' => array(
									 		array(
													'taxonomy'	=> 'categorias',
													'field'			=> 'slug',
													'terms'    	=> $categories
									 			)
									 	),
									 'posts_per_page' => 9,
									 'paged' => $paged );	
	else:
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args = array( 'post_type' => 'portfolio',
									 'posts_per_page' => 9,
									 'paged' => $paged,
									 'orderby' => 'rand' );
	endif;

	$portfolio = new WP_Query( $args );
?>

<div class="container-wrapper">
	<div class="container">
		<div class="title-wrapper">
			<h1 class="title"><?php the_title(); ?></h1>
			<hr>
		</div>
	</div>

	<!-- .portfolio-filter -->
	<?php get_template_part( 'partials/portfolio', 'filter' ); ?>

	<div class="portfolio-grid-wrapper">
		<div class="container">
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
							<a href="<?php the_permalink(); ?>">
								<?php if(has_post_thumbnail()): ?>
									<?php the_post_thumbnail('300x300'); ?>
								<?php else: ?>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/img/project_placeholder.jpg">
								<?php endif; ?>
								<div class="info">
									<p class="title"><?php the_title(); ?></p>
									<p class="category"><?php echo $portfolio_category; ?></p>
								</div>
							</a>
						</div>
					<?php endwhile; ?>
				</div>

				<div class="pagination-wrapper">
					<ul class="pagination-nav">
						<li class="next"><?php next_posts_link( 'Older Entries', $portfolio->max_num_pages ); ?></li>
						<li class="prev"><?php previous_posts_link( 'Newer Entries' ); ?></li>					
					</ul>
				</div>			
			<?php else: ?>
				<p>Nenhum trabalho cadastrado.</p>
			<?php endif; wp_reset_postdata(); ?>
		</div>
	</div>
</div>
