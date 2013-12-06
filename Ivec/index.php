<?php get_header(); ?>

			<div id="content">
				<div class="two-lines"></div>

				<div id="inner-content" class="wrap clearfix">
					<?php get_sidebar(); ?>

						<div id="main" class="eightcol last clearfix" role="main">

							<h1 class="entry-title single-title" itemprop="headline">Articles</h1>

							<div class="section">

							<?php if (have_posts()) : while (have_posts()) : the_post(); 

									$il_ce_image - get_field('ce_image'); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

								<header class="article-header">

									<h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<p class="byline vcard"><?php
										printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', '));
									?></p>

								</header>

								<section class="entry-content clearfix">
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
									<p class="tags"><?php the_tags( '<span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?></p>

								</footer>

								<?php // comments_template(); // uncomment if you want to use them ?>

							</article>


							<?php endwhile; ?>

									<?php if ( function_exists( 'bones_page_navi' ) ) { ?>
											<?php bones_page_navi(); ?>
									<?php } else { ?>
											<nav class="wp-prev-next">
													<ul class="clearfix">
														<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
														<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?></li>
													</ul>
											</nav>
									<?php } ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry clearfix">
											<header class="article-header">
												<h1 class="h2">No Articles Yet</h1>
										</header>
											<section class="entry-content">
												<p>We haven't posted any articles yet. We'll be posting articles shortly.</p>
										</section>
										<footer class="article-footer">
												
										</footer>
									</article>
							
							<?php endif; ?>
							</div>

						</div>

						

				</div>

			</div>

<?php get_footer(); ?>
