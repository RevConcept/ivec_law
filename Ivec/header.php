<?php 
	$il_phone = get_field('sidebar_phone', 'options');
?>
<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?>>

		<div id="container">

			<header class="header" role="banner">

				<div id="header-bg"></div><div class="two-lines mobile"></div>

				<div id="inner-header" class="wrap clearfix">
					
					<div id="mobile-menu" class="clearfix">
						<a class="menu-btn">Menu</a>
						<a class="menu-phone" href="tel:<?php if($il_phone) : echo $il_phone; endif; ?>,callto:<?php if($il_phone) : echo $il_phone; endif; ?>"><?php if($il_phone) : echo $il_phone; endif; ?></a>
						<a class="menu-logo" href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/library/images/logo.png" alt="Ivec Law" /></a>
					</div>

					<div id="logo-wrapper" class="threecol first clearfix">
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
					
					<div id="nav-wrap" class="ninecol last">
						<nav role="navigation">					
								<?php bones_main_nav(); ?>
							
						</nav>
					</div>
				</div>
			</header>