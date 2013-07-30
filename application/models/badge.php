<?php
class Badge extends Eloquent
{

	public function users()
	{
	  return $this->has_many_and_belongs_to('User')->with('active');
	}

	public function issuer()
     {
		return $this->belongs_to('Issuer');
     }

	public function badgetype()
     {
		return $this->belongs_to('Badgetype');
     }

	public static function since() {
		return Badge::where('id', '>', 82)
				->order_by('id', 'desc')->get();
	}
}