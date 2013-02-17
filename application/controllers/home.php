<?php

class Home_Controller extends Base_Controller {

	/*
	|--------------------------------------------------------------------------
	| The Default Controller
	|--------------------------------------------------------------------------
	|
	| Instead of using RESTful routes and anonymous functions, you might wish
	| to use controllers to organize your application API. You'll love them.
	|
	| This controller responds to URIs beginning with "home", and it also
	| serves as the default controller for the application, meaning it
	| handles requests to the root of the application.
	|
	| You can respond to GET requests to "/home/profile" like so:
	|
	|		public function action_profile()
	|		{
	|			return "This is your profile!";
	|		}
	|
	| Any extra segments are passed to the method as parameters:
	|
	|		public function action_profile($id)
	|		{
	|			return "This is the profile for user {$id}.";
	|		}
	|
	*/

	public function action_index()
	{
		//return View::make('pages.users')->with('page','home');
		$topUsers = User::topUsers();

		$newUsers = User::order_by('created_at', 'desc')->take(10)->get();

		if (Auth::check()) {
		  $user = User::find(Auth::user()->id);
		  $user->lastlogin = date('Y-m-d H:i:s');
		  $user->save();
		}

		return View::make('pages.home')->with('page','home')->with('topUsers', $topUsers)->with('newUsers', $newUsers);

	}

}