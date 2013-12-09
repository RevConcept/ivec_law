				<?php 
					
						$il_contact_text = get_field('sidebar_contact_form_text', 'options');
						$il_contact_form = get_field('sidebar_contact_form', 'options');
						$il_phone = get_field('sidebar_phone', 'options');
					
				?>
				
					<div id="sidebar-bg" class="threecol first"></div>
					<div id="sidebar1" class="sidebar threecol first clearfix" role="complementary">
						<div id="logo-wrapper">
							<div class="logo">
								<img src="<?php echo get_template_directory_uri(); ?>/library/images/logo.png" alt="Ivec Law PC"/>
							</div>
				
							<?php if( $il_phone ) : ?>
								<div id="phone" class="widget" class="fixed">
									<div class="wrap">
										<a href="tel:<?php echo $il_phone ?>,callto:<?php echo $il_phone; ?>"> <span class="title">Call</span><?php echo $il_phone; ?></a>
									</div>
								</div>
							<?php endif; ?>
							
						</div>

						<div class="sidebar-scroll">
							
							<?php if( $il_contact_form ) : ?>
								<div id="contact" class="widget">
									<?php echo $il_contact_text; ?>
									<?php echo $il_contact_form; ?>
								</div>
							<?php endif; ?>

							<?php $il_testimonials = get_posts(array(
														'post_type' => 'testimonials',
														'post_status' => 'publish'
													)); ?>

							<?php if( $il_testimonials ) : ?>
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
									</div>
									
									
								</div>

							<?php endif; ?>
						</div>


					</div>