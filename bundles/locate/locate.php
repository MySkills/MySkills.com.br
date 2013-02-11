<?php

/**
 * Locate
 * 
 * Simple IP-based geolocation of your visitors
 *
 * @package 	Locate
 * @author 		Luke Wilkins
 * @copyright 	Luke Wilkins 2012
 * @license 	MIT License <http://www.opensource.org/licenses/mit>
 */
class Locate
{
	public static function get($key = null)
	{
		if ( ! Session::has('locate') || self::check_expired()) self::refresh();
		
		$locate = Session::get('locate');
		
		if (is_null($key)) return $locate;
		elseif (isset($locate[$key])) return $locate[$key];

		return null;
	}

	public static function refresh()
	{
		$default_data = array(
			'service' => null,
			'timestamp' => time(),
			'ip' => self::ip(),
			'city' => null,
			'state' => null,
			'state_code' => null,
			'country' => null,
			'country_code' => null,
			'zipcode' => null,
			'lat' => null,
			'lng' => null,
		);

		foreach (Config::get('locate::options.service_priority') AS $service)
		{
			require_once Bundle::path('locate') . 'services/' . strtolower($service) . '.php';

			$data = $service::run();

			if ($data !== false)
			{
				$default_data['service'] = $service;

				break;
			}
		}

		Session::put('locate', (isset($data) && is_array($data) ? array_merge($default_data, $data) : $default_data));
	}

	private static function check_expired()
	{
		$refresh_rate = Config::get('locate::options.refresh_rate');
		$locate = Session::get('locate');

		if ($refresh_rate > 0 && ($locate['timestamp'] + ($refresh_rate * 60)) < time())
		{
			return true;
		}

		return false;
	}

	public static function ip()
	{
		$ip = Request::ip();

		if (in_array($ip, array('127.0.0.1', '0.0.0.0')))
		{
			return Config::get('locate::options.fallback_ip');
		}

		return $ip;
	}
}