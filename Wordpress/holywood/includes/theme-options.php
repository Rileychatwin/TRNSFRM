<?php
/**
* Initialize the custom Theme Options.
*/
add_action( 'init', 'custom_theme_options' );
/**
* Build the custom settings & update OptionTree.
*
* @return    void
* @since     2.3.0
*/
function custom_theme_options() {
    /* OptionTree is not loaded yet, or this is not an admin request */
    if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;
    /**
    * Get a copy of the saved settings array.
    */
    $saved_settings = get_option( ot_settings_id(), array() );

    $custom_settings = array(
        'contextual_help' => array(
            'sidebar' => ''
        ),
        'sections' => array(
            array(
                'id'     => 'pre',
                'title'  => esc_html__( 'Preloader', 'holywood' )
            ),
            array(
                'id'     => 'header',
                'title'  => esc_html__( 'Header Navigation', 'holywood' )
            ),
            array(
                'id'     => 'logo',
                'title'  => esc_html__( 'Logo', 'holywood' )
            ),
            array(
                'id'     => 'google_fonts',
                'title'  => esc_html__( 'Google Fonts', 'holywood' )
            ),
            array(
                'id'     => 'typography',
                'title'  => esc_html__( 'Typography', 'holywood' )
            ),
            array(
                'id'     => 'colors',
                'title'  => esc_html__( 'Theme Color', 'holywood' )
            ),
            array(
                'id'     => 'sidebars',
                'title'  => esc_html__( 'Theme sidebars', 'holywood' )
            ),
            array(
                'id'     => 'blogheader',
                'title'  => esc_html__( 'Blog page header', 'holywood' )
            ),
            array(
                'id'     => 'post_options',
                'title'  => esc_html__( 'Blog Post Options', 'holywood' )
            ),
            array(
                'id'     => 'single_page',
                'title'  => esc_html__( 'Single Post Page', 'holywood' )
            ),
            array(
                'id'     => 'sidebaroptions',
                'title'  => esc_html__( 'Sidebar Options', 'holywood' )
            ),
            array(
                'id'     => 'copyright',
                'title'  => esc_html__( 'Footer', 'holywood' )
            ),
            array(
                'id'     => 'footer_colors',
                'title'  => esc_html__( 'Footer Colors', 'holywood' )
            ),
            array(
                'id'     => 'footer_link',
                'title'  => esc_html__( 'Footer links', 'holywood' )
            ),
            array(
                'id'     => 'footer_social',
                'title'  => esc_html__( 'Footer social', 'holywood' )
            ),
            array(
                'id'     => 'addinotial_css',
                'title'  => esc_html__( 'Additional Css', 'holywood' )
            ),
        ),
        'settings'  => array(
            // BLOG SETTINGS
            //PRELOADER  SETTINGS.
            array(
                'id' => 'holywood_pre',
                'label' => esc_html( 'Preloader', 'holywood' ),
                'desc' => sprintf( esc_html( 'Preloader display %s or %s.', 'holywood' ), '<code>on</code>', '<code>off</code>' ),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'pre',
                'operator' => 'and'
            ),
            array(
                'id' => 'holywood_pre_type',
                'label' => esc_html('Preloader types', 'holywood' ),
                'desc' => esc_html('Please choose a preloader type', 'holywood' ),
                'std' => 'def',
                'type' => 'select',
                'section' => 'pre',
                'condition' => 'holywood_pre:is(on)',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => 'def',
                        'label' => esc_html('Default', 'holywood' ),
                    ),
                    array(
                        'value' => '01',
                        'label' => esc_html('Type 1', 'holywood' ),
                    ),
                    array(
                        'value' => '02',
                        'label' => esc_html('Type 2', 'holywood' ),
                    ),
                    array(
                        'value' => '03',
                        'label' => esc_html('Type 3', 'holywood' ),
                    ),
                    array(
                        'value' => '04',
                        'label' => esc_html('Type 4', 'holywood' ),
                    ),
                    array(
                        'value' => '05',
                        'label' => esc_html('Type 5', 'holywood' ),
                    ),
                    array(
                        'value' => '06',
                        'label' => esc_html('Type 6', 'holywood' ),
                    ),
                    array(
                        'value' => '07',
                        'label' => esc_html('Type 7', 'holywood' ),
                    ),
                    array(
                        'value' => '08',
                        'label' => esc_html('Type 8', 'holywood' ),
                    ),
                    array(
                        'value' => '09',
                        'label' => esc_html('Type 9', 'holywood' ),
                    ),
                    array(
                        'value' => '10',
                        'label' => esc_html('Type 10', 'holywood' ),
                    ),
                    array(
                        'value' => '11',
                        'label' => esc_html('Type 11', 'holywood' ),
                    ),
                    array(
                        'value' => '12',
                        'label' => esc_html('Type 12', 'holywood' ),
                    ),
                )
            ),
            array(
                'id' => 'holywood_prebgcolor',
                'label' => esc_html( 'Preloader BG color', 'holywood' ),
                'desc' => esc_html( 'Please select color', 'holywood' ),
                'type' => 'colorpicker',
                'condition' => 'holywood_pre:is(on)',
                'section' => 'pre'
            ),
            array(
                'id' => 'holywood_prespincolor',
                'label' => esc_html( 'Preloader spin color', 'holywood' ),
                'desc' => esc_html( 'Please select color', 'holywood' ),
                'type' => 'colorpicker',
                'condition' => 'holywood_pre:is(on)',
                'section' => 'pre'
            ),
            array(
                'id'          => 'holywood_use_new_header',
                'label'       => esc_html__( 'Use new header?', 'holywood' ),
                'desc'        => esc_html__( 'Use this logo type.' , 'holywood' ),
                'std'         => 'no',
                'type'        => 'radio',
                'section'     => 'header',
                'operator'    => 'and',
                'choices'     => array(
                    array(
                        'value'  => 'yes',
                        'label'  => esc_html__( 'Yes', 'holywood' )
                    ),
                    array(
                        'value'  => 'no',
                        'label'  => esc_html__( 'No', 'holywood' )
                    )
                )
            ),
            array(
                'id'          => 'menubuttoncolor',
                'label'       => esc_html__( 'Header menu button color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'std'         => '#fff',
                'section'     => 'header',
                'condition'   => 'holywood_use_new_header:is(no)',
            ),
            array(
                'id'          => 'menudropdown',
                'label'       => esc_html__( 'Theme right slider menu background color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'std'         => '#292c33',
                'condition'   => 'holywood_use_new_header:is(no)',
                'section'     => 'header'
            ),
            array(
                'id'          => 'menudropdowncolor',
                'label'       => esc_html__( 'Theme right slider menu item color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'std'         => '#F5F5F5',
                'condition'   => 'holywood_use_new_header:is(no)',
                'section'     => 'header'
            ),
            array(
                'id'          => 'holywood_nav_menu_ifs',
                'label'       => esc_html__('Navigation menu item font-size', 'holywood' ),
                'desc'        => esc_html__('Navigation menu item font-size', 'holywood' ),
                'type'        => 'numeric-slider',
                'min_max_step'=> '0,100',
                'section'     => 'header',
                'condition'   => 'holywood_use_new_header:is(no)',
                'operator'    => 'and'
            ),
            // header genaral
            array(
                'id'          => 'holywood_header_general_tab',
                'label'       => esc_html__( 'General', 'holywood' ),
                'type'        => 'tab',
                'section'     => 'header'
            ),
            array(
                'id'          => 'holywood_nav_type',
                'label'       => esc_html__( 'Header type', 'holywood' ),
                'desc'        => esc_html__( 'Select header navigation type' , 'holywood' ),
                'std'         => 'default',
                'type'        => 'radio',
                'section'     => 'header',
                'condition'   => 'holywood_use_new_header:is(yes)',
                'operator'    => 'and',
                'choices'     => array(
                    array(
                        'value'  => 'default',
                        'label'  => esc_html__( 'navbar-static', 'holywood' )
                    ),
                    array(
                        'value'  => 'navbar-sticky',
                        'label'  => esc_html__( 'navbar-sticky', 'holywood' )
                    ),
                    array(
                        'value'  => 'navbar-scrollspy',
                        'label'  => esc_html__( 'navbar-scrollspy', 'holywood' )
                    ),
                    array(
                        'value'  => 'navbar-fixed-white',
                        'label'  => esc_html__( 'navbar-fixed-white', 'holywood' )
                    ),
                    array(
                        'value'  => 'navbar-fixed-dark',
                        'label'  => esc_html__( 'navbar-fixed-dark', 'holywood' )
                    ),
                    array(
                        'value'  => 'navbar-fixed-transparent',
                        'label'  => esc_html__( 'navbar-fixed-transparent', 'holywood' )
                    ),
                    array(
                        'value'  => 'navbar-fixed-transparent-dark',
                        'label'  => esc_html__( 'navbar-fixed-transparent-dark', 'holywood' )
                    ),
                    array(
                        'value'  => 'brand-center',
                        'label'  => esc_html__( 'logo-center', 'holywood' )
                    ),
                    array(
                        'value'  => 'brand-center-two',
                        'label'  => esc_html__( 'logo-center-two', 'holywood' )
                    ),
                    array(
                        'value'  => 'navbar-brand-top',
                        'label'  => esc_html__( 'logo-top', 'holywood' )
                    ),
                    array(
                        'value'  => 'navbar-full',
                        'label'  => esc_html__( 'navbar-full', 'holywood' )
                    ),
                    array(
                        'value'  => 'navbar-sidebar',
                        'label'  => esc_html__( 'navbar-sidebar', 'holywood' )
                    ),
                )
            ),
            array(
                'id'          => 'holywood_menu_align',
                'label'       => esc_html__( 'Menu alignment', 'holywood' ),
                'desc'        => esc_html__( 'Select header menu alignment.' , 'holywood' ),
                'std'         => 'navbar-right',
                'type'        => 'radio',
                'section'     => 'header',
                'condition'  => 'holywood_use_new_header:is(yes),holywood_nav_type:not(brand-center),holywood_nav_type:not(brand-center-two),holywood_nav_type:not(navbar-brand-top),holywood_nav_type:not(navbar-full),holywood_nav_type:not(navbar-sidebar)',
                'operator'    => 'and',
                'choices'     => array(
                    array(
                        'value'  => 'navbar-right',
                        'label'  => esc_html__( 'right', 'holywood' )
                    ),
                    array(
                        'value'  => 'navbar-left',
                        'label'  => esc_html__( 'left', 'holywood' )
                    ),
                    array(
                        'value'  => 'navbar-center',
                        'label'  => esc_html__( 'center', 'holywood' )
                    ),
                )
            ),
            array(
                'id'          => 'slogoimg',
                'label'       => esc_html__( 'Sticky logo image', 'holywood' ),
                'desc'        => esc_html__( 'Upload your sticky logo image', 'holywood' ),
                'type'        => 'upload',
                'condition'   => 'holywood_use_new_header:is(yes),holywood_logo_display:is(on),holywood_logo_type:is(img),holywood_nav_type:not(brand-center),holywood_nav_type:not(brand-center-two),holywood_nav_type:not(navbar-brand-top),holywood_nav_type:not(navbar-full),holywood_nav_type:not(navbar-sidebar),holywood_nav_type:not(default)',
                'section'     => 'header'
            ),
            array(
                'id'          => 'slogo_dimension',
                'label'       => esc_html__( 'Sticky logo dimension', 'holywood' ),
                'desc'        => esc_html__( 'Set sticky logo width and height properties.', 'holywood' ),
                'type'        => 'dimension',
                'condition'   => 'holywood_use_new_header:is(yes),holywood_logo_display:is(on),holywood_logo_type:is(img),holywood_nav_type:not(brand-center),holywood_nav_type:not(brand-center-two),holywood_nav_type:not(navbar-brand-top),holywood_nav_type:not(navbar-full),holywood_nav_type:not(navbar-sidebar),holywood_nav_type:not(default)',
                'section'     => 'header',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'slogopadding',
                'label'       => esc_html__( 'Sticky logo padding', 'holywood' ),
                'desc'        => esc_html__( 'You can use this option for logo padding top with keyboard arrows', 'holywood' ),
                'type'        => 'spacing',
                'section'     => 'header',
                'condition'   => 'holywood_use_new_header:is(yes),holywood_logo_display:is(on),holywood_logo_type:is(img),holywood_nav_type:not(brand-center),holywood_nav_type:not(brand-center-two),holywood_nav_type:not(navbar-brand-top),holywood_nav_type:not(navbar-full),holywood_nav_type:not(navbar-sidebar),holywood_nav_type:not(default)',
                'operator'    => 'and'
            ),
            array(
                'id'         => 'holywood_menu_typo',
                'label'      => esc_html__( 'Menu item typography', 'holywood' ),
                'desc'       => esc_html__( 'You can export your style to the menu item with these properties', 'holywood' ),
                'type'       => 'typography',
                'section'    => 'header',
                'condition'  => 'holywood_use_new_header:is(yes)',
                'operator'   => 'and'
            ),
            array(
                'id'         => 'holywood_menu_item_hvrclr',
                'label'      => esc_html__( 'Menu item hover color', 'holywood' ),
                'desc'       => esc_html__( 'Set your custom hover color for the menu item.', 'holywood' ),
                'type'       => 'colorpicker',
                'section'    => 'header',
                'condition'  => 'holywood_use_new_header:is(yes)',
                'operator'   => 'and'
            ),
            array(
                'id'         => 'holywood_menu_bgclr',
                'label'      => esc_html__( 'Header background color', 'holywood' ),
                'desc'       => esc_html__( 'Set your custom color for the header.', 'holywood' ),
                'type'       => 'colorpicker-opacity',
                'section'    => 'header',
                'condition'  => 'holywood_use_new_header:is(yes)',
                'operator'   => 'and'
            ),
            array(
                'id'         => 'holywood_smenu_bgclr',
                'label'      => esc_html__( 'Sticky header background color', 'holywood' ),
                'desc'       => esc_html__( 'Set your custom color for the sticky header.', 'holywood' ),
                'type'       => 'colorpicker-opacity',
                'section'    => 'header',
                'condition'   => 'holywood_use_new_header:is(yes),holywood_nav_type:not(brand-center),holywood_nav_type:not(brand-center-two),holywood_nav_type:not(navbar-brand-top),holywood_nav_type:not(navbar-full),holywood_nav_type:not(navbar-sidebar),holywood_nav_type:not(default)',
                'operator'   => 'and'
            ),
            array(
                'id'         => 'holywood_smenu_item_clr',
                'label'      => esc_html__( 'Sticky menu item color', 'holywood' ),
                'desc'       => esc_html__( 'Set your custom hover color for the sticky menu item.', 'holywood' ),
                'type'       => 'colorpicker',
                'section'    => 'header',
                'condition'   => 'holywood_use_new_header:is(yes),holywood_nav_type:not(brand-center),holywood_nav_type:not(brand-center-two),holywood_nav_type:not(navbar-brand-top),holywood_nav_type:not(navbar-full),holywood_nav_type:not(navbar-sidebar),holywood_nav_type:not(default)',
                'operator'   => 'and'
            ),
            array(
                'id'         => 'holywood_smenu_item_hvrclr',
                'label'      => esc_html__( 'Sticky menu item hover color', 'holywood' ),
                'desc'       => esc_html__( 'Set your custom hover color for the sticky menu item.', 'holywood' ),
                'type'       => 'colorpicker',
                'section'    => 'header',
                'condition'   => 'holywood_use_new_header:is(yes),holywood_nav_type:not(brand-center),holywood_nav_type:not(brand-center-two),holywood_nav_type:not(navbar-brand-top),holywood_nav_type:not(navbar-full),holywood_nav_type:not(navbar-sidebar),holywood_nav_type:not(default)',
                'operator'   => 'and'
            ),
            // Dropdown Menu
            array(
                'id'          => 'holywood_header_dropdown_submenu_tab',
                'label'       => esc_html__( 'Dropdown Menu', 'holywood' ),
                'type'        => 'tab',
                'section'     => 'header'
            ),
            array(
                'id'          => 'holywood_menu_submenu_animation_in',
                'label'       => esc_html__( 'Dropdown submenu animation in', 'holywood' ),
                'desc'        => esc_html__( 'Select animation for dropdown menu.' , 'holywood' ),
                'std'         => '#',
                'type'        => 'radio',
                'section'     => 'header',
                'condition'   => 'holywood_use_new_header:is(yes)',
                'operator'    => 'and',
                'choices'     => array(
                    array(
                        'value'  => '#',
                        'label'  => esc_html__( 'No animation', 'holywood' )
                    ),
                    array(
                        'value'  => 'fadeIn',
                        'label'  => esc_html__( 'fadeIn', 'holywood' )
                    ),
                    array(
                        'value'  => 'fadeInUp',
                        'label'  => esc_html__( 'fadeInUp', 'holywood' )
                    ),
                    array(
                        'value'  => 'fadeInDown',
                        'label'  => esc_html__( 'fadeInDown', 'holywood' )
                    ),
                    array(
                        'value'  => 'fadeInLeft',
                        'label'  => esc_html__( 'fadeInLeft', 'holywood' )
                    ),
                    array(
                        'value'  => 'fadeInRight',
                        'label'  => esc_html__( 'fadeInRight', 'holywood' )
                    ),
                    array(
                        'value'  => 'slideIn',
                        'label'  => esc_html__( 'slideIn', 'holywood' )
                    ),
                    array(
                        'value'  => 'slideInUp',
                        'label'  => esc_html__( 'slideInUp', 'holywood' )
                    ),
                    array(
                        'value'  => 'slideInDown',
                        'label'  => esc_html__( 'slideInDown', 'holywood' )
                    ),
                    array(
                        'value'  => 'zoomIn',
                        'label'  => esc_html__( 'zoomIn', 'holywood' )
                    ),
                    array(
                        'value'  => 'rotateIn',
                        'label'  => esc_html__( 'rotateIn', 'holywood' )
                    ),
                )
            ),
            array(
                'id'          => 'holywood_menu_submenu_animation_out',
                'label'       => esc_html__( 'Dropdown submenu animation out', 'holywood' ),
                'desc'        => esc_html__( 'Select animation for dropdown menu.' , 'holywood' ),
                'std'         => '#',
                'type'        => 'radio',
                'section'     => 'header',
                'condition'   => 'holywood_use_new_header:is(yes)',
                'operator'    => 'and',
                'choices'     => array(
                    array(
                        'value'  => '#',
                        'label'  => esc_html__( 'No animation', 'holywood' )
                    ),
                    array(
                        'value'  => 'fadeOut',
                        'label'  => esc_html__( 'fadeOut', 'holywood' )
                    ),
                    array(
                        'value'  => 'fadeOutUp',
                        'label'  => esc_html__( 'fadeOutUp', 'holywood' )
                    ),
                    array(
                        'value'  => 'fadeOutDown',
                        'label'  => esc_html__( 'fadeOutDown', 'holywood' )
                    ),
                    array(
                        'value'  => 'fadeOutLeft',
                        'label'  => esc_html__( 'fadeOutLeft', 'holywood' )
                    ),
                    array(
                        'value'  => 'fadeOutRight',
                        'label'  => esc_html__( 'fadeOutRight', 'holywood' )
                    ),
                    array(
                        'value'  => 'slideOut',
                        'label'  => esc_html__( 'slideOut', 'holywood' )
                    ),
                    array(
                        'value'  => 'slideOutUp',
                        'label'  => esc_html__( 'slideOutUp', 'holywood' )
                    ),
                    array(
                        'value'  => 'slideOutDown',
                        'label'  => esc_html__( 'slideOutDown', 'holywood' )
                    ),
                    array(
                        'value'  => 'zoomOut',
                        'label'  => esc_html__( 'zoomOut', 'holywood' )
                    ),
                    array(
                        'value'  => 'rotateOut',
                        'label'  => esc_html__( 'rotateOut', 'holywood' )
                    ),
                )
            ),
            array(
                'id'         => 'holywood_menu_dropdown_typo',
                'label'      => esc_html__( 'Dropdown menu item typography', 'holywood' ),
                'desc'       => esc_html__( 'You can export your style to the dropdown menu item with these properties', 'holywood' ),
                'type'       => 'typography',
                'section'    => 'header',
                'condition'  => 'holywood_use_new_header:is(yes)',
                'operator'   => 'and'
            ),
            array(
                'id'         => 'holywood_menu_dropitem_hvrclr',
                'label'      => esc_html__( 'Dropdown menu item hover color', 'holywood' ),
                'desc'       => esc_html__( 'Set your custom hover color for the dropdown menu item.', 'holywood' ),
                'type'       => 'colorpicker',
                'section'    => 'header',
                'condition'  => 'holywood_use_new_header:is(yes)',
                'operator'   => 'and'
            ),
            array(
                'id'         => 'holywood_menu_dropdown_bgclr',
                'label'      => esc_html__( 'Dropdown menu background color', 'holywood' ),
                'desc'       => esc_html__( 'Set your custom hover color for the dropdown background.', 'holywood' ),
                'type'       => 'colorpicker-opacity',
                'section'    => 'header',
                'condition'  => 'holywood_use_new_header:is(yes)',
                'operator'   => 'and'
            ),
            // Header Attribute
            array(
                'id'          => 'holywood_header_attr_tab',
                'label'       => esc_html__( 'Header Attribute', 'holywood' ),
                'type'        => 'tab',
                'section'     => 'header'
            ),
            array(
                'id'          => 'holywood_header_search_display',
                'label'       => esc_html__( 'Header search visibility', 'holywood' ),
                'desc'        => sprintf( esc_html__( 'Please choose header search visibility %s or %s.', 'holywood' ), '<code>on</code>', '<code>off</code>' ),
                'std'         => 'off',
                'type'        => 'on-off',
                'section'     => 'header',
                'condition'  => 'holywood_use_new_header:is(yes)',
                'operator'    => 'and'
            ),
            array(
                'id'         => 'holywood_header_search_iconclr',
                'label'      => esc_html__( 'Search icon color', 'holywood' ),
                'desc'       => esc_html__( 'Set your custom color for the header search icon', 'holywood' ),
                'type'       => 'colorpicker-opacity',
                'section'    => 'header',
                'condition'  => 'holywood_use_new_header:is(yes),holywood_header_search_display:is(on)',
                'operator'   => 'and'
            ),
            array(
                'id'         => 'holywood_header_search_bgclr',
                'label'      => esc_html__( 'Search area background color', 'holywood' ),
                'desc'       => esc_html__( 'Set your custom color for the header search area background', 'holywood' ),
                'type'       => 'colorpicker',
                'section'    => 'header',
                'condition'  => 'holywood_use_new_header:is(yes),holywood_header_search_display:is(on)',
                'operator'   => 'and'
            ),
            array(
                'id'         => 'holywood_header_search_textclr',
                'label'      => esc_html__( 'Search area text and close color', 'holywood' ),
                'desc'       => esc_html__( 'Set your custom color for the header search area text and close icon', 'holywood' ),
                'type'       => 'colorpicker',
                'section'    => 'header',
                'condition'  => 'holywood_use_new_header:is(yes),holywood_header_search_display:is(on)',
                'operator'   => 'and'
            ),
            array(
                'id'          => 'holywood_header_sidebarmenu_display',
                'label'       => esc_html__( 'Header sidebar menu widget area visibility', 'holywood' ),
                'desc'        => esc_html__( 'Please add widgets by following the <b>Dashboard > Appearance > Widgets > Header Sidebar Menu</b>.', 'holywood' ),
                'std'         => 'off',
                'type'        => 'on-off',
                'section'     => 'header',
                'condition'  => 'holywood_use_new_header:is(yes)',
                'operator'    => 'and'
            ),
            array(
                'id'         => 'holywood_sidebarmenu_btnclr',
                'label'      => esc_html__( 'Header sidebar menu toggle button color', 'holywood' ),
                'desc'       => esc_html__( 'Set your custom color for the sidebar menu toggle button.', 'holywood' ),
                'type'       => 'colorpicker',
                'section'    => 'header',
                'condition'  => 'holywood_use_new_header:is(yes),holywood_header_sidebarmenu_display:is(on)',
                'operator'   => 'and'
            ),
            array(
                'id'         => 'holywood_sidebarmenu_bgclr',
                'label'      => esc_html__( 'Header sidebar menu background color', 'holywood' ),
                'desc'       => esc_html__( 'Set your custom color for the sidebar menu background.', 'holywood' ),
                'type'       => 'colorpicker-opacity',
                'section'    => 'header',
                'condition'  => 'holywood_use_new_header:is(yes),holywood_header_sidebarmenu_display:is(on)',
                'operator'   => 'and'
            ),
            array(
                'id'         => 'holywood_sidebarmenu_wtclr',
                'label'      => esc_html__( 'Header sidebar menu widget title color', 'holywood' ),
                'desc'       => esc_html__( 'Set your custom color for the sidebar menu widget title.', 'holywood' ),
                'type'       => 'colorpicker',
                'section'    => 'header',
                'condition'  => 'holywood_use_new_header:is(yes),holywood_header_sidebarmenu_display:is(on)',
                'operator'   => 'and'
            ),
            array(
                'id'         => 'holywood_sidebarmenu_wlinkclr',
                'label'      => esc_html__( 'Header sidebar menu widget link color', 'holywood' ),
                'desc'       => esc_html__( 'Set your custom color for the sidebar menu widget link.', 'holywood' ),
                'type'       => 'colorpicker',
                'section'    => 'header',
                'condition'  => 'holywood_use_new_header:is(yes),holywood_header_sidebarmenu_display:is(on)',
                'operator'   => 'and'
            ),
            array(
                'id'         => 'holywood_sidebarmenu_wlinkhvrclr',
                'label'      => esc_html__( 'Header sidebar menu widget link hover color', 'holywood' ),
                'desc'       => esc_html__( 'Set your custom hover color for the sidebar menu widget link.', 'holywood' ),
                'type'       => 'colorpicker',
                'section'    => 'header',
                'condition'  => 'holywood_use_new_header:is(yes),holywood_header_sidebarmenu_display:is(on)',
                'operator'   => 'and'
            ),
            // header social icon
            array(
                'id'          => 'holywood_header_social_icon',
                'label'       => esc_html__( 'Header social icons', 'holywood' ),
                'desc'        => esc_html__( 'Add social icons to header.', 'holywood' ),
                'type'        => 'list-item',
                'section'     => 'header',
                'condition'  => 'holywood_use_new_header:is(yes)',
                'settings'    => array(
                    array(
                        'id'    => 'header_social',
                        'label' => esc_html__( 'Social icon name', 'holywood' ),
                        'desc'  => esc_html__( 'Enter fontawesome social icon name', 'holywood' ),
                        'type'  => 'text'
                    ),
                    array(
                        'id'    => 'header_social_link',
                        'label' => esc_html__( 'Link', 'holywood' ),
                        'desc'  => esc_html__( 'Enter fontawesome social share link', 'holywood' ),
                        'type'  => 'text'
                    )
                )
            ),
            array(
                'id'         => 'holywood_header_social_iconclr',
                'label'      => esc_html__( 'Social icon color', 'holywood' ),
                'desc'       => esc_html__( 'Set your custom color for the header social icon', 'holywood' ),
                'type'       => 'colorpicker',
                'section'    => 'header',
                'condition'  => 'holywood_use_new_header:is(yes)',
                'operator'   => 'and'
            ),
            array(
                'id'         => 'holywood_header_social_iconhvrclr',
                'label'      => esc_html__( 'Hover social icon color', 'holywood' ),
                'desc'       => esc_html__( 'Set your custom hover color for the header social icon', 'holywood' ),
                'type'       => 'colorpicker',
                'section'    => 'header',
                'condition'  => 'holywood_use_new_header:is(yes)',
                'operator'   => 'and'
            ),
            // Back to top button
            array(
                'id'          => 'holywood_backtotop_tab',
                'label'       => esc_html__( 'Back to Top', 'holywood' ),
                'type'        => 'tab',
                'section'     => 'header'
            ),
            array(
                'id'          => 'backtotop_display',
                'label'       => esc_html__( 'Back to top button visibility', 'holywood' ),
                'desc'        => sprintf( esc_html__( 'Please choose back to top button visibility %s or %s.', 'holywood' ), '<code>on</code>', '<code>off</code>' ),
                'std'         => 'off',
                'type'        => 'on-off',
                'section'     => 'header',
                'condition'   => 'holywood_use_new_header:is(yes)',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'backtotop_bgclr',
                'label'       => esc_html__( 'Button background color', 'holywood' ),
                'desc'        => esc_html__( 'You can change back to top button background color', 'holywood' ),
                'type'        => 'colorpicker',
                'section'     => 'header',
                'condition'   => 'holywood_use_new_header:is(yes),backtotop_display:is(on)',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'backtotop_hvrbgclr',
                'label'       => esc_html__( 'Hover background color', 'holywood' ),
                'desc'        => esc_html__( 'You can change hover background color for the back to top button', 'holywood' ),
                'type'        => 'colorpicker',
                'section'     => 'header',
                'condition'   => 'holywood_use_new_header:is(yes),backtotop_display:is(on)',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'backtotop_iclr',
                'label'       => esc_html__( 'Button icon color', 'holywood' ),
                'desc'        => esc_html__( 'You can change color for the back to top button icon.', 'holywood' ),
                'type'        => 'colorpicker',
                'section'     => 'header',
                'condition'   => 'holywood_use_new_header:is(yes),backtotop_display:is(on)',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'backtotop_ihvrclr',
                'label'       => esc_html__( 'Hover button icon color', 'holywood' ),
                'desc'        => esc_html__( 'You can change hover color for the back to top button icon.', 'holywood' ),
                'type'        => 'colorpicker',
                'section'     => 'header',
                'condition'   => 'holywood_use_new_header:is(yes),backtotop_display:is(on)',
                'operator'    => 'and'
            ),
            // LOGO SETTINGS
            array(
                'id'          => 'holywood_logo_display',
                'label'       => esc_html__( 'Logo visibility', 'holywood' ),
                'desc'        => sprintf( esc_html__( 'Please choose header logo visibility %s or %s.', 'holywood' ), '<code>on</code>', '<code>off</code>' ),
                'std'         => 'on',
                'type'        => 'on-off',
                'section'     => 'logo',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'holywood_logo_type',
                'label'       => esc_html__( 'Logo Type', 'holywood' ),
                'desc'        => esc_html__( 'Use this logo type.' , 'holywood' ),
                'std'         => 'img',
                'type'        => 'select',
                'section'     => 'logo',
                'condition'   => 'holywood_logo_display:is(on)',
                'operator'    => 'and',
                'choices'     => array(
                    array(
                        'value'  => '',
                        'label'  => esc_html__( 'Select Logo', 'holywood' )
                    ),
                    array(
                        'value'  => 'text',
                        'label'  => esc_html__( 'Text Logo', 'holywood' )
                    ),
                    array(
                        'value'  => 'img',
                        'label'  => esc_html__( 'Image logo', 'holywood' )
                    )
                )
            ),
            array(
                'id'          => 'holywood_text_logo',
                'label'       => esc_html__( 'Text Logo', 'holywood' ),
                'desc'        => esc_html__( 'Text Logo', 'holywood' ),
                'std'         => 'Holywood',
                'condition'   => 'holywood_logo_display:is(on),holywood_logo_type:is(text)',
                'section'     => 'logo',
                'type'        => 'text'
            ),
            array(
                'id'         => 'holywood_textlogo_typograp',
                'label'      => esc_html__( 'Static text logo typography', 'holywood' ),
                'desc'       => esc_html__( 'You can export your style to the static text logo with these properties', 'holywood' ),
                'type'       => 'typography',
                'condition'   => 'holywood_logo_display:is(on),holywood_logo_type:is(text)',
                'section'    => 'logo',
                'operator'   => 'and'
            ),
            array(
                'id'          => 'logoimg',
                'label'       => esc_html__( 'Upload logo image', 'holywood' ),
                'desc'        => esc_html__( 'Upload logo image', 'holywood' ),
                'type'        => 'upload',
                'condition'   => 'holywood_logo_display:is(on),holywood_logo_type:is(img)',
                'section'     => 'logo'
            ),
            array(
                'id'          => 'logoheight',
                'label'       => esc_html__( 'Logo height', 'holywood' ),
                'desc'        => esc_html__( 'You can use this option for logo height with keyboard arrows', 'holywood' ),
                'type'        => 'numeric-slider',
                'std'		  => '60',
                'min_max_step'=> '0,600',
                'condition'   => 'holywood_use_new_header:is(no),holywood_logo_display:is(on),holywood_logo_type:is(img)',
                'section'     => 'logo',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'logowidth',
                'label'       => esc_html__( 'Header logo width', 'holywood' ),
                'desc'        => esc_html__( 'You can use this option for header logo width with keyboard arrows', 'holywood' ),
                'type'        => 'numeric-slider',
                'std'		  => '60',
                'min_max_step'=> '0,300',
                'condition'   => 'holywood_use_new_header:is(no),holywood_logo_display:is(on),holywood_logo_type:is(img)',
                'section'     => 'logo',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'logo_dimension',
                'label'       => esc_html__( 'Logo dimension', 'holywood' ),
                'desc'        => esc_html__( 'Set logo width and height properties.', 'holywood' ),
                'type'        => 'dimension',
                'condition'   => 'holywood_use_new_header:is(yes),holywood_logo_display:is(on),holywood_logo_type:is(img)',
                'section'     => 'logo',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'logomargin',
                'label'       => esc_html__( 'Logo margin', 'holywood' ),
                'desc'        => esc_html__( 'You can use this option for logo margin top with keyboard arrows', 'holywood' ),
                'type'        => 'numeric-slider',
                'std'		  => '0',
                'min_max_step'=> '-100,200',
                'section'     => 'logo',
                'condition'   => 'holywood_use_new_header:is(no),holywood_logo_display:is(on)',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'logopadding',
                'label'       => esc_html__( 'Logo padding', 'holywood' ),
                'desc'        => esc_html__( 'You can use this option for logo margin top with keyboard arrows', 'holywood' ),
                'type'        => 'spacing',
                'section'     => 'logo',
                'condition'   => 'holywood_logo_display:is(on)',
                'operator'    => 'and'
            ),

            // GOOGLE FONTS
            array(
                'id'          => 'body_google_fonts',
                'label'       => esc_html__( 'Google Fonts', 'holywood'  ),
                'desc'        => esc_html__( 'Add Google Font and after the save settings follow these steps Dashboard > Appearance > Theme Options > Typography', 'holywood'  ),
                'type'        => 'google-fonts',
                'section'     => 'google_fonts',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'ot_font_api',
                'label'       => esc_html__( 'Google Webfonts API for Theme Options fonts', 'holywood' ),
                'desc'        => esc_html__( 'Enter your API, more details here: https://www.youtube.com/watch?v=3OT9tH141mc ', 'holywood' ),
                'type'        => 'text',
                'section'     => 'google_fonts',
                'operator'    => 'and'
            ),


            // TYPOGRAPHY
            array(
                'id'          => 'ninetheme_holywood_tipigrof',
                'label'       => esc_html__( 'Typography', 'holywood' ),
                'desc'        => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'holywood' ),
                'type'        => 'typography',
                'section'     => 'typography',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'ninetheme_holywood_tipigrof1',
                'label'       => esc_html__( 'Typography h1', 'holywood' ),
                'desc'        => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'holywood' ),
                'type'        => 'typography',
                'section'     => 'typography',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'ninetheme_holywood_tipigrof2',
                'label'       => esc_html__( 'Typography h2', 'holywood' ),
                'desc'        => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'holywood' ),
                'type'        => 'typography',
                'section'     => 'typography',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'ninetheme_holywood_tipigrof3',
                'label'       => esc_html__( 'Typography h3', 'holywood' ),
                'desc'        => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'holywood' ),
                'type'        => 'typography',
                'section'     => 'typography',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'ninetheme_holywood_tipigrof4',
                'label'       => esc_html__( 'Typography h4', 'holywood' ),
                'desc'        => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'holywood' ),
                'type'        => 'typography',
                'section'     => 'typography',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'ninetheme_holywood_tipigrof5',
                'label'       => esc_html__( 'Typography h5', 'holywood' ),
                'desc'        => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'holywood' ),
                'type'        => 'typography',
                'section'     => 'typography',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'ninetheme_holywood_tipigrof6',
                'label'       => esc_html__( 'Typography h6', 'holywood' ),
                'desc'        => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'holywood' ),
                'type'        => 'typography',
                'section'     => 'typography',
                'operator'    => 'and'
            ),

            // THEME COLOR
            array(
                'id'          => 'themecolor1',
                'label'       => esc_html__( 'Theme color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'std'         => '#2c97de',
                'section'     => 'colors'
            ),
            array(
                'id'          => 'themecolor2',
                'label'       => esc_html__( 'Theme color for hover', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'std'         => '#2cbf6d',
                'section'     => 'colors'
            ),

            // SIDEBARS SETTINGS
            array(
                'id'          => 'bloglayout',
                'label'       => esc_html__( 'Blog Layout', 'holywood' ),
                'desc'        => esc_html__( 'Please choose blog page layout type', 'holywood' ),
                'std'         => 'right-sidebar',
                'type'        => 'radio-image',
                'section'     => 'sidebars',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'pagelayout',
                'label'       => esc_html__( 'Default Page Layout', 'holywood' ),
                'desc'        => esc_html__( 'Please choose default page layout type', 'holywood' ),
                'std'         => 'right-sidebar',
                'type'        => 'radio-image',
                'section'     => 'sidebars',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'searchlayout',
                'label'       => esc_html__( 'Search page Layout', 'holywood' ),
                'desc'        => esc_html__( 'Please choose search page layout type', 'holywood' ),
                'std'         => 'right-sidebar',
                'type'        => 'radio-image',
                'section'     => 'sidebars',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'postlayout',
                'label'       => esc_html__( 'Blog single page layout', 'holywood' ),
                'desc'        => esc_html__( 'Please choose post page layout type', 'holywood' ),
                'std'         => 'right-sidebar',
                'type'        => 'radio-image',
                'section'     => 'sidebars',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'archivelayout',
                'label'       => esc_html__( 'archive page layout', 'holywood' ),
                'desc'        => esc_html__( 'Please choose archive page layout type', 'holywood' ),
                'std'         => 'right-sidebar',
                'type'        => 'radio-image',
                'section'     => 'sidebars',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'woosingle',
                'label'       => esc_html__( 'Shop single page layout', 'holywood' ),
                'desc'        => esc_html__( 'Please choose Shop single page layout type', 'holywood' ),
                'std'         => 'right-sidebar',
                'type'        => 'radio-image',
                'section'     => 'sidebars',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'woopage',
                'label'       => esc_html__( 'Shop  page layout', 'holywood' ),
                'desc'        => esc_html__( 'Please choose shop  page layout type', 'holywood' ),
                'std'         => 'right-sidebar',
                'type'        => 'radio-image',
                'section'     => 'sidebars',
                'operator'    => 'and'
            ),

            // BLOG HEADER SETTINGS
            array(
                'id'          => 'logovisibility',
                'label'       => esc_html__( 'header logo visibility', 'holywood' ),
                'desc'        => sprintf( esc_html__( 'Please choose header logo visibility %s or %s.', 'holywood' ), '<code>on</code>', '<code>off</code>' ),
                'std'         => 'off',
                'type'        => 'on-off',
                'section'     => 'blogheader',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'menubutton',
                'label'       => esc_html__( 'header menu button visibility', 'holywood' ),
                'desc'        => sprintf( esc_html__( 'Please choose header menu button visibility %s or %s.', 'holywood' ), '<code>on</code>', '<code>off</code>' ),
                'std'         => 'off',
                'type'        => 'on-off',
                'section'     => 'blogheader',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'otherpageheadbg',
                'label'       => esc_html__( 'Blog pages header section background image', 'holywood' ),
                'desc'        => esc_html__( 'You can upload your image for parallax header', 'holywood' ),
                'type'        => 'upload',
                'section'     => 'blogheader',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'holywood_headerbg',
                'label'       => esc_html__( 'Blog header background color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'std'         => '',
                'section'     => 'blogheader'
            ),
            array(
                'id'          => 'holywood_menubutton',
                'label'       => esc_html__( 'Blog header menu button color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'std'         => '#fff',
                'section'     => 'blogheader'
            ),
            array(
                'id'          => 'holywood_menubuttonhover',
                'label'       => esc_html__( 'Blog header menu button hover color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'std'         => '#fff',
                'section'     => 'blogheader'
            ),
            array(
                'id'          => 'menulinkcolor',
                'label'       => esc_html__( 'Blog header top menu link  color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'std'         => '#fff',
                'section'     => 'blogheader'
            ),

            // BLOG POST SETTINGS
            array(
                'id'          => 'ninetheme_ard_post_title_color',
                'label'       => esc_html__( 'Theme blog post heading color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'std'         => '',
                'section'     => 'post_options'
            ),
            array(
                'id'          => 'ninetheme_ard_post_icon_bg_color',
                'label'       => esc_html__( 'Theme blog post social icon background color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'section'     => 'post_options'
            ),
            array(
                'id'          => 'ninetheme_ard_post_border_color',
                'label'       => esc_html__( 'Theme blog post border bottom color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'section'     => 'post_options'
            ),
            array(
                'id'          => 'ninetheme_ard_post_text_color',
                'label'       => esc_html__( 'Theme blog post text color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'section'     => 'post_options'
            ),
            array(
                'id'          => 'ninetheme_ard_post_link_color',
                'label'       => esc_html__( 'Theme blog post link color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'section'     => 'post_options'
            ),

            // SINGLE PAGE
            // post share icons
            array(
                'id'          => 'holywood_post_shareicon_tab',
                'label'       => esc_html__( 'Post Share', 'holywood' ),
                'type'        => 'tab',
                'section'     => 'single_page'
            ),
            array(
                'id'          => 'holywood_single_allshare_display',
                'label'       => esc_html__( 'All share icon visibility', 'holywood' ),
                'desc'        => esc_html__( 'This is a general option. Disables or enables the all share icon from all posts.', 'holywood' ),
                'std'         => 'on',
                'type'        => 'on-off',
                'section'     => 'single_page'
            ),
            array(
                'id'          => 'holywood_single_facebook_display',
                'label'       => esc_html__( 'Facebook share icon visibility', 'holywood' ),
                'desc'        => esc_html__( 'This is a general option. Disables or enables the facebook share icon from all posts.', 'holywood' ),
                'std'         => 'on',
                'type'        => 'on-off',
                'condition'   => 'holywood_single_allshare_display:is(on)',
                'section'     => 'single_page'
            ),
            array(
                'id'          => 'holywood_single_twitter_display',
                'label'       => esc_html__( 'Twitter share icon visibility', 'holywood' ),
                'desc'        => esc_html__( 'This is a general option. Disables or enables the twitter share icon from all posts.', 'holywood' ),
                'std'         => 'on',
                'type'        => 'on-off',
                'condition'   => 'holywood_single_allshare_display:is(on)',
                'section'     => 'single_page'
            ),
            array(
                'id'          => 'holywood_single_google_display',
                'label'       => esc_html__( 'Google plus share icon visibility', 'holywood' ),
                'desc'        => esc_html__( 'This is a general option. Disables or enables the google plus share icon from all posts.', 'holywood' ),
                'std'         => 'on',
                'type'        => 'on-off',
                'condition'   => 'holywood_single_allshare_display:is(on)',
                'section'     => 'single_page'
            ),
            array(
                'id'          => 'holywood_single_digg_display',
                'label'       => esc_html__( 'Digg share icon visibility', 'holywood' ),
                'desc'        => esc_html__( 'This is a general option. Disables or enables the digg share icon from all posts.', 'holywood' ),
                'std'         => 'on',
                'type'        => 'on-off',
                'condition'   => 'holywood_single_allshare_display:is(on)',
                'section'     => 'single_page'
            ),
            array(
                'id'          => 'holywood_single_reddit_display',
                'label'       => esc_html__( 'Reddit share icon visibility', 'holywood' ),
                'desc'        => esc_html__( 'This is a general option. Disables or enables the reddit share icon from all posts.', 'holywood' ),
                'std'         => 'on',
                'type'        => 'on-off',
                'condition'   => 'holywood_single_allshare_display:is(on)',
                'section'     => 'single_page'
            ),
            array(
                'id'          => 'holywood_single_linkedin_display',
                'label'       => esc_html__( 'Linkedin share icon visibility', 'holywood' ),
                'desc'        => esc_html__( 'This is a general option. Disables or enables the linkedin share icon from all posts.', 'holywood' ),
                'std'         => 'on',
                'type'        => 'on-off',
                'condition'   => 'holywood_single_allshare_display:is(on)',
                'section'     => 'single_page'
            ),
            array(
                'id'          => 'holywood_single_pinterest_display',
                'label'       => esc_html__( 'Pinterest share icon visibility', 'holywood' ),
                'desc'        => esc_html__( 'This is a general option. Disables or enables the pinterest share icon from all posts.', 'holywood' ),
                'std'         => 'on',
                'type'        => 'on-off',
                'condition'   => 'holywood_single_allshare_display:is(on)',
                'section'     => 'single_page'
            ),
            array(
                'id'          => 'holywood_single_stumbleupon_display',
                'label'       => esc_html__( 'Stumbleupon share icon visibility', 'holywood' ),
                'desc'        => esc_html__( 'This is a general option. Disables or enables the stumbleupon share icon from all posts.', 'holywood' ),
                'std'         => 'on',
                'type'        => 'on-off',
                'condition'   => 'holywood_single_allshare_display:is(on)',
                'section'     => 'single_page'
            ),
            array(
                'id'          => 'holywood_single_mail_display',
                'label'       => esc_html__( 'Mail icon visibility', 'holywood' ),
                'desc'        => esc_html__( 'This is a general option. Disables or enables the mail icon from all posts.', 'holywood' ),
                'std'         => 'on',
                'type'        => 'on-off',
                'condition'   => 'holywood_single_allshare_display:is(on)',
                'section'     => 'single_page'
            ),
            array(
                'id'          => 'holywood_ninetheme_blogpostsharebgcolor',
                'label'       => esc_html__( 'Post share icon background color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'condition'   => 'holywood_single_allshare_display:is(on)',
                'section'     => 'single_page'
            ),
            array(
                'id'          => 'holywood_ninetheme_blogpostsharebghovercolor',
                'label'       => esc_html__( 'Post share icon background hover color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'condition'   => 'holywood_single_allshare_display:is(on)',
                'section'     => 'single_page'
            ),
            array(
                'id'          => 'holywood_ninetheme_blogpostsharefontcolor',
                'label'       => esc_html__( 'Post share icon font color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'condition'   => 'holywood_single_allshare_display:is(on)',
                'section'     => 'single_page'
            ),
            array(
                'id'          => 'holywood_ninetheme_blogpostsharefonthovercolor',
                'label'       => esc_html__( 'Post share icon font hover color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'condition'   => 'holywood_single_allshare_display:is(on)',
                'section'     => 'single_page'
            ),

            // SIDEBAR COLOR
            array(
                'id'          => 'ninetheme_ard_widget_bg_color',
                'label'       => esc_html__( 'Theme sidebar background color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'section'     => 'sidebaroptions'
            ),
            array(
                'id'          => 'ninetheme_ard_widget_border_color',
                'label'       => esc_html__( 'Theme sidebar border color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'section'     => 'sidebaroptions'
            ),
            array(
                'id'          => 'ninetheme_ard_widget_heading_color',
                'label'       => esc_html__( 'Theme sidebar widget heading color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'section'     => 'sidebaroptions'
            ),
            array(
                'id'          => 'ninetheme_ard_widget_h_border_color',
                'label'       => esc_html__( 'Theme sidebar widget heading left border color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'section'     => 'sidebaroptions'
            ),
            array(
                'id'          => 'ninetheme_ard_widget_link_color',
                'label'       => esc_html__( 'Theme sidebar widget link color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'section'     => 'sidebaroptions'
            ),
            array(
                'id'          => 'ninetheme_ard_widget_link_hover_color',
                'label'       => esc_html__( 'Theme sidebar widget link hover color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'section'     => 'sidebaroptions'
            ),
            array(
                'id'          => 'ninetheme_ard_widget_search_bg_color',
                'label'       => esc_html__( 'Theme sidebar search widget input background color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'section'     => 'sidebaroptions'
            ),
            array(
                'id'          => 'ninetheme_ard_w_search_b_bg_color',
                'label'       => esc_html__( 'Theme sidebar search widget button background color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'section'     => 'sidebaroptions'
            ),
            array(
                'id'          => 'ninetheme_ard_widget_border_size',
                'label'       => esc_html__( 'Theme sidebar border size ', 'holywood' ),
                'desc'        => esc_html__( 'Please select size', 'holywood' ),
                'std'         => '',
                'type'        => 'numeric-slider',
                'min_max_step'=> '0,600',
                'section'     => 'sidebaroptions',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'ninetheme_ard_widget_h_margin',
                'label'       => esc_html__( 'Widget title margin', 'holywood'  ),
                'desc'        => esc_html__( 'Enter widget title margin here.', 'holywood'  ),
                'std'         => '10px',
                'type'        => 'text',
                'section'     => 'sidebaroptions'
            ),
            array(
                'id'          => 'ninetheme_ard_widget_padding',
                'label'       => esc_html__( 'Widget title padding', 'holywood'  ),
                'desc'        => esc_html__( 'Enter widget title margin padding.', 'holywood'  ),
                'std'         => '10px',
                'type'        => 'text',
                'section'     => 'sidebaroptions'
            ),

            // COPYRIGHT SETTINGS
            array(
                'id'          => 'footer_template_type',
                'label'       => esc_html__( 'Footer template type?', 'holywood' ),
                'desc'        => esc_html__( 'Select footer template type' , 'holywood' ),
                'std'         => 'default',
                'type'        => 'select',
                'section'     => 'copyright',
                'operator'    => 'and',
                'choices'     => array(
                    array(
                        'value'  => 'default',
                        'label'  => esc_html__( 'default theme footer', 'holywood' )
                    ),
                    array(
                        'value'  => 'vc-templates',
                        'label'  => esc_html__( 'WPBackery Saved Template', 'holywood' )
                    ),
                )
            ),
            array(
                'id'          => 'footer_template',
                'label'       => esc_html__( 'Select template', 'holywood' ),
                'desc'        => esc_html__( 'Select your template' , 'holywood' ),
                'std'         => '',
                'type'        => 'radio',
                'section'     => 'copyright',
                'operator'    => 'and',
                'condition'   => 'footer_template_type:is(vc-templates)',
                'choices'     => holywood_vc_saved_template_list()
            ),
            array(
                'id'          => 'widgetizefooter',
                'label'       => esc_html__( 'Widgetize footer section', 'holywood' ),
                'desc'        => sprintf( esc_html__( 'Please choose footer widgetize section %s or %s.', 'holywood' ), '<code>on</code>', '<code>off</code>' ),
                'std'         => 'off',
                'type'        => 'on-off',
                'section'     => 'copyright',
                'operator'    => 'and',
                'condition'   => 'footer_template_type:is(default)',
            ),
            array(
                'id'          => 'powered',
                'label'       => esc_html__( 'Footer powered section', 'holywood' ),
                'desc'        => sprintf( esc_html__( 'Please choose footer powered section %s or %s.', 'holywood' ), '<code>on</code>', '<code>off</code>' ),
                'std'         => 'off',
                'type'        => 'on-off',
                'section'     => 'copyright',
                'operator'    => 'and',
                'condition'   => 'footer_template_type:is(default)',
            ),
            array(
                'id'          => 'contact',
                'label'       => esc_html__( 'Footer contact section', 'holywood' ),
                'desc'        => sprintf( esc_html__( 'Please choose footer contact section %s or %s.', 'holywood' ), '<code>on</code>', '<code>off</code>' ),
                'std'         => 'off',
                'type'        => 'on-off',
                'section'     => 'copyright',
                'operator'    => 'and',
                'condition'   => 'footer_template_type:is(default)',
            ),
            array(
                'id'          => 'footer_adress_column',
                'label'       => esc_html__( 'Footer adress column?', 'holywood' ),
                'std'         => '',
                'type'        => 'select',
                'section'     => 'copyright',
                'operator'    => 'and',
                'condition'   => 'footer_template_type:is(default)',
                'choices'     => array(
                    array(
                        'value'  => '',
                        'label'  => esc_html__( 'default', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-1',
                        'label'  => esc_html__( 'col-sm-1', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-2',
                        'label'  => esc_html__( 'col-sm-2', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-3',
                        'label'  => esc_html__( 'col-sm-3', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-4',
                        'label'  => esc_html__( 'col-sm-4', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-5',
                        'label'  => esc_html__( 'col-sm-5', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-6',
                        'label'  => esc_html__( 'col-sm-6', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-7',
                        'label'  => esc_html__( 'col-sm-7', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-8',
                        'label'  => esc_html__( 'col-sm-8', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-9',
                        'label'  => esc_html__( 'col-sm-9', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-10',
                        'label'  => esc_html__( 'col-sm-10', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-11',
                        'label'  => esc_html__( 'col-sm-11', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-12',
                        'label'  => esc_html__( 'col-sm-12', 'holywood' )
                    ),
                )
            ),
            array(
                'id'          => 'location_title',
                'label'       => esc_html__( 'Footer adress title', 'holywood' ),
                'desc'        => esc_html__( 'Footer adress title', 'holywood' ),
                'std'         => '',
                'type'        => 'text',
                'section'     => 'copyright',
                'condition'   => 'footer_template_type:is(default)',
            ),
            array(
                'id'          => 'adress',
                'label'       => esc_html__( 'Footer adress', 'holywood' ),
                'desc'        => esc_html__( 'Footer adress', 'holywood' ),
                'std'         => '1256 Philadelphia Avenue',
                'type'        => 'text',
                'section'     => 'copyright',
                'condition'   => 'footer_template_type:is(default)',
            ),
            array(
                'id'          => 'adress2',
                'label'       => esc_html__( 'Footer adress 2.lines', 'holywood' ),
                'desc'        => esc_html__( 'Footer adress 2.lines', 'holywood' ),
                'std'         => 'Boston, MA, USA',
                'type'        => 'text',
                'section'     => 'copyright',
                'condition'   => 'footer_template_type:is(default)',
            ),
            array(
                'id'          => 'footer_contact_column',
                'label'       => esc_html__( 'Footer contact column?', 'holywood' ),
                'std'         => '',
                'type'        => 'select',
                'section'     => 'copyright',
                'operator'    => 'and',
                'condition'   => 'footer_template_type:is(default)',
                'choices'     => array(
                    array(
                        'value'  => '',
                        'label'  => esc_html__( 'default', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-1',
                        'label'  => esc_html__( 'col-sm-1', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-2',
                        'label'  => esc_html__( 'col-sm-2', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-3',
                        'label'  => esc_html__( 'col-sm-3', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-4',
                        'label'  => esc_html__( 'col-sm-4', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-5',
                        'label'  => esc_html__( 'col-sm-5', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-6',
                        'label'  => esc_html__( 'col-sm-6', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-7',
                        'label'  => esc_html__( 'col-sm-7', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-8',
                        'label'  => esc_html__( 'col-sm-8', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-9',
                        'label'  => esc_html__( 'col-sm-9', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-10',
                        'label'  => esc_html__( 'col-sm-10', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-11',
                        'label'  => esc_html__( 'col-sm-11', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-12',
                        'label'  => esc_html__( 'col-sm-12', 'holywood' )
                    ),
                )
            ),
            array(
                'id'          => 'contact_title',
                'label'       => esc_html__( 'Footer mail title', 'holywood' ),
                'desc'        => esc_html__( 'Footer mail title', 'holywood' ),
                'std'         => '',
                'type'        => 'text',
                'section'     => 'copyright',
                'condition'   => 'footer_template_type:is(default)',
            ),
            array(
                'id'          => 'mail',
                'label'       => esc_html__( 'Footer mail', 'holywood' ),
                'desc'        => esc_html__( 'Footer mail', 'holywood' ),
                'std'         => 'example@mail.com',
                'type'        => 'text',
                'section'     => 'copyright',
                'condition'   => 'footer_template_type:is(default)',
            ),
            array(
                'id'          => 'phone',
                'label'       => esc_html__( 'Footer phone', 'holywood' ),
                'desc'        => esc_html__( 'Footer phone', 'holywood' ),
                'std'         => '0545 5878 87',
                'type'        => 'text',
                'section'     => 'copyright',
                'condition'   => 'footer_template_type:is(default)',
            ),
            array(
                'id'          => 'footer_desc_column',
                'label'       => esc_html__( 'Footer description column?', 'holywood' ),
                'std'         => '',
                'type'        => 'select',
                'section'     => 'copyright',
                'operator'    => 'and',
                'condition'   => 'footer_template_type:is(default)',
                'choices'     => array(
                    array(
                        'value'  => '',
                        'label'  => esc_html__( 'default', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-1',
                        'label'  => esc_html__( 'col-sm-1', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-2',
                        'label'  => esc_html__( 'col-sm-2', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-3',
                        'label'  => esc_html__( 'col-sm-3', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-4',
                        'label'  => esc_html__( 'col-sm-4', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-5',
                        'label'  => esc_html__( 'col-sm-5', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-6',
                        'label'  => esc_html__( 'col-sm-6', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-7',
                        'label'  => esc_html__( 'col-sm-7', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-8',
                        'label'  => esc_html__( 'col-sm-8', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-9',
                        'label'  => esc_html__( 'col-sm-9', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-10',
                        'label'  => esc_html__( 'col-sm-10', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-11',
                        'label'  => esc_html__( 'col-sm-11', 'holywood' )
                    ),
                    array(
                        'value'  => 'col-sm-12',
                        'label'  => esc_html__( 'col-sm-12', 'holywood' )
                    ),
                )
            ),
            array(
                'id'          => 'desc_title',
                'label'       => esc_html__( 'Footer description title', 'holywood' ),
                'desc'        => esc_html__( 'Footer description title', 'holywood' ),
                'std'         => '',
                'type'        => 'text',
                'section'     => 'copyright',
                'condition'   => 'footer_template_type:is(default)',
            ),
            array(
                'id'          => 'desc',
                'label'       => esc_html__( 'Footer description column', 'holywood' ),
                'desc'        => esc_html__( 'Footer description column', 'holywood' ),
                'std'         => 'We had love to hear about your project. Please get in touch with us.',
                'type'        => 'textarea',
                'section'     => 'copyright',
                'condition'   => 'footer_template_type:is(default)',
            ),
            array(
                'id'          => 'footerpowered',
                'label'       => esc_html__( 'Footer About', 'holywood' ),
                'desc'        => esc_html__( 'Footer About', 'holywood' ),
                'std'         => 'Launch beautiful, responsive websites faster with themes',
                'type'        => 'text',
                'section'     => 'copyright',
                'condition'   => 'footer_template_type:is(default)',
            ),

            // FOOTER COLORS SETTINGS
            array(
                'id'          => 'holywood_footer_copyrights_bg',
                'label'       => esc_html__( 'Copyright section background color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'section'     => 'footer_colors',
                'condition'   => 'footer_template_type:is(default)',
            ),
            array(
                'id'          => 'holywood_footer_copyrights_color',
                'label'       => esc_html__( 'Copyright section text color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'section'     => 'footer_colors',
                'condition'   => 'footer_template_type:is(default)',
            ),
            array(
                'id'          => 'holywood_footer_social_bg',
                'label'       => esc_html__( 'Copyright section social icon background color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'section'     => 'footer_colors',
                'condition'   => 'footer_template_type:is(default)',
            ),
            array(
                'id'          => 'holywood_footer_social_color',
                'label'       => esc_html__( 'Copyright section social icon text color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'section'     => 'footer_colors',
                'condition'   => 'footer_template_type:is(default)',
            ),

            // FOOTER LINKS SETTINGS
            array(
                'id'          => 'holywood_footer_link_area',
                'label'       => esc_html__( 'Footer Links Section', 'holywood' ),
                'desc'        => sprintf( esc_html__( 'Please choose footer links section %s or %s.', 'holywood' ), '<code>on</code>', '<code>off</code>' ),
                'std'         => 'off',
                'type'        => 'on-off',
                'section'     => 'footer_link',
                'operator'    => 'and',
                'condition'   => 'footer_template_type:is(default)',
            ),
            array(
                'id'          => 'holywood_section_align',
                'label'       => esc_html__( 'Section link align', 'holywood' ),
                'desc'        => esc_html__( 'Enter : center, left or right', 'holywood' ),
                'std'         => 'center',
                'section'     => 'footer_link',
                'type'        => 'text',
                'condition'   => 'footer_template_type:is(default)',
            ),
            array(
                'id'          => 'holywood_footer_links',
                'label'       => esc_html__( 'Footer Links', 'holywood' ),
                'desc'        => esc_html__( 'Footer link section. Target documentation : http://www.w3schools.com/tags/att_a_target.asp', 'holywood' ),
                'type'        => 'list-item',
                'section'     => 'footer_link',
                'condition'   => 'footer_template_type:is(default)',
                'settings'    => array(
                    array(
                        'id'          => 'holywood_link_text',
                        'label'       => esc_html__( 'Link text', 'holywood' ),
                        'desc'        => esc_html__( 'Enter link text', 'holywood' ),
                        'type'        => 'text'
                    ),
                    array(
                        'id'          => 'holywood_link_url',
                        'label'       => esc_html__( 'Link', 'holywood' ),
                        'desc'        => esc_html__( 'Enter link', 'holywood' ),
                        'type'        => 'text'
                    ),
                    array(
                        'id'          => 'holywood_link_target',
                        'label'       => esc_html__( 'Target', 'holywood' ),
                        'desc'        => esc_html__( 'Enter target name.', 'holywood' ),
                        'type'        => 'text'
                    )
                )
            ),
            array(
                'id'          => 'holywood_footer_links_bg',
                'label'       => esc_html__( 'Links section background color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'section'     => 'footer_link',
                'condition'   => 'footer_template_type:is(default)',
            ),
            array(
                'id'          => 'holywood_footer_links_color',
                'label'       => esc_html__( 'Links section links color', 'holywood' ),
                'desc'        => esc_html__( 'Please select color', 'holywood' ),
                'type'        => 'colorpicker',
                'section'     => 'footer_link',
                'condition'   => 'footer_template_type:is(default)',
            ),

            // FOOTER SOCIAL SETTINGS
            array(
                'id'          => 'social',
                'label'       => esc_html__( 'Footer social icons', 'holywood' ),
                'desc'        => esc_html__( 'Footer social icons', 'holywood' ),
                'type'        => 'list-item',
                'section'     => 'footer_social',
                'condition'   => 'footer_template_type:is(default)',
                'settings'    => array(
                    array(
                        'id'          => 'social_text',
                        'label'       => esc_html__( 'Social icon name', 'holywood' ),
                        'desc'        => esc_html__( 'Enter font awesome social icon name', 'holywood' ),
                        'type'        => 'text'
                    ),
                    array(
                        'id'          => 'social_link',
                        'label'       => esc_html__( 'Link', 'holywood' ),
                        'desc'        => esc_html__( 'Enter font awesome social share link', 'holywood' ),
                        'type'        => 'text'
                    )
                )
            ),

            // CUSTOM CSS SETTINGS
            array(
                'id'          => 'additionalcss',
                'label'       => esc_html__( 'Additional CSS', 'holywood' ),
                'desc'        => esc_html__( 'You can add additional css', 'holywood' ),
                'type'        => 'css',
                'section'     => 'addinotial_css'
            ),

            //end settings
        )
    );

    /* allow settings to be filtered before saving */
    $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );

    /* settings are not the same update the DB */
    if ( $saved_settings !== $custom_settings ) {
        update_option( ot_settings_id(), $custom_settings );
    }

    /* Lets OptionTree know the UI Builder is being overridden */
    global $ot_has_custom_theme_options;
    $ot_has_custom_theme_options = true;

}
