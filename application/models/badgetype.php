<?php 
class Badgetype extends Eloquent {
	
	public function newbadges()
	{
	  return $this->has_many('Badge')->where('active', '=', 1)->order_by('id', 'desc')->get();
	}
	


}