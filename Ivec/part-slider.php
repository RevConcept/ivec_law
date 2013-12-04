							<?php $slides = get_field('slides', 'option'); ?>
							<div class="slider-wrapper theme-default">
								<div id="slider" class="nivoSlider">
									<?php foreach( $slides as $slide ) : ?>
										<div class="slide">
											<a href="<?php echo $slide[link]; ?>">
												<img src="<?php echo $slide[slide]; ?>" alt="Experieced representation you can trust." />
											</a>
										</div>
									<?php endforeach; ?>
								</div>
							</div>