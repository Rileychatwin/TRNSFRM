<?php
/**
* The template for displaying posts in the Quote post format.
*
* @package WordPress
* @subpackage holywood_
* @since holywood_ 1.0
*/

$quote_text = rwmb_meta( 'holywood_quote_text' );
$quote_author = rwmb_meta( 'holywood_quote_author' );
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id, true);
$color = rwmb_meta( 'holywood_quote_bg' );
$opacity = rwmb_meta( 'holywood_quote_bg_opacity' );
$opacity = $opacity / 100;
?>

<!-- Start .hentry -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="hentry-box">
        <div class="post-thumb">
            <div class="ql_wrapper">
                <?php if ( has_post_thumbnail() ) : ?>
                <div class="entry-media" style="background-image: url(<?php echo esc_url($image_url[0]); ?>); ">
                <?php else : ?>
                <div class="entry-media">
                <?php endif; ?>
                    <div class="ql_overlay" style="background-color: <?php echo esc_attr($color); ?>; opacity: <?php echo esc_attr($opacity); ?>;"></div>
                    <div class="ql_textwrap">
                        <h3><a href="<?php the_permalink(); ?>"><?php echo esc_attr($quote_text); ?></a></h3>
                        <p><a href="#" target="_blank" style="color: #ffffff;"><?php echo esc_attr($quote_author); ?></a></p>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

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

                <?php $show_quote_meta = rwmb_meta( 'holywood_show_quote_meta' ); ?>
                <?php if ( $show_quote_meta == 'value1' ) : ?>
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
    </div>
</article>
