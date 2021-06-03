<?php
function divi__child_theme_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'divi__child_theme_enqueue_styles' );

function create_post_type() {
  register_post_type( 'connectors',
    array(
      'labels' => array(
        'name' => __( 'Connectors' ),
        'singular_name' => __( 'Connector'),
        'menu_name' => __( 'Connectors' ),
        'all_items' => __( 'Connectors' ),
        'add_new' => __( 'Add connector' ),
        'add_new_item' => __( 'Add connector' ),
        'edit_item' => __( 'Edit connector' ),
        'new_item' => __( 'New connector' ),
        'view_item' => __( 'View connector' ),
        'search_items' => __( 'Search connectors' ),
        'not_found' => __( 'Connector not found' ),
        'not_found_in_trash' => __( 'Connector not found in trash' ),
      ),
      'public' => true,
      'has_archive' => false,
      'supports' => ['title'],
      'show_in_nav_menus' => false,
      'exclude_from_search' => true,
      'publicly_queryable'  => false
    )
	);
  register_post_type( 'clients',
    array(
      'labels' => array(
        'name' => __( 'Clients' ),
        'singular_name' => __( 'Client'),
        'menu_name' => __( 'Clients' ),
        'all_items' => __( 'Clients' ),
        'add_new' => __( 'Add client' ),
        'add_new_item' => __( 'Add client' ),
        'edit_item' => __( 'Edit client' ),
        'new_item' => __( 'New client' ),
        'view_item' => __( 'View client' ),
        'search_items' => __( 'Search clients' ),
        'not_found' => __( 'Client not found' ),
        'not_found_in_trash' => __( 'Client not found in trash' ),
      ),
      'public' => true,
      'has_archive' => false,
      'supports' => ['title'],
      'show_in_nav_menus' => false,
      'exclude_from_search' => true,
      'publicly_queryable'  => false
    )
	);
  register_post_type( 'testimonials',
    array(
      'labels' => array(
        'name' => __( 'Testimonials' ),
        'singular_name' => __( 'Testimonial'),
        'menu_name' => __( 'Testimonials' ),
        'all_items' => __( 'Testimonials' ),
        'add_new' => __( 'Add testimonial' ),
        'add_new_item' => __( 'Add testimonial' ),
        'edit_item' => __( 'Edit testimonial' ),
        'new_item' => __( 'New testimonial' ),
        'view_item' => __( 'View testimonial' ),
        'search_items' => __( 'Search testimonials' ),
        'not_found' => __( 'Testimonial not found' ),
        'not_found_in_trash' => __( 'Testimonial not found in trash' ),
      ),
      'public' => true,
      'has_archive' => false,
      'show_in_nav_menus' => false,
      'exclude_from_search' => true,
      'publicly_queryable'  => false
    )
	);
}
add_action( 'init', 'create_post_type' );

function load_my_script(){
  wp_register_script( 'scripts', get_stylesheet_directory_uri() . '/src/js/scripts.js');
  wp_enqueue_script( 'scripts' );

  if ( is_page( '12409') ) {
    wp_dequeue_style('divi-style-css');
    wp_deregister_style('divi-style-css');
    wp_enqueue_style( 'homepage-style', get_stylesheet_directory_uri() . '/src/style.css');
    wp_enqueue_style( 'swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css');
    wp_enqueue_script( 'swiper-js','https://unpkg.com/swiper/swiper-bundle.min.js',);
    wp_enqueue_script( 'swiper-init', get_stylesheet_directory_uri() . '/src/js/swiper-init.js', array('jquery'), '1.0', true);
    wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/src/js/main.js',array('jquery'), '1.0', true);
  }
}
add_action('wp_enqueue_scripts', 'load_my_script',9999);