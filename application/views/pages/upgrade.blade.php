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
				@if ( Auth::guest() )
					{{HTML::link('connect/session/facebook', __('home.sign-up').' (Facebook)', array('class' => 'btn btn-small btn-warning'))}}
					{{HTML::link('connect/session/github', '&nbsp;'. __('home.sign-up').' (Github) &nbsp;&nbsp;', array('class' => 'btn btn-small btn-warning'))}}
					{{HTML::link('connect/session/linkedin', __('home.sign-up').' (Linkedin)', array('class' => 'btn btn-small btn-warning'))}}
				@endif
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
								profissional.</p>

								{{HTML::image('img/badges/01 - highschool-male.png', 'Undergrad',array('align'=>'left'))}} 
								<p><strong>Universidade</strong> - Você é estudante de graduação em algum curso de TI? Isso já pode ser o seu
									primeiro passo. Muitas instituições possuem bolsas de pesquisa ou estão
									buscando estagiários. Mas para lhe encontrar, elas precisam saber que você
									está é aluno de um curso de graduação. Pra isso, vá na seção de Badges e
									selecione o badge <strong>"Graduando(a)"</strong>. Ele será um dos indicadores
									utilizados por recrutadores que estão buscando profissionais em início de 
									carreira.</p>

								{{HTML::image('img/badges/trygit-badge.png', 'Try Git',array('align'=>'right'))}} 
								<p><strong>Tutoriais online</strong> - É sempre bom começar com boas práticas de desenvolvimento. Você pode começar 
									diretamente desenvolvendo sozinho no seu computador, mas caso você queira 
									começar realmente entendendo como profissionais desenvolvem em equipe, é
									importante você entender e usar na prática, ferramentas de gerencia de 
									configuração e versionamento. O <strong>TRY GIT</strong>  apresenta os
								conceitos básicos de versionamento, que serão úteis com qualquer tecnologia 
								que você escolher utilizar. Faça o tutorial online gratuito e ao finalizar, indique
								seção de badges que você concluiu o tutorial.</p>

								<p>{{HTML::image('img/badges/tryruby-badge.png', 'Try Ruby',array('align'=>'left'))}} 
									Já deu os seus primeiros passos com o GIT?
									Já tem um repositório de código online no Github?
									Que tal tentar agora o <strong>TRY RUBY</strong>?
									Não precisa instalar ou configurar nada no seu computador. Aprenda o básico da linguagem
									Ruby, na prática, diretamente no seu browser e aproveite para publicar no github e 
									compartilhar com outros desenvolvedores o que você aprendeu. Seu portfolio prático
									online já terá algo em uma tecnologia bastante procurada hoje em dia.</p>
								</p>
								<p>{{HTML::image('img/badges/rhok2012.png', 'RHoK 2012',array('align'=>'right'))}} 
									<strong>Eventos</strong> - Já deu os seus primeiros passos em programação? Que tal agora participar com outros
									programadores em um projeto real? Essa foi a proposta do evento RHoK (Random Hacks)
									of Kindness, que em 2012 reuniu programadores em várias cidades do mundo para uma maratona
									de programação. Se você participou desta edição do evento, existe um badge aqui para 
									você. Se não participou, fique de olho nos eventos técnicos da sua região. Participe de
									grupos de tecnologia: Ruby, Python, Java, Front-end. Inscreva-se em maratonas de programação
									e em DOJOs. As dicas, troca de experiência e formação de network servirão por muitos anos.
								</p>
								<p>{{HTML::image('img/badges/caelum-badge.png', 'Caelum',array('align'=>'left'))}} 
									<strong>Cursos Presenciais</strong> - Cursos presencias são outra excelente maneira de dar
									um upgrade nos seus conhecimentos. Aqui você encontra badges de empresas parceiras como:
									Caelum (reconhecida nacionalmente pela comunidade Java), Especializa (com bastante know-how
									na tecnologia PHP) e IDS (Única empresa brasileira com certificados oficiais da Apple).</p>
								<p>{{HTML::image('img/badges/tryios-badge.png', 'Try iOS',array('align'=>'right'))}} 
								<strong>Cursos Online</strong> - Não tem tempo/dinheiro ou perfil para os cursos presenciais?
									Entre as vantagens dos cursos online estão a flexibilidade de horário, custos menores e a
									capacidade do aluno seguir o curso no seu tempo. Aqui temos badges de cursos online como: 
									PyCursos (focada na linguagem python) ou da americana CodeSchool (com foco em web e mobile).
									Mas existem diversas outras opções como a Codecademy ou a Treehouse, todas com excelentes
									conteúdos online. Algumas como a Treehouse e a Codeschool, apresentam "trilhas" de aprendizado
									que orientam ao aluno quais cursos eles devem fazer para alcançar um segmento profissional.</p>
								<p>{{HTML::image('img/badges/opensource.png', 'Open Source',array('align'=>'left'))}} 
									<strong>Projetos Open Source</strong> - Projetos open source em geral são uma excelente fonte de
									aprendizado. Bons desenvolvedores tem projetos paralelos que fazem pelo puro prazer de programar.
									Assim nasceram muitos projetos open source, como o Linux e vários outros. Você pode se juntar a
									um projeto exixtente ou criar o seu próprio projeto e publicar. Porém, duas dicas importantes são,
									nunca espere que a comunidade irá conduzir o seu projeto. Existem milhares de projetos no mundo e
									investir esforço de desenvolvimento em um projeto demanda tempo e dedicação. Se nem você está 
									disposto a trabalhar no seu projeto, não espere que outros estejam. E a segunda dica é focar sempre
									em problemas que estão diretamente relacionados ao seu dia-a-dia. Projetos open-source assim como
									outro projeto qualquer, demandará muitos meses de atenção e você não vai querer investir meses em 
									algo que não está relacionado com a sua realidade. Empresas como o Google chegam a patrocinar a 
									participação de estudantes em projetos open source com programas como o "Google Summer of Code"</p>
								<p>{{HTML::image('img/badges/pmi-acp.png', 'PMI ACP',array('align'=>'right'))}} 
									<strong>Ceritficações</strong> - Por último, na seção de badges você também encontrará badges de 
									certificados oficiais tais como o da certificação da linguagem PHP da Zend e do Java oferecida
									pela Oracle. Mas também de certificações ligadas a gerenciamento de projetos, tais como ACP - 
									Agile Certified Practioner, promovida pelo PMI - Project Managemente Institute.</p>
									<p>Essas são apenas algumas das formas de manter o seu conhecimento em constante evolução. 
									Junte-se a nós e mantenha-se sempre atualizado.</p>
									@if ( Auth::guest() )
										{{HTML::link('connect/session/facebook', __('home.sign-up').' (Facebook)', array('class' => 'btn btn-small btn-warning'))}}
										{{HTML::link('connect/session/github', '&nbsp;'. __('home.sign-up').' (Github) &nbsp;&nbsp;', array('class' => 'btn btn-small btn-warning'))}}
										{{HTML::link('connect/session/linkedin', __('home.sign-up').' (Linkedin)', array('class' => 'btn btn-small btn-warning'))}}
									@endif
					</ol>
			</div> <!-- /span10 -->
			<div class="span5">
				{{HTML::image('img/openbadges.jpg', __('upgrade.openbadges'))}}
			</div> <!-- /span2 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection