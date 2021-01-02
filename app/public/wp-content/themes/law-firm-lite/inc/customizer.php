<?php
/**
 * Law Firm Lite Theme Customizer
 *
 * @package Law Firm Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function law_firm_lite_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'law_firm_lite_custom_controls' );

function law_firm_lite_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'law_firm_lite_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'law_firm_lite_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$LawFirmLiteParentPanel = new Law_Firm_Lite_WP_Customize_Panel( $wp_customize, 'law_firm_lite_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'law-firm-lite' ),
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'law_firm_lite_left_right', array(
    	'title'      => esc_html__( 'General Settings', 'law-firm-lite' ),
		'panel' => 'law_firm_lite_panel_id'
	) );

	$wp_customize->add_setting('law_firm_lite_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'law_firm_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Law_Firm_Lite_Image_Radio_Control($wp_customize, 'law_firm_lite_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','law-firm-lite'),
        'description' => __('Here you can change the width layout of Website.','law-firm-lite'),
        'section' => 'law_firm_lite_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/assets/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/assets/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/assets/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('law_firm_lite_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'law_firm_lite_sanitize_choices'	        
	) );
	$wp_customize->add_control('law_firm_lite_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','law-firm-lite'),
        'description' => __('Here you can change the sidebar layout for posts. ','law-firm-lite'),
        'section' => 'law_firm_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','law-firm-lite'),
            'Right Sidebar' => __('Right Sidebar','law-firm-lite'),
            'One Column' => __('One Column','law-firm-lite'),
            'Three Columns' => __('Three Columns','law-firm-lite'),
            'Four Columns' => __('Four Columns','law-firm-lite'),
            'Grid Layout' => __('Grid Layout','law-firm-lite')
        ),
	));

	$wp_customize->add_setting('law_firm_lite_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'law_firm_lite_sanitize_choices'
	));
	$wp_customize->add_control('law_firm_lite_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','law-firm-lite'),
        'description' => __('Here you can change the sidebar layout for pages. ','law-firm-lite'),
        'section' => 'law_firm_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','law-firm-lite'),
            'Right Sidebar' => __('Right Sidebar','law-firm-lite'),
            'One Column' => __('One Column','law-firm-lite')
        ),
	) );

	//Pre-Loader
	$wp_customize->add_setting( 'law_firm_lite_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'law_firm_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Law_Firm_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'law_firm_lite_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','law-firm-lite' ),
        'section' => 'law_firm_lite_left_right'
    )));

	$wp_customize->add_setting('law_firm_lite_loader_icon',array(
        'default' => 'Two Way',
        'sanitize_callback' => 'law_firm_lite_sanitize_choices'
	));
	$wp_customize->add_control('law_firm_lite_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','law-firm-lite'),
        'section' => 'law_firm_lite_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','law-firm-lite'),
            'Dots' => __('Dots','law-firm-lite'),
            'Rotate' => __('Rotate','law-firm-lite')
        ),
	) );

	//Top Bar
	$wp_customize->add_section( 'law_firm_lite_topbar', array(
    	'title'      => __( 'Top Bar Settings', 'law-firm-lite' ),
		'panel' => 'law_firm_lite_panel_id'
	) );

	$wp_customize->add_setting( 'law_firm_lite_topbar_hide_show',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'law_firm_lite_switch_sanitization'
    ));
    $wp_customize->add_control( new Law_Firm_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'law_firm_lite_topbar_hide_show',array(
		'label' => esc_html__( 'Show / Hide Topbar','law-firm-lite' ),
		'section' => 'law_firm_lite_topbar'
    )));

    $wp_customize->add_setting('law_firm_lite_topbar_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_topbar_padding_top_bottom',array(
		'label'	=> __('Topbar Padding Top Bottom','law-firm-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_topbar',
		'type'=> 'text'
	));

    //Sticky Header
	$wp_customize->add_setting( 'law_firm_lite_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'law_firm_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Law_Firm_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'law_firm_lite_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','law-firm-lite' ),
        'section' => 'law_firm_lite_topbar'
    )));

    $wp_customize->add_setting('law_firm_lite_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','law-firm-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'law_firm_lite_header_search',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'law_firm_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Law_Firm_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'law_firm_lite_header_search',array(
      	'label' => esc_html__( 'Show / Hide Search','law-firm-lite' ),
      	'section' => 'law_firm_lite_topbar'
    )));

    $wp_customize->add_setting('law_firm_lite_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_search_font_size',array(
		'label'	=> __('Search Font Size','law-firm-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_topbar',
		'type'=> 'text'
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('law_firm_lite_location', array( 
		'selector' => '.top-bar p', 
		'render_callback' => 'law_firm_lite_customize_partial_law_firm_lite_location', 
	));

    $wp_customize->add_setting('law_firm_lite_location_address_icon',array(
		'default'	=> 'fas fa-map-marker-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Law_Firm_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'law_firm_lite_location_address_icon',array(
		'label'	=> __('Add Location Icon','law-firm-lite'),
		'transport' => 'refresh',
		'section'	=> 'law_firm_lite_topbar',
		'setting'	=> 'law_firm_lite_location_address_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('law_firm_lite_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_location',array(
		'label'	=> __('Add Location','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( '123 Dunmmy street lorem ipsum, USA', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('law_firm_lite_timing_icon',array(
		'default'	=> 'far fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Law_Firm_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'law_firm_lite_timing_icon',array(
		'label'	=> __('Add Timing Icon','law-firm-lite'),
		'transport' => 'refresh',
		'section'	=> 'law_firm_lite_topbar',
		'setting'	=> 'law_firm_lite_timing_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('law_firm_lite_open_time',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_open_time',array(
		'label'	=> __('Add Opening Time','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Mon to Sat 9:00am - 8:00pm', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('law_firm_lite_top_btn_icon',array(
		'default'	=> 'fas fa-gavel',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Law_Firm_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'law_firm_lite_top_btn_icon',array(
		'label'	=> __('Add Button Icon','law-firm-lite'),
		'transport' => 'refresh',
		'section'	=> 'law_firm_lite_topbar',
		'setting'	=> 'law_firm_lite_top_btn_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('law_firm_lite_top_btn_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_top_btn_text',array(
		'label'	=> __('Add Button Text','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'FREE EVALUATION', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('law_firm_lite_top_btn_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('law_firm_lite_top_btn_url',array(
		'label'	=> __('Add Button URL','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'https://example.com/', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_topbar',
		'type'=> 'url'
	));
    
	//Slider
	$wp_customize->add_section( 'law_firm_lite_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'law-firm-lite' ),
		'panel' => 'law_firm_lite_panel_id'
	) );

	$wp_customize->add_setting( 'law_firm_lite_slider_arrows',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'law_firm_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Law_Firm_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'law_firm_lite_slider_arrows',array(
      	'label' => esc_html__( 'Show / Hide Slider','law-firm-lite' ),
      	'section' => 'law_firm_lite_slidersettings'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('law_firm_lite_slider_arrows',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'law_firm_lite_customize_partial_law_firm_lite_slider_arrows',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'law_firm_lite_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'law_firm_lite_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'law_firm_lite_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'law-firm-lite' ),
			'description' => __('Slider image size (1500 x 800)','law-firm-lite'),
			'section'  => 'law_firm_lite_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('law_firm_lite_slider_button_icon',array(
		'default'	=> 'fas fa-gavel',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Law_Firm_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'law_firm_lite_slider_button_icon',array(
		'label'	=> __('Add Slider Button Icon','law-firm-lite'),
		'transport' => 'refresh',
		'section'	=> 'law_firm_lite_slidersettings',
		'setting'	=> 'law_firm_lite_slider_button_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('law_firm_lite_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_slidersettings',
		'type'=> 'text'
	));

	//content layout
	$wp_customize->add_setting('law_firm_lite_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'law_firm_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Law_Firm_Lite_Image_Radio_Control($wp_customize, 'law_firm_lite_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','law-firm-lite'),
        'section' => 'law_firm_lite_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/assets/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/assets/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'law_firm_lite_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'law_firm_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'law_firm_lite_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','law-firm-lite' ),
		'section'     => 'law_firm_lite_slidersettings',
		'type'        => 'range',
		'settings'    => 'law_firm_lite_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('law_firm_lite_slider_opacity_color',array(
      'default'              => 0.3,
      'sanitize_callback' => 'law_firm_lite_sanitize_choices'
	));

	$wp_customize->add_control( 'law_firm_lite_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','law-firm-lite' ),
	'section'     => 'law_firm_lite_slidersettings',
	'type'        => 'select',
	'settings'    => 'law_firm_lite_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','law-firm-lite'),
      '0.1' =>  esc_attr('0.1','law-firm-lite'),
      '0.2' =>  esc_attr('0.2','law-firm-lite'),
      '0.3' =>  esc_attr('0.3','law-firm-lite'),
      '0.4' =>  esc_attr('0.4','law-firm-lite'),
      '0.5' =>  esc_attr('0.5','law-firm-lite'),
      '0.6' =>  esc_attr('0.6','law-firm-lite'),
      '0.7' =>  esc_attr('0.7','law-firm-lite'),
      '0.8' =>  esc_attr('0.8','law-firm-lite'),
      '0.9' =>  esc_attr('0.9','law-firm-lite')
	),
	));

	//Slider height
	$wp_customize->add_setting('law_firm_lite_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_slider_height',array(
		'label'	=> __('Slider Height','law-firm-lite'),
		'description'	=> __('Specify the slider height (px).','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'law_firm_lite_slider_speed', array(
		'default'  => 3000,
		'sanitize_callback'	=> 'law_firm_lite_sanitize_float'
	) );
	$wp_customize->add_control( 'law_firm_lite_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','law-firm-lite'),
		'section' => 'law_firm_lite_slidersettings',
		'type'  => 'number',
	) );

	//Contact
	$wp_customize->add_section( 'law_firm_lite_contact', array(
    	'title'      => __( 'Contact Settings', 'law-firm-lite' ),
		'panel' => 'law_firm_lite_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'law_firm_lite_calling_text', array( 
		'selector' => '.con-box p', 
		'render_callback' => 'law_firm_lite_customize_partial_law_firm_lite_calling_text',
	));

	$wp_customize->add_setting('law_firm_lite_call_no_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Law_Firm_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'law_firm_lite_call_no_icon',array(
		'label'	=> __('Add Call Icon','law-firm-lite'),
		'transport' => 'refresh',
		'section'	=> 'law_firm_lite_contact',
		'setting'	=> 'law_firm_lite_call_no_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('law_firm_lite_calling_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_calling_text',array(
		'label'	=> __('Add Calling Text','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Call us for free consultation', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_contact',
		'type'=> 'text'
	));

	$wp_customize->add_setting('law_firm_lite_calling_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'law_firm_lite_sanitize_phone_number'
	));
	$wp_customize->add_control('law_firm_lite_calling_number',array(
		'label'	=> __('Add Calling Number','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( '+00 1234 654 654', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_contact',
		'type'=> 'text'
	));

	$wp_customize->add_setting('law_firm_lite_email_address_icon',array(
		'default'	=> 'far fa-envelope-open',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Law_Firm_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'law_firm_lite_email_address_icon',array(
		'label'	=> __('Add Email Icon','law-firm-lite'),
		'transport' => 'refresh',
		'section'	=> 'law_firm_lite_contact',
		'setting'	=> 'law_firm_lite_email_address_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('law_firm_lite_email_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_email_text',array(
		'label'	=> __('Add Email Text','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Drop us Mail', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_contact',
		'type'=> 'text'
	));

	$wp_customize->add_setting('law_firm_lite_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'law_firm_lite_sanitize_email'
	));
	$wp_customize->add_control('law_firm_lite_email_address',array(
		'label'	=> __('Add Email Address','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'example@123.com', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_contact',
		'type'=> 'text'
	));
    
	//Our Practise Area section
	$wp_customize->add_section( 'law_firm_lite_services_section' , array(
    	'title'      => __( 'Our Practice Area', 'law-firm-lite' ),
		'priority'   => null,
		'panel' => 'law_firm_lite_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'law_firm_lite_section_title', array( 
		'selector' => '.heading-box p', 
		'render_callback' => 'law_firm_lite_customize_partial_law_firm_lite_section_title',
	));

	$wp_customize->add_setting('law_firm_lite_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_section_title',array(
		'label'	=> __('Add Section Title','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Our Practise Areas', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_services_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('law_firm_lite_section_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_section_text',array(
		'label'	=> __('Add Section Text','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'HIGH LEVEL SERVICES', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_services_section',
		'type'=> 'text'
	));

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('law_firm_lite_our_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'law_firm_lite_sanitize_choices',
	));
	$wp_customize->add_control('law_firm_lite_our_services',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Services','law-firm-lite'),
		'description' => __('Image Size (370 x 370)','law-firm-lite'),
		'section' => 'law_firm_lite_services_section',
	));

	//Practice excerpt
	$wp_customize->add_setting( 'law_firm_lite_practice_excerpt_number', array(
		'default'              => 10,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'law_firm_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'law_firm_lite_practice_excerpt_number', array(
		'label'       => esc_html__( 'Practice Excerpt length','law-firm-lite' ),
		'section'     => 'law_firm_lite_services_section',
		'type'        => 'range',
		'settings'    => 'law_firm_lite_practice_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('law_firm_lite_our_practice_button_icon',array(
		'default'	=> 'fas fa-arrow-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Law_Firm_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'law_firm_lite_our_practice_button_icon',array(
		'label'	=> __('Add Practise Button Icon','law-firm-lite'),
		'transport' => 'refresh',
		'section'	=> 'law_firm_lite_services_section',
		'setting'	=> 'law_firm_lite_our_practice_button_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('law_firm_lite_practice_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_practice_button_text',array(
		'label'	=> __('Add Practise Button Text','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Consult Now', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_services_section',
		'type'=> 'text'
	));

	//Blog Post
	$wp_customize->add_panel( $LawFirmLiteParentPanel );

	$BlogPostParentPanel = new Law_Firm_Lite_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'law-firm-lite' ),
		'panel' => 'law_firm_lite_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'law_firm_lite_post_settings', array(
		'title' => __( 'Post Settings', 'law-firm-lite' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('law_firm_lite_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'law_firm_lite_customize_partial_law_firm_lite_toggle_postdate', 
	));

	$wp_customize->add_setting( 'law_firm_lite_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'law_firm_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Law_Firm_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'law_firm_lite_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','law-firm-lite' ),
        'section' => 'law_firm_lite_post_settings'
    )));

    $wp_customize->add_setting( 'law_firm_lite_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'law_firm_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Law_Firm_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'law_firm_lite_toggle_author',array(
		'label' => esc_html__( 'Author','law-firm-lite' ),
		'section' => 'law_firm_lite_post_settings'
    )));

    $wp_customize->add_setting( 'law_firm_lite_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'law_firm_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Law_Firm_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'law_firm_lite_toggle_comments',array(
		'label' => esc_html__( 'Comments','law-firm-lite' ),
		'section' => 'law_firm_lite_post_settings'
    )));

    $wp_customize->add_setting( 'law_firm_lite_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'law_firm_lite_switch_sanitization'
	));
    $wp_customize->add_control( new Law_Firm_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'law_firm_lite_toggle_tags', array(
		'label' => esc_html__( 'Tags','law-firm-lite' ),
		'section' => 'law_firm_lite_post_settings'
    )));

    $wp_customize->add_setting( 'law_firm_lite_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'law_firm_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'law_firm_lite_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','law-firm-lite' ),
		'section'     => 'law_firm_lite_post_settings',
		'type'        => 'range',
		'settings'    => 'law_firm_lite_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('law_firm_lite_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'law_firm_lite_sanitize_choices'
    ));
    $wp_customize->add_control(new Law_Firm_Lite_Image_Radio_Control($wp_customize, 'law_firm_lite_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','law-firm-lite'),
        'section' => 'law_firm_lite_post_settings',
        'choices' => array(
            'Default' => get_template_directory_uri().'/assets/images/blog-layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/blog-layout2.png',
            'Left' => get_template_directory_uri().'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('law_firm_lite_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'law_firm_lite_sanitize_choices'
	));
	$wp_customize->add_control('law_firm_lite_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','law-firm-lite'),
        'section' => 'law_firm_lite_post_settings',
        'choices' => array(
        	'Content' => __('Content','law-firm-lite'),
            'Excerpt' => __('Excerpt','law-firm-lite'),
            'No Content' => __('No Content','law-firm-lite')
        ),
	) );

	$wp_customize->add_setting('law_firm_lite_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'law_firm_lite_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'law_firm_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Law_Firm_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'law_firm_lite_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','law-firm-lite' ),
      'section' => 'law_firm_lite_post_settings'
    )));

	$wp_customize->add_setting( 'law_firm_lite_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'law_firm_lite_sanitize_choices'
    ));
    $wp_customize->add_control( 'law_firm_lite_blog_pagination_type', array(
        'section' => 'law_firm_lite_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'law-firm-lite' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'law-firm-lite' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'law-firm-lite' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'law_firm_lite_button_settings', array(
		'title' => __( 'Button Settings', 'law-firm-lite' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('law_firm_lite_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','law-firm-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('law_firm_lite_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','law-firm-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'law_firm_lite_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'law_firm_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'law_firm_lite_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','law-firm-lite' ),
		'section'     => 'law_firm_lite_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('law_firm_lite_blog_page_button_icon',array(
		'default'	=> 'fas fa-gavel',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Law_Firm_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'law_firm_lite_blog_page_button_icon',array(
		'label'	=> __('Add Button Icon','law-firm-lite'),
		'transport' => 'refresh',
		'section'	=> 'law_firm_lite_button_settings',
		'setting'	=> 'law_firm_lite_blog_page_button_icon',
		'type'		=> 'icon'
	)));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('law_firm_lite_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'law_firm_lite_customize_partial_law_firm_lite_button_text', 
	));

    $wp_customize->add_setting('law_firm_lite_button_text',array(
		'default'=> esc_html__( 'READ MORE', 'law-firm-lite' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_button_text',array(
		'label'	=> __('Add Button Text','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'law_firm_lite_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'law-firm-lite' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('law_firm_lite_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'law_firm_lite_customize_partial_law_firm_lite_related_post_title', 
	));

    $wp_customize->add_setting( 'law_firm_lite_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'law_firm_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Law_Firm_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'law_firm_lite_related_post',array(
		'label' => esc_html__( 'Related Post','law-firm-lite' ),
		'section' => 'law_firm_lite_related_posts_settings'
    )));

    $wp_customize->add_setting('law_firm_lite_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_related_post_title',array(
		'label'	=> __('Add Related Post Title','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('law_firm_lite_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'law_firm_lite_sanitize_float'
	));
	$wp_customize->add_control('law_firm_lite_related_posts_count',array(
		'label'	=> __('Add Related Post Count','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'law_firm_lite_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'law-firm-lite' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'law_firm_lite_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'law_firm_lite_switch_sanitization'
	));
    $wp_customize->add_control( new Law_Firm_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'law_firm_lite_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Post Navigation','law-firm-lite' ),
		'section' => 'law_firm_lite_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('law_firm_lite_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('law_firm_lite_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_single_blog_settings',
		'type'=> 'text'
	));

    //404 Page Setting
	$wp_customize->add_section('law_firm_lite_404_page',array(
		'title'	=> __('404 Page Settings','law-firm-lite'),
		'panel' => 'law_firm_lite_panel_id',
	));	

	$wp_customize->add_setting('law_firm_lite_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('law_firm_lite_404_page_title',array(
		'label'	=> __('Add Title','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('law_firm_lite_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('law_firm_lite_404_page_content',array(
		'label'	=> __('Add Text','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('law_firm_lite_404_page_button_icon',array(
		'default'	=> 'fas fa-gavel',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Law_Firm_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'law_firm_lite_404_page_button_icon',array(
		'label'	=> __('Add Button Icon','law-firm-lite'),
		'transport' => 'refresh',
		'section'	=> 'law_firm_lite_404_page',
		'setting'	=> 'law_firm_lite_404_page_button_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('law_firm_lite_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_404_page_button_text',array(
		'label'	=> __('Add Button Text','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'GO BACK', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_404_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('law_firm_lite_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','law-firm-lite'),
		'panel' => 'law_firm_lite_panel_id',
	));	

	$wp_customize->add_setting('law_firm_lite_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','law-firm-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('law_firm_lite_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_social_icon_padding',array(
		'label'	=> __('Icon Padding','law-firm-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('law_firm_lite_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_social_icon_width',array(
		'label'	=> __('Icon Width','law-firm-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('law_firm_lite_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_social_icon_height',array(
		'label'	=> __('Icon Height','law-firm-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'law_firm_lite_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'law_firm_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'law_firm_lite_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','law-firm-lite' ),
		'section'     => 'law_firm_lite_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('law_firm_lite_responsive_media',array(
		'title'	=> __('Responsive Media','law-firm-lite'),
		'panel' => 'law_firm_lite_panel_id',
	));

	$wp_customize->add_setting( 'law_firm_lite_resp_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'law_firm_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Law_Firm_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'law_firm_lite_resp_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','law-firm-lite' ),
      'section' => 'law_firm_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'law_firm_lite_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'law_firm_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Law_Firm_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'law_firm_lite_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','law-firm-lite' ),
      'section' => 'law_firm_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'law_firm_lite_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'law_firm_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Law_Firm_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'law_firm_lite_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','law-firm-lite' ),
      'section' => 'law_firm_lite_responsive_media'
    )));

	$wp_customize->add_setting( 'law_firm_lite_metabox_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'law_firm_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Law_Firm_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'law_firm_lite_metabox_hide_show',array(
      'label' => esc_html__( 'Show / Hide Metabox','law-firm-lite' ),
      'section' => 'law_firm_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'law_firm_lite_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'law_firm_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Law_Firm_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'law_firm_lite_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','law-firm-lite' ),
      'section' => 'law_firm_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'law_firm_lite_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'law_firm_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Law_Firm_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'law_firm_lite_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','law-firm-lite' ),
      'section' => 'law_firm_lite_responsive_media'
    )));

    $wp_customize->add_setting('law_firm_lite_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Law_Firm_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'law_firm_lite_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','law-firm-lite'),
		'transport' => 'refresh',
		'section'	=> 'law_firm_lite_responsive_media',
		'setting'	=> 'law_firm_lite_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('law_firm_lite_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Law_Firm_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'law_firm_lite_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','law-firm-lite'),
		'transport' => 'refresh',
		'section'	=> 'law_firm_lite_responsive_media',
		'setting'	=> 'law_firm_lite_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	//Footer Text
	$wp_customize->add_section('law_firm_lite_footer',array(
		'title'	=> __('Footer Settings','law-firm-lite'),
		'panel' => 'law_firm_lite_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('law_firm_lite_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'law_firm_lite_customize_partial_law_firm_lite_footer_text', 
	));
	
	$wp_customize->add_setting('law_firm_lite_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('law_firm_lite_footer_text',array(
		'label'	=> __('Copyright Text','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_footer',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('law_firm_lite_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'law_firm_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Law_Firm_Lite_Image_Radio_Control($wp_customize, 'law_firm_lite_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','law-firm-lite'),
        'section' => 'law_firm_lite_footer',
        'settings' => 'law_firm_lite_copyright_alingment',
        'choices' => array(
            'left' => get_template_directory_uri().'/assets/images/copyright1.png',
            'center' => get_template_directory_uri().'/assets/images/copyright2.png',
            'right' => get_template_directory_uri().'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting('law_firm_lite_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','law-firm-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'law_firm_lite_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'law_firm_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Law_Firm_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'law_firm_lite_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','law-firm-lite' ),
      	'section' => 'law_firm_lite_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('law_firm_lite_scroll_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'law_firm_lite_customize_partial_law_firm_lite_scroll_icon', 
	));

    $wp_customize->add_setting('law_firm_lite_scroll_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Law_Firm_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'law_firm_lite_scroll_icon',array(
		'label'	=> __('Add Scroll to Top Icon','law-firm-lite'),
		'transport' => 'refresh',
		'section'	=> 'law_firm_lite_footer',
		'setting'	=> 'law_firm_lite_scroll_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('law_firm_lite_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','law-firm-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('law_firm_lite_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','law-firm-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('law_firm_lite_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_scroll_to_top_width',array(
		'label'	=> __('Icon Width','law-firm-lite'),
		'description'	=> __('Enter a value in pixels Example:20px','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('law_firm_lite_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_scroll_to_top_height',array(
		'label'	=> __('Icon Height','law-firm-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'law_firm_lite_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'law_firm_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'law_firm_lite_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','law-firm-lite' ),
		'section'     => 'law_firm_lite_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('law_firm_lite_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'law_firm_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Law_Firm_Lite_Image_Radio_Control($wp_customize, 'law_firm_lite_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','law-firm-lite'),
        'section' => 'law_firm_lite_footer',
        'settings' => 'law_firm_lite_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/layout2.png',
            'Right' => get_template_directory_uri().'/assets/images/layout3.png'
    ))));

    //Woocommerce settings
	$wp_customize->add_section('law_firm_lite_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'law-firm-lite'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'law_firm_lite_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'law_firm_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Law_Firm_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'law_firm_lite_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','law-firm-lite' ),
		'section' => 'law_firm_lite_woocommerce_section'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'law_firm_lite_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'law_firm_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Law_Firm_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'law_firm_lite_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','law-firm-lite' ),
		'section' => 'law_firm_lite_woocommerce_section'
    )));

    //Products per page
    $wp_customize->add_setting('law_firm_lite_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'law_firm_lite_sanitize_float'
	));
	$wp_customize->add_control('law_firm_lite_products_per_page',array(
		'label'	=> __('Products Per Page','law-firm-lite'),
		'description' => __('Display on shop page','law-firm-lite'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'law_firm_lite_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('law_firm_lite_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'law_firm_lite_sanitize_choices'
	));
	$wp_customize->add_control('law_firm_lite_products_per_row',array(
		'label'	=> __('Products Per Row','law-firm-lite'),
		'description' => __('Display on shop page','law-firm-lite'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'law_firm_lite_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('law_firm_lite_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','law-firm-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('law_firm_lite_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('law_firm_lite_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','law-firm-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','law-firm-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'law-firm-lite' ),
        ),
		'section'=> 'law_firm_lite_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'law_firm_lite_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'law_firm_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'law_firm_lite_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','law-firm-lite' ),
		'section'     => 'law_firm_lite_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'law_firm_lite_products_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'law_firm_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'law_firm_lite_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','law-firm-lite' ),
		'section'     => 'law_firm_lite_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    // Has to be at the top
	$wp_customize->register_panel_type( 'Law_Firm_Lite_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'Law_Firm_Lite_WP_Customize_Section' );
}

add_action( 'customize_register', 'law_firm_lite_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class Law_Firm_Lite_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'law_firm_lite_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class Law_Firm_Lite_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'law_firm_lite_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function law_firm_lite_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'law_firm_lite_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Law_Firm_Lite_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Law_Firm_Lite_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Law_Firm_Lite_Customize_Section_Pro( $manager,'law_firm_lite_upgrade_pro_link', array(
			'priority'   => 1,
			'title'    => esc_html__( 'LAW FIRM PRO', 'law-firm-lite' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'law-firm-lite' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/law-firm-wordpress-theme/'),
		)));

		$manager->add_section(new Law_Firm_Lite_Customize_Section_Pro($manager,'law_firm_lite_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'law-firm-lite' ),
			'pro_text' => esc_html__( 'DOCS', 'law-firm-lite' ),
			'pro_url'  => admin_url('themes.php?page=law_firm_lite_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'law-firm-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'law-firm-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Law_Firm_Lite_Customize::get_instance();