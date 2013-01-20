<?php

/**
 * A LaravelPHP package for working w/ Mandrill.
 * Based on Scott Travis' Mailchimp Bundle.
 *
 * @package    Mandrill
 * @author     Michael Teeuw <michael@xonaymedia.nl
 * @link       http://https://github.com/michmich/laravel-mandrill
 * @license    MIT License
 */

class Mandrill
{
	//public static function __callStatic($method, $args)
	public static function request($method, $arguments = array())
	{
		Log::info('Mandril Request');	
		Log::info('Method.: '.$method);	
		//Log::info('arguments.: '.var_dump($arguments));
		// load api key
		$api_key = Config::get('mandrill::mandrill.api_key');
		//$api_key = 'fcadf45d-0aa3-4f47-a7f8-6b20abdbb09b';
		Log::info('API_key.: '.$api_key);	
		echo('KEY->'.Config::get('mandrill::mandrill.api_key'));
		
		echo('Var_dump'.var_dump($api_key));
		// determine endpoint
		$endpoint = 'https://mandrillapp.com/api/1.0/'.$method.'.json';
		Log::info('endpoint.: '.$endpoint);
		// build payload
		$arguments['key'] = $api_key;
		//$arguments['key'] = 'fcadf45d-0aa3-4f47-a7f8-6b20abdbb09b';		
		Log::info('$arguments["key"].: '.$api_key);
		// setup curl request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arguments));
		echo('CH1->'.var_dump($ch));
		$response = curl_exec($ch);
		Log::info('response.: '.$response);
		Log::info('ch.: '.$ch);	
		echo('CH2->'.var_dump($ch));
		echo(curl_error($ch));
		// catch errors
		if (curl_errno($ch))
		{
			#$errors = curl_error($ch);
			curl_close($ch);
			
			// return false
//			return false;
			return json_decode($response);			
		}
		else
		{
			curl_close($ch);
			
			// return array
			return json_decode($response);
		}

	}
	
}