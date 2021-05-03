<?php
add_filter( 'rwmb_meta_boxes', 'beard_ninetheme_register_page_meta_boxes' );
function beard_ninetheme_register_page_meta_boxes( $meta_boxes ) {
    $prefix = 'holywood_';
    /* ----------------------------------------------------- */
    // Frontpage Settings
    /* ----------------------------------------------------- */
    $meta_boxes[] = array(
        'id' => 'portfoliosettings',
        'title' => esc_html__( 'Page Settings', 'holywood' ),
        'pages' => array( 'page' ),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => esc_html__( 'Page menu visibility', 'holywood' ),
                'id' => $prefix . "menuvisibility",
                'type' => 'select',
                'options' => array(
                    'show' => esc_html__( 'visible', 'holywood' ),
                    'hidden' => esc_html__( 'hidden', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'show',
            ),
            array(
                'name' => esc_html__( 'Page menu type', 'holywood' ),
                'id' => $prefix . "menutype",
                'type' => 'select',
                'options' => array(
                    'metabox' => esc_html__( 'custom metabox menu', 'holywood' ),
                    'default' => esc_html__( 'default', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'metabox',
            ),
            array(
                'name' => esc_html__( 'Page header menu button color', 'holywood' ),
                'id' => $prefix . "menubutton",
                'clone' => false,
                'type' => 'color',
                'std' => ''
            ),
            array(
                'name' => esc_html__( 'Page header menu button hover color', 'holywood' ),
                'id' => $prefix . "menubuttonhover",
                'clone' => false,
                'type' => 'color',
                'std' => ''
            ),
        )
    );
    /* ----------------------------------------------------- */
    // PAGE HERO BACKGROUND SETTINGS
    /* ----------------------------------------------------- */
    $meta_boxes[] = array(
        'id' => 'pageherosettings',
        'title' => esc_html__( 'Page Hero Settings ( for Default Template )', 'holywood' ),
        'pages' => array( 'page' ),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'id' => $prefix . "page_hero_visibility",
                'name' => esc_html__( 'Hero Show / Hide', 'holywood' ),
                'type' => 'checkbox',
                'std' => 1,
            ),
            array( 'type' => 'divider'),
            array(
                'name' => esc_html__( 'Hero Minumum Height ( vh )', 'holywood' ),
                'id' => $prefix . "page_hero_minh",
                'type' => 'number',
                'min' => 0,
                'max' => 2000,
                'step' => 1,
            ),
            array(
                'name' => esc_html__( 'Hero Minumum Height ( 768px )', 'holywood' ),
                'id' => $prefix . "page_hero_smminh",
                'type' => 'number',
                'min' => 0,
                'max' => 2000,
                'step' => 1,
            ),
            array(
                'name' => esc_html__( 'Hero Minumum Height ( 480px )', 'holywood' ),
                'id' => $prefix . "page_hero_xsminh",
                'type' => 'number',
                'min' => 0,
                'max' => 2000,
                'step' => 1,
            ),
            array( 'type' => 'divider'),
            array(
                'name' => esc_html__( 'Hero Background Image', 'holywood' ),
                'id' => $prefix . "page_hero_background",
                'type' => 'background',
            ),
            array(
                'name' => esc_html__( 'Hero Background Image Overlay Color', 'holywood' ),
                'id' => $prefix . "page_hero_mask_color",
                'type' => 'color',
            ),
            array(
                'name' => esc_html__( 'Overlay Color Opacity', 'holywood' ),
                'id' => $prefix . "page_hero_mask_opacity",
                'type' => 'number',
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
            ),
            array( 'type' => 'divider'),
            array(
                'name' => esc_html__( 'Hero Padding Top ( px )', 'holywood' ),
                'id' => $prefix . "page_hero_p_top",
                'type' => 'number',
                'min' => 0,
                'step' => 1,
            ),
            array(
                'name' => esc_html__( 'Hero Padding Bottom ( px )', 'holywood' ),
                'id' => $prefix . "page_hero_p_bottom",
                'type' => 'number',
                'min' => 0,
                'step' => 1,
            ),
            array( 'type' => 'divider'),
            array(
                'name' => esc_html__( 'Disable Page Title', 'holywood' ),
                'id' => $prefix . "disable_title",
                'type' => 'checkbox',
                'std' => 0,
            ),
            array(
                'name' => esc_html__( 'Alternate Page Title', 'holywood' ),
                'id' => $prefix . "alt_title",
                'clone' => false,
                'type' => 'text',
                'std' => ''
            ),
            array(
                'name' => esc_html__( 'Page Title Color', 'holywood' ),
                'id' => $prefix . "page_hero_title_color",
                'type' => 'color',
            ),
            array(
                'name' => esc_html__( 'Page Title Font Size ( px )', 'holywood' ),
                'id' => $prefix . "page_hero_title_fs",
                'type' => 'number',
                'min' => 0,
                'step' => 1,
            ),
            array(
                'name' => esc_html__( 'Page Title Font Size ( 768px )', 'holywood' ),
                'id' => $prefix . "page_hero_title_smfs",
                'type' => 'number',
                'min' => 0,
                'step' => 1,
            ),
            array(
                'name' => esc_html__( 'Page Title Font Size ( 480px )', 'holywood' ),
                'id' => $prefix . "page_hero_title_xsfs",
                'type' => 'number',
                'min' => 0,
                'step' => 1,
            ),
            array(
                'name' => esc_html__( 'Page Title Margin Bottom ( px )', 'holywood' ),
                'id' => $prefix . "page_hero_title_mb",
                'type' => 'number',
                'min' => 0,
                'step' => 1,
            ),
            array(
                'name' => esc_html__( 'Page Subtitle / Description', 'holywood' ),
                'id' => $prefix . "subtitle",
                'clone' => false,
                'type' => 'textarea',
                'std' => ''
            ),
            array(
                'name' => esc_html__( 'Page Subtitle Color', 'holywood' ),
                'id' => $prefix . "page_hero_subtitle_color",
                'type' => 'color'
            ),
            array( 'type' => 'divider'),
            array(
                'name' => esc_html__( 'Hero Content Column Width', 'holywood' ),
                'desc' => esc_html__( 'Default column width: 8', 'holywood' ),
                'id' => $prefix . "page_hero_content_column",
                'type' => 'number',
                'min' => 1,
                'max' => 12,
                'std' => 8,
                'step' => 1,
            ),
            array(
                'name' => esc_html__( 'Hero Content Vertical Position', 'holywood' ),
                'id' => $prefix . "page_hero_vertical",
                'type' => 'select',
                'options' => array(
                    'flex-start' => esc_html__( 'Top', 'holywood' ),
                    'center' => esc_html__( 'Center', 'holywood' ),
                    'flex-end' => esc_html__( 'Bottom', 'holywood' ),
                ),
                'multiple' => false,
                'std' => '',
                'placeholder' => esc_html__( 'Select an option', 'holywood' ),
            ),
            array(
                'name' => esc_html__( 'Hero Content Horizontal Position', 'holywood' ),
                'id' => $prefix . "page_hero_horizontal",
                'type' => 'select',
                'options' => array(
                    'left' => esc_html__( 'Left', 'holywood' ),
                    'center' => esc_html__( 'Center', 'holywood' ),
                    'right' => esc_html__( 'Right', 'holywood' ),
                ),
                'multiple' => false,
                'std' => '',
                'placeholder' => esc_html__( 'Select an option', 'holywood' ),
            ),
            array( 'type' => 'divider'),
            array(
                'id' => $prefix . "page_hero_logo_visibility",
                'name' => esc_html__( 'Hero Logo Show / Hide', 'holywood' ),
                'type' => 'checkbox',
                'std' => 1,
            ),
            array( 'type' => 'divider'),
            array(
                'id' => $prefix . "page_bread_visibility",
                'name' => esc_html__( 'Hero Breadcrumbs Show / Hide?', 'holywood' ),
                'type' => 'checkbox',
                'std' => 1,
            ),
        )
    );
    /* ----------------------------------------------------- */
    $meta_boxes[] = array(
        'id' => 'pagesidebarsettings',
        'title' => esc_html__( 'Page Content ( for Default Template )', 'holywood' ),
        'pages' => array( 'page' ),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => esc_html__( 'Page Layout ( Sidebar )', 'holywood' ),
                'id' => $prefix . "pagelayout",
                'type' => 'select',
                'options' => array(
                    'left-sidebar' => esc_html__( 'left', 'holywood' ),
                    'right-sidebar' => esc_html__( 'right', 'holywood' ),
                    'full-width' => esc_html__( 'full', 'holywood' ),
                ),
                'multiple' => false,
                'std' => '',
                'placeholder' => esc_html__( 'Select an option', 'holywood' ),
            ),
            array( 'type' => 'divider'),
            array(
                'name' => esc_html__( 'Page Content Container Type', 'holywood' ),
                'id' => $prefix . "pagecontainer",
                'type' => 'select',
                'options' => array(
                    'container' => esc_html__( 'container', 'holywood' ),
                    'container-fluid' => esc_html__( 'container-fluid', 'holywood' ),
                    'container-off' => esc_html__( 'container-off', 'holywood' ),
                ),
                'multiple' => false,
                'std' => '',
                'placeholder' => esc_html__( 'Select an option', 'holywood' ),
            ),
            array( 'type' => 'divider'),
            array(
                'name' => esc_html__( 'Page Content Padding Top ( px )', 'holywood' ),
                'id' => $prefix . "page_content_pt",
                'type' => 'number',
                'min' => 0,
                'step' => 1,
            ),
            array(
                'name' => esc_html__( 'Page Content Padding Bottom ( px )', 'holywood' ),
                'id' => $prefix . "page_content_pb",
                'type' => 'number',
                'min' => 0,
                'step' => 1,
            ),
            array( 'type' => 'divider'),
            array(
                'name' => esc_html__( 'Page Content Background Color', 'holywood' ),
                'id' => $prefix . "page_content_bgclr",
                'type' => 'color'
            ),
        )
    );
    $meta_boxes[] = array(
        'id' => 'eventssettings',
        'title' => 'Price table',
        'pages' => array( 'price' ),
        'context' => 'normal',
        'priority' => 'high',
        // List of meta fields
        'fields' => array(
            array(
                'name' => 'Price table name',
                'id' => $prefix . "table_name",
                'clone' => false,
                'type' => 'text',
                'std' => 'Free'
            ),
            array(
                'name' => 'Price table slogan',
                'id' => $prefix . "table_slogan",
                'clone' => false,
                'type' => 'text',
                'std' => 'Simpliest plan available'
            ),
            array(
                'name' => 'Table name price',
                'id' => $prefix . "table_price",
                'clone' => false,
                'type' => 'text',
                'std' => '$25'
            ),
            array(
                'name' => 'Table name price time',
                'id' => $prefix . "table_time",
                'clone' => false,
                'type' => 'text',
                'std' => 'month'
            ),
            array(
                'name' => 'Table Features List',
                'desc' => 'Format: 140GB or any text',
                'id' => $prefix . 'features_list',
                'type' => 'text',
                'std' => 'Lorem ipsum dolor sit',
                'class' => 'custom-class',
                'clone' => true,
                'clone-group' => 'my-clone-group','clone-group' => 'my-clone-group',
            ),
            array(
                'name' => 'Table name buy now button link',
                'id' => $prefix . "table_link",
                'clone' => false,
                'type' => 'text',
                'std' => '#'
            ),
            array(
                'name' => 'Table name buy now button link text',
                'id' => $prefix . "table_link_text",
                'clone' => false,
                'type' => 'text',
                'std' => 'Purchase Now'
            ),
            array(
                'name' => 'Table animation delay',
                'id' => $prefix . "table_anime",
                'clone' => false,
                'type' => 'text',
                'std' => '0.3s'
            ),
            array(
                'name' => 'Best value text',
                'id' => $prefix . "best_value",
                'clone' => false,
                'type' => 'text',
                'std' => 'best value'
            ),
            array(
                'name' => 'Is this the best price? Yes / No',
                'id' => $prefix . "best",
                'type' => 'select',
                'options'	=> array(
                    'select' => 'Select a Section',
                    'yes' => 'Yes',
                    'no' => 'No'
                ),
                'multiple'	=> false,
                'std' => 'Select Custom Section'
            ),
            array(
                'name' => 'Bootstrap offset. To leave space to the left.',
                'id' => $prefix . "offset",
                'type' => 'select',
                'options'	=> array(
                    'select' => 'Select a Section',
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    '10' => '10',
                    '11' => '11',
                    '12' => '12'
                ),
                'multiple'	=> false,
                'std' => 'Select Custom Section'
            ),
        )
    );
    $meta_boxes[] = array(
        'title' => esc_html__( 'Member Social Box', 'holywood' ),
        'pages' => array( 'team' ),
        'clone-group' => 'my-clone-group','clone-group' => 'my-clone-group',
        'id' => 'mm_review',
        'fields' => array(
            array(
                'name' => 'Social Icon Name',
                'desc' => 'Format: facebook',
                'id' => $prefix . 'social_icon',
                'type' => 'text',
                'std' => 'facebook',
                'class' => 'custom-class',
                'clone' => true,
                'clone-group' => 'my-clone-group','clone-group' => 'my-clone-group',
            ),
            array(
                'name' => 'Social Url',
                'desc' => 'Format: http://facebook.com',
                'id' => $prefix . 'social_url',
                'type' => 'text',
                'std' => '#',
                'class' => 'custom-class',
                // Text labels displayed before and after value
                'clone' => true,
                'clone-group' => 'my-clone-group',
            ),
        ),
    );
    $meta_boxes[] = array(
        'title' => esc_html__( 'Holywood onepage menu', 'holywood' ),
        'pages' => array( 'page' ),
        'clone-group' => 'my-clone-group','clone-group' => 'my-clone-group',
        'id' => 'page_menu',
        'context' => 'side',
        'priority' => 'low',
        'fields' => array(
            array(
                'name' => 'Menu item name',
                'desc' => 'Format: Any text',
                'id' => $prefix . 'section_name',
                'type' => 'text',
                'std' => 'Menu item name',
                'class' => 'custom-class',
                'clone' => true,
                'clone-group' => 'my-clone-group','clone-group' => 'my-clone-group',
            ),
            array(
                'name' => 'Menu item Url',
                'desc' => 'Format: #sectionname or http://yoururl.com',
                'id' => $prefix . 'section_url',
                'type' => 'text',
                'std' => '#sectionname',
                'class' => 'custom-class',
                // Text labels displayed before and after value
                'clone' => true,
                'clone-group' => 'my-clone-group',
            ),
        ),
    );
    /*-----------------------------------------------------------------------------------*/
    /*  Metaboxes for blog posts
    /*-----------------------------------------------------------------------------------*/
    /* Gallery Post Format ------------*/
    $meta_boxes[] = array(
        'title' => esc_html__('Gallery Settings', 'holywood'),
        'pages' => array('post'),
        'fields' => array(
            array(
                'name' => esc_html__('Gallery Style', 'holywood'),
                'desc' => esc_html__('Select the gallery style.', 'holywood'),
                'id' => $prefix . 'gallery_style',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Slider', 'holywood' ),
                    'value2' => esc_html__( 'Grid', 'holywood' ),
                ),
                'std' => 'value1'
            ),
            array(
                'name' => esc_html__('Select Images', 'holywood'),
                'desc' => esc_html__('Select the images from the media library or upload your new ones.', 'holywood'),
                'id' => $prefix . 'gallery_image',
                'type' => 'image_advanced',
            ),
            array(
                'name' => esc_html__('Show Meta Information', 'holywood'),
                'desc' => esc_html__('Check this to show metadata.', 'holywood'),
                'id' => $prefix . 'show_gallery_meta',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'value1'
            ),
            array(
                'name' => esc_html__('Show Social Icons', 'holywood'),
                'desc' => esc_html__('Check this to show Social Icons.', 'holywood'),
                'id' => $prefix . 'show_gallery_social_icons',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Post content', 'holywood'),
                'desc' => esc_html__('Check this to show post content.', 'holywood'),
                'id' => $prefix . 'post_content',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Post content heading', 'holywood'),
                'desc' => esc_html__('Check this to show post content heading.', 'holywood'),
                'id' => $prefix . 'post_content_heading',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            )
        )
    );
    /* Quote Post Format ------------*/
    $meta_boxes[] = array(
        'title' => esc_html__('Quote Settings', 'holywood'),
        'pages' => array('post'),
        'fields' => array(
            array(
                'name' => esc_html__('The Quote', 'holywood'),
                'desc' => esc_html__('Write your quote in this field.', 'holywood'),
                'id' => $prefix . 'quote_text',
                'type' => 'textarea',
                'rows' => 5
            ),
            array(
                'name' => esc_html__('The Author', 'holywood'),
                'desc' => esc_html__('Enter the name of the author of this quote.', 'holywood'),
                'id' => $prefix . 'quote_author',
                'type' => 'text'
            ),
            array(
                'name' => esc_html__('Background Color', 'holywood'),
                'desc' => esc_html__('Choose the background color for this quote.', 'holywood'),
                'id' => $prefix . 'quote_bg',
                'type' => 'color'
            ),
            array(
                'name' => esc_html__('Background Opacity', 'holywood'),
                'desc' => esc_html__('Choose the opacity of the background color.', 'holywood'),
                'id' => $prefix . 'quote_bg_opacity',
                'type' => 'text',
                'std' => 80
            ),
            array(
                'name' => esc_html__('Divider', 'holywood'),
                'desc' => esc_html__('Divider.', 'holywood'),
                'id' => $prefix . 'quote_divider',
                'type' => 'divider'
            ),
            array(
                'name' => esc_html__('Show Meta Information', 'holywood'),
                'desc' => esc_html__('Check this to show metadata.', 'holywood'),
                'id' => $prefix . 'show_quote_meta',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Show Social Icons', 'holywood'),
                'desc' => esc_html__('Check this to show Social Icons.', 'holywood'),
                'id' => $prefix . 'show_quote_social_icons',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Post content', 'holywood'),
                'desc' => esc_html__('Check this to show post content.', 'holywood'),
                'id' => $prefix . 'post_content',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Post content heading', 'holywood'),
                'desc' => esc_html__('Check this to show post content heading.', 'holywood'),
                'id' => $prefix . 'post_content_heading',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            )
        )
    );
    /* Link Post Format ------------*/
    $meta_boxes[] = array(
        'title' => esc_html__('Link Settings', 'holywood'),
        'pages' => array('post'),
        'fields' => array(
            array(
                'name' => esc_html__('The URL', 'holywood'),
                'desc' => esc_html__('Insert the URL you wish to link to.', 'holywood'),
                'id' => $prefix . 'the_link',
                'type' => 'textarea',
            ),
            array(
                'name' => esc_html__('Background Color', 'holywood'),
                'desc' => esc_html__('Choose the background color for this link.', 'holywood'),
                'id' => $prefix . 'link_bg',
                'type' => 'color',
                'std' => '#d5d85f'
            ),
            array(
                'name' => esc_html__('Background Opacity', 'holywood'),
                'desc' => esc_html__('Choose the opacity of the background color.', 'holywood'),
                'id' => $prefix . 'link_bg_opacity',
                'type' => 'text',
                'std' => 80
            ),
            array(
                'name' => esc_html__('Divider', 'holywood'),
                'desc' => esc_html__('Divider.', 'holywood'),
                'id' => $prefix . 'link_divider',
                'type' => 'divider'
            ),
            array(
                'name' => esc_html__('Show Meta Information', 'holywood'),
                'desc' => esc_html__('Check this to show metadata.', 'holywood'),
                'id' => $prefix . 'show_link_meta',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Show Social Icons', 'holywood'),
                'desc' => esc_html__('Check this to show Social Icons.', 'holywood'),
                'id' => $prefix . 'show_link_social_icons',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Post content', 'holywood'),
                'desc' => esc_html__('Check this to show post content.', 'holywood'),
                'id' => $prefix . 'post_content',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Post content heading', 'holywood'),
                'desc' => esc_html__('Check this to show post content heading.', 'holywood'),
                'id' => $prefix . 'post_content_heading',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            )
        )
    );
    /* Image Post Format ------------*/
    $meta_boxes[] = array(
        'title' => esc_html__('Image Settings', 'holywood'),
        'pages' => array('post'),
        'fields' => array(
            array(
                'name' => esc_html__('Enable Lightbox', 'holywood'),
                'desc' => esc_html__('Check this to enable the lightbox.', 'holywood'),
                'id' => $prefix . 'enable_lightbox',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Enter URL', 'holywood'),
                'desc' => esc_html__('Insert the url for the image.', 'holywood'),
                'id' => $prefix . 'the_image_url',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Show Meta Information', 'holywood'),
                'desc' => esc_html__('Check this to show metadata.', 'holywood'),
                'id' => $prefix . 'show_image_meta',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Show Social Icons', 'holywood'),
                'desc' => esc_html__('Check this to show Social Icons.', 'holywood'),
                'id' => $prefix . 'show_image_social_icons',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Post content', 'holywood'),
                'desc' => esc_html__('Check this to show post content.', 'holywood'),
                'id' => $prefix . 'post_content',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Post content heading', 'holywood'),
                'desc' => esc_html__('Check this to show post content heading.', 'holywood'),
                'id' => $prefix . 'post_content_heading',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            )
        )
    );
    /* Audio Post Format ------------*/
    $meta_boxes[] = array(
        'title' => esc_html__('Audio Settings', 'holywood'),
        'pages' => array('post'),
        'fields' => array(
            array(
                'type' => 'heading',
                'name' => esc_html__( 'These settings enable you to embed audio in your posts. Note that for audio, you must supply both MP3 and OGG files to satisfy all browsers. For poster you can select a featured image.', 'holywood' ),
                'id' => 'audio_head'
            ),
            array(
                'name' => esc_html__('MP3 File URL', 'holywood'),
                'desc' => esc_html__('The URL to the .mp3 audio file.', 'holywood'),
                'id' => $prefix . 'audio_mp3',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('OGA File URL', 'holywood'),
                'desc' => esc_html__('The URL to the .oga, .ogg audio file.', 'holywood'),
                'id' => $prefix . 'audio_ogg',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Divider', 'holywood'),
                'desc' => esc_html__('divider.', 'holywood'),
                'id' => $prefix . 'audio_divider',
                'type' => 'divider'
            ),
            array(
                'name' => esc_html__('SoundCloud', 'holywood'),
                'desc' => esc_html__('Enter the url of the soundcloud audio.', 'holywood'),
                'id' => $prefix . 'audio_sc',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Color', 'holywood'),
                'desc' => esc_html__('Choose the color.', 'holywood'),
                'id' => $prefix . 'audio_sc_color',
                'type' => 'color',
                'std' => '#ff7700'
            ),
            array(
                'name' => esc_html__('Divider', 'holywood'),
                'desc' => esc_html__('divider.', 'holywood'),
                'id' => $prefix . 'audio_divider',
                'type' => 'divider'
            ),
            array(
                'name' => esc_html__('Show Meta Information', 'holywood'),
                'desc' => esc_html__('Check this to show metadata.', 'holywood'),
                'id' => $prefix . 'show_audio_meta',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Show Social Icons', 'holywood'),
                'desc' => esc_html__('Check this to show Social Icons.', 'holywood'),
                'id' => $prefix . 'show_audio_social_icons',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Post content', 'holywood'),
                'desc' => esc_html__('Check this to show post content.', 'holywood'),
                'id' => $prefix . 'post_content',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Post content heading', 'holywood'),
                'desc' => esc_html__('Check this to show post content heading.', 'holywood'),
                'id' => $prefix . 'post_content_heading',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            )
        )
    );
    /* Status Post Format */
    $meta_boxes[] = array(
        'title' => esc_html__('Status Settings', 'holywood'),
        'pages' => array('post'),
        'fields' => array(
            array(
                'name' => esc_html__('Style', 'holywood'),
                'desc' => esc_html__('Select status style.', 'holywood'),
                'id' => $prefix . 'status_style',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Normal', 'holywood' ),
                    'value2' => esc_html__( 'Background', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Static'
            ),
            array(
                'name' => esc_html__('Background Color', 'holywood'),
                'desc' => esc_html__('Choose the background color for this status.', 'holywood'),
                'id' => $prefix . 'status_bg',
                'type' => 'color',
                'std' => '#d5d85f'
            ),
            array(
                'name' => esc_html__('Background Opacity', 'holywood'),
                'desc' => esc_html__('Choose the opacity of the background color.', 'holywood'),
                'id' => $prefix . 'status_bg_opacity',
                'type' => 'text',
                'std' => 80
            ),
            array(
                'name' => esc_html__('Show Social Icons', 'holywood'),
                'desc' => esc_html__('Check this to show Social Icons.', 'holywood'),
                'id' => $prefix . 'show_status_social_icons',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Post content', 'holywood'),
                'desc' => esc_html__('Check this to show post content.', 'holywood'),
                'id' => $prefix . 'post_content',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Post content heading', 'holywood'),
                'desc' => esc_html__('Check this to show post content heading.', 'holywood'),
                'id' => $prefix . 'post_content_heading',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            )
        )
    );
    /* Video Post Format ------------*/
    $meta_boxes[] = array(
        'title' => esc_html__('Video Settings', 'holywood'),
        'pages' => array('post'),
        'fields' => array(
            array(
                'type' => 'heading',
                'name' => esc_html__( 'These settings enable you to embed videos into your posts. Note that for video, you must supply an M4V file to satisfy both HTML5 and Flash solutions. The optional OGV format is used to increase x-browser support for HTML5 browsers such as Firefox and Opera. For the poster, you can select a featured image.', 'holywood' ),
                'id' => 'video_head'
            ),
            array(
                'name' => esc_html__('M4V File URL', 'holywood'),
                'desc' => esc_html__('The URL to the .m4v video file.', 'holywood'),
                'id' => $prefix . 'video_m4v',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('OGV File URL', 'holywood'),
                'desc' => esc_html__('The URL to the .ogv video file.', 'holywood'),
                'id' => $prefix . 'video_ogv',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('WEBM File URL', 'holywood'),
                'desc' => esc_html__('The URL to the .webm video file.', 'holywood'),
                'id' => $prefix . 'video_webm',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Embeded Code', 'holywood'),
                'desc' => esc_html__('Select the preview image for this video.', 'holywood'),
                'id' => $prefix . 'video_embed',
                'type' => 'textarea',
                'rows' => 8
            ),
            array(
                'name' => esc_html__('Divider', 'holywood'),
                'desc' => esc_html__('divider.', 'holywood'),
                'id' => $prefix . 'video_divider',
                'type' => 'divider'
            ),
            array(
                'name' => esc_html__('Show Meta Information', 'holywood'),
                'desc' => esc_html__('Check this to show metadata.', 'holywood'),
                'id' => $prefix . 'show_video_meta',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Show Social Icons', 'holywood'),
                'desc' => esc_html__('Check this to show Social Icons.', 'holywood'),
                'id' => $prefix . 'show_video_social_icons',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Post content', 'holywood'),
                'desc' => esc_html__('Check this to show post content.', 'holywood'),
                'id' => $prefix . 'post_content',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Post content heading', 'holywood'),
                'desc' => esc_html__('Check this to show post content heading.', 'holywood'),
                'id' => $prefix . 'post_content_heading',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            )
        )
    );
    /*-----------------------------------------------------------------------------------*/
    /*  Metaboxes for portfolio
    /*-----------------------------------------------------------------------------------*/
    /* Gallery Post Format ------------*/
    $meta_boxes[] = array(
        'title' => esc_html__('Gallery Settings', 'holywood'),
        'pages' => array('portfolio'),
        'fields' => array(
            array(
                'name' => esc_html__('Gallery Style', 'holywood'),
                'desc' => esc_html__('Select the gallery style.', 'holywood'),
                'id' => $prefix . 'gallery_style',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Slider', 'holywood' ),
                    'value2' => esc_html__( 'Grid', 'holywood' ),
                ),
                'std' => 'value1'
            ),
            array(
                'name' => esc_html__('Select Images', 'holywood'),
                'desc' => esc_html__('Select the images from the media library or upload your new ones.', 'holywood'),
                'id' => $prefix . 'gallery_image',
                'type' => 'image_advanced',
            ),
            array(
                'name' => esc_html__('Show Meta Information', 'holywood'),
                'desc' => esc_html__('Check this to show metadata.', 'holywood'),
                'id' => $prefix . 'show_gallery_meta',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'value1'
            ),
            array(
                'name' => esc_html__('Show Social Icons', 'holywood'),
                'desc' => esc_html__('Check this to show Social Icons.', 'holywood'),
                'id' => $prefix . 'show_gallery_social_icons',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Post content', 'holywood'),
                'desc' => esc_html__('Check this to show post content.', 'holywood'),
                'id' => $prefix . 'post_content',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Post content heading', 'holywood'),
                'desc' => esc_html__('Check this to show post content heading.', 'holywood'),
                'id' => $prefix . 'post_content_heading',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            )
        )
    );
    /* Audio Post Format ------------*/
    $meta_boxes[] = array(
        'title' => esc_html__('Audio Settings', 'holywood'),
        'pages' => array('portfolio'),
        'fields' => array(
            array(
                'type' => 'heading',
                'name' => esc_html__( 'These settings enable you to embed audio in your posts. Note that for audio, you must supply both MP3 and OGG files to satisfy all browsers. For poster you can select a featured image.', 'holywood' ),
                'id' => 'audio_head'
            ),
            array(
                'name' => esc_html__('MP3 File URL', 'holywood'),
                'desc' => esc_html__('The URL to the .mp3 audio file.', 'holywood'),
                'id' => $prefix . 'audio_mp3',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('OGA File URL', 'holywood'),
                'desc' => esc_html__('The URL to the .oga, .ogg audio file.', 'holywood'),
                'id' => $prefix . 'audio_ogg',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Divider', 'holywood'),
                'desc' => esc_html__('divider.', 'holywood'),
                'id' => $prefix . 'audio_divider',
                'type' => 'divider'
            ),
            array(
                'name' => esc_html__('SoundCloud', 'holywood'),
                'desc' => esc_html__('Enter the url of the soundcloud audio.', 'holywood'),
                'id' => $prefix . 'audio_sc',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Color', 'holywood'),
                'desc' => esc_html__('Choose the color.', 'holywood'),
                'id' => $prefix . 'audio_sc_color',
                'type' => 'color',
                'std' => '#ff7700'
            ),
            array(
                'name' => esc_html__('Divider', 'holywood'),
                'desc' => esc_html__('divider.', 'holywood'),
                'id' => $prefix . 'audio_divider',
                'type' => 'divider'
            ),
            array(
                'name' => esc_html__('Show Meta Information', 'holywood'),
                'desc' => esc_html__('Check this to show metadata.', 'holywood'),
                'id' => $prefix . 'show_audio_meta',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Show Social Icons', 'holywood'),
                'desc' => esc_html__('Check this to show Social Icons.', 'holywood'),
                'id' => $prefix . 'show_audio_social_icons',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Post content', 'holywood'),
                'desc' => esc_html__('Check this to show post content.', 'holywood'),
                'id' => $prefix . 'post_content',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Post content heading', 'holywood'),
                'desc' => esc_html__('Check this to show post content heading.', 'holywood'),
                'id' => $prefix . 'post_content_heading',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            )
        )
    );
    /* Video Post Format ------------*/
    $meta_boxes[] = array(
        'title' => esc_html__('Video Settings', 'holywood'),
        'pages' => array('portfolio'),
        'fields' => array(
            array(
                'type' => 'heading',
                'name' => esc_html__( 'These settings enable you to embed videos into your posts. Note that for video, you must supply an M4V file to satisfy both HTML5 and Flash solutions. The optional OGV format is used to increase x-browser support for HTML5 browsers such as Firefox and Opera. For the poster, you can select a featured image.', 'holywood' ),
                'id' => 'video_head'
            ),
            array(
                'name' => esc_html__('M4V File URL', 'holywood'),
                'desc' => esc_html__('The URL to the .m4v video file.', 'holywood'),
                'id' => $prefix . 'video_m4v',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('OGV File URL', 'holywood'),
                'desc' => esc_html__('The URL to the .ogv video file.', 'holywood'),
                'id' => $prefix . 'video_ogv',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('WEBM File URL', 'holywood'),
                'desc' => esc_html__('The URL to the .webm video file.', 'holywood'),
                'id' => $prefix . 'video_webm',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Embeded Code', 'holywood'),
                'desc' => esc_html__('Select the preview image for this video.', 'holywood'),
                'id' => $prefix . 'video_embed',
                'type' => 'textarea',
                'rows' => 8
            ),
            array(
                'name' => esc_html__('Divider', 'holywood'),
                'desc' => esc_html__('divider.', 'holywood'),
                'id' => $prefix . 'video_divider',
                'type' => 'divider'
            ),
            array(
                'name' => esc_html__('Show Meta Information', 'holywood'),
                'desc' => esc_html__('Check this to show metadata.', 'holywood'),
                'id' => $prefix . 'show_video_meta',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Show Social Icons', 'holywood'),
                'desc' => esc_html__('Check this to show Social Icons.', 'holywood'),
                'id' => $prefix . 'show_video_social_icons',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Post content', 'holywood'),
                'desc' => esc_html__('Check this to show post content.', 'holywood'),
                'id' => $prefix . 'post_content',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            ),
            array(
                'name' => esc_html__('Post content heading', 'holywood'),
                'desc' => esc_html__('Check this to show post content heading.', 'holywood'),
                'id' => $prefix . 'post_content_heading',
                'type' => 'select',
                'options' => array(
                    'value1' => esc_html__( 'Yes', 'holywood' ),
                    'value2' => esc_html__( 'No', 'holywood' ),
                ),
                'multiple' => false,
                'std' => 'Yes'
            )
        )
    );
    return $meta_boxes;
}
function holywood_admin_scripts() {
    wp_register_script('holywood_custom_admin', get_template_directory_uri() . '/js/jquery.custom.admin.js');
    wp_enqueue_script('holywood_custom_admin');
}
function holywood_admin_styles() {
    wp_register_style('holywood_options_css', get_template_directory_uri() . '/admin/admin-style.css');
    wp_register_style('holywood_options_grey_css', get_template_directory_uri() . '/admin/admin-style-grey.css');
    wp_enqueue_style('holywood_options_css');
    wp_enqueue_style('holywood_options_grey_css');
}
add_action('admin_print_scripts', 'holywood_admin_scripts');
add_action('admin_print_styles', 'holywood_admin_styles');
?>
