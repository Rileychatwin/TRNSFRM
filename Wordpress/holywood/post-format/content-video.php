<?php
/**
* The template for displaying posts in the Video post format.
*
* @package WordPress
* @subpackage holywood_
* @since holywood_ 1.0
*/
$m4v = rwmb_meta( 'holywood_video_m4v' );
$ogv = rwmb_meta( 'holywood_video_ogv' );
$webm = rwmb_meta( 'holywood_video_webm' );
$image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$holywood_wp_video = '[video poster="'.$image_url.'" mp4="'.$m4v.'"  webm="'.$webm.'"]';
?>

<!-- Start .hentry -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="hentry-box">
        <?php $embed = rwmb_meta( 'holywood_video_embed' ); ?>
        <?php if ( $embed !='' ) : ?>
            <div class="post-thumb blog-bg">
                <div class="media-element video-responsive"><?php echo holywood_sanitize_data( $embed ); ?></div>
            </div>
        <?php else : ?>
            <div class="post-thumb"><?php echo do_shortcode( $holywood_wp_video ); ?></div>
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

                <?php $show_gallery_meta = rwmb_meta( 'holywood_show_video_meta' ); ?>
                <?php if ( $show_gallery_meta == 'value1' ) : ?>
                    <ul class="entry-meta">
                        <li><?php the_time('F j, Y'); ?></li>
                        <li><?php esc_html_e('in', 'holywood'); ?>  <?php the_category(', '); ?></li>
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
    </div>
</article>
