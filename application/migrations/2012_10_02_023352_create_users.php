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
		    $table->string('uid', 16);		    
		    $table->string('provider', 32);
		    $table->string('name', 128);		    
		    $table->string('nickname', 32);
			$table->string('email', 64);			
		    $table->string('password', 128);
			$table->string('url', 255);
		    $table->string('image', 255);		    
		    $table->timestamps();
		});
		/*
		DB::table('users')->insert(array(
		    'username'  => 'eduardocruz',
		    'name'  => 'Eduardo Cruz',		    
		    'firstname'  => 'Eduardo',
		    'lastname'  => 'Cruz',		    
		    'email'  => 'eduardo@eduardocruz.com',		    		    
		    'password'  => Hash::make('penny411')
		));
		*/		
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