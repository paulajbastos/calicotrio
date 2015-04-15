<?php 

// disabele admin bar
show_admin_bar(false);

// enable theme support
add_theme_support( 'post-thumbnails', array('post', 'portfolio', 'pressroom') );

// set thumbnail sizes
add_image_size( '115x115', 115, 115, array('center', 'top') );
add_image_size( '459x239', 459, 239, array('center', 'top') );
add_image_size( '300x300', 300, 300, array('center', 'top') );
add_image_size( '294x168', 294, 168, array('center', 'top') );

// register menus
/*function fc_menus() {
	register_nav_menus(
		array(
			'nav'	=> __( 'main' )
		)
	);
}

add_action( 'init', 'fc_menus' );
*/
// Load assets
function assets() {
	
	
	wp_enqueue_style( 'mmenu-all', get_template_directory_uri() . '/assets/js/vendors/mmenu/jquery.mmenu.all.css');
	//wp_enqueue_style( 'owlcarousel', get_template_directory_uri() . '/assets/css/vendors/owl-carousel/owl.carousel.css');

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr/modernizr-2.7.1.min.js', array(), null, true );
	
	wp_enqueue_script( 'infintescroll', get_template_directory_uri() . '/assets/js/vendors/infinte-scroll/jquery.infinitescroll.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'scrollto', get_template_directory_uri() . '/assets/js/vendors/scroll-to/jquery.scrollTo.min.js', array('jquery'), null, true );
	
	wp_enqueue_script( 'mmenu', get_template_directory_uri() . '/assets/js/vendors/mmenu/jquery.mmenu.min.all.js', array(), false, false );
	wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/js/app.js', array('jquery', 'mmenu'), null, true );
	//wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/js/app.js', array('jquery', 'owlcarousel'), null, true );
}

add_action( 'wp_enqueue_scripts', 'assets' );

function get_top_parent_page_id() {
	global $post;
	 
	if ($post->ancestors) {
		return end($post->ancestors);
	} else {
		return $post->ID;
	}
}


/*
	// Sanitize upload filename
	function sanitize_filename_on_upload($filename) {		
		$ext = end(explode('.',$filename));
		$sanitized = preg_replace('/[^a-zA-Z0-9-_.]/','', substr($filename, 0, -(strlen($ext)+1)));
		$sanitized = str_replace('.','-', $sanitized);
		
		return strtolower($sanitized.'.'.$ext);
	}

	add_filter('sanitize_file_name', 'sanitize_filename_on_upload', 10);

	// Custom page title
	function fc_wp_title( $title ){
		global $page, $paged;

		if ( is_feed() )
			return $title;

		$site_description = get_bloginfo( 'description' );

		$filtered_title = $title . get_bloginfo( 'name' );
		$filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
		$filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) ) : '';

		return $filtered_title;
	}

	add_filter( 'wp_title', 'fc_wp_title' );*/


?>
