<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get('/', function()
{
	return View::make('home.index');
});

Route::get('features', function()
{
	return View::make('pages.features');
});

Route::get('faq', function()
{
	return View::make('pages.faq');
});

Route::get('dashboard', function()
{
	return View::make('pages.dashboard');
});

Route::get('leaderboard', function()
{
	return View::make('pages.leaderboard');
});

Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('/');
});

Route::get('auth/register', function()
{
	$user_data = Session::get('oneauth');

	$user = new User;

	//used for logging in user
	$user->social_uid 		= $user_data['info']['uid'];
	$user->social_provider 	= $user_data['provider'];

	Log::myskills('TESTE');
	//general info
	$user->name = $user_data['info']['name'];
	//$user->lastname = $user_data['info']['last_name'];

	//Provider specific info
	switch($user_data['provider']) {
		case 'facebook' :
			//double check email existence
			$email_check = User::where_email($user_data['info']['email'])->count();
			if ($email_check ==0)
				$user->email = $user_data['info']['email'];
		break;
	}

	//create user and log them in
	$user->save();
	Auth::login($user->id, true);

	Session::forget('user_data');

	//Send to Dashboard
	Redirect::to('dashboard')->with('success', 'Welcome to MySkills.com.br');
	return View::make('pages.dashboard');
});

Route::controller(Controller::detect());

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});