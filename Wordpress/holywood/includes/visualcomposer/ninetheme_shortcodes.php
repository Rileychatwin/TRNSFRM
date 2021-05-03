<?php


/*-----------------------------------------------------------------------------------*/
/*	Shortcode Filter
/*-----------------------------------------------------------------------------------*/

vc_set_as_theme( $disable_updater = false );
vc_is_updater_disabled();

function agen_vc_remove_woocommerce() {
    if ( class_exists( 'woocommerce' ) ) {
        vc_remove_element( 'woocommerce_cart' );
        vc_remove_element( 'woocommerce_checkout' );
        vc_remove_element( 'woocommerce_order_tracking' );
        vc_remove_element( 'woocommerce_my_account' );
        vc_remove_element( 'recent_products' );
        vc_remove_element( 'featured_products' );
        vc_remove_element( 'product' );
        vc_remove_element( 'products' );
        vc_remove_element( 'add_to_cart' );
        vc_remove_element( 'add_to_cart_url' );
        vc_remove_element( 'product_page' );
        vc_remove_element( 'product_category' );
        vc_remove_element( 'product_categories' );
        vc_remove_element( 'sale_products' );
        vc_remove_element( 'best_selling_products' );
        vc_remove_element( 'top_rated_products' );
        vc_remove_element( 'product_attribute' );
        vc_remove_element( 'related_products' );
    }
}
// Hook for admin editor.
add_action( 'vc_build_admin_page', 'agen_vc_remove_woocommerce', 11 );
// Hook for frontend editor.
add_action( 'vc_load_shortcode', 'agen_vc_remove_woocommerce', 11 );

vc_remove_element(  "vc_wp_search");
vc_remove_element(  "vc_wp_meta" );
vc_remove_element(  "vc_wp_recentcomments" );
vc_remove_element(  "vc_wp_calendar" );
vc_remove_element(  "vc_wp_pages" );
vc_remove_element(  "vc_wp_tagcloud" );
vc_remove_element(  "vc_wp_custommenu" );
vc_remove_element(  "vc_wp_text" );
vc_remove_element(  "vc_wp_posts" );
vc_remove_element(  "vc_wp_categories" );
vc_remove_element(  "vc_wp_archives" );
vc_remove_element(  "vc_wp_rss" );
vc_remove_element(  "vc_flickr" );
vc_remove_element(  "vc_facebook" );
vc_remove_element(  "vc_tweetmeme" );
vc_remove_element(  "vc_googleplus" );
vc_remove_element(  "vc_pinterest" );



// Filter to replace default css class names for vc_row shortcode and vc_column
add_filter( 'vc_shortcodes_css_class', 'custom_css_classes_for_vc_row_and_vc_column', 10, 2 );
function custom_css_classes_for_vc_row_and_vc_column( $class_string, $tag ) {
  if (  $tag == 'vc_row_inner' ) {
    $class_string = str_replace( 'vc_row-fluid', 'container bootstrap', $class_string ); // This will replace "vc_row-fluid" with "my_row-fluid"
  }

  return $class_string; // Important: you should always return modified or original $class_string
}


/*-----------------------------------------------------------------------------------*/
/*	header
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'theme_vc_header_integrateWithVC' );
function theme_vc_header_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "1. Header", "holywood" ),
      "base" => "vc_header",
	  "icon" => "icon-wpb-row",
	  "category" => esc_html__( "Holywood", "holywood"),
	  "description" => esc_html__("Frontpage header hero section", "holywood"),
	  'weight' => -1,
      "params" => array(

		array(
            "type" => "textfield",
            "heading" => esc_html__("Heading", "holywood"),
            "param_name" => "heading",
            "description" => esc_html__("Add your header heading", "holywood"),
        ),

		array(
            "type" => "textarea",
            "heading" => esc_html__("description", "holywood"),
            "param_name" => "description",
            "description" => esc_html__("Add your description", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("button left url", "holywood"),
            "param_name" => "button_left_url",
            "description" => esc_html__("Add your button left url", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("button left text", "holywood"),
            "param_name" => "button_left_text",
            "description" => esc_html__("Add your button left text", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("button right url", "holywood"),
            "param_name" => "button_right_url",
            "description" => esc_html__("Add your button right url", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("button right text", "holywood"),
            "param_name" => "button_right_text",
            "description" => esc_html__("Add your button right text", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("scroll down link", "holywood"),
            "param_name" => "scroll_down_link",
            "description" => esc_html__("Add your scroll down link for down arrow button. Example : #services", "holywood"),
        ),


		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'overlay', 'holywood' ),
			'param_name' => 'overlay',
			'value' => array(
				esc_html__( 'select layout type', 'holywood' ) => 'centered',
				esc_html__( 'show', 'holywood' ) => 'show',
				esc_html__( 'hide', 'holywood' ) => 'hide'
			),
			'description' => esc_html__( 'Select type', 'holywood' ),
		),

		 array(
            "type" => "attach_image",
            "heading" => esc_html__("Logo 1x", "holywood"),
            "param_name" => "logo_1x",
            "description" => esc_html__("Add logo image", "holywood"),
        ),

		 array(
            "type" => "attach_image",
            "heading" => esc_html__("Logo 2x", "holywood"),
            "param_name" => "logo_2x",
            "description" => esc_html__("Add logo image", "holywood"),
        ),

		 array(
            "type" => "textfield",
            "heading" => esc_html__("Logo url", "holywood"),
            "param_name" => "logo_url",
            "description" => esc_html__("Add logo url", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("Right section slogan", "holywood"),
            "param_name" => "subscribe_heading",
            "description" => esc_html__("You can add before a slogan button", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("target url", "holywood"),
            "param_name" => "target_url",
            "description" => esc_html__("You can add a button url for find a section in the this page", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("subscribe & any button text", "holywood"),
            "param_name" => "subscribe_button_text",
            "description" => esc_html__("You can add a button text", "holywood"),
        ),

      ),
   ) );
}
class WPBakeryShortCode_theme_vc_header extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Product
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_product_integrateWithVC' );
function vc_product_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "2. Product", "holywood" ),
      "base" => "vc_product",
	  "icon" => "icon-wpb-row",
	  "category" => esc_html__( "Holywood", "holywood"),
	   'weight' => -2 ,
	  "description" => esc_html__("Left / right product showcase section", "holywood"),
      "params" => array(

		array(
            "type" => "textfield",
            "heading" => esc_html__("section id", "holywood"),
            "param_name" => "section_id",
            "description" => esc_html__("Add your section id for your custom colors or leave blank", "holywood"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Heading", "holywood"),
            "param_name" => "heading",
            "description" => esc_html__("Add your header heading", "holywood"),
        ),

		array(
            "type" => "textarea_html",
            "heading" => esc_html__("You can add any content. Default content is text blocks", "holywood"),
            "param_name" => "content",
            "description" => esc_html__("Column content area", "holywood"),
        ),

			array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'image position', 'holywood' ),
			'param_name' => 'image_position',
			'value' => array(
				esc_html__( 'select layout type', 'holywood' ) => 'centered',
				esc_html__( 'left', 'holywood' ) => 'left',
				esc_html__( 'right', 'holywood' ) => 'right'
			),
			'description' => esc_html__( 'Select type', 'holywood' ),
		),

		 array(
            "type" => "attach_image",
            "heading" => esc_html__("image", "holywood"),
            "param_name" => "image",
            "description" => esc_html__("Add image", "holywood"),
        ),

		array(
			'type' => 'param_group',
			'heading' => esc_html__( 'Column list items', 'holywood' ),
			'param_name' => 'values',
			'value' => urlencode( json_encode( array(
				array(
					'list_item' => esc_html__( 'Planing', 'holywood' )
				),
				array(
					'icon_item' => esc_html__( 'Planing', 'holywood' )
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Price List', 'holywood' ),
					'param_name' => 'list_item',
					'description' => esc_html__( 'Enter title for list item.', 'holywood' ),
					'admin_label' => true
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Icon name', 'holywood' ),
					'param_name' => 'icon_item',
					'description' => esc_html__( 'Enter icon name for list item.', 'holywood' ),
					'admin_label' => true
				),
			)

		),

		array(
            "type" => "textfield",
            "heading" => esc_html__("button left url", "holywood"),
            "param_name" => "button_left_url",
            "description" => esc_html__("Add your button left url", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("button left text", "holywood"),
            "param_name" => "button_left_text",
            "description" => esc_html__("Add your button left text", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("button right url", "holywood"),
            "param_name" => "button_right_url",
            "description" => esc_html__("Add your button right url", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("button right text", "holywood"),
            "param_name" => "button_right_text",
            "description" => esc_html__("Add your button right text", "holywood"),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("section background color", "holywood"),
            "param_name" => "section_bg_color",
            "description" => esc_html__("select color", "holywood"),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("Right button text color", "holywood"),
            "param_name" => "right_color",
            "description" => esc_html__("select color", "holywood"),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("Right button border color", "holywood"),
            "param_name" => "border_right_color",
            "description" => esc_html__("select color", "holywood"),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("Right button background color", "holywood"),
            "param_name" => "bg_right_color",
            "description" => esc_html__("select color", "holywood"),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("Left button text color", "holywood"),
            "param_name" => "button_color",
            "description" => esc_html__("select color", "holywood"),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("Left button border color", "holywood"),
            "param_name" => "border_color",
            "description" => esc_html__("select color", "holywood"),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("Left button background color", "holywood"),
            "param_name" => "bg_color",
            "description" => esc_html__("select color", "holywood"),
        ),


      ),
   ) );
}
class WPBakeryShortCode_vc_product extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	parallax
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_parallax_integrateWithVC' );
function vc_parallax_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "3. Parallax", "holywood" ),
      "base" => "vc_parallax",
	   'weight' => -3,
	  "icon" => "icon-wpb-row",
	  "category" => esc_html__( "Holywood", "holywood"),
	  "description" => esc_html__("Frontpage parallax section", "holywood"),
      "params" => array(

		array(
            "type" => "textfield",
            "heading" => esc_html__("section id", "holywood"),
            "param_name" => "section_id",
            "description" => esc_html__("Add your section id for your custom colors or leave blank", "holywood"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Heading", "holywood"),
            "param_name" => "heading",
            "description" => esc_html__("Add your  heading", "holywood"),
        ),
		array(
            "type" => "textarea",
            "heading" => esc_html__("description", "holywood"),
            "param_name" => "description",
            "description" => esc_html__("Add your  description", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("button left url", "holywood"),
            "param_name" => "button_left_url",
            "description" => esc_html__("Add your button left url", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("button left text", "holywood"),
            "param_name" => "button_left_text",
            "description" => esc_html__("Add your button left text", "holywood"),
        ),
      ),
   ) );
}
class WPBakeryShortCode_vc_parallax extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	parallax two
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_parallax_two_integrateWithVC' );
function vc_parallax_two_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "5. Parallax", "holywood" ),
      "base" => "vc_parallax_two",
	   'weight' => -4,
	  "icon" => "icon-wpb-row",
	  "category" => esc_html__( "Holywood", "holywood"),
	  "description" => esc_html__("Frontpage parallax two section", "holywood"),
      "params" => array(

		array(
            "type" => "textfield",
            "heading" => esc_html__("section id", "holywood"),
            "param_name" => "section_id",
            "description" => esc_html__("Add your section id for your custom colors or leave blank", "holywood"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Heading", "holywood"),
            "param_name" => "heading",
            "description" => esc_html__("Add your  heading", "holywood"),
        ),
		array(
            "type" => "textarea_html",
            "heading" => esc_html__("Text area", "holywood"),
            "param_name" => "content",
            "description" => esc_html__("Add your content", "holywood"),
        ),


		array(
            "type" => "textfield",
            "heading" => esc_html__("button left url", "holywood"),
            "param_name" => "button_left_url",
            "description" => esc_html__("Add your button left url", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("button left text", "holywood"),
            "param_name" => "button_left_text",
            "description" => esc_html__("Add your button left text", "holywood"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("button right url", "holywood"),
            "param_name" => "button_right_url",
            "description" => esc_html__("Add your button right url", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("button right text", "holywood"),
            "param_name" => "button_right_text",
            "description" => esc_html__("Add your button right text", "holywood"),
        ),
      ),
   ) );
}
class WPBakeryShortCode_vc_parallax_two extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	subscribe
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_subscribe_integrateWithVC' );
function vc_subscribe_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "6. Subscribe", "holywood" ),
      "base" => "vc_subscribe",
	   'weight' => -5 ,
	  "icon" => "icon-wpb-row",
	  "category" => esc_html__( "Holywood", "holywood"),
	  "description" => esc_html__("Frontpage subscribe section", "holywood"),
      "params" => array(

		array(
            "type" => "textfield",
            "heading" => esc_html__("section id", "holywood"),
            "param_name" => "section_id",
            "description" => esc_html__("Add your section id for your custom colors or leave blank", "holywood"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Heading", "holywood"),
            "param_name" => "heading",
            "description" => esc_html__("Add your  heading", "holywood"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("description", "holywood"),
            "param_name" => "description",
            "description" => esc_html__("Add your  description", "holywood"),
        ),
		array(
            "type" => "textarea_html",
            "heading" => esc_html__("Text area", "holywood"),
            "param_name" => "content",
            "description" => esc_html__("Add your content", "holywood"),
        ),

      ),
   ) );
}
class WPBakeryShortCode_vc_subscribe extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	parallax two
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_promo_integrateWithVC' );
function vc_promo_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "7. Promo", "holywood" ),
      "base" => "vc_promo",
	   'weight' => -6,
	  "icon" => "icon-wpb-row",
	  "category" => esc_html__( "Holywood", "holywood"),
	  "description" => esc_html__("Frontpage promo section", "holywood"),
      "params" => array(

		array(
            "type" => "textfield",
            "heading" => esc_html__("section id", "holywood"),
            "param_name" => "section_id",
            "description" => esc_html__("Add your section id for your custom colors or leave blank", "holywood"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("first text", "holywood"),
            "param_name" => "first_text",
            "description" => esc_html__("Add your  first text", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("second text", "holywood"),
            "param_name" => "second_text",
            "description" => esc_html__("Add your  second text", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("third text", "holywood"),
            "param_name" => "third_text",
            "description" => esc_html__("Add your  third text", "holywood"),
        ),


		array(
            "type" => "textfield",
            "heading" => esc_html__("button left url", "holywood"),
            "param_name" => "button_left_url",
            "description" => esc_html__("Add your button left url", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("button left text", "holywood"),
            "param_name" => "button_left_text",
            "description" => esc_html__("Add your button left text", "holywood"),
        ),

      ),
   ) );
}
class WPBakeryShortCode_vc_promo extends WPBakeryShortCode {
}


/*-----------------------------------------------------------------------------------*/
/*	services 2
/*-----------------------------------------------------------------------------------*/

	vc_map( array(
		"name" => esc_html__("4. Icon Boxes", "holywood"),
		"base" => "vc_icon_module",
		 'weight' => -7,
		"icon" => "icon-wpb-row",
		"as_parent" => array('only' => 'vc_icon_module_item'),
		"content_element" => true,
		"show_settings_on_create" => true,
		"category" => esc_html__( "Holywood", "holywood"),
		 "description" => esc_html__("Frontpage Icon Boxes section", "holywood"),
		"params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Section id", "holywood"),
            "param_name" => "section_id",
            "description" => esc_html__("Add Your Section id for scroll. If you use with multiple page for onepage write number like one, two , three", "holywood"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Section heading", "holywood"),
            "param_name" => "heading",
            "description" => esc_html__("Add Your Section heading", "holywood"),
        ),
		array(
            "type" => "textarea",
            "heading" => esc_html__("Section slogan", "holywood"),
            "param_name" => "slogan",
            "description" => esc_html__("Add Your Section description/slogan", "holywood"),
        ),
    ),
    "js_view" => 'VcColumnView'
) );

vc_map( array(
    "name" => esc_html__("Icon Boxes Item", "holywood"),
    "base" => "vc_icon_module_item",
    "content_element" => true,
    "as_child" => array('only' => 'vc_icon_module'),
    "params" => array(

		array(
            "type" => "textfield",
            "heading" => esc_html__("Box item id", "holywood"),
            "param_name" => "column_id",
            "description" => esc_html__("Add different id for each boxes to obtain different colors ", "holywood"),
        ),

        array(
			'type' => 'checkbox',
			'param_name' => 'add_icon',
			'heading' => esc_html__( 'Add icon?', 'holywood' ),
			'description' => esc_html__( 'Add icon next to section title.', 'holywood' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'holywood' ),
			'param_name' => 'icon_fontawesome',
			'value' => 'fa fa-dribbble',
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'add_icon',
				'value' => 'true',
			),
			'description' => esc_html__( 'Select icon from library.', 'holywood' ),
		),

        array(
            "type" => "textfield",
            "heading" => esc_html__("heading", "holywood"),
            "param_name" => "heading",
            "description" => esc_html__("Add heading", "holywood"),
        ),

        array(
            "type" => "textarea",
            "heading" => esc_html__("Description Area", "holywood"),
            "param_name" => "description",
            "description" => esc_html__("Add Your description", "holywood"),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("Box background color", "holywood"),
            "param_name" => "bg_color",
            "description" => esc_html__("select box background color", "holywood"),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("Box icon color", "holywood"),
            "param_name" => "icon_color",
            "description" => esc_html__("select box icon color", "holywood"),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("Box heading color", "holywood"),
            "param_name" => "heading_color",
            "description" => esc_html__("select box heading color", "holywood"),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("Box description text color", "holywood"),
            "param_name" => "description_color",
            "description" => esc_html__("select box description text color", "holywood"),
        ),
    )
) );


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_vc_icon_module extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_vc_icon_module_item extends WPBakeryShortCode {
    }
}


/*-----------------------------------------------------------------------------------*/
/*	photos
/*-----------------------------------------------------------------------------------*/

	vc_map( array(
		"name" => esc_html__("8. Photos", "holywood"),
		"base" => "vc_photos",
		'weight' => -8,
		"icon" => "icon-wpb-row",
		"as_parent" => array('only' => 'vc_photos_item'),
		"content_element" => true,
		"show_settings_on_create" => true,
		"category" => esc_html__( "Holywood", "holywood"),
		"description" => esc_html__("Frontpage Photos section", "holywood"),
		"params" => array(

		array(
            "type" => "textfield",
            "heading" => esc_html__("Section id", "holywood"),
            "param_name" => "section_id",
            "description" => esc_html__("Add Your Section id for scroll. If you use with multiple page for onepage write number like one, two , three", "holywood"),
        ),
    ),
    "js_view" => 'VcColumnView'
) );

vc_map( array(
    "name" => esc_html__("Photos Item", "holywood"),
    "base" => "vc_photos_item",
    "content_element" => true,
    "as_child" => array('only' => 'vc_photos'),
    "params" => array(


        array(
            "type" => "textfield",
            "heading" => esc_html__("heading", "holywood"),
            "param_name" => "heading",
            "description" => esc_html__("Add heading", "holywood"),
        ),

        array(
            "type" => "textarea",
            "heading" => esc_html__("Description Area", "holywood"),
            "param_name" => "content",
            "description" => esc_html__("Add Your description / content", "holywood"),
        ),


		 array(
            "type" => "attach_image",
            "heading" => esc_html__("image", "holywood"),
            "param_name" => "image",
            "description" => esc_html__("Add logo image", "holywood"),
        ),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'image position', 'holywood' ),
			'param_name' => 'image_position',
			'value' => array(
				esc_html__( 'select layout type', 'holywood' ) => 'centered',
				esc_html__( 'right', 'holywood' ) => 'right',
				esc_html__( 'left', 'holywood' ) => 'left'
			),
			'description' => esc_html__( 'Select image position', 'holywood' ),
		),

    )
) );


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_vc_photos extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_vc_photos_item extends WPBakeryShortCode {
    }
}

/*-----------------------------------------------------------------------------------*/
/*	blog
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_price_table_integrateWithVC' );
function vc_price_table_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "9. Price Table", "holywood" ),
      "base" => "vc_price_table",
	  	 'weight' => -9,
	  "icon" => "icon-wpb-row",
	  "category" => esc_html__( "Holywood", "holywood"),
	  "description" => esc_html__("Frontpage price table section", "holywood"),

      "params" => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Title', 'holywood' ),
            'param_name' => 'heading',
            "description" => esc_html__("Add Your Title", "holywood"),
        ),
		array(
            'type' => 'textfield',
            'heading' => esc_html__( 'slogan', 'holywood' ),
            'param_name' => 'slogan',
            "description" => esc_html__("Add Your slogan", "holywood"),
        ),
		 array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Section ID', 'holywood' ),
            'param_name' => 'section_id',
            "description" => esc_html__("Add Your Section ID", "holywood"),
        ),


        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Post Count', 'holywood' ),
            'param_name' => 'post_number',
            "description" => esc_html__("You can control with number your price tables.", "holywood"),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Category', 'holywood' ),
            'param_name' => 'categories',
            "description" => esc_html__("Enter Price table category or write all", "holywood"),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'order', 'holywood' ),
            'param_name' => 'order',
            "description" => esc_html__("Enter Price table order. DESC or ASC", "holywood"),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'orderby', 'holywood' ),
            'param_name' => 'orderby',
            "description" => esc_html__("Enter Price table orderby. Default is : date", "holywood"),
        ),


      ),
   ) );
}
class WPBakeryShortCode_vc_price_table extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	parallax two
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_join_integrateWithVC' );
function vc_join_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "10. Join", "holywood" ),
      "base" => "vc_join",
	   'weight' => -10,
	  "icon" => "icon-wpb-row",
	  "category" => esc_html__( "Holywood", "holywood"),
	  "description" => esc_html__("Frontpage join section", "holywood"),
      "params" => array(

		array(
            "type" => "textfield",
            "heading" => esc_html__("section id", "holywood"),
            "param_name" => "section_id",
            "description" => esc_html__("Add your section id for your custom colors or leave blank", "holywood"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Heading", "holywood"),
            "param_name" => "heading",
            "description" => esc_html__("Add your  heading", "holywood"),
        ),
		array(
            "type" => "textarea",
            "heading" => esc_html__("slogan", "holywood"),
            "param_name" => "slogan",
            "description" => esc_html__("Add your  slogan", "holywood"),
        ),
		array(
            "type" => "textarea_html",
            "heading" => esc_html__("Text area", "holywood"),
            "param_name" => "content",
            "description" => esc_html__("Add your content / contact form shortcode", "holywood"),
        ),

      ),
   ) );
}
class WPBakeryShortCode_vc_join extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	clients
/*-----------------------------------------------------------------------------------*/

	vc_map( array(
		"name" => esc_html__("11. Clients", "holywood"),
		"base" => "vc_clients",
		'weight' => -11,
		"icon" => "icon-wpb-row",
		"as_parent" => array('only' => 'vc_clients_item'),
		"content_element" => true,
		"show_settings_on_create" => true,
		"category" => esc_html__( "Holywood", "holywood"),
		"description" => esc_html__("Frontpage clients section", "holywood"),
		"params" => array(

		array(
            "type" => "textfield",
            "heading" => esc_html__("Section id", "holywood"),
            "param_name" => "section_id",
            "description" => esc_html__("Add Your Section id for scroll. If you use with multiple page for onepage write number like one, two , three", "holywood"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("heading", "holywood"),
            "param_name" => "heading",
            "description" => esc_html__("Add Your heading", "holywood"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("description", "holywood"),
            "param_name" => "description",
            "description" => esc_html__("Add Your description", "holywood"),
        ),
    ),
    "js_view" => 'VcColumnView'
) );

vc_map( array(
    "name" => esc_html__("Clients images", "holywood"),
    "base" => "vc_clients_item",
    "content_element" => true,
    "as_child" => array('only' => 'vc_clients'),
    "params" => array(


        array(
            'type' => 'attach_images',
            'heading' => esc_html__( 'Images', 'holywood' ),
            'param_name' => 'images',
            "description" => esc_html__("Add Your images. Maximum 4 item ", "holywood"),
        ),

    )
) );


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_vc_clients extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_vc_clients_item extends WPBakeryShortCode {
    }
}

/*-----------------------------------------------------------------------------------*/
/*	team
/*-----------------------------------------------------------------------------------*/

	vc_map( array(
		"name" => esc_html__("12. Team", "holywood"),
		"base" => "vc_team",
		'weight' => -12,
		"icon" => "icon-wpb-row",
		"as_parent" => array('only' => 'vc_team_item'),
		"content_element" => true,
		"show_settings_on_create" => true,
		"category" => esc_html__( "Holywood", "holywood"),
		"description" => esc_html__("Frontpage team section", "holywood"),
		"params" => array(

		array(
            "type" => "textfield",
            "heading" => esc_html__("Section id", "holywood"),
            "param_name" => "section_id",
            "description" => esc_html__("Add Your Section id for scroll. If you use with multiple page for onepage write number like one, two , three", "holywood"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("heading", "holywood"),
            "param_name" => "heading",
            "description" => esc_html__("Add Your heading", "holywood"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("description", "holywood"),
            "param_name" => "description",
            "description" => esc_html__("Add Your description", "holywood"),
        ),
    ),
    "js_view" => 'VcColumnView'
) );

vc_map( array(
    "name" => esc_html__("Team member", "holywood"),
    "base" => "vc_team_item",
    "content_element" => true,
    "as_child" => array('only' => 'vc_team'),
    "params" => array(
        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'team member image', 'holywood' ),
            'param_name' => 'team_img',
            "description" => esc_html__("Add Your image", "holywood"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("team section offset class for centered items.", "holywood"),
            "param_name" => "offset_class",
            "description" => esc_html__("Just add an offset class for first team item. Tutorial here : https://www.youtube.com/watch?v=hmYeKjhIVf8", "holywood"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("team member  name", "holywood"),
            "param_name" => "name",
            "description" => esc_html__("Add team member  name", "holywood"),
        ),
		array(
			'type' => 'param_group',
			'heading' => esc_html__( 'Column list items', 'holywood' ),
			'param_name' => 'values',
			'value' => urlencode( json_encode( array(
				array(
					'url' => esc_html__( '#', 'holywood' )
				),
				array(
					'icon' => esc_html__( 'facebook', 'holywood' )
				),
			))),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Social account url', 'holywood' ),
					'param_name' => 'url',
					'description' => esc_html__( 'Enter Social account url.', 'holywood' ),
					'admin_label' => true
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Icon name', 'holywood' ),
					'param_name' => 'icon',
					'description' => esc_html__( 'Enter icon name for Social account. facebook, twitter, dribbble and more', 'holywood' ),
					'admin_label' => true
				),
			)
		),
    )
) );


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_vc_team extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_vc_team_item extends WPBakeryShortCode {
    }
}


/*-----------------------------------------------------------------------------------*/
/*	projects
/*-----------------------------------------------------------------------------------*/

	vc_map( array(
		"name" => esc_html__("13. Projects", "holywood"),
		"base" => "vc_project",
		'weight' => -13,
		"icon" => "icon-wpb-row",
		"as_parent" => array('only' => 'vc_project_item'),
		"content_element" => true,
		"show_settings_on_create" => true,
		"category" => esc_html__( "Holywood", "holywood"),
		"description" => esc_html__("Frontpage project section", "holywood"),
		"params" => array(

		array(
            "type" => "textfield",
            "heading" => esc_html__("Section id", "holywood"),
            "param_name" => "section_id",
            "description" => esc_html__("Add Your Section id for scroll. If you use with multiple page for onepage write number like one, two , three", "holywood"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("heading", "holywood"),
            "param_name" => "heading",
            "description" => esc_html__("Add Your heading", "holywood"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("description", "holywood"),
            "param_name" => "description",
            "description" => esc_html__("Add Your description", "holywood"),
        ),
    ),
    "js_view" => 'VcColumnView'
) );

vc_map( array(
    "name" => esc_html__("Projects item", "holywood"),
    "base" => "vc_project_item",
    "content_element" => true,
    "as_child" => array('only' => 'vc_project'),
    "params" => array(


        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'project image', 'holywood' ),
            'param_name' => 'project_img',
            "description" => esc_html__("Add Your image", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("project heading", "holywood"),
            "param_name" => "heading",
            "description" => esc_html__("Add project heading", "holywood"),
        ),


		array(
            "type" => "textarea",
            "heading" => esc_html__("project description", "holywood"),
            "param_name" => "description",
            "description" => esc_html__("Add project description", "holywood"),
        ),

    )
) );


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_vc_project extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_vc_project_item extends WPBakeryShortCode {
    }
}

/*-----------------------------------------------------------------------------------*/
/*	testimonials
/*-----------------------------------------------------------------------------------*/

	vc_map( array(
		"name" => esc_html__("14. Testimonials", "holywood"),
		"base" => "vc_testimonials",
		"icon" => "icon-wpb-row",
		"as_parent" => array('only' => 'vc_testimonials_item'),
		"content_element" => true,
		"show_settings_on_create" => true,
		"category" => esc_html__( "Holywood", "holywood"),
		"description" => esc_html__("Frontpage testimonials section", "holywood"),
		'weight' => -14,
		"params" => array(

		array(
            "type" => "textfield",
            "heading" => esc_html__("Section id", "holywood"),
            "param_name" => "section_id",
            "description" => esc_html__("Add Your Section id for scroll. If you use with multiple page for onepage write number like one, two , three", "holywood"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("heading", "holywood"),
            "param_name" => "heading",
            "description" => esc_html__("Add Your heading", "holywood"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("description", "holywood"),
            "param_name" => "description",
            "description" => esc_html__("Add Your description", "holywood"),
        ),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'heading type', 'holywood' ),
			'param_name' => 'heading_type',
			'value' => array(
				esc_html__( 'select heading type', 'holywood' ) => 'centered',
				esc_html__( 'icon', 'holywood' ) => 'icon',
				esc_html__( 'text', 'holywood' ) => 'text'
			),
			'description' => esc_html__( 'Select type', 'holywood' ),
		),
    ),
    "js_view" => 'VcColumnView'
) );

vc_map( array(
    "name" => esc_html__("Testimonials item", "holywood"),
    "base" => "vc_testimonials_item",
    "content_element" => true,
    "as_child" => array('only' => 'vc_testimonials'),
    "params" => array(


        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'testimonials first image', 'holywood' ),
            'param_name' => 'testi_img',
            "description" => esc_html__("Add Your image", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("testimonials first name", "holywood"),
            "param_name" => "name",
            "description" => esc_html__("Add testimonials first heading", "holywood"),
        ),


		array(
            "type" => "textarea",
            "heading" => esc_html__("testimonials first description", "holywood"),
            "param_name" => "description",
            "description" => esc_html__("Add testimonials first description", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("testimonials first position", "holywood"),
            "param_name" => "position",
            "description" => esc_html__("Add testimonials first position", "holywood"),
        ),

        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'testimonials second image', 'holywood' ),
            'param_name' => 'testi_imga',
            "description" => esc_html__("Add Your image", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("testimonials second name", "holywood"),
            "param_name" => "namea",
            "description" => esc_html__("Add testimonials second heading", "holywood"),
        ),


		array(
            "type" => "textarea",
            "heading" => esc_html__("testimonials second description", "holywood"),
            "param_name" => "descriptiona",
            "description" => esc_html__("Add testimonials second description", "holywood"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("testimonials second position", "holywood"),
            "param_name" => "positiona",
            "description" => esc_html__("Add testimonials second position", "holywood"),
        ),



    )
) );


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_vc_testimonials extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_vc_testimonials_item extends WPBakeryShortCode {
    }
}

?>
