<?php 
/* 
* Template Name: Keine Sidebar
*/ $content_width = 930;
get_header(); ?>
    <style type="text/css">#sidebar-line { display: none !important;}  </style>
    <div id="content-wrapper">
        <div class="push-top"></div>
        <div id="content" class="full">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <div class="entry">
                <?php the_content(); ?>
                <div class="clear"></div>
            </div>
            <?php endwhile; endif; ?>
            <?php if (comments_open()) comments_template(); ?>
        </div><!-- content -->
        <div class="push"></div>
        <div class="clear"></div>
    </div><!-- content-wrapper -->
<?php get_footer(); ?>
