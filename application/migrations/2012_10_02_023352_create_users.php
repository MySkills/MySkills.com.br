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
			$table->string('social_url', 255);
			$table->string('video_url', 255);			
		    $table->string('image', 255);
			$table->integer('points');
//		    $table->integer('company_id')->unsigned();
//		    $table->foreign('company_id')->references('id')->on('companies');
//		    $table->integer('level_id')->unsigned();
//		    $table->foreign('level_id')->references('id')->on('companies');
		    $table->timestamps();
		    $table->boolean('active')->default(true);
			$table->integer('order');
		    $table->boolean('admin');
		});
		/*
		DB::table('users')->insert(array(
		    'username'  => 'eduardocruz',
		    'name'  => 'Eduardo Cruz',		    
		    'firstname'  => 'Eduardo',
		    'lastname'  => 'Cruz',		    
		    'email'  => 'eduardo@eduardocruz.com',		    		    
		    'password'  => Hash::make('penny411'),
		    'created_at' =>date('Y-m-d H:m:s'),
		    'updated_at' =>date('Y-m-d H:m:s'),
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