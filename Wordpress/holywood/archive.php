
	<?php

		get_header();
		get_template_part('index_header');
		$current_blog_page_id = get_option('page_for_posts');

	?>
		<header class="hero nt-custom-pages-header inner">
			<div class="lj-overlay lj-overlay-color"></div>
			<div class="container">

				<?php if ( 'yes' !=  ot_get_option( 'holywood_use_new_header' ) ) : ?>

					<div class="row">
						<div class="col-sm-4 lj-logo wow fadeInDown">

							<?php if ( ot_get_option( 'holywood_logo_type' ) =='text' ) { ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="lj-logo-1x nt-text-logo"><?php echo esc_html( ot_get_option( 'holywood_text_logo' ) ) ?></a> <!-- Your Logo -->
							<?php } else { ?>

								<?php if ( ot_get_option( 'logoimg' ) ) : ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="lj-logo-1x"><img src="<?php echo esc_url( ot_get_option( 'logoimg' ) ) ?>" alt="Urip Logo"></a> <!-- Your Logo -->
								<?php  else : ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="lj-logo-1x"><img src="http://placehold.it/176x55&text=logo" alt="Urip Logo"></a> <!-- Your Logo -->
								<?php endif; ?>
							<?php } ?>

						</div>
					</div>

				<?php endif; ?>

				<div class="pages-header-text">
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-8  lj-photo-texts center padding-40-mobile">
							<?php if (get_post_meta( $current_blog_page_id, 'holywood_disable_title', true ) != true ) { ?>
								<h2><?php if(get_post_meta( $current_blog_page_id, 'holywood_alt_title', true )){
                                    echo get_post_meta( $current_blog_page_id, 'holywood_alt_title', true );
                                } else {
                                    echo ('Our latest news');
                                } ?></h2>
								<p class="lead-off">
									<?php
                                    if(get_post_meta( $current_blog_page_id, 'holywood_subtitle', true )){
									echo get_post_meta( $current_blog_page_id, 'holywood_subtitle', true );
                                }
                                ?>
								</p>
							<?php } ?>
							<p><?php ninetheme_holywood_breadcrubms(); ?></p>
						</div>
					</div>
				</div>

			</div>
		</header>

		<section id="blog">
			<div class="container has-margin-bottom">
				<div class="row">
					<div class="col-md-12-off has-margin-bottom-off">

						<?php if( ot_get_option( 'archivelayout' ) == 'right-sidebar') { ?>
						<div class="col-lg-8 col-md-8 col-sm-12 index float-right posts">
						<?php } elseif( ot_get_option( 'archivelayout' ) == 'left-sidebar') { ?>
						<?php get_sidebar(); ?>
						<div class="col-lg-8 col-md-8 col-sm-12 index float-left posts">
						<?php } elseif( ot_get_option( 'archivelayout' ) == 'full-width') { ?>
						<div class="col-xs-12 full-width-index v">
						<?php } ?>

						 <?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post();
								get_template_part( 'post-format/content', get_post_format() );
							endwhile;

							the_posts_pagination( array(
								'prev_text'          => esc_html__( 'Previous page', 'holywood' ),
								'next_text'          => esc_html__( 'Next page', 'holywood' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'holywood' ) . ' </span>',
							) );
							else :
								get_template_part( 'content', 'none' );
							endif;
						?>
						</div><!-- #end sidebar+ content -->

						<?php
                        if ( ot_get_option( 'archivelayout' ) == 'right-sidebar' ) {
							get_sidebar();
						}
                        ?>

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
