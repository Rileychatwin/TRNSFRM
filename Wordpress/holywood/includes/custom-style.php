<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package holywood
 */

/* HEADER ------------------------------------------- */
if ( ! function_exists( 'holywood_hex2rgb' ) ) {
    function holywood_hex2rgb($hex)
    {
        $hex = str_replace("#", "", $hex);

        if(strlen($hex) == 3) {
            $r = hexdec(substr($hex,0,1).substr($hex,0,1));
            $g = hexdec(substr($hex,1,1).substr($hex,1,1));
            $b = hexdec(substr($hex,2,1).substr($hex,2,1));
        } else {
            $r = hexdec(substr($hex,0,2));
            $g = hexdec(substr($hex,2,2));
            $b = hexdec(substr($hex,4,2));
        }
        $rgb = array($r, $g, $b);

        return $rgb; // returns an array with the rgb values
    }
}
function holywood_custom_styling() { ?>


	<style>

        <?php

        // preloader
        if ( ot_get_option( 'holywood_pre' ) != 'off' ) {
            $theCSS = '';
            $prebg = ot_get_option( 'holywood_prebgcolor' ) ? ot_get_option( 'holywood_prebgcolor' ) : '#ecf0f1';
            $theCSS .= 'div#preloader {
                background-color: '.$prebg.';
                overflow: hidden;
                background-repeat: no-repeat;
                background-position: center center;
                height: 100%;
                left: 0;
                position: fixed;
                top: 0;
                width: 100%;
                z-index: 1000;
            }';
            if ( ot_get_option( 'holywood_prespincolor' ) !='' ) {

                $prespincolor = ot_get_option( 'holywood_prespincolor' );
                $pre_spincolor = holywood_hex2rgb($prespincolor);
                $pre_spin_color = implode(", ", $pre_spincolor);

                if ( ot_get_option( 'holywood_pre_type' ) =='01' ) { $theCSS .= '.loader01:after { background: '.$prespincolor.'!important;}';
                $theCSS .= '.loader01 { border:8px solid '.$prespincolor.'!important; border-right-color: transparent!important;}';}
                if ( ot_get_option( 'holywood_pre_type' ) =='02' ) { $theCSS .= '.loader02 { border: 8px solid rgba('.$pre_spin_color.', 0.25)!important;}';
                $theCSS .= '.loader02 { border-top-color: '.$prespincolor.'!important;}'; }
                if ( ot_get_option( 'holywood_pre_type' ) =='03' ) { $theCSS .= '.loader03{ border-top-color: '.$prespincolor.'!important;}';
                $theCSS .= '.loader03 { border-bottom-color: '.$prespincolor.'!important;}';}
                if ( ot_get_option( 'holywood_pre_type' ) =='04' ) { $theCSS .= '.loader04 { border: 2px solid rgba('.$pre_spin_color.', 0.5)!important;}';
                $theCSS .= '.loader04:after { background: '.$prespincolor.'!important;}';}
                if ( ot_get_option( 'holywood_pre_type' ) =='05' ) { $theCSS .= '.loader05 { border-color: '.$prespincolor.'!important;}'; }
                if ( ot_get_option( 'holywood_pre_type' ) =='06' ) { $theCSS .= '.loader06:before { border: 4px solid rgba('.$pre_spin_color.', 0.5)!important;}';
                $theCSS .= '.loader06:after { border: 4px solid '.$prespincolor.';}';}

                if ( ot_get_option( 'holywood_pre_type' ) =='07' ) {
                $theCSS .= '@keyframes loader-circles {
                0% {
                box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.05), 19px -19px 0 0 rgba('.$pre_spin_color.', 0.1), 27px 0 0 0 rgba('.$pre_spin_color.', 0.2), 19px 19px 0 0 rgba('.$pre_spin_color.', 0.3), 0 27px 0 0 rgba('.$pre_spin_color.', 0.4), -19px 19px 0 0 rgba('.$pre_spin_color.', 0.6), -27px 0 0 0 rgba('.$pre_spin_color.', 0.8), -19px -19px 0 0 '.$prespincolor.'; }
                12.5% {
                box-shadow: 0 -27px 0 0 '.$prespincolor.', 19px -19px 0 0 rgba('.$pre_spin_color.', 0.05), 27px 0 0 0 rgba('.$pre_spin_color.', 0.1), 19px 19px 0 0 rgba('.$pre_spin_color.', 0.2), 0 27px 0 0 rgba('.$pre_spin_color.', 0.3), -19px 19px 0 0 rgba('.$pre_spin_color.', 0.4), -27px 0 0 0 rgba('.$pre_spin_color.', 0.6), -19px -19px 0 0 rgba('.$pre_spin_color.', 0.8); }
                25% {
                box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.8), 19px -19px 0 0 '.$prespincolor.', 27px 0 0 0 rgba('.$pre_spin_color.', 0.05), 19px 19px 0 0 rgba('.$pre_spin_color.', 0.1), 0 27px 0 0 rgba('.$pre_spin_color.', 0.2), -19px 19px 0 0 rgba('.$pre_spin_color.', 0.3), -27px 0 0 0 rgba('.$pre_spin_color.', 0.4), -19px -19px 0 0 rgba('.$pre_spin_color.', 0.6); }
                37.5% {
                box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.6), 19px -19px 0 0 rgba('.$pre_spin_color.', 0.8), 27px 0 0 0 '.$prespincolor.', 19px 19px 0 0 rgba('.$pre_spin_color.', 0.05), 0 27px 0 0 rgba('.$pre_spin_color.', 0.1), -19px 19px 0 0 rgba('.$pre_spin_color.', 0.2), -27px 0 0 0 rgba('.$pre_spin_color.', 0.3), -19px -19px 0 0 rgba('.$pre_spin_color.', 0.4); }
                50% {
                box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.4), 19px -19px 0 0 rgba('.$pre_spin_color.', 0.6), 27px 0 0 0 rgba('.$pre_spin_color.', 0.8), 19px 19px 0 0 '.$prespincolor.', 0 27px 0 0 rgba('.$pre_spin_color.', 0.05), -19px 19px 0 0 rgba('.$pre_spin_color.', 0.1), -27px 0 0 0 rgba('.$pre_spin_color.', 0.2), -19px -19px 0 0 rgba('.$pre_spin_color.', 0.3); }
                62.5% {
                box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.3), 19px -19px 0 0 rgba('.$pre_spin_color.', 0.4), 27px 0 0 0 rgba('.$pre_spin_color.', 0.6), 19px 19px 0 0 rgba('.$pre_spin_color.', 0.8), 0 27px 0 0 '.$prespincolor.', -19px 19px 0 0 rgba('.$pre_spin_color.', 0.05), -27px 0 0 0 rgba('.$pre_spin_color.', 0.1), -19px -19px 0 0 rgba('.$pre_spin_color.', 0.2); }
                75% {
                box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.2), 19px -19px 0 0 rgba('.$pre_spin_color.', 0.3), 27px 0 0 0 rgba('.$pre_spin_color.', 0.4), 19px 19px 0 0 rgba('.$pre_spin_color.', 0.6), 0 27px 0 0 rgba('.$pre_spin_color.', 0.8), -19px 19px 0 0 '.$prespincolor.', -27px 0 0 0 rgba('.$pre_spin_color.', 0.05), -19px -19px 0 0 rgba('.$pre_spin_color.', 0.1); }
                87.5% {
                box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.1), 19px -19px 0 0 rgba('.$pre_spin_color.', 0.2), 27px 0 0 0 rgba('.$pre_spin_color.', 0.3), 19px 19px 0 0 rgba('.$pre_spin_color.', 0.4), 0 27px 0 0 rgba('.$pre_spin_color.', 0.6), -19px 19px 0 0 rgba('.$pre_spin_color.', 0.8), -27px 0 0 0 '.$prespincolor.', -19px -19px 0 0 rgba('.$pre_spin_color.', 0.05); }
                100% {
                box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.05), 19px -19px 0 0 rgba('.$pre_spin_color.', 0.1), 27px 0 0 0 rgba('.$pre_spin_color.', 0.2), 19px 19px 0 0 rgba('.$pre_spin_color.', 0.3), 0 27px 0 0 rgba('.$pre_spin_color.', 0.4), -19px 19px 0 0 rgba('.$pre_spin_color.', 0.6), -27px 0 0 0 rgba('.$pre_spin_color.', 0.8), -19px -19px 0 0 '.$prespincolor.'; } }';
                }
                if ( ot_get_option( 'holywood_pre_type' ) =='08' ) {
                $theCSS .= '@keyframes loader08 {
                0%, 100% {
                box-shadow: -13px 20px 0 '.$prespincolor.', 13px 20px 0 rgba('.$pre_spin_color.', 0.2), 13px 46px 0 rgba('.$pre_spin_color.', 0.2), -13px 46px 0 rgba('.$pre_spin_color.', 0.2); }
                25% {
                box-shadow: -13px 20px 0 rgba('.$pre_spin_color.', 0.2), 13px 20px 0 '.$prespincolor.', 13px 46px 0 rgba('.$pre_spin_color.', 0.2), -13px 46px 0 rgba('.$pre_spin_color.', 0.2); }
                50% {
                box-shadow: -13px 20px 0 rgba('.$pre_spin_color.', 0.2), 13px 20px 0 rgba('.$pre_spin_color.', 0.2), 13px 46px 0 '.$prespincolor.', -13px 46px 0 rgba('.$pre_spin_color.', 0.2); }
                75% {
                box-shadow: -13px 20px 0 rgba('.$pre_spin_color.', 0.2), 13px 20px 0 rgba('.$pre_spin_color.', 0.2), 13px 46px 0 rgba('.$pre_spin_color.', 0.2), -13px 46px 0 '.$prespincolor.'; } }';
                }
                if ( ot_get_option( 'holywood_pre_type' ) =='09' ) {
                $theCSS .= '.loader09, .loader09:after, .loader09:before { background: '.$prespincolor.'!important;}';
                $theCSS .= '@keyframes loader09 {
                0%, 100% {
                box-shadow: 0 0 0 '.$prespincolor.', 0 0 0 '.$prespincolor.'; }
                50% {
                box-shadow: 0 -8px 0 '.$prespincolor.', 0 8px 0 '.$prespincolor.'; } }
                }';
                }
                if ( ot_get_option( 'holywood_pre_type' ) =='10' ) {
                $theCSS .= '@keyframes loader10 {
                0% {
                box-shadow: 0 28px 0 -28px '.$prespincolor.'; }
                100% {
                box-shadow: 0 28px 0 '.$prespincolor.'; } }';
                }
                if ( ot_get_option( 'holywood_pre_type' ) =='11' ) {
                $theCSS .= ' .loader11::after, .loader11::before {box-shadow: 0 40px 0 '.$prespincolor.'; }';
                $theCSS .= '@keyframes loader11 {
                0% {
                box-shadow: 0 40px 0 '.$prespincolor.'; }
                100% {
                box-shadow: 0 20px 0 '.$prespincolor.'; } }';
                }
                if ( ot_get_option( 'holywood_pre_type' ) =='12' ) {
                $theCSS .= '@keyframes loader12 {
                0% {
                box-shadow: -60px 40px 0 2px '.$prespincolor.', -30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 0 40px 0 0 rgba('.$pre_spin_color.', 0.2), 30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 60px 40px 0 0 rgba('.$pre_spin_color.', 0.2); }
                25% {
                box-shadow: -60px 40px 0 0 rgba('.$pre_spin_color.', 0.2), -30px 40px 0 2px '.$prespincolor.', 0 40px 0 0 rgba('.$pre_spin_color.', 0.2), 30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 60px 40px 0 0 rgba('.$pre_spin_color.', 0.2); }
                50% {
                box-shadow: -60px 40px 0 0 rgba('.$pre_spin_color.', 0.2), -30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 0 40px 0 2px '.$prespincolor.', 30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 60px 40px 0 0 rgba('.$pre_spin_color.', 0.2); }
                75% {
                box-shadow: -60px 40px 0 0 rgba('.$pre_spin_color.', 0.2), -30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 0 40px 0 0 rgba('.$pre_spin_color.', 0.2), 30px 40px 0 2px '.$prespincolor.', 60px 40px 0 0 rgba('.$pre_spin_color.', 0.2); }
                100% {
                box-shadow: -60px 40px 0 0 rgba('.$pre_spin_color.', 0.2), -30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 0 40px 0 0 rgba('.$pre_spin_color.', 0.2), 30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 60px 40px 0 2px '.$prespincolor.'; } }';
                }
                if ( ot_get_option( 'holywood_prebgcolor' ) !='' && ot_get_option( 'holywood_pre_type' ) == 'def' ) {
                $theCSS .= '.lj-preloader{ background-color: '.ot_get_option( 'holywood_prebgcolor' ).';}';
                }
            }
            echo esc_attr($theCSS);
        }
         ?>
		<?php if( is_admin_bar_showing() && !is_customize_preview() ) : ?>

		.bootsnav.navbar-fixed.navbar-transparent,
		.bootsnav.navbar-fixed.scrolled,
		.wrap-sticky .bootsnav.navbar-sticky.sticked,
		nav.navbar.bootsnav.navbar-mobile .navbar-collapse,
		.side.sidebar-menu {
			top: 32px!important;
		}

		@media (max-width: 782px) {
			.bootsnav.navbar-fixed.navbar-transparent,
			.bootsnav.navbar-fixed.scrolled,
			.wrap-sticky .bootsnav.navbar-sticky.sticked,
			nav.navbar.bootsnav.navbar-mobile .navbar-collapse,
			.side.sidebar-menu {
				top: 46px!important;
			}
		}

		@media (max-width: 600px){
			.bootsnav.navbar-fixed.navbar-transparent.scrolled,
			.bootsnav.navbar-fixed.scrolled,
			.bootsnav.scrolled,
			.wrap-sticky .bootsnav.navbar-sticky.sticked {
				top: 0px!important;
			}
			.bootsnav.navbar-fixed.navbar-transparent,
			.side.sidebar-menu {
				top: 46px!important;
			}
		}
	<?php endif; ?>

	<?php if( current_user_can('administrator')): ?>
		#main-header.the-origin-header, .notif-box{ top: 32px;}
		#cd-lateral-nav .cd-navigation {margin-top: 52px !important;}
	 }
	<?php endif; ?>

	<?php if( is_customize_preview('administrator')): ?>
		#main-header.the-origin-header, .header-clone, .notif-box { top: 0px;}
	<?php endif; ?>

	<?php if( current_user_can('editor')): ?>
		#main-header.the-origin-header,
		.notif-box {
			top: 32px;
		}
		@media (max-width: 767px) {
			.navbar-default {
				top: 47px;
			}
		}
	 .header-clone { top: 32px;}
	<?php endif; ?>

	<?php if( ot_get_option( 'logowidth' ) !='' ): ?>
	.lj-logo img { width:<?php echo esc_attr(ot_get_option('logowidth')); ?>px; }
	<?php endif; ?>
	<?php if( ot_get_option( 'logoheight' ) !='' ): ?>
	.lj-logo img{ height:<?php echo esc_attr(ot_get_option('logoheight')); ?>px; }
	<?php endif; ?>
	<?php if( ot_get_option( 'logomargin' ) !='' ): ?>
	.lj-logo img{ margin-top:<?php echo esc_attr(ot_get_option('logomargin')); ?>px; }
	<?php endif; ?>


	<?php if( ot_get_option( 'backtotop_bgclr' ) !='' ): ?>
	#scrollUp {background-color:<?php echo esc_attr(ot_get_option('backtotop_bgclr')); ?>; }
	<?php endif; ?>
	<?php if( ot_get_option( 'backtotop_hvrbgclr' ) !='' ): ?>
	#scrollUp:hover {background-color:<?php echo esc_attr(ot_get_option('backtotop_hvrbgclr')); ?>; }
	<?php endif; ?>
	<?php if( ot_get_option( 'backtotop_iclr' ) !='' ): ?>
	#scrollUp i {color:<?php echo esc_attr(ot_get_option('backtotop_iclr')); ?>; }
	<?php endif; ?>
	<?php if( ot_get_option( 'backtotop_ihvrclr' ) !='' ): ?>
	#scrollUp:hover i {color:<?php echo esc_attr(ot_get_option('backtotop_ihvrclr')); ?>; }
	<?php endif; ?>

	<?php if( ot_get_option( 'holywood_header_search_iconclr' ) !='' ): ?>
	.attr-nav li.search i {color:<?php echo esc_attr(ot_get_option('holywood_header_search_iconclr')); ?>; }
	<?php endif; ?>
	<?php if( ot_get_option( 'holywood_header_search_bgclr' ) !='' ): ?>
	.bootsnav .top-search {background-color:<?php echo esc_attr(ot_get_option('holywood_header_search_bgclr')); ?>; }
	<?php endif; ?>
	<?php if( ot_get_option( 'holywood_header_search_textclr' ) !='' ): ?>
	.bootsnav .top-search .close-search, .bootsnav .top-search input.form-control {color:<?php echo esc_attr(ot_get_option('holywood_header_search_textclr')); ?>; }
	.bootsnav .top-search input::-webkit-input-placeholder {color:<?php echo esc_attr(ot_get_option('holywood_header_search_textclr')); ?>;opacity: 1;}
	.bootsnav .top-search input:-moz-placeholder {color:<?php echo esc_attr(ot_get_option('holywood_header_search_textclr')); ?>;}
	.bootsnav .top-search input::-moz-placeholder {color:<?php echo esc_attr(ot_get_option('holywood_header_search_textclr')); ?>; }
	.bootsnav .top-search input:-ms-input-placeholder {color:<?php echo esc_attr(ot_get_option('holywood_header_search_textclr')); ?>; }
	.bootsnav .top-search input::-ms-input-placeholder {color:<?php echo esc_attr(ot_get_option('holywood_header_search_textclr')); ?>; }
	.bootsnav .top-search input::placeholder {color:<?php echo esc_attr(ot_get_option('holywood_header_search_textclr')); ?>; }
	<?php endif; ?>

	<?php if( ot_get_option( 'holywood_sidebarmenu_bgclr' ) !='' ): ?>
	.bootsnav .side.sidebar-menu {background-color:<?php echo esc_attr(ot_get_option('holywood_sidebarmenu_bgclr')); ?>; }
	<?php endif; ?>
	<?php if( ot_get_option( 'holywood_sidebarmenu_btnclr' ) !='' ): ?>
	.bootsnav .attr-nav .side-menu i, .bootsnav .side.sidebar-menu .close-side {color:<?php echo esc_attr(ot_get_option('holywood_sidebarmenu_btnclr')); ?>; }
	<?php endif; ?>
	<?php if( ot_get_option( 'holywood_sidebarmenu_wtclr' ) !='' ): ?>
	.bootsnav .side.sidebar-menu .widget .widget-title {color:<?php echo esc_attr(ot_get_option('holywood_sidebarmenu_wtclr')); ?>; }
	<?php endif; ?>
	<?php if( ot_get_option( 'holywood_sidebarmenu_wlinkclr' ) !='' ): ?>
	.bootsnav .side.sidebar-menu .widget ul li a {color:<?php echo esc_attr(ot_get_option('holywood_sidebarmenu_wlinkclr')); ?>; }
	<?php endif; ?>
	<?php if( ot_get_option( 'holywood_sidebarmenu_wlinkhvrclr' ) !='' ): ?>
	.bootsnav .side.sidebar-menu .widget ul li a:hover {color:<?php echo esc_attr(ot_get_option('holywood_sidebarmenu_wlinkhvrclr')); ?>; }
	<?php endif; ?>

	<?php if( ot_get_option( 'holywood_header_social_iconclr' ) !='' ): ?>
	.bootsnav .attr-nav .social-link i, .bootsnav .share ul li i {color:<?php echo esc_attr(ot_get_option('holywood_header_social_iconclr')); ?>; }
	<?php endif; ?>
	<?php if( ot_get_option( 'holywood_header_social_iconhvrclr' ) !='' ): ?>
	.bootsnav .attr-nav .social-link a:hover i, .bootsnav .share ul li a:hover i {color:<?php echo esc_attr(ot_get_option('holywood_header_social_iconhvrclr')); ?>; }
	<?php endif; ?>

	<?php
	/* image logo dimension */
	$logodim = ot_get_option( 'logo_dimension', array() );
	$logounit = !empty($logodim['unit']) ? $logodim['unit'] : 'px';

	if ( !empty($logodim['width']) ) : ?>
	nav.navbar .navbar-brand img.logo. { width:<?php echo esc_attr($logodim['width'].$logounit); ?>; }
	<?php endif;

	if ( !empty($logodim['width']) ) : ?>
	nav.navbar .navbar-brand img.logo { max-width:<?php echo esc_attr($logodim['width'].$logounit); ?>; }
	<?php endif;

	if ( !empty($logodim['height']) ) : ?>
	nav.navbar .navbar-brand img.logo { padding-left:<?php echo esc_attr($logodim['height'].$logounit); ?>; }
	<?php endif;

	/* sticky image logo dimension */
	$slogodim = ot_get_option( 'slogo_dimension', array() );
	$slogounit = !empty($slogodim['unit']) ? $slogodim['unit'] : 'px';

	if ( !empty($slogodim['width']) ) : ?>
	nav.navbar .navbar-brand img.logo.logo-scrolled { width:<?php echo esc_attr($slogodim['width'].$slogounit); ?>; }
	<?php endif;

	if ( !empty($slogodim['width']) ) : ?>
	nav.navbar .navbar-brand img.logo.logo-scrolled { max-width:<?php echo esc_attr($slogodim['width'].$slogounit); ?>; }
	<?php endif;

	if ( !empty($slogodim['height']) ) : ?>
	nav.navbar .navbar-brand img.logo.logo-scrolled { padding-left:<?php echo esc_attr($slogodim['height'].$slogounit); ?>; }
	<?php endif;

	// default logo padding
	$logopadding = ot_get_option( 'logopadding', array() );
	$logopadunit = !empty($logopadding['unit']) ? $logopadding['unit'] : 'px';
	if ( !empty($logopadding['top']) ) : ?>
		nav.navbar .navbar-brand { padding-top:<?php echo esc_attr($logopadding['top'].$logopadunit); ?>; }
	<?php endif;
	if ( !empty($logopadding['left']) ) : ?>
		nav.navbar .navbar-brand { padding-left:<?php echo esc_attr($logopadding['left'].$logopadunit); ?>; }
	<?php endif;
	if ( !empty($logopadding['bottom']) ) : ?>
		nav.navbar .navbar-brand { padding-bottom:<?php echo esc_attr($logopadding['bottom'].$logopadunit); ?>; }
	<?php endif;
	if ( !empty($logopadding['right']) ) : ?>
		nav.navbar .navbar-brand { padding-right:<?php echo esc_attr($logopadding['right'].$logopadunit); ?>; }
	<?php endif;

	// default logo padding
	$slogopadding = ot_get_option( 'slogopadding', array() );
	$slogopadunit = !empty($slogopadding['unit']) ? $slogopadding['unit'] : 'px';
	if ( !empty($slogopadding['top']) ) : ?>
		nav.navbar.scrolled .navbar-brand  { padding-top:<?php echo esc_attr($slogopadding['top'].$slogopadunit); ?>!important; }
	<?php endif;
	if ( !empty($slogopadding['left']) ) : ?>
		nav.navbar.scrolled .navbar-brand { padding-left:<?php echo esc_attr($slogopadding['left'].$slogopadunit); ?>!important; }
	<?php endif;
	if ( !empty($slogopadding['bottom']) ) : ?>
		nav.navbar.scrolled .navbar-brand { padding-bottom:<?php echo esc_attr($slogopadding['bottom'].$slogopadunit); ?>!important; }
	<?php endif;
	if ( !empty($slogopadding['right']) ) : ?>
		nav.navbar.scrolled .navbar-brand { padding-right:<?php echo esc_attr($slogopadding['right'].$slogopadunit); ?>!important; }
	<?php endif; ?>

	/* static menu text logo typgrph */
	<?php $textlogo = ot_get_option( 'holywood_textlogo_typograp', array() );
	if ( !empty($textlogo) ) : ?>
   	.nt-text-logo {
      	<?php if ( !empty($textlogo['font-color']) )    { ?> color:<?php echo esc_attr( $textlogo['font-color'] ) ?>!important; <?php } ?>
      	<?php if ( !empty($textlogo['font-family']) )   { ?> font-family:<?php echo esc_attr( $textlogo['font-family'] ) ?>!important;<?php } ?>
      	<?php if ( !empty($textlogo['font-size']) )     { ?> font-size:<?php echo esc_attr( $textlogo['font-size'] ) ?>!important;<?php } ?>
      	<?php if ( !empty($textlogo['font-style']) )    { ?> font-style:<?php echo esc_attr( $textlogo['font-style'] ) ?>!important;<?php } ?>
      	<?php if ( !empty($textlogo['font-variant']) )  { ?> font-variant:<?php echo esc_attr( $textlogo['font-variant'] ) ?>!important;<?php } ?>
      	<?php if ( !empty($textlogo['font-weight']) )   { ?> font-weight:<?php echo esc_attr( $textlogo['font-weight'] ) ?>!important;<?php } ?>
      	<?php if ( !empty($textlogo['letter-spacing']) ){ ?> letter-spacing:<?php echo esc_attr( $textlogo['letter-spacing'] ) ?>!important;<?php } ?>
      	<?php if ( !empty($textlogo['line-height']))    { ?> line-height:<?php echo esc_attr( $textlogo['line-height'] ) ?>!important;<?php } ?>
      	<?php if ( !empty($textlogo['text-decoration'])){ ?> text-decoration:<?php echo esc_attr($textlogo['text-decoration']) ?>!important;<?php } ?>
      	<?php if ( !empty($textlogo['text-transform'])) { ?> text-transform:<?php echo esc_attr($textlogo['text-transform']) ?>!important;<?php } ?>
   	}
	<?php endif;

	/* static menu text logo typgrph */
	$menu_typo = ot_get_option( 'holywood_menu_typo', array() );
	if ( !empty($menu_typo) ) : ?>
   	nav.navbar.bootsnav ul.nav > li > a{
      	<?php if ( !empty($menu_typo['font-color']) )    { ?> color:<?php echo esc_attr( $menu_typo['font-color'] ) ?>!important; <?php } ?>
      	<?php if ( !empty($menu_typo['font-family']) )   { ?> font-family:<?php echo esc_attr( $menu_typo['font-family'] ) ?>!important;<?php } ?>
      	<?php if ( !empty($menu_typo['font-size']) )     { ?> font-size:<?php echo esc_attr( $menu_typo['font-size'] ) ?>!important;<?php } ?>
      	<?php if ( !empty($menu_typo['font-style']) )    { ?> font-style:<?php echo esc_attr( $menu_typo['font-style'] ) ?>!important;<?php } ?>
      	<?php if ( !empty($menu_typo['font-variant']) )  { ?> font-variant:<?php echo esc_attr( $menu_typo['font-variant'] ) ?>!important;<?php } ?>
      	<?php if ( !empty($menu_typo['font-weight']) )   { ?> font-weight:<?php echo esc_attr( $menu_typo['font-weight'] ) ?>!important;<?php } ?>
      	<?php if ( !empty($menu_typo['letter-spacing']) ){ ?> letter-spacing:<?php echo esc_attr( $menu_typo['letter-spacing'] ) ?>!important;<?php } ?>
      	<?php if ( !empty($menu_typo['line-height']))    { ?> line-height:<?php echo esc_attr( $menu_typo['line-height'] ) ?>!important;<?php } ?>
      	<?php if ( !empty($menu_typo['text-decoration'])){ ?> text-decoration:<?php echo esc_attr($menu_typo['text-decoration']) ?>!important;<?php } ?>
      	<?php if ( !empty($menu_typo['text-transform'])) { ?> text-transform:<?php echo esc_attr($menu_typo['text-transform']) ?>!important;<?php } ?>
   	}
	<?php endif;  ?>

	<?php if ( ot_get_option( 'holywood_menu_item_hvrclr') ) : ?>
		nav.navbar.bootsnav ul.nav > li > a:hover { color:<?php echo esc_attr(ot_get_option( 'holywood_menu_item_hvrclr')); ?>!important; }
	<?php endif; ?>

	<?php if ( ot_get_option( 'holywood_menu_bgclr') ) : ?>
		nav.navbar.bootsnav, nav.navbar.bootsnav.navbar-fixed, nav.navbar.bootsnav .navbar-collapse.collapse.in { background-color:<?php echo esc_attr(ot_get_option( 'holywood_menu_bgclr')); ?>!important; }
	<?php endif; ?>

	/* Sticky menu */
	<?php if ( ot_get_option( 'holywood_smenu_bgclr') ) : ?>
		nav.navbar.bootsnav.sticked, nav.navbar.bootsnav.navbar-fixed.scrolled, nav.navbar.bootsnav.scrolled .navbar-collapse.collapse.in { background-color:<?php echo esc_attr(ot_get_option( 'holywood_smenu_bgclr')); ?>!important; }
	<?php endif; ?>
	<?php if ( ot_get_option( 'holywood_smenu_item_clr') ) : ?>
		nav.navbar.bootsnav.sticked ul.nav > li > a, nav.navbar.bootsnav.navbar-fixed.scrolled ul.nav > li > a, nav.navbar.bootsnav ul li.dropdown ul.dropdown-menu li a { color:<?php echo esc_attr(ot_get_option( 'holywood_smenu_item_clr')); ?>!important; }
	<?php endif; ?>
	<?php if ( ot_get_option( 'holywood_smenu_item_hvrclr') ) : ?>
		nav.navbar.bootsnav.sticked ul.nav > li > a:hover, nav.navbar.bootsnav.navbar-fixed.scrolled ul.nav > li > a:hover, nav.navbar.bootsnav ul li.dropdown ul.dropdown-menu li a:hover { color:<?php echo esc_attr(ot_get_option( 'holywood_smenu_item_hvrclr')); ?>!important; }
	<?php endif; ?>

	/* menu dropdown typgrph */
	<?php $dropdown_typo = ot_get_option( 'holywood_menu_dropdown_typo', array() );
	if ( !empty($dropdown_typo) ) : ?>
   	nav.navbar.bootsnav ul li.dropdown ul.dropdown-menu li a {
      	<?php if ( !empty($dropdown_typo['font-color']) )    { ?> color:<?php echo esc_attr( $dropdown_typo['font-color'] ) ?>!important; <?php } ?>
      	<?php if ( !empty($dropdown_typo['font-family']) )   { ?> font-family:<?php echo esc_attr( $dropdown_typo['font-family'] ) ?>!important;<?php } ?>
      	<?php if ( !empty($dropdown_typo['font-size']) )     { ?> font-size:<?php echo esc_attr( $dropdown_typo['font-size'] ) ?>!important;<?php } ?>
      	<?php if ( !empty($dropdown_typo['font-style']) )    { ?> font-style:<?php echo esc_attr( $dropdown_typo['font-style'] ) ?>!important;<?php } ?>
      	<?php if ( !empty($dropdown_typo['font-variant']) )  { ?> font-variant:<?php echo esc_attr( $dropdown_typo['font-variant'] ) ?>!important;<?php } ?>
      	<?php if ( !empty($dropdown_typo['font-weight']) )   { ?> font-weight:<?php echo esc_attr( $dropdown_typo['font-weight'] ) ?>!important;<?php } ?>
      	<?php if ( !empty($dropdown_typo['letter-spacing']) ){ ?> letter-spacing:<?php echo esc_attr( $dropdown_typo['letter-spacing'] ) ?>!important;<?php } ?>
      	<?php if ( !empty($dropdown_typo['line-height']))    { ?> line-height:<?php echo esc_attr( $dropdown_typo['line-height'] ) ?>!important;<?php } ?>
      	<?php if ( !empty($dropdown_typo['text-decoration'])){ ?> text-decoration:<?php echo esc_attr($dropdown_typo['text-decoration']) ?>!important;<?php } ?>
      	<?php if ( !empty($dropdown_typo['text-transform'])) { ?> text-transform:<?php echo esc_attr($dropdown_typo['text-transform']) ?>!important;<?php } ?>
   	}
	<?php endif; ?>

	<?php if ( ot_get_option( 'holywood_menu_dropitem_hvrclr') ) : ?>
		nav.navbar.bootsnav ul li.dropdown ul.dropdown-menu li a:hover { color:<?php echo esc_attr(ot_get_option( 'holywood_menu_dropitem_hvrclr')); ?>!important; }
	<?php endif; ?>

	<?php if ( ot_get_option( 'holywood_menu_dropdown_bgclr') ) : ?>
		nav.navbar.bootsnav li.dropdown ul.dropdown-menu { background-color:<?php echo esc_attr(ot_get_option( 'holywood_menu_dropdown_bgclr')); ?>!important; }
	<?php endif; ?>




	#cd-menu-trigger .cd-menu-icon { background-color: <?php echo ot_get_option('menubuttoncolor'); ?>;}

	<?php if( ot_get_option( 'holywood_nav_menu_ifs' ) !=0 ): ?>
	#cd-lateral-nav a{ font-size:<?php echo esc_attr(ot_get_option('holywood_nav_menu_ifs')); ?>px; }
	<?php endif; ?>

	<?php if( ot_get_option( 'otherpageheadbg' ) !='' ): ?>
	.nt-custom-pages-header {
	  background: url(<?php echo esc_attr( ot_get_option( 'otherpageheadbg' ) ) ?>) no-repeat center center fixed;
	  background-size: cover;
	}
	<?php endif; ?>

	<?php if( ot_get_option( 'themecolor1' ) !='' ): ?>


		.lj-text-button a:hover,
		.lj-button-left,
		.lj-scroll-down a:hover ,
		.lj-product-button-left,
		.lj-product-button-right:hover,
		.lj-product-button-right:focus,
		.lj-product-features li i,
		.lj-photo-button:hover,
		.lj-photo-centered-button,
		.lj-photo-centered-button:focus,
		.lj-subscribe-form input[type=submit],
		.lj-pricing-table-featured > span,
		.lj-pricing-table-featured > div > a,
		.lj-join-now-form input[type=submit],
		.lj-projects-item a,
		.slick-dots li button:hover,
		.slick-dots li.slick-active button,
		#cd-menu-trigger.light-menu span,
		#cd-menu-trigger.is-clicked.light-menu .cd-menu-icon::before,
		#cd-menu-trigger.is-clicked.light-menu .cd-menu-icon::after,
		.comment-form .form-submit input[type="submit"]
		{ background-color: <?php echo esc_attr( ot_get_option( 'themecolor1' ) ) ?>; }
		 a,
		 a:hover,
		.lj-product-button-right
		{color: <?php echo esc_attr( ot_get_option( 'themecolor1' ) ) ?>;}
		.lj-text-button a:hover,
		.lj-scroll-down a:hover,
		.lj-product-button-left,
		.lj-product-button-right,
		.lj-product-button-right:hover,
		.lj-product-button-right:focus,
		.lj-photo-button:hover,
		.lj-photo-centered-button,
		.lj-photo-centered-button:focus,
		.lj-pricing-table-featured > div,
		.lj-product-features li i
		{ border-color: <?php echo esc_attr( ot_get_option( 'themecolor1' ) ) ?>; }
		<?php endif; ?>

		<?php if( ot_get_option( 'themecolor2' ) !='' ): ?>
		.lj-button-left:hover,
		.lj-button-left:focus,
		.lj-photo-centered-button:last-child,
		.lj-pricing-table-normal > div > ul li span,
		.lj-pricing-table-normal > div > a:hover,
		.lj-join-now-form input[type=submit]:hover
		{ background-color: <?php echo esc_attr( ot_get_option( 'themecolor2' ) ) ?>; }
		.lj-icon-box-two span,
		.lj-icon-box-two h4,
		.lj-subscribe-message .fa-check ,
		.lj-join-now-message .fa-check
		{color: <?php echo esc_attr( ot_get_option( 'themecolor2' ) ) ?>;}
		.lj-photo-centered-button:last-child
		{ border-color: <?php echo esc_attr( ot_get_option( 'themecolor2' ) ) ?>; }
		<?php endif; ?>

		#cd-lateral-nav { background-color: <?php echo esc_attr( ot_get_option( 'menudropdown' ) ) ?>; }
		#cd-lateral-nav a { color: <?php echo esc_attr( ot_get_option( 'menudropdowncolor' ) ) ?>; }

		#widget-area {
			background-color: <?php echo esc_attr( ot_get_option( 'ninetheme_ard_widget_bg_color' ) ) ?> ;
			padding: <?php echo esc_attr( ot_get_option( 'ninetheme_ard_widget_padding' ) ) ?> ;
			border: solid <?php echo esc_attr( ot_get_option( 'ninetheme_ard_widget_border_size' ) ) ?>px ;
			border-color: <?php echo esc_attr( ot_get_option( 'ninetheme_ard_widget_border_color' ) ) ?> ;
		}

		#widget-area .widget{
			border-color: <?php echo esc_attr( ot_get_option( 'ninetheme_ard_widget_bg_color' ) ) ?> ;
		}

		#widget-area .widget-title{
			color: <?php echo esc_attr( ot_get_option( 'ninetheme_ard_widget_heading_color' ) ) ?> ;
			margin: <?php echo esc_attr( ot_get_option( 'ninetheme_ard_widget_h_margin' ) ) ?> ;
		}

		.widget .widget-title:after{
			border: solid <?php echo esc_attr( ot_get_option( 'ninetheme_ard_widget_h_border_color' ) ) ?>px ;
		}

		.widget ul li a {
			color: <?php echo esc_attr( ot_get_option( 'ninetheme_ard_widget_link_color' ) ) ?>;
		}

		.widget ul li a:hover {
			color: <?php echo esc_attr( ot_get_option( 'ninetheme_ard_widget_link_hover_color' ) ) ?>;
		}

		#widget-area #searchform input[type="text"] {
			background-color: <?php echo esc_attr( ot_get_option( 'ninetheme_ard_widget_search_bg_color' ) ) ?> ;
		}

		#widget-area #searchform input#searchsubmit {
			background-color: <?php echo esc_attr( ot_get_option( 'ninetheme_ard_w_search_b_bg_color' ) ) ?> ;
		}

		.posts article .entry-title a {
			color: <?php echo esc_attr( ot_get_option( 'ninetheme_ard_post_title_color' ) ) ?>;
		}
		#share-buttons i {
			background-color: <?php echo esc_attr( ot_get_option( 'ninetheme_ard_post_icon_bg_color' ) ) ?>;
		}
		.post.type-post {
			border-color: <?php echo esc_attr( ot_get_option( 'ninetheme_ard_post_border_color' ) ) ?> ;
		}
		.post.type-post p{
			color: <?php echo esc_attr( ot_get_option( 'ninetheme_ard_post_text_color' ) ) ?> ;
		}
		.margin_30 {
			color: <?php echo esc_attr( ot_get_option( 'ninetheme_ard_post_link_color' ) ) ?> ;
		}

		.links-section {background-color: <?php echo esc_attr( ot_get_option( 'holywood_footer_links_bg' ) ) ?>;}
		.links-section ul li a{color: <?php echo esc_attr( ot_get_option( 'holywood_footer_links_color' ) ) ?>;}

		.footer{background-color: <?php echo esc_attr( ot_get_option( 'holywood_footer_copyrights_bg' ) ) ?>;}
		.lj-footer-copyrights p{color: <?php echo esc_attr( ot_get_option( 'holywood_footer_copyrights_color' ) ) ?>;}
		.lj-footer-socials ul li a{background-color: <?php echo esc_attr( ot_get_option( 'holywood_footer_social_bg' ) ) ?>;}
		.lj-footer-socials ul li a{color: <?php echo esc_attr( ot_get_option( 'holywood_footer_social_color' ) ) ?>;}

	<?php $body_typo = ot_get_option( 'holywood_static_textlogo_typograp', array() );
	if ( !empty($body_typo) ) { ?>
   	body{
      	<?php if ( !empty($body_typo['font-color']) )     { ?> color:<?php echo esc_attr( $body_typo['font-color'] ) ?>; <?php } ?>
      	<?php if ( !empty($body_typo['font-family']) )    { ?> font-family:<?php echo esc_attr( $body_typo['font-family'] ) ?>;<?php } ?>
      	<?php if ( !empty($body_typo['font-size']) )      { ?> font-size:<?php echo esc_attr( $body_typo['font-size'] ) ?>;<?php } ?>
      	<?php if ( !empty($body_typo['font-style']) )     { ?> font-style:<?php echo esc_attr( $body_typo['font-style'] ) ?>;<?php } ?>
      	<?php if ( !empty($body_typo['font-variant']) )   { ?> font-variant:<?php echo esc_attr( $body_typo['font-variant'] ) ?>;<?php } ?>
      	<?php if ( !empty($body_typo['font-weight']) )    { ?> font-weight:<?php echo esc_attr( $body_typo['font-weight'] ) ?>;<?php } ?>
      	<?php if ( !empty($body_typo['letter-spacing']) ) { ?> letter-spacing:<?php echo esc_attr( $body_typo['letter-spacing'] ) ?>;<?php } ?>
      	<?php if ( !empty($body_typo['line-height']))     { ?> line-height:<?php echo esc_attr( $body_typo['line-height'] ) ?>;<?php } ?>
      	<?php if ( !empty($body_typo['text-decoration'])) { ?> text-decoration:<?php echo esc_attr($body_typo['text-decoration']) ?>;<?php } ?>
      	<?php if ( !empty($body_typo['text-transform']))  { ?> text-transform:<?php echo esc_attr($body_typo['text-transform']) ?>;<?php } ?>
   	}
	<?php } ?>

	<?php $h1_typo = ot_get_option( 'ninetheme_holywood_tipigrof1', array() );
	if ( !empty($h1_typo) ) { ?>
   	h1{
      	<?php if ( !empty($h1_typo['font-color']) )     { ?> color:<?php echo esc_attr( $h1_typo['font-color'] ) ?>; <?php } ?>
      	<?php if ( !empty($h1_typo['font-family']) )    { ?> font-family:<?php echo esc_attr( $h1_typo['font-family'] ) ?>;<?php } ?>
      	<?php if ( !empty($h1_typo['font-size']) )      { ?> font-size:<?php echo esc_attr( $h1_typo['font-size'] ) ?>;<?php } ?>
      	<?php if ( !empty($h1_typo['font-style']) )     { ?> font-style:<?php echo esc_attr( $h1_typo['font-style'] ) ?>;<?php } ?>
      	<?php if ( !empty($h1_typo['font-variant']) )   { ?> font-variant:<?php echo esc_attr( $h1_typo['font-variant'] ) ?>;<?php } ?>
      	<?php if ( !empty($h1_typo['font-weight']) )    { ?> font-weight:<?php echo esc_attr( $h1_typo['font-weight'] ) ?>;<?php } ?>
      	<?php if ( !empty($h1_typo['letter-spacing']) ) { ?> letter-spacing:<?php echo esc_attr( $h1_typo['letter-spacing'] ) ?>;<?php } ?>
      	<?php if ( !empty($h1_typo['line-height']))     { ?> line-height:<?php echo esc_attr( $h1_typo['line-height'] ) ?>;<?php } ?>
      	<?php if ( !empty($h1_typo['text-decoration'])) { ?> text-decoration:<?php echo esc_attr($h1_typo['text-decoration']) ?>;<?php } ?>
      	<?php if ( !empty($h1_typo['text-transform']))  { ?> text-transform:<?php echo esc_attr($h1_typo['text-transform']) ?>;<?php } ?>
   	}
	<?php } ?>

	<?php $h2_typo = ot_get_option( 'ninetheme_holywood_tipigrof2', array() );
	if ( !empty($h2_typo) ) { ?>
	h2{
      	<?php if ( !empty($h2_typo['font-color']) )     { ?> color:<?php echo esc_attr( $h2_typo['font-color'] ) ?>; <?php } ?>
      	<?php if ( !empty($h2_typo['font-family']) )    { ?> font-family:<?php echo esc_attr( $h2_typo['font-family'] ) ?>;<?php } ?>
      	<?php if ( !empty($h2_typo['font-size']) )      { ?> font-size:<?php echo esc_attr( $h2_typo['font-size'] ) ?>;<?php } ?>
      	<?php if ( !empty($h2_typo['font-style']) )     { ?> font-style:<?php echo esc_attr( $h2_typo['font-style'] ) ?>;<?php } ?>
      	<?php if ( !empty($h2_typo['font-variant']) )   { ?> font-variant:<?php echo esc_attr( $h2_typo['font-variant'] ) ?>;<?php } ?>
      	<?php if ( !empty($h2_typo['font-weight']) )    { ?> font-weight:<?php echo esc_attr( $h2_typo['font-weight'] ) ?>;<?php } ?>
      	<?php if ( !empty($h2_typo['letter-spacing']) ) { ?> letter-spacing:<?php echo esc_attr( $h2_typo['letter-spacing'] ) ?>;<?php } ?>
      	<?php if ( !empty($h2_typo['line-height']))     { ?> line-height:<?php echo esc_attr( $h2_typo['line-height'] ) ?>;<?php } ?>
      	<?php if ( !empty($h2_typo['text-decoration'])) { ?> text-decoration:<?php echo esc_attr($h2_typo['text-decoration']) ?>;<?php } ?>
      	<?php if ( !empty($h2_typo['text-transform']))  { ?> text-transform:<?php echo esc_attr($h2_typo['text-transform']) ?>;<?php } ?>
   	}
	<?php } ?>

	<?php $h3_typo = ot_get_option( 'ninetheme_holywood_tipigrof3', array() );
	if ( !empty($h3_typo) ) { ?>
   	h3{
      	<?php if ( !empty($h3_typo['font-color']) )     { ?> color:<?php echo esc_attr( $h3_typo['font-color'] ) ?>; <?php } ?>
      	<?php if ( !empty($h3_typo['font-family']) )    { ?> font-family:<?php echo esc_attr( $h3_typo['font-family'] ) ?>;<?php } ?>
      	<?php if ( !empty($h3_typo['font-size']) )      { ?> font-size:<?php echo esc_attr( $h3_typo['font-size'] ) ?>;<?php } ?>
      	<?php if ( !empty($h3_typo['font-style']) )     { ?> font-style:<?php echo esc_attr( $h3_typo['font-style'] ) ?>;<?php } ?>
      	<?php if ( !empty($h3_typo['font-variant']) )   { ?> font-variant:<?php echo esc_attr( $h3_typo['font-variant'] ) ?>;<?php } ?>
      	<?php if ( !empty($h3_typo['font-weight']) )    { ?> font-weight:<?php echo esc_attr( $h3_typo['font-weight'] ) ?>;<?php } ?>
      	<?php if ( !empty($h3_typo['letter-spacing']) ) { ?> letter-spacing:<?php echo esc_attr( $h3_typo['letter-spacing'] ) ?>;<?php } ?>
      	<?php if ( !empty($h3_typo['line-height']))     { ?> line-height:<?php echo esc_attr( $h3_typo['line-height'] ) ?>;<?php } ?>
      	<?php if ( !empty($h3_typo['text-decoration'])) { ?> text-decoration:<?php echo esc_attr($h3_typo['text-decoration']) ?>;<?php } ?>
      	<?php if ( !empty($h3_typo['text-transform']))  { ?> text-transform:<?php echo esc_attr($h3_typo['text-transform']) ?>;<?php } ?>
   	}
	<?php } ?>

	<?php $h4_typo = ot_get_option( 'ninetheme_holywood_tipigrof4', array() );
	if ( !empty($h4_typo) ) { ?>
   	h4{
      	<?php if ( !empty($h4_typo['font-color']) )     { ?> color:<?php echo esc_attr( $h4_typo['font-color'] ) ?>; <?php } ?>
      	<?php if ( !empty($h4_typo['font-family']) )    { ?> font-family:<?php echo esc_attr( $h4_typo['font-family'] ) ?>;<?php } ?>
      	<?php if ( !empty($h4_typo['font-size']) )      { ?> font-size:<?php echo esc_attr( $h4_typo['font-size'] ) ?>;<?php } ?>
      	<?php if ( !empty($h4_typo['font-style']) )     { ?> font-style:<?php echo esc_attr( $h4_typo['font-style'] ) ?>;<?php } ?>
      	<?php if ( !empty($h4_typo['font-variant']) )   { ?> font-variant:<?php echo esc_attr( $h4_typo['font-variant'] ) ?>;<?php } ?>
      	<?php if ( !empty($h4_typo['font-weight']) )    { ?> font-weight:<?php echo esc_attr( $h4_typo['font-weight'] ) ?>;<?php } ?>
      	<?php if ( !empty($h4_typo['letter-spacing']) ) { ?> letter-spacing:<?php echo esc_attr( $h4_typo['letter-spacing'] ) ?>;<?php } ?>
      	<?php if ( !empty($h4_typo['line-height']))     { ?> line-height:<?php echo esc_attr( $h4_typo['line-height'] ) ?>;<?php } ?>
      	<?php if ( !empty($h4_typo['text-decoration'])) { ?> text-decoration:<?php echo esc_attr($h4_typo['text-decoration']) ?>;<?php } ?>
      	<?php if ( !empty($h4_typo['text-transform']))  { ?> text-transform:<?php echo esc_attr($h4_typo['text-transform']) ?>;<?php } ?>
   	}
	<?php } ?>

	<?php $h5_typo = ot_get_option( 'ninetheme_holywood_tipigrof5', array() );
	if ( !empty($h5_typo) ) { ?>
   	h5{
      	<?php if ( !empty($h5_typo['font-color']) )     { ?> color:<?php echo esc_attr( $h5_typo['font-color'] ) ?>; <?php } ?>
      	<?php if ( !empty($h5_typo['font-family']) )    { ?> font-family:<?php echo esc_attr( $h5_typo['font-family'] ) ?>;<?php } ?>
      	<?php if ( !empty($h5_typo['font-size']) )      { ?> font-size:<?php echo esc_attr( $h5_typo['font-size'] ) ?>;<?php } ?>
      	<?php if ( !empty($h5_typo['font-style']) )     { ?> font-style:<?php echo esc_attr( $h5_typo['font-style'] ) ?>;<?php } ?>
      	<?php if ( !empty($h5_typo['font-variant']) )   { ?> font-variant:<?php echo esc_attr( $h5_typo['font-variant'] ) ?>;<?php } ?>
      	<?php if ( !empty($h5_typo['font-weight']) )    { ?> font-weight:<?php echo esc_attr( $h5_typo['font-weight'] ) ?>;<?php } ?>
      	<?php if ( !empty($h5_typo['letter-spacing']) ) { ?> letter-spacing:<?php echo esc_attr( $h5_typo['letter-spacing'] ) ?>;<?php } ?>
      	<?php if ( !empty($h5_typo['line-height']))     { ?> line-height:<?php echo esc_attr( $h5_typo['line-height'] ) ?>;<?php } ?>
      	<?php if ( !empty($h5_typo['text-decoration'])) { ?> text-decoration:<?php echo esc_attr($h5_typo['text-decoration']) ?>;<?php } ?>
      	<?php if ( !empty($h5_typo['text-transform']))  { ?> text-transform:<?php echo esc_attr($h5_typo['text-transform']) ?>;<?php } ?>
   	}
	<?php } ?>

	<?php $h6_typo = ot_get_option( 'ninetheme_holywood_tipigrof6', array() );
	if ( !empty($h6_typo) ) { ?>
   	h6{
      	<?php if ( !empty($h6_typo['font-color']) )     { ?> color:<?php echo esc_attr( $h6_typo['font-color'] ) ?>; <?php } ?>
      	<?php if ( !empty($h6_typo['font-family']) )    { ?> font-family:<?php echo esc_attr( $h6_typo['font-family'] ) ?>;<?php } ?>
      	<?php if ( !empty($h6_typo['font-size']) )      { ?> font-size:<?php echo esc_attr( $h6_typo['font-size'] ) ?>;<?php } ?>
      	<?php if ( !empty($h6_typo['font-style']) )     { ?> font-style:<?php echo esc_attr( $h6_typo['font-style'] ) ?>;<?php } ?>
      	<?php if ( !empty($h6_typo['font-variant']) )   { ?> font-variant:<?php echo esc_attr( $h6_typo['font-variant'] ) ?>;<?php } ?>
      	<?php if ( !empty($h6_typo['font-weight']) )    { ?> font-weight:<?php echo esc_attr( $h6_typo['font-weight'] ) ?>;<?php } ?>
      	<?php if ( !empty($h6_typo['letter-spacing']) ) { ?> letter-spacing:<?php echo esc_attr( $h6_typo['letter-spacing'] ) ?>;<?php } ?>
      	<?php if ( !empty($h6_typo['line-height']))     { ?> line-height:<?php echo esc_attr( $h6_typo['line-height'] ) ?>;<?php } ?>
      	<?php if ( !empty($h6_typo['text-decoration'])) { ?> text-decoration:<?php echo esc_attr($h6_typo['text-decoration']) ?>;<?php } ?>
      	<?php if ( !empty($h6_typo['text-transform']))  { ?> text-transform:<?php echo esc_attr($h6_typo['text-transform']) ?>;<?php } ?>
   	}
	<?php } ?>

    <?php
    if ( is_page() ){
        $page_id = get_the_ID();
        $theCSS = '';
        $pageherobg = rwmb_meta( 'holywood_page_hero_background' );
    	if ( !empty( $pageherobg ) ) {
           	echo '.page-id-'.$page_id.' .hero.nt-custom-pages-header{';
                if ( !empty( $pageherobg['color'] ) ) { echo 'background-color:'.$pageherobg['color'].';';}
                if ( !empty( $pageherobg['image'] ) ) { echo 'background-image:url('.$pageherobg['image'].');';}
                if ( !empty( $pageherobg['position'] ) ) { echo 'background-position:'.$pageherobg['position'].';';}
                if ( !empty( $pageherobg['attachment'] ) ) { echo 'background-attachment:'.$pageherobg['attachment'].';';}
                if ( !empty( $pageherobg['size'] ) ) { echo 'background-size:'.$pageherobg['size'].';';}
                if ( !empty( $pageherobg['repeat'] ) ) { echo 'background-repeat:'.$pageherobg['repeat'].';';}
            echo'}';
        }

        $pageheroveralingment = rwmb_meta( 'holywood_page_hero_vertical' );
        if ( '' != $pageheroveralingment ) {
           	echo '.page-id-'.$page_id.' .hero.nt-custom-pages-header{display:flex;justify-content:center; align-items:'.$pageheroveralingment.';}';
        }
        $pageherohoralingment = rwmb_meta( 'holywood_page_hero_horizontal' );
        if ( '' != $pageherohoralingment ) {
           	echo '.page-id-'.$page_id.' .hero.nt-custom-pages-header .lj-photo-texts{text-align:'.$pageherohoralingment.'!important;}';
        }
        $pageheromask = rwmb_meta( 'holywood_page_hero_mask_color' );
        if ( '' != $pageheromask ) {
           	echo '.page-id-'.$page_id.' .nt-custom-pages-header .lj-overlay-color{background-color:'.$pageheromask.';}';
        }
        $pageheromasko = rwmb_meta( 'holywood_page_hero_mask_opacity' );
        if ( '' != $pageheromasko ) {
           	echo '.page-id-'.$page_id.' .nt-custom-pages-header .lj-overlay-color{opacity:'.$pageheromasko.';}';
        }
        $pageheropadt = rwmb_meta( 'holywood_page_hero_p_top' );
        if ( '' != $pageheropadt ) {
           	echo '.page-id-'.$page_id.' .nt-custom-pages-header{padding-top:'.$pageheropadt.'px;}';
        }
        $pageheropadb = rwmb_meta( 'holywood_page_hero_p_bottom' );
        if ( '' != $pageheropadb ) {
           	echo '.page-id-'.$page_id.' .nt-custom-pages-header{padding-bottom:'.$pageheropadb.'px;}';
        }
        $pageherotitle = rwmb_meta( 'holywood_page_hero_title_color' );
        if ( '' != $pageherotitle ) {
           	echo '.page-id-'.$page_id.' .nt-custom-pages-header .lj-photo-texts h2{color:'.$pageherotitle.';}';
        }
        $pageherotitlefs = rwmb_meta( 'holywood_page_hero_title_fs' );
        if ( '' != $pageherotitlefs ) {
           	echo '.page-id-'.$page_id.' .nt-custom-pages-header .lj-photo-texts h2{font-size:'.$pageherotitlefs.'px;}';
        }
        $pageherotitlefssm = rwmb_meta( 'holywood_page_hero_title_smfs' );
        if ( '' != $pageherotitlefssm ) {
           	echo '@media(max-width:768px){.page-id-'.$page_id.' .nt-custom-pages-header{font-size:'.$pageherotitlefs.'px;}}';
        }
        $pageherotitlefsxs = rwmb_meta( 'holywood_page_hero_title_xsfs' );
    	if ( '' != $pageherotitlefsxs ) {
           	echo '@media(max-width:480px){.page-id-'.$page_id.' .nt-custom-pages-header{font-size:'.$pageherotitlefs.'px;}}';
        }
        $pageherotitlemb = rwmb_meta( 'holywood_page_hero_title_mb' );
        if ( '' != $pageherotitlemb ) {
           	echo '.page-id-'.$page_id.' .nt-custom-pages-header .lj-photo-texts h2{margin-bottom:'.$pageherotitlemb.'px;}';
        }
        $pageherosubtitle = rwmb_meta( 'holywood_page_hero_subtitle_color' );
        if ( '' != $pageherosubtitle ) {
           	echo '.page-id-'.$page_id.' .nt-custom-pages-header .lj-photo-texts p{color:'.$pageherosubtitle.';}';
        }
        $pagecontentpt = rwmb_meta( 'holywood_page_content_pt' );
        if ( '' != $pagecontentpt ) {
           	echo '.page-id-'.$page_id.' #blog.nt-page-content-wrapper{padding-top:'.$pagecontentpt.'px;}';
        }
        $pagecontentpb = rwmb_meta( 'holywood_page_content_pb' );
        if ( '' != $pagecontentpb ) {
           	echo '.page-id-'.$page_id.' #blog.nt-page-content-wrapper{padding-bottom:'.$pagecontentpb.'px;}';
        }
        $pagecontentbgclr = rwmb_meta( 'holywood_page_content_bgclr' );
        if ( '' != $pagecontentbgclr ) {
           	echo '.page-id-'.$page_id.' #blog.nt-page-content-wrapper{background-color:'.$pagecontentbgclr.';}';
        }

        $pageherominh = rwmb_meta( 'holywood_page_hero_minh' );
        $pageherosmminh = rwmb_meta( 'holywood_page_hero_smminh' );
        $pageheroxsminh = rwmb_meta( 'holywood_page_hero_xsminh' );
    	if ( '' != $pageherominh ) {
           	echo '.page-id-'.$page_id.' .nt-custom-pages-header{height:'.$pageherominh.'vh;}';
        }
    	if ( '' != $pageherosmminh ) {
           	echo '@media(max-width:768px){.page-id-'.$page_id.' .nt-custom-pages-header{height:'.$pageherosmminh.'vh;}}';
        }
    	if ( '' != $pageheroxsminh ) {
           	echo '@media(max-width:480px){.page-id-'.$page_id.' .nt-custom-pages-header{height:'.$pageheroxsminh.'vh;}}';
        }
    }
    ?>

	<?php if(ot_get_option('additionalcss')) { echo  ot_get_option( 'additionalcss' ) ; } ?>



	</style>

<?php }
add_action('wp_head','holywood_custom_styling');
