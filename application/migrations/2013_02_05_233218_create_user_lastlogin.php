<?php

class Create_User_Lastlogin {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('users', function($table) {
			$table->timestamp('lastlogin');
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