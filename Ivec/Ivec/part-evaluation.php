
	<div class="section" id="case-eval">
		<div class="top"></div>
		<div class="mid">

			<?php
			$title = get_field('case_eval_title', 'option');
			$content = get_field('case_eval_content', 'option');
			$link = get_field('case_eval_link', 'option');
			?>

			<div class="wrap">
				<a href="<?php echo $link; ?>">
					<h1><?php echo $title; ?></h1>
				</a>
				<?php echo $content; ?>
			</div>

		</div>	
		<div class="btm"></div>
	</div><!-- end case-eval -->