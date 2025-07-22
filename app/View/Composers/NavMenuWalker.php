<?php

class Navbar_Menu_Walker extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = null)
    {
//        $output .= "\n<!-- start_lvl $depth -->\n  ";
        if ($depth == 0) {
            $output .= "<ul tabindex=\"0\" class=\"dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm\">";
        } else {
            $output .= "<ul>\n";
        }
    }

    function end_lvl(&$output, $depth = 0, $args = null)
    {
//        $output .= "\n<!-- end_lvl $depth -->\n  ";
        if ($depth == 0) {
            $output .= "</ul>\n";
        } else {
            $output .= "</ul>\n";
        }
    }

    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
//        $output .= "\n<!-- start_el $item->title at depth $depth -->\n  ";
        $is_dropdown = !($item->url && $item->url != '#');
        $classes = implode(" ", $item->classes);
        $active = in_array("current_page_item", $item->classes) || in_array("current-menu-item", $item->classes);
        $a_classes = "";
        $btn_classes = "btn join-item w-min btn-soft";
        if ($active) {
            $a_classes .= " menu-active";
            $btn_classes .= " btn-active btn-primary";
        }
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        if ($is_dropdown) {
            if ($depth == 0) {
                $output .= "<div class=\"dropdown dropdown-bottom dropdown-end\">";
                $output .= "<div tabindex=\"0\" role=\"button\" class=\"". $btn_classes . "\">";
                $output .= $item->title;
                $output .= "</div>";
            } else {
                $output .= "<li><details open><summary>";
                $output .= $item->title;
                $output .= "</summary>";
            }
        } else {
            if ($depth == 0) {
                $output .= "<a role=\"button\" class=\"" . $btn_classes . "\"$attributes>";
                $output .= $item->title;
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
    }

    function end_el(&$output, $item, $depth = 0, $args = null)
    {
//        $output .= "\n<!-- end_el $item->title at depth $depth -->\n  ";
        $is_dropdown = !($item->url && $item->url != '#');
        if ($is_dropdown) {
            if ($depth == 0) {
                $output .= "</div>\n";
            } else {
                $output .= "</details></li>\n";
            }
        } else {
            if ($depth == 0) {
                $output .= "</a>\n";
            } else {
                $output .= "</li>\n";
            }
        }
    }
}

?>

