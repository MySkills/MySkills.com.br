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
		Schema::create('users', function($table) {
		    $table->increments('id');
		    $table->string('username', 128);
		    $table->string('name', 128);		    
		    $table->string('firstname', 128);
			$table->string('lastname', 128);
			$table->string('email', 128);			
		    $table->string('password', 64);
		    $table->timestamps();
		});
		DB::table('users')->insert(array(
		    'username'  => 'eduardocruz',
		    'name'  => 'Eduardo Cruz',		    
		    'firstname'  => 'Eduardo',
		    'lastname'  => 'Cruz',		    
		    'email'  => 'eduardo@eduardocruz.com',		    		    
		    'password'  => Hash::make('kitty411')
		));		
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('users');			
	}
}