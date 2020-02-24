<?php

//Add scripts
function opapresults_add_scripts(){
    // Add Main CSS
    wp_enqueue_style('opapresults-main-style', plugins_url() . '/opapresults/css/style.css');

    //Add Main JS
    wp_enqueue_script('opapresults-main-script', plugins_url() . '/opapresults/js/main.js',array('jquery'));

    //Add Google Script
    wp_register_script('google','https://apis.google.com/js/platform.js');
    wp_enqueue_script('google');
}

add_action('wp_enqueue_scripts', 'opapresults_add_scripts');