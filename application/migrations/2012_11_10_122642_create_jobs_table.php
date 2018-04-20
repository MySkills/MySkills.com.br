<?php

class Create_Jobs_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('jobs', function($table) {
		    $table->increments('id');
		    $table->string('title', 140);		    
		    $table->text('description');
		    $table->integer('recruiter_id')->unsigned();
		    $table->foreign('recruiter_id')->references('id')->on('users');
		    $table->date('ends_at');		    
		    $table->timestamps();
		    $table->boolean('active')->default(false);
			$table->integer('order')->nullable();
		});
		/*
		DB::table('jobs')->insert(array(
			'title' => 'PHP Developer', 
			'description' => 'Master degree in computer science - 20 hours/week - R$ 2.500,00 (Recife - PE/Brasil)"', 
			'recruiter_id' => 2
		));						
		DB::table('jobs')->insert(array(
			'title' => 'Java Developer', 
			'description' => 'Análise e programação orientada a objetos e, manipulação de dados através de SQL, Ferramentas de gerência de configuração e controle de versão, ferramentas de apoio. Sistemas operacionais, ferramentas para programação e desenvolvimento: Linguagem  JAVA, JSP, Struts, EJB, Hibernate, Jasper, Crystal, Eclipse, IReports. Ferramentas de banco de dados: Oracle e SQL (Recife - PE/Brasil)', 
			'recruiter_id' => 2			
		));						
		
		DB::table('jobs')->insert(array(
			'title' => 'Desenvolvedor C#', 
			'description' => 'Análise e programação orientada a objetos e, manipulação de dados através de SQL, Ferramentas de gerência de configuração e controle de versão, ferramentas de apoio. Sistemas operacionais, ferramentas para programação e desenvolvimento: Team Foundation, C#.Net, SQL e SiverLight, ferramentas de banco de dados: PL SQL  e SQL Server (Recife - PE / Brasil)', 
			'recruiter_id' => 2			
		));						
		DB::table('jobs')->insert(array(
			'title' => 'PHP Developer', 
			'description' => '(São Paulo - SP/Brasil)', 
			'recruiter_id' => 2			
		));						
		DB::table('jobs')->insert(array(
			'title' => 'iOS Developer', 
			'description' => '(São Paulo - SP/Brasil)', 
			'recruiter_id' => 2			
		));						
		DB::table('jobs')->insert(array(
			'title' => 'Desenvolvedor C#', 
			'description' => 'Projeto de pesquisa e inovação com bolsa por período determinado no valor de R$ 2.400,00 e carga horária de 40h semanais em horário comercial. (Salvador -BA/Brasil)', 
			'recruiter_id' => 2			
		));								
		DB::table('jobs')->insert(array(
			'title' => 'Bolsista Gamification', 
			'description' => 'Estudante de Nível Superior na área de Games - Foco no estudo e definição de estratégias de Game Balance. Valor mensal R$ 360,00 - 20h/semana - Home Office (Recife PE/Brasil)', 
			'recruiter_id' => 2			
		));								
		DB::table('jobs')->insert(array(
			'title' => 'Remote Node.JS developer', 
			'description' => 'We need a Node.JS software developer to port a RESTFUL API system with a mySQL backend from PHP to node.js.  Build it for performance and scale using cluster and benchmark it appropriately to compare with the previous PHP app.  (Company in the United States)', 
			'recruiter_id' => 2			
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
		Schema::drop('jobs');				
	}

}