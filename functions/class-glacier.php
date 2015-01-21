<?php
class Glacier{
  const VERSION = '1.0.0';
  protected $plugin_slug = 'gla';
  protected static $instance = null;
  public function __construct(){
    //filters
    add_filter( 'wp_title', array($this, 'home_title') );
    add_filter('admin_footer_text', array($this, 'admin_footer') );

    //actions
    add_action( 'init', array($this, 'theme_supports') );
    add_action( 'init', array($this, 'theme_menus') );
    add_action( 'init', array($this, 'editor_style') );
    add_action( 'login_head', array($this, 'login_css') );
    add_action( 'wp_enqueue_scripts', array($this, 'theme_scripts') );
  }
  public function get_plugin_slug(){
    return $this->plugin_slug;
  }
  public static function get_instance(){
    if(null == self::$instance){
      self::$instance = new self;
    }
    return self::$instance;
  }

  /**
  *
  * Footer Attribution (admin_footer)
  *
  * Add Glacier attribution in footer
  *
  */
  public function admin_footer () {
	   echo 'Theme built using <a target="_blank" href="http://coastalp47.github.io/Glacier/">Glacier</a>, a responsive framework by <a target="_blank" href="http://pateason.com">Pat Eason</a>.';
  }
  /**
  *
  * Login Styles (login_head)
  *
  * Styles the wp-login/wp-admin login forms
  *
  */
  public function login_css() {
     echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/assets/admin/wp-login.css"/>';
  }
  /**
  *
  * Editor Style (add_editor_style)
  *
  * Make the WordPress WYSIWYG look more like your front-end
  *
  */
  public function editor_style(){
    add_editor_style(get_template_directory_uri().'/assets/wp/wp-editor.css');
  }
  /**
  *
  * Nav Menus (register_nav_menus)
  *
  * Default 'Main Nav' and 'Footer Nav' menus
  */
  public function theme_menus(){
    register_nav_menus( array(
      'main_nav' => 'Main navigation and breadcrumb heirarchy',
      'footer_nav' => 'Menu for use in footer',
    ) );
  }
  /**
  *
  * Theme Supports (add_theme_support)
  *
  * Custom Header, Post Formats, Post thumbnails, Feed Links, and HTML5 support
  *
  */
  public function theme_supports(){
    $defaults = array(
    	'default-image'          => get_template_directory_uri().'/assets/img/logo.png',
    	'random-default'         => false,
    	'width'                  => 000,
    	'height'                 => 200,
    	'flex-height'            => true,
    	'flex-width'             => true,
    	'default-text-color'     => '',
    	'header-text'            => false,
    	'uploads'                => true,
    	'wp-head-callback'       => '',
    	'admin-head-callback'    => '',
    	'admin-preview-callback' => '',
    );
    add_theme_support( 'custom-header', $defaults );
    add_theme_support( 'post-formats' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5' );
  }
  /**
  * Enqueue Scripts and Styles (wp_enqueue_style)
  *
  * Gets styles and scripts that we're going to use in the theme
  *
  **/
  function theme_scripts() {
      //style
  	wp_enqueue_style( 'gla-style', get_template_directory_uri() . '/assets/prod/glacier.min.css' );
      //script
  	wp_enqueue_script( 'gla-script', get_template_directory_uri() . '/assets/prod/Glacier.js', array('jquery'), '1.0.0', true );
  }
  /**
  * Title Rewrite (wp_title)
  *
  * For SEO titles
  *
  **/
  public function home_title( $title ){
    if( empty( $title ) && ( is_home() || is_front_page() ) ) {
      return __( 'Home', 'theme_domain' ) . ' | ' . get_bloginfo( 'description' );
    }
    return $title;
  }
  /**
  *
  * Cycle (public function)
  *
  * Returns alternating strings. Based on Ruby's Cycle function: http://apidock.com/rails/ActionView/Helpers/TextHelper/cycle
  *
  **/
  public function cycle($first_value, $values = '*') {
    static $count = array();
    $values = func_get_args();
    $name = 'default';
    $last_item = end($values);
    if( substr($last_item, 0, 1) === ':' ) {
      $name = substr($last_item, 1);
      array_pop($values);
    }
    if( !isset($count[$name]) )
      $count[$name] = 0;
    $index = $count[$name] % count($values);
    $count[$name]++;
    return $values[$index];
  }

}
global $glacier;
$glacier = new Glacier;
