<?php
/**
 * @package Buzzer Twitter
 * @version 0.1
 */
/*
Plugin Name: Buzzer Twitter
Plugin URI: 
Description: 
Author: Mark Brand
Version: 0.1
Author URI: http://bymarkbrand.com
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require 'vendor/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

class BuzzerTwitter extends Buzzer {
    protected $connection;

    public function __construct() {
        $this->settings = array(
            'namespace' => 'buzzer/v1',
            'route' => 'twitter/(?P<id>\d+)',
            'api' => array(
                'url' => '',
                'user' => '',
                'consumer_key' => 'vgsqUJo2oKft6KTFdPLsw',
                'consumer_secret' => 'xb3lnLCuKEre6Pes64YExKNF7cszyIsQf6ghcz4ak',
                'acces_token_key' => '62522673-z6m2TLTQXwBnuxiUewopLY4MFRNWeNQ2QUHn9tdW1',
                'acces_token_secret' => 'E0nVEoGbCEIe0KQZzc4gzmx0SDDwQ16wQjRYj9nUrZ4Lc'
			)
        );

        $this->init();
        
        $this->connect();
    }

    public function connect() {
        $this->connection = new TwitterOAuth(
            $this->settings['api']['consumer_key'],
            $this->settings['api']['consumer_secret'],
            $this->settings['api']['acces_token_key'],
            $this->settings['api']['acces_token_secret']
        );
    }

    public function get_feed($data) {  
        $tweets = $this->connection->get("search/tweets", ["q" => "dutch design"]);

        return $this->sort_content($tweets);
    }

    private function sort_content($data) {
        $content = array(
            'meta' => array(
                'next' => $data->search_metadata->next_results
            ),
            'results' => array()
        );

        foreach ($data->statuses as $status) {
            $content_status = array(
                'text' => $status->text,
                'date' => $status->created_at
            );
            array_push($content['results'], $content_status);
        }

        return $content;
    }
}

$buzzerTwitter = new BuzzerTwitter();