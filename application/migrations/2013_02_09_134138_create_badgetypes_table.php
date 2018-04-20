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
			$table->integer('order')->nullable();
		});		

		DB::table('badgetypes')->insert(array(
		    'name'  => 'System',
		    'description'  => 'System related badges.',
		    'points'  => '0',
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s')

		));

		DB::table('badgetypes')->insert(array(
		    'name'  => 'Certification',
		    'description'  => 'Technology and project management certifications.',
		    'points'  => '100',
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('badgetypes')->insert(array(
		    'name'  => 'Courses',
		    'description'  => 'Technology related courses.',
		    'points'  => '50',
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('badgetypes')->insert(array(
		    'name'  => 'Tutorials',
		    'description'  => 'Technology related courses.',
		    'points'  => '10',
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('badgetypes')->insert(array(
		    'name'  => 'Events',
		    'description'  => 'Technology related courses.',
		    'points'  => '5',
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
		Schema::drop('badgetypes');
	}

}