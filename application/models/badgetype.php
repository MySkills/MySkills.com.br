<?php 
class Badgetype extends Eloquent {
	
	public function newbadges()
	{
	  return $this->has_many('Badge')->where('active', '=', 1)->order_by('id', 'desc')->get();
	}
	
	public static function topBadges($badgetype_id)
	{
  		return DB::query("SELECT 
							B.id id, B.name name, B.description description, B.image image, count(BU.badge_id) total
						FROM 
							badgetypes BT,
							badges B,
							users U,
							badge_user BU
						where
							BT.id = B.badgetype_id and
							B.id = BU.badge_id and
							U.id = BU.user_id and
							B.active = true and
							BT.id = ".$badgetype_id." group by BU.badge_id
						order by 
						count(BU.badge_id) desc");
	}


}