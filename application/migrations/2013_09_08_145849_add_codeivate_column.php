<?php

class Add_Codeivate_Column {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('users', function($table) {
			$table->string('codeivate_user')->nullable();
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
		Schema::table('users', function($table) {
			$table->drop_column('codeivate_user');
		});				
	}

}