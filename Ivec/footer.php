			<div class="two-lines bottom"></div>
			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap clearfix">

					<h3>Site Navigation</h3>
					<nav role="navigation">
						<?php bones_footer_links(); ?>
					</nav>

					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>

				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html>
