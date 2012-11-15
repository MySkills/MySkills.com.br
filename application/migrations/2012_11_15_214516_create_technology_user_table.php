<?php

class Create_Technology_User_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('technology_user', function($table) {
		    $table->increments('id');
		    $table->integer('user_id')->unsigned();
		    $table->foreign('user_id')->references('id')->on('users');
		    $table->integer('technology_id')->unsigned();
		    $table->foreign('technology_id')->references('id')->on('technologies');
		    $table->timestamps();		    
		    $table->date('checkin_at');
			$table->unique(array('checkin_at', 'technology_id', 'user_id'));
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
		Schema::drop('technology_user');
	}

}