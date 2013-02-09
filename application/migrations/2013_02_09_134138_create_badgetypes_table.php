<?php

class Create_Badgetypes_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('badgetypes', function($table) {
		    $table->increments('id');
		    $table->string('name', 64);
		    $table->string('description', 255);
		    $table->integer('points');
		    $table->timestamps();
		    $table->boolean('active')->default(true);
			$table->integer('order');
		});		

		DB::table('badgetypes')->insert(array(
		    'name'  => 'System',
		    'description'  => 'System related badges.',
		    'points'  => '0',
		));

		DB::table('badgetypes')->insert(array(
		    'name'  => 'Certification',
		    'description'  => 'Technology and project management certifications.',
		    'points'  => '100',
		));

		DB::table('badgetypes')->insert(array(
		    'name'  => 'Courses',
		    'description'  => 'Technology related courses.',
		    'points'  => '50',
		));

		DB::table('badgetypes')->insert(array(
		    'name'  => 'Tutorials',
		    'description'  => 'Technology related courses.',
		    'points'  => '10',
		));

		DB::table('badgetypes')->insert(array(
		    'name'  => 'Events',
		    'description'  => 'Technology related courses.',
		    'points'  => '5',
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
		Schema::drop('badgetypes');
	}

}