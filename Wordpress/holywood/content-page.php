<?php
/**
* The default template for displaying content
*
* Used for both single and index/archive/search.
*
* @package WordPress
* @subpackage Nine_holywood
* @since Nine holywood 1.0
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <!-- Article Image -->
        <div class="article-img">
            <?php the_post_thumbnail('full'); ?>
        </div>
    <?php endif; ?>
    
    <div class="entry-content">
        <?php
        /* translators: %s: Name of current post */
        the_content( sprintf(
            esc_html__( 'Continue reading %s', 'holywood' ),
            the_title( '<span class="screen-reader-text">', '</span>', false )
        ));

        wp_link_pages( array(
            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'holywood' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
        ));
        edit_post_link( esc_html__( 'Edit', 'holywood' ), '<span class="edit-link">', '</span>' );
        ?>
    </div>
</article>
