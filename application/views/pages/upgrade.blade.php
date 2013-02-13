@layout('templates.main')
@section('content')
<div id="subheader">
	<div class="inner">
		<div class="container">
			<h1>{{__('upgrade.professionalupgrade')}}</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->
<div id="subpage">	
	<div class="container">
		<div class="row">
			<div class="span7">
				<h3><span class="slash"></span> {{__('upgrade.welcome_msg')}}</h3>
					<ol class="faq-list">
						<li>
							<h4>O que é o MySkills.com.br?</h4>
							<p>Estamos criando uma comunidade incrível de desenvolvedores
							interessados em aprendizado e evolução contínua.</p>
							<p>E nos dias de hoje, aprendizado contínuo vem de várias
								formas tais como: Diplomas universitários, cursos presenciais,
								cursos online, treinamentos in-company, participação em projetos
								open-source, eventos, fórums, maratonas de programação e muito
								mais.</p>
							<p> Nesse cenário o MySkills.com.br surgiu para ajudar desenvolvedores 
								experientes a demonstrarem as suas habilidades de uma forma mais 
								dinâmica e compatível com a área de TI e ajudar os desenvolvedores
								menos experientes a identificarem quais as habilidades experts em
								tecnologia tem investido.</p>
						</li>
						<li>
							<h4>Qual a diferença do MySkills.com.br para o Linkedin?</h4>
							<p>Na sua essencia o Linkedin é uma rede social profissional sem distinção
								de área profissional. Na prática é um grande banco de currículos de todas
								as áreas.</p>
								<p>Nós estamos criando algo diferente, onde o foco principal é em
								fomentar e refletir a qualificação profissinal contínua e troca de experiências
								especificamente na área de desenvolvimento de software. Queremos responder
								muito facilmente a duas perguntas: Quem sabe o que? O que eu preciso para 
								tornar um profissional qualificado na tecnologia X?</p>
						</li>						
						<li>
							<h4>Qual a diferença do MySkills.com.br para o Stackoverflow?</h4>
							<p>O Stackoverflow é uma comunidade fantástica e referência na solução de
								problemas. Se você tem um problema em desenvolvimento, provavelmente
								você encontrará alguém disposto a lhe ajudar no Stackoverflow.</p>
							<p>O nosso foco aqui é diferente. Queremos ir além da resolução de problemas.
								Aqui nós focamos na descoberta de novas tecnologias, frameworks ou soluções
								que lhe ajudarão a desenvolver software de uma maneira mais adequada do que
								você desenvolve hoje.</p>
							<p>Como faremos isso? Em breve disponibilizaremos uma forma simples para que
								cada um compartilhe os melhores links, frameworks e boas práticas que conhece.
								Se você não consegue resolver algo, pode ir par ao Stackoverflow. Nós também 
								vamos. Agora se você quer ficar por dentro das novidades mais interessantes,
								fique de olho aqui também.</p>
						</li>						
						<li>
							<h4>Já estou satisfeito no meu trabalho.</h4>
							<p>Aqui oferecemos a possibilidade de recrutadores publicarem vagas que podem 
								ser de interesse dos desenvolvedores da comunidade. Mas na verdade o foco
								principal aqui é o crescimento contínuo. Independente do seu interesse em
								procurar um novo emprego. Os melhores profissionais não se acomodam, eles
								continuam evoluindo profissionalmente, independente da sua satisfação com 
								o seu emprego. E são esses profissionais que estamos reunindo aqui.</p>
						</li>
						<li>
							<h4>Por onde começo?</h4>
							<p>A área de Badges é onde você indica o que profissionalmente você já conquistou.
								Seja um diploma acadêmico, certificação profissional ou cursos que você fez.
								Ainde não tem experiência de mercado? Dê uma olhada na área de tutoriais. Lá
								você vai encontrar exemplos de badges relativos a cursos básicos online que 
								lhe ajudarão a conquistar os primeiros badges da sua jornada de qualificação
								profissional. Você pode começar com <strong>TRY GIT</strong> que apresenta os
								conceitos básicos de versionamento, que será útil com qualquer tecnologia 
								que você escolher utilizar.
								{{HTML::image('img/badges/trygit-badge.png')}} 
							</p>

					</ol>
			</div> <!-- /span10 -->
			<div class="span5">
				{{HTML::image('img/openbadges.jpg', __('upgrade.openbadges'))}}
			</div> <!-- /span2 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection