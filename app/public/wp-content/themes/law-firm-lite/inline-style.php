<?php

	$law_firm_lite_first_color = get_theme_mod('law_firm_lite_first_color');

	$law_firm_lite_custom_css = '';

	/*------------------------------ Global First Color -----------*/
	if($law_firm_lite_first_color != false){
		$law_firm_lite_custom_css .='.top-bar i,.top-bar i.far.fa-clock:after, .top-bar i.fas.fa-map-marker-alt:after,.top-btn a,.more-btn i,.con-box,.social-icon .custom-social-icons i:hover,.box:before,#sidebar .custom-social-icons i, #footer .custom-social-icons i,input[type="submit"],#footer .tagcloud a:hover,#footer-2,#sidebar h3,.pagination .current,.pagination a:hover, #sidebar .tagcloud a:hover, #comments input[type="submit"], #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .scrollup i, #comments a.comment-reply-link, .toggle-nav i, #sidebar .widget_price_filter .ui-slider .ui-slider-range, #sidebar .widget_price_filter .ui-slider .ui-slider-handle, #sidebar .woocommerce-product-search button, #footer .widget_price_filter .ui-slider .ui-slider-range, #footer .widget_price_filter .ui-slider .ui-slider-handle, #footer .woocommerce-product-search button, .more-button i, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .nav-previous a:hover, .nav-next a:hover, .wp-block-button .wp-block-button__link:hover{';
			$law_firm_lite_custom_css .='background-color: '.esc_attr($law_firm_lite_first_color).';';
		$law_firm_lite_custom_css .='}';
	}
	if($law_firm_lite_first_color != false){
		$law_firm_lite_custom_css .='#slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover{';
			$law_firm_lite_custom_css .='border-color: '.esc_attr($law_firm_lite_first_color).';';
		$law_firm_lite_custom_css .='}';
	}
	if($law_firm_lite_first_color != false){
		$law_firm_lite_custom_css .='a, .heading-box p, #footer .custom-social-icons i:hover, .post-main-box:hover h2, .scrollup, #sidebar ul li a:hover, .post-navigation a:hover, .post-navigation a:focus, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, #footer li a:hover, .post-main-box:hover h2 a, .entry-content a, #sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover{';
			$law_firm_lite_custom_css .='color: '.esc_attr($law_firm_lite_first_color).';';
		$law_firm_lite_custom_css .='}';
	}
	if($law_firm_lite_first_color != false){
		$law_firm_lite_custom_css .='.main-navigation ul ul{';
			$law_firm_lite_custom_css .='border-top-color: '.esc_attr($law_firm_lite_first_color).';';
		$law_firm_lite_custom_css .='}';
	}
	if($law_firm_lite_first_color != false){
		$law_firm_lite_custom_css .='.middle-header, .header-fixed, .main-navigation ul ul{';
			$law_firm_lite_custom_css .='border-bottom-color: '.esc_attr($law_firm_lite_first_color).';';
		$law_firm_lite_custom_css .='}';
	}

	$law_firm_lite_custom_css .='@media screen and (max-width:1000px) {';
		if($law_firm_lite_first_color != false){
			$law_firm_lite_custom_css .='.search-box i{
			background-color:'.esc_attr($law_firm_lite_first_color).';
			}';
		}
	$law_firm_lite_custom_css .='}';

	/*------------------------------ Global Second Color -----------*/

	$law_firm_lite_second_color = get_theme_mod('law_firm_lite_second_color');
	
	if($law_firm_lite_second_color != false){
		$law_firm_lite_custom_css .=' .top-bar,.more-btn a,.social-icon .custom-social-icons i,#footer,.pagination span, .pagination a,#sidebar .custom-social-icons i:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce span.onsale, #footer a.custom_read_more, #sidebar a.custom_read_more, .woocommerce nav.woocommerce-pagination ul li a, .nav-previous a, .nav-next a, .wp-block-button__link{';
			$law_firm_lite_custom_css .='background-color: '.esc_attr($law_firm_lite_second_color).';';
		$law_firm_lite_custom_css .='}';
	}
	if($law_firm_lite_second_color != false){
		$law_firm_lite_custom_css .='#slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, .woocommerce .quantity .qty{';
			$law_firm_lite_custom_css .='border-color: '.esc_attr($law_firm_lite_second_color).';';
		$law_firm_lite_custom_css .='}';
	}
	if($law_firm_lite_second_color != false){
		$law_firm_lite_custom_css .='.woocommerce-message, .woocommerce-info{';
			$law_firm_lite_custom_css .='border-top-color: '.esc_attr($law_firm_lite_second_color).';';
		$law_firm_lite_custom_css .='}';
	}
	if($law_firm_lite_second_color != false){
		$law_firm_lite_custom_css .='h1, h2, h3, h4, h5, h6,.logo h1 a,#slider .inner_carousel h1 a,#slider .inner_carousel p,.post-main-box h2,.top-btn a:hover, input[type="submit"], #sidebar caption, .post-navigation a, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, h2.woocommerce-loop-product__title, .woocommerce div.product .product_title, .woocommerce-message::before, .woocommerce-info::before, .woocommerce .quantity .qty, .post-main-box h2 a, .main-navigation a, .main-navigation ul ul a, .logo h1 a, .logo p.site-title a, .search-box i{';
			$law_firm_lite_custom_css .='color: '.esc_attr($law_firm_lite_second_color).';';
		$law_firm_lite_custom_css .='}';
	}
	if($law_firm_lite_second_color != false){
		$law_firm_lite_custom_css .='nav.woocommerce-MyAccount-navigation ul li{
		box-shadow: 2px 2px 0 0 '.esc_attr($law_firm_lite_second_color).';
		}';
	}

	/*---------------------------Width Layout -------------------*/

	$law_firm_lite_theme_lay = get_theme_mod( 'law_firm_lite_width_option','Full Width');
    if($law_firm_lite_theme_lay == 'Boxed'){
		$law_firm_lite_custom_css .='body{';
			$law_firm_lite_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$law_firm_lite_custom_css .='}';
	}else if($law_firm_lite_theme_lay == 'Wide Width'){
		$law_firm_lite_custom_css .='body{';
			$law_firm_lite_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$law_firm_lite_custom_css .='}';
	}else if($law_firm_lite_theme_lay == 'Full Width'){
		$law_firm_lite_custom_css .='body{';
			$law_firm_lite_custom_css .='max-width: 100%;';
		$law_firm_lite_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$law_firm_lite_theme_lay = get_theme_mod( 'law_firm_lite_slider_opacity_color','0.3');
	if($law_firm_lite_theme_lay == '0'){
		$law_firm_lite_custom_css .='#slider img{';
			$law_firm_lite_custom_css .='opacity:0';
		$law_firm_lite_custom_css .='}';
		}else if($law_firm_lite_theme_lay == '0.1'){
		$law_firm_lite_custom_css .='#slider img{';
			$law_firm_lite_custom_css .='opacity:0.1';
		$law_firm_lite_custom_css .='}';
		}else if($law_firm_lite_theme_lay == '0.2'){
		$law_firm_lite_custom_css .='#slider img{';
			$law_firm_lite_custom_css .='opacity:0.2';
		$law_firm_lite_custom_css .='}';
		}else if($law_firm_lite_theme_lay == '0.3'){
		$law_firm_lite_custom_css .='#slider img{';
			$law_firm_lite_custom_css .='opacity:0.3';
		$law_firm_lite_custom_css .='}';
		}else if($law_firm_lite_theme_lay == '0.4'){
		$law_firm_lite_custom_css .='#slider img{';
			$law_firm_lite_custom_css .='opacity:0.4';
		$law_firm_lite_custom_css .='}';
		}else if($law_firm_lite_theme_lay == '0.5'){
		$law_firm_lite_custom_css .='#slider img{';
			$law_firm_lite_custom_css .='opacity:0.5';
		$law_firm_lite_custom_css .='}';
		}else if($law_firm_lite_theme_lay == '0.6'){
		$law_firm_lite_custom_css .='#slider img{';
			$law_firm_lite_custom_css .='opacity:0.6';
		$law_firm_lite_custom_css .='}';
		}else if($law_firm_lite_theme_lay == '0.7'){
		$law_firm_lite_custom_css .='#slider img{';
			$law_firm_lite_custom_css .='opacity:0.7';
		$law_firm_lite_custom_css .='}';
		}else if($law_firm_lite_theme_lay == '0.8'){
		$law_firm_lite_custom_css .='#slider img{';
			$law_firm_lite_custom_css .='opacity:0.8';
		$law_firm_lite_custom_css .='}';
		}else if($law_firm_lite_theme_lay == '0.9'){
		$law_firm_lite_custom_css .='#slider img{';
			$law_firm_lite_custom_css .='opacity:0.9';
		$law_firm_lite_custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$law_firm_lite_theme_lay = get_theme_mod( 'law_firm_lite_slider_content_option','Left');
    if($law_firm_lite_theme_lay == 'Left'){
		$law_firm_lite_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$law_firm_lite_custom_css .='text-align:left; left:10%; right:45%;';
		$law_firm_lite_custom_css .='}';
	}else if($law_firm_lite_theme_lay == 'Center'){
		$law_firm_lite_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$law_firm_lite_custom_css .='text-align:center; left:20%; right:20%;';
		$law_firm_lite_custom_css .='}';
	}else if($law_firm_lite_theme_lay == 'Right'){
		$law_firm_lite_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$law_firm_lite_custom_css .='text-align:right; left:45%; right:10%;';
		$law_firm_lite_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$law_firm_lite_slider_height = get_theme_mod('law_firm_lite_slider_height');
	if($law_firm_lite_slider_height != false){
		$law_firm_lite_custom_css .='#slider img{';
			$law_firm_lite_custom_css .='height: '.esc_attr($law_firm_lite_slider_height).';';
		$law_firm_lite_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$law_firm_lite_theme_lay = get_theme_mod( 'law_firm_lite_blog_layout_option','Default');
    if($law_firm_lite_theme_lay == 'Default'){
		$law_firm_lite_custom_css .='.post-main-box{';
			$law_firm_lite_custom_css .='';
		$law_firm_lite_custom_css .='}';
	}else if($law_firm_lite_theme_lay == 'Center'){
		$law_firm_lite_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$law_firm_lite_custom_css .='text-align:center;';
		$law_firm_lite_custom_css .='}';
		$law_firm_lite_custom_css .='.post-info{';
			$law_firm_lite_custom_css .='margin-top:10px;';
		$law_firm_lite_custom_css .='}';
		$law_firm_lite_custom_css .='.post-info hr{';
			$law_firm_lite_custom_css .='margin:10px auto;';
		$law_firm_lite_custom_css .='}';
	}else if($law_firm_lite_theme_lay == 'Left'){
		$law_firm_lite_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$law_firm_lite_custom_css .='text-align:Left;';
		$law_firm_lite_custom_css .='}';
		$law_firm_lite_custom_css .='.post-info hr{';
			$law_firm_lite_custom_css .='margin-bottom:10px;';
		$law_firm_lite_custom_css .='}';
		$law_firm_lite_custom_css .='.post-main-box h2{';
			$law_firm_lite_custom_css .='margin-top:10px;';
		$law_firm_lite_custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$law_firm_lite_resp_topbar = get_theme_mod( 'law_firm_lite_resp_topbar_hide_show',false);
    if($law_firm_lite_resp_topbar == true){
    	$law_firm_lite_custom_css .='@media screen and (max-width:575px) {';
		$law_firm_lite_custom_css .='.top-bar{';
			$law_firm_lite_custom_css .='display:block;';
		$law_firm_lite_custom_css .='} }';
	}else if($law_firm_lite_resp_topbar == false){
		$law_firm_lite_custom_css .='@media screen and (max-width:575px) {';
		$law_firm_lite_custom_css .='.top-bar{';
			$law_firm_lite_custom_css .='display:none;';
		$law_firm_lite_custom_css .='} }';
	}

	$law_firm_lite_resp_stickyheader = get_theme_mod( 'law_firm_lite_stickyheader_hide_show',false);
    if($law_firm_lite_resp_stickyheader == true){
    	$law_firm_lite_custom_css .='@media screen and (max-width:575px) {';
		$law_firm_lite_custom_css .='.header-fixed{';
			$law_firm_lite_custom_css .='display:block;';
		$law_firm_lite_custom_css .='} }';
	}else if($law_firm_lite_resp_stickyheader == false){
		$law_firm_lite_custom_css .='@media screen and (max-width:575px) {';
		$law_firm_lite_custom_css .='.header-fixed{';
			$law_firm_lite_custom_css .='display:none;';
		$law_firm_lite_custom_css .='} }';
	}

	$law_firm_lite_resp_slider = get_theme_mod( 'law_firm_lite_resp_slider_hide_show',false);
    if($law_firm_lite_resp_slider == true){
    	$law_firm_lite_custom_css .='@media screen and (max-width:575px) {';
		$law_firm_lite_custom_css .='#slider{';
			$law_firm_lite_custom_css .='display:block;';
		$law_firm_lite_custom_css .='} }';
	}else if($law_firm_lite_resp_slider == false){
		$law_firm_lite_custom_css .='@media screen and (max-width:575px) {';
		$law_firm_lite_custom_css .='#slider{';
			$law_firm_lite_custom_css .='display:none;';
		$law_firm_lite_custom_css .='} }';
	}

	$law_firm_lite_resp_metabox = get_theme_mod( 'law_firm_lite_metabox_hide_show',true);
    if($law_firm_lite_resp_metabox == true){
    	$law_firm_lite_custom_css .='@media screen and (max-width:575px) {';
		$law_firm_lite_custom_css .='.post-info{';
			$law_firm_lite_custom_css .='display:block;';
		$law_firm_lite_custom_css .='} }';
	}else if($law_firm_lite_resp_metabox == false){
		$law_firm_lite_custom_css .='@media screen and (max-width:575px) {';
		$law_firm_lite_custom_css .='.post-info{';
			$law_firm_lite_custom_css .='display:none;';
		$law_firm_lite_custom_css .='} }';
	}

	$law_firm_lite_resp_sidebar = get_theme_mod( 'law_firm_lite_sidebar_hide_show',true);
    if($law_firm_lite_resp_sidebar == true){
    	$law_firm_lite_custom_css .='@media screen and (max-width:575px) {';
		$law_firm_lite_custom_css .='#sidebar{';
			$law_firm_lite_custom_css .='display:block;';
		$law_firm_lite_custom_css .='} }';
	}else if($law_firm_lite_resp_sidebar == false){
		$law_firm_lite_custom_css .='@media screen and (max-width:575px) {';
		$law_firm_lite_custom_css .='#sidebar{';
			$law_firm_lite_custom_css .='display:none;';
		$law_firm_lite_custom_css .='} }';
	}

	$law_firm_lite_resp_scroll_top = get_theme_mod( 'law_firm_lite_resp_scroll_top_hide_show',true);
    if($law_firm_lite_resp_scroll_top == true){
    	$law_firm_lite_custom_css .='@media screen and (max-width:575px) {';
		$law_firm_lite_custom_css .='.scrollup i{';
			$law_firm_lite_custom_css .='display:block;';
		$law_firm_lite_custom_css .='} }';
	}else if($law_firm_lite_resp_scroll_top == false){
		$law_firm_lite_custom_css .='@media screen and (max-width:575px) {';
		$law_firm_lite_custom_css .='.scrollup i{';
			$law_firm_lite_custom_css .='display:none !important;';
		$law_firm_lite_custom_css .='} }';
	}

	/*------------- Top Bar Settings ------------------*/

	$law_firm_lite_topbar_padding_top_bottom = get_theme_mod('law_firm_lite_topbar_padding_top_bottom');
	if($law_firm_lite_topbar_padding_top_bottom != false){
		$law_firm_lite_custom_css .='.top-bar{';
			$law_firm_lite_custom_css .='padding-top: '.esc_attr($law_firm_lite_topbar_padding_top_bottom).'; padding-bottom: '.esc_attr($law_firm_lite_topbar_padding_top_bottom).';';
		$law_firm_lite_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$law_firm_lite_sticky_header_padding = get_theme_mod('law_firm_lite_sticky_header_padding');
	if($law_firm_lite_sticky_header_padding != false){
		$law_firm_lite_custom_css .='.header-fixed{';
			$law_firm_lite_custom_css .='padding: '.esc_attr($law_firm_lite_sticky_header_padding).';';
		$law_firm_lite_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$law_firm_lite_search_font_size = get_theme_mod('law_firm_lite_search_font_size');
	if($law_firm_lite_search_font_size != false){
		$law_firm_lite_custom_css .='.search-box i{';
			$law_firm_lite_custom_css .='font-size: '.esc_attr($law_firm_lite_search_font_size).';';
		$law_firm_lite_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$law_firm_lite_button_padding_top_bottom = get_theme_mod('law_firm_lite_button_padding_top_bottom');
	$law_firm_lite_button_padding_left_right = get_theme_mod('law_firm_lite_button_padding_left_right');
	if($law_firm_lite_button_padding_top_bottom != false || $law_firm_lite_button_padding_left_right != false){
		$law_firm_lite_custom_css .='.post-main-box .more-btn a{';
			$law_firm_lite_custom_css .='padding-top: '.esc_attr($law_firm_lite_button_padding_top_bottom).'; padding-bottom: '.esc_attr($law_firm_lite_button_padding_top_bottom).';padding-left: '.esc_attr($law_firm_lite_button_padding_left_right).';padding-right: '.esc_attr($law_firm_lite_button_padding_left_right).';';
		$law_firm_lite_custom_css .='}';
	}

	$law_firm_lite_button_border_radius = get_theme_mod('law_firm_lite_button_border_radius');
	if($law_firm_lite_button_border_radius != false){
		$law_firm_lite_custom_css .='.post-main-box .more-btn a{';
			$law_firm_lite_custom_css .='border-radius: '.esc_attr($law_firm_lite_button_border_radius).'px;';
		$law_firm_lite_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$law_firm_lite_single_blog_post_navigation_show_hide = get_theme_mod('law_firm_lite_single_blog_post_navigation_show_hide',true);
	if($law_firm_lite_single_blog_post_navigation_show_hide != true){
		$law_firm_lite_custom_css .='.post-navigation{';
			$law_firm_lite_custom_css .='display: none;';
		$law_firm_lite_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$law_firm_lite_copyright_alingment = get_theme_mod('law_firm_lite_copyright_alingment');
	if($law_firm_lite_copyright_alingment != false){
		$law_firm_lite_custom_css .='.copyright p{';
			$law_firm_lite_custom_css .='text-align: '.esc_attr($law_firm_lite_copyright_alingment).';';
		$law_firm_lite_custom_css .='}';
	}

	$law_firm_lite_copyright_padding_top_bottom = get_theme_mod('law_firm_lite_copyright_padding_top_bottom');
	if($law_firm_lite_copyright_padding_top_bottom != false){
		$law_firm_lite_custom_css .='#footer-2{';
			$law_firm_lite_custom_css .='padding-top: '.esc_attr($law_firm_lite_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($law_firm_lite_copyright_padding_top_bottom).';';
		$law_firm_lite_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$law_firm_lite_scroll_to_top_font_size = get_theme_mod('law_firm_lite_scroll_to_top_font_size');
	if($law_firm_lite_scroll_to_top_font_size != false){
		$law_firm_lite_custom_css .='.scrollup i{';
			$law_firm_lite_custom_css .='font-size: '.esc_attr($law_firm_lite_scroll_to_top_font_size).';';
		$law_firm_lite_custom_css .='}';
	}

	$law_firm_lite_scroll_to_top_padding = get_theme_mod('law_firm_lite_scroll_to_top_padding');
	$law_firm_lite_scroll_to_top_padding = get_theme_mod('law_firm_lite_scroll_to_top_padding');
	if($law_firm_lite_scroll_to_top_padding != false){
		$law_firm_lite_custom_css .='.scrollup i{';
			$law_firm_lite_custom_css .='padding-top: '.esc_attr($law_firm_lite_scroll_to_top_padding).';padding-bottom: '.esc_attr($law_firm_lite_scroll_to_top_padding).';';
		$law_firm_lite_custom_css .='}';
	}

	$law_firm_lite_scroll_to_top_width = get_theme_mod('law_firm_lite_scroll_to_top_width');
	if($law_firm_lite_scroll_to_top_width != false){
		$law_firm_lite_custom_css .='.scrollup i{';
			$law_firm_lite_custom_css .='width: '.esc_attr($law_firm_lite_scroll_to_top_width).';';
		$law_firm_lite_custom_css .='}';
	}

	$law_firm_lite_scroll_to_top_height = get_theme_mod('law_firm_lite_scroll_to_top_height');
	if($law_firm_lite_scroll_to_top_height != false){
		$law_firm_lite_custom_css .='.scrollup i{';
			$law_firm_lite_custom_css .='height: '.esc_attr($law_firm_lite_scroll_to_top_height).';';
		$law_firm_lite_custom_css .='}';
	}

	$law_firm_lite_scroll_to_top_border_radius = get_theme_mod('law_firm_lite_scroll_to_top_border_radius');
	if($law_firm_lite_scroll_to_top_border_radius != false){
		$law_firm_lite_custom_css .='.scrollup i{';
			$law_firm_lite_custom_css .='border-radius: '.esc_attr($law_firm_lite_scroll_to_top_border_radius).'px;';
		$law_firm_lite_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$law_firm_lite_social_icon_font_size = get_theme_mod('law_firm_lite_social_icon_font_size');
	if($law_firm_lite_social_icon_font_size != false){
		$law_firm_lite_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$law_firm_lite_custom_css .='font-size: '.esc_attr($law_firm_lite_social_icon_font_size).';';
		$law_firm_lite_custom_css .='}';
	}

	$law_firm_lite_social_icon_padding = get_theme_mod('law_firm_lite_social_icon_padding');
	if($law_firm_lite_social_icon_padding != false){
		$law_firm_lite_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$law_firm_lite_custom_css .='padding: '.esc_attr($law_firm_lite_social_icon_padding).';';
		$law_firm_lite_custom_css .='}';
	}

	$law_firm_lite_social_icon_width = get_theme_mod('law_firm_lite_social_icon_width');
	if($law_firm_lite_social_icon_width != false){
		$law_firm_lite_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$law_firm_lite_custom_css .='width: '.esc_attr($law_firm_lite_social_icon_width).';';
		$law_firm_lite_custom_css .='}';
	}

	$law_firm_lite_social_icon_height = get_theme_mod('law_firm_lite_social_icon_height');
	if($law_firm_lite_social_icon_height != false){
		$law_firm_lite_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$law_firm_lite_custom_css .='height: '.esc_attr($law_firm_lite_social_icon_height).';';
		$law_firm_lite_custom_css .='}';
	}

	$law_firm_lite_social_icon_border_radius = get_theme_mod('law_firm_lite_social_icon_border_radius');
	if($law_firm_lite_social_icon_border_radius != false){
		$law_firm_lite_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$law_firm_lite_custom_css .='border-radius: '.esc_attr($law_firm_lite_social_icon_border_radius).'px;';
		$law_firm_lite_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$law_firm_lite_products_padding_top_bottom = get_theme_mod('law_firm_lite_products_padding_top_bottom');
	if($law_firm_lite_products_padding_top_bottom != false){
		$law_firm_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$law_firm_lite_custom_css .='padding-top: '.esc_attr($law_firm_lite_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($law_firm_lite_products_padding_top_bottom).'!important;';
		$law_firm_lite_custom_css .='}';
	}

	$law_firm_lite_products_padding_left_right = get_theme_mod('law_firm_lite_products_padding_left_right');
	if($law_firm_lite_products_padding_left_right != false){
		$law_firm_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$law_firm_lite_custom_css .='padding-left: '.esc_attr($law_firm_lite_products_padding_left_right).'!important; padding-right: '.esc_attr($law_firm_lite_products_padding_left_right).'!important;';
		$law_firm_lite_custom_css .='}';
	}

	$law_firm_lite_products_box_shadow = get_theme_mod('law_firm_lite_products_box_shadow');
	if($law_firm_lite_products_box_shadow != false){
		$law_firm_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$law_firm_lite_custom_css .='box-shadow: '.esc_attr($law_firm_lite_products_box_shadow).'px '.esc_attr($law_firm_lite_products_box_shadow).'px '.esc_attr($law_firm_lite_products_box_shadow).'px #ddd;';
		$law_firm_lite_custom_css .='}';
	}

	$law_firm_lite_products_border_radius = get_theme_mod('law_firm_lite_products_border_radius');
	if($law_firm_lite_products_border_radius != false){
		$law_firm_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$law_firm_lite_custom_css .='border-radius: '.esc_attr($law_firm_lite_products_border_radius).'px;';
		$law_firm_lite_custom_css .='}';
	}