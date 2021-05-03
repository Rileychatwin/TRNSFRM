<?php

    get_header();
    get_template_part('index_header');

    $page_layout = ot_get_option( 'pagelayout' );
    $mb_page_layout = get_post_meta( get_the_ID(), 'holywood_pagelayout', true );
    $page_hero_visibility = get_post_meta( get_the_ID(), 'holywood_page_hero_visibility', true );
    $page_layout = '' != $mb_page_layout ? $mb_page_layout : $page_layout;
    $pagecontainer = get_post_meta( get_the_ID(), 'holywood_pagecontainer', true );
    $pagecontainer = '' != $pagecontainer ? $pagecontainer : 'container';
    $pageherologo = get_post_meta( get_the_ID(), 'holywood_page_hero_logo_visibility', true );
    $pagebread = get_post_meta( get_the_ID(), 'holywood_page_bread_visibility', true );
    $pageherocontentcolumn = get_post_meta( get_the_ID(), 'holywood_page_hero_content_column', true );
    $pageherocontentcolumn = '' != $pageherocontentcolumn ? $pageherocontentcolumn : 8;
    $page_hero_none = '0' == $page_hero_visibility ? ' page-hero-none' : '';

?>
<?php if ( '0' !=  $page_hero_visibility ) : ?>
<header class="hero nt-custom-pages-header inner">
    <div class="lj-overlay lj-overlay-color"></div>
    <div class="container">

        <?php if ( 'yes' !=  ot_get_option( 'holywood_use_new_header' ) ) : ?>
            <?php if ( '0' !=  $pageherologo ) : ?>

                <div class="row">
                    <div class="col-sm-4 lj-logo wow fadeInDown">

                        <?php if ( ot_get_option( 'holywood_logo_type' ) =='text' ) { ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="lj-logo-1x nt-text-logo"><?php echo esc_html( ot_get_option( 'holywood_text_logo' ) ) ?></a> <!-- Your Logo -->
                        <?php } else { ?>

                            <?php if ( ot_get_option( 'logoimg' ) ) : ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="lj-logo-1x"><img src="<?php echo esc_url( ot_get_option( 'logoimg' ) ) ?>" alt="Urip Logo"></a>
                            <?php endif; ?>
                        <?php } ?>

                    </div>
                </div>

            <?php endif; ?>
        <?php endif; ?>

        <div class="pages-header-text">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-<?php echo esc_attr( $pageherocontentcolumn ); ?> lj-photo-texts center padding-40-mobile">
                    <?php if ( ( get_post_meta( get_the_ID(), 'holywood_disable_title', true ) != true ) ){ ?>
                        <h2><?php if (get_post_meta( get_the_ID(), 'holywood_alt_title', true ) ) {
                            echo get_post_meta( get_the_ID(), 'holywood_alt_title', true );
                        } else {
                            the_title();
                        } ?></h2>
                    <?php } ?>
                    <?php if ( get_post_meta( get_the_ID(), 'holywood_subtitle', true ) ) { ?>
                        <p class="lead-off">
                            <?php echo get_post_meta( get_the_ID(), 'holywood_subtitle', true );?>
                        </p>
                    <?php } ?>
                    <?php if ( '0' != $pagebread ) { ?>
                        <p><?php echo ninetheme_holywood_breadcrubms(); ?></p>
                    <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </header>
<?php endif; ?>

<section id="blog" class="nt-page-content-wrapper<?php echo esc_attr( $page_hero_none ); ?>">
    <div class="<?php echo esc_attr( $pagecontainer ); ?> has-margin-bottom">
        <div class="row">
            <div class="col-md-12-off has-margin-bottom-off">

                <?php if ( $page_layout == 'right-sidebar' ) { ?>
                <div class="col-lg-9 col-md-9 col-sm-12 index float-right posts">
                <?php } elseif ( $page_layout == 'left-sidebar' ) { ?>
                <?php get_sidebar(); ?>
                <div class="col-lg-9 col-md-9 col-sm-12 index float-left posts">
                <?php } elseif ( $page_layout == 'full-width' ) { ?>
                <div class="col-xs-12 full-width-index v">
                <?php } ?>

                        <?php
                        // Start the loop.
                        while ( have_posts() ) : the_post();

                        // Include the page content template.
                        get_template_part( 'content', 'page' );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                        // End the loop.
                    endwhile;
                    ?>
                </div>

                <?php if ( $page_layout == 'right-sidebar') { ?>
                    <?php get_sidebar(); ?>
                <?php } ?>

            </div>
        </div>
    </div>
</section>

</main>

<?php if ( 'yes' !=  ot_get_option( 'holywood_use_new_header' ) ) : ?>
    <nav id="cd-lateral-nav">
        <?php get_template_part( 'includes/menu_callback'); ?>
    </nav>
<?php endif; ?>

<?php get_footer(); ?>
