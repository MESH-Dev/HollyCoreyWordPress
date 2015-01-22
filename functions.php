<?php

/* ==========
  Glacier Class
========== */
require_once('functions/class-glacier.php');



/* ==========
  Theme-related functions
========= */
// Extra Functions
require_once('functions/instagram.php');


// Scripts
function HC_scripts() {
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/libs/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_script( 'jquery-tools', get_template_directory_uri().'/assets/js/jquery.tools.min.js',array('jquery'),true );
	wp_enqueue_script( 'hollycorey-script', get_template_directory_uri().'/assets/js/hollycorey.js',array('jquery'),true );
}
add_action( 'wp_enqueue_scripts', 'HC_scripts' );

// CPT
add_action( 'init', 'HC_cpt' );
function HC_cpt() {
	$labels = array(
		'name'               => _x( 'Press'),
		'singular_name'      => _x( 'Press'),
		'menu_name'          => _x( 'Press'),
		'name_admin_bar'     => _x( 'Press'),
		'add_new'            => _x( 'Add New'),
		'add_new_item'       => __( 'Add New Press Article'),
		'new_item'           => __( 'New Press Article'),
		'edit_item'          => __( 'Edit Press Article'),
		'view_item'          => __( 'View Press Article'),
		'all_items'          => __( 'All Press Articles'),
		'search_items'       => __( 'Search Press'),
		'parent_item_colon'  => __( 'Parent Press Article:'),
		'not_found'          => __( 'No press found.'),
		'not_found_in_trash' => __( 'No press found in Trash.')
	);
	$args = array(
		'labels'             => $labels,
		'menu_icon' 				 => 'dashicons-megaphone',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'press' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	); register_post_type( 'press', $args );

	$labels = array(
		'name'               => _x( 'Girls'),
		'singular_name'      => _x( 'Girl'),
		'menu_name'          => _x( 'Girls'),
		'name_admin_bar'     => _x( 'Girls'),
		'add_new'            => _x( 'Add New'),
		'add_new_item'       => __( 'Add New Girl'),
		'new_item'           => __( 'New Girl'),
		'edit_item'          => __( 'Edit Girl'),
		'view_item'          => __( 'View Girl'),
		'all_items'          => __( 'All Girls'),
		'search_items'       => __( 'Search Girls'),
		'parent_item_colon'  => __( 'Parent Girl:'),
		'not_found'          => __( 'No girls found.'),
		'not_found_in_trash' => __( 'No girls found in Trash.')
	);
	$args = array(
		'labels'             => $labels,
		'menu_icon' 				 => 'dashicons-universal-access-alt',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'girls' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	); register_post_type( 'girls', $args );
}

// Split Nav
function HC_get_main_nav(){
  $menu_name = 'main_nav';
  if(($locations = get_nav_menu_locations()) && isset($locations[$menu_name])){
    $menu = wp_get_nav_menu_object($locations[$menu_name]);
    $menu_items = wp_get_nav_menu_items($menu->term_id);
    $newMenu = array();
    foreach($menu_items as $item){
      if($item->menu_item_parent != 0) continue;
      array_push($newMenu, $item);
    } return $newMenu;
  } return false;
}

// Menu Splits
function HC_get_left_nav(){
  $newMenu = HC_get_main_nav();
  $len = count($newMenu);
  $firsthalf = array_slice($newMenu, 0, $len / 2);
  return $firsthalf;
}
function HC_get_right_nav(){
  $newMenu = HC_get_main_nav();
  $len = count($newMenu);
  $secondhalf = array_slice($newMenu, $len / 2);
  return $secondhalf;
}

// Sidebar Nav Walker
class sidebar_walker extends Walker_Nav_Menu{
  function start_el(&$output, $item, $depth, $args){
		global $wp_query;
		global $glacier;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		if($depth != 0){
			$color = $glacier->cycle('green','yellow','pink','purple','grey');
		}else{
			$color = '';
		}
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) .' '.$color .' "';
		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$prepend = '<strong>';
		$append = '</strong>';
		$description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';
		if($depth != 0){
		  $description = $append = $prepend = "";
		}
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
		$item_output .= $description.$args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}

// Menu order
function HC_menu_order() {
	return array(
		'index.php',								// Dashboard
		'edit.php?post_type=girls', // Girls
		'edit.php?post_type=press', // Press
		'edit.php?post_type=page',  // Pages
		'admin.php?page=formidable',// Formidable
		'upload.php',   						// Media
		'themes.php',   						// Appearance
		'edit-comments.php',   			// Comments
		'options-general.php',   		// Settings
		'plugins.php',   						// Plugins
		'users.php',   							// Users
		'tools.php',   							// Tools
		'edit.php?post_type=acf',   // Custom Fields
		'edit.php',									// Posts
	);
}
add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'HC_menu_order' );

// Remove menu pagres
function HC_remove_menus(){
  remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'edit-comments.php' );          //Comments
  //remove_menu_page( 'plugins.php' );                //Plugins
  remove_menu_page( 'tools.php' );                  //Tools
}
add_action( 'admin_menu', 'HC_remove_menus' );
