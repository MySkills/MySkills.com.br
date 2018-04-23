<?php 
Class Follower extends Eloquent {

	public static $table  = 'users';

	public function getImageUrl($imageFormat) {
		  if ($this->provider == 'facebook') {
			return 'https://graph.facebook.com/'.$this->uid.'/picture';
		  } else {
			return $this->image;
		  }
	}

}
