<?php
/**
*
* @package WordPress
* @subpackage holywood
* @since holywood 1.0
*
*/


/*************************************************
## Google Font
*************************************************/

function ninetheme_holywood_fonts_url() {
    $font_url = '';

    if ( 'off' !== _x( 'on', 'Google font: on or off', 'holywood' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Open+Sans|Tangerine:400,100,300,700' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}


/*************************************************
## Styles and Scripts
*************************************************/

function ninetheme_holywood_scripts() {

    $rtl = is_rtl() ? '-rtl' : '';

    if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap'.$rtl.'.min.css', false, '1.0');
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', false, '1.0');
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css', false, '1.0');
    wp_enqueue_style( 'featherlight', get_template_directory_uri() . '/css/featherlight.css', false, '1.0');
    wp_enqueue_style( 'jquery-wordrotator', get_template_directory_uri() . '/css/jquery.wordrotator.css', false, '1.0');
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css', false, '1.0');
    wp_enqueue_style( 'ninetheme_holywood-flexslidercss', get_template_directory_uri() . '/js/flexslider/flexslider.css', false, '1.0');
    wp_enqueue_style( 'ninetheme_holywood-stylemain', get_template_directory_uri() . '/css/style'.$rtl.'.css', false, '1.0');
    wp_enqueue_style( 'ninetheme_holywood-wordpress-style', get_template_directory_uri() . '/css/wordpress'.$rtl.'.css', false, '1.0');
    if(function_exists('WC')) {
        wp_enqueue_style( 'ninetheme_holywood-woocommerce-style', get_template_directory_uri() . '/css/woocommerce.css', false, '1.0');
    }
    wp_enqueue_style( 'ninetheme_holywood-menu-style', get_template_directory_uri() . '/css/menu'.$rtl.'.css', false, '1.0');
    wp_register_style( 'bootsnav', get_template_directory_uri() . '/css/bootsnav'.$rtl.'.css', false, '1.0');
    wp_register_style( 'bootsnav-custom', get_template_directory_uri() . '/css/bootsnav-custom'.$rtl.'.css', false, '1.0');
    wp_enqueue_style( 'ninetheme_holywood-updates-style', get_template_directory_uri() . '/css/updates'.$rtl.'.css', false, '1.0');
    wp_enqueue_style( 'ninetheme_holywood-fonts-load', ninetheme_holywood_fonts_url(), array(), '1.0.0' );
    wp_enqueue_style( 'style', get_stylesheet_uri() );

    wp_enqueue_script( 'ninetheme_holywood-slick-js', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script( 'ninetheme_holywood-featherlight-js', get_template_directory_uri() . '/js/featherlight.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script( 'ninetheme_holywood-wow-js', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script( 'ninetheme_holywood-stellar-js', get_template_directory_uri() . '/js/jquery.stellar.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script( 'ninetheme_holywood-menu-js', get_template_directory_uri() . '/js/menu.js', array('jquery'), '1.0', true);
    wp_register_script( 'jquery-scrollUp', get_template_directory_uri() . '/js/jquery.scrollUp.min.js', array('jquery'), '1.0', true);
    wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0', true);
    wp_register_script( 'bootsnav', get_template_directory_uri() . '/js/bootsnav.js', array('jquery'), '1.0', true);
    wp_register_script('ninetheme_holywood-wordrotator-js', get_template_directory_uri() . '/js/jquery.wordrotator.min.js', array('jquery'), '1.0', true);
    wp_register_script('ninetheme_holywood-headhesive-js', get_template_directory_uri() . '/js/headhesive.min.js', array('jquery'), '1.0', true);
    wp_register_script('ninetheme_holywood-countdown-js', get_template_directory_uri() . '/js/jquery.countdown.js', array('jquery'), '1.0', true);
    wp_enqueue_script( 'ninetheme_holywood-flexsliderjs', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'), '1.0', true);
    wp_enqueue_script( 'ninetheme_holywood-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), '1.0', true);
    wp_enqueue_script( 'ninetheme_holywood-blogscripts', get_template_directory_uri() . '/js/blog-script.js', array('jquery'), '1.0', true);
    wp_enqueue_script( 'ninetheme_holywood-scripts-js', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0', true);

    global $is_IE;
    if ( $is_IE ) {
        wp_enqueue_script( 'holywood-respond', get_template_directory_uri()  . '/js/respond.min.js', array('jquery'), '1.4.2', true );
        wp_enqueue_script( 'holywood-html5shiv', get_template_directory_uri()  . '/js/html5shiv.min.js', array('jquery'), '3.7.2', true );
    }

}

add_action( 'wp_enqueue_scripts', 'ninetheme_holywood_scripts' );


/*************************************************
## Admin style and scripts
*************************************************/

function ninetheme_holywood_admin_styles() {

    // Update CSS within in Admin
    wp_enqueue_style('ninetheme_holywood_custom_admin', get_template_directory_uri().'/css/admin.css');

}
add_action('admin_enqueue_scripts', 'ninetheme_holywood_admin_styles');


/*************************************************
## Theme option & Metaboxes & shortcodes
*************************************************/


// Metabox plugin check
if ( ! function_exists( 'rwmb_meta' ) ) {
    function rwmb_meta( $key, $args = '', $post_id = null ) {
        return false;
    }
}

require_once get_template_directory() . '/includes/custom-metaboxes/page-metaboxes.php';

if(function_exists('vc_set_as_theme')) {
    require_once get_template_directory() . '/includes/visualcomposer/ninetheme_shortcodes.php';
    require_once get_template_directory() . '/includes/vc-saved-templates.php';
}

require_once get_template_directory() . '/includes/breadcrumb.php';
require_once get_template_directory() . '/includes/custom-style.php';
require_once get_template_directory() . '/includes/bootsnav.php';
require_once get_template_directory() . '/includes/template-tags.php';



// Option tree controllers
if ( ! class_exists( 'OT_Loader' )){

    function ot_get_option() {
        return false;
    }

}

// add filter for  options panel loader
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );

// Theme options admin panel setings file
include_once get_template_directory() . '/includes/theme-options.php';


/*************************************************
## Theme Setup
*************************************************/

if ( ! isset( $content_width ) ) $content_width = 960;

function ninetheme_holywood_theme_setup() {


    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-background' );
    add_theme_support( 'post-formats', array('gallery', 'video', 'audio',  'quote', 'aside'));

    add_image_size( 'ninetheme_holywood_member_thumb', 650, 650, true);

    // WooCommerce
    if ( class_exists( 'woocommerce' ) ) {
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }

    // Make theme available for translation
    // Translations can be filed in the /languages/ directory
    load_theme_textdomain( 'holywood', get_template_directory() . '/languages' );

    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'holywood' ),
    ) );

}
add_action( 'after_setup_theme', 'ninetheme_holywood_theme_setup' );

/*************************************************
## OPTION TREE WEBFONTS API
*************************************************/

add_filter( 'ot_google_fonts_api_key', 'ninetheme_change_ot_google_fonts_api_key' );

function ninetheme_change_ot_google_fonts_api_key( $key ) {
    $api = ot_get_option( 'ot_font_api' );
    return "$api";
}

/*************************************************
## ADMIN NOTICES
*************************************************/


global $pagenow;
if( $pagenow == 'themes.php' )  {

    // display custom admin notice
    function ntframework_tools_admin_notice() {

        if( 'holywood' == get_option( 'template' ) ) { ?>
            <div class="notice notice-warning is-dismissible">
                <p><?php _e('If you need help about demodata installation, please read docs and open a ticket on <a target="_blank" href="https://9theme.ticksy.com/tickets/">Ninetheme Support Center</a>', 'holywood'); ?></p>
            </div>
            <?php
        }

    }
    add_action('admin_notices', 'ntframework_tools_admin_notice');

}


/*************************************************
## Widget columns
*************************************************/

function ninetheme_holywood_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'Blog Sidebar', 'holywood' ),
        'id' => 'sidebar-1',
        'description'   => esc_html__( 'These are widgets for the Blog page.','holywood' ),
        'before_widget' => '<div class="widget  %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widget-title"><span>',
        'after_title'   => '</span></h5>'
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Widgetize footer', 'holywood' ),
        'id' => 'widgetizefooter',
        'description'   => esc_html__( 'These are widgets for the Shop single Sidebar.','holywood' ),
        'before_widget' => '<div class="col-sm-3"><div class="widget  %2$s">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h5 class="uppercase">',
        'after_title'   => '</h5>'
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Shop single Sidebar', 'holywood' ),
        'id' => 'shop-sidebar',
        'description'   => esc_html__( 'These are widgets for the Shop single Sidebar.','holywood' ),
        'before_widget' => '<div class="widget  %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>'
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Woo  shop page Sidebar', 'holywood' ),
        'id' => 'shop-page-sidebar',
        'description'   => esc_html__( 'These are widgets for the shop page Sidebar.','holywood' ),
        'before_widget' => '<div class="widget  %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>'
    ) );

    if( 'off' != ot_get_option( 'holywood_header_sidebarmenu_display' ) ) {
        register_sidebar( array(
            'name' => esc_html__( 'Header Sidebar Menu', 'holywood' ),
            'id' => 'sidebar-menu',
            'description'   => esc_html__( 'These are widgets for the header sidebar menu.','holywood' ),
            'before_widget' => '<div class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        ) );
    }
}
add_action( 'widgets_init', 'ninetheme_holywood_widgets_init' );

/*************************************************
## Include the TGM_Plugin_Activation class.
*************************************************/

require_once get_template_directory() . '/includes/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'ninetheme_holywood_register_required_plugins' );

function ninetheme_holywood_register_required_plugins() {

    $plugins = array(
        array(
            'name'          => esc_html__('Meta Box', "holywood"),
            'slug'           => 'meta-box',
            'required'       => true,
        ),
        array(
            'name'           => esc_html__('Woocommerce', "holywood"),
            'slug'           => 'woocommerce',
            'required'       => false,
        ),
        array(
            'name'          => esc_html__('Contact Form 7', "holywood"),
            'slug'          => 'contact-form-7',
        ),
        array(
            'name'          => esc_html__('Theme Options Panel', "holywood"),
            'slug'          => 'option-tree',
            'required'      => true,
        ),
        array(
            'name'         => esc_html__('Envato Auto Update Theme', "holywood"),
            'slug'         => 'envato-market',
            'source'       => 'https://ninetheme.com/documentation/plugins/envato-market.zip',
            'required'     => false,
            'version'      => '2.0.3',
        ),
        array(
            'name'         => esc_html__('Page Builder', "holywood"),
            'slug'         => 'js_composer',
            'source'       => 'https://ninetheme.com/documentation/plugins/js_composer.zip',
            'required'     => true,
        ),
        array(
            'name'         => esc_html__('Revolution Slider', "holywood"),
            'slug'         => 'revolution_slider',
            'source'       => 'https://ninetheme.com/documentation/plugins/revolution_slider.zip',
            'required'     => false,
        ),
        array(
            'name'          => esc_html__('Price Table Manager', "holywood"),
            'slug'          => 'price-post-type',
            'source'        => 'https://ninetheme.com/documentation/plugins/price-post-type.zip',
            'required'      => true,
        ),
        array(
            'name'          => esc_html__('WP Holywood Shortcodes', 'holywood'),
            'slug'          => 'holywood-shortcodes',
            'source'        => get_template_directory() . '/plugins/holywood-shortcodes.zip',
            'required'      => true,
            'version'       => '1.2'
        ),
    );

    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug' => apply_filters( 'ninetheme_parent_slug', 'themes.php' ),           // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                    // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );
    tgmpa( $plugins, $config );
}


/*************************************************
## Register Menu
*************************************************/

class ninetheme_holywood_wp_bootstrap_navwalker extends Walker_Nav_Menu {

    /**
    * @see Walker::start_lvl()
    * @since 3.0.0
    */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul role=\"menu\" class=\"sub-menu\">\n";
    }

    /**
    * @see Walker::start_el()
    * @since 3.0.0
    */
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        /**
        * Dividers, Headers or Disabled
        */
        if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="presentation" class="divider item-has-children">';
        } else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="presentation" class="divider item-has-children">';
        } else if ( strcasecmp( $item->attr_title, 'dropdown-header item-has-children') == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="presentation" class="dropdown-header item-has-children">' . esc_attr( $item->title );
        } else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
            $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
        } else {

            $class_names = $value = '';

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;

            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

            if ( $args->has_children )
            $class_names .= 'sub item-has-children';

            if ( in_array( 'current-menu-item', $classes ) )
            $class_names .= ' active';

            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

            $output .= $indent . '<li' . $id . $value . $class_names .'>';

            $atts = array();
            $atts['title']  = ! empty( $item->title )	? $item->title	: '';
            $atts['target'] = ! empty( $item->target )	? $item->target	: '';
            $atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';

            // If item has_children add atts to a.
            if ( $args->has_children && $depth === 0 ) {
                $atts['href']   		= '#';
                $atts['data-toggle']	= 'dropdown';
                $atts['class']			= 'dropdown-toggle';
            } else {
                $atts['href'] = ! empty( $item->url ) ? $item->url : '';
            }

            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $item_output = $args->before;

            /*
            * Glyphicons
            **/
            if ( ! empty( $item->attr_title ) )
            $item_output .= '<a'. $attributes .'><span class=" ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
            else
            $item_output .= '<a'. $attributes .'>';

            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }

    /**
    * Traverse elements to create list from elements.
    **/
    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
        return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
        $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

    /**
    * Menu Fallback
    **/
    public static function fallback( $args ) {
        if ( current_user_can( 'manage_options' ) ) {

            extract( $args );

            $fb_output = null;

            if ( $container ) {
                $fb_output = '<' . $container;

                if ( $container_id )
                $fb_output .= ' id="' . $container_id . '"';

                if ( $container_class )
                $fb_output .= ' class="' . $container_class . '"';

                $fb_output .= '>';
            }

            $fb_output .= '<ul';

            if ( $menu_id )
            $fb_output .= ' id="' . $menu_id . '"';

            if ( $menu_class )
            $fb_output .= ' class="' . $menu_class . '"';

            $fb_output .= '>';
            $fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
            $fb_output .= '</ul>';

            if ( $container )
            $fb_output .= '</' . $container . '>';

            echo holywood_sanitize_data($fb_output);
        }
    }
}

/*************************************************
## holywood Comment
*************************************************/

if ( ! function_exists( 'ninetheme_holywood_comment' ) ) {
    function ninetheme_holywood_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
            case 'pingback' :
            case 'trackback' :
            ?>
            <div class="container">
                <div class="comments">
                    <article class="post pingback">
                        <p><?php esc_html_e( 'Pingback:', 'holywood' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( '(Edit)', 'holywood' ), ' ' ); ?></p>
                        <?php
                        break;
                        default :
                        ?>
                        <div class="comments">
                            <ul>
                                <li class="comment">
                                    <span class="who">
                                        <?php echo get_avatar( $comment, 80 ); ?>
                                    </span>
                                    <div class="who-comment">
                                        <p class="name"><?php comment_author(); ?></p>
                                        <?php comment_text(); ?>
                                        <?php edit_comment_link( esc_html__( 'Edit', 'holywood' ), ' ' ); ?>

                                        <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                                        <span class="meta-data"><time class="comment-date" pubdate datetime="<?php comment_time( 'c' ); ?>"><?php comment_date(); ?> <?php esc_html_e( 'at', 'holywood' ); ?> <?php comment_time(); ?></time></span>

                                        <?php if ( $comment->comment_approved == '0' ) : ?>
                                            <em><?php esc_html_e( 'Your comment is awaiting moderation.', 'holywood' ); ?></em>
                                        <?php endif; ?>

                                    </div>
                                </li>
                            </ul>
                        </div>
                        <?php
                        break;
        endswitch;
    }
}


/*************************************************
## SANITIZE MODIFIED VC-ELEMENTS OUTPUT
*************************************************/


if (!function_exists('holywood_sanitize_data')) {
    function holywood_sanitize_data($html_data)
    {
        return $html_data;
    }
}



/**********************************
## THEME ALLOWED HTML TAG
/**********************************/


if (! function_exists('holywood_allowed_html')) {
    function holywood_allowed_html()
    {
        $allowed_tags = array(
            'a' => array(
                'class' => array(),
                'href' => array(),
                'rel' => array(),
                'title' => array(),
                'target' => array(),
            ),
            'abbr' => array(
                'title' => array(),
            ),
            'iframe' => array(
                'src' => array(),
            ),
            'b' => array(),
            'br' => array(),
            'blockquote' => array(
                'cite' => array(),
            ),
            'cite' => array(
                'title' => array(),
            ),
            'code' => array(),
            'del' => array(
                'datetime' => array(),
                'title' => array(),
            ),
            'dd' => array(),
            'div' => array(
                'class' => array(),
                'title' => array(),
                'style' => array(),
            ),
            'dl' => array(),
            'dt' => array(),
            'em' => array(),
            'h1' => array(),
            'h2' => array(),
            'h3' => array(),
            'h4' => array(),
            'h5' => array(),
            'h6' => array(),
            'i' => array(
                'class' => array(),
            ),
            'img' => array(
                'alt' => array(),
                'class' => array(),
                'height' => array(),
                'src' => array(),
                'width' => array(),
            ),
            'li' => array(
                'class' => array(),
            ),
            'ol' => array(
                'class' => array(),
            ),
            'p' => array(
                'class' => array(),
            ),
            'q' => array(
                'cite' => array(),
                'title' => array(),
            ),
            'span' => array(
                'class' => array(),
                'title' => array(),
                'style' => array(),
            ),
            'strike' => array(),
            'strong' => array(),
            'ul' => array(
                'class' => array(),
            ),
        );

        return $allowed_tags;
    }
}



/*************************************************
## THEME SETUP WIZARD
https://github.com/richtabor/MerlinWP
*************************************************/

require_once get_parent_theme_file_path( '/includes/merlin/admin-menu.php' );
require_once get_parent_theme_file_path( '/includes/merlin/class-merlin.php' );
require_once get_parent_theme_file_path( '/includes/demo-wizard-config.php' );

function holywood_merlin_local_import_files() {
    return array(
        array(

            'import_file_name' => 'Demo Import',
            // xml data
            'local_import_file'             => get_parent_theme_file_path( 'includes/merlin/demodata/data.xml' ),
            // widget data
            'local_import_widget_file'      => get_parent_theme_file_path( 'includes/merlin/demodata/widgets.wie' ),
            // option tree -> theme options
            'local_import_option_tree_file' => get_parent_theme_file_path( 'includes/merlin/demodata/optiontree.txt' ),

        )
    );
}
add_filter( 'merlin_import_files', 'holywood_merlin_local_import_files' );


/**
* Execute custom code after the whole import has finished.
*/
function holywood_merlin_after_import_setup() {
    // Assign menus to their locations.
    $primary = get_term_by( 'name', 'primary', 'nav_menu' );

    set_theme_mod(
        'nav_menu_locations', array(
            'primary' => $primary->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'merlin_after_all_import', 'holywood_merlin_after_import_setup' );


add_action('init', 'do_output_buffer'); function do_output_buffer() { ob_start(); }

add_filter( 'woocommerce_prevent_automatic_wizard_redirect', '__return_true' );

add_action('admin_notices', 'holywood_notice_for_activation');
if (!function_exists('holywood_notice_for_activation')) {
    function holywood_notice_for_activation() {
        global $pagenow;

        if ( !get_option('envato_purchase_code_13563689') ) {

            echo '<div class="notice notice-warning">
            <p>' . sprintf(
                esc_html__( 'Enter your Envato Purchase Code to receive agro Theme and plugin updates  %s', 'holywood' ),
                '<a href="' . admin_url('admin.php?page=merlin&step=license') . '">' . esc_html__( 'Enter Purchase Code', 'holywood' ) . '</a>') . '</p>
            </div>';
        }
    }
}


if ( !get_option('envato_purchase_code_13563689') ) {
    add_filter('auto_update_theme', '__return_false');
}

add_action('upgrader_process_complete', 'holywood_upgrade_function', 10, 2);
if ( !function_exists('holywood_upgrade_function') ) {
    function holywood_upgrade_function($upgrader_object, $options) {
        $purchase_code = get_option('envato_purchase_code_13563689');

        if (($options['action'] == 'update' && $options['type'] == 'theme') && !$purchase_code) {
            wp_redirect(admin_url('admin.php?page=merlin&step=license'));
        }
    }
}

if ( !function_exists( 'holywood_is_theme_registered') ) {
    function holywood_is_theme_registered() {
        $purchase_code = get_option('envato_purchase_code_13563689');
        $registered_by_purchase_code = !empty($purchase_code);

        // Purchase code entered correctly.
        if ($registered_by_purchase_code) {
            return true;
        }
    }
}

function holywood_deactivate_envato_plugin() {
    if (  function_exists( 'envato_market' ) && !get_option('envato_purchase_code_13563689') ) {
        deactivate_plugins('envato-market/envato-market.php');
    }
}
add_action( 'admin_init', 'holywood_deactivate_envato_plugin' );
