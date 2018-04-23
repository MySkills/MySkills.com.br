<?php

class Add_Job_Profile {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('jobs', function($table) {
		    $table->string('company', 40)->nullable();
		   	$table->string('benefits', 140)->nullable();
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
		Schema::table('jobs', function($table) {
			$table->drop_column('company');
			$table->drop_column('benefits');			
		});				
	}		
}
