<?php
/**
  * Font Awesome 5 Menu Handling + Shortcodes
  * see https://github.com/cogdog/font-awesome-5-menus
  * Shortcode Examples:
  * [fa class="fas fa-apple-alt fa-5x"]
  * [fa-stack class="fa-2x"][fa class="fas fa-camera fa-stack-1x"]<span style="color:Tomato">[fa class="fas fa-ban fa-stack-2x"]</span>[/fa-stack]
  */

    function FontAwesomeFive_init(){
        add_filter( 'nav_menu_css_class', 'nav_menu_css_class' );
        add_filter( 'walker_nav_menu_start_el', 'walker_nav_menu_start_el', 10, 4 );
        //add_shortcode( 'fa', 'shortcode_icon' );
        //add_shortcode( 'fa-stack', 'shortcode_stack' );        
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

    function shortcode_icon( $atts ){
        $a = shortcode_atts( array(
            'class' => ''
        ), $atts );
        if( !empty( $a[ 'class' ] ) ){
            $class_array = explode( ' ', $a[ 'class' ] );
            return '<i class="' . implode( ' ', $class_array ) . '"></i>';
        }
    }
    
    function shortcode_stack( $atts, $content = null ){
        $a = shortcode_atts( array(
            'class' => ''
        ), $atts );
        $class_array = array();
        if( empty( $a[ 'class' ] ) ){
            $class_array = array( 'fa-stack' );
        } else {
            $class_array = explode( ' ', $a[ 'class' ] );
            if( !in_array( 'fa-stack', $class_array ) ){
                $class_array[] = 'fa-stack';
            }
        }
        return '<span class="' . implode( ' ', $class_array ) . '">' . do_shortcode( $content ) . '</span>';
    }
    
add_action('init', 'FontAwesomeFive_init');
