<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{

	$json 	= file_get_contents('http://myskills.com.br/json/homeStats');
	$stats 	= json_decode($json);
	return View::make('home')
	->with('coins', number_format($stats->checkins, 2, ',', '.'))
	->with('users', $stats->users)
	->with('skills', $stats->badges+$stats->technologies);
});

Route::get('/totalCoins', function()
{
	return Response::json(array('totalCoins' => 5000));
});


Route::get('/total', function()
{
	$json = file_get_contents('http://'.getenv('MYSKILLS_LOCALHOST').'/totalCoins');
	$obj = json_decode($json);
	return $obj->totalCoins;
});

