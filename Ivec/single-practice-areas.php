<?php get_header(); ?>

			<div id="content">
				<div class="two-lines"></div>

				<div id="inner-content" class="wrap clearfix">
					<?php get_sidebar(); ?>

					<div id="main" class="eightcol last clearfix" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<?php $curr_post_slug = $post->post_name; 
								$pa_list_img = get_field('pa_list_image', 'option'); 
      							$pa_callout = get_field('pa_callout');
      							$pa_img = get_field('pa_img');
      							$il_ce_image = get_field('ce_image'); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="entry-title single-title" itemprop="headline">Practice Areas</h1>
									
								</header>

								<section class="entry-content clearfix section" itemprop="articleBody">
					
									<div class="pa-list fourcol last" id="pa-page">

										<?php if( $pa_list_img ) : ?>
											<div class="img-wrap aligncenter"><img src="<?php echo $pa_list_img; ?>" alt="" /></div>
										<?php endif; ?>

										<?php $args = array( 'post_type' => 'practice-areas', 'post_status' => 'publish', 'numberposts' => -1 );
											$pa_posts = get_posts( $args );
											if ( $pa_posts ) : ?>
												<ul>
												<?php foreach ($pa_posts as $pa_post) : ?>
													
													<li>
														<a href="<?php echo get_permalink($pa_post->ID); ?>" class="<?php echo $pa_post->post_name; ?> <?php if( $curr_post_slug == $pa_post->post_name ) { echo 'active'; } ?>"><?php echo $pa_post->post_title; ?></a>
													</li>
													
												<?php endforeach; ?>
												</ul>
											<?php endif; ?>
									</div>
									<h2><?php the_title(); ?></h2>
									<?php the_content(); ?>

									<?php if( $pa_callout ) : ?>
										<blockquote>
											<?php echo $pa_callout; ?>
											<?php if( $pa_img ) : ?>
												<div class="img-wrap">
													<img src="<?php echo $pa_img; ?>" alt="" />
												</div>
											<?php endif; ?>
										</blockquote>
									<?php endif; ?>
								</section>

								<?php if( $il_ce_image ) : ?>
									<div class="section" id="case-eval">
										<div class="img-wrap">
											<img src="<?php echo $il_ce_image; ?>" alt="" />
										</div>
									</div>
								<?php endif; ?>

								<footer class="article-footer">
									<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

								</footer>

							</article>

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry clearfix">
									<header class="article-header">
										<h1><?php _e( 'Practice Areas', 'bonestheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Practive areas coming soon!', 'bonestheme' ); ?></p>
									</section>
							</article>

						<?php endif; ?>

					</div>

				</div>

			</div>

<?php get_footer(); ?>
