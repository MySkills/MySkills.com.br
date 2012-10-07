<?php
 
// File: application/controllers/connect.php
class Connect_Controller extends OneAuth\Auth\Controller {
 	
 	/**
     * View proper error message when authentication failed or cancelled by user
     *
     * @param   String      $provider       Provider name, e.g: twitter, facebook, google …
     * @param   String      $e              Error Message
     */

 	/**
    protected function action_error($provider, $e)
    {
        return View::make('auth.errors', compact('provider', 'e'));
    }*/

 	/**
     * Registration Page
     */
    public function action_register()
    {
		Log::myskills('action_register');

        $user           = new User;
        if ($_POST)
        {
            // it a POST Request, you should validate the form
            $user->nickname = Input::get('username');
            $user->password = Hash::create(Input::get('password'));
            $user->email    = Input::get('email');
        } else {
			$user_data = Session::get('oneauth');			
			//used for logging in user
			$user->uid 		= $user_data['info']['uid'];
			$user->provider 	= $user_data['provider'];
			$user->name = $user_data['info']['name'];
			$user->nickname = $user_data['info']['nickname'];			

			//Provider specific info
			switch($user_data['provider']) {
				case 'facebook' :
					$user->email = $user_data['info']['email'];
					$user->url = $user_data['info']['urls']['facebook'];
				break;
				case 'github' :
					$user->email = $user_data['info']['email'];
					$user->url = $user_data['info']['urls']['github'];					
				break;
				case 'linkedin' :
					$user->url = $user_data['info']['urls']['linkedin'];					
				break;
			} 			

        }

		$user->save();
		Auth::login($user->id, true);
		Session::forget('user_data');
        //if (Auth::attempt($login))

		 // Synced it with oneauth, this will create a relationship between
         // `oneauth_clients` table with `users` table.
         Event::fire('oneauth.sync', array($user->id));

        return OneAuth\Auth\Core::redirect('registered'); // redirect to /home
        //return View::make('onboarding.welcome');
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
 
