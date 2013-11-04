<?php
class User extends Eloquent
{
	function setUserData(&$user_data) {
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
      			$this->image = $github->avatar_url.'&s=200';
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

	public function links()
	{
	  return $this->has_many_and_belongs_to('Link')->order_by('created_at', 'desc');
	}

	public function projects()
	{
	  return $this->has_many_and_belongs_to('Project');
	}

	public function activebadges() {
		return $this->has_many_and_belongs_to('Badge')->where('badge_user.active','=',true)->order_by('points', 'desc')->order_by('id', 'desc');
	}

	public function partial_badges($max) {
		return $this->has_many_and_belongs_to('Badge')->where('badge_user.active','=',true)->order_by('points', 'desc')->order_by('id', 'desc')->take($max)->get();
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
		return $total*$this->limitedUser()->limitedlevel;
	}

	public function technologies()
	{
	  return $this->has_many_and_belongs_to('Technology')->with('checkin_at');
	}

	public function get_level() {
		$checkins = count($this->technologies);
		if($checkins > 1139) {
			return 6;
		}
		if($checkins > 519) {
			return 5;
		}
		if($checkins > 219) {
			return 4;
		}
		if($checkins > 79) {
			return 3;
		}
		if($checkins > 19) {
			return 2;
		}
		if($checkins < 20) {
			return 1;
		}
	}

	public function levellimit($level) {
		return (20*(pow(2, $level)-1))-(20*(pow(2, $level-1)-1));
	}

	public function pglevel($level) {
		$retorno = 20*(pow(2, $level)-1);
		if($retorno > 0) {
			return $retorno;
		} else {
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

	public function privatemessages()
	{
	  /*return Message::where('recipient_id', '=', Auth::user()->id)
	  	->where_not_null('recipient_id')
	  	->or_where('sender_id', '=', Auth::user()->id)
	  	->order_by('created_at', 'desc')->get();*/

	 return DB::query("SELECT *
							from messages
							where 
							recipient_id = ". Auth::user()->id ."
							order by created_at desc");


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

	public function limitedUser() {
		$limitedUser = DB::query("SELECT 
	((SUM(Q.checkins) > 19 ) +1) +(SUM(Q.checkins) > 79) + (SUM(Q.checkins) > 219) level,
	IF(((SUM(Q.checkins) > 19 ) +1) +(SUM(Q.checkins) > 79) + (SUM(Q.checkins) > 219) - 1 <= Q.maxtechnologylevel, ((SUM(Q.checkins) > 19 ) +1) +(SUM(Q.checkins) > 79) + (SUM(Q.checkins) > 219), Q.maxtechnologylevel+1 ) limitedlevel
FROM 
(SELECT
	U.id user_id, 
	U.name, 
	((count(U.name) > 19 ) + 1)+(count(U.name) > 79)+(count(U.name) > 219)+(count(U.name) > 519)+(count(U.name) > 1139) maxtechnologylevel, 
	count(TU.technology_id) checkins,
	(count(TU.technology_id) > 19) + (count(TU.technology_id) > 79) + (count(TU.technology_id) > 219) soma
				FROM
					technologies T,
					technology_user TU,
					users U
				where
					T.id = TU.technology_id AND
					U.id = TU.user_id AND
					U.lastlogin > SUBDATE(NOW(), '29 day') AND 
					U.id = ". $this->id ." group by U.name, TU.technology_id
				order by checkins desc) Q");
		return $limitedUser[0];
	}

	public static function topUsers() {
		$topusers = DB::query("SELECT
					U.id, U.name name, COALESCE(UL.level, 1) lockedlevel, COALESCE(UL.limitedlevel, 1) level, SUM(B.points)*COALESCE(UL.limitedlevel,1) rank, SUM(B.points) points
			FROM
					users U
					right JOIN badge_user BU 	on 	U.id = BU.user_id
					left JOIN badges B 		on 	B.id = BU.badge_id
					left JOIN
						(
			SELECT 
				Q.user_id, 
				Q.name, 
				((SUM(Q.checkins) > 19 ) +1) +(SUM(Q.checkins) > 59) + (SUM(Q.checkins) > 149) level,
				IF(((SUM(Q.checkins) > 19 ) +1) +(SUM(Q.checkins) > 59) + (SUM(Q.checkins) > 149) - 1 <= Q.maxtechnologylevel, ((SUM(Q.checkins) > 19 ) +1) +(SUM(Q.checkins) > 59) + (SUM(Q.checkins) > 149), Q.maxtechnologylevel+1 ) limitedlevel
			FROM 
			(SELECT
				U.id user_id, 
				U.name, 
				((count(U.name) > 19 ) + 1)+(count(U.name) > 59)+(count(U.name) > 149)+(count(U.name) > 469)+(count(U.name) > 1109)+(count(U.name) > 1749) maxtechnologylevel, 
				count(TU.technology_id) checkins,
				(count(TU.technology_id) > 19) + (count(TU.technology_id) > 59) + (count(TU.technology_id) > 149) soma
							FROM
								technologies T,
								technology_user TU,
								users U
							where
								T.id = TU.technology_id AND
								U.id = TU.user_id AND
								U.lastlogin > SUBDATE(NOW(), '7 day')
							group by U.name, TU.technology_id
							order by U.name, checkins desc) Q
			group by Q.name) UL
						on BU.user_id = UL.user_id
			WHERE U.active = true
			AND U.lastlogin > SUBDATE(NOW(), '7 day')
			group by U.name
			order by level desc, rank desc, U.lastlogin desc");
		return $topusers;
	}

	public static function topUsersBy($badge_id) {
		$topusers = DB::query("SELECT
					U.id, U.name name, COALESCE(UL.level, 1) lockedlevel, COALESCE(UL.limitedlevel, 1) level, SUM(B.points)*COALESCE(UL.limitedlevel,1) rank, SUM(B.points) points
			FROM
					users U
					right JOIN badge_user BU 	on 	U.id = BU.user_id
					left JOIN badges B 		on 	B.id = BU.badge_id
					left JOIN
						(
			SELECT 
				Q.user_id, 
				Q.name, 
				((SUM(Q.checkins) > 19 ) +1) +(SUM(Q.checkins) > 59) + (SUM(Q.checkins) > 149) level,
				IF(((SUM(Q.checkins) > 19 ) +1) +(SUM(Q.checkins) > 59) + (SUM(Q.checkins) > 149) - 1 <= Q.maxtechnologylevel, ((SUM(Q.checkins) > 19 ) +1) +(SUM(Q.checkins) > 59) + (SUM(Q.checkins) > 149), Q.maxtechnologylevel+1 ) limitedlevel
			FROM 
			(SELECT
				U.id user_id, 
				U.name, 
				((count(U.name) > 19 ) + 1)+(count(U.name) > 59)+(count(U.name) > 149)+(count(U.name) > 469)+(count(U.name) > 1109)+(count(U.name) > 1749) maxtechnologylevel, 
				count(TU.technology_id) checkins,
				(count(TU.technology_id) > 19) + (count(TU.technology_id) > 59) + (count(TU.technology_id) > 149) soma
							FROM
								technologies T,
								technology_user TU,
								users U
							where
								T.id = TU.technology_id AND
								U.id = TU.user_id AND
								U.lastlogin > SUBDATE(NOW(), '7 day')
							group by U.name, TU.technology_id
							order by U.name, checkins desc) Q
			group by Q.name) UL
						on BU.user_id = UL.user_id
			WHERE U.active = true
			AND U.lastlogin > SUBDATE(NOW(), '7 day')
			AND BU.badge_id = ".$badge_id." 
			AND B.id = ".$badge_id." 
			group by U.name
			order by lockedlevel desc, rank desc, U.lastlogin desc");
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
					T.id id, T.name name, count(T.name) points, ((count(T.name) > 19 ) + 1)+(count(T.name) > 79)+(count(T.name) > 219)+(count(T.name) > 519)+(count(T.name) > 1139) level
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
		$diff = (7 - (strtotime($now) - strtotime($lastlogin)) /24 /60  /60);
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

	public function logLastAccess() {
		if($this->id == Auth::user()->id) {
			$this->lastlogin = date('Y-m-d H:i:s');
			$this->save();		
		}
	}
}