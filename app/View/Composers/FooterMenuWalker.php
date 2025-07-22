<?php

class Footer_Menu_Walker extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        return;
    }

    function end_lvl(&$output, $depth = 0, $args = null)
    {
        return;
    }

    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        $is_dropdown = !($item->url && $item->url != '#');
        $classes = implode(" ", $item->classes);
        if ($depth == 0) {
            $output .= "<nav>";
        }
        if ($is_dropdown) {
            $output .= "<h6 class='footer-title'>";
            $output .= $item->title;
            $output .= "</h6>";
        } else {
            $output .= "<a class='" . $classes . " link link-hover' href=\"" . $item->url . "\">";
            $output .= $item->title;
        }
    }

    function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $is_dropdown = !($item->url && $item->url != '#');
        if ($is_dropdown) {
            $output .= "";
        } else {
            $output .= "</a>";
        }
        if ($depth == 0) {
            $output .= "</nav>";
        }
    }
}

?>

