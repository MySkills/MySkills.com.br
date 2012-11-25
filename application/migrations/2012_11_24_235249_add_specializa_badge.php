<?php

class Add_Specializa_Badge {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		DB::table('issuers')->insert(array(
		    'name'  => 'Especializa',
		    'description'  => 'For all students who attended a course at Especializa. Especializa has courses related to web and mobile technology in Pernambuco, Brazil.',
		));

		DB::table('badges')->insert(array(
		    'name'  => 'Especializa',
		    'description'  => '+10 points!!! You attended a course at Especializa.com.br.
		    Therefore, your earned a new badge.',
		    'image'  => 'especializa-badge.png',
		    'points'  => '10',
			'issuer_id'  => '7',
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
		DB::table('badge_user')->where('badge_id', '=', 11)->delete();		
		DB::table('badges')->where('name', '=', 'Especializa')->delete();
		DB::table('issuers')->where('name', '=', 'Especializa')->delete();
	}

}