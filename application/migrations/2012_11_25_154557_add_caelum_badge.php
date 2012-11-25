<?php

class Add_Caelum_Badge {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		DB::table('issuers')->insert(array(
		    'name'  => 'Caelum',
		    'description'  => 'For all students who attended a course at Caelum. Caelum has courses related to web and mobile technology in São Paulo, Rio de Janeiro and Brasília, Brazil.',
		));

		DB::table('badges')->insert(array(
		    'name'  => 'Caelum',
		    'description'  => '+10 points!!! You attended a course at Caelum.com.br.
		    Therefore, your earned a new badge.',
		    'image'  => 'caelum-badge.png',
		    'points'  => '10',
			'issuer_id'  => '8',
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
		DB::table('badge_user')->where('badge_id', '=', 12)->delete();		
		DB::table('badges')->where('name', '=', 'Caelum')->delete();
		DB::table('issuers')->where('name', '=', 'Caelum')->delete();		
	}

}