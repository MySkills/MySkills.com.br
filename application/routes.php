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
Remove a Badge from the User list
*/

Route::delete('badges',
	array(
		'before' => 'auth', 'do' => function() {
			try {
				$user = User::find(Auth::user()->id);
				$badge_id = Input::get('badge_id');
				$badge = Badge::find($badge_id);
				$user->badges()->detach($badge->id);
				$user->save();
				return Redirect::to('badges')->with('status','SUCESS!!! You removed your badge.');
			} catch (Exception $e) {
				Log::exception($e);
				return Redirect::to('users/'.$user_id)->with('status', 'ERROR');
			}
		}
	)
);

Route::delete('checkin',
	array(
		'before' => 'auth', 'do' => function() {
			try {
				$user = User::find(Auth::user()->id);
				$technology_id = Input::get('technology_id');
				$technology_user = DB::table('technology_user')
					->where('technology_id','=', $technology_id)
					->where('user_id','=', $user->id)
					->order_by('created_at', 'desc')
					->first();
				 DB::table('technology_user')->delete($technology_user->id);
				return Redirect::to('users/'.$user->id)->with('status','SUCESS!!! You removed your last checkin.');
			} catch (Exception $e) {
				Log::exception($e);
				return Redirect::to('users/'.$user_id)->with('status', 'ERROR');
			}
		}
	)
);

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

/*
Delete Message
*/

Route::delete('messages',
	array(
		'before' => 'auth', 'do' => function() {
			try {
				$message = Message::find(Input::get('message_id'));
				if($message->sender_id == Auth::user()->id || $message->recipient_id == Auth::user()->id) {
					$message->delete();
				}
				return Redirect::to('/messages')->with('status','SUCESSO!!! Mensagem excluída.');
			} catch (Exception $e) {
				Log::exception($e);
				return Redirect::to('/messages')->with('status', 'ERRO');
			}
		}
	)
);

Route::get('admin/mandrill/send', 
	array(
		'before' => 'auth', 'do' => function(){
			ini_set('max_execution_time', 3000);
			$responses = array();
			$users = User::where_not_null('email')->get();
			//$users = User::find(2)->first();
			$since = '22/04/2013';
			foreach ($users as $user) {
				$email_content = View::make('email.08052013')
									->with('page','user_stats')
									->with('user', $user)
									->with('since', $since)
									->render();
				$response = Mandrill::request('messages/send', array(
				    'message' => array(
						'html' => $email_content,
						'subject' => '[myskills] Puxamos o freio. Novo algoritmo de mudança de fase',
						'from_email' => 'eduardo.cruz@myskills.com.br',
						'from_name' => 'Eduardo Cruz (MySkills)',
						'to' => array(array('email'=>$user->email,
											'name'=>$user->name)),
					),
				));
				array_push($responses, $response);
			}
			return View::make('email.sent')
				->with('page','sendmail')
				->with('responses', $responses);
		}
	)
);

Route::get('badges', function()
{
	$badgetypes = Badgetype::where('active', '=', 1)->order_by('points', 'desc')->get();
	return View::make('pages.badges')->with('page','badges')->with('badgetypes',$badgetypes);
});


/*
	Badge page
*/
Route::get('badges/(:any)', function($badge_id)
{
	$badge = Badge::find($badge_id);
	$developers = User::topUsersBy($badge->id);	
	return View::make('pages.badge')
		->with('developers',$developers)
		->with('page','badge')
		->with('badge',$badge)
		->with('og_points',$badge->points)
		->with('og_type', 'myskillsapp:badge')
		->with('og_image', 'http://www.myskills.com.br/img/badges/'.$badge->image)
		->with('og_title', $badge->name)
		->with('og_description', $badge->description);
});

/*
	USERPROFILE
*/
Route::get('badges/(:any)/earn', function($badge_id)
{

	$facebook = IoC::resolve('facebook-sdk');
	$user_data = Session::get('oneauth');
	$access_token = unserialize($user_data['token']);
	$facebook = $facebook->setAccessToken($access_token->access_token);
	$response = $facebook->api(
		'me/myskillsapp:earn',
		'POST',
		array('badge' => 'http://www.myskills.com.br/badges/'.$badge_id)
	);

	$badge = Badge::find($badge_id);
	return View::make('pages.badge')
		->with('page','badge')
		->with('badge',$badge)
		->with('og_points',$badge->points)
		->with('og_type', 'myskillsapp:badge')
		->with('og_image', 'http://www.myskills.com.br/img/badges/'.$badge->image)
		->with('og_title', $badge->name)
		->with('og_description', $badge->description);
});

Route::get('bolsas/usuarios', function()
{
	return View::make('bolsas.usuarios')->with('page','users');
});

/*
	BLOG
*/
Route::get('blog', function()
{
	return View::make('pages.blog')->with('page','blog');
});

Route::get('channel', function()
{
	return View::make('pages.channel')->with('page','channel');
});

/*
	LEADERBOARD - List all users
*/
Route::get('developers', function()
{
	$topusers = User::topUsers();
	$newusers = User::order_by('created_at', 'desc')->take(count($topusers))->get();
	return View::make('pages.users')
		->with('page','developers')
		->with('topusers', $topusers)
		->with('newusers', $newusers);
});


/*
	List all inactive users
*/
Route::get('developers/inactive', function()
{
	$users = User::where('lastlogin', '=', '0000-00-00 00:00:00')->order_by('id', 'asc')->get();
	return View::make('pages.users_inactive')
		->with('page','inactive')
		->with('users', $users);
});

/*
	List all active users
*/
Route::get('developers/active', function()
{
	$users = User::where('lastlogin', '>', '0000-00-00 00:00:00')->order_by('lastlogin', 'asc')->get();
	return View::make('pages.users_inactive')
		->with('page','inactive')
		->with('users', $users);
});


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
	$jobs = Job::where('active', '=', '1')->order_by('created_at', 'desc')->get();	
	if (Input::get('recruiter_id')) {
		return View::make('pages.recruiterjobs')->with('page','recruiterjobs')->with('recruiter_id', Input::get('recruiter_id'))->with('jobs', $jobs);
	} else {
		return View::make('pages.jobs')->with('page','jobs')->with('jobs', $jobs);
	}

});

Route::get('login', function() {
    return View::make('checkin.login')->with('page','checkin.login');
});


Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('/');
});

Route::get('stats', 
	array(
		'before' => 'auth', 'do' => function(){
			$user = User::find(2)->first();
		 	return View::make('email.20130311')
		 		->with('page','20130311')
		 		->with('since','04/11/2013')
		 		->with('user', $user);
		}
	)
);

Route::get('manguezal', function()
{
		return View::make('manguezal.jobs')->with('page','manguezal');
});

Route::get('marketplace', function()
{
	$topUsers = User::topUsers();
	return View::make('pages.marketplace')->with('page','marketplace')->with('topUsers', $topUsers);

});



Route::get('messages', 
	array(
		'before' => 'auth', 'do' => function(){
			$user = User::find(Auth::user()->id);
		 	return View::make('pages.messages')
		 		->with('messages', $user->privatemessages())
		 		->with('page','messages');
		}
	)
);

Route::get('pricing', function()
{
	return View::make('pages.pricing')->with('page','pricing');
});

Route::get('privacypolicy', function()
{
	return View::make('pages.privacypolicy')->with('page','privacypolicy');
});

Route::get('profile', function()
{
	return Redirect::to('users/'.Auth::user()->id)->with('page','profile');
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

Route::get('skills', function()
{
	return View::make('pages.skills')->with('page','skills');
});


Route::get('technologies', function()
{
	$technologies = Technology::topTechnologies();
	$topTechnology = Technology::topFirstTechnology();
	$developers = User::topUsersByTechnology($topTechnology[0]->id);
	return View::make('pages.technology')
		->with('page','technology')	
		->with('developers', $developers)
		->with('technologies', $technologies)
		->with('technology',$topTechnology[0]);
});

Route::get('technology/(:any)', function($technology_id)
{
	$technologies = Technology::topTechnologies();
	$technology = Technology::find($technology_id);
	$developers = User::topUsersByTechnology($technology->id);
	return View::make('pages.technology')
		->with('page','technology')	
		->with('developers', $developers)
		->with('technologies', $technologies)
		->with('technology',$technology);
});

Route::get('termsofuse', function()
{
	return View::make('pages.termsofuse')->with('page','termsofuse');
});


/*
	LEADERBOARD - List all users
*/
Route::get('upgrade', function()
{
	return View::make('pages.upgrade')->with('page','upgrade');
});

/*
	USERPROFILE
*/
Route::get('users/(:num)', function($user_id)
{
	$technology_list = Technology::order_by('name', 'asc')->lists('name', 'id');
	$user = User::find($user_id);
	$user_level = $user->limitedUser()->limitedlevel;
	return View::make('pages.user')
		->with('page','profile')
		->with('technology_list', $technology_list)
		->with('user', $user)
		->with('user_level', $user_level)
		->with('og_title', $user->name)
		->with('og_image', $user->getImageUrl('large'));
});


/*
	USERPROFILE
*/
Route::get('users/(:any)', function($nickname)
{
	$technology_list = Technology::order_by('name', 'asc')->lists('name', 'id');
	$user = User::where('nickname', '=', $nickname)->first();
	return View::make('pages.user')
		->with('page','profile')
		->with('technology_list', $technology_list)
		->with('user', $user)
		->with('og_title', $user->name)
		->with('og_image', $user->getImageUrl('large'));
});


Route::get('welcome', function()
{
	return View::make('onboarding.welcome')->with('page','home');
});

/*
REQUIRE A BADGE. Relate a new badge to a user.
*/
Route::put('badges',
	array(
		'before' => 'auth', 'do' => function() {
			try {
				$badge = Badge::find(Input::get('badge_id'));
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
			    $user_data = Session::get('oneauth');
		        switch($user_data['provider']) {
					case 'facebook' :
						//Fbk::postNewMessage($user_data, 'http://www.myskills.com.br/users/'.Auth::user()->id, 'http://www.myskills.com.br/img/badges/'.$badge->image,'Conquistei um novo Badge no MySkills.: '.$badge->name);
						$facebook = IoC::resolve('facebook-sdk');
						$user_data = Session::get('oneauth');
						$access_token = unserialize($user_data['token']);
						$facebook = $facebook->setAccessToken($access_token->access_token);
						$response = $facebook->api(
							'me/myskillsapp:earn',
							'POST',
							array('badge' => 'http://www.myskills.com.br/badges/'.$badge->id)
						);
					break;
				}
				return Redirect::to('badges')->with('status', __('badges.success_message'));
			} catch (Exception $e) {
				return Redirect::to('badges')->with('status', __('badges.error_message'));
			}
		}
	)
);

Route::put('checkin', 
	array(
		'before' => 'auth', 'do' => function(){
			try {
				$technologies = Technology::lists('name', 'id');
				$technology = Technology::find(Input::get('technology_id'));
				$technology->users()->attach(Auth::user()->id, array('checkin_at'=>date('Y-m-d')));
				//if($user->provider=='facebook') {
				//	$user_data = Session::get('oneauth');
					//Fbk::postMessage($user_data, 'I just made my daily checkin with MySkills Mobile: "Coding with Laravel(PHP)"');
				//}
				return Redirect::to('users/'.Auth::user()->id)->with('status','SUCESS!!! Checkin OK.');
			} catch (Exception $e) {
				Log::exception($e);
				if($e->getCode() == 23000) {
					return Redirect::to('users/'.Auth::user()->id)->with('status', 'ERROR.: Checkin já realizado hoje');
				} else {
					return Redirect::to('users/'.Auth::user()->id)->with('status', 'ERROR.: ');
				}

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
Route::put('messages',
	array(
		'before' => 'auth', 'do' => function() {
			try {				
				$sender 	= User::find(Auth::user()->id);
				$recipient 	= User::find(Input::get('recipient_id'));
				if (isset($recipient)) {					
					$message = Message::create(
					array(
						'sender_id' 	=> $sender->id, 
						'recipient_id' 	=> $recipient->id,
						'text' 	=> Input::get('text')
						)
					);
					$message->save();
					Email::send(
							'Eduardo Cruz',
							'eduardo.cruz@myskills.com.br', 
							$recipient->name, 
							$recipient->email, 
							'[myskills] Nova mensagem de '.$sender->name,
							'Visite o MySkills.com.br para ver a sua nova mensagem.'
					);
					return Redirect::to('users/'.Input::get('recipient_id'))->with('status','SUCESS!!! Message Sent.')->with('page','user');
				} else {
					$message = Message::create(
					array(
						'sender_id' 	=> $sender->id, 
						'text' 	=> Input::get('text')
						)
					);				
					$message->save();							
					return Redirect::to('home')->with('status','SUCESS!!! Message Sent.')->with('page','homeuser');
				}				
			 	
			} catch (Exception $e) {

				return Redirect::to('users/'.Input::get('recipient_id'))->with('status', 'ERROR')>with('page','user');
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
				$user->nickname = Input::get('nickname');				
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
    if (Auth::guest()) return Redirect::to('/');
});

Route::filter('connect', function()
{
	if (Auth::guest()) return Redirect::to('/');
});