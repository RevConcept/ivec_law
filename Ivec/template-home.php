<?php
/* 
Template Name: Home Page
*/

	$il_cta_boxes = get_field('cta_boxes');
	$il_pa_image = get_field('pa_image');
	$il_pa_title = get_field('pa_title');
	$il_pa_content = get_field('pa_content');
	$il_ce_image = get_field('ce_image');

?>
<?php get_header(); ?>

			<div id="content">
				<div class="two-lines"></div>
				
				<div id="inner-content" class="wrap clearfix">

						<?php get_sidebar(); ?>

						<div id="main" class="eightcol last clearfix" role="main">

							<?php get_template_part('part-slider'); ?>

							<div class="section" id="boxes">
								<?php 
									if( $il_cta_boxes ) :

										//break up into sets of 3 boxes
										$il_box_sets = array_chunk($il_cta_boxes, 3);

										foreach( $il_box_sets as $il_boxes ) :
											//wrap each set of 3 boxes
											echo '<div id="three-box" class="clearfix">';

											foreach( $il_boxes as $key=>$value ) :
												//set up each box
												switch ($key) {
													case 0:
														$box_str = '<div class="box fourcol first ">';
														break;
													case 1:
														$box_str = '<div class="box fourcol ">';
														break;
													case 2:
														$box_str = '<div class="box fourcol last">';
														break;
													
													default:
														$box_str = '<div class="box fourcol ">';
														break;
												}

												//icon
												if( $value[icon] ) :
													$box_str .= '<div class="img-wrap"><img src="' . $value[icon] . '" alt=""/></div>';
												endif;

												//title
												if( $value[title] ) :
													$box_str .= '<h3>' . $value[title] . '</h3>';
												endif;

												//content
												if( $value[content] ) :
													$box_str .= $value[content];
												endif;

												//link
												if( $value[link] ) :
													$box_str .= '<a class="btn" href="' . $value[link] . '">Learn More</a>';
												endif;


												$box_str .= '</div>';
												echo $box_str;

											endforeach;

											echo '</div>';

										endforeach;
									endif;
								?>
							</div>

							<div class="section clearfix" id="practice-areas">
								<?php if ( $il_pa_image ) : ?>
									<div class="img-wrap fourcol first">
										<img src="<?php echo $il_pa_image; ?>" alt="" />
									</div>
								<?php endif; ?>
								<div class="content-wrap eightcol last">
									<?php if( $il_pa_title ) : ?>
										<h3 class="h2"><?php echo $il_pa_title; ?></h3>
									<?php endif; ?>
									<?php if( $il_pa_content ) : ?>
										<?php echo $il_pa_content; ?>
									<?php endif; ?>

										<div class="pa-list clearfix">
											
												<?php $args = array( 'post_type' => 'practice-areas', 'post_status' => 'publish', 'numberposts' => -1 );
													$pa_posts = get_posts( $args );

													$pa_post_sets = array_chunk($pa_posts, 3);
													

													if( $pa_post_sets ) :
														foreach( $pa_post_sets as $key => $post_lists ) :

															switch ($key) {
																	case 0:
																		$list_str = '<ul class="fourcol first">';
																		break;
																	case 1:
																		$list_str = '<ul class="fourcol ">';
																		break;
																	case 2:
																		$list_str = '<ul class="fourcol last">';
																		break;
																	
																	default:
																		$list_str = '<ul class="fourcol ">';
																		break;
																}

															foreach($post_lists as $key => $value) :
																	
																$list_str .= '<li><a href="' . get_permalink($value->ID) . '">' . $value->post_title . '</a></li>';

															endforeach; 
															$list_str .= '</ul>';
															echo $list_str;
														endforeach;
													endif; ?>
											
										</div>
								</div>
							</div>

							<?php if( $il_ce_image ) : ?>
								<div class="section" id="case-eval">
									<div class="img-wrap">
										<img src="<?php echo $il_ce_image; ?>" alt="" />
									</div>
								</div>
							<?php endif; ?>

						</div>

				</div>

			</div>

<?php get_footer(); ?>