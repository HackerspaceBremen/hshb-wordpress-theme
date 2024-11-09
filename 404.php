<?php
get_header();

$custom_404_page = get_page_by_title('404');

// Überprüfen, ob die Seite gefunden wurde und deren Inhalt anzeigen
if ($custom_404_page) {
    echo '<div id="content-wrapper"><div class="push-top"></div><div id="content" class="full">';
    echo '<h1>' . esc_html($custom_404_page->post_title) . '</h1>';
    echo apply_filters('the_content', $custom_404_page->post_content);
    echo '</div></div><div class="push"></div><div class="clear"></div></div><!-- content-wrapper -->';
} else {
    // Fallback, falls die Seite nicht gefunden wird
    echo '<div id="content-wrapper"><div class="push-top"></div><div id="content" class="full">';
    echo '<h1>Seite nicht gefunden</h1>';
    echo '<p>Entschuldigung, die Seite konnte nicht geladen werden.</p>';
    echo '</div></div><div class="push"></div><div class="clear"></div></div><!-- content-wrapper -->';
}

get_footer();
?>
