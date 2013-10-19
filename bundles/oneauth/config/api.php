<?php

return array(
	/**
	 * Providers
	 *
	 * Providers such as Facebook, Twitter, etc all use different Strategies such as oAuth, oAuth2, etc.
	 * oAuth takes a key and a secret, oAuth2 takes a (client) id and a secret, optionally a scope.
	 */
	'providers' => array(

		'basecamp' => array(
			'id'     => '',
			'secret' => '',
		),

		'dropbox' => array(
			'key'    => '',
			'secret' => '',
		),

		'facebook' => array(
			'id'     => getenv('MYSKILLS_FACEBOOK_ID'),
			'secret' => getenv('MYSKILLS_FACEBOOK_SECRET'),
			'scope'  => 'email,offline_access,publish_actions',
		),

		'flickr' => array(
			'key'    => '',
			'secret' => '',
		),

		'foursquare' => array(
			'id'     => '',
			'secret' => '',
		),

		'github' => array(
			'id'     => getenv('MYSKILLS_GITHUB_ID'),
			'secret' => getenv('MYSKILLS_GITHUB_SECRET'),
		),

		'google' => array(
			'id'     => '',
			'secret' => '',
		),

		'instagram' => array(
			'id'     => '',
			'secret' => '',
		),

		'linkedin' => array(
			'key'     => getenv('MYSKILLS_LINKEDIN_KEY'),
			'secret' => getenv('MYSKILLS_LINKEDIN_SECRET'),
		),

		'paypal' => array(
			'id'     => '',
			'secret' => '',
		),

		'soundcloud' => array(
			'id'     => '',
			'secret' => '',
		),

		'tumblr' => array(
			'key'    => '',
			'secret' => '',
		),

		'twitter' => array(
			'key'    => '',
			'secret' => '',
		),

		'vimeo' => array(
			'key'    => '',
			'secret' => '',
		),

		'windowlive' => array(
			'id'     => '',
			'secret' => '',
		),

	),
);