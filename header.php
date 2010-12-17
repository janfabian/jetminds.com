<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang='en' xml:lang='en' xmlns='http://www.w3.org/1999/xhtml'>
  <head>
    <meta content='<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>' http-equiv='Content-Type' />
		<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
		<?php wp_head(); ?>
    <link href='<?php bloginfo('stylesheet_url'); ?>' media='screen, projection' rel='stylesheet' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=Reenie+Beanie:regular&amp;subset=latin' rel='stylesheet' type='text/css' />
		<link rel="pingback" href="<?php bloginfo('pingbackurl'); ?>" />
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/javascript/jquery-1.4.4.min.js"></script> 
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/javascript/script.js"></script> 
    <title><?php bloginfo('name');?><?php wp_title(); ?></title>
  </head>
  <body>
	<?php
	// global variable
	GLOBAL $projects_cat;
	$projects_cat = get_cat_id("Projects");
	?>
<!-- red gradient stripe with 10px height -->
<div class='red-gradient'>
  <div id='container'>
    <!-- need to be set to prepend the dark grey menu stripe -->
    <div class='vertical-menu-prepend'></div>
    <div class='vertical-menu'></div>
  </div>
</div>
<!-- white stripe with logo and middle part of menu -->
<div class='white-stripe'>
  <div id='container'>
    <div class='logo'>
			<a href="<?php bloginfo('url'); ?>" title="Home">
	      <img src='<?php bloginfo('template_directory'); ?>/img/logo.png' />
      	<span class='red'>Jet</span><span class='gray'>Minds</span></div>
			</a>
    <div class='vertical-menu-prepend'></div>
    <div class='vertical-menu'>
			<?php 
			// $left_ID = 171;
			$left_ID = 93;
			$args=array(
				'child_of'     => $left_ID,
				'title_li'     => __('')
		  ); 
			?>
			<ul>
				<li><a href="<?php bloginfo('url'); ?>" title="JetMinds home">HOME</a></li>
				<li><a href="<?php bloginfo('url'); ?>/page/1" title="Blog of Jetminds">BLOG</a></li>
				<li><a href="<?php bloginfo('url'); ?>/projects" title="Projects of Jetminds">PROJEKTY</a></li>
				<li><a href="#" title="People">Lidé</a></li>
				<?php wp_list_pages($args); ?> 
			</ul>
			<?php
			/*
				TODO delete localhost right_id
			*/
			// localhost testing
			// $right_ID = 188;
			$right_ID = 95;
			$args = array(
				'child_of'     => $right_ID,
				'title_li'     => __('')
			);
			?>
			<ul>
				<?php wp_list_pages($args); ?>
				<li><a href="<?php bloginfo('url'); ?>/jobs" title="Jobs at Jetminds">HLEDáme</a></li> 
			</ul>
    </div>
  </div>
</div>