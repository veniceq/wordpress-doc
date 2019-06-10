<?php

function wpb_custom_new_menu() {
    register_nav_menus(
        array(
            'top-menu' => __( 'Top Menu' ),
            'extra-menu' => __( 'Extra Menu' )
        )
    );
}

add_action( 'init', 'wpb_custom_new_menu' );

function custom_primary_menu_fallback() {
    return '
    <ul>
        <li class="index"><a href="/">Home</a></li>
        <li class="work"><a href="/">Our Work</a></li>
        <li class="about"><a href="/">About Us</a></li>
        <li class="method"><a href="/">Contact</a></li>
        <li class="contact"><a href="/">Join Team</a></li>
    </ul>';
}