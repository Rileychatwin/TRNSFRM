
<?php
/**
* The template for displaying posts in the Aside post format.
*
* @package WordPress
* @subpackage holywood
* @since holywood 1.0
*/
?>

<!-- Start .hentry -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="hentry-box">
        <div class="entry-wrap">
            <div class="entry-content">
                <?php the_content(esc_html__('Read More', 'holywood')); ?>
                <?php wp_link_pages( array( 'before' => '<div class="post-pagination"><em class="page-links-title">' . esc_html__( 'Pages:', 'holywood' ) . '</em>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
            </div>
        </div>
    </div>
</article>
