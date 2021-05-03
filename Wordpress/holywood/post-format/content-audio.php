<?php


$mp3 = rwmb_meta( 'holywood_audio_mp3' );
$oga = rwmb_meta( 'holywood_audio_ogg' );
$sc_url = rwmb_meta( 'holywood_audio_sc' );
$sc_color = rwmb_meta( 'holywood_audio_sc_color' );
$holywood_wp_audio = '[audio mp3="'.$mp3.'"  ogg="'.$oga.'"]';
$soundcloud_audio = '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.urlencode($sc_url).'&amp;show_comments=true&amp;auto_play=false&amp;color='.$sc_color.'"></iframe>';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if($sc_url!='') : ?>
        <div class="post-thumb blog-bg"><?php echo holywood_sanitize_data($soundcloud_audio); ?></div>
    <?php else : ?>
        <div class="post-thumb blog-bg">
            <?php if ( has_post_thumbnail()) : the_post_thumbnail(); endif; ?>
            <?php echo do_shortcode( $holywood_wp_audio ); ?>
        </div>
    <?php endif; ?>

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

            <?php $show_audio_meta = rwmb_meta( 'holywood_show_audio_meta' ); ?>
            <?php if ( $show_audio_meta == 'value1' ) : ?>
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

        <?php $show_quote_meta = rwmb_meta('holywood_post_content' ); ?>
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
