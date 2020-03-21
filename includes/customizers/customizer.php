<?php

add_action( 'customize_register', 'genesischild_register_theme_customizer' );
/*
 * Register Our Customizer Stuff Here
 */
function genesischild_register_theme_customizer( $wp_customize ) {
	// Create custom panel.
	$wp_customize->add_panel( 'text_blocks', array(
		'priority'       => 500,
		'theme_supports' => '',
		'title'          => __( 'Change text in Home page', 'genesischild' ),
		'description'    => __( 'Set editable text for certain content.', 'genesischild' ),
    ) );
    
    $wp_customize->add_panel( 'portfolio_block', array(
		'priority'       => 500,
		'theme_supports' => '',
		'title'          => __( 'Change text in Portfolio page', 'genesischild' ),
    ) );
    
    $wp_customize->add_panel( 'blog_block', array(
		'priority'       => 500,
		'theme_supports' => '',
		'title'          => __( 'Quote in Blog page', 'genesischild' ),
    ) );
    
    $wp_customize->add_panel( 'about_us_block', array(
		'priority'       => 500,
		'theme_supports' => '',
		'title'          => __( 'Change text in About us page', 'genesischild' ),
	) );


    // Add section.
	$wp_customize->add_section( 'slider_title' , array(
		'title'    => __('Slider title','genesischild'),
		'panel'    => 'text_blocks',
		'priority' => 10
    ) );
    
    $wp_customize->add_section( 'slider_description' , array(
		'title'    => __('Slider description','genesischild'),
		'panel'    => 'text_blocks',
		'priority' => 10
    ) );

    $wp_customize->add_section( 'design_title' , array(
		'title'    => __('Section designs (Title)','genesischild'),
		'panel'    => 'text_blocks',
		'priority' => 10
    ) );

    $wp_customize->add_section( 'design_description' , array(
		'title'    => __('Section designs (Description)','genesischild'),
		'panel'    => 'text_blocks',
		'priority' => 10
    ) );

    $wp_customize->add_section( 'our_works_text' , array(
		'title'    => __('Section our works (text)','genesischild'),
		'panel'    => 'text_blocks',
		'priority' => 10
    ) );

    $wp_customize->add_section( 'our_clients_text' , array(
		'title'    => __('Section our clients (text)','genesischild'),
		'panel'    => 'text_blocks',
		'priority' => 10
    ) );

    $wp_customize->add_section( 'our_clients_text' , array(
		'title'    => __('Section our clients (text)','genesischild'),
		'panel'    => 'text_blocks',
		'priority' => 10
    ) );

    $wp_customize->add_section( 'portfolio_title' , array(
		'title'    => __('Portfolio title','genesischild'),
		'panel'    => 'portfolio_block',
		'priority' => 10
    ) );

    $wp_customize->add_section( 'portfolio_description' , array(
		'title'    => __('Portfolio description','genesischild'),
		'panel'    => 'portfolio_block',
		'priority' => 10
    ) );

    $wp_customize->add_section( 'blog_quote' , array(
		'title'    => __('Quote','genesischild'),
		'panel'    => 'blog_block',
		'priority' => 10
    ) );

    $wp_customize->add_section( 'blog_quote_author' , array(
		'title'    => __('Quote author','genesischild'),
		'panel'    => 'blog_block',
		'priority' => 10
    ) );

    $wp_customize->add_section( 'blog_quote_author' , array(
		'title'    => __('Quote author','genesischild'),
		'panel'    => 'blog_block',
		'priority' => 10
    ) );

    $wp_customize->add_section( 'skill_text' , array(
		'title'    => __('Skill text','genesischild'),
		'panel'    => 'about_us_block',
		'priority' => 10
    ) );

    $wp_customize->add_section( 'team_text' , array(
		'title'    => __('Team text','genesischild'),
		'panel'    => 'about_us_block',
		'priority' => 10
    ) );
    
	// Add setting
	$wp_customize->add_setting( 'title_for_slider', array(
		 'default'           => __( 'Enter text here', 'genesischild' ),
		 'sanitize_callback' => 'sanitize_text'
    ) );
    
    $wp_customize->add_setting( 'description_for_slider', array(
        'default'           => __( 'Enter text here', 'genesischild' ),
        'sanitize_callback' => 'sanitize_text'
   ) );

   $wp_customize->add_setting( 'title_for_design', array(
        'default'           => __( 'Enter text here', 'genesischild' ),
        'sanitize_callback' => 'sanitize_text'
    ) );

    $wp_customize->add_setting( 'description_for_design', array(
        'default'           => __( 'Enter text here', 'genesischild' ),
        'sanitize_callback' => 'sanitize_text'
    ) );

    $wp_customize->add_setting( 'text_for_our_works', array(
        'default'           => __( 'Enter text here', 'genesischild' ),
        'sanitize_callback' => 'sanitize_text'
    ) );

    $wp_customize->add_setting( 'text_for_our_clients', array(
        'default'           => __( 'Enter text here', 'genesischild' ),
        'sanitize_callback' => 'sanitize_text'
    ) );

    $wp_customize->add_setting( 'title_for_portfolio', array(
        'default'           => __( 'Enter text here', 'genesischild' ),
        'sanitize_callback' => 'sanitize_text'
    ) );

    $wp_customize->add_setting( 'description_for_portfolio', array(
        'default'           => __( 'Enter text here', 'genesischild' ),
        'sanitize_callback' => 'sanitize_text'
    ) );

    $wp_customize->add_setting( 'quote_in_blog', array(
        'default'           => __( 'Enter text here', 'genesischild' ),
        'sanitize_callback' => 'sanitize_text'
    ) );

    $wp_customize->add_setting( 'quote_author_in_blog', array(
        'default'           => __( 'Enter text here', 'genesischild' ),
        'sanitize_callback' => 'sanitize_text'
    ) );

    $wp_customize->add_setting( 'text_for_skill', array(
        'default'           => __( 'Enter text here', 'genesischild' ),
        'sanitize_callback' => 'sanitize_text'
    ) );

    $wp_customize->add_setting( 'text_for_team', array(
        'default'           => __( 'Enter text here', 'genesischild' ),
        'sanitize_callback' => 'sanitize_text'
    ) );

	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'slider_title',
		    array(
		        'label'    => __( 'Title for Slider', 'genesischild' ),
		        'section'  => 'slider_title',
		        'settings' => 'title_for_slider',
		        'type'     => 'text'
		    )
	    )
    );

    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'slider_description',
		    array(
		        'label'    => __( 'Description for Slider', 'genesischild' ),
		        'section'  => 'slider_description',
		        'settings' => 'description_for_slider',
		        'type'     => 'text'
		    )
	    )
    );

    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'design_title',
		    array(
		        'label'    => __( 'Title for design', 'genesischild' ),
		        'section'  => 'design_title',
		        'settings' => 'title_for_design',
		        'type'     => 'text'
		    )
	    )
    );

    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'design_description',
		    array(
		        'label'    => __( 'Description for design', 'genesischild' ),
		        'section'  => 'design_description',
		        'settings' => 'description_for_design',
		        'type'     => 'text'
		    )
	    )
    );

    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'our_works_text',
		    array(
		        'label'    => __( 'Text', 'genesischild' ),
		        'section'  => 'our_works_text',
		        'settings' => 'text_for_our_works',
		        'type'     => 'text'
		    )
	    )
    );

    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'our_clients_text',
		    array(
		        'label'    => __( 'Text', 'genesischild' ),
		        'section'  => 'our_clients_text',
		        'settings' => 'text_for_our_clients',
		        'type'     => 'text'
		    )
	    )
    );

    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'portfolio_title',
		    array(
		        'label'    => __( 'Title', 'genesischild' ),
		        'section'  => 'portfolio_title',
		        'settings' => 'title_for_portfolio',
		        'type'     => 'text'
		    )
	    )
    );

    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'portfolio_description',
		    array(
		        'label'    => __( 'Description', 'genesischild' ),
		        'section'  => 'portfolio_description',
		        'settings' => 'description_for_portfolio',
		        'type'     => 'text'
		    )
	    )
    );

    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'blog_quote',
		    array(
		        'label'    => __( 'Quote', 'genesischild' ),
		        'section'  => 'blog_quote',
		        'settings' => 'quote_in_blog',
		        'type'     => 'text'
		    )
	    )
    );

    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'blog_quote_author',
		    array(
		        'label'    => __( 'Author', 'genesischild' ),
		        'section'  => 'blog_quote_author',
		        'settings' => 'quote_author_in_blog',
		        'type'     => 'text'
		    )
	    )
    );
    
    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'skill_text',
		    array(
		        'label'    => __( 'Text', 'genesischild' ),
		        'section'  => 'skill_text',
		        'settings' => 'text_for_skill',
		        'type'     => 'text'
		    )
	    )
    );

    $wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'team_text',
		    array(
		        'label'    => __( 'Text', 'genesischild' ),
		        'section'  => 'team_text',
		        'settings' => 'text_for_team',
		        'type'     => 'text'
		    )
	    )
    );



 	// Sanitize text
	function sanitize_text( $text ) {
	    return sanitize_text_field( $text );
	}
}





