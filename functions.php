<?php

include_once(__DIR__ . '/includes/helpers.php');
include_once(__DIR__ . '/includes/customizers/customizer.php');

add_action( 'wp_enqueue_scripts', 'load_styles' );
add_action( 'wp_footer', 'load_scripts' );
add_action( 'after_setup_theme', 'theme_register_nav_menu' );
add_action( 'widgets_init', 'register_my_widgets' );

function register_my_widgets() {
	register_sidebar( array(
		'name'          => 'Right sidebar',
		'id'            => 'right_sidebar',
		'description'   => 'Описание сайдбара',
		'before_widget' => '<section class="widget %2$s">',
		'after_widget'  => "</section>\n",
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => "</h3>\n",
    ) );
    register_sidebar( array(
		'name'          => 'footer-right',
		'id'            => 'footer-right',
		'description'   => 'Описание сайдбара',
		'before_widget' => '<section class="widget %2$s">',
		'after_widget'  => "</section>\n",
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => "</h3>\n",
    ) );
    register_sidebar( array(
		'name'          => 'footer-center',
		'id'            => 'footer-center',
		'description'   => 'Описание сайдбара',
		'before_widget' => '<section class="widget %2$s">',
		'after_widget'  => "</section>\n",
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => "</h3>\n",
    ) );
    register_sidebar( array(
		'name'          => 'footer-left',
		'id'            => 'footer-left',
		'description'   => 'Описание сайдбара',
		'before_widget' => '<section class="widget %2$s">',
		'after_widget'  => "</section>\n",
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => "</h3>\n",
	) );
}

function theme_register_nav_menu() {
    register_nav_menu( 'top', 'Top Menu' );
    register_nav_menu( 'bottom', 'Bottom Menu' );

}

function load_styles() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css');
    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_style('owl-carousel', get_template_directory_uri()  . '/css/owl.carousel.min.css');
    wp_enqueue_style('owl-carousel-default', get_template_directory_uri()  . '/css/owl.theme.default.min.css');
    wp_enqueue_style('main-style', get_template_directory_uri()  . '/css/main-style.css');
    wp_enqueue_style('style', get_stylesheet_uri());
    //Mailchimp
    wp_enqueue_style('mailchimp', '//cdn-images.mailchimp.com/embedcode/classic-10_7.css');

}

function load_scripts() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.slim.min.js');
    wp_enqueue_script('jquery');
    wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js');
    wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
    wp_enqueue_script('masonry', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js');
    wp_enqueue_script('owl-carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js');
    wp_enqueue_script('blog-js', get_template_directory_uri() . '/assets/js/blog.js');
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js');
    wp_enqueue_script('portfolio-js', get_template_directory_uri() . '/assets/js/portfolio.js');
    wp_enqueue_script('slide-js', get_template_directory_uri() . '/assets/js/slide.js');
    //Mailchimp 
    wp_enqueue_script('mailchimp', '//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js');
    wp_enqueue_script('mailchimp-js', get_template_directory_uri() . '/assets/js/mailchimp.js');
}

add_filter( 'excerpt_length', function(){
	return 35;
} );

add_filter('excerpt_more', function($more) {
	return '...';
});

show_admin_bar(false);
add_theme_support('custom-logo');
add_theme_support('post-thumbnails');


// Custom Post Type for design section
function create_design_post_type() {
    register_post_type( 'design',
        array(
        'labels' => array(
            'name' => __( 'Quality design' ),
            'singular_name' => __( 'Design' )
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-admin-customizer',
        'supports' => array('title','editor','author','thumbnail','excerpt','comments')
        )
    );

    register_taxonomy(
        'design_categories',
        'design',
        array(
            'label'=> __('Design categories'),
            'hierarchical'      => true,
            'sort'              => true,
            'args'              => ['orderby' => 'term_order'],
            'show_admin_column' => true
        ) 
    );
}

// Custom Post Type for section "our works"
function create_portfolio_post_type() {
    register_post_type( 'portfolio',
        array(
        'labels' => array(
            'name' => __( 'Our works (portfolio)' ),
            'singular_name' => __( 'portfolio' )
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array('title','editor','thumbnail')
        )
    );
}

function create_client_post_type() {
    register_post_type( 'client',
        array(
        'labels' => array(
            'name' => __( 'Our client' ),
            'singular_name' => __( 'client' )
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title','thumbnail')
        )
    );
}

function create_collaborators_post_type() {
    register_post_type( 'co-worker',
        array(
        'labels' => array(
            'name' => __( 'Сollaborators' ),
            'singular_name' => __( 'co-worker' )
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-businessperson',
        'supports' => array('title','editor','thumbnail')
        )
    );

    register_taxonomy(
        'co-worker-categories',
        'co-worker',
        array(
            'label'=> __('Spetsial'),
            'hierarchical'      => true,
            'sort'              => true,
            'show_admin_column' => true
        ) 
    );
}

function create_gallery_portfolio_post_type() {
    register_post_type( 'gallery-portfolio',
        array(
        'labels' => array(
            'name' => __( 'Gallery portfolio' ),
            'singular_name' => __( 'gallery-item' )
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-heart',
        'supports' => array('title','editor','author','thumbnail','excerpt','comments')
        )
    );

    register_taxonomy(
        'gallery-categories',
        'gallery-portfolio',
        array(
            'label'=> __('Gallery categories'),
            'hierarchical'      => true,
            'sort'              => true,
            'show_admin_column' => true
        ) 
    );
}

add_action( 'init', 'create_collaborators_post_type');
add_action( 'init', 'create_client_post_type' );
add_action( 'init', 'create_portfolio_post_type' );
add_action( 'init', 'create_design_post_type' );
add_action( 'init', 'create_gallery_portfolio_post_type');

//Shortcode

function beliefmedia_percentage_div($atts) {
 
    $atts = shortcode_atts(array(
   
      'percentage' => '50',
      'text' => 'Progress',
   
      'width' => '400',
      'height' => '30',
      'lineheight' => '30',
   
      /* Default values. Don't use in shortcode. Just set here once.. */
      'borderwidth' => '1',
      'bordertype' => 'solid',
      'bordercolor' => 'black',
      'backgroundcolor' => '#cccccc',
      'font' => 'normal 12px verdana',
      'margin' => '10',
      'bgcolor' => '#FB7D00',
      'textcolor' => 'black',
    ), $atts);
   
    $return .= '<div  class="col-lg-6 col-md-6 col-12 skills-item">
                    <div class="percentage" style="text-align: left; height: ' . $atts['lineheight'] . 'px;">
                        <span>' . $atts['percentage'] . '%</span>
                    </div>
                    <div class="progress-box" style="max-width: ' . $atts['width'] . 'px; height: ' . $atts['height'] . 'px; position: relative; width: 100%;">
                        <div class="weprogramming-language" style="max-width: ' . $atts['percentage'] . '%; text-align: left; height: ' . $atts['lineheight'] . 'px;">
                            <span style="display: inline-block; position: absolute; width: 100%; margin-left: ' . $atts['margin'] . 'px;">' . $atts['text'] . '</span>
                        </div>
                    </div>
                </div>';
    
   return $return ;    
}

function section_name($atts) {
 
    $atts = shortcode_atts(array(
      'text' => 'Section name',
    ), $atts);
   
    $return = '<p class="head-section">' . $atts['text'] . '</p>';
    
   return $return ;    
}

add_shortcode('progress', 'beliefmedia_percentage_div');
add_shortcode('section', 'section_name');

require get_template_directory() . '/widgets/widget-search.php';
require get_template_directory() . '/widgets/widget-post-tags.php';
require get_template_directory() . '/widgets/widget-footer-about.php';
require get_template_directory() . '/widgets/widget-social-connecting.php';
require get_template_directory() . '/widgets/widget-contact-us.php';
require get_template_directory() . '/widgets/widget-follow-us.php';
require get_template_directory() . '/widgets/widget-popular-posts.php';
require get_template_directory() . '/widgets/widgets.php';

function get_the_post_thumbnail_src($img){
  return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
}
function wpvkp_social_buttons($content) {
    global $post;
    if(is_singular() && $post->post_name != 'about-us' || is_home()){
    
        // Get current page URL 
        $sb_url = urlencode(get_permalink());
 
        // Get current page title
        $sb_title = str_replace( ' ', '%20', get_the_title());
        
        // Get Post Thumbnail for pinterest
        $sb_thumb = get_the_post_thumbnail_src(get_the_post_thumbnail());
 
        // Construct sharing URL without using any script
        $twitterURL = 'https://twitter.com/intent/tweet?text='.$sb_title.'&amp;url='.$sb_url.'&amp;via=wpvkp';
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$sb_url;
        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$sb_url.'&amp;title='.$sb_title;
        $gplusURL ='https://plus.google.com/share?url='.$sb_title.'';
 
        // Add sharing button at the end of page/page content
        $content .= '<div class="social-share-box"><span class="title-for-blok-post">Share this post</span><div class="social-share-btn">';
        $content .= '<a class="sbtn s-twitter" href="'. $twitterURL .'" target="_blank" rel="nofollow"><span>Share on twitter</span></a>';
        $content .= '<a class="sbtn s-facebook" href="'.$facebookURL.'" target="_blank" rel="nofollow"><span>Share on facebook</span></a>';
        $content .= '<a class="sbtn s-googleplus" href="'.$googleURL.'" target="_blank" rel="nofollow"><span>Google+</span></a>';
        $content .= '<a class="sbtn s-linkedin" href="'.$linkedInURL.'" target="_blank" rel="nofollow"><span>LinkedIn</span></a>';
        $content .= '</div></div>';
        
        return $content;
    }else{
        // if not a post/page then don't include sharing button
        return $content;
    }
};
// Enable the_content if you want to automatically show social buttons below your post.

 add_filter( 'the_content', 'wpvkp_social_buttons');

// This will create a wordpress shortcode [social].
// Please it in any widget and social buttons appear their.
// You will need to enabled shortcode execution in widgets.
add_shortcode('social','wpvkp_social_buttons');
