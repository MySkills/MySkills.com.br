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

	public function action_index($badge_id=-1)
	{
		if (Auth::user()) {
			$newUsers = User::order_by('created_at', 'desc')->take(10)->get();
			$wallmessages = DB::table('messages')->where_null('recipient_id')->order_by('created_at', 'desc')->get();
			return View::make('pages.homeuser')
				->with('wallmessages', $wallmessages)
				->with('newUsers', $newUsers)
				->with('page','homeuser');
		} else {
			switch ($badge_id) {
				// Devs Certificados
				case 1:
					$badge_id = "41, 10, 8";
					break;
				// Gerentes Certificados
				case 2:
					$badge_id = "15, 45";
					break;
				// Devs Mobile
				case 3:
					$badge_id = "38, 39, 40";
					break;
				// Acadêmicos
				case 4:
					$badge_id = "18, 19";
					break;
				default:
					$topUsers = User::topUsers();
					$newUsers = User::order_by('created_at', 'desc')->take(10)->get();
					$newBadges = Badge::order_by('id', 'desc')->take(10)->get();				
					return View::make('pages.homeguest')
						->with('page','home')
						->with('topUsers', $topUsers)
						->with('newUsers', $newUsers)
						->with('newBadges', $newBadges);
					break;
			}
			$topUsers = User::topUsersBy($badge_id);
			$newUsers = User::order_by('created_at', 'desc')->take(10)->get();
			return View::make('pages.homeguest')
				->with('page','home')
				->with('topUsers', $topUsers)
				->with('newUsers', $newUsers)
				->with('newBadges', $newBadges);
		}
		

	}
}