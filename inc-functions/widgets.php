<?php

function tcl_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Right Sidebar', 'tcl' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Appears in the post and page of the site.', 'tcl' ),
        'class'         => 'card-body',
        'before_widget' => '<div class="card mt-3 mb-2 px-3 pb-3">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="card-header">',
        'after_title'   => '</h5>',
    ) );

}
add_action( 'widgets_init', 'tcl_widgets_init' );

