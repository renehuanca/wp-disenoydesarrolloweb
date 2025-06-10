<?php

function pagesopenfs_styles() {
	// Archivos CSS
	wp_enqueue_style( 'normalize', get_stylesheet_directory_uri() . '/assets/vendor/normalize.css' );
	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/assets/vendor/bootstrap/bootstrap.min.css', array(), '5.3.2' );
	wp_enqueue_style( 'aos', get_stylesheet_directory_uri() . '/assets/vendor/aos/aos.css', array('bootstrap'), '3.6.0' );
	wp_enqueue_style( 'swiper', get_stylesheet_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css', array('bootstrap'), '11.0.5' );
    wp_enqueue_style( 'style', get_stylesheet_uri(), array(), filemtime(get_stylesheet_directory() . '/style.css'));
	wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), '' );

	// Archivos JS
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/vendor/bootstrap/bootstrap.bundle.min.js', array( 'jquery' ), '5.3.2', true );
	wp_enqueue_script( 'aos', get_template_directory_uri().'/assets/vendor/aos/aos.js', array( 'jquery' ), '3.6.0', true );
	wp_enqueue_script( 'swiper', get_stylesheet_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array('jquery'), '11.0.5' );
	wp_enqueue_script( 'js', get_template_directory_uri().'/assets/js/index.js', array('jquery'), '1.0.0', true );

	//if (is_singular('service')) { // fix the about page require the page.css
		wp_enqueue_style( 'single-services-styles', get_stylesheet_directory_uri() . '/assets/css/page.css', array(), '' );
	//}
}

add_action('wp_enqueue_scripts', 'pagesopenfs_styles');

function create_pages() {
    if (!get_page_by_path('about')) {
        $pagina = [
            'post_title'    => 'About',
            'post_name'     => 'about',
            'post_status'   => 'publish',
            'post_type'     => 'page',
		];
        wp_insert_post($pagina);
    }
	if (!get_page_by_path('portfolio')) {
        $pagina = [
            'post_title'    => 'Portfolio',
            'post_name'     => 'portfolio',
            'post_status'   => 'publish',
            'post_type'     => 'page',
		];
        wp_insert_post($pagina);
    } 
	
	flush_rewrite_rules(); 
}

add_action('after_switch_theme', 'create_pages');

function allow_svg_uploads($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'allow_svg_uploads');