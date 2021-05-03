<?php
/*
Template name: Unlimited Template
*/
	get_header();

	if ( 'yes' !=  ot_get_option( 'holywood_use_new_header' ) ) :

		$menubutton = rwmb_meta('holywood_menubutton' );
		$menubuttonhover = rwmb_meta('holywood_menubuttonhover' );
		$menuvisibility = rwmb_meta('holywood_menuvisibility' );
		$menutype = rwmb_meta('holywood_menutype' );

	?>

		<style>
			#cd-menu-trigger span { background-color: <?php echo esc_attr($menubutton); ?>; }
			#cd-menu-trigger span { color: <?php echo esc_attr($menubuttonhover); ?>; }
		</style>


		<?php if( ($menuvisibility) != 'hidden' ) : ?>
			<header id="main-header" class="the-origin-header">
				<a id="cd-menu-trigger" href="#0"><span class="cd-menu-icon"></span></a>
			</header>
		<?php endif; ?>

	<?php endif; ?>

	<main class="cd-main-content">
		<?php

			if (have_posts()) :

				while (have_posts()) : the_post();

					the_content();

				endwhile;

			endif;

		?>
	</main>

	<?php if ( 'yes' !=  ot_get_option( 'holywood_use_new_header' ) ) : ?>

		<?php if( $menuvisibility != 'hidden' ) : ?>
			<nav id="cd-lateral-nav">
			<?php if( $menutype == 'metabox' ) : ?>
				<ul class="cd-navigation cd-single-item-wrapper">
					<?php
						$contents = rwmb_meta('holywood_section_name' );
						$socialurl = rwmb_meta('holywood_section_url' );

						if( $contents !='' ) {
							foreach (array_combine($contents, $socialurl) as $content => $url) {
							echo ' 	<li><a href="'.esc_url($url).'">'.esc_html($content).'</a></li>';   }
						}
					?>
				</ul>
				<?php endif; ?>

				<?php if( $menutype == 'default' ) : ?>

					<?php get_template_part( 'includes/menu_callback'); ?>

				<?php endif; ?>

			</nav>
		<?php endif; ?>

	<?php endif; ?>

<?php get_footer(); ?>
