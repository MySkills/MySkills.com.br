<?php

class Create_Friend_User_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('friend_user', function($table) {
		    $table->increments('id');
		    $table->integer('friend_id')->unsigned();
		    $table->foreign('friend_id')->references('id')->on('users');
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
		Schema::drop('friend_user');				
	}

}