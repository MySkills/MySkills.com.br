<?php

class Add_Badgetype_Badge_Column {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('badges', function($table) {
		    $table->integer('badgetype_id')->unsigned()->nullable();
		    $table->foreign('badgetype_id')->references('id')->on('badgetypes');
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
		Schema::table('user', function($table) {
			$table->drop_unique('lastlogin');
		});				
	}

}