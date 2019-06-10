<?php

function widgets_footer_bar() {

    register_sidebar( array(
        array(
            'name'          => 'Sideber 1',
            'id'            => 'sidebar',
            'before_widget' => '<div class="span4">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="footer-title">',
            'after_title'   => '</h2>',
        )
    ));

}
add_action( 'widgets_init', 'widgets_footer_bar' );

