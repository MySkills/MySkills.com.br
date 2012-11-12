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
		    $table->boolean('male')->default(true);
		    $table->boolean('active')->default(true);
			$table->integer('order');
		    $table->boolean('admin');
		});
		
		DB::table('users')->insert(array('uid' => '124425381027624', 'provider' => 'facebook', 'name' => 'Myskills', 'email' => '', 'points' => 0, 'created_at' => '01/06/2012 00:00'));
		DB::table('users')->insert(array('uid' => '578648267', 'provider' => 'facebook', 'name' => 'Eduardo Cruz', 'email' => 'eduardo.cruz@rise.com.br', 'points' => 133, 'created_at' => '27/05/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100000564108124', 'provider' => 'facebook', 'name' => 'Ialisson', 'email' => 'ialisson7roque@gmail.com', 'points' => 0, 'created_at' => '27/06/2012 00:00'));
		DB::table('users')->insert(array('uid' => '669147613', 'provider' => 'facebook', 'name' => 'Marcilio', 'email' => 'marciliojrs@gmail.com', 'points' => 50, 'created_at' => '27/06/2012 00:00'));
		DB::table('users')->insert(array('uid' => '1377160328', 'provider' => 'facebook', 'name' => 'Lucas', 'email' => 'lucsobral@hotmail.com', 'points' => 0, 'created_at' => '28/06/2012 00:00'));
		DB::table('users')->insert(array('uid' => '1526059472', 'provider' => 'facebook', 'name' => 'Shyju', 'email' => 'shyju.o@gmail.com', 'points' => 100, 'created_at' => '28/06/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100000016083725', 'provider' => 'facebook', 'name' => 'Habner', 'email' => 'habnercarlos@gmail.com', 'points' => 100, 'created_at' => '29/06/2012 00:00'));
		DB::table('users')->insert(array('uid' => '504013167', 'provider' => 'facebook', 'name' => 'Victor', 'email' => 'victor0110@msn.com', 'points' => 0, 'created_at' => '29/06/2012 00:00'));
		DB::table('users')->insert(array('uid' => '697501770', 'provider' => 'facebook', 'name' => 'Ivo', 'email' => 'ivofrazao@gmail.com', 'points' => 0, 'created_at' => '29/06/2012 00:00'));
		DB::table('users')->insert(array('uid' => '781904315', 'provider' => 'facebook', 'name' => 'Rodrigo', 'email' => 'rodrigodma@gmail.com', 'points' => 0, 'created_at' => '29/06/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100002052874809', 'provider' => 'facebook', 'name' => 'Elton', 'email' => 'elton07@Msn.com', 'points' => 0, 'created_at' => '12/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100001924856581', 'provider' => 'facebook', 'name' => 'Nanci', 'email' => 'nancibonfim@gmail.com', 'points' => 0, 'created_at' => '12/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100001145556977', 'provider' => 'facebook', 'name' => 'Thiago', 'email' => 'thi4gobarreto@gmail.com', 'points' => 0, 'created_at' => '12/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100001815868594', 'provider' => 'facebook', 'name' => 'Rafael', 'email' => 'rcarvalho_r@hotmail.com', 'points' => 0, 'created_at' => '13/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100000990789221', 'provider' => 'facebook', 'name' => 'Thulio', 'email' => 'thuliolins@gmail.com', 'points' => 0, 'created_at' => '17/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '726009235', 'provider' => 'facebook', 'name' => 'Marinho', 'email' => 'marinho@marinhomoreira.com', 'points' => 10, 'created_at' => '17/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '1781396621', 'provider' => 'facebook', 'name' => 'Eliakim Ramos', 'email' => 'eliakim.ramos@hotmail.com', 'points' => 6, 'created_at' => '18/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100000115394540', 'provider' => 'facebook', 'name' => 'Toni', 'email' => 'toni@naips.com.br', 'points' => 0, 'created_at' => '19/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100000442345890', 'provider' => 'facebook', 'name' => 'Roberto', 'email' => 'ras.monteiro@gmail.com', 'points' => 0, 'created_at' => '21/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '1523380103', 'provider' => 'facebook', 'name' => 'Juliana', 'email' => 'juli.m.lima@gmail.com', 'points' => 50, 'created_at' => '21/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '1421175239', 'provider' => 'facebook', 'name' => 'Artur', 'email' => 'arturfelipet@gmail.com', 'points' => 0, 'created_at' => '24/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '1249832526', 'provider' => 'facebook', 'name' => 'Gustavo', 'email' => 'gustavohenrique.86@gmail.com', 'points' => 0, 'created_at' => '26/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '683261636', 'provider' => 'facebook', 'name' => 'Felipe', 'email' => 'cepriano@gmail.com', 'points' => 0, 'created_at' => '27/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100000833677558', 'provider' => 'facebook', 'name' => 'Leonardo', 'email' => 'leosbss@gmail.com', 'points' => 0, 'created_at' => '28/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '19215275', 'provider' => 'facebook', 'name' => 'Biziane', 'email' => 'vivascon@yahoo.com', 'points' => 0, 'created_at' => '30/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100000019107212', 'provider' => 'facebook', 'name' => 'Jackson', 'email' => 'jacksonfdam@gmail.com', 'points' => 0, 'created_at' => '30/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100002170595554', 'provider' => 'facebook', 'name' => 'Jackson', 'email' => 'jacksonraniel@ig.com.br', 'points' => 0, 'created_at' => '31/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100000211930182', 'provider' => 'facebook', 'name' => 'Henrique', 'email' => 'henriquemarrocos@hotmail.com', 'points' => 0, 'created_at' => '31/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100002673294223', 'provider' => 'facebook', 'name' => 'Pedro', 'email' => 'geniodanet@gmail.com', 'points' => 0, 'created_at' => '31/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100001348742889', 'provider' => 'facebook', 'name' => 'Tony', 'email' => 'tonyrodrigues@live.com', 'points' => 0, 'created_at' => '31/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100003223873378', 'provider' => 'facebook', 'name' => 'Arnaldo', 'email' => 'correia41@hotmail.com', 'points' => 0, 'created_at' => '31/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100001110962540', 'provider' => 'facebook', 'name' => 'Vitor', 'email' => 'vitorhenckel@vitorhenckel.com.br', 'points' => 1, 'created_at' => '31/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '787149547', 'provider' => 'facebook', 'name' => 'David', 'email' => 'email@fellipe.com', 'points' => 0, 'created_at' => '01/08/2012 00:00'));
		DB::table('users')->insert(array('uid' => '1353198852', 'provider' => 'facebook', 'name' => 'Robson', 'email' => 'robsonandre@gmail.com', 'points' => 0, 'created_at' => '01/08/2012 00:00'));
		DB::table('users')->insert(array('uid' => '1511420563', 'provider' => 'facebook', 'name' => 'Bruno', 'email' => 'brunodesouzaguiar@gmail.com', 'points' => 0, 'created_at' => '01/08/2012 00:00'));
		DB::table('users')->insert(array('uid' => '1709123653', 'provider' => 'facebook', 'name' => 'Danilo', 'email' => 'danilomonteiroo@gmail.com', 'points' => 0, 'created_at' => '01/08/2012 00:00'));
		DB::table('users')->insert(array('uid' => '1020435237', 'provider' => 'facebook', 'name' => 'Deyvison Rocha', 'email' => 'deyvison@gmail.com', 'points' => 1, 'created_at' => '02/08/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100003591298749', 'provider' => 'facebook', 'name' => 'Monique', 'email' => 'monique.avalon@gmail.com', 'points' => 5, 'created_at' => '02/08/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100001847403953', 'provider' => 'facebook', 'name' => 'Eduardo', 'email' => 'eduardoupe@gmail.com', 'points' => 0, 'created_at' => '02/08/2012 00:00'));
		DB::table('users')->insert(array('uid' => '1293323511', 'provider' => 'facebook', 'name' => 'Rafael', 'email' => 'jrafaelm@gmail.com', 'points' => 50, 'created_at' => '03/08/2012 00:00'));
		DB::table('users')->insert(array('uid' => '692634200', 'provider' => 'facebook', 'name' => 'Marcus', 'email' => 'marcuslira@gmail.com', 'points' => 1, 'created_at' => '03/08/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100000448539123', 'provider' => 'facebook', 'name' => 'Jaguaraci', 'email' => 'jaguaracisilva@gmail.com', 'points' => 0, 'created_at' => '04/08/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100000133204713', 'provider' => 'facebook', 'name' => 'Marcelo', 'email' => 'mlbreis@gmail.com', 'points' => 0, 'created_at' => '05/08/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100002419277240', 'provider' => 'facebook', 'name' => 'André', 'email' => 'andreoliveira.social@hotmail.com', 'points' => 0, 'created_at' => '08/08/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100000634528702', 'provider' => 'facebook', 'name' => 'Tiago Perrelli', 'email' => 'tiago.perrelli@gmail.com', 'points' => 56, 'created_at' => '08/08/2012 13:05'));
		DB::table('users')->insert(array('uid' => '1254383270', 'provider' => 'facebook', 'name' => 'André', 'email' => '0', 'points' => 0, 'created_at' => '08/08/2012 13:15'));
		DB::table('users')->insert(array('uid' => '1810455481', 'provider' => 'facebook', 'name' => 'Bruno', 'email' => 'brunojfleite@gmail.com', 'points' => 0, 'created_at' => '08/08/2012 13:17'));
		DB::table('users')->insert(array('uid' => '100000437492121', 'provider' => 'facebook', 'name' => 'Txai', 'email' => 'txai_m@hotmail.com', 'points' => 0, 'created_at' => '08/08/2012 19:04'));
		DB::table('users')->insert(array('uid' => '1318432081', 'provider' => 'facebook', 'name' => 'Fabio', 'email' => 'fabiofht@hotmail.com', 'points' => 1, 'created_at' => '09/08/2012 01:33'));
		DB::table('users')->insert(array('uid' => '717235393', 'provider' => 'facebook', 'name' => 'Luiz', 'email' => 'luizrestiffe@hotmail.com', 'points' => 0, 'created_at' => '09/08/2012 14:36'));
		DB::table('users')->insert(array('uid' => '100001141081532', 'provider' => 'facebook', 'name' => 'Danilo', 'email' => 'danilo@korber.com.br', 'points' => 0, 'created_at' => '09/08/2012 15:22'));
		DB::table('users')->insert(array('uid' => '100001487694268', 'provider' => 'facebook', 'name' => 'Bruno', 'email' => 'bruno_codato@hotmail.com', 'points' => 0, 'created_at' => '09/08/2012 15:22'));
		DB::table('users')->insert(array('uid' => '100001898294640', 'provider' => 'facebook', 'name' => 'Helder', 'email' => 'helder_neres@yahoo.com.br', 'points' => 0, 'created_at' => '09/08/2012 15:30'));
		DB::table('users')->insert(array('uid' => '686924620', 'provider' => 'facebook', 'name' => 'Rodrigo', 'email' => 'rodymagnavita@gmail.com', 'points' => 0, 'created_at' => '09/08/2012 15:48'));
		DB::table('users')->insert(array('uid' => '1081540095', 'provider' => 'facebook', 'name' => 'Weslley', 'email' => 'weslley.tec@gmail.com', 'points' => 0, 'created_at' => '09/08/2012 15:57'));
		DB::table('users')->insert(array('uid' => '1355037782', 'provider' => 'facebook', 'name' => 'Marcelo', 'email' => 'marcelo.mussel@gmail.com', 'points' => 0, 'created_at' => '09/08/2012 16:05'));
		DB::table('users')->insert(array('uid' => '100002974879783', 'provider' => 'facebook', 'name' => 'Rogério', 'email' => 'rvilelajunior@hotmail.com', 'points' => 0, 'created_at' => '09/08/2012 16:18'));
		DB::table('users')->insert(array('uid' => '100002903478674', 'provider' => 'facebook', 'name' => 'Thiago', 'email' => 'thiago_pco@hotmail.com', 'points' => 0, 'created_at' => '09/08/2012 16:25'));
		DB::table('users')->insert(array('uid' => '100000874362941', 'provider' => 'facebook', 'name' => 'Fernando', 'email' => 'nanndoj@gmail.com', 'points' => 0, 'created_at' => '09/08/2012 16:31'));
		DB::table('users')->insert(array('uid' => '1649731492', 'provider' => 'facebook', 'name' => 'Rodrigo', 'email' => 'rodrigommdantas@gmail.com', 'points' => 0, 'created_at' => '09/08/2012 16:33'));
		DB::table('users')->insert(array('uid' => '100001107314963', 'provider' => 'facebook', 'name' => 'Rosemberg', 'email' => 'rosemberg.al@gmail.com', 'points' => 0, 'created_at' => '09/08/2012 16:33'));
		DB::table('users')->insert(array('uid' => '100002430851504', 'provider' => 'facebook', 'name' => 'Alexsandro', 'email' => 'alexsandro.luiz@yahoo.com.br', 'points' => 0, 'created_at' => '09/08/2012 16:35'));
		DB::table('users')->insert(array('uid' => '614213975', 'provider' => 'facebook', 'name' => 'Marcos', 'email' => 'marcos.silva@gmail.com', 'points' => 0, 'created_at' => '09/08/2012 17:01'));
		DB::table('users')->insert(array('uid' => '656889896', 'provider' => 'facebook', 'name' => 'Edmar', 'email' => 'edmaroliveiraferreira@gmail.com', 'points' => 0, 'created_at' => '09/08/2012 17:21'));
		DB::table('users')->insert(array('uid' => '100000093544701', 'provider' => 'facebook', 'name' => 'Pierre', 'email' => 'facebook@pierrecangussu.com', 'points' => 0, 'created_at' => '09/08/2012 17:25'));
		DB::table('users')->insert(array('uid' => '100001952492155', 'provider' => 'facebook', 'name' => 'Rafael', 'email' => 'rdtorres@gmail.com', 'points' => 0, 'created_at' => '09/08/2012 14:38'));
		DB::table('users')->insert(array('uid' => '100003549647195', 'provider' => 'facebook', 'name' => 'Lucas', 'email' => 'lucasvscn@gmail.com', 'points' => 0, 'created_at' => '09/08/2012 14:49'));
		DB::table('users')->insert(array('uid' => '1442403911', 'provider' => 'facebook', 'name' => 'Douglas', 'email' => 'douglas0787@yahoo.com.br', 'points' => 0, 'created_at' => '09/08/2012 16:00'));
		DB::table('users')->insert(array('uid' => '100001138541752', 'provider' => 'facebook', 'name' => 'Daniel', 'email' => 'daniellsousa@yahoo.com.br', 'points' => 0, 'created_at' => '09/08/2012 16:37'));
		DB::table('users')->insert(array('uid' => '100000249713261', 'provider' => 'facebook', 'name' => 'Alberto Alpire', 'email' => 'albertoalpire@gmail.com', 'points' => 1, 'created_at' => '09/08/2012 21:03'));
		DB::table('users')->insert(array('uid' => '100004141355548', 'provider' => 'facebook', 'name' => 'Chronos', 'email' => 'contato@chronostecnologia.com', 'points' => 0, 'created_at' => '09/08/2012 21:09'));
		DB::table('users')->insert(array('uid' => '100000335451879', 'provider' => 'facebook', 'name' => 'Leonan', 'email' => 'leonan.teixeira@gmail.com', 'points' => 0, 'created_at' => '09/08/2012 23:26'));
		DB::table('users')->insert(array('uid' => '100000158916554', 'provider' => 'facebook', 'name' => 'Mark', 'email' => 'marquilaniosi@gmail.com', 'points' => 0, 'created_at' => '10/08/2012 03:20'));
		DB::table('users')->insert(array('uid' => '522641544', 'provider' => 'facebook', 'name' => 'Leandro', 'email' => 'leosj85@hotmail.com', 'points' => 0, 'created_at' => '10/08/2012 10:03'));
		DB::table('users')->insert(array('uid' => '100000228898134', 'provider' => 'facebook', 'name' => 'Ricardo', 'email' => 'lricardolisboa@hotmail.com', 'points' => 0, 'created_at' => '10/08/2012 12:31'));
		DB::table('users')->insert(array('uid' => '100000807230256', 'provider' => 'facebook', 'name' => 'Sidarta', 'email' => 'sidartalazzary@hotmail.com', 'points' => 0, 'created_at' => '10/08/2012 12:43'));
		DB::table('users')->insert(array('uid' => '100002383565309', 'provider' => 'facebook', 'name' => 'Junior', 'email' => 'jralves_10@hotmail.com', 'points' => 0, 'created_at' => '10/08/2012 12:55'));
		DB::table('users')->insert(array('uid' => '100001795309528', 'provider' => 'facebook', 'name' => 'Leandro ', 'email' => 'leocgpe@gmail.com', 'points' => 0, 'created_at' => '10/08/2012 14:39'));
		DB::table('users')->insert(array('uid' => '100002566145187', 'provider' => 'facebook', 'name' => 'Ilawanderson ', 'email' => 'ilawanderson@hotmail.com', 'points' => 0, 'created_at' => '10/08/2012 14:48'));
		DB::table('users')->insert(array('uid' => '694968947', 'provider' => 'facebook', 'name' => 'Germano ', 'email' => 'contato@germanobona.com', 'points' => 0, 'created_at' => '10/08/2012 14:50'));
		DB::table('users')->insert(array('uid' => '100001049632117', 'provider' => 'facebook', 'name' => 'Magno ', 'email' => 'magno89@gmail.com', 'points' => 10, 'created_at' => '10/08/2012 17:24'));
		DB::table('users')->insert(array('uid' => '100000202630360', 'provider' => 'facebook', 'name' => 'Marcel', 'email' => 'caraciol@gmail.com', 'points' => 0, 'created_at' => '10/08/2012 20:30'));
		DB::table('users')->insert(array('uid' => '100000363951011', 'provider' => 'facebook', 'name' => 'Herlan', 'email' => 'herlankf@bol.com.br', 'points' => 0, 'created_at' => '11/08/2012 00:53'));
		DB::table('users')->insert(array('uid' => '100000297824777', 'provider' => 'facebook', 'name' => 'Matheus', 'email' => 'mafahel@hotmail.com', 'points' => 0, 'created_at' => '13/08/2012 14:06'));
		DB::table('users')->insert(array('uid' => '100000879426230', 'provider' => 'facebook', 'name' => 'Victor', 'email' => 'vixtix@gmail.com', 'points' => 0, 'created_at' => '13/08/2012 20:55'));
		DB::table('users')->insert(array('uid' => '100001341398815', 'provider' => 'facebook', 'name' => 'Lucas Cavalcanti Melo', 'email' => 'lucas.cavalcanti.melo@gmail.com', 'points' => 0, 'created_at' => '28/06/2012 00:00'));
		DB::table('users')->insert(array('uid' => '523332480', 'provider' => 'facebook', 'name' => 'Childerico', 'email' => 'childerico@bvr.com.br', 'points' => 0, 'created_at' => '30/06/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100000922181454', 'provider' => 'facebook', 'name' => 'Renato Nascimento', 'email' => 'renato.nascimento@sereducacional.com', 'points' => 0, 'created_at' => '30/06/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100000825186493', 'provider' => 'facebook', 'name' => 'Heldith Oliveira', 'email' => 'heldith.oliveira@gmail.com', 'points' => 0, 'created_at' => '10/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100001251542506', 'provider' => 'facebook', 'name' => 'Danilo Kassio', 'email' => 'danilokassio@gmail.com', 'points' => 0, 'created_at' => '21/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100000671723122', 'provider' => 'facebook', 'name' => 'Marcelo Furtado', 'email' => 'marcelo_furtado@ymail.com', 'points' => 0, 'created_at' => '12/07/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100000684056456', 'provider' => 'facebook', 'name' => 'Ivan', 'email' => 'fale@ivansjr.com.br', 'points' => 10, 'created_at' => '14/08/2012 12:51'));
		DB::table('users')->insert(array('uid' => '100000027803134', 'provider' => 'facebook', 'name' => 'Filipe', 'email' => 'filipe.virginio.torres@gmail.com', 'points' => 0, 'created_at' => '14/08/2012 14:47'));
		DB::table('users')->insert(array('uid' => '100001111564370', 'provider' => 'facebook', 'name' => 'Pedro', 'email' => 'pepeu8@gmail.com', 'points' => 0, 'created_at' => '14/08/2012 16:31'));
		DB::table('users')->insert(array('uid' => '100003395929130', 'provider' => 'facebook', 'name' => 'Maurício', 'email' => 'mauriciocalligaris@gmail.com', 'points' => 0, 'created_at' => '08/08/2012 00:00'));
		DB::table('users')->insert(array('uid' => '1008930453', 'provider' => 'facebook', 'name' => 'Eduardo', 'email' => 'chagas.e@gmail.com', 'points' => 0, 'created_at' => '08/08/2012 00:00'));
		DB::table('users')->insert(array('uid' => '100000549423948', 'provider' => 'facebook', 'name' => 'Valdeir', 'email' => 'valdeir.junior.dg@hotmail.com', 'points' => 0, 'created_at' => '15/08/2012 14:23'));
		DB::table('users')->insert(array('uid' => '100000530236087', 'provider' => 'facebook', 'name' => 'Prieto', 'email' => 'ipenain@yahoo.es', 'points' => 0, 'created_at' => '16/08/2012 12:12'));
		DB::table('users')->insert(array('uid' => '695718894', 'provider' => 'facebook', 'name' => 'Suissa', 'email' => 'jnascimento@gmail.com', 'points' => 0, 'created_at' => '17/08/2012 14:02'));
		DB::table('users')->insert(array('uid' => '100002339387010', 'provider' => 'facebook', 'name' => 'Lucio', 'email' => 'luciogcabral@hotmail.com', 'points' => 0, 'created_at' => '17/08/2012 22:52'));
		DB::table('users')->insert(array('uid' => '799191357', 'provider' => 'facebook', 'name' => 'Paulo Henrique', 'email' => 'psantann@gmail.com', 'points' => 8, 'created_at' => '17/08/2012 23:19'));
		DB::table('users')->insert(array('uid' => '1710867345', 'provider' => 'facebook', 'name' => 'Djalma', 'email' => 'djalma.araujo@gmail.com', 'points' => 0, 'created_at' => '18/08/2012 00:14'));
		DB::table('users')->insert(array('uid' => '737465661', 'provider' => 'facebook', 'name' => 'Júlio', 'email' => 'juliovenancio@hotmail.com', 'points' => 0, 'created_at' => '21/08/2012 21:51'));
		DB::table('users')->insert(array('uid' => '100000124395153', 'provider' => 'facebook', 'name' => 'Renato', 'email' => 'contato@renatobalbino.com.br', 'points' => 0, 'created_at' => '22/08/2012 15:57'));
		DB::table('users')->insert(array('uid' => '100003232076744', 'provider' => 'facebook', 'name' => 'Afonso', 'email' => '0', 'points' => 0, 'created_at' => '22/08/2012 20:43'));
		DB::table('users')->insert(array('uid' => '100000500255231', 'provider' => 'facebook', 'name' => 'Felipe ', 'email' => 'felipefariax@gmail.com', 'points' => 0, 'created_at' => '23/08/2012 00:21'));
		DB::table('users')->insert(array('uid' => '100001594029463', 'provider' => 'facebook', 'name' => 'Marcus', 'email' => 'marcus.m.sa@gmail.com', 'points' => 0, 'created_at' => '23/08/2012 12:56'));
		DB::table('users')->insert(array('uid' => '100002807304273', 'provider' => 'facebook', 'name' => 'Antonio', 'email' => 'antoniomrneto@gmail.com', 'points' => 50, 'created_at' => '24/08/2012 17:31'));
		DB::table('users')->insert(array('uid' => '1463116885', 'provider' => 'facebook', 'name' => 'Carlos Roberto', 'email' => 'carlos.rberto@gmail.com', 'points' => 0, 'created_at' => '25/08/2012 20:17'));
		DB::table('users')->insert(array('uid' => '1033488224', 'provider' => 'facebook', 'name' => 'Marcela', 'email' => 'marcela.guerra@gmail.com', 'points' => 0, 'created_at' => '26/08/2012 10:50'));
		DB::table('users')->insert(array('uid' => '1823276901', 'provider' => 'facebook', 'name' => 'Ulisses', 'email' => 'julisses@gmail.com', 'points' => 0, 'created_at' => '26/08/2012 12:38'));
		DB::table('users')->insert(array('uid' => '100000422259092', 'provider' => 'facebook', 'name' => 'Anderson Mattjie', 'email' => 'mattjiedasilva@gmail.com', 'points' => 51, 'created_at' => '31/08/2012 11:26'));
		DB::table('users')->insert(array('uid' => '100001199139101', 'provider' => 'facebook', 'name' => 'Rei Medeiros', 'email' => 'reizinho_al@hotmail.com', 'points' => 50, 'created_at' => '31/08/2012 18:48'));
		DB::table('users')->insert(array('uid' => '1094319686', 'provider' => 'facebook', 'name' => 'Tiago Braga', 'email' => 'tiagobsbraga@gmail.com', 'points' => 0, 'created_at' => '04/09/2012 11:57'));
		DB::table('users')->insert(array('uid' => '100001916144314', 'provider' => 'facebook', 'name' => 'Anderson Mattjie', 'email' => 'anderson.asa89@gmail.com', 'points' => 0, 'created_at' => '04/09/2012 14:17'));
		DB::table('users')->insert(array('uid' => '100000196565170', 'provider' => 'facebook', 'name' => 'Gustavo Martusewicz', 'email' => 'gustavo_crj@hotmail.com', 'points' => 0, 'created_at' => '06/09/2012 10:47'));
		DB::table('users')->insert(array('uid' => '100001552399304', 'provider' => 'facebook', 'name' => 'Rodolfo De Nadai', 'email' => 'rdenadai@gmail.com', 'points' => 0, 'created_at' => '06/09/2012 10:55'));
		DB::table('users')->insert(array('uid' => '100001206856553', 'provider' => 'facebook', 'name' => 'Geovane Rocha', 'email' => 'contato@geovanerocha.com', 'points' => 0, 'created_at' => '06/09/2012 12:41'));
		DB::table('users')->insert(array('uid' => '801929499', 'provider' => 'facebook', 'name' => 'Lincoln Brito', 'email' => 'lincoln.sbrito@gmail.com', 'points' => 0, 'created_at' => '07/09/2012 17:40'));
		DB::table('users')->insert(array('uid' => '100000898729620', 'provider' => 'facebook', 'name' => 'Bruno Amabilini Hohl', 'email' => '0', 'points' => 0, 'created_at' => '10/09/2012 01:50'));
		DB::table('users')->insert(array('uid' => '1322762497', 'provider' => 'facebook', 'name' => 'Bruno Sette', 'email' => 'brunosette@gmail.com', 'points' => 0, 'created_at' => '11/09/2012 20:21'));
		DB::table('users')->insert(array('uid' => '100001331934405', 'provider' => 'facebook', 'name' => 'Lutiane Duarte', 'email' => 'lutiane.duarte@hotmail.com', 'points' => 0, 'created_at' => '12/09/2012 14:16'));
		DB::table('users')->insert(array('uid' => '840974920', 'provider' => 'facebook', 'name' => 'JoAn ?amí?ez', 'email' => 'joansito@gmail.com', 'points' => 0, 'created_at' => '17/09/2012 12:11'));
		DB::table('users')->insert(array('uid' => '100000604086761', 'provider' => 'facebook', 'name' => 'Biel De Melo Galvao', 'email' => 'biel_d_melo@hotmail.com', 'points' => 0, 'created_at' => '18/09/2012 19:13'));
		DB::table('users')->insert(array('uid' => '100001591914461', 'provider' => 'facebook', 'name' => 'Lucas Coutinho', 'email' => 'lucas.ponciano.tech@gmail.com', 'points' => 3, 'created_at' => '18/09/2012 19:34'));
		DB::table('users')->insert(array('uid' => '100002515804816', 'provider' => 'facebook', 'name' => 'Douglas Bahia', 'email' => 'bahia.douglas2@gmail.com', 'points' => 14, 'created_at' => '18/09/2012 19:50'));
		DB::table('users')->insert(array('uid' => '100002674226325', 'provider' => 'facebook', 'name' => 'Lucas Pitt', 'email' => 'lucaspitt@hotmail.com', 'points' => 0, 'created_at' => '18/09/2012 19:50'));
		DB::table('users')->insert(array('uid' => '100000419008998', 'provider' => 'facebook', 'name' => 'Jorge Aor', 'email' => 'jorgeventa@gmail.com', 'points' => 2, 'created_at' => '18/09/2012 20:05'));
		DB::table('users')->insert(array('uid' => '100000617155154', 'provider' => 'facebook', 'name' => 'Claudio Antonio', 'email' => 'diato841@gmail.com', 'points' => 10, 'created_at' => '18/09/2012 21:30'));
		DB::table('users')->insert(array('uid' => '100000142279145', 'provider' => 'facebook', 'name' => 'Sergio Kiyoshi Hirata Junior', 'email' => 'kiyoshisan@gmail.com', 'points' => 2, 'created_at' => '18/09/2012 21:38'));
		DB::table('users')->insert(array('uid' => '100000849064134', 'provider' => 'facebook', 'name' => 'Felipe Malafaia', 'email' => 'malafaiaalves@gmail.com', 'points' => 4, 'created_at' => '18/09/2012 21:39'));
		DB::table('users')->insert(array('uid' => '100000090438921', 'provider' => 'facebook', 'name' => 'Rafael Antonio', 'email' => 'rafaeldato_2012@hotmail.com', 'points' => 0, 'created_at' => '18/09/2012 23:39'));
		DB::table('users')->insert(array('uid' => '100004021300312', 'provider' => 'facebook', 'name' => 'Jennifer Goldmansen', 'email' => '0', 'points' => 2, 'created_at' => '18/09/2012 23:45'));
		DB::table('users')->insert(array('uid' => '100003944021709', 'provider' => 'facebook', 'name' => 'Daniel Isola', 'email' => 'disola.design@hotmail.com', 'points' => 1, 'created_at' => '19/09/2012 00:58'));
		DB::table('users')->insert(array('uid' => '100002415786288', 'provider' => 'facebook', 'name' => 'Lyvio Sandino', 'email' => '0', 'points' => 6, 'created_at' => '19/09/2012 01:19'));
		DB::table('users')->insert(array('uid' => '100000395029861', 'provider' => 'facebook', 'name' => 'Vandre Raia', 'email' => 'celiovandre@hotmail.com', 'points' => 1, 'created_at' => '19/09/2012 01:32'));
		DB::table('users')->insert(array('uid' => '100001726245086', 'provider' => 'facebook', 'name' => 'Rodrigo Lins', 'email' => 'rodrigolias99@hotmail.com', 'points' => 1, 'created_at' => '19/09/2012 01:37'));
		DB::table('users')->insert(array('uid' => '100002664671896', 'provider' => 'facebook', 'name' => 'Caio Alves de Oliveira', 'email' => 'caio18oliver@hotmail.com', 'points' => 2, 'created_at' => '19/09/2012 01:42'));
		DB::table('users')->insert(array('uid' => '100002423275097', 'provider' => 'facebook', 'name' => 'César Augusto', 'email' => 'cesinha-1806@hotmail.com', 'points' => 1, 'created_at' => '19/09/2012 01:59'));
		DB::table('users')->insert(array('uid' => '100002863551377', 'provider' => 'facebook', 'name' => 'Andyson Raphaell', 'email' => 'atc_msn@hotmail.com', 'points' => 1, 'created_at' => '19/09/2012 02:09'));
		DB::table('users')->insert(array('uid' => '100000094722318', 'provider' => 'facebook', 'name' => 'Swamy Sodré', 'email' => 'smy_.15@hotmail.com', 'points' => 2, 'created_at' => '19/09/2012 02:16'));
		DB::table('users')->insert(array('uid' => '1558718620', 'provider' => 'facebook', 'name' => 'Sergio Castro', 'email' => 'scastrousa@hotmail.com', 'points' => 1, 'created_at' => '19/09/2012 13:37'));
		DB::table('users')->insert(array('uid' => '1656447364', 'provider' => 'facebook', 'name' => 'Mitchell Dost', 'email' => 'dosney@gmail.com', 'points' => 1, 'created_at' => '19/09/2012 14:51'));
		DB::table('users')->insert(array('uid' => '747213460', 'provider' => 'facebook', 'name' => 'Edwin Lee', 'email' => 'e.lee@live.com.sg', 'points' => 1, 'created_at' => '19/09/2012 15:01'));
		DB::table('users')->insert(array('uid' => '1077690085', 'provider' => 'facebook', 'name' => 'Jeremy Thiesen', 'email' => 'jeremy.thiesen1@gmail.com', 'points' => 1, 'created_at' => '19/09/2012 21:18'));
		DB::table('users')->insert(array('uid' => '1211867857', 'provider' => 'facebook', 'name' => 'Marcio Saito', 'email' => 'marcio.saito@sbcglobal.net', 'points' => 2, 'created_at' => '19/09/2012 22:49'));
		DB::table('users')->insert(array('uid' => '679384204', 'provider' => 'facebook', 'name' => 'Joe Wandy', 'email' => 'joewandy@gmail.com', 'points' => 1, 'created_at' => '21/09/2012 13:34'));
		DB::table('users')->insert(array('uid' => '100000467881079', 'provider' => 'facebook', 'name' => 'Luiz Paulo Rodrigues Miranda', 'email' => '0', 'points' => 1, 'created_at' => '22/09/2012 13:41'));
		DB::table('users')->insert(array('uid' => '746613031', 'provider' => 'facebook', 'name' => 'Carmen Gamez Lara', 'email' => 'nherac@gmail.com', 'points' => 1, 'created_at' => '22/09/2012 13:44'));
		DB::table('users')->insert(array('uid' => '100000768683575', 'provider' => 'facebook', 'name' => 'Debmalya Jash', 'email' => 'debmalya.jash@gmail.com', 'points' => 1, 'created_at' => '22/09/2012 15:09'));
		DB::table('users')->insert(array('uid' => '1444217616', 'provider' => 'facebook', 'name' => 'Sangam Uprety', 'email' => 'sangam.uprety@gmail.com', 'points' => 1, 'created_at' => '24/09/2012 04:17'));
		DB::table('users')->insert(array('uid' => '1213911347', 'provider' => 'facebook', 'name' => 'Mie Nakae', 'email' => 'mienakae@hotmail.com', 'points' => 1, 'created_at' => '24/09/2012 20:12'));
		DB::table('users')->insert(array('uid' => '1473183637', 'provider' => 'facebook', 'name' => 'Henrique Braga Foresti', 'email' => 'hforesti@gmail.com', 'points' => 2, 'created_at' => '02/10/2012 18:52'));
		DB::table('users')->insert(array('uid' => '1146150310', 'provider' => 'facebook', 'name' => 'Alek Olszewski', 'email' => 'i7912666@bournemouth.ac.uk', 'points' => 1, 'created_at' => '10/10/2012 15:05'));
		DB::table('users')->insert(array('uid' => '100002328937969', 'provider' => 'facebook', 'name' => 'Caio Marques', 'email' => 'caco-gordo@hotmail.com', 'points' => 1, 'created_at' => '11/10/2012 01:17'));
		DB::table('users')->insert(array('uid' => '1748512960', 'provider' => 'facebook', 'name' => 'Ida Lindqvist', 'email' => 'idalindq@hotmail.com', 'points' => 1, 'created_at' => '11/10/2012 01:23'));
		DB::table('users')->insert(array('uid' => '1768407802', 'provider' => 'facebook', 'name' => 'Giordano Giuliano', 'email' => 'giordanogiuliano@gmail.com', 'points' => 1, 'created_at' => '11/10/2012 14:20'));
		DB::table('users')->insert(array('uid' => '100001583896163', 'provider' => 'facebook', 'name' => 'Hussani Oliveira', 'email' => 'tioblack07@gmail.com', 'points' => 1, 'created_at' => '11/10/2012 20:32'));

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