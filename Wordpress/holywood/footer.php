
<?php

if ( 'vc-templates' == ot_get_option('footer_template_type') && '' != ot_get_option( 'footer_template' ) ) {

        if ( function_exists('holywood_vc_print_saved_template') ) {
            echo'<footer class="holywood-footer holywood-footer-'.ot_get_option( 'footer_template' ).'">';
                echo holywood_vc_print_saved_template( ot_get_option( 'footer_template' ) );
            echo'</footer>';
        }

    } else {

        get_template_part( 'footer/widgetize' );
        get_template_part( 'footer/contact' );
        get_template_part( 'footer/copyright' );
        get_template_part( 'footer/links' );

    }
?>

<?php wp_footer(); ?>
</body>
</html>
