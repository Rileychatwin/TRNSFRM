<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>
    <!-- Meta UTF8 charset -->
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <?php wp_head(); ?>

</head>

<!-- BODY START=========== -->
<body <?php body_class(); ?>>

    <?php if ( ! function_exists( 'wp_body_open' ) ) {
        function wp_body_open() {
            do_action( 'wp_body_open' );
        }
    }
    if ( ot_get_option('holywood_pre') != 'off' ) { ?>
            <?php if ( ot_get_option('holywood_pre_type', 'def' ) == 'def' ) : ?>
                <div class="lj-preloader"></div>
            <?php else : ?>
                <div id="preloader">
                    <div class="loader<?php echo ot_get_option('holywood_pre_type'); ?>"></div>
                </div>
            <?php endif; ?>
        <?php
    }

    ?>

    <!-- PRELOADER -->

    <!-- /PRELOADER -->
    <?php do_action('holywood_preloader_action'); ?>
    <?php

    if ( 'no' != ot_get_option( 'holywood_use_new_header' ) ) {

        do_action('holywood_before_header_action');

        do_action('holywood_header_action');

        holywood_backtop();
    }

    ?>
