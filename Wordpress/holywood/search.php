

	<?php get_header();  get_template_part('index_header'); ?>

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
								<h2><?php echo esc_html($wp_query->found_posts); ?> <?php esc_html_e( 'Search Results Found For', 'holywood' ); ?>: "<?php the_search_query(); ?>"</h2>

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

						<?php if( ot_get_option( 'searchlayout' ) == 'right-sidebar') { ?>
						<div class="col-lg-8  col-md-8 col-sm-12 index float-right posts">
						<?php } elseif( ot_get_option( 'searchlayout' ) == 'left-sidebar') { ?>
						<?php get_sidebar(); ?>
						<div class="col-lg-8  col-md-8 col-sm-12 index float-left posts">
						<?php } elseif( ot_get_option( 'searchlayout' ) == 'full-width') { ?>
						<div class="col-xs-12 full-width-index v">
						<?php } ?>
						<?php
							if ( have_posts() ) :

								// Start the loop.
								while ( have_posts() ) : the_post();

									get_template_part( 'content', 'search' );

								// End the loop.
								endwhile;

								// Previous/next page navigation.
								the_posts_pagination( array(
									'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'holywood' ) . ' </span>',
								) );

							// If no content, include the "No posts found" template.
							else :
								get_template_part( 'content', 'none' );

							endif;

							wp_link_pages();

						?>
						</div><!-- #end sidebar+ content -->

						<?php if( ot_get_option( 'searchlayout' ) == 'right-sidebar') { ?>
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
