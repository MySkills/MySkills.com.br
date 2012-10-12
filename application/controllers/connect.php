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
			$user->setUserData($user_data);	
    }
    $user->save();
    Auth::login($user->id, true);

    //if (Auth::attempt($login))
    // Synced it with oneauth, this will create a relationship between
    // `oneauth_clients` table with `users` table.
    Event::fire('oneauth.sync', array($user->id));		
    switch($user_data['provider']) {
      case 'facebook' :
          $facebook = IoC::resolve('facebook-sdk');
          $access_token = unserialize($user_data['token']); 
          $facebook = $facebook->setAccessToken($access_token->access_token);                
          $user_id = $facebook->getUser();      
          if($user_id) {
              // We have a user ID, so probably a logged in user.
              // If not, we'll get an exception, which we handle below.
              try {
                $ret_obj = $facebook->api('/me/feed', 'POST',
                                            array(
                                              'link' => 'www.myskills.com.br',
                                              'message' => 'Join me and choose your next professional achievements. :)'
                                         ));
              // echo '<pre>Post ID: ' . $ret_obj['id'] . '</pre>';
              } catch(FacebookApiException $e) {
                // If the user is logged out, you can have a 
                // user ID even though the access token is invalid.
                // In this case, we'll get an exception, so we'll
                // just ask the user to login again here.
                $login_url = $facebook->getLoginUrl( array(
                               'scope' => 'publish_stream'
                               )); 
                error_log($e->getType());
                error_log($e->getMessage());
              }   
          } else {
              // No user, so print a link for the user to login
              // To post to a user's wall, we need publish_stream permission
              // We'll use the current URL as the redirect_uri, so we don't
              // need to specify it here.
              $login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_stream' ) );
              //echo 'Please <a href="' . $login_url . '">login.</a>';
         } 
      break;
    }
    Session::forget('user_data');
    // return OneAuth\Auth\Core::redirect('registered'); // redirect to /home
    return View::make('onboarding.welcome')->with('page','welcome');
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
 
