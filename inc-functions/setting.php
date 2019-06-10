<?php

/**
 * Utilize proper WordPress titles
 */
add_theme_support( 'title-tag' );

add_theme_support( 'post-thumbnails' );

function add_excerpt() {
    add_post_type_support( 'page', 'excerpt' );
}

add_action( 'init', 'add_excerpt');

/**
 * Remove comments
 */

// Removes from admin menu
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'my_remove_admin_menus' );

// Removes from post and pages
function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
add_action( 'init', 'remove_comment_support', 100 );

// Removes from admin bar
function theme_admin_bar_render() {
    global $wp_admin_bar;

    $wp_admin_bar->remove_menu( 'comments' );
}
add_action( 'wp_before_admin_bar_render', 'theme_admin_bar_render' );