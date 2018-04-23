<?php

class FreeGeoIP
{
	public static function run()
	{
		$response = @file_get_contents('http://freegeoip.net/json/' . Locate::ip());

		if ($response !== false)
		{
			$response = json_decode($response, true);

			// Verify fields
			$required_fields = array('city', 'region_name', 'latitude', 'longitude');
			foreach ($required_fields AS $field)
			{
				if ( ! isset($response[$field]) || empty($response[$field])) return false;
			}

			return array(
				'city' => ucwords(strtolower($response['city'])),
				'state' => ucwords(strtolower($response['region_name'])),
				'state_code' => strtoupper($response['region_code']),
				'country' => ucwords(strtolower($response['country_name'])),
				'country_code' => strtoupper($response['country_code']),
				'zipcode' => $response['zipcode'],
				'lat' => $response['latitude'],
				'lng' => $response['longitude'],
			);
		}

		return false;
	}
}