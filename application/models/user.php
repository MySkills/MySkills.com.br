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
			return 'https://graph.facebook.com/'.$this->uid.'/picture?type='.$imageFormat;
		} else {
			if($this->image) {
				return $this->image;
			} else {
				return '/img/profile/noavatar.png';
			}
		}
	}

	public function badges()
	{
	  return $this->has_many_and_belongs_to('Badge');
	}

	public function activebadges() {
		return $this->has_many_and_belongs_to('Badge')->where('badge_user.active','=',true)->order_by('points', 'desc');
	}

	public function partial_badges($max) {
		return $this->has_many_and_belongs_to('Badge')->where('badge_user.active','=',true)->order_by('points', 'desc')->take($max)->get();
	}

	public function followers()
	{
	  return $this->has_many_and_belongs_to('Follower');
	}

	public function getpoints()
	{
		$total = 0;
		foreach ($this->activebadges as $badge) {
			$total = $total + $badge->points;
		}
		if($this->count_user_technologies() > 20) {
			return $total * 2;
		} else {
			return $total;
		}
	}

	public function technologies()
	{
	  return $this->has_many_and_belongs_to('Technology')->with('checkin_at');
	}

	public function count_user_technologies() {
		return count($this->technologies()->pivot()->get());
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
	public function getFriends($provider) {
		switch($provider) {
			case 'facebook' :
				$uids = Fbk::getMySkillsFriends();
				$fuids = array();
				foreach ($uids as $uid) {
					array_push($fuids, $uid['uid']);
				}
				if ($fuids) {
					return $friends = User::where_in('uid', $fuids)->order_by('name', 'asc')->get();
				}
			break;
		}
	}

	public static function messages()
	{
	  return Message::where('recipient_id', '=', Auth::user()->id)->or_where('sender_id', '=', Auth::user()->id)->order_by('created_at', 'desc')->get();
	}

	public static function mymessages()
	{
	  return Message::where('recipient_id', '=', Auth::user()->id)->order_by('created_at', 'desc')->get();
	}

	public static function unreadmessages()
	{
	  return Message::where('recipient_id', '=', Auth::user()->id)->where('unread', '=', '1')->order_by('created_at', 'desc')->get();
	}

	public static function topUsers() {
			$topusers = DB::query("SELECT
					U.id, U.name name, SUM(B.points) rank
				FROM
					users U, badges B, badge_user BU
				WHERE
					U.id = BU.user_id AND
					B.id = BU.badge_id
				GROUP BY
					U.name
				order by rank desc, U.lastlogin desc");
			return $topusers;
	}

	public function userTechnologies() {
			$user_technologies = DB::query(
				"SELECT 
					T.name name, count(T.name) points
				FROM 
					`technologies` T,
					`users` U,
					`technology_user` TU
				WHERE 
					T.id = TU.technology_id AND
					U.id = TU.user_id AND".
				" U.id=".$this->id.
				" GROUP BY T.name
				ORDER BY points desc");
			return $user_technologies;
	}

}