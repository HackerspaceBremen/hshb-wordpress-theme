<?php get_header(); ?>

    <div id="content-wrapper">
        <div class="push-top"></div>
        <div id="content">
            <?php if (have_posts()) : while (have_posts()) : the_post();  
                get_template_part('content');
            endwhile; endif; ?>
            <?php comments_template(); ?>
        </div><!-- content -->
        <div id="sidebar">
            <a href="<?php get_home_url(); ?>/"><script type="text/javascript">var logo = createLogo(true);logo.toggleAll();</script>
            <noscript><img id="pixel" src="<?php bloginfo('template_directory'); ?>/noscript.png" /></noscript>
            <div id="logo"></div></a>
            <?php dynamic_sidebar( 1 ); ?> 
        </div>
        <div class="clear"></div>
        <div class="push"></div>
    </div><!-- content-wrapper -->
<?php get_footer(); ?>
