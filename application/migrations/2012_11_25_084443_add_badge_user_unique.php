<?php

class Add_Badge_User_Unique {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('badge_user', function($table) {
			$table->unique(array('badge_id', 'user_id'));
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
		Schema::table('badge_user', function($table) {
			$table->drop_foreign('badge_user_badge_id_foreign');			
			$table->drop_foreign('badge_user_user_id_foreign');
			$table->drop_unique('badge_user_badge_id_user_id_unique');
		});				
	}

}