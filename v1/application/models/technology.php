<?php
class Technology extends Eloquent
{
	public function users()
	{
	  return $this->has_many_and_belongs_to('User')->with('checkin_at');
	}

	public static function topFirstTechnology() {
			return DB::query("SELECT
				 distinct T.id id, T.name name, count(DISTINCT TU.user_id) total
			from 
				technologies T,
				technology_user TU,
				users U	
			where 
				T.id = TU.technology_id AND
				U.id = TU.user_id AND
				U.lastlogin > SUBDATE(NOW(), '29 day') 
			group by (T.name)
			order by count(DISTINCT TU.user_id) desc
			LIMIT 1");
	}

	public static function topTechnologies() {
			return DB::query("SELECT
				 distinct T.id id, T.name name, count(DISTINCT TU.user_id) total
			from 
				technologies T,
				technology_user TU,
				users U	
			where 
				T.id = TU.technology_id AND
				U.id = TU.user_id AND
				U.lastlogin > SUBDATE(NOW(), '29 day') 
			group by (T.name)
			order by count(DISTINCT TU.user_id) desc");
	}

}

