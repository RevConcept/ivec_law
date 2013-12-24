<?php get_header(); ?>

			<div id="content">
				<div class="two-lines"></div>

				<div id="inner-content" class="wrap clearfix">
					<?php get_sidebar(); ?>

						<div id="main" class="ninecol last clearfix index" role="main">

							<h1 class="entry-title single-title" itemprop="headline">Articles</h1>
							
							<div class="section">

								<div class="post-hold ninecol first clearfix">

								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

									<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

										<header class="article-header">

											<h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
											<p class="byline vcard"><?php
												printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">Ivec Law</span>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', '));
											?></p>

										</header>

										<section class="entry-content clearfix">
											<?php the_excerpt(); ?>
										</section>

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

								<?php get_template_part( 'part', 'evaluation' ); ?>

								<?php else : ?>

									<article id="post-not-found" class="hentry clearfix">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

								<?php endif; ?>

							</div><!--end post-wrap-->

							<div class="threecol last clearfix">

								<?php 
								$attachment_id = get_field('article_image', 13);
								$size = "full"; // (thumbnail, medium, large, full or custom size)
								 
								$image = wp_get_attachment_image_src( $attachment_id, $size );
								?>

								<?php if($image) { ?>

								<img class="articles" src="<?php echo $image[0]; ?>" alt="Ivec Law" />

								<?php } ?>

								<div class="pa-list" style="text-align: center;">

									<h3>Subscribe</h3>

									<a class="button" href="<?php bloginfo('url'); ?>/?feed=rss2">RSS Feed</a>

								</div>

								<div class="pa-list">

									<?php $args = array(
										'title_li' => __( '' ),
									); ?>

									<h3>Categories</h3>
									<ul>
										<?php wp_list_categories( $args ); ?>
									</ul>

								</div><!--end pa-list-->

								<div class="pa-list recent">

									<h3>Recent Posts</h3>

									<ul>
										<?php wp_get_archives('type=postbypost&limit=5'); ?>
									</ul>

								</div>

								<div class="pa-list">

									<h3>Archives</h3>

									<ul>
										<?php wp_get_archives( ); ?> 
									</ul>

								</div>

								<div class="pa-list tags">

									<h3>Tags</h3>

									<?php wp_tag_cloud( ); ?>

								</div>
							
							</div><!--end threecol-->

						</div><!--end section-->

					</div><!--end main-->

				</div><!--end inner-content-->

			</div><!--end content-->

<?php get_footer(); ?>
