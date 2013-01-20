<?php

// File: application/controllers/connect.php
class Connect_Controller extends OneAuth\Auth\Controller {
 	
 	/**
     * View proper error message when authentication failed or cancelled by user
     *
     * @param   String      $provider       Provider name, e.g: twitter, facebook, google …
     * @param   String      $e              Error Message
     * Registration Page
     */
  public function action_register()
  {
    $user = new User;
    if ($_POST)
    {
        // it a POST Request, you should validate the form
        $user->nickname = Input::get('username');
        $user->password = Hash::create(Input::get('password'));
        $user->email    = Input::get('email');
    } else {
			$user_data = Session::get('oneauth');	
      $existing_user = User::where_uid($user_data['info']['uid'])->first();
      if (is_object($existing_user)){
        $user = $existing_user;
        $user->setUserData($user_data);
      } else {
        $user->setUserData($user_data);
      }

//      if  ($user_data['info']['uid'] == $existing_user->uid)
    }
    $user->save();
    Auth::login($user->id, true);

    //if (Auth::attempt($login))
    // Synced it with oneauth, this will create a relationship between
    // `oneauth_clients` table with `users` table.
    Event::fire('oneauth.sync', array($user->id));		
    switch($user_data['provider']) {
      case 'facebook' :        
        Fbk::postMessage($user_data, 'Join me and choose your next professional achievements. :)');
      break;
    }      

    //e-mail notification about new user
    $response = Mandrill::request('messages/send', array(
    'message' => array(
        'html' => 
        '<p><strong>We´ve got a New User!!! :D</strong></p>'.
        '<p>New User -> '.$user->name.'</p>'.
        '<p>e-mail -> '.$user->email.'</p>'.
        '<p>Provider -> '.$user->provider.'</p>'.
        '<p>User Profile -> <a href="http://pagodabox.local/users/'.$user->id.'">http://pagodabox.local/users/'.$user->id.'</a></p>'
        ,
        'subject' => '[myskills] Novo Usuário - '.$user->name,
        'from_email' => 'eduardo.cruz@myskills.com.br',
        'from_name' => 'Eduardo Cruz (MySkills)',         
        'to' => array(array('email'=>'eduardo.cruz@myskills.com.br',
                  'name'=>'Eduardo Cruz (MySkills)')),
    ),
   ));

    Session::forget('user_data');
    // return OneAuth\Auth\Core::redirect('registered'); // redirect to /home
    return View::make('onboarding.welcome')->with('page','register');
  }

    /**
     * Login Page
     */
    public function action_login()
    {
		Log::myskills('action_login');    	
        if ($_POST)
        {
            // it a POST Request, you should validate the form

            $login = array(
                'username' => Input::get('username'), 
                'password' => Input::get('password')
            );

            if (Auth::attempt($login))
            {
                // get logged user id.
                $user_id = Auth::user()->id;

                // Synced it with oneauth, this will create a relationship between
                // `oneauth_clients` table with `users` table.
                Event::fire('oneauth.sync', array($user_id));

                return OneAuth\Auth\Core::redirect('logged_in'); // redirect to /home
            } 
        } else {
			return View::make('BLABLABLA');        	
        }

        //return View::make('auth.login');
    }    
}
 
