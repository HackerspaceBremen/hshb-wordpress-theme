<?php

class Sub_Menu_Walker extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= "<ul>\n";
    }

    function end_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= "</ul>\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        $is_dropdown = !($item->url && $item->url != '#');
        $classes = implode(" ", $item->classes);
        $active = in_array("current_page_item", $item->classes) || in_array("current-menu-item", $item->classes);
        $a_classes = "";
        $btn_classes = " btn-soft";
        if ($active) {
            $a_classes .= " menu-active";
            $btn_classes .= " btn-active btn-primary";
        }
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        if ($is_dropdown) {
            $output .= "<li><details><summary>";
            $output .= $item->title;
            $output .= "</summary>";
        } else {
            $output .= "<li class='" . $classes . "'>";
            $output .= "<a$attributes";
            if ($a_classes) {
                $output .= " class=\"" . $a_classes . "\"";
            }
            $output .= ">";
            $output .= $item->title;
            $output .= '</a>';
        }
    }

    function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $is_dropdown = !($item->url && $item->url != '#');
        if ($is_dropdown) {
            $output .= "</details></li>\n";
        } else {
            $output .= "</li>\n";
        }
    }
}

?>
