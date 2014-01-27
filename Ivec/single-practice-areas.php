<?php get_header(); ?>

<?php $pa_list_img = get_field('pa_list_image', 'option'); 
      $pa_callout = get_field('pa_callout'); 
      $pa_img = get_field('pa_img'); ?>

			<div id="content">
				<div class="two-lines"></div>

				<div id="inner-content" class="wrap clearfix">
					<?php get_sidebar(); ?>

					<div id="main" class="eightcol last clearfix" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<?php $curr_post_slug = $post->post_name; ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="entry-title single-title" itemprop="headline">Practice Areas</h1>
									
								</header>

								<section class="entry-content clearfix section" itemprop="articleBody">
					
									<div class="pa-list fourcol last" id="pa-page">

										<?php if( $pa_img ) : ?>
											<div class="img-wrap aligncenter"><img src="<?php echo $pa_img; ?>" alt="<?php the_title(); ?>" /></div>
										<?php endif; ?>

										<?php 

										$args = array(
											'title_li' => '',
											'post_type' => 'practice-areas',
											'post_status' => 'publish', 
										);
										?>

										<ul>
											<?php $pa_posts = wp_list_pages( $args ); ?>
										</ul>
									
									</div><!--end pa-list-->

									<h2><?php the_field('pa_title'); ?></h2>

									<?php if( $pa_callout ) : ?>
										<?php echo $pa_callout; ?>
									<?php endif; ?>

									<?php if( get_field('case_evaluation') == 'yes' ) : ?>

										<?php get_template_part( 'part', 'evaluation' ); ?>

									<?php endif; ?>

								</section>

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
