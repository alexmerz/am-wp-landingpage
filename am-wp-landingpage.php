<?php
/**
 * @package AM_WP_Landingpage
 * @wordpress-plugin
 * 
 * Plugin Name: Landingpage Creator  
 * Description: Replace tag and category pages with a landingpage
 * Author: Alexander Merz <alexander.merz@gmail.com>
 * Version: 1.0.0
 */

namespace AM_WP_Landingpage;

define( 'AM_WP_Landingpage', '1.0.0' );

require_once( __DIR__ . '/views/pageadmin.php' );
require_once( __DIR__ . '/logic/filter.php' );

$admin_landingpage = new Admin_Landingpage();
$logic_landingpage = new Logic_Landingpage();