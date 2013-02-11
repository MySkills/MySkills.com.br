<?php

return array(

	// Number of minutes before location data should be refreshed
	// Set to "0" to not automatically refresh
	'refresh_rate' => 0,

	// MaxMind API Key (http://www.maxmind.com/app/web_services#city)
	'maxmind_key' => '',

	// IPInfoDB API Key (http://ipinfodb.com/register.php)
	'ipinfodb_key' => 'efb532b8923f647059b634ef1996f09cbd126fd8f3cae78b8c926453fff2846a',

	// Service priority
	// Options: 'MaxMind', 'IPInfoDB', 'FreeGeoIP'
	'service_priority' => array(
		'IPInfoDB',
		'FreeGeoIP',
		'MaxMind',
	),

	// Fallback IP Address
	// Allows you to use a fallback IP address when the user's IP
	// is 127.0.0.1 or cannot be determined
	'fallback_ip' => '64.90.182.55',

);