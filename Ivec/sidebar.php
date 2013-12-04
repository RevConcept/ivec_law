				<?php 
					
						$il_contact_text = get_field('sidebar_contact_form_text', 'options');
						$il_contact_form = get_field('sidebar_contact_form', 'options');
						$il_testimonial = get_field('sidebar_testimonial', 'options');
					
					
				?>
				
					<div id="sidebar-bg" class="threecol first"></div>
					<div id="sidebar1" class="sidebar threecol first clearfix" role="complementary">

						<div class="sidebar-scroll reg-position">
							<?php if( $il_contact_form ) : ?>
								<div id="contact" class="widget">
									<?php echo $il_contact_text; ?>
									<?php echo $il_contact_form; ?>
								</div>
							<?php endif; ?>

							<?php if( $il_testimonial ) : ?>
								<div id="tsml-sidebar" class="widget">

									<h3 class="title"><?php echo $il_testimonial->post_title; ?></h3>
									<p>
										<span class="q-left"></span><span class="q-right"></span>
										<?php  echo wp_trim_words($il_testimonial->post_content, 30, ' [...]'); ?></p>
									<p><a class="btn" href="<?php echo bloginfo('url') ?>/testimonials/">Read More</a></p>
								</div>
							<?php endif; ?>
						</div>


					</div>