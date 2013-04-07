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

	public function friends()
	{
	  return $this->has_many_and_belongs_to('Friend');
	}

	public function get_points()
	{
		$total = 0;
		foreach ($this->activebadges as $badge) {
			$total = $total + $badge->points;
		}

		return $total*$this->level;
	}

	public function technologies()
	{
	  return $this->has_many_and_belongs_to('Technology')->with('checkin_at');
	}

	public function get_level() {
		$checkins = count($this->technologies);
		if($checkins > 359) {
			return 7;
		}
		if($checkins > 259) {
			return 6;
		}
		if($checkins > 179) {
			return 5;
		}
		if($checkins > 119) {
			return 4;
		}
		if($checkins > 59) {
			return 3;
		}
		if($checkins > 19) {
			return 2;
		}
		if($checkins < 20) {
			return 1;
		}
	}

	public function checkins_since($date) {
		return $this
				->technologies()
				->where('checkin_at', '>', date( 'Y-m-d H:i:s', strtotime(str_replace('/', '-', $date))))
				->order_by('checkin_at', 'desc')->get();
	}

	public static function users_since($date) {
		return User::where('created_at', '>', date( 'Y-m-d H:i:s', strtotime(str_replace('/', '-', $date))))
				->order_by('created_at', 'desc')->get();
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

	public static function newUsersWeek() {
		return DB::query("SELECT
							count(*) total
							from oneauth_clients
							where 
							month(created_at) > 1 and 
							year(created_at) > 2013
							group by week(created_at)
							order by week(created_at) desc");
	}

	public static function topUsers() {
			$topusers = DB::query("SELECT
						U.id, U.name name, COALESCE(UL.level, 1) level, SUM(B.points)*COALESCE(UL.level,1) rank, SUM(B.points) points
				FROM
						users U
						right JOIN badge_user BU 	on 	U.id = BU.user_id
						left JOIN badges B 		on 	B.id = BU.badge_id
						left JOIN
							(
								SELECT
								   U.id user_id, U.name, ((count(U.name) > 19 ) + 1)+(count(U.name) > 59)+(count(U.name) > 119) level
								FROM
									technologies T,
									technology_user TU,
									users U
								where
									T.id = TU.technology_id AND
									U.id = TU.user_id AND
									U.lastlogin > SUBDATE(NOW(), '29 day')
								group by U.name
							) UL
							on BU.user_id = UL.user_id

				WHERE U.active = true
				AND U.lastlogin > SUBDATE(NOW(), '29 day')
				group by U.name
				order by level desc, points desc, rank desc, U.lastlogin desc");
			return $topusers;
	}

	public static function topUsersBy($badge_id) {
			$topusers = DB::query("SELECT
						U.id, U.name name, COALESCE(UL.level, 1) level, SUM(B.points)*COALESCE(UL.level,1) rank
				FROM
						users U
						right JOIN badge_user BU 	on 	U.id = BU.user_id
						left JOIN badges B 		on 	B.id = BU.badge_id
						left JOIN
							(
								SELECT
								   U.id user_id, U.name, ((count(U.name) > 19 ) + 1)+(count(U.name) > 59)+(count(U.name) > 119) level
								FROM
									technologies T,
									technology_user TU,
									users U
								where
									T.id = TU.technology_id AND
									U.id = TU.user_id AND 
									U.lastlogin > SUBDATE(NOW(), '29 day')									
								group by U.name
							) UL
							on BU.user_id = UL.user_id
				where B.id in (".$badge_id.")
				and U.lastlogin > SUBDATE(NOW(), '29 day')
				group by U.name
				order by rank desc, U.lastlogin desc");
			return $topusers;
	}

	public static function topUsersByTechnology($tech_id) {
			$topusers = DB::query("SELECT
				DISTINCT U.id id, U.name name , count(checkin_at) techpoints
			from 
				technology_user TU,
				users U
			where
				TU.technology_id = ". $tech_id ." AND
				TU.user_id = U.id AND
				U.lastlogin > SUBDATE(NOW(), '29 day')  AND
				U.active = true
			group by 
				user_id
			order by 
				techpoints desc");
						return $topusers;
	}

	public function get_checkins() {
			$user_technologies = DB::query(
				"SELECT 
					T.id id, T.name name, count(T.name) points, ((count(T.name) > 19 ) + 1)+(count(T.name) > 59)+(count(T.name) > 119) level
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

	public function get_life() {
		$now = date("Y-m-d 00:00:00");
     	$dbdate = strtotime($this->lastlogin);
     	$lastlogin = date("Y-m-d 00:00:00", $dbdate);
     	$diff = (30 - (strtotime($now) - strtotime($lastlogin)) /24 /60  /60);
     	if ( $diff > 0) {
     		return $diff;
		} else {
			return 0;
		}
	}

	public function getMyFriends() {
		$facebook = IoC::resolve('facebook-sdk');
		$access_token = DB::query(
			"SELECT 
				OC.access_token access_token
			FROM 
				`oneauth_clients` OC
			WHERE 
				OC.user_id = ". $this->id);
		//dd($access_token[0]);
		$facebook = $facebook->setAccessToken($access_token);
		$ret = $facebook->api( array(
                         'method' => 'fql.query',
                         'query' => 'SELECT
										    uid
										FROM
										    user
										WHERE
										    is_app_user
										    AND
										    uid IN (SELECT uid2 FROM friend WHERE uid1 = me())'));
		return $ret;
	}

}