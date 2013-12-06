
	<div class="section" id="case-eval">
		<div class="top"></div>
		<div class="mid">

			<?php
			$title = get_field('case_eval_title', 'option');
			$content = get_field('case_eval_content', 'option');
			?>

			<div class="wrap">
					<h1><?php echo $title; ?></h1>
				<?php echo $content; ?>
			</div>

		</div>	
		<div class="btm"></div>
	</div><!-- end case-eval -->