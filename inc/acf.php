<?php
// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/inc/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/inc/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
// add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
function my_acf_settings_show_admin( $show_admin ) {
    return false;
}

 
function filter_block_categories_when_post_provided( $block_categories, $editor_context ) {
    if ( ! empty( $editor_context->post ) ) {
        array_push(
            $block_categories,
            array(
                'slug'  => 'odinwise-blocks',
                'title' => __( 'odinwise Blocks', 'Work With odinwise' ),
                'icon'  => null,
            )
        );
    }
    return $block_categories;
}
 
add_filter( 'block_categories_all', 'filter_block_categories_when_post_provided', 10, 2 );
function custom_block_category( $categories ) {
    $custom_block = array(
		'slug'  => 'odinwise-blocks',
		'title' => __( 'odinwise Blocks', 'Work With odinwise' ),
    );

    $categories_sorted = array();
    $categories_sorted[0] = $custom_block;

    foreach ($categories as $category) {
        $categories_sorted[] = $category;
    }

    return $categories_sorted;
}
add_filter( 'block_categories', 'custom_block_category', 10, 2);
add_action( 'acf/init', 'register_odinwise_blocks' );
function register_odinwise_blocks() {
	if ( function_exists( 'acf_register_block_type' ) ) {

		// Register Logo block
		acf_register_block_type( array(
			'name' 					=> 'logo',
			'title' 				=> __( 'Logo' ),
			'description' 			=> __( 'A custom Logo block.' ),
			'category' 				=> 'odinwise-blocks',
			'icon'					=> 'format-image',
			'keywords'				=> array( 'logo' ),
			'post_types'			=> array( 'post', 'page' ),
			'mode'					=> 'auto',
			// 'align'				=> 'wide',
			'render_template'		=> 'template-parts/blocks/logo.php',
			// 'render_callback'	=> 'logo_block_render_callback',
			// 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/logo/logo.css',
			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/logo/logo.js',
			// 'enqueue_assets' 	=> 'logo_block_enqueue_assets',
		));

        		// Register Header block
		acf_register_block_type( array(
			'name' 					=> 'header',
			'title' 				=> __( 'Header' ),
			'description' 			=> __( 'A header block for Odin Wise one pagers' ),
			'category' 				=> 'odinwise-blocks',
			'icon'					=> 'heading',
			'keywords'				=> array( 'header' ),
			'post_types'			=> array( 'post', 'page' ),
			'mode'					=> 'auto',
			// 'align'				=> 'wide',
			'render_template'		=> 'template-parts/blocks/header.php',
			// 'render_callback'	=> 'logo_block_render_callback',
			// 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/logo/logo.css',
			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/logo/logo.js',
			// 'enqueue_assets' 	=> 'logo_block_enqueue_assets',
		));
        // Register Section block
		acf_register_block_type( array(
			'name' 					=> 'section',
			'title' 				=> __( 'Section' ),
			'description' 			=> __( 'A Section block for Odin Wise one pagers' ),
			'category' 				=> 'odinwise-blocks',
			'icon'					=> 'layout',
			'keywords'				=> array( 'section' ),
			'post_types'			=> array( 'post', 'page' ),
			'mode'					=> 'auto',
			// 'align'				=> 'wide',
			'render_template'		=> 'template-parts/blocks/section.php',
			// 'render_callback'	=> 'logo_block_render_callback',
			// 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/logo/logo.css',
			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/logo/logo.js',
			// 'enqueue_assets' 	=> 'logo_block_enqueue_assets',
		));

	}

}