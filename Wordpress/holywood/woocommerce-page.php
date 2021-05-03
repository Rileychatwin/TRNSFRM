	<?php

	get_header();
	get_template_part('index_header');

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

							<h2><?php  the_title(); ?></h2>

							<p class="lead-off">
								<span class="hidden-xs"><?php _e('Totals', 'holywood'); ?></span> : <span class="theme"><?php global $woocommerce; echo esc_html($woocommerce->cart->get_cart_subtotal());?></span>
							</p>

							<p><?php ninetheme_holywood_breadcrubms(); ?></p>

						</div>
					</div>
				</div>

			</div>
		</header>
		<div class="container has-margin-bottom">
			<div class="row">
				<div class="col-md-12-off has-margin-bottom-off">

					<?php if( ot_get_option( 'woopage' ) == 'right-sidebar') { ?>
					<div class="col-lg-9  col-md-9 col-sm-9 index float-right posts">
					<?php } elseif( ot_get_option( 'woopage' ) == 'left-sidebar') { ?>

					<div id="widget-area" class="widget-area col-lg-3 col-md-3 col-sm-3 woo-sidebar">
						<?php if ( is_active_sidebar( 'shop-page-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'shop-page-sidebar' ); ?>
						<?php } ?>
					</div>
					<div class="col-lg-9  col-md-9 col-sm-9 index float-left posts">
					<?php } elseif( ot_get_option( 'woopage' ) == 'full-width') { ?>
					<div class="col-xs-12 full-width-index v">
					<?php } ?>

						<?php woocommerce_content(); ?>

		           </div><!-- #end sidebar+ content -->

					<?php if( ot_get_option( 'woopage' ) == 'right-sidebar') { ?>
						<div id="widget-area" class="widget-area col-lg-3 col-md-3 col-sm-3 woo-sidebar">
						<?php if ( is_active_sidebar( 'shop-page-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'shop-page-sidebar' ); ?>
						<?php } ?>
						</div>
					<?php } ?>

				</div>
			</div>
		</div>
	</main>

	<?php if ( 'yes' !=  ot_get_option( 'holywood_use_new_header' ) ) : ?>
		<nav id="cd-lateral-nav">
			<?php get_template_part( 'includes/menu_callback'); ?>
		</nav>
	<?php endif; ?>

	<?php get_footer(); ?>
