

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="blog-bg">
        <?php
        $images = rwmb_meta( 'holywood_gallery_image' );
        $holywoods_gallery_style = rwmb_meta( 'holywood_gallery_style' );
        ?>
        <?php if ( $holywoods_gallery_style == 'value1' ) : ?>
            <div class="flexslider">
                <ul class="slides">
                    <?php
                    foreach ( $images as $image ) {
                        echo "<li><img src='{$image['full_url']}' alt='{$image['alt']}' /></li>";
                    }
                    ?>
                </ul>
            </div>
        <?php endif; ?>
    </div><!-- Ends Post Media -->

    <div class="post-container">
        <div class="content-container">
            <?php $show_quote_meta = rwmb_meta( 'holywood_post_content_heading' ); ?>
            <?php if ( $show_quote_meta == 'value1' ) : ?>
                <div class="entry-header">
                    <?php
                    if ( is_single() ) {
                        the_title( '<h2 class="entry-title all-caps">', '</h2>' );
                    } else {
                        the_title( sprintf( '<h2 class="entry-title all-caps"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
                    }
                    ?>
                </div><!-- .entry-header -->
            <?php endif; ?>

            <?php $show_gallery_meta = rwmb_meta( 'holywood_show_gallery_meta' ); ?>
            <?php if ( $show_gallery_meta == 'value1' ) : ?>
                <ul class="entry-meta">
                    <li><?php the_time('F j, Y'); ?></li>
                    <?php if ( is_rtl() ) : ?>
                        <li><?php the_category(', '); ?> <?php esc_html_e('in', 'holywood'); ?></li>
                    <?php else : ?>
                        <li><?php esc_html_e('in', 'holywood'); ?>  <?php the_category(', '); ?></li>
                    <?php endif; ?>
                    <li><?php the_author(); ?></li>
                </ul>
            <?php endif; ?>
        </div>

        <?php $show_quote_meta = rwmb_meta( 'holywood_post_content' ); ?>
        <?php if ( $show_quote_meta == 'value1' ) : ?>
            <div class="entry-content">
                <?php
                if ( is_single() ) {
                    the_content();
                } else {
                    if ( has_excerpt() ) {
                        the_excerpt();
                    } else {
                        the_content();
                    }
                }

                ?>
                <?php if ( is_single() && has_tag() ) : ?>
                    <div class="tags-content"><?php esc_html_e( 'Tags:', 'holywood' ); ?> <?php the_tags( '', ', ', '' ); ?></div>
                <?php endif; ?>
            </div><!-- .entry-content -->

            <?php
            if ( ! is_single() ) :
                $holywood_readmore = ot_get_option('holywood_read_more_title') ? ot_get_option('holywood_read_more_title') : esc_html__( 'Continue Reading', 'holywood' );
                ?>
                <a class="margin_30" href="<?php echo get_permalink(); ?>" role="button"><?php echo esc_html( $holywood_readmore); ?></a>
            <?php endif; ?>
        <?php endif; ?>

        <?php do_action('holywood_after_post_social'); ?>
    </div>
</article><!-- #post-## -->
