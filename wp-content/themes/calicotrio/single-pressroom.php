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
							<div class="download-wrapper">
								<?php if(get_field('presskit')): ?>
									<?php $presskit = get_field('presskit'); ?>
									<a class="btn-download" href="<?php echo $presskit['url']; ?>">baixar presskit</a>
								<?php endif; ?>
							</div>
							<div class="post-content-wrapper">
								<div class="post-content">
									<div class="height-handle">
										<?php the_content(); ?>
									</div>									
								</div>
								<div class="read-more-wrapper">
									<button class="read-more" type="button">veja mais</button>
								</div>
							</div>
					</div>
				</div>

				<div class="container-info-wrapper">
					<div class="container">
						<?php if( have_rows('photo_gallery') ): ?>
							<div class="photo-gallery-wrapper">
								<h2 class="title">Galeria de fotos</h2>

								<div class="photo-gallery">
									<div class="gallery-carousel">
										<div class="slide">
											<?php
												$i = 1;
												while ( have_rows('photo_gallery') ) : the_row();
													$photo = get_sub_field('photo');
													$zoom = wp_get_attachment_image_src( $photo, 'large' );
											?>
													<div class="thumbnail">
														<?php echo wp_get_attachment_image( $photo, '115x115' ); ?>														
														<div class="actions-wrapper">
															<ul class="actions-list">
																<li class="action"><a class="download" href="#">baixar</a></li>
																<li class="action"><a class="zoom" data-zoom="<?php echo $zoom[0]; ?>" href="#">ampliar</a></li>
															</ul>
														</div>
													</div>
											<?php
													$useragent = $_SERVER['HTTP_USER_AGENT'];
													$isMobile = preg_match ( "/phone|iphone|ipad|itouch|ipod|symbian|android|htc_|htc-|palmos|blackberry|opera mini|iemobile|windows ce|nokia|fennec|hiptop|kindle|mot |mot-|webos\/|samsung|sonyericsson|^sie-|nintendo/i", $useragent );

													if($isMobile){
														if($i % 15 == 0){ echo '</div><div class="slide">'; }
													}else{
														if($i % 21 == 0){ echo '</div><div class="slide">'; }
													}
													$i++;
												endwhile;
											?>
										</div>										
									</div>
									<div class="pagination-numbers"></div>
									<div class="zoom-wrapper">
										<button class="btn-close">
											<span></span>
											<span></span>
										</button>
										<div class="zoom-image"></div>
									</div>
								</div>
							</div>
						<?php endif; ?>

						<?php if( get_field('video') ): ?>
							<div class="video-gallery-wrapper">
								<h2 class="title">Vídeo</h2>
								<?php the_field('video'); ?>
							</div>					
						<?php endif; ?>
				</div>
				
			</section>
			<!-- #m -->

		<?php endwhile; wp_reset_postdata(); ?>
	<?php endif; ?>

<?php get_footer(); ?>
