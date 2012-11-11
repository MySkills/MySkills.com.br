<?php
class Job extends Eloquent
{
	public function candidates()
	{
	  return $this->has_many_and_belongs_to('User');
	}
}