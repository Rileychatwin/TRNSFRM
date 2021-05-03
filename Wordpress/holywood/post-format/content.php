<?php
/**
* The default template for displaying content
*
* Used for both single and index/archive/search.
*
* @package WordPress
* @subpackage holywood
* @since holywood 1.0
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="article-img">
            <?php the_post_thumbnail('full'); ?>
        </div>
    <?php endif; ?>

    <div class="post-container">
        <div class="content-container">
            <div class="entry-header">
                <?php
                if ( is_single() ) {
                    the_title( '<h2 class="entry-title all-caps">', '</h2>' );
                } else {
                    the_title( sprintf( '<h2 class="entry-title all-caps"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
                }
                ?>
            </div>

            <ul class="entry-meta">
                <li><?php the_time('F j, Y'); ?></li>
                <?php if ( is_rtl() ) : ?>
                <li><?php the_category(', '); ?> <?php esc_html_e('in', 'holywood'); ?></li>
                <?php else : ?>
                <li><?php esc_html_e('in', 'holywood'); ?>  <?php the_category(', '); ?> </li>
                <?php endif; ?>
                <li><?php the_author(); ?></li>
            </ul>

        </div>

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
        </div>

        <?php
        if ( ! is_single() ) :
            $holywood_readmore = ot_get_option('holywood_read_more_title') ? ot_get_option('holywood_read_more_title') : esc_html__( 'Continue Reading', 'holywood' );
            ?>
            <a class="margin_30" href="<?php echo get_permalink(); ?>" role="button"><?php echo esc_html( $holywood_readmore); ?></a>
        <?php endif; ?>

        <?php do_action('holywood_after_post_social'); ?>

    </div>
</article>
