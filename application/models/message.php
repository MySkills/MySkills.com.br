<?php 
class Message extends Eloquent {

	public static function wallmessages($limit)
	{
	 return DB::query("SELECT 
		M.id id, M.text text, M.sender_id sender_id, M.created_at created_at, M.sender_id user_id, U.name user_name
	FROM 
		messages M,
		users U
	where 
		M.recipient_id is null and
		U.id = M.sender_id

	Union 
	(select BU.id, concat(' conquistou o badge ' , B.name),  1, BU.created_at, U.id, U.name
		from 
			badge_user BU,
			badges B,
			users U
		where 
			B.id = BU.badge_id and 
			U.id = BU.user_id)
	Union 
	(select TU.id, concat(' fez checkin em ', T.name) TU, 1, TU.created_at, U.id, U.name
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