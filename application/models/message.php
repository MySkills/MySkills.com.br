<?php 
class Message extends Eloquent {

	public static function wallmessages($limit)
	{
	 return DB::query("SELECT 
	 	M.id id, M.text text, M.sender_id sender_id, M.created_at created_at 
	FROM 
		messages M 
	where 
		M.recipient_id is null
	Union 
	(select BU.id, concat(U.name, ' conquistou o badge ' , B.name),  1, BU.created_at 
		from 
			badge_user BU,
			badges B,
			users U
		where 
			B.id = BU.badge_id and 
			U.id = BU.user_id)
	Union 
	(select TU.id, concat(U.name, ' fez checkin em ', T.name) TU, 1, TU.created_at 
	from 
		technology_user TU,
		users U,
		technologies T
	where
		T.id = TU.technology_id and
		U.id = TU.user_id)
	order by created_at desc LIMIT ".$limit);
	}	
}