<?php
/*
Plugin Name: Opap Results Widget
Plugin URI: 
Description: Displays Latest Opap Number Games Results
Version: 1.0.0
Author: Marina Pappa
*/

//Exit if accessed directly

if (!defined('ABSPATH')){
    exit;
}

//Load Scripts
require_once(plugin_dir_path(__FILE__) . '/includes/opapresults-scripts.php');

//Load Class
require_once(plugin_dir_path(__FILE__) . '/includes/opapresults-class.php');

//Register the Widget
function register_opapresults(){
    register_widget('Opap_Results_Widget');
}

//Hook in function
add_action('widgets_init','register_opapresults');