<?php
/**
 * Enqueue newer jquery on pages (not admin panel and in DEBUG mode)
 */

/**
 * Enqueue scripts and styles.
 *
 * All scripts should be pulled inside src folder by running command gulp scripts:dep
 *
 * Use globalSite['home'] . '/bower_components...' to get bower components
 * Use themeRoot() . '/...' to get local sources
 */

add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style( 'ftheme-swiper-style', get_stylesheet_directory_uri() . '/src/styles/css/vendor/swiper.min.css' );
    wp_enqueue_style( 'ftheme-style', get_stylesheet_uri() );

    if( WP_DEBUG === true ) {

        wp_enqueue_script( 'ftheme-swiper', get_template_directory_uri() . '/src/scripts/src/swiper.js', array('jquery'), true );
        wp_enqueue_script( 'ftheme-script', get_template_directory_uri() . '/src/scripts/src/script.js', array('jquery'), true );
    } else {
        wp_enqueue_script( 'ftheme-swiper', get_template_directory_uri() . '/src/scripts/src/swiper.js', array('jquery'), true );
        wp_enqueue_script( 'ftheme-script-min', get_template_directory_uri() . '/bundles/scripts/scripts.min.js', array('jquery'), true );
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
} );