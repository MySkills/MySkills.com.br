<?php

class Create_Link_User_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('link_user', function($table) {
		    $table->increments('id');
		    $table->integer('link_id')->unsigned();
		    $table->foreign('link_id')->references('id')->on('links');
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
		Schema::drop('link_user');		
	}

}