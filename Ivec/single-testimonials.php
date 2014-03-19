<?php get_header(); ?>

			<div id="content">
				<div class="two-lines"></div>

				<div id="inner-content" class="wrap clearfix">
					<?php get_sidebar(); ?>

					<div id="main" class="eightcol last clearfix" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<?php if( get_field('tsml_title', $tsml_post->ID) ) : ?>
										<h1 class="title"><?php the_field('tsml_title', $tsml_post->ID); ?></h1>
									<?php endif; ?>
									
								</header>

								<section class="entry-content clearfix section" itemprop="articleBody" style="text-align: center;">

									<?php if( get_field('tsml_content', $tsml_post->ID) ) : ?>
										<p><span class="q-left"></span><span class="q-right"></span><?php the_field('tsml_content', $tsml_post->ID); ?></p>
									<?php endif; ?>

									<?php if( get_field('tsml_author', $tsml_post->ID) ) : ?>
										<span>- <?php the_field('tsml_author', $tsml_post->ID); ?></span>
									<?php endif; ?>

									<br /><br />
									<a class="button" style="margin:0px auto;" href="<?php bloginfo('url'); ?>/testimonials">Back to Testimonials</a>

								</section>

								<footer class="article-footer">
									<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

								</footer>

							</article>

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry clearfix">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
									</footer>
							</article>

						<?php endif; ?>

						<?php if( get_field('case_evaluation') == 'yes' ) : ?>

							<?php get_template_part( 'part', 'evaluation' ); ?>

						<?php endif; ?>

					</div><!--end main-->

				</div><!--end inner-content-->

			</div><!--end content-->

<?php get_footer(); ?>
