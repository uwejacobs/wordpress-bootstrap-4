<?php
/**
  * Font Awesome 5 Menu Handling
  * see https://github.com/cogdog/font-awesome-5-menus
  */

    function FontAwesomeFive_init(){
        add_filter( 'nav_menu_css_class', 'nav_menu_css_class' );
        add_filter( 'walker_nav_menu_start_el', 'walker_nav_menu_start_el', 10, 4 );
    }

    function nav_menu_css_class( $classes ){
        if( is_array( $classes ) ){
            $tmp_classes = preg_grep( '/^(fa|fas|far|fal|fad|fab)(-\S+)?$/i', $classes );
            if( !empty( $tmp_classes ) ){
                $classes = array_values( array_diff( $classes, $tmp_classes ) );
            }
        }
        return $classes;
    }

    function replace_item( $item_output, $classes ){
        $spacer = "&nbsp;";

        $before = true;
        if( in_array( 'fa-after', $classes ) ){
            $classes = array_values( array_diff( $classes, array( 'fa-after' ) ) );
            $before = false;
        }

        $icon = '<span class="' . implode( ' ', $classes ) . '"></span>';

        preg_match( '/(<a.+>)(.+)(<\/a>)/i', $item_output, $matches );
        if( 4 === count( $matches ) ){
            $item_output = $matches[1];
            if( $before ){
                $item_output .= $icon . '<span class="fontawesome-text">' . $spacer . $matches[2] . '</span>';
            } else {
                $item_output .= '<span class="fontawesome-text">' . $matches[2] . $spacer . '</span>' . $icon;
            }
            $item_output .= $matches[3];
        }
        return $item_output;
    }
    
    function walker_nav_menu_start_el( $item_output, $item, $depth, $args ){
        if( is_array( $item->classes ) ){
            $classes = preg_grep( '/^(fa|fas|far|fal|fad|fab)(-\S+)?$/i', $item->classes );
            if( !empty( $classes ) ){
                $item_output = replace_item( $item_output, $classes );
            }
        }
        return $item_output;
    }
    
    add_action('init', 'FontAwesomeFive_init');
