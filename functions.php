<?php

require 'widgets/adress.php';
require 'widgets/photostream.php';

add_action( 'wp_enqueue_scripts', 'style_theme');
add_action('wp_footer', 'scripts_theme');
add_action('after_setup_theme', 'theme_register_nav_menu');
add_action( 'widgets_init', 'register_my_widgets' );

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
add_filter( 'excerpt_more', 'new_excerpt_more' );
add_filter( 'document_title_separator', 'title_sep' );

add_action( 'init', 'register_post_types' );
add_action('after_setup_theme', 'theme_custom_logo');

add_action( 'init', 'create_taxonomy' );

//add_action('wp_ajax_send_mail' , 'send_mail');
//add_action('wp_ajax_nopriv_send_mail', 'send_mail');

/*function send_mail(){
	$contactName = $_POST['contactName'];
	$contactEmail = $_POST['contactEmail'];
	$contactSubject = $_POST['contactSubject'];
	$contactMessage = $_POST['contactMessage'];

	$to = get_option('admin_email');

	remove_all_filters( 'wp_mail_from' );
	remove_all_filters( 'wp_mail_from_name' );

	$headers = [
		'From: ' . $contactName . ' <' . $contactEmail . '>',
		'content-type: text/html',
	];

	wp_mail($to, $contactSubject, $contactMessage, $headers);
	wp_die();
}*/

function theme_custom_logo(){
	add_theme_support( 'custom-logo' );
}

function register_post_types(){
	$labels = array(
		'name'               => 'Portfolio', // primary name for record type
		'singular_name'      => 'Portfolio', // name for one entry of this type
		'add_new'            => 'Add work', // to add a new entry
		'add_new_item'       => 'Adding work', // header of the newly created entry in the admin panel
		'edit_item'          => 'Edit work', // to edit record type
		'new_item'           => 'New work', // text of new entry
		'view_item'          => 'Watch work', // to view entries of this type
		'search_items'       => 'Looking for a job in the portfolio', // to search for these record types
		'not_found'          => 'Not found', // if nothing was found in the search result
		'not_found_in_trash' => 'Not found in trash', // if not found in trash
		'parent_item_colon'  => '', 
		'menu_name'          => 'Portfolio', // menu name
	);
	$args = array(
		'labels' 	  	=> $labels,
		'public' 	  	=> true,
		'show_ui' 	  	=> true, // show interface in admin panel
		'has_archive' 	=> true,
		'description' 	=> 'Our portfolio		', 
		'menu_icon'   	=> 'dashicons-format-image', 
		'menu_position' => 4, 
		'supports' 		=> array( 'title', 'editor', 'comments', 'author', 'thumbnail'),
		'taxonomy' 		=> ['category', 'skills' ],
		
	);
	register_post_type('portfolio', $args);
	register_post_type('slider', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Slide', // primary name for record type
			'singular_name'      => 'Slide', // name for one entry of this type
			'add_new'            => 'Add slide', // to add a new entry
			'add_new_item'       => 'Adding a slide', // header of the newly created entry in the admin panel
			'edit_item'          => 'Slide edit', //to edit record type
			'new_item'           => 'New slide', // text of new entry
			'view_item'          => 'Watch slide', // to view entries of this type
			'search_items'       => 'Search slide', // to search for these record types
			'not_found'          => 'Not found', // if nothing was found in the search result
			'not_found_in_trash' => 'Not found in trash', // if not found in trash
			'parent_item_colon'  => '', 
			'menu_name'          => 'Slider', // menu name
		),
		'description'         => 'Home page slider',
		'public'              => true,
		'publicly_queryable'  => true, // depends on public
		'exclude_from_search' => true, // depends on public
		'show_ui'             => true, // depends on public
		'show_in_nav_menus'   => true, // depends on public
		'show_in_menu'        => true, // to show in the admn menu 
		'show_in_admin_bar'   => true, // depends on show_in_menu
		'show_in_rest'        => true, 
		'rest_base'           => null, 
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-images-alt', 
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','author', 'thumbnail','excerpt', 'post-formats' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
		'show_admin_column'   => false, 
		'show_in_rest'        => null, 
		'rest_base'           => null 
	) );
}
function create_taxonomy(){
	register_taxonomy( 'skills', [ 'portfolio'], [ 
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Skills',
			'singular_name'     => 'Skill',
			'search_items'      => 'Search Skill',
			'all_items'         => 'All Skills',
			'view_item '        => 'View Skill',
			'parent_item'       => 'Parent Skill',
			'parent_item_colon' => 'Parent Skill:',
			'edit_item'         => 'Edit Skill',
			'update_item'       => 'Update Skill',
			'add_new_item'      => 'Add New Skill',
			'new_item_name'     => 'New Skill Name',
			'menu_name'         => 'Skills',
		],
		'description'           => 'Skills that were used in the work on the project.', // описание таксономии
		'public'                => true,
		'hierarchical'          => false,
		'query_var'				=> true,
		'rewrite'               => true,
		'show_admin_column'     => true,
		'show_in_menu'			=> true,
		'show_in_quick_edit'	=> true,
		'sort'					=> true,
	] );
	
}

function title_sep( $sep ){
	$sep = ' | ';

	return $sep;
}

function new_excerpt_more( $more ){
    global $post;
    return '<a class="more-link" href="' . get_permalink($post) . '"> Read More<i class="fa fa-arrow-circle-o-right"></i></a>';
}

function my_navigation_template( $template, $class ){
	/*
	Вид базового шаблона:
	<nav class="navigation %1$s" role="navigation">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links">%3$s</div>
	</nav>
	*/

	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

function register_my_widgets(){
	register_sidebar( array(
		'name'          => 'Right sidebar',
		'id'            => "right_sidebar",
        'description'   => '',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h5 class="widgettitle">',
		'after_title'   => "</h5>\n",
	) );
	register_sidebar( array(
		'name'          => 'Contacts sidebar',
		'id'            => "contacts_sidebar",
        'description'   => '',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h5 class="widgettitle">',
		'after_title'   => "</h5>\n",
    ) );
}

function theme_register_nav_menu(){
    register_nav_menu('top', 'Меню в шапке');
    register_nav_menu('bottom', 'Меню в подвале');
    add_theme_support('title-tag');
    add_theme_support( 'post-thumbnails', array( 'post', 'portfolio', 'slider' ) );  
    add_image_size('post_image', 1300, 500, true);
    add_image_size('portfolio_image', 626, 600, true);
    add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
}

function style_theme(){
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('default', get_template_directory_uri() . '/assets/css/default.css');
    wp_enqueue_style('layout', get_template_directory_uri() . '/assets/css/layout.css');
    wp_enqueue_style('media-queries', get_template_directory_uri() . '/assets/css/media-queries.css');
}

function scripts_theme(){
    wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js');
	wp_enqueue_script( 'jquery' );
    wp_enqueue_script('flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js', ['jquery'], null, true);
    wp_enqueue_script('doubletaptogo', get_template_directory_uri() . '/assets/js/doubletaptogo.js', ['jquery'], null, true);
    wp_enqueue_script('init', get_template_directory_uri() . '/assets/js/init.js', ['jquery'], null, true);
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/modernizr.js', null, null, false);
	//wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], null, true);
}

function dd($dd){
	print_r('<pre>');
	print_r( $dd);
}