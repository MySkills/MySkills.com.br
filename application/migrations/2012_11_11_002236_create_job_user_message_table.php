<?php

class Create_Job_User_Message_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('job_user_message', function($table) {
		    $table->increments('id');
		    $table->text('message');		    
		    $table->integer('sender_id')->unsigned();
		    $table->foreign('sender_id')->references('id')->on('users');
		    $table->integer('recipient_id')->unsigned();
		    $table->foreign('recipient_id')->references('id')->on('users');
		    $table->integer('job_candidate_id')->unsigned();
		    $table->foreign('job_candidate_id')->references('id')->on('job_user');
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
		Schema::drop('job_user_message');
	}
}