<?php
class Link extends Eloquent
{
	public function users()
	{
	  return $this->has_many_and_belongs_to('User')->with('active');
	}
}