<?php
class Badge extends Eloquent
{

	public function issuer()
     {
		return $this->belongs_to('Issuer');
     }
}