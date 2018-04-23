<?php
class Link extends Eloquent
{
	public function users()
	{
	  return $this->has_many_and_belongs_to('User')->with('active');
	}


	public static function since($date) {
		return Link::where('created_at', '>', date( 'Y-m-d H:i:s', strtotime(str_replace('/', '-', $date))))
				->order_by('created_at', 'asc')->get();
	}
}