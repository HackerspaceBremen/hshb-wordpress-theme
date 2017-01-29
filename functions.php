<?php
//Die Sidebars registrieren, eine echts und eine unten
if ( function_exists('register_sidebar') )
register_sidebars(2);

register_nav_menus(array('footer-menu' => 'Footer Menu', 'primary' => 'Header Menu'));

//Nach the_excerpt() einen "Mehr lesen"-Link anzeigen
function hshb_excerpt_more( $more ) {
	return '... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Mehr lesen</a>';
}
add_filter( 'excerpt_more', 'hshb_excerpt_more' );

//Die Funktionen, um InfiniteScroll von Jetpack zum Laufen zu bringen.

function hshb_infinite_scroll() {
add_theme_support( 'infinite-scroll', array(
    'type'           => 'click',
    'footer_widgets' => true,
    'container'      => 'content',
    'wrapper'        => false,
    'render'         => false,
    'posts_per_page' => false,
) );}

add_action( 'after_setup_theme', 'hshb_infinite_scroll' );

function hshb_custom_is_support() {
    $supported = current_theme_supports( 'infinite-scroll' ) && ( is_home() );
     
    return $supported;
}

add_filter( 'infinite_scroll_archive_supported', 'hshb_custom_is_support' );

if ( ! isset( $content_width ) )
    $content_width = 680;
    
?>
