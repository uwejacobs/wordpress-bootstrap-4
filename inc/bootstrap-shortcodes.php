<?php

/**
 * Remove extra paragraphs and line breaks
 */
add_filter('the_content','btsu_fix_shortcodes');
function btsu_fix_shortcodes($content){
	$array = array (
			'<p>[' => '[',
			']</p>' => ']',
			']<br />' => ']',
			']<br>' => ']',
	);
	$content = strtr($content, $array);
	return $content;
}

// Container
add_shortcode('container','btsu_container_shortcode');
function btsu_container_shortcode( $atts, $content = null ) {
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'class'   => '',
            ),
            $atts
        )
    );
	$html = '<div class="container ' . esc_attr($class) . '">' . do_shortcode($content) . '</div>';
    return $html;
}

// Container Fluid
add_shortcode('containerfluid','btsu_containerfluid_shortcode');
function btsu_containerfluid_shortcode( $atts, $content = null ) {
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'class'   => '',
            ),
            $atts
        )
    );
	$html = '<div class="container-fluid ' . esc_attr($class) . '">' . do_shortcode($content) . '</div>';
    return $html;
}

// row
add_shortcode('row','btsu_row_shortcode');
function btsu_row_shortcode( $atts, $content = null ) {
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'class'   => '',
            ),
            $atts
        )
    );
	$html = '<div class="row ' . esc_attr($class) . '">' . do_shortcode($content) . '</div>';
    return $html;
}

// columns
add_shortcode('col','bs_col_shortcode');
function bs_col_shortcode( $atts, $content = null ) {
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'num'  => '',
                'xs'   => '',
                'sm'   => '',
                'md'   => '',
                'lg'   => '',
                'xl'   => '',
                'class'   => '',
            ),
            $atts
        )
    );
	ob_start();?>
	<div class="<?php
		if(!empty($num)){ echo 'col-'.$num.' ';}
		if(!empty($xs)){ echo 'col-xs-'.$xs.' ';}
		if(!empty($sm)){ echo 'col-sm-'.$sm.' ';}
		if(!empty($md)){ echo 'col-md-'.$md.' ';}
		if(!empty($lg)){ echo 'col-lg-'.$lg.' ';}
		if(!empty($xl)){ echo 'col-xl-'.$xl.' ';}
		else{ echo 'col';}
	?> ' . esc_attr($class) . '"><?php echo do_shortcode($content); ?></div>

	<?php return ob_get_clean();
}// columns


// Bootstrap Button Group
add_shortcode('span','bs_span_shortcode');
function bs_span_shortcode( $atts, $content = null ) {
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'class'   => '',
            ),
            $atts
        )
    );
    ob_start();?>
    <span class="<?php echo esc_attr($class); ?>"><?php echo do_shortcode($content); ?></span>
    <?php return ob_get_clean();
}


// Bootstrap Button Group
add_shortcode('btngroup','bs_button_group_shortcode');
function bs_button_group_shortcode( $atts, $content = null ) {
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'class'   => '',
            ),
            $atts
        )
    );
    ob_start();?>
    <div class="btn-group <?php echo esc_attr($class); ?>"><?php echo do_shortcode($content); ?></div>
    <?php return ob_get_clean();
}

// Bootstrap Button
add_shortcode('button','bs_button_shortcode');
function bs_button_shortcode( $atts, $content = null ) {
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'tag'  => 'button',
                'href'  => '',
                'type'   => 'button',
                'style'   => 'primary',
                'class'   => '',
            ),
            $atts
        )
    );
    ob_start();?>

    <?php if( $tag == "button" ) { ?> <button type="<?php echo esc_attr($type); ?>"
    class="btn btn-<?php echo esc_attr( $style ); ?> <?php echo esc_attr( $class ); ?>"><?php echo
    do_shortcode($content); ?></button> <?php } else if( $tag == "a" ) { ?> <a
    href="<?php echo esc_attr($href); ?>" type="<?php echo esc_attr($type); ?>" class="btn
    btn-<?php echo esc_attr( $style ); ?> <?php echo esc_attr( $class ); ?>"><?php echo do_shortcode($content); ?></a>
    <?php } else if( $tag == "input" ) { ?> <input type="<?php echo esc_attr($type);
    ?>" class="btn btn-<?php echo esc_attr( $style ); ?> <?php echo esc_attr( $class ); ?>" value="<?php
    echo esc_attr($content); ?>"> <?php } ?>

    <?php return ob_get_clean();
}


// Bootstrap Badge
add_shortcode('badge','bs_badge_shortcode');
function bs_badge_shortcode( $atts, $content = null ) {
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'class'   => '',
                'style'   => 'primary',
            ),
            $atts
        )
    );
    ob_start();?>

    <span class="badge badge-<?php echo esc_attr( $style ); ?>  <?php echo esc_attr($class); ?>"><?php echo do_shortcode($content); ?></span>

    <?php return ob_get_clean();
}


// Bootstrap Card Deck
add_shortcode('carddeck','bs_carddeck_shortcode');
function bs_carddeck_shortcode( $atts, $content = null ) {
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'class'   => '',
            ),
            $atts
        )
    );
    ob_start();?>
    <div class="card-deck <?php echo esc_attr($class); ?>"><?php echo do_shortcode($content); ?></div>
    <?php return ob_get_clean();
}

// Bootstrap Card
add_shortcode('card','bs_card_shortcode');
function bs_card_shortcode( $atts, $content = null ) {
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'class'   => '',
            ),
            $atts
        )
    );
    ob_start();?>
    <div class="card <?php echo esc_attr($class); ?>">
        <?php echo do_shortcode($content); ?>
    </div>
    <?php return ob_get_clean();
}

// Card Header
add_shortcode('cardheader','bs_cardheader_shortcode');
function bs_cardheader_shortcode( $atts, $content = null ) {
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'class'   => '',
            ),
            $atts
        )
    );
    ob_start();?>
    <div class="card-header <?php echo esc_attr($class); ?>">
      <?php echo do_shortcode($content); ?>
    </div>
    <?php return ob_get_clean();
}

// Card Body
add_shortcode('cardbody','bs_cardbody_shortcode');
function bs_cardbody_shortcode( $atts, $content = null ) {
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'class'   => '',
            ),
            $atts
        )
    );
    ob_start();?>
    <div class="card-body <?php echo esc_attr($class); ?>">
        <?php echo do_shortcode($content); ?>
    </div>
    <?php return ob_get_clean();
}

// Card Footer
add_shortcode('cardfooter','bs_cardfooter_shortcode');
function bs_cardfooter_shortcode( $atts, $content = null ) {
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'class'   => '',
            ),
            $atts
        )
    );
    ob_start();?>
    <div class="card-footer <?php echo esc_attr($class); ?>">
      <?php echo do_shortcode($content); ?>
    </div>
    <?php return ob_get_clean();
}

// Bootstrap accordion
// [accordion id="unique-id" class="unique-id" title="unique-id" open="no"] Accordion Content will goes here [/accordion]
add_shortcode('accordion','bs_accordion_shortcode');
function bs_accordion_shortcode( $atts, $content = null ) {
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'id'   => 'toggleid',
                'class'   => '',
                'title'  => 'button',
                'open'  => 'no',
            ),
            $atts
        )
    );
    ob_start();?>

    <div class="card <?php echo esc_attr($class); ?> <?php echo esc_attr(sanitize_title($id)); ?>">
        <div class="card-header">
          <a class="card-link" data-toggle="collapse" href="#<?php echo esc_attr(sanitize_title($id)); ?>">
            <?php echo esc_html($title); ?>
          </a>
        </div>
        <div id="<?php echo esc_attr(sanitize_title($id)); ?>" class="collapse <?php if( $open != "no" ){ __('show', 'wp-bt'); } ?>">
          <div class="card-body">
            <?php echo do_shortcode($content); ?>
          </div>
        </div>
    </div>

    <?php return ob_get_clean();
}

// Bootstrap List Group
add_shortcode('listgroup','bs_list_group_shortcode');
function bs_list_group_shortcode( $atts, $content = null ) {
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'class'   => '',
            ),
            $atts
        )
    );
    ob_start();?>
    <ul class="list-group <?php echo esc_attr($class); ?>"><?php echo do_shortcode($content); ?></ul>
    <?php return ob_get_clean();
}

// Bootstrap List Entry
add_shortcode('lig','bs_list_group_entry_shortcode');
function bs_list_group_entry_shortcode( $atts, $content = null ) {
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'class'   => '',
            ),
            $atts
        )
    );
    ob_start();?>

    <li class="list-group-item <?php echo esc_attr( $class ); ?>"><?php echo do_shortcode($content); ?></li>

    <?php return ob_get_clean();
}


// Bootstrap Tooltip
add_shortcode('tooltip','bs_tooltip_shortcode');
function bs_tooltip_shortcode( $atts, $content = null ) {
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'animation'  => 'true',
                'container'  => 'false',
                'delay'   => '0',
                'html'   => 'false',
                'placement'   => 'top',
                'selector'   => 'false',
                'template'   => '',
                'title'   => '',
                'trigger'   => 'hover focus',
                'offset'   => '0',
                'fallbackPlacement'   => 'flip',
                'boundary'   => 'scrollParent',
                'class'   => '',
            ),
            $atts
        )
    );
    ob_start();?>

    <a data-toggle="tooltip" title="<?php echo esc_attr($title); ?>" class="<?php echo esc_attr( $class ); ?>"
    data-animation="<?php echo esc_attr($animation); ?>"
    data-container="<?php echo esc_attr($container); ?>"
    data-delay="<?php echo esc_attr($delay); ?>"
    data-html="<?php echo esc_attr($html); ?>"
    data-placement="<?php echo esc_attr($placement); ?>"
    data-selector="<?php echo esc_attr($selector); ?>"
    data-template="<?php echo esc_attr($template); ?>"
    data-trigger="<?php echo esc_attr($trigger); ?>"
    data-offset="<?php echo esc_attr($offset); ?>"
    data-fallbackPlacement="<?php echo esc_attr($fallbackPlacement); ?>"
    data-boundary="<?php echo esc_attr($boundary); ?>"
    ><?php echo do_shortcode($content); ?></a>

    <?php return ob_get_clean();
}
