<?php

/*************************************************
## VC COMPOSER PAGE CSS
*************************************************/
/*
*	get vc composer custom css from by page id
*	and add css to head by wp_head hook
*/
if( ! function_exists('holywood_vc_inject_shortcode_css') )  {
    function holywood_vc_inject_shortcode_css( $id ){
        $shortcodes_custom_css = get_post_meta( $id, '_wpb_shortcodes_custom_css', true );
        if ( ! empty( $shortcodes_custom_css ) ) {
            $shortcodes_custom_css = strip_tags( $shortcodes_custom_css );
            echo '<style type="text/css" data-type="nt-shortcodes-custom-css-page-'.$id.'">';
            echo esc_attr( $shortcodes_custom_css );
            echo '</style>';
        }
    }
    add_action('wp_head', 'holywood_vc_inject_shortcode_css');
}



/*************************************************
## VC COMPOSER SAVED TEMPLATE LIST
*************************************************/
if( ! function_exists('holywood_vc_saved_template_list') )  {
    function holywood_vc_saved_template_list()
    {

        $options = array(
            array(
                'value' => '',
                'label' => esc_html__( 'None', 'holywood' )
            )
        );
        $saved_templates = get_option( 'wpb_js_templates' );
        if ( !empty( $saved_templates ) ) {
            foreach ( $saved_templates as $template => $key ) {
                $options[] = array(
                    'value' => $template,
                    'label' => $key['name']
                );
            }
        }
        return $options;
    }
}


/*************************************************
## VC COMPOSER SAVED TEMPLATE CONTENT
*************************************************/
if( ! function_exists( 'holywood_vc_print_saved_template' ) ) {

    function holywood_vc_print_saved_template( $template_id = '')
    {
        $content  = '';
        if ( $template_id ) {
            $saved_templates = get_option( 'wpb_js_templates' );
            $content = trim( $saved_templates[ $template_id ][ 'template' ] );
            $content = str_replace( '\"', '"', $content );
            $pattern = get_shortcode_regex();
            $content = preg_replace_callback( "/{$pattern}/s", 'vc_convert_shortcode', $content );
        }
        return do_shortcode( $content );
    }
}


/*************************************************
## PARSE VC COMPOSER SAVED TEMPLATE CONTENT CSS
*************************************************/
if( ! function_exists( 'holywood_parse_shortcodes_template_css' ) ) {

    function holywood_parse_shortcodes_template_css( $content )
    {

        $css = '';
        if ( ! preg_match( '/\s*(\.[^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', $content ) ) {
            return $css;
        }

        preg_match_all( '/' . get_shortcode_regex() . '/', $content, $shortcodes );
        foreach ( $shortcodes[2] as $index => $tag ) {
            $shortcode = class_exists( 'WPBMap' ) ? WPBMap::getShortCode( $tag ) : '';
            $attr_array = shortcode_parse_atts( trim( $shortcodes[3][ $index ] ) );
            if ( isset( $shortcode['params'] ) && ! empty( $shortcode['params'] ) ) {
                foreach ( $shortcode['params'] as $param ) {
                    if ( isset( $param['type'] ) && 'css_editor' === $param['type'] && isset( $attr_array[ $param['param_name'] ] ) ) {
                        $css .= $attr_array[ $param['param_name'] ];
                    }
                }
            }
        }

        foreach ( $shortcodes[5] as $shortcode_content ) {
            $css .= holywood_parse_shortcodes_template_css( $shortcode_content );
        }

        return $css;
    }
}


/*************************************************
## ADD HEAD VC COMPOSER SAVED TEMPLATE CONTENT CSS
*************************************************/
if( ! function_exists( 'holywood_add_template_css_to_head' ) ) {
    function holywood_add_template_css_to_head()
    {
        $template = array(
            ot_get_option( 'footer_template' ),
        );

        $saved_templates = get_option( 'wpb_js_templates' );
        $theCSS = '';

        if ( !empty( $template ) ) {
            foreach ( $template as $template_id ) {
                if ( $template_id ) {
                    $content = trim( $saved_templates[ $template_id ][ 'template' ] );
                    $content = str_replace( '\"', '"', $content );
                    $pattern = get_shortcode_regex();
                    $content = preg_replace_callback( "/{$pattern}/s", 'vc_convert_shortcode', $content );
                    $theCSS .= holywood_parse_shortcodes_template_css( $content );
                }
            }
            if ( !empty( $theCSS ) ) {
                wp_register_style( 'holywood-vc-template-custom', false );
                wp_enqueue_style( 'holywood-vc-template-custom' );
                wp_add_inline_style( 'holywood-vc-template-custom', $theCSS );
            }
        }
    }
    add_action( 'wp_enqueue_scripts', 'holywood_add_template_css_to_head' );
}
