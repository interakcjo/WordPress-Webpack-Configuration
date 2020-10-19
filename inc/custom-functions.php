<?php

// Allow to upload SVG files
require_once 'allow-svg.php';

// Add theme changer
require_once './theme-changer/theme-change.php';

// Svg icon display & dirname(__FILE__, 1) in main functions.php or dirname(__FILE__, 2) when file is in theme subdirectory
if(!function_exists('svg_icon')) {
    function svg_icon($name, $width) {
        $icon = file_get_contents( dirname(__FILE__, 2) . '/dist/public/images/' . $name .'.svg' );

        if($width) {
        echo "<i class='svg-icon siW-". $width ."'>". $icon ."</i>";
        }
    }
}

// Svg icon display in admin
if(!function_exists('svg_icon_admin')) {
	function svg_icon_admin($name, $width) {
		$icon = file_get_contents( dirname(__FILE__, 2) . '/dist/admin/images/' . $name .'.svg' );

		if($width) {
			echo "<i class='svg-icon siW-". $width ."'>". $icon ."</i>";
		}
	}
}

/* Zamiana page na strona w URL-u */
if(!function_exists('custom_rewrite_pages')) {
	function custom_rewrite_pages() {
		global $wp_rewrite;

		$wp_rewrite->pagination_base = 'strona';
		$wp_rewrite->author_base = 'autor';
	}
	add_action( 'init', 'custom_rewrite_pages' );
}

/* Add title attribute for a element */
if(!function_exists('all_menu_items_title')) {
	function all_menu_items_title( $atts, $item, $args ) {
		if ( ! empty( $item->title ) ) {
			$atts['title'] = esc_attr( $item->title );

			return $atts;
		}
	}
	add_filter( 'nav_menu_link_attributes', 'all_menu_items_title', 10, 3 );
}

// Admin assets
if(!function_exists('admin_custom_assets')) {
	function admin_custom_assets() {
		if ($GLOBALS['pagenow'] == 'wp-login.php' || is_admin()) {
			wp_enqueue_script( 'admin-scripts', get_stylesheet_directory_uri() .'/dist/admin/admin.bundle.js' );
			wp_enqueue_style( 'admin-styles', get_stylesheet_directory_uri() .'/dist/admin/styles/style.css' );
		}
	}

	add_action( 'init', 'admin_custom_assets' );
}

// Frontend assets
if(!function_exists('public_custom_assets')) {
	function public_custom_assets() {
		if ($GLOBALS['pagenow'] != 'wp-login.php' || !is_admin()) {
			wp_enqueue_script( 'public-scripts', get_stylesheet_directory_uri() .'/dist/public/public.bundle.js' );
			wp_enqueue_style( 'public-styles', get_stylesheet_directory_uri() .'/dist/public/styles/style.css' );
		}
	}

	add_action( 'init', 'public_custom_assets' );
}