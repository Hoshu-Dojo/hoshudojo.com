<?php

// Functions
// ===


// Utilities?
// ---

function getStylesheetUri() {
    echo esc_url( get_template_directory_uri() ) . '/style.css';
}

function getJavascriptUri() {
    echo esc_url( get_template_directory_uri() ) . '/src/js/hoshudojo.js';
}

function getImgDirectory() {
    echo esc_url( get_template_directory_uri() ) . '/src/img';
}

function component($name) {
    echo get_template_part('_' . $name);
}


// Enable Widgets & Sidebars
// ---

register_sidebar( array(
    'name' => __( 'Main Sidebar', 'twentyeleven' ),
    'id' => 'sidebar-1',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>'
) );

register_sidebar( array(
    'name' => __( 'Main Sidebar 2', 'twentyeleven' ),
    'id' => 'sidebar-2',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>'
) );


// Disable Plugin Features
// ---

add_action('wp_print_styles', 'mytheme_dequeue_css_from_plugins', 100);
function mytheme_dequeue_css_from_plugins()  {
	wp_dequeue_style( "custom" );
    wp_deregister_style( "custom" );
    wp_dequeue_style( "grunion.css" );
    wp_deregister_style( "grunion.css" );
}

?>
