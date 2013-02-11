<?php

return array(

	// Number of minutes before location data should be refreshed
	// Set to "0" to not automatically refresh
	'refresh_rate' => 0,

	// MaxMind API Key (http://www.maxmind.com/app/web_services#city)
	'maxmind_key' => '',

	// IPInfoDB API Key (http://ipinfodb.com/register.php)
	'ipinfodb_key' => '',

	// Service priority
	// Options: 'MaxMind', 'IPInfoDB', 'FreeGeoIP'
	'service_priority' => array(
		'IPInfoDB',
		'MaxMind',
		'FreeGeoIP',
	),

	// Fallback IP Address
	// Allows you to use a fallback IP address when the user's IP
	// is 127.0.0.1 or cannot be determined
	'fallback_ip' => '64.90.182.55',

);