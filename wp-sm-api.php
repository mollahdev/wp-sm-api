<?php
namespace WP_SM_API;
use WP_SM_API\Controller\StudentController;
use WP_SM_API\Controller\ServiceController;
use WP_SM_API\Controller\UserController;
use WP_SM_API\Model\UserModel;

/*
* Plugin Name:       WP Student Management Api
* Description:       A Student Management Plugin that provides with Api
* Version:           1.0.0
* Requires at least: 6.0
* Requires PHP:      7.4
* Author:            Ashraf Mollah
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// define plugin working directory
define( 'WP_SM_API_DIR', plugin_dir_path( __FILE__ ) );

// add autoload
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
    require_once( ABSPATH . 'wp-admin/includes/image.php' );
	require_once( ABSPATH . 'wp-admin/includes/file.php' );
	require_once( ABSPATH . 'wp-admin/includes/media.php' );
    
    // add time zone to dhaka
    date_default_timezone_set('Asia/Dhaka');

    // create user roles
    UserModel::create_roles();

    // init controllers
    new UserController();
    new StudentController();
    new ServiceController();
}
