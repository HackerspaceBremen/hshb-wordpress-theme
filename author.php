<?php get_header(); ?>

    <div id="content-wrapper">
        <div class="push-top"></div>
        <div id="content">
            <?php 
            $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
            ?>
            <div id="author_header">
                <?php echo get_avatar( $curauth->ID, 100 ); ?>
                <p id="author_contact"><a href="<?php echo $curauth->user_url; ?>" target="_blank">Website</a> | <a href="mailto:<?php echo $curauth->user_login; ?>@hackerspace-bremen.de" target="_blank">E-Mail schreiben</a></p>
                <h1><?php echo $curauth->nickname; ?></h1>
                <p id="author_interests">Interessen: <?php the_author_meta("people_lists_interessen", $curauth->ID) ?></p>
            </div>
            <p class="author_description"><?php echo $curauth->description; ?><div class="clear"></div></p>
            <h1 id="author_posts_by">Beiträge von <?php echo $curauth->nickname; ?></h1>
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post(); ?>
                    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <?php
                    $link = get_the_author_link();
                    $date = get_the_date();
                    $categories = get_the_category();
                    $separator = ', ';
                    $output = '';
                    if(strlen($link) > 0 || strlen($date) > 0) { 
                        echo('<p class="author">Ver&ouml;ffentlicht '); 
                        if(strlen($link) > 0) {
                            echo('von '); 
                            the_author_posts_link(); 
                            echo(' ');
                        } 
                        echo(strlen($date) > 0 ? 'am ' . $date : '');
                        if($categories){
                            echo(" in ");
                            foreach($categories as $category) {
                                if($category->name === "Startseite") continue;
	                            $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "Zeige alle Posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
                            }
                            echo trim($output, $separator);
                        }
                        echo('</p>');
                    } 
                    ?>
                    <div class="entry">
                        <?php the_excerpt('Mehr lesen...'); ?>
                        <div class="clear"></div>
                    </div>
                <?php endwhile; 
                $nl = get_next_posts_link( 'Ältere Beiträge' );
                $pl = get_previous_posts_link( 'Neuere Beiträge' );
                if(strlen($nl) > 0 || strlen($pl) > 0) {
                ?>
                <div class="nav_next_page"><?php echo($nl); ?></div>
                <div class="nav_prev_page"><?php echo($pl); ?></div>
            <?php } else {}
            else: ?> 
            <p><?php echo $curauth->nickname; ?> scheint noch keine Beiträge veröffentlicht zu haben.</p>
            <?php 
            endif; ?>
        </div><!-- content -->
        <div id="sidebar">
            <a href="<?php get_home_url(); ?>/"><script type="text/javascript">
            var logo = createLogo(true);logo.toggleAll();
            </script>
            <noscript><img id="pixel" src="<?php bloginfo('template_directory'); ?>/noscript.png" /></noscript>
            <div id="logo"></div></a>
            <?php dynamic_sidebar( 1 ); ?> 
        </div><!-- sidebar -->
        <div class="push"></div>
        <div class="clear"></div>
    </div><!-- content-wrapper -->
<?php get_footer(); ?>
