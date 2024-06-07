<?php
/**
 * The CF7 Custom Spinner admin class
 */

 
// If this file is called directly, abort
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * The admin class
 */
if ( !class_exists( 'PP_CF7_Custom_Spinner_Admin' ) ) { 

  class PP_CF7_Custom_Spinner_Admin {
    
    /**
     * reference to core class
     *
     * @since  1
     * @var    object
     * @access private
     */
    private $_core;
    
    
    /**
     * the admin menu handle
     *
     * @since  1
     * @var    string
     * @access private
     */
    private $admin_handle;
    
    
    /**
     * Spinners Class
     *
     * @see    class-cf7-custom-spinner-spinners.php
     * @since  1
     * @var    object
     * @access private
     */
    private $spinners;
    
    
    /**
     * Colors Class
     *
     * @see    class-cf7-custom-spinner-colors.php
     * @since  1
     * @var    object
     * @access private
     */
    private $colors;
    
    
    /**
     * Sizes Class
     *
     * @see    class-cf7-custom-spinner-sizes.php
     * @since  1
     * @var    object
     * @access private
     */
    private $sizes;
    
    
    /**
     * the current spinner type
     *
     * @since  1
     * @var    int
     * @access private
     */
    private $current_spinner;
    
    
    /**
     * the current spinner color
     *
     * @since  1
     * @var    int
     * @access private
     */
    private $current_color;
    
    
    /**
     * the current spinner size
     *
     * @since  1
     * @var    int
     * @access private
     */
    private $current_size;    
    
    
    /**
	   * Initialize the admin class
     *
     * @since 1
     * @access public
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
      
      $this->spinners = new PP_CF7_Custom_Spinner_Spinners( $this->_core );
      $this->colors   = new PP_CF7_Custom_Spinner_Colors( $this->_core );
      $this->sizes    = new PP_CF7_Custom_Spinner_Sizes( $this->_core );
      
      $this->current_spinner = $this->spinners->get_spinner_by_id( $this->_core->get_current_spinner() );
      $this->current_color   = $this->colors->get_color_by_color( $this->_core->get_current_color() );
      $this->current_size    = $this->sizes->get_size_by_size( $this->_core->get_current_size() );
      
      add_action( 'init', array( $this, 'add_text_domain' ) );
      add_action( 'admin_init', array( $this, 'admin_init' ) );
      add_action( 'admin_enqueue_scripts', array( $this, 'admin_css' ) );
      add_action( 'admin_enqueue_scripts', array( $this, 'admin_js' ) );
      add_action('admin_footer', array( $this, 'add_admin_css_to_footer' ) );
      add_action('admin_footer', array( $this, 'add_admin_js_to_footer' ) );
      add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    
    }
    
    
    /**
     * add text domain
     *
     * @since 1
     * @access public
     */
    public function add_text_domain() {  
    
      load_plugin_textdomain( 'cf7-custom-spinner' );
      
    }
    
    
    /**
     * init backend
     *
     * @since 1
     * @access public
     */
    public function admin_init() {
       
      register_setting( $this->_core->get_option_name_settings(), $this->_core->get_option_name_settings(), array( $this, 'store_frontend_css' ) );
      add_settings_section( $this->_core->get_plugin_slug(), '', '', $this->_core->get_plugin_slug() );
      add_settings_field( 'cf7cs_type',  'type',  array( $this, 'render_settings_field_type'  ), $this->_core->get_plugin_slug(), $this->_core->get_plugin_slug() );
      add_settings_field( 'cf7cs_color', 'color', array( $this, 'render_settings_field_color' ), $this->_core->get_plugin_slug(), $this->_core->get_plugin_slug() );
      add_settings_field( 'cf7cs_size',  'size',  array( $this, 'render_settings_field_size'  ), $this->_core->get_plugin_slug(), $this->_core->get_plugin_slug() );
       
    }
    
	
    /**
     * add admin menu
     *
     * @since 1
     * @access public
     */
    public function admin_menu() {
      
      // we use the publish_pages capability because this is used also by the cf7 plugin
      global $_wp_last_object_menu;
      $_wp_last_object_menu++;
      $this->admin_handle = add_menu_page( $this->_core->get_plugin_name(), $this->_core->get_plugin_name(), 'publish_pages', $this->_core->get_plugin_slug(), array( $this, 'show_admin' ), 'data:image/svg+xml;base64,PHN2ZyB4bWxuczpzdmc9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyMCAyMCIgdmVyc2lvbj0iMS4xIj48ZyB0cmFuc2Zvcm09Im1hdHJpeCgwLjU4Nzg4OTQ4LDAsMCwwLjU4Nzg4OTQ4LDMuODMwMDk5OSw0LjEyMTEwNTIpIj48cGF0aCBkPSJNMy45IDQgMTcuMSA0QzE4LjQgNCAxOSA0LjYgMTkgNS44bDAgOC40QzE5IDE1LjQgMTguNCAxNiAxNy4xIDE2TDMuOSAxNkMyLjYgMTYgMiAxNS40IDIgMTQuMmwwLTguNEMyIDQuNiAyLjYgNCAzLjkgNFptNi42IDguNiA2LjctNS41QzE3LjUgNi45IDE3LjcgNi40IDE3LjQgNiAxNy4xIDUuNiAxNi41IDUuNiAxNi4yIDUuOEwxMC41IDkuNyA0LjggNS44QzQuNSA1LjYgMy45IDUuNiAzLjYgNiAzLjMgNi40IDMuNSA2LjkgMy44IDcuMVoiIGZpbGw9ImJsYWNrIi8+PC9nPjxnIHRyYW5zZm9ybT0ibWF0cml4KDAuMDMyODk5MzcsMCwwLDAuMDMyODk5MzcsMS41MDAwMDc2LDEuNDk5OTgzMikiPjxwYXRoIGQ9Ik0yNjYuNyAwQzIzMS45IDAuNyAxOTcuMiA4LjIgMTY1LjQgMjIuMmMtMzEuOCAxMy45LTYwLjYgMzQuMS04NC4zIDU4LjktMjMuOCAyNC44LTQyLjYgNTQuMS01NSA4NS45LTEyLjUgMzEuOC0xOC40IDY1LjktMTcuNyA5OS43IDAuNyAzMy44IDggNjcuNCAyMS41IDk4LjEgMTMuNSAzMC44IDMzLjEgNTguNiA1Ny4xIDgxLjYgMjQgMjMgNTIuNSA0MS4yIDgzLjIgNTMuMiAzMC44IDEyIDYzLjggMTcuOCA5Ni41IDE3LjEgMzIuNy0wLjcgNjUuMi03LjggOTQuOS0yMC45IDI5LjctMTMuMSA1Ni43LTMyIDc4LjktNTUuMyAyMi4zLTIzLjIgMzkuOC01MC44IDUxLjQtODAuNSAxMS42LTI5LjcgMTcuMS02MS43IDE2LjQtOTMuMy0wLjctMzEuNi03LjYtNjMtMjAuMy05MS43LTEyLjYtMjguNy0zMS01NC43LTUzLjUtNzYuMi0yMi41LTIxLjUtNDkuMS0zOC41LTc3LjgtNDkuNi0xNy40LTYuOC0zNS42LTExLjQtNTQuMS0xMy44IDAtMC42IDAuMS0xLjMgMC4xLTIgMC0xOC40LTE0LjktMzMuMy0zMy4zLTMzLjMtMC45IDAtMS45IDAtMi44IDAuMWwwLTAuMSAwIDB6TTM1NS4yIDUzYzI3LjcgMTIuMiA1Mi44IDI5LjkgNzMuNSA1MS43IDIwLjcgMjEuNyAzNy4xIDQ3LjQgNDcuOCA3NS4xIDEwLjggMjcuNyAxNS45IDU3LjQgMTUuMSA4Ni45LTAuNyAyOS41LTcuMiA1OC42LTE5IDg1LjMtMTEuOCAyNi43LTI4LjkgNTAuOS00OS44IDcwLjgtMjAuOSAyMC00NS43IDM1LjctNzIuNCA0Ni0yNi43IDEwLjMtNTUuMyAxNS4yLTgzLjcgMTQuNS0yOC40LTAuNy01Ni41LTYuOS04Mi4xLTE4LjQtMjUuNy0xMS40LTQ4LjktMjcuOS02OC4xLTQ4LTE5LjItMjAuMi0zNC4zLTQ0LTQ0LjItNjkuNy05LjktMjUuNy0xNC42LTUzLjItMTMuOS04MC41IDAuNy0yNy4zIDYuNy01NC4zIDE3LjctNzguOSAxMS0yNC43IDI2LjgtNDcgNDYuMi02NS40IDE5LjQtMTguNCA0Mi4zLTMyLjkgNjctNDIuNCAyNC43LTkuNSA1MS4xLTEzLjkgNzcuMy0xMy4ybDAtMC4xYzAuOSAwLjEgMS44IDAuMSAyLjggMC4xIDE3LjIgMCAzMS4zLTEzIDMzLjEtMjkuNyAxOC4xIDMuMiAzNS44IDguNiA1Mi42IDE2eiIgZmlsbD0iYmxhY2siLz48L2c+PC9zdmc+', $_wp_last_object_menu ); 
      
    }
    
    
    /**
     * render settings field type
     *
     * @since 1
     * @access public
     */
    public function render_settings_field_type() {
      
      echo '<input id="cf7cs_type" name="' . $this->_core->get_option_name_settings() .'[type]" type="text" value="' . $this->spinners->get_spinner_id( $this->current_spinner ) . '" />';
      
    }
 
    
    /**
     * render settings field color
     *
     * @since 1
     * @access public
     */
    public function render_settings_field_color() {
      
      echo '<input id="cf7cs_color" name="' . $this->_core->get_option_name_settings() .'[color]" type="text" value="' . $this->colors->get_color( $this->current_color ) . '" />';
      
    }
    
    
    /**
     * render settings field size
     *
     * @since 1
     * @access public
     */
    public function render_settings_field_size() {
      
      echo '<input id="cf7cs_size" name="' . $this->_core->get_option_name_settings() .'[size]" type="text" value="' . $this->sizes->get_size( $this->current_size ) . '" />';
      
    }
    
    
    /**
     * show backend
     *
     * @since 1
     * @access public
     */
    public function show_admin() {
      
      require_once( plugin_dir_path( $this->_core->get_plugin_file() ) . '/inc/admin/cf7-custom-spinner-admin-page.php' );
      
      // add js for testing
      
      ?>
      <script type='text/javascript'>
        jQuery( document ).ready(function( $ ) {
          $( '#cf7-custom-spinner-test' ).change( function () {
            if ( $( this ).val() != -1 ) {
              window.location.href = '<?php echo get_home_url(); ?>/?p=' + this.value + '&cf7customspinnertest=<?php echo wp_create_nonce( $this->_core->get_plugin_slug() ); ?>';
              $( this ).val( -1 );
            };
          } );
        } );
      </script>
      <?php
      
    }
    
    
    /**
     * add admin css files
     *
     * @since 1
     * @access public
     */
    public function admin_css() {
      
      if ( get_current_screen()->id == $this->admin_handle ) {
        
        wp_enqueue_style( 'pp-admin-page', $this->_core->get_asset_file( 'css', 'pp-admin-page.css' ) );
        wp_enqueue_style( 'cf7csadmin', $this->_core->get_asset_file( 'css', 'cf7csadmin.css' ) );
        wp_enqueue_style( 'unslider', $this->_core->get_asset_file( 'css', 'unslider.css' ) );
        
      }
      
    }
    
    
    /**
     * add admin js files
     *
     * @since 1
     * @access public
     */
    public function admin_js() {
      
      if ( get_current_screen()->id == $this->admin_handle ) {
        
        wp_enqueue_script( 'cf7csunslider', $this->_core->get_asset_file( 'js', 'unslider-min.js' ), array( 'jquery' ) );
        wp_enqueue_script( 'cf7csadmin', $this->_core->get_asset_file( 'js', 'cf7csadmin.js' ) , array( 'jquery', 'cf7csunslider' ) );
        
      }
      
    }
    
    
    /**
     * show the nav icons
     *
     * @since 1
     * @access private
     */
    private function show_nav_icons( $icons ) {
       
      foreach ( $icons as $icon ) {
         
        echo '<a href="' . $icon['link'] . '" title="' . $icon['title'] . '"><span class="dashicons ' . $icon['icon'] . '"></span><span class="text">' . $icon['title'] . '</span></a>';
         
      }
      
    }
    
    
    /**
		 * generate the list of spinner to select in admin
		 *
     * @since  1
     * @access private
     * @return string HTML code
     */
    private function get_spinner_list_html() {
      
      $html = '<div id="cf7-custom-spinner-type-select"><div id="cf7-custom-spinner-size-preview"><ul>';
      
      foreach ( $this->spinners->get_keys() as $spinner ) {
        
        $html .= '<li><div id="' . $this->spinners->get_admin_css_id( $spinner ) . '" class="cf7cs-spinner" data-spinner="' . $this->spinners->get_spinner_id ( $spinner ) . '">' . $spinner . '</div></li>';
      }
      $html .= '</ul></div></div>';
      return $html;
      
    }
    
    
    /**
		 * generate the list of colors to select in admin
		 *
     * @since  1
     * @access private
     * @return string HTML code
     */
    private function get_colors_list_html() {
      
      $html = '<div id="cf7-custom-spinner-color-select"><ul>';
      
      foreach ( $this->colors->get_keys() as $color ) {
        
        $html .= '<li id="' . $this->colors->get_admin_css_id( $color ) . '"><input type="radio" name="color" value="' . $color . '" ' . checked( $this->current_color, $color, false ) . ' data-color="' . $this->colors->get_color( $color ) . '" data-bg="' . $this->colors->get_bg_color( $color ) . '" title="' . $this->colors->get_color( $color ) . '"></li>';
      }
      $html .= '<div class="clear" /></ul></div>';
      return $html;
      
    }
    
    
    /**
		 * generate the list of sizes to select in admin
		 *
     * @since  1
     * @access private
     * @return string HTML code
     */
    private function get_sizes_list_html() {
      
      $html = '<div id="cf7-custom-spinner-size-select"><select>';
      
      foreach ( $this->sizes->get_keys() as $size ) {
        
        $html .= '<option value="' . $size . '" ' . selected( $this->current_size, $size, false ) . ' data-size-class="' . $this->sizes->get_admin_css_class( $size ) . '" data-size-px="' . $this->sizes->get_size( $size ) . '">' . $this->sizes->get_name( $size ) . '</option>';
      }
      $html .= '</select></div>';
      return $html;
      
    }
    
    
    /**
		 * add the css for the spinners to the footer
		 *
     * @since 1
     * @access public
     */
    public function add_admin_css_to_footer() {
      
      echo '<style type="text/css">';
      
      echo '.cf7cs-spinner { width: 100%; height: 100%; text-indent: -9999px; overflow: visible; }';
      
      foreach ( $this->spinners->get_keys() as $spinner ) {
        
        echo $this->spinners->get_admin_css( $spinner );
      }
      
      foreach ( $this->colors->get_keys() as $color ) {
        
        echo $this->colors->get_admin_css( $color );
      }
      
      foreach ( $this->sizes->get_keys() as $size ) {
        
        echo $this->sizes->get_admin_css( $size );
      }
   
      echo '</style>';
      
    }
    
    
    /**
		 * add the js for the spinners to the footer
		 *
     * @since 1
     * @access public
     */
    public function add_admin_js_to_footer() {
      
      $current_spinner    = $this->current_spinner;
      $current_fore_color = $this->colors->get_color( $this->current_color );
      $current_back_color = $this->colors->get_bg_color( $this->current_color );
      $current_size_class = $this->sizes->get_admin_css_class( $this->current_size );
      
      ?>
      <script type="text/javascript">
        var current_spinner    =  <?php echo $current_spinner; ?>;
        var current_fore_color = '<?php echo $current_fore_color; ?>';
        var current_back_color = '<?php echo $current_back_color; ?>';
        var current_size_class = '<?php echo $current_size_class; ?>';
      </script>
      <?php
      
    }
    
    
    /**
		 * use sanitize_callback of register_setting to store the frontend css
		 *
     * @since 1
     * @access public
     * @param  array $data all data sent by the form
     */
    public function store_frontend_css( $data ) {
      
      update_option( $this->_core->get_option_name_frontend_css(), 'div.wpcf7 .ajax-loader, div.wpcf7 .wpcf7-spinner {background-image:none !important;width:' . $data['size'] . 'px !important;height:' . $data['size'] . 'px !important;color:' . $data['color'] . ' !important;}' . $this->spinners->get_frontend_css( $this->spinners->get_spinner_by_id( $data['type'] ) ) );
      return $data;
      
    }
   
    
  }
  
}