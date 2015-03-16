<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta name="verify-v1" content="KAtDGUrXrZi2A/bwg67TKvfKA0FllLtla+PHtQ2u9ks=" />
  <meta name="msvalidate.01" content="A6075868C2BB425BAE65AC178B7BA20C" />
  <meta name="y_key" content="8eec219cf9caabd5" />
  <meta charset="utf-8">

  <title><?php bloginfo('name'); ?> <?php if ( is_single()) { ?> &raquo; Archive <?php } ?> <?php wp_title(); ?></title>
  <meta name="description" content="">
  <meta name="author" content="Ryan Kanno">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

  <link href="<?php bloginfo('stylesheet_directory'); ?>/normalize.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="<?php bloginfo('stylesheet_directory'); ?>/grid960.css" rel="stylesheet" type="text/css" media="screen" />

  <link href="http://fonts.googleapis.com/css?family=Droid+Serif:400,700" rel="stylesheet" type="text/css">
  <link rel="stylesheet/less" href="<?php bloginfo('stylesheet_directory'); ?>/style.less" type="text/css" media="screen" />
  <script src="<?php bloginfo('template_directory');?>/js/less-1.1.5.min.js" type="text/javascript"></script>
  <script src="<?php bloginfo('template_directory');?>/js/modernizr-2.0.6.min.js" type="text/javascript"></script>

  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php wp_head(); ?>
</head>

<body>
  <div id="fb-root"></div>
  <script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) {return;} js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_US/all.js#xfbml=1"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script> 
  <header>
    <div id="title">
      <h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
      <p class="desc"><?php bloginfo('description'); ?></p>
    </div>
    <div id="social"></div>
  </header>
