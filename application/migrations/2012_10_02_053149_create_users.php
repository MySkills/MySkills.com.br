<?php

class Create_Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('users', function($table) {
		    $table->integer('social_uid');
		    $table->string('social_provider', 20);
		    $table->string('name', 150);		    
		    $table->string('nickname', 20);		    		    
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
		    $table->drop_column('social_uid');
		    $table->drop_column('social_provider');
		    $table->drop_column('name');
		    $table->drop_column('nickname');
		});			
	}

}