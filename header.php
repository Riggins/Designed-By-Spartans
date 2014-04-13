<!DOCTYPE html>
<!-- Gridly WordPress Theme by Eleven Themes (http://www.eleventhemes.com) - Proudly powered by WordPress (http://wordpress.org) -->

	<!-- meta -->
    <html <?php language_attributes();?>> 
	<meta charset="<?php bloginfo('charset'); ?>" />
	<title><?php bloginfo('sitename'); ?> <?php wp_title(); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
    <!-- styles -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/reset.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/skeleton.css"/> 

    <?php  $options = get_option('plugin_options');
			$gridly_color_scheme = $options['gridly_color_scheme'];
			$gridly_logo = $options['gridly_logo'];
			$gridly_responsive = $options['gridly_responsive'];?> 
   
   <?php if ($gridly_color_scheme == 'dark') { ?>
    	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/dark.css" /> 
	<?php  } elseif ($gridly_color_scheme == 'custom') {  ?>
    	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/custom.css"/> 
    <?php  } else {?>
         <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/light.css"/> 
    <?php  } ?>
    
    <?php if ($gridly_responsive != 'no') { ?>
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
      	<link rel="stylesheet" type="text/css" media="handheld, only screen and (max-width: 480px), only screen and (max-device-width: 480px)" href="<?php echo get_template_directory_uri(); ?>/css/mobile.css" />
    <?php  } ?>
    
 	<!-- wp head -->
	<?php wp_head(); ?>
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	
</head>

<body <?php body_class(); ?>>
	
<div class="container">	
<div id="wrap">
	<div id="header">
       
            	<div id="menu-left">
            		<div id="logo">
            		<h1><a href="<?php echo home_url(); ?>">Designed by<br/> Spartans</a></h1>
            		<h3 style="color: #F8F029;"><?php echo bloginfo('description');?></h3>
            		</div>
            	</div>
            	
            	
            	<div >
	            	<div id="menu-pages" class="menu">
						<ul>
							<li><a href="<?php echo home_url(); ?>">Home</a></li>
							<li><a href="<?php echo home_url(); ?>/discussions">Discussions</a></li>
							<li><a href="<?php echo home_url(); ?>/popular">Popular</a></li>
							<li><a href="<?php echo home_url(); ?>/events">Events</a></li>
							<li><a href="http://imbalance2.wpshower.com/">Jobs</a></li>
							<li><?php wp_loginout();?></li>
						</ul>
	            	</div>
	            	
	            	<div  class="menu">
						<ul id="menu-category" class="menu">
							<li><a href="http://imbalance2.wpshower.com/">Animation</a></li>
							<li><a href="http://imbalance2.wpshower.com/">Art</a></li>
							<li><a href="http://imbalance2.wpshower.com/">Graphic Design</a></li>
							<li><a href="http://imbalance2.wpshower.com/">Industrial Design</a></li>
							<li><a href="http://imbalance2.wpshower.com/">Other shit</a></li>
						</ul>
	            	</div>
	            	
	            	<div id="search">
						
							<div>
							<?php include (TEMPLATEPATH . '/searchform.php'); ?>
							</div>
					</div>
				</div>
            
                 <!--<?php if ($gridly_logo != '') {?>
                 	 <img src="<?php echo $gridly_logo; ?>" alt="<?php bloginfo('sitename'); ?>">
                 <?php } else { ?>
                       <img src="<?php echo get_template_directory_uri(); ?>/images/light/logo.png" alt="<?php bloginfo('sitename'); ?>">
                 <?php } ?>-->
            </a>
           
                
      <!-- <?php if ( has_nav_menu( 'main_nav' ) ) { ?>
  		 <div id="nav"><?php wp_nav_menu( array( 'theme_location' => 'main_nav' ) ); ?></div>
       <?php } else { ?>
 	 	 <div id="nav"><ul><?php wp_list_pages("depth=1&title_li=");  ?></ul></div>
	   <?php } ?>-->

   </div>
<!-- // header -->           