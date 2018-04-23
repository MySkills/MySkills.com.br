<?php

class Create_Messages_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('messages', function($table) {
		    $table->increments('id');
		    $table->string('text');
		    $table->integer('sender_id')->unsigned();
		    $table->foreign('sender_id')->references('id')->on('users');
		    $table->integer('recipient_id')->unsigned();
		    $table->foreign('recipient_id')->references('id')->on('users');
		    $table->timestamps();
		    $table->boolean('unread')->default(true);		    
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
		Schema::drop('messages');		
	}

}