<?php
/**
 * Plugin Name: Reverse Scheduler
 * Plugin URI:
 * Description: A plugin to schedule appointments where the customer sends the available dates and the service provider chooses the best one.
 * Version: 0.1
 * Author: Jean Gustavo Tomé
 * License: GPL2
 * Text Domain: reverse-scheduler
 * 
 * Test description
**/

if ( ! defined( 'ABSPATH' ) ) {
    die( 'Invalid request.' );
}

class ReverseScheduler {
    public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'load_jquery_calendar' ) );
    }

    public function activate() {

    }

    public function deactivate() {
        
    }

    public static function uninstall() {
       
    }

    public function load_jquery_calendar() {
        // Enqueue Bootstrap and jQuery if not already loaded
        wp_enqueue_style( 'bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' );
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery'), null, true );
        
        // Enqueue the calendar CSS and JS
        wp_enqueue_style( 'calendar-css', plugin_dir_url(__FILE__) . 'assets/jquery-calendar-bs4/css/jquery-calendar.min.css' );
        wp_enqueue_script( 'calendar-js', plugin_dir_url(__FILE__) . 'assets/jquery-calendar-bs4/js/jquery-calendar.min.js', array('jquery'), null, true );
    
        // Enqueue the calendar initialization script
        wp_enqueue_script( 'calendar-init', plugin_dir_url(__FILE__) . 'assets/calendar-init.js', array('jquery', 'calendar-js'), null, true );
    }
}

if ( class_exists( 'ReverseScheduler' ) ) {
    $reverse_scheduler = new ReverseScheduler();
    register_activation_hook( __FILE__, array( $reverse_scheduler, 'activate' ) );
    register_deactivation_hook( __FILE__, array( $reverse_scheduler, 'deactivate' ) );
    register_uninstall_hook( __FILE__, array( 'ReverseScheduler', 'uninstall' ) );
}
