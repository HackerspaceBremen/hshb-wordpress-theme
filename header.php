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
        <link rel="icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico">
    </head>
    <body>
            <div id="head-wrapper">
                <div id="header">
                    <div id="shadow_l"></div>
                    <div id="sidebar-line"></div>
                    <div id="shadow_r"></div>
                    <div id="socials">
                        <div id="fb"><a href="https://www.facebook.com/pages/Hackerspace-Bremen/217887601561428/" target="_blank"></a></div><!--
                        --><div id="tw"><a href="https://x.com/hspacehb" target="_blank"></a></div><!--
                        --><div id="ig"><a href="https://www.instagram.com/hackerspace_bremen/" target="_blank"></a></div><!--
                        --><div id="yt"><a href="https://www.youtube.com/channel/UC8xYE7eRekFjhs9ysyoe6gQ" target="_blank"></a></div><!--
                        --><div id="git"><a href="https://github.com/HackerspaceBremen" target="_blank"></a></div><!--
                        --><div id="rss"><a href="https://www.hackerspace-bremen.de/feed" target="_blank"></a></div>
                    </div>
                    <div id="menu">
                        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                    </div>
                </div>
            </div>
