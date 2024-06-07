<?php
/**
 * The CF7 Custom Spinner frontend class
 */

 
// If this file is called directly, abort
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * The frontend class
 */
if ( !class_exists( 'PP_CF7_Custom_Spinner_Frontend' ) ) { 

  class PP_CF7_Custom_Spinner_Frontend {
    
    /**
     * reference to core class
     *
     * @since  1
     * @access private
     */
    private $_core;
    
    
    /**
	   * Initialize the frontend class
     *
     * @since 1
     */
    public function __construct( $_core ) {
      
      $this->_core = $_core;
      
      $this->init();
      
      
    }
    
    
    /**
	   * Do Init
     *
     * @since 1
     * @access private
     */
    private function init() {
      
      add_action( 'wp_enqueue_scripts', array( $this, 'add_css' ), 99 );
      
    }
    
    
    /**
	   * Add the css code for the custom spinner to the frontend
     *
     * @since 1
     * @access public
     */
    public function add_css() {
      
	  
	  // since version 2.0.1 we need to add some stylings to overwrite the settings from CF7
      wp_add_inline_style( 'contact-form-7', 
		'div.wpcf7 .wpcf7-spinner {
			background-color: transparent;
			opacity: 1;
			width: auto;
			height: auto;
			border: none;
			border-radius: 0;
		}
		div.wpcf7 .wpcf7-spinner::before {
			position: static;
			background-color: transparent;
			top: 0;
			left: 0;
			width: 0;
			height: 0;
			border-radius: 0;
			transform-origin: 0;
			animation-name: none;
			animation-duration: 0;
		} ' . 
		get_option( $this->_core->get_option_name_frontend_css() ) );
      
      // add CSS for test if necessary
      
      if ( isset( $_GET['cf7customspinnertest'] ) &&  wp_verify_nonce( $_GET['cf7customspinnertest'], $this->_core->get_plugin_slug() ) ) {
        
        wp_add_inline_style( 'contact-form-7', 'div.wpcf7 .ajax-loader, div.wpcf7 .wpcf7-spinner { visibility: visible !important; }' );
      
      }
      
    }
    
  }
}