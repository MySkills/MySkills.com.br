<?php

class IPInfoDB
{
	public static function run()
	{
		// Jump ship if no key has been specified
		if ( ! Config::has('locate::options.ipinfodb_key'))
		{
			return false;
		}

		$options = array(
			'key' => Config::get('locate::options.ipinfodb_key'),
			'ip' => Locate::ip(),
			'format' => 'json',
		);

		$response = @file_get_contents('http://api.ipinfodb.com/v3/ip-city/?' . http_build_query($options));

		if ($response !== false)
		{
			$response = json_decode($response, true);

			// Verify fields
			if ( ! isset($response['statusCode']) || $response['statusCode'] != 'OK') return false;

			$required_fields = array('cityName', 'regionName', 'latitude', 'longitude');
			foreach ($required_fields AS $field)
			{
				if ( ! isset($response[$field]) || empty($response[$field])) return false;
			}

			return array(
				'city' => ucwords(strtolower($response['cityName'])),
				'state' => ucwords(strtolower($response['regionName'])),
				'state_code' => array_search(ucwords(strtolower($response['regionName'])), Config::get('locate::abbrevs.states')),
				'country' => ucwords(strtolower($response['countryName'])),
				'country_code' => strtoupper($response['countryCode']),
				'zipcode' => $response['zipCode'],
				'lat' => $response['latitude'],
				'lng' => $response['longitude'],
			);
		}

		return false;
	}
}