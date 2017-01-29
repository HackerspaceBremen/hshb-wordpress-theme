<?php 
/* 
* Template Name: Keine Sidebar
*/ $content_width = 930;
get_header(); ?>
    <style type="text/css">#sidebar-line { display: none !important;}  </style>
    <div id="content-wrapper">
        <div class="push-top"></div>
        <div id="content" class="full">
            <h1>404 Not found</h1>
            <script type="text/javascript">
            if(Math.random() < 0.25) {
                var logo = create404Cock(true);
            } else if (Math.random() < 0.5) {
                var logo = create404Pussy(true);
            } else if (Math.random() < 0.75) {
                var logo = create404Bitch(true);
            } else if (Math.random() <= 1) {
                var logo = create404Ass(true);
            }
            logo.print();
            $(window).load( function() { logo.showRandom(10, 100) });
            </script>
        </div><!-- content -->
        <div class="push"></div>
        <div class="clear"></div>
    </div><!-- content-wrapper -->
<?php get_footer(); ?>
