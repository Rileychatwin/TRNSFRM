
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

							<h2><?php _e('404', 'holywood');?> </h2>

							<p><?php _e('Oops! That page can&rsquo;t be found.', 'holywood');?></p>

							<p><?php ninetheme_holywood_breadcrubms(); ?></p>

						</div>
					</div>
				</div>

			</div>
		</header>

		<section id="blog">
			<div class="container has-margin-bottom">
				<div class="row">

					<?php if( ot_get_option( '404layout' ) == 'right-sidebar') { ?>
					<div class="col-lg-8  col-md-8 col-sm-12 index float-right posts">
					<?php } elseif( ot_get_option( '404layout' ) == 'left-sidebar') { ?>
					<?php get_sidebar(); ?>
					<div class="col-lg-8  col-md-8 col-sm-12 index float-left posts">
					<?php } elseif( ot_get_option( '404layout' ) == 'full-width') { ?>
					<div class="col-xs-12 full-width-index v">
					<?php } ?>
						<h3><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'holywood' ); ?></h3>
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'holywood' ); ?></p>
						<?php get_search_form(); ?>
					</div>

					<?php if( ot_get_option( '404layout' ) == 'right-sidebar') { ?>
						<?php get_sidebar(); ?>
					<?php } ?>

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
