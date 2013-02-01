<?php
class User extends Eloquent
{
	function setUserData(&$user_data) {
		Log::myskills('setUSerData');
		$this->uid 		= $user_data['info']['uid'];
		$this->provider 	= $user_data['provider'];
		$this->name = $user_data['info']['name'];
		$this->nickname = $user_data['info']['nickname'];	
		switch($user_data['provider']) {
			case 'facebook' :
      			$this->image = $user_data['info']['image'];
				$this->email = $user_data['info']['email'];
				$this->social_url = $user_data['info']['urls']['facebook'];      			
			break;
			case 'github' :
      			$github = json_decode(file_get_contents('https://api.github.com/users/'.$this->nickname));
      			$this->image = $github->avatar_url;
				$this->email = $user_data['info']['email'];
				$this->social_url = $user_data['info']['urls']['github'];					
			break;
			case 'linkedin' :
				$this->social_url = $user_data['info']['urls']['linkedin'];
      			$this->image = $user_data['info']['image'];
			break;
		} 
	}	

	public function getImageUrl($imageFormat) {
		  if ($this->provider == 'facebook') {
		  	//{"error": {"message": "Unknown path components: /picture&type=small","type": "OAuthException","code": 2500}}
		    //return 'https://graph.facebook.com/'.$this->uid.'/picture&type='.$imageFormat;		  	
 		  	 return 'https://graph.facebook.com/'.$this->uid.'/picture';
		  } else {
			return $this->image;
		  }
	}

	public function badges()
	{
	  return $this->has_many_and_belongs_to('Badge');
	}

	public function activebadges()
	{
	  return $this->has_many_and_belongs_to('Badge')->where('badge_user.active','=',true);
	}

	public function getpoints()
	{
		$total = 0;
		foreach ($this->activebadges as $badge) {
			$total = $total + $badge->points;
		}
		return $total;
	}

	public function technologies()
	{
	  return $this->has_many_and_belongs_to('Technology')->with('checkin_at');
	}

	public function active()
	{
	  if ($this->active == 1) {
	  	return 'Active';	
	  }
	  if ($this->active == 0) {
	  	return 'Inactive';	
	  }
	  
	}

}