<?php

class Create_Badges_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('badges', function($table) {
		    $table->increments('id');
		    $table->string('name', 64);
		    $table->string('description', 255);
		    $table->string('image', 255);
		    $table->integer('points');
		    $table->integer('issuer_id')->unsigned();
		    $table->foreign('issuer_id')->references('id')->on('issuers');
		    $table->timestamps();
		    $table->boolean('active')->default(true);
			$table->integer('order')->nullable();
		});
		DB::table('badges')->insert(array(
		    'name'  => 'Locked',
		    'description'  => 'The locked badge image is used as a placeholder for users without badges.',
		    'image'  => 'unlock100.png',
		    'points'  => '0',
			'issuer_id'  => '1',
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('badges')->insert(array(
		    'name'  => 'Try GiT',
		    'description'  => '+5 points!!! Be introduced to the basic concepts 
		    	of Git version control.',
		    'image'  => 'trygit-badge.png',
		    'points'  => '5',
			'issuer_id'  => '5',
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s')
		));		

		DB::table('badges')->insert(array(
		    'name'  => 'Try Ruby',
		    'description'  => '+5 points!!! Learn the basic building blocks of 
		    	Ruby, all in the browser.',
		    'image'  => 'tryruby-badge.png',
		    'points'  => '5',
			'issuer_id'  => '5',
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s')
		));		


		DB::table('badges')->insert(array(
		    'name'  => 'Try iOS',
		    'description'  => '+5 points!!! Learn how to build iPhone apps by 
		    	watching videos and coding in your browser. No downloads needed.',
		    'image'  => 'tryios-badge.png',
		    'points'  => '5',
			'issuer_id'  => '5',
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s')
		));		

		DB::table('badges')->insert(array(
		    'name'  => 'iOS',
		    'description'  => '+50 points!!! Learn iPad, iPhone and iPod Touch
		    	developemt.',
		    'image'  => 'iOSBadge100.png',
		    'points'  => '50',
			'issuer_id'  => '6',
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s')
		));		

		DB::table('badges')->insert(array(
		    'name'  => 'Python',
		    'description'  => '+50 points!!! This badge is for all students 
		    	who attended a Python online trainning at PyCursos. Unlock 
		    	this badge and join other Python developers',
		    'image'  => 'pycursos-djangobadge.png',
		    'points'  => '50',
			'issuer_id'  => '2',
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('badges')->insert(array(
		    'name'  => 'Django',
		    'description'  => '+50 points!!! This badge is for all students 
		    	who attended a Django online trainning at PyCursos. Unlock 
		    	this badge and join other Python developers',
		    'image'  => 'pycursos-djangobadge.png',
		    'points'  => '50',
			'issuer_id'  => '2',
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('badges')->insert(array(
		    'name'  => 'PHP 5.3',
		    'description'  => '+100 points!!! Are you a PHP Certified Engineer 
		    	version 5.3? Unlock this badge, receive 100 points and join 
		    	other PHP developers',
		    'image'  => 'php53-badge.png',
		    'points'  => '100',
			'issuer_id'  => '3',
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s')
		));		

		DB::table('badges')->insert(array(
		    'name'  => 'PHP 5',
		    'description'  => '+100 points!!! Are you a PHP Certified Engineer 
		    	version 5? Unlock this badge, receive 100 points and join other 
		    	PHP developers',
		    'image'  => 'php5-badge.png',
		    'points'  => '100',
			'issuer_id'  => '3',
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('badges')->insert(array(
		    'name'  => 'Java',
		    'description'  => '+100 points!!! Are you a Java Certified Developer? 
		    	Unlock this badge, receive 100 points and join other 
		    	Java developers',
		    'image'  => 'java-badge.png',
		    'points'  => '100',
			'issuer_id'  => '4',
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s')
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
		Schema::drop('badges');
	}

}