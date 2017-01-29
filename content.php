<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
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

echo('<div class="entry">');
    the_content();
echo('<div class="clear"></div></div>');
?>
