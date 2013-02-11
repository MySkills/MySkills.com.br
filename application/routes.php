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

/*
Unfollow User
*/

Route::delete('followers',
	array(
		'before' => 'auth', 'do' => function() {
			try {
				$follower = User::find(Auth::user()->id);
				$user_id = Input::get('user_id');
				$user = User::find($user_id);
				$user->followers()->detach(Auth::user()->id);
				$user->save();
				return Redirect::to('users/'.$user_id)->with('status','SUCESS!!! You unfollowed this user.');
			} catch (Exception $e) {
				Log::exception($e);
				return Redirect::to('users/'.$user_id)->with('status', 'ERROR');
			}
		}
	)
);

/*
Delete job position for a company.
*/
Route::delete('jobs/(:num)',
	array(
		'before' => 'auth', 'do' => function($id) {
			$job = Job::find($id);
			if($job->recruiter_id == Auth::user()->id){
				try {
					
					$job->delete();
				 	return Redirect::to('jobs')->with('status','SUCESS!!! You successfully deleted a job position.');
				} catch (Exception $e) {
					return Redirect::to('jobs')->with('status', 'ERROR');
				}			
			}
			return Redirect::to('jobs')->with('status', 'ERROR');
		}
	)
);

Route::get('badges', function()
{
	return View::make('pages.badges')->with('page','badges');
});

Route::get('send', function(){
	$response = Mandrill::request('messages/send', array(
	    'message' => array(
	        'html' => 'Body of the message.',
	        'subject' => '[myskills] Mandrill Santa Message .',
	        'from_email' => 'eduardo.cruz@myskills.com.br',
	        'from_name' => 'Eduardo Cruz (MySkills)',	        
	        'to' => array(array('email'=>'eduardo.cruz@rise.com.br',
	        					'name'=>'Eduardo Cruz (RiSE)')),
	    ),
	));
	return View::make('email.sent')->with('page','sent');	
});

Route::get('checkin/(:any)', 
	array(
		'before' => 'auth', 'do' => function($skill){
			$data = array('technology'  => $skill);
			try {
				$user = User::find(Auth::user()->id);
				$technology = Technology::find(1);
				$technology->users()->attach(Auth::user()->id, array('checkin_at'=>date('Y-m-d')));
				if($user->provider=='facebook') {
					$user_data = Session::get('oneauth');
					Fbk::postMessage($user_data, 'I just made my daily checkin with MySkills Mobile: "Coding with Laravel(PHP)"');
				}
			 	return View::make('checkin.success')->with('page','checkin.success')->with('status','SUCCESS')->with('technology', $skill);
			} catch (Exception $e) {
				return View::make('checkin.success')->with('page','checkin.success')->with('status', 'ERROR')->with('technology', $skill);
			}
		}
	)
);

Route::get('edit_user', function()
{
	return View::make('pages.edit_user')->with('page','edit_user');
});

Route::get('faq', function()
{
	return View::make('pages.faq')->with('page','faq');
});

Route::get('features', function()
{
	return View::make('pages.features')->with('page','features');
});

Route::get('jobs', function()
{
	if (Input::get('recruiter_id')) {
		return View::make('pages.recruiterjobs')->with('page','recruiterjobs')->with('recruiter_id', Input::get('recruiter_id'));
	} else {
		return View::make('pages.jobs')->with('page','jobs');
	}

});

Route::get('login', function() {
    return View::make('checkin.login')->with('page','checkin.login');
});


Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('/');
});

Route::get('pricing', function()
{
	return View::make('pages.pricing')->with('page','pricing');
});

Route::get('profile', function()
{
	return Redirect::to('users/'.Auth::user()->id)->with('page','profile');
});


Route::get('skills', function()
{
	return View::make('pages.skills')->with('page','skills');
});

/*
	LEADERBOARD - List all users
*/
Route::get('users', function()
{
	return View::make('pages.users')->with('page','users');
});

Route::get('bolsas/usuarios', function()
{
	return View::make('bolsas.usuarios')->with('page','users');
});

Route::get('users/candidates', function()
{
	return View::make('pages.users')->with('page','users');
});

/*
	USERPROFILE
*/
Route::get('users/(:any)', function($permalink)
{
	return View::make('pages.user')->with('page','profile')->with('permalink',$permalink);
});


Route::get('welcome', function()
{
	return View::make('onboarding.welcome')->with('page','home');
});

/*
REQUIRE A BADGE. Relate a new badge to a user.
*/
Route::put('badges/(:num)/(:num)',
	array(
		'before' => 'auth', 'do' => function($id, $user_id) {
			try {
				$badge = Badge::find($id);
				$badge->users()->attach(Auth::user()->id);
				$badge->save();
			    //e-mail notification about new user
			    $response = Mandrill::request('messages/send', array(
			    'message' => array(
			        'html' => 
			        '<p><strong>Eles querem Badges!!! :D</strong></p>'.
			        '<p>Badge -> '.$badge->name.'</p>'.
			        '<p>User Profile -> <a href="http://www.myskills.com.br/users/'.Auth::user()->id.'">http://www.myskills.com.br/users/'.Auth::user()->id.'</a></p>'
			        ,
			        'subject' => '[myskills] Nova solicitação de Badge - '.$badge->name,
			        'from_email' => 'eduardo.cruz@myskills.com.br',
			        'from_name' => 'Eduardo Cruz (MySkills)',         
			        'to' => array(array('email'=>'eduardo.cruz@myskills.com.br',
			                  'name'=>'Eduardo Cruz (MySkills)')),
			    ),
			   ));


				return Redirect::to('badges')->with('status','SUCESS!!! You successfully applied for a new badge. We will contact you soon.');
			} catch (Exception $e) {
				return Redirect::to('badges')->with('status', 'ERROR');
			}
		}
	)
);


/*
FOLLOW USER;
*/
Route::put('followers',
	array(
		'before' => 'auth', 'do' => function() {
			try {
				$follower = User::find(Auth::user()->id);
				$user_id = Input::get('user_id');
				$user = User::find($user_id);
				$user->followers()->attach(Auth::user()->id);
				$user->save();
			    //e-mail notification about new user
			    $response = Mandrill::request('messages/send', array(
			    'message' => array(
			        'html' => 
			        '<p><strong>New Follower on MySkills!!!</strong></p>'.
			        '<p>Follower -> '.$follower->name.'</p>'.
			        '<p>User Profile -> <a href="http://www.myskills.com.br/users/'.Auth::user()->id.'">http://www.myskills.com.br/users/'.Auth::user()->id.'</a></p>'
			        ,
			        'subject' => '[myskills] Novo Seguidor no MySkills - '.$follower->name,
			        'from_email' => 'eduardo.cruz@myskills.com.br',
			        'from_name' => 'Eduardo Cruz (MySkills)',         
			        'to' => array(array('email'=> $user->email,
			                  'name'=> $user->name)),
			    ),
			   ));
				return Redirect::to('users/'.$user_id)->with('status','SUCESS!!! You are following a new user.');
			} catch (Exception $e) {
				Log::exception($e);
				return Redirect::to('users/'.$user_id)->with('status', 'ERROR');
			}
		}
	)
);


/*
Add a new job position for a company.
*/
Route::put('jobs/(:num)',
	array(
		'before' => 'auth', 'do' => function($user_id) {
			try {
				$job = new Job;
				$job->title = Input::get('title');
				$job->description = Input::get('description');
				$job->company = Input::get('company');
				$job->benefits = Input::get('benefits');								
				$job->recruiter_id = Auth::user()->id;
				$job->save();
			 	return Redirect::to('jobs')->with('status','SUCESS!!! You successfully created a new job position.');
			} catch (Exception $e) {
				return Redirect::to('jobs')->with('status', 'ERROR');
			}			
		}
	)
);

/*
APPLY FOR A JOB. Add a user for a job position.
*/
Route::put('jobs/(:num)/(:num)',
	array(
		'before' => 'auth', 'do' => function($id, $user_id) {
			try {
				$job = Job::find($id);
				$job->candidates()->attach(Auth::user()->id);
			 	return Redirect::to('jobs')->with('status','SUCESS!!! You successfully applied for a job position. The recruiter will contact you soon.');
			} catch (Exception $e) {
				return Redirect::to('jobs')->with('status', 'ERROR');
			}			
		}
	)
);

/*
	UPDATE user data.
*/
Route::put('users',
	array(
		'before' => 'auth', 'do' => function() {
			try {
				$user = User::find(Auth::user()->id);
				$user->name = Input::get('name');
				$user->email = Input::get('email');
				$user->video_url = Input::get('video_url');	
				$user->save();
			 	return Redirect::to('edit_user')->with('status','SUCESS!!! You successfully .');
			} catch (Exception $e) {
				return Redirect::to('edit_user')->with('status', 'ERROR');
			}			
		}
	)
);


Route::filter('auth', function()
{
    if (Auth::guest()) return Redirect::to('login');
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

Route::filter('connect', function()
{
	Log::myskills('Filter - Connect'); 
	if (Auth::guest()) return Redirect::to('login');
});