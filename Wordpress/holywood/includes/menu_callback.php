	
	<?php
		wp_nav_menu( array(
			'menu'              => 'main-menu',
			'theme_location'    => 'primary',
			'depth'             => 2,
			'container'         => '',
			'container_class'   => '',
			'menu_class'        => 'cd-navigation cd-single-item-wrapper',
			'menu_id'		=> 'main-menu',
			'echo' => true,
			'fallback_cb'       => 'ninetheme_holywood_wp_bootstrap_navwalker::fallback',
			'walker'            => new ninetheme_holywood_wp_bootstrap_navwalker()
		));
	?>