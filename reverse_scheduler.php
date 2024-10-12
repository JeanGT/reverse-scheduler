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
        add_action( 'wp_enqueue_scripts', array( $this, 'load_full_calendar' ) );
    }

    public function activate() {

    }

    public function deactivate() {
        
    }

    public static function uninstall() {
       
    }

    public function load_full_calendar() {        
        // FullCalendar JS
        wp_enqueue_script( 'fullcalendar-js', plugin_dir_url(__FILE__) . 'assets/full-calendar/index.global.js', array('jquery'), null, true );
        
        // Enqueue the custom initialization script
        wp_enqueue_script( 'fullcalendar-init', plugin_dir_url(__FILE__) . 'assets/calendar-init.js', array('jquery', 'fullcalendar-js'), null, true );
    }
}

if ( class_exists( 'ReverseScheduler' ) ) {
    $reverse_scheduler = new ReverseScheduler();
    register_activation_hook( __FILE__, array( $reverse_scheduler, 'activate' ) );
    register_deactivation_hook( __FILE__, array( $reverse_scheduler, 'deactivate' ) );
    register_uninstall_hook( __FILE__, array( 'ReverseScheduler', 'uninstall' ) );
}
