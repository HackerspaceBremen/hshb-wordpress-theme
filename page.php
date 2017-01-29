<?php get_header(); ?>

    <div id="content-wrapper">
        <div class="push-top"></div>
        <div id="content">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <style type="text/css">#more-<?php the_ID()?> {position:fixed;top:0;} </style>
            <h1><?php the_title(); ?></h1>
            <div class="entry">
                <?php the_content(); ?>
                <div class="clear"></div>
            </div>
            <?php endwhile; endif; ?>
            <?php if (comments_open()) comments_template(); ?>
        </div><!-- content -->
        <div id="sidebar">
            <a href="<?php get_home_url(); ?>/"><script type="text/javascript">var logo = createLogo(true);logo.toggleAll();</script>
            <noscript><img id="pixel" src="<?php bloginfo('template_directory'); ?>/noscript.png" /></noscript>
            <div id="logo"></div></a>
            <?php dynamic_sidebar( 1 ); ?> 
        </div><!-- sidebar -->
        <div class="push"></div>
        <div class="clear"></div>
    </div><!-- content-wrapper -->
<?php get_footer(); ?>
