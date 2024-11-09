<?php
get_header();

$custom_404_page = get_page_by_title('404');

// Überprüfen, ob die Seite gefunden wurde und deren Inhalt anzeigen
if ($custom_404_page) {
    echo '<div class="error-404">';
    echo '<h1>' . esc_html($custom_404_page->post_title) . '</h1>';
    echo apply_filters('the_content', $custom_404_page->post_content);
    echo '</div>';
} else {
    // Fallback, falls die Seite nicht gefunden wird
    echo '<div class="error-404">';
    echo '<h1>Seite nicht gefunden</h1>';
    echo '<p>Entschuldigung, die Seite konnte nicht geladen werden.</p>';
    echo '</div>';
}

get_footer();
?>
