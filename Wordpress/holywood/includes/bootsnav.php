<?php

if ( is_admin() )
return false;

/**
 * Custom template parts for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package holywood
*/

/*************************************************
## Register Menu
*************************************************/


class Holywood_Wp_Bootstrap_Navwalker extends Walker_Nav_Menu {

function start_lvl( &$output, $depth = 0, $args = array() ) {

	$indent = str_repeat( "\t", $depth );
	$submenu = ($depth > 0) ? 'text-left' : '';
	$output	.= "\n$indent<ul class=\"dropdown-menu depth_$depth\" >\n";

}

function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

	$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

	$li_attributes = '';
	$class_names = $value = '';

	$classes = empty( $item->classes ) ? array() : (array) $item->classes;
	// managing divider: add divider class to an element to get a divider before it.
	$divider_class_position = array_search('divider', $classes);
	if($divider_class_position !== false){
	$output .= "<li class=\"divider\"></li>\n";
	unset($classes[$divider_class_position]);
	}
	$classes[] = ($args->has_children) ? 'dropdown dropdown-right' : '';
	$classes[] = ($item->current || $item->current_item_ancestor) ? '' : '';
	$classes[] = 'menu-item-' . $item->ID;
	if($depth && $args->has_children){
	$classes[] = 'dropdown dropdown-right';
}

	$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
	$class_names = ' class="' . esc_attr( $class_names ) . '"';

	$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
	$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

	$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';


	$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
	$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
	$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
	$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
	$attributes .= ($args->has_children)  ? ' class="dropdown-toggle"  data-toggle="dropdown"' : ' class="scroll"';


	$item_output = $args->before;
	$item_output .= '<a'. $attributes .'>';
	$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

	$item_output .= (($depth == 0 || 1) && $args->has_children) ? '</a>' : '</a>';
	$item_output .= $args->after;


	$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}

function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

	if ( !$element )
	return;

	$id_field = $this->db_fields['id'];

	//display this element
	if ( is_array( $args[0] ) )
	$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
	else if ( is_object( $args[0] ) )
	$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
	$cb_args = array_merge( array(&$output, $element, $depth), $args);
	call_user_func_array(array(&$this, 'start_el'), $cb_args);

	$id = $element->$id_field;

	// descend only when the depth is right and there are childrens for this element
	if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

	foreach( $children_elements[ $id ] as $child ){

	if ( !isset($newlevel) ) {
	$newlevel = true;
	//start the child delimiter
	$cb_args = array_merge( array(&$output, $depth), $args);
	call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
	}
	$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
	}
	unset( $children_elements[ $id ] );
	}

	if ( isset($newlevel) && $newlevel ){
	//end the child delimiter
	$cb_args = array_merge( array(&$output, $depth), $args);
	call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
	}

	//end this element
	$cb_args = array_merge( array(&$output, $element, $depth), $args);
	call_user_func_array(array(&$this, 'end_el'), $cb_args);

	}

    /**
     * Menu Fallback
     *
     * @since 1.0.0
     *
     * @param array $args passed from the wp_nav_menu function.
     */
    public static function fallback( $args ) {
      if ( current_user_can( 'edit_theme_options' ) ) {

        echo '<li><a href="' . admin_url( 'nav-menus.php' ) . '">' . esc_html__( 'Add a menu', 'holywood' ) . '</a></li>';

      }
    }
}


/*************************************************
##  LOGO
*************************************************/

if ( ! function_exists( 'holywood_logo' ) ) {
	function holywood_logo() {

        if ( ot_get_option( 'holywood_logo_display' ) != 'off' ) {
            if ( ot_get_option( 'holywood_logo_type' ) == 'text' ) {

                echo '<a href="'.esc_url(home_url('/')).'" class="lj-logo-1x nt-text-logo navbar-brand">'.esc_html(ot_get_option('holywood_text_logo')).'</a>';

            } else {

                if ( ot_get_option( 'logoimg' ) ) {

                    echo '<a href="'.esc_url(home_url( '/' )).'" class="navbar-brand"><img src="'.esc_url(ot_get_option('logoimg' )).'" class="logo" alt="Logo"></a>';

                } else {

                    echo '<a href="'.esc_url(home_url('/')).'" class="navbar-brand"><img src="http://placehold.it/176x55&text=logo" alt="Logo"></a>';

                }
            }
        }
    }
}

if ( ! function_exists( 'holywood_sticky_logo' ) ) {
	function holywood_sticky_logo() {

        if ( ot_get_option( 'holywood_logo_display' ) != 'off' ) {
            if ( ot_get_option( 'holywood_logo_type' ) =='text' ) {

                echo '<a href="'.esc_url( home_url( '/' ) ).'" class="nt-text-logo navbar-brand">'.esc_html( ot_get_option( 'holywood_text_logo' ) ).'</a>';

            } else {

                if ( ot_get_option( 'logoimg' ) ) {

                    echo '<a href="'.esc_url( home_url( '/' ) ).'" class="img-logo navbar-brand">
                        <img src="'.esc_url( ot_get_option( 'logoimg' ) ).'" class="logo logo-display" alt="Logo">';
                        if ( ot_get_option( 'slogoimg' ) ) {
                        echo '<img src="'.esc_url( ot_get_option( 'slogoimg' ) ).'" class="logo logo-scrolled" alt="Logo">';
                        }
                    echo '</a>';

                } else {

                    echo '<a href="'.esc_url( home_url( '/' ) ).'" class="lj-logo-1x"><img src="http://placehold.it/176x55&text=logo" alt="Urip Logo"></a>';

                }
            }
        }
    }
}


/*************************************************
##  TOP HEADER SEARCH FORM
*************************************************/

if ( ! function_exists( 'holywood_header_search' ) ) {
	function holywood_header_search() {

		if( 'off' != ot_get_option( 'holywood_header_search_display' ) ) {

            $form = '<form role="search" method="get" id="header-searchform" class="searchform" action="'.esc_url(home_url('/')).'">
            <div class="top-search">
                <div class="container">
                    <div class="input-group">
                		<input type="text" value="' . get_search_query() . '" name="s" id="hs" class="form-control" placeholder="'.esc_attr__('Start Typing &amp; Press Enter ...', 'holywood').'">
                        <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                    </div>
                </div>
            </div>
            </form>';
        return $form;
		}
	}
    add_filter('get_search_form', 'holywood_header_search');
}

/*************************************************
## THEME SEARCH FORM
*************************************************/

function holywood_custom_search_form( $form ) {

	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url( home_url( '/' ) ) . '">
		<div>
			<label class="screen-reader-text" for="s">'. esc_attr__( 'Search for...', 'holywood' ) .'</label>
			<input type="text" value="' . get_search_query() . '" name="s" id="s">
			<input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search', 'holywood' ) .'">
		</div>
	</form>';

  return $form;
}
add_filter( 'get_search_form', 'holywood_custom_search_form' );

/*************************************************
##  TOP HEADER SIDEBAR MENU
*************************************************/

if ( ! function_exists( 'holywood_header_sidebarmenu' ) ) {
	function holywood_header_sidebarmenu() {

		if( 'off' != ot_get_option( 'holywood_header_sidebarmenu_display' ) && is_active_sidebar('sidebar-menu') ) {

            echo '<div class="side sidebar-menu">';
                echo '<a href="#" class="close-side"><i class="fa fa-times"></i></a>';
                dynamic_sidebar('sidebar-menu');
            echo '</div>';
		}
	}

}

/*************************************************
##  HEADER SOCIAL ICON & SEARCH BUTTON
*************************************************/

if ( ! function_exists( 'holywood_header_attr' ) ) {
	function holywood_header_attr() {

        $socials = ot_get_option( 'holywood_header_social_icon', array() );
        $nav_search = ot_get_option( 'holywood_header_search_display' );
        $nav_sidebar = ot_get_option( 'holywood_header_sidebarmenu_display' );

        if( $nav_sidebar == 'off' || !empty($socials) || $nav_search != 'off' ) {

        echo '<div class="attr-nav">
                <ul>';

                if( $nav_search != 'off' ) {
                    echo '<li class="search"><a href="#"><i class="fa fa-search"></i></a></li>';
                }

                if( $socials != '' ) {    

                    foreach ($socials as $s) {

                        echo '<li class="social-link"><a href="'.esc_url($s['header_social_link']).'"><i class="'.esc_attr($s['header_social']).'"></i></a></li>';

                    }

                }

                if( $nav_sidebar != 'off' ) {
                    echo '<li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li>';
                }

            echo '</ul>
        </div>';


		}
	}
}

/*************************************************
##  THEME NAVIGATION
*************************************************/

if ( ! function_exists( 'holywood_header' ) ) {
	function holywood_header() {

        wp_enqueue_style( 'bootsnav' );
        wp_enqueue_style( 'bootsnav-custom' );
        wp_enqueue_script( 'bootstrap' );
        wp_enqueue_script( 'bootsnav' );

        echo '<header id="home" class="nt-site-header">';

            holywood_header_type();

        echo '</header>';

	}
}
add_action( 'holywood_header_action',  'holywood_header', 10 );

/*************************************************
##  HEADER NAVBAR TYPE
*************************************************/

if ( ! function_exists( 'holywood_header_type' ) ) {
	function holywood_header_type() {

        $menu_align = ot_get_option( 'holywood_menu_align' );
        $animation_in = ot_get_option( 'holywood_menu_submenu_animation_in' );
        $animation_out = ot_get_option( 'holywood_menu_submenu_animation_out' );

        if ( 'brand-center' == ot_get_option( 'holywood_nav_type' ) ) {

            echo '<nav class="navbar navbar-default brand-center navbar-sticky bootsnav">';

                echo '<div class="container">';

                    echo '<div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>';

                        holywood_sticky_logo();

                    echo '</div>

                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav" data-in="'.esc_attr($animation_in).'" data-out="'.esc_attr($animation_out).'">';

                            //default wp menu
                            wp_nav_menu( array(
                                'menu'            => 'main-menu',
                                'theme_location'  => 'primary',
                                'container'       => '', // menu wrapper element
                                'container_class' => '',
                                'container_id'    => '',  // default: none
                                'menu_class'      => '', // ul class
                                'menu_id'         => '', // ul id
                                'items_wrap'      => '%3$s',
                                'before'          => '', // before <a>
                                'after'           => '', // after <a>
                                'link_before'     => '', // inside <a>, before text
                                'link_after'      => '', // inside <a>, after text
                                'depth'           => 3, // '0' to display all depths
                                'echo' 			  => true,
                                'fallback_cb'     => 'Holywood_Wp_Bootstrap_Navwalker::fallback',
                                'walker'          => new Holywood_Wp_Bootstrap_Navwalker()
                            ));

                        echo '</ul>
                    </div>
                </div>
            </nav>';

        } elseif ( 'brand-center-two' == ot_get_option( 'holywood_nav_type' ) ) {

            echo '<nav class="navbar navbar-default brand-center center-side navbar-sticky bootsnav">

                <div class="container">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>';

                        holywood_sticky_logo();

                    echo '</div>

                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav" data-in="'.esc_attr($animation_in).'" data-out="'.esc_attr($animation_out).'">';

                            //default wp menu
                            wp_nav_menu( array(
                                'menu'            => 'main-menu',
                                'theme_location'  => 'primary',
                                'container'       => '', // menu wrapper element
                                'container_class' => '',
                                'container_id'    => '',  // default: none
                                'menu_class'      => '', // ul class
                                'menu_id'         => '', // ul id
                                'items_wrap'      => '%3$s',
                                'before'          => '', // before <a>
                                'after'           => '', // after <a>
                                'link_before'     => '', // inside <a>, before text
                                'link_after'      => '', // inside <a>, after text
                                'depth'           => 3, // '0' to display all depths
                                'echo' 			  => true,
                                'fallback_cb'     => 'Holywood_Wp_Bootstrap_Navwalker::fallback',
                                'walker'          => new Holywood_Wp_Bootstrap_Navwalker()
                            ));

                        echo '</ul>
                    </div>
                </div>
            </nav>';

        } elseif ( 'navbar-full' == ot_get_option( 'holywood_nav_type' ) ) {

            echo '<nav class="navbar navbar-default navbar-full navbar-sticky bootsnav">

                <div class="container">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>';

                        holywood_logo();

                    echo '</div>

                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav" data-in="zoomIn" data-out="zoomOut">';

                            //default wp menu
                            wp_nav_menu( array(
                                'menu'            => 'main-menu',
                                'theme_location'  => 'primary',
                                'container'       => '', // menu wrapper element
                                'container_class' => '',
                                'container_id'    => '',  // default: none
                                'menu_class'      => '', // ul class
                                'menu_id'         => '', // ul id
                                'items_wrap'      => '%3$s',
                                'before'          => '', // before <a>
                                'after'           => '', // after <a>
                                'link_before'     => '', // inside <a>, before text
                                'link_after'      => '', // inside <a>, after text
                                'depth'           => 1, // '0' to display all depths
                                'echo' 			  => true,
                                'fallback_cb'     => 'Holywood_Wp_Bootstrap_Navwalker::fallback',
                                'walker'          => new Holywood_Wp_Bootstrap_Navwalker()
                            ));

                        echo '</ul>';
                        $socials = ot_get_option( 'holywood_header_social_icon', array() );

                        if( !empty($socials) ) {
                            echo '<div class="share">
                                    <ul>';
                                foreach ($socials as $s) {
                                    echo '<li><a href="'.esc_url($s['header_social_link']).'"><i class="'.esc_attr($s['header_social']).'"></i></a></li>';
                                }
                            echo '</ul>
                            </div>';
                        }
                    echo '</div>
                </div>
            </nav>';

        } elseif ( 'navbar-sidebar' == ot_get_option( 'holywood_nav_type' ) ) {

            echo '<nav class="navbar navbar-default navbar-sidebar bootsnav">

                <div class="container">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>';

                        holywood_logo();

                    echo '</div>

                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav" data-in="'.esc_attr($animation_in).'" data-out="'.esc_attr($animation_out).'">';

                            //default wp menu
                            wp_nav_menu( array(
                                'menu'            => 'main-menu',
                                'theme_location'  => 'primary',
                                'container'       => '', // menu wrapper element
                                'container_class' => '',
                                'container_id'    => '',  // default: none
                                'menu_class'      => '', // ul class
                                'menu_id'         => '', // ul id
                                'items_wrap'      => '%3$s',
                                'before'          => '', // before <a>
                                'after'           => '', // after <a>
                                'link_before'     => '', // inside <a>, before text
                                'link_after'      => '', // inside <a>, after text
                                'depth'           => 3, // '0' to display all depths
                                'echo' 			  => true,
                                'fallback_cb'     => 'Holywood_Wp_Bootstrap_Navwalker::fallback',
                                'walker'          => new Holywood_Wp_Bootstrap_Navwalker()
                            ));

                        echo '</ul>';

                        $socials = ot_get_option( 'holywood_header_social_icon', array() );

                        if( !empty($socials) ) {
                            echo '<div class="share">
                                    <ul>';
                                foreach ($socials as $s) {
                                    echo '<li><a href="'.esc_url($s['header_social_link']).'"><i class="'.esc_attr($s['header_social']).'"></i></a></li>';
                                }
                            echo '</ul>
                            </div>';
                        }

                    echo '</div>
                </div>
            </nav>';

        } elseif ( 'navbar-brand-top' == ot_get_option( 'holywood_nav_type' ) ) {

            echo '<nav class="navbar navbar-default navbar-brand-top bootsnav">

                <div class="container">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>';

                        holywood_logo();

                    echo '</div>

                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav" data-in="'.esc_attr($animation_in).'" data-out="'.esc_attr($animation_out).'">';

                            //default wp menu
                            wp_nav_menu( array(
                                'menu'            => 'main-menu',
                                'theme_location'  => 'primary',
                                'container'       => '', // menu wrapper element
                                'container_class' => '',
                                'container_id'    => '',  // default: none
                                'menu_class'      => '', // ul class
                                'menu_id'         => '', // ul id
                                'items_wrap'      => '%3$s',
                                'before'          => '', // before <a>
                                'after'           => '', // after <a>
                                'link_before'     => '', // inside <a>, before text
                                'link_after'      => '', // inside <a>, after text
                                'depth'           => 3, // '0' to display all depths
                                'echo' 			  => true,
                                'fallback_cb'     => 'Holywood_Wp_Bootstrap_Navwalker::fallback',
                                'walker'          => new Holywood_Wp_Bootstrap_Navwalker()
                            ));

                        echo '</ul>
                    </div>
                </div>
            </nav>';

        } elseif ( 'navbar-sticky' == ot_get_option( 'holywood_nav_type' ) ) {

            echo '<nav class="navbar navbar-default navbar-sticky bootsnav">';

                echo holywood_header_search();

                echo '<div class="container">';

                        holywood_header_attr();

                        echo '<div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                    <i class="fa fa-bars"></i>
                                </button>';

                                holywood_sticky_logo();

                        echo '</div>

                        <div class="collapse navbar-collapse" id="navbar-menu">
                            <ul class="nav navbar-nav '.esc_attr($menu_align).'" data-in="'.esc_attr($animation_in).'" data-out="'.esc_attr($animation_out).'">';

                                //default wp menu
                                wp_nav_menu( array(
                                    'menu'            => 'main-menu',
                                    'theme_location'  => 'primary',
                                    'container'       => '', // menu wrapper element
                                    'container_class' => '',
                                    'container_id'    => '',  // default: none
                                    'menu_class'      => '', // ul class
                                    'menu_id'         => '', // ul id
                                    'items_wrap'      => '%3$s',
                                    'before'          => '', // before <a>
                                    'after'           => '', // after <a>
                                    'link_before'     => '', // inside <a>, before text
                                    'link_after'      => '', // inside <a>, after text
                                    'depth'           => 3, // '0' to display all depths
                                    'echo' 			  => true,
                                    'fallback_cb'     => 'Holywood_Wp_Bootstrap_Navwalker::fallback',
                                    'walker'          => new Holywood_Wp_Bootstrap_Navwalker()
                                ));

								echo '</ul>
				                </div>
				            </div>';

				        holywood_header_sidebarmenu();

				    echo '</nav>';

        } elseif ( 'navbar-scrollspy' == ot_get_option( 'holywood_nav_type' ) ) {

            echo '<nav class="navbar navbar-default navbar-sticky navbar-scrollspy bootsnav">';

                echo holywood_header_search();

                echo '<div class="container">';

                    holywood_header_attr();

                    echo '<div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>';

                            holywood_sticky_logo();

                    echo '</div>

                        <div class="collapse navbar-collapse" id="navbar-menu">
                            <ul class="nav navbar-nav '.esc_attr($menu_align).'" data-in="'.esc_attr($animation_in).'" data-out="'.esc_attr($animation_out).'">';

                                //default wp menu
                                wp_nav_menu( array(
                                    'menu'            => 'main-menu',
                                    'theme_location'  => 'primary',
                                    'container'       => '', // menu wrapper element
                                    'container_class' => '',
                                    'container_id'    => '',  // default: none
                                    'menu_class'      => '', // ul class
                                    'menu_id'         => '', // ul id
                                    'items_wrap'      => '%3$s',
                                    'before'          => '', // before <a>
                                    'after'           => '', // after <a>
                                    'link_before'     => '', // inside <a>, before text
                                    'link_after'      => '', // inside <a>, after text
                                    'depth'           => 3, // '0' to display all depths
                                    'echo' 			  => true,
                                    'fallback_cb'     => 'Holywood_Wp_Bootstrap_Navwalker::fallback',
                                    'walker'          => new Holywood_Wp_Bootstrap_Navwalker()
                                ));

						echo '</ul>
		                </div>
		            </div>';

		        holywood_header_sidebarmenu();

		    echo '</nav>';

        } elseif ( 'navbar-fixed-white' == ot_get_option( 'holywood_nav_type' ) ) {

            echo '<nav class="navbar navbar-default navbar-fixed white no-background bootsnav">';

                echo holywood_header_search();

                echo '<div class="container">';

                    holywood_header_attr();

                    echo '<div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>';

                            holywood_sticky_logo();

                    echo '</div>

                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav '.esc_attr($menu_align).'" data-in="'.esc_attr($animation_in).'" data-out="'.esc_attr($animation_out).'">';

                            //default wp menu
                            wp_nav_menu( array(
                                'menu'            => 'main-menu',
                                'theme_location'  => 'primary',
                                'container'       => '', // menu wrapper element
                                'container_class' => '',
                                'container_id'    => '',  // default: none
                                'menu_class'      => '', // ul class
                                'menu_id'         => '', // ul id
                                'items_wrap'      => '%3$s',
                                'before'          => '', // before <a>
                                'after'           => '', // after <a>
                                'link_before'     => '', // inside <a>, before text
                                'link_after'      => '', // inside <a>, after text
                                'depth'           => 3, // '0' to display all depths
                                'echo' 			  => true,
                                'fallback_cb'     => 'Holywood_Wp_Bootstrap_Navwalker::fallback',
                                'walker'          => new Holywood_Wp_Bootstrap_Navwalker()
                            ));

							echo '</ul>
	                    </div>
	                </div>';

	                holywood_header_sidebarmenu();

	        echo '</nav>';

        } elseif ( 'navbar-fixed-dark' == ot_get_option( 'holywood_nav_type' ) ) {

            echo '<nav class="navbar navbar-default navbar-fixed dark no-background bootsnav">';

                echo holywood_header_search();

                echo '<div class="container">';

                    holywood_header_attr();

                    echo '<div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>';

                        holywood_sticky_logo();

                    echo '</div>

                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav '.esc_attr($menu_align).'" data-in="'.esc_attr($animation_in).'" data-out="'.esc_attr($animation_out).'">';

                            //default wp menu
                            wp_nav_menu( array(
                                'menu'            => 'main-menu',
                                'theme_location'  => 'primary',
                                'container'       => '', // menu wrapper element
                                'container_class' => '',
                                'container_id'    => '',  // default: none
                                'menu_class'      => '', // ul class
                                'menu_id'         => '', // ul id
                                'items_wrap'      => '%3$s',
                                'before'          => '', // before <a>
                                'after'           => '', // after <a>
                                'link_before'     => '', // inside <a>, before text
                                'link_after'      => '', // inside <a>, after text
                                'depth'           => 3, // '0' to display all depths
                                'echo' 			  => true,
                                'fallback_cb'     => 'Holywood_Wp_Bootstrap_Navwalker::fallback',
                                'walker'          => new Holywood_Wp_Bootstrap_Navwalker()
                            ));

							echo '</ul>
	                    </div>
	                </div>';

	                holywood_header_sidebarmenu();

	        echo '</nav>';

        } elseif ( 'navbar-fixed-transparent' == ot_get_option( 'holywood_nav_type' ) ) {

            echo '<nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">';

                echo holywood_header_search();

                echo '<div class="container">';

                    holywood_header_attr();

                    echo '<div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>';

                        holywood_sticky_logo();

                    echo '</div>

                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav '.esc_attr($menu_align).'" data-in="'.esc_attr($animation_in).'" data-out="'.esc_attr($animation_out).'">';

                            //default wp menu
                            wp_nav_menu( array(
                                'menu'            => 'main-menu',
                                'theme_location'  => 'primary',
                                'container'       => '', // menu wrapper element
                                'container_class' => '',
                                'container_id'    => '',  // default: none
                                'menu_class'      => '', // ul class
                                'menu_id'         => '', // ul id
                                'items_wrap'      => '%3$s',
                                'before'          => '', // before <a>
                                'after'           => '', // after <a>
                                'link_before'     => '', // inside <a>, before text
                                'link_after'      => '', // inside <a>, after text
                                'depth'           => 3, // '0' to display all depths
                                'echo' 			  => true,
                                'fallback_cb'     => 'Holywood_Wp_Bootstrap_Navwalker::fallback',
                                'walker'          => new Holywood_Wp_Bootstrap_Navwalker()
                            ));

							echo '</ul>
	                    </div>
	                </div>';

	                holywood_header_sidebarmenu();

	        echo '</nav>';

        } elseif ( 'navbar-fixed-transparent-dark' == ot_get_option( 'holywood_nav_type' ) ) {

            echo '<nav class="navbar navbar-default navbar-fixed navbar-transparent dark navbar-mobile bootsnav">';

                echo holywood_header_search();

                echo '<div class="container">';

                    holywood_header_attr();

                    echo '<div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>';

                            holywood_sticky_logo();

                    echo '</div>


                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav '.esc_attr($menu_align).'" data-in="'.esc_attr($animation_in).'" data-out="'.esc_attr($animation_out).'">';

                            //default wp menu
                            wp_nav_menu( array(
                                'menu'            => 'main-menu',
                                'theme_location'  => 'primary',
                                'container'       => '', // menu wrapper element
                                'container_class' => '',
                                'container_id'    => '',  // default: none
                                'menu_class'      => '', // ul class
                                'menu_id'         => '', // ul id
                                'items_wrap'      => '%3$s',
                                'before'          => '', // before <a>
                                'after'           => '', // after <a>
                                'link_before'     => '', // inside <a>, before text
                                'link_after'      => '', // inside <a>, after text
                                'depth'           => 3, // '0' to display all depths
                                'echo' 			  => true,
                                'fallback_cb'     => 'Holywood_Wp_Bootstrap_Navwalker::fallback',
                                'walker'          => new Holywood_Wp_Bootstrap_Navwalker()
                            ));

							echo '</ul>
	                    </div>
	                </div>';

	                holywood_header_sidebarmenu();

	            echo '</nav>';

        } else {

            echo '<nav class="navbar navbar-default bootsnav">';

                echo holywood_header_search();

                echo '<div class="container">';

                    holywood_header_attr();

                    echo '<div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>';

                            holywood_logo();

                    echo '</div>

                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav '.esc_attr($menu_align).'" data-in="'.esc_attr($animation_in).'" data-out="'.esc_attr($animation_out).'">';

                            //default wp menu
                            wp_nav_menu( array(
                                'menu'            => 'main-menu',
                                'theme_location'  => 'primary',
                                'container'       => '', // menu wrapper element
                                'container_class' => '',
                                'container_id'    => '',  // default: none
                                'menu_class'      => '', // ul class
                                'menu_id'         => '', // ul id
                                'items_wrap'      => '%3$s',
                                'before'          => '', // before <a>
                                'after'           => '', // after <a>
                                'link_before'     => '', // inside <a>, before text
                                'link_after'      => '', // inside <a>, after text
                                'depth'           => 3, // '0' to display all depths
                                'echo' 			  => true,
                                'fallback_cb'     => 'Holywood_Wp_Bootstrap_Navwalker::fallback',
                                'walker'          => new Holywood_Wp_Bootstrap_Navwalker()
                            ));

                        echo '</ul>
                    </div>
                </div>';

                holywood_header_sidebarmenu();

            echo '</nav>';

        }

    }
}


/*************************************************
##  BACKTOP
*************************************************/

if ( ! function_exists( 'holywood_backtop' ) ) {
    function holywood_backtop() {

        if ( 'off' != ot_get_option( 'backtotop_display' ) ) {

            wp_enqueue_script('jquery-scrollUp');
            wp_add_inline_script( 'jquery-scrollUp',
            'jQuery(document).ready(function($){
                $.scrollUp({
            		scrollName: \'scrollUp\',
            		topDistance: \'300\',
            		topSpeed: 300,
            		animation: \'fade\',
            		animationInSpeed: 200,
            		animationOutSpeed: 200,
            		scrollText: \'<i class="fa fa-angle-up"></i>\',
            		activeOverlay: false,
            	});
            });' );

        }
    }
}
