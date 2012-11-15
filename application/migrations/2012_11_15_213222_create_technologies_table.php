<?php

class Create_Technologies_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('technologies', function($table) {
		    $table->increments('id');
		    $table->string('name', 128);
		    $table->string('description', 255);
		    $table->string('image', 255);
		    $table->integer('points');
		    $table->timestamps();
		    $table->boolean('active')->default(true);
			$table->integer('order');
		});
		DB::table('technologies')->insert(array(
		    'name'  => 'Laravel',
		    'description'  => 'A Framework For Web Artisans.',
		    'image'  => 'laravel.png',
		    'points'  => '1',
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
		Schema::drop('technologies');		
	}

}