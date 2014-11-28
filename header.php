<!doctype html>  

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<html xmlns="http://www.w3.org/1999/xhtml">
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
		
		

		<meta name="keywords" content="Designed by Spartans, sjsu, san jose state, sjsu design, san jose state design, sjsu designers, san jose state designers" />
		<meta name="copyright" content="Designed by Spartans" />
		
		<!-- === Template Styles === -->
		<!--<link href="<?php bloginfo('template_url'); ?>/css/style.css" media="screen" rel="stylesheet" type="text/css" />-->
		<link href="<?php bloginfo('template_url'); ?>/css/typography.css" media="screen" rel="stylesheet" type="text/css" />
		
		<!-- Foundation -->
		<link href="<?php bloginfo('template_url'); ?>/css/normalize.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="<?php bloginfo('template_url'); ?>/css/foundation.css" media="screen" rel="stylesheet" type="text/css" />
		
		<link href="<?php bloginfo('template_url'); ?>/css/app.css" media="screen" rel="stylesheet" type="text/css" />
		
		<!--<link href="<?php bloginfo('template_url'); ?>/css/animsition.min.css" media="screen" rel="stylesheet" type="text/css" />-->
		
	
		<!--=== Apple Homescreen Icons ===-->
		<!-- 3rd Gen iPad -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-144x144-precomposed.png">
		<!-- Retina iPhone -->
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-114x114-precomposed.png">
		<!-- For first- and second-generation iPad: -->
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-72x72-precomposed.png">
		<!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-precomposed.png">
		<!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
		
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  		
  		
  		<!-- jQuery -->
  		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
  		<!--<script src="<?php bloginfo('template_url'); ?>/js/modernizr.js"></script>-->
  		
  		<!--<script src="<?php bloginfo('template_url'); ?>/js/jquery.animsition.min.js"></script>-->
  		
  		<script src="<?php bloginfo('template_url'); ?>/js/nav.js"></script>
 
 
	  		<!--[if lt IE 9]>
	  				<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	  		<![endif]-->
  		
  		
  		
  		<!-- Google Analytics Here -->
  		<?php if (!current_user_can('level_10')) { ?>
  		
  			<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			
			  ga('create', 'UA-41130431-7', 'auto');
			  ga('send', 'pageview');
			</script>
  		
  		<?php } ?>
  		<!-- end analytics -->
  		
		
		
		<?php
		if ( is_singular() && comments_open() && get_option('thread_comments') )
		  wp_enqueue_script( 'comment-reply' );
		?>
		
		
		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
		
	</head>
	
	<body>

	<!-- NAVIGATION -->
		<div class="animsition">
			<?php include('navigation.php'); ?>

	