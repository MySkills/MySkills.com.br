<?php

class Add_Freelancer_Column {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('users', function($table) {
			$table->boolean('freelancer')->default(false)->nullable();
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
			$table->drop_column('freelancer');			
		});				
	}
}