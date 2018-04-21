<?php

class Create_Follower_User_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('follower_user', function($table) {
		    $table->increments('id');
		    $table->integer('follower_id')->unsigned();
		    $table->foreign('follower_id')->references('id')->on('users');
		    $table->integer('user_id')->unsigned();
		    $table->foreign('user_id')->references('id')->on('users');
		    $table->timestamps();
		});			
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('follower_user');		
	}

}