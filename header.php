<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta property="og:title" content="[topcoder] - NASA Asteroid Grand Challenge" />
<meta property="og:type" content="article" />
<meta property="og:image" content="http://www.topcoder.com/asteroids/files/2014/03/NTL_Logo_fb1.png" />
<meta property="og:url" content="http://www.topcoder.com/asteroids/" />
<meta property="og:description" content="Welcome to the Asteroid Grand Challenge Series sponsored by the NASA Tournament Lab! The Asteroid Grand Challenge Series will be comprised of a series of topcoder challenges to get more people from around the planet involved in finding all asteroid threats to human populations and figuring out what to do about them. In an increasingly connected world, NASA recognizes the value of the public as a partner in addressing some of the country’s most pressing challenges." />


<title><?php 
        /*
         * Print the <title> tag based on what is being viewed.
         */
        global $page, $paged;
    
        wp_title( '|', true, 'right' );
    
        // Add the blog name.
        bloginfo( 'name' );
    
        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            echo " | $site_description";
    ?>
</title>

<script type="text/javascript">
// Locate the url of the proxy url.
var memberProxyUrl = 'http://www.topcoder.com/roadshow/wp-content/plugins/home-eoi-plugin/mcount.php';
</script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/social_widget.css" />
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/screen.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/interactive.css" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css' />
<link type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/wordpress-default.css" rel="stylesheet" media="all" />
<!--[if lte IE 8]> 
        <link href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/screen-ie8.css" type="text/css" rel="stylesheet" media="screen" />
<![endif]--> 


<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery-1.5.2.min.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/script.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/interactive.js"></script>
<?php wp_head(); ?>
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_EN/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- wrapper -->
<div id="wrapper">
  <div id="innerWrapper"> 
    <!-- header -->
    <div id="header"> 
      <?php 
	  wp_nav_menu( 
        array(
          'container' => false,
          'theme_location' => '',
          'menu_class' => 'topMenu',
          'menu' => 'top',
          'link_before' => '<span class="right"><span class="middle">',
          'link_after' => '</span></span>',

        ) 
      ); 
	  ?>
    	<a id="siteLogo" href="http://www.nasa.gov/coeci/ntl/#.U2kuDvldWA8">
			<img src="<?php bloginfo("stylesheet_directory");?>/i/NTL_Logo.png" alt=""/>
		</a>
    <span class="shadowSep"></span>
		<a>
			<img src="<?php bloginfo("stylesheet_directory");?>/i/asteroid_logo.png" alt=""/>
		</a>
      
      
    </div>