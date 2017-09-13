<?php
/**
 * @package Buzzer
 * @version 0.1
 */
/*
Plugin Name: Buzzer
Plugin URI: 
Description: 
Author: Mark Brand
Version: 0.1
Author URI: http://bymarkbrand.com
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


class Buzzer {
    protected $pluginPath;
    protected $pluginUrl;

    public $settings;
     
    public function __construct()
    {
        // Set Plugin Path
        $this->pluginPath = dirname(__FILE__);
     
        // Set Plugin URL
        $this->pluginUrl = WP_PLUGIN_URL . '/buzzer';

        $this->settings = array(
            'namespace' => 'buzzer/v1',
            'api' => array(
                'route' => 'all'
            )
        );
    }

    public function init() {
        add_action( 'rest_api_init', function () {
            register_rest_route( $this->settings['namespace'], $this->settings['route'], array(
                'methods' => 'GET',
                'callback' => array($this, 'get_feed'),
            ) );
        } );   
    }
}

$buzzer = new Buzzer();