<!DOCTYPE html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
	
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>

	<!--====== LET THE FUN BEGIN ======-->		
	<!--=== SEO ===-->
	<title><?php if (is_home() ) { echo "Featuring SJSU's Design Student Works - Designed by Spartans"; } else { the_title('', ' - Designed by Spartans'); } ?></title>

	<?php
			//if single post then add excerpt as meta description
	if (is_single()) {
		?>
		<meta name="description" content="<?php echo htmlspecialchars( strip_tags( html_entity_decode( get_the_excerpt($post->ID) ) ) ) ?>">

		<?php
			//if homepage use standard meta description
	} else if(is_home() || is_page())  {
		?>


		<meta name="Description" content="Featuring SJSU's Design Student Works">
		<?php } ?>

		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/img/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<!--[if IE]><link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico"><![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/img/win8-tile-icon.png">
		
		

		<meta name="keywords" content="Designed by Spartans, sjsu, san jose state, sjsu design, san jose state design, sjsu designers, san jose state designers" />
		<meta name="copyright" content="Designed by Spartans" />
		
		<!-- === Template Styles === -->
		<!--<link href="<?php bloginfo('template_url'); ?>/css/style.css" media="screen" rel="stylesheet" type="text/css" />-->
		<link href="<?php bloginfo('template_url'); ?>/assets/css/typography.css" media="screen" rel="stylesheet" type="text/css" />
		
		<!-- Foundation -->
		<link href="<?php bloginfo('template_url'); ?>/assets/css/normalize.css" media="screen" rel="stylesheet" type="text/css" />
		
		<link href="<?php bloginfo('template_url'); ?>/assets/css/foundation.css" media="screen" rel="stylesheet" type="text/css" />
		
		<link href="<?php bloginfo('template_url'); ?>/assets/css/app.css" media="screen" rel="stylesheet" type="text/css" />
		
		<link href="<?php bloginfo('template_url'); ?>/assets/css/animsition.min.css" media="screen" rel="stylesheet" type="text/css" />


		
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">


		<!-- jQuery -->
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/jquery-1.11.3.min.js"></script>

		<!-- Animsition -->
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/animsition.min.js"></script>

		<script src="<?php bloginfo('template_url'); ?>/assets/js/app.js"></script>
		
		<!-- Navigation -->
		<script src="<?php bloginfo('template_url'); ?>/assets/js/nav.js"></script>


	  		<!--[if lt IE 9]>
	  				<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	  				<![endif]-->


	  				<?php if ( is_singular() && comments_open() && get_option('thread_comments') ) wp_enqueue_script( 'comment-reply' ); ?>



	  				<!-- wordpress head functions -->
	  				<?php wp_head(); ?>
	  				<!-- end of wordpress head -->

	  			</head>

	  			<body>

	  				<!-- NAVIGATION -->
	  				<?php include('navigation.php'); ?>

	  				<div class="animsition">

