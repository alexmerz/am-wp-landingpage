<?php

namespace AM_WP_Landingpage;

class Admin_Landingpage {
    public function __construct() {
        \add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
    }

    public function add_admin_menu() {
        \add_submenu_page(
            'edit.php?post_type=page',
            \__('Landingpage'), 
            \__('Landingpage Admin'), 
            'edit_posts', 
            'am-wp-landingpage', 
            array( $this, 'view' ) );
    }

    public function view() {
        
    }
}