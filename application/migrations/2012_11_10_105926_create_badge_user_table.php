<?php

class Create_Badge_User_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('badge_user', function($table) {
		    $table->increments('id');
		    $table->integer('user_id')->unsigned();
		    $table->foreign('user_id')->references('id')->on('users');
		    $table->integer('badge_id')->unsigned();
		    $table->foreign('badge_id')->references('id')->on('badges');
		    $table->timestamps();
		    $table->boolean('active')->default(false);
			$table->integer('order');
		});	

		DB::table('badge_user')->insert(array(
			'user_id' => 2, 
			'badge_id' => 2, 
			'active' => true,
		));		
		DB::table('badge_user')->insert(array(
			'user_id' => 2, 
			'badge_id' => 3, 
			'active' => true,			
		));		
		DB::table('badge_user')->insert(array(
			'user_id' => 2, 
			'badge_id' => 10,
			'active' => true,			 
		));		
		DB::table('badge_user')->insert(array(
			'user_id' => 7, //habner
			'badge_id' => 9, 
			'active' => true,
		));		
		DB::table('badge_user')->insert(array(
			'user_id' => 6, //shyju
			'badge_id' => 8, 
			'active' => true,			
		));		
		DB::table('badge_user')->insert(array(
			'user_id' => 45, //tiagoperrelli
			'badge_id' => 5, 
			'active' => true,			
		));				
		DB::table('badge_user')->insert(array(
			'user_id' => 40, //Rafael
			'badge_id' => 5, 
			'active' => true,			
		));				
		DB::table('badge_user')->insert(array(
			'user_id' => 20, //juliana Lima
			'badge_id' => 5, 
			'active' => true,			
		));				
		DB::table('badge_user')->insert(array(
			'user_id' => 4, //Marcilio
			'badge_id' => 5, 
			'active' => true,			
		));				
		DB::table('badge_user')->insert(array(
			'user_id' => 112, //Anderson Mattjie
			'badge_id' => 7, 
			'active' => true,			
		));				
		DB::table('badge_user')->insert(array(
			'user_id' => 108, //Anderson Mattjie
			'badge_id' => 7, 
			'active' => true,			
		));						
		DB::table('badge_user')->insert(array(
			'user_id' => 113, //Anderson Mattjie
			'badge_id' => 7, 
			'active' => true,			
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
		Schema::drop('badge_user');			
	}

}