			<div class="two-lines bottom"></div>
			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap clearfix">

					<div class="threecol nav first clearfix" >

						<h3>Site Navigation</h3>
						<nav role="navigation">
							<?php bones_footer_links(); ?>
						</nav>

					</div>

					<div class="sixcol clearfix" >

						<div class="address clearfix">

							<div class="street-num">
								<?php the_field('footer_street_number', 'options'); ?>
							</div>

							<div class="street-name">
								<?php the_field('footer_street_address', 'options'); ?><br />
								<span><?php the_field('footer_cs', 'options'); ?></span>
							</div>

						</div><!--end address-->

						<p class="source-org copyright">Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. Site by <a href="http://revelationconcept.com" target="_blank">Revelation Concept</a>.</p>


						<?php if(get_field('footer_social', 'options')): ?>
 
							<ul class="social">
						 
							<?php while(has_sub_field('footer_social', 'options')):

								$attachment_id = get_sub_field('network_icon', 'options');
								$size = "full"; // (thumbnail, medium, large, full or custom size)
								$image = wp_get_attachment_image_src( $attachment_id, $size );

							?>
						 
								<li><a href="<?php the_sub_field('network_link', 'options'); ?>" target="_blank"><img src="<?php echo $image[0]; ?>" /></a></li>
						 
							<?php endwhile; ?>
						 
							</ul>
						 
						<?php endif; ?>

					</div><!--end sixcol-->

					<div class="threecol last clearfix" >

						<?php if(get_field('footer_images', 'options')): ?>
 
							<ul class="associations">
						 
							<?php while(has_sub_field('footer_images', 'options')):

								$attachment_id = get_sub_field('footer_image', 'options');
								$size = "full"; // (thumbnail, medium, large, full or custom size)
								$image = wp_get_attachment_image_src( $attachment_id, $size );

							?>
						 
								<li><img src="<?php echo $image[0]; ?>" alt="Association" /></li>
						 
							<?php endwhile; ?>
						 
							</ul>
						 
						<?php endif; ?>


					</div><!--end sixcol-->

				</div><!--end wrap-->

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html>
