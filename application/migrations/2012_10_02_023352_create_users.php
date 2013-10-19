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
		    $table->string('nickname', 32)->nullable();
			$table->string('email', 64);			
		    $table->string('password', 128);
			$table->string('social_url', 255)->nullable();
			$table->string('video_url', 255)->nullable();
			$table->string('bio', 255)->nullable();
		    $table->string('image', 255)->nullable();
			$table->integer('points')->nullable();
		    $table->timestamps();
		    $table->boolean('male')->default(true);
		    $table->boolean('active')->default(true);
			$table->integer('order')->nullable();
		    $table->boolean('admin')->nullable();
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
		Schema::drop('users');			
	}
}