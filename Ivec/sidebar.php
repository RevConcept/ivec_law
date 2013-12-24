				<?php 
					
						$il_contact_text = get_field('sidebar_contact_form_text', 'options');
						$il_contact_form = get_field('contact_form', 'options');
						$il_phone = get_field('sidebar_phone', 'options');
					
				?>
				
					 <div id="sidebar-bg" class="threecol first"></div> 
					<div id="sidebar1" class="sidebar threecol first clearfix" role="complementary">
						<div id="logo-wrapper">
							<div class="logo">
								<a href="<?php bloginfo('url'); ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/library/images/logo.png" alt="Ivec Law PC"/>
								</a>
							</div>

							<div id="translate">
<?php echo do_shortcode('[google-translator]'); ?>
							</div>
				
							<?php if( $il_phone ) : ?>
								<div id="phone" class="widget" class="fixed">
									<div class="wrap">
										<a href="tel:<?php echo $il_phone ?>"> <span class="title">Call</span><?php echo $il_phone; ?></a>
									</div>
								</div>
							<?php endif; ?>
							
						</div>

						<div class="sidebar-scroll">
							
							<?php if( $il_contact_text ) : ?>
								<div id="contact" class="widget">
									<div class="cta">
										<?php echo $il_contact_text; ?>
									</div>
									<?php echo $il_contact_form; ?>
								</div>
							<?php endif; ?>

							<?php $il_testimonials = get_posts(array(
														'post_type' => 'testimonials',
														'post_status' => 'publish'
													)); ?>

							<?php if( $il_testimonials ) : ?>

								<div class="badges clearfix">

									<a href="http://www.avvo.com/attorneys/60586-il-john-ivec-1102996.html?cm_mmc=Avvo-_-Avvo_Badge-_-Micro-_-1102996" rel="me"><img alt="Avvo - Rate your Lawyer. Get Free Legal Advice." id="avvo_badge" src="http://www.avvo.com/assets/microbadge.png" /></a>

									<script type="text/javascript" src="http://www.avvo.com/assets/badges-v2.js"></script><div class="avvo_badge" data-type="rating" data-specialty="55" data-target="http://www.avvo.com/professional_badges/1102996"><div class="avvo_content"><a href="http://www.avvo.com/attorneys/60586-il-john-ivec-1102996.html?utm_campaign=avvo_rating&utm_content=1102996&utm_medium=avvo_badge&utm_source=avvo" rel="me" target="_blank">Lawyer John Ivec</a> | <a href="http://www.avvo.com/criminal-defense-lawyer/il/plainfield.html?utm_campaign=avvo_rating&utm_content=1102996&utm_medium=avvo_badge&utm_source=avvo" target="_blank">Featured Attorney Criminal Defense</a></div></div>

									<script type="text/javascript" src="http://www.avvo.com/assets/badges-v2.js"></script><div class="avvo_badge" data-type="reviews" data-specialty="55" data-target="http://www.avvo.com/professional_badges/1102996"><div class="avvo_content"><a href="http://www.avvo.com/attorneys/60586-il-john-ivec-1102996.html?utm_campaign=avvo_review_badge&utm_content=1102996&utm_medium=avvo_badge&utm_source=avvo" rel="me" target="_blank">Lawyer John Ivec</a> | <a href="http://www.avvo.com/criminal-defense-lawyer/il/plainfield.html?utm_campaign=avvo_review_badge&utm_content=1102996&utm_medium=avvo_badge&utm_source=avvo" target="_blank">Lawyer Criminal Defense</a></div></div>

								</div><!--end badges-->
								
								<div id="tsml-sidebar" class="widget">
									<div class="tsml-wrap">
									
									<?php foreach($il_testimonials as $key => $testimonial ) :  
										$tsml_title = get_field('tsml_title', $testimonial->ID);
										$tsml_content = get_field('tsml_content', $testimonial->ID); ?>

											<div class="inner-tsml">
												<h3 class="title"><?php echo $tsml_title; ?></h3>
												<p><span class="q-left"></span><span class="q-right"></span>
													<?php  echo wp_trim_words($tsml_content, 30, ' [...]'); ?>
												</p>
												<p><a class="btn" href="<?php echo bloginfo('url') ?>/testimonials/">Read More</a></p>
											</div>
											
									<?php endforeach; ?>
									</div><!--end tsml-wrap-->
									
								</div><!--end tsml-sidebar-->
							<?php endif; ?>

						</div><!--end sidebar-scroll-->


					</div>