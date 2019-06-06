<?php
/*
Plugin Name: Site Health Recommendations
Plugin URI: https://github.com/BronsonQuick/site-health-recommendations
Description: A plugin to make some more recommendations for Site Health performance.
Version: 0.1.0
Author: Bronson Quick
Tags: site-health
Author URI: https://www.bronsonquick.com.au
Text Domain: site-health-recommendations
Domain Path: /languages
Requires PHP: 5.6
*/

namespace Site_Health_Recommendation;

/**
 * Add additional modules that we'd like to recommend to Site Health.
 * @param $modules
 * @return array
 */
function add_recommendations( $modules ) {
	$recommendations =[
		'opcache' => [
			'extension' => 'opcache',
			'required'  => false,
		],
        'memcache' => [
            'extension' => 'memcache',
            'required'  => false,
        ],
        'memcached' => [
            'extension' => 'memcached',
            'required'  => false,
        ],
	];

	$recommended_modules = array_merge( $recommendations, $modules );

	return (array) $recommended_modules;
}

add_filter( 'site_status_test_php_modules', __NAMESPACE__ . '\\add_recommendations' );
