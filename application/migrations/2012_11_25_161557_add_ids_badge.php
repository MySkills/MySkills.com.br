<?php

class Add_Ids_Badge {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		DB::table('badges')->insert(array(
		    'name'  => 'IDS',
		    'description'  => '+10 points!!! You attended a course at IDS.com.br.
		    Therefore, your earned a new badge.',
		    'image'  => 'ids-badge.png',
		    'points'  => '10',
			'issuer_id'  => '6',
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
		DB::table('badges')->where('name', '=', 'IDS')->delete();
	}

}