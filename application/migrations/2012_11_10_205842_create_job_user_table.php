<?php

class Create_Job_User_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('job_user', function($table) {
		    $table->increments('id');
		    $table->integer('user_id')->unsigned();
		    $table->foreign('user_id')->references('id')->on('users');
		    $table->integer('job_id')->unsigned();
		    $table->foreign('job_id')->references('id')->on('jobs');
			$table->unique(array('user_id', 'job_id'));
		    $table->text('message');		    
		    $table->timestamps();
		});	

		/*
		DB::table('job_user')->insert(array(
			'user_id' => 11, 
			'job_id' => 1, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 12, 
			'job_id' => 1, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 19, 
			'job_id' => 1, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 21, 
			'job_id' => 1, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 37, 
			'job_id' => 1, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 38, 
			'job_id' => 1, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 39, 
			'job_id' => 1, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 44, 
			'job_id' => 1, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 45, 
			'job_id' => 1, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 49, 
			'job_id' => 1, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 50, 
			'job_id' => 1, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 61, 
			'job_id' => 1, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 67, 
			'job_id' => 1, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 98, 
			'job_id' => 1, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 49, 
			'job_id' => 2, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 52, 
			'job_id' => 2, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 73, 
			'job_id' => 2, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 83, 
			'job_id' => 2, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 101, 
			'job_id' => 2, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 11, 
			'job_id' => 3, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 60, 
			'job_id' => 3, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 98, 
			'job_id' => 3, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 17, 
			'job_id' => 4, 
		));				
		DB::table('job_user')->insert(array(
			'user_id' => 19, 
			'job_id' => 4, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 23, 
			'job_id' => 4, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 32, 
			'job_id' => 4, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 50, 
			'job_id' => 4, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 55, 
			'job_id' => 4, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 68, 
			'job_id' => 4, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 108, 
			'job_id' => 4, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 146, 
			'job_id' => 4, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 19, 
			'job_id' => 5, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 43, 
			'job_id' => 5, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 114, 
			'job_id' => 5, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 11, 
			'job_id' => 6, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 30, 
			'job_id' => 6, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 31, 
			'job_id' => 6, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 52, 
			'job_id' => 6, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 70, 
			'job_id' => 6, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 83, 
			'job_id' => 6, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 108, 
			'job_id' => 6, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 2, 
			'job_id' => 7, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 112, 
			'job_id' => 7, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 124, 
			'job_id' => 7, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 125, 
			'job_id' => 7, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 126, 
			'job_id' => 7, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 128, 
			'job_id' => 7, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 129, 
			'job_id' => 7, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 130, 
			'job_id' => 7, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 131, 
			'job_id' => 7, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 132, 
			'job_id' => 7, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 134, 
			'job_id' => 7, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 135, 
			'job_id' => 7, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 136, 
			'job_id' => 7, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 137, 
			'job_id' => 7, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 138, 
			'job_id' => 7, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 139, 
			'job_id' => 7, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 140, 
			'job_id' => 7, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 141, 
			'job_id' => 7, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 155, 
			'job_id' => 7, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 2, 
			'job_id' => 8, 
		));
		DB::table('job_user')->insert(array(
			'user_id' => 99, 
			'job_id' => 8, 
		));
		*/
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('job_user');				
	}

}