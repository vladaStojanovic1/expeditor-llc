<?php

add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style( 'vladastheme-swiper-style', get_stylesheet_directory_uri() . '/src/styles/css/vendor/swiper.min.css' );
    wp_enqueue_style( 'vladastheme-style', get_stylesheet_uri() );

    if( WP_DEBUG === true ) {
        wp_enqueue_script( 'vladastheme-swiper', get_template_directory_uri() . '/src/scripts/src/swiper.js', array('jquery'), true );
        wp_enqueue_script( 'vladastheme-script', get_template_directory_uri() . '/src/scripts/src/script.js', array('jquery'), true );
    } else {
        wp_enqueue_script( 'vladastheme-swiper', get_template_directory_uri() . '/src/scripts/src/swiper.js', array('jquery'), true );
        wp_enqueue_script( 'vladastheme-script-min', get_template_directory_uri() . '/bundles/scripts/scripts.min.js', array('jquery'), true );
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
} );

// inc
include ( get_template_directory() . '/inc/_partials/index.php' );


function wpdocs_theme_name_wp_title( $title, $sep ) {
    if ( is_feed() ) {
        return $title;
    }

    global $page, $paged;

    // Add the blog name
    $title .= get_bloginfo( 'name', 'display' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title = $site_description;
    }

    return $title;
}
add_filter( 'wp_title', 'wpdocs_theme_name_wp_title', 10, 2 );

// Menu
function wpb_custom_new_menu() {
    register_nav_menu('my-custom-menu',__( 'My Custom Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );


if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));

}

//function wpb_adding_scripts(){
//
//    wp_register_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js', array(), '1.0', true );
//
//    wp_register_script( 'gsap-settings', get_stylesheet_directory_uri() .'/gs   ap-options.js', array('gsap'), '1.0', true );
//
//    wp_enqueue_script('gsap'); // This is probably not needed since below we are enqueueing the gsap-settings file with has a dependency on the gsap script, so it should enqueue both
//    wp_enqueue_script('gsap-settings');
//}
//
//add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' );



// The proper way to enqueue GSAP script in WordPress

// wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
//function theme_gsap_script(){
//    // The core GSAP library
//    wp_enqueue_script( 'gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js', array(), false, true );
//    // ScrollTrigger - with gsap.js passed as a dependency
//    wp_enqueue_script( 'gsap-st', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/ScrollTrigger.min.js', array('gsap-js'), false, true );
//    // Your animation code file - with gsap.js passed as a dependency
//    wp_enqueue_script( 'gsap-js2', get_template_directory_uri() . 'js/app.js', array('gsap-js'), false, true );
//}
//add_action( 'wp_enqueue_scripts', 'theme_gsap_script' );


function theme_gsap_script(){
    // The core GSAP library
    wp_enqueue_script( 'gsap-js', get_template_directory_uri() . '/src/scripts/src/gsap.min.js', array(), false, true );
    // ScrollTrigger - with gsap.js passed as a dependency
    wp_enqueue_script( 'gsap-st', get_template_directory_uri() . '/src/scripts/src/ScrollTrigger.min.js', array('gsap-js'), false, true );
    // Your animation code file - with gsap.js passed as a dependency
//    wp_enqueue_script( 'gsap-js2', get_template_directory_uri() . '/src/scripts/src/script.js', array('gsap-js'), false, true );
}
add_action( 'wp_enqueue_scripts', 'theme_gsap_script' );