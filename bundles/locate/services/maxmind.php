<?php

class MaxMind
{
	public static function run()
	{
		// Jump ship if no key has been specified
		if ( ! Config::has('locate::options.maxmind_key'))
		{
			return false;
		}

		$options = array(
			'l' => Config::get('locate::options.maxmind_key'),
			'i' => Locate::ip(),
		);

		$response = @file_get_contents('http://geoip.maxmind.com/b?' . http_build_query($options));

		if ($response !== false)
		{
			$response = explode(',', $response);

			// Verify fields
			if ( isset($response[5]) && $response[5] == 'IP_NOT_FOUND') return false;

			$required_fields = array(1, 2, 3, 4);
			foreach ($required_fields AS $field)
			{
				if ( ! isset($response[$field]) || empty($response[$field])) return false;
			}

			$states = Config::get('locate::abbrevs.states');

			return array(
				'city' => $response[2],
				'state' => isset($states[$response[1]]) ? $states[$response[1]] : null,
				'state_code' => $response[1],
				'country' => $response[0],
				'country_code' => $response[0],
				'zipcode' => null,
				'lat' => $response[3],
				'lng' => $response[4],
			);
		}

		return false;
	}
}