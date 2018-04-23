<?php

class Create_Links_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('links', function($table) {
		    $table->increments('id');
		    $table->string('title', 255)->nullable();
			$table->string('url', 255);
			$table->string('description', 255)->nullable();
		    $table->timestamps();
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
		Schema::drop('links');		
	}

}