<?php

class Create_Issuers_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('issuers', function($table) {
		    $table->increments('id');
		    $table->string('name', 64);
		    $table->string('description', 255);
		    $table->string('image', 255)->nullable();
		    $table->timestamps();
		    $table->boolean('active')->default(true);
			$table->integer('order')->nullable();
		});

		DB::table('issuers')->insert(array(
		    'name'  => 'MySkills.com.br',		    
		    'description'  => 'The software developer community',
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('issuers')->insert(array(
		    'name'  => 'PyCursos',
		    'description'  => 'PyCursos is specialized in online Python trainning',
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('issuers')->insert(array(
		    'name'  => 'Zend',
		    'description'  => 'Zend is the leading provider of software and services 
		    for developing, deploying and managing business-critical applications in PHP.',
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('issuers')->insert(array(
		    'name'  => 'Oracle',
		    'description'  => 'Oracle engineers hardware and software to work together 
		    in the cloud and in your data center.',
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('issuers')->insert(array(
		    'name'  => 'Code School',
		    'description'  => 'Code School teaches web technologies in the comfort of 
		    your browser with video lessons, coding challenges, and screencasts.',
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('issuers')->insert(array(
		    'name'  => 'IDS',
		    'description'  => 'The most complete Apple reference in Brazil.',
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s')
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
		Schema::drop('issuers');			
	}

}