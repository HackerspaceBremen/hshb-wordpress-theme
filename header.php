<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" lang="de">
    <head>
        <?php wp_enqueue_script("jquery"); ?>
        <?php wp_head(); ?>
        <title><?php bloginfo('name'); ?></title>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/pixels.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts.js"></script>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        
    </head>
    <body>
	    <a href="http://hshb.de/diba" target="_blank" id="diba-banner"></a>
            <div id="head-wrapper">
                <div id="header">
                    <div id="shadow_l"></div>
                    <div id="sidebar-line"></div>
                    <div id="shadow_r"></div>
                    <div id="socials">
                        <div id="fb"><a href="https://www.facebook.com/pages/Hackerspace-Bremen/217887601561428/" target="_blank"></a></div><!--
                        --><div id="gp"><a href="https://plus.google.com/106849621647585475724" target="_blank"></a></div><!--
                        --><div id="tw"><a href="https://twitter.com/hspacehb" target="_blank"></a></div><!--
                        --><div id="yt"><a href="https://www.youtube.com/channel/UC8xYE7eRekFjhs9ysyoe6gQ" target="_blank"></a></div><!--
						--><div id="rss"><a href="https://www.hackerspace-bremen.de/feed" target="_blank"></a></div>
                    </div>
                    <div id="menu">
                        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                    </div>
                </div>
            </div>
