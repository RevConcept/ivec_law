<?php

/*
	Template Name: Testimonials Page
*/

?>
<?php get_header(); ?>

			<div id="content">
				<div class="two-lines"></div>

				<div id="inner-content" class="wrap clearfix">
					<?php get_sidebar(); ?>

					<div id="main" class="eightcol last clearfix" role="main">
						
							<?php	if (have_posts()) : while (have_posts()) : the_post(); ?>


									<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix testimonials-page'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

										<header class="article-header">

											<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
										
										</header>

										<section class="section entry-content" id="tsml-header">
											<?php the_field('test_content'); ?>
											<div class="tsml-filters" id="btn-wrap">
												<a class="current btn" data-filter="*">All</a>
												<a class="btn" data-filter=".client">Clients</a>
												<a class="btn" data-filter=".attorney">Attorneys</a>
											</div>
										</section>

										<section class="section entry-content clearfix" itemprop="articleBody">

											
											<?php $tsml_posts = get_posts( array(
																			'post_type' => 'testimonials',
																			'orderby' => 'rand',
																			'post_status' => 'publish',
																			'numberposts' => -1
																));
												if( $tsml_posts ) : ?>
													<div class="tsml-container clearfix">
												<?php foreach ($tsml_posts as $tsml_post) : ?>

														<?php if( get_field('tsml_type', $tsml_post->ID) ) : 
															$tsml_class = strtoLower( get_field('tsml_type', $tsml_post->ID ) );
															?>
															<div class="tsml <?php echo $tsml_class; ?>">
														<?php endif; ?>

														<?php if( get_field('tsml_title', $tsml_post->ID) ) : ?>
															<h3 class="title"><?php the_field('tsml_title', $tsml_post->ID); ?></h3>
														<?php endif; ?>

														<?php if( get_field('tsml_content', $tsml_post->ID) ) : ?>
															<p><span class="q-left"></span><span class="q-right"></span><?php the_field('tsml_content', $tsml_post->ID); ?></p>
														<?php endif; ?>

														<?php if( get_field('tsml_author', $tsml_post->ID) ) : ?>
															<span>- <?php the_field('tsml_author', $tsml_post->ID); ?></span>
														<?php endif; ?>

														<?php if( get_field('tsml_type', $tsml_post->ID) ) : ?>
															</div>
														<?php endif; ?>

													<?php endforeach; ?>
													
													</div>

											<?php else : ?>
												<article id="post-not-found" class="hentry clearfix">
													<section class="entry-content section">
														<p><?php _e( 'Testimonials coming soon!', 'bonestheme' ); ?></p>
													</section>
												</article>
											<?php endif; ?>

										</section>


										<footer class="article-footer">
											<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

										</footer>

									</article>

							<?php endwhile; ?>

							<?php else : ?>

								<article id="post-not-found" class="hentry clearfix">
										<section class="entry-content section">
											<p><?php _e( 'Testimonials coming soon!', 'bonestheme' ); ?></p>
										</section>
								</article>

							<?php endif;  ?>
						

					</div>

					

				</div>

			</div>

<?php get_footer(); ?>
