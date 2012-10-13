<?php

// File: application/controllers/connect.php
class Checkin_Controller extends Base_Controller {
	
	public function action_laravel()
	{
		 return View::make('checkin.laravel')->with('page','checkin.laravel');
	}
}