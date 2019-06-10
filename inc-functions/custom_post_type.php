<?php

/**
 * Post type addition
 * Type: Brand
 */
function register_post_type_brand() {

    $labels = array(
        "name" => __( "Brands", "custom-post-type-ui" ),
        "singular_name" => __( " Brand", "custom-post-type-ui" ),
        "all_items" => __( "All Brand", "custom-post-type-ui" ),
    );

    $args = array(
        "label" => __( "Brands", "custom-post-type-ui" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "delete_with_user" => false,
        "show_in_rest" => false,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "menu_icon" => "dashicons-star-filled",
        "hierarchical" => false,
        "rewrite" => array( "slug" => 'brand', "with_front" => false ),
        "query_var" => true,
        "supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields" ),
        "taxonomies" => array( "category", "post_tag" ),
    );
    register_post_type( "brand", $args );
}

/**
 * Remove the slug from published post permalinks. Only affect our custom post type, though.
 */
function gp_remove_cpt_slug( $post_link, $post ) {
    if ( 'casino' === $post->post_type && 'publish' === $post->post_status ) {
        $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
    }
    return $post_link;
}

/**
 * Have WordPress match postname to any of our public post types (post, page, race).
 * All of our public post types can have /post-name/ as the slug, so they need to be unique across all posts.
 * By default, WordPress only accounts for posts and pages where the slug is /post-name/.
 *
 * @param $query The current query.
 */
function gp_add_cpt_post_names_to_main_query( $query ) {
    // Bail if this is not the main query.
    if ( ! $query->is_main_query() ) {
        return;
    }
    // Bail if this query doesn't match our very specific rewrite rule.
    if ( ! isset( $query->query['page'] ) || 2 !== count( $query->query ) ) {
        return;
    }
    // Bail if we're not querying based on the post name.
    if ( empty( $query->query['name'] ) ) {
        return;
    }
    // Add CPT to the list of post types WP will include when it queries based on the post name.
    $query->set( 'post_type', array( 'post', 'page', 'casino' ) );
}


add_action( 'init', 'register_post_type_brand' );
add_filter( 'post_type_link', 'gp_remove_cpt_slug', 10, 2 );
add_action( 'pre_get_posts', 'gp_add_cpt_post_names_to_main_query' );