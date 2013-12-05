<?php get_header(); ?>

			<div id="content">
				<div class="two-lines"></div>

				<div id="inner-content" class="wrap clearfix">
					<?php get_sidebar(); ?>

						<div id="main" class="eightcol last clearfix" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); 

									$il_ce_image = get_field('ce_image'); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
									
								</header>

								<section class="entry-content clearfix section" itemprop="articleBody">
									<?php the_content(); ?>
							</section>

							<?php if( $il_ce_image ) : ?>
								<div class="section" id="case-eval">
									<div class="img-wrap">
										<img src="<?php echo $il_ce_image; ?>" alt="" />
									</div>
								</div>
							<?php endif; ?>

								<footer class="article-footer">
									<?php the_tags( '<span class="tags">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?>

								</footer>

								

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry clearfix">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>

						

				</div>

			</div>

<?php get_footer(); ?>
