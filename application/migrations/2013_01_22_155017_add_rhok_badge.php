<?php

class Add_Rhok_Badge {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		DB::table('badges')->insert(array(
		    'name'  => 'RHOK2012',
		    'description'  => 'You attended RHOK2012. http://www.rhok.org',
		    'image'  => 'rhok2012.png',
		    'points'  => '0',
			'issuer_id'  => '1',
		));			
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		DB::table('badges')->where('name', '=', 'RHOK2012')->delete();
	}

}