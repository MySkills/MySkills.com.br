
<table border=0 cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:620px">
	<tbody>
		<tr>
			<td style="font-size:16px;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;background:#999999;color:#ffffff;font-weight:bold;vertical-align:baseline;letter-spacing:-0.03em;text-align:left;padding:5px 20px">
				myskills - atualização semanal
			</td>
		</tr>
		<tr>
			<td align="center">
				<table border=0 cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:580px">
					<tbody>
						<tr><td>&nbsp;</td></tr>
						<tr>
							<td style="font-size:14px;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;background:#ffffff;color:#000000;vertical-align:baseline;letter-spacing:-0.03em;text-align:left;padding:5px 20px">
								<p>Bom dia {{$user->name}},</p>
								<ul>Em 04 de Julho de 1865, era publicada a primeira edição do livro Alice no País das Maravilhas. Mas por aqui, é dia do newsletter do MySkills continuar decolando. :)</ul>
								<ul>								
									<li><strong>Nível 4</strong> - Esse mês teremos os nossos primeiros usuários chegando ao nível 4. Então
										é bom entender melhor o que significa o conceito de nível no MySkills. A cada checkin diário você recebe
										um ponto de habilidade para a tecnologia selecionada. O nível por tecnologia pode ser visto na página do seu perfil. Uma
										barra de progresso específica para cada tecnologia. A soma dos checkins de todas as tecnologias dá o seu nível geral
										no MySkills. Por isso, você pode ser nível 1 em várias tecnologias, mas a soma delas lhe elevar ao nível 2. Porém,
										para garantir o balanceamento do sistema, só é possível ir para o nível 3 quando você tiver pelo menos uma habilidade
										no nível 2. O conceito de nível por tecnologia e nível geral permite agrupar os usuários e identificar o engagamento.
										Todos os usuários que atualmente estão no nível 3 são usuários assíduos do MySkills. Um usuário que apenas deu uma olhada
										no MySkills, vai ter no máximo 1 ou 2 checkins e com o tempo será retirado do ranking. </li>
									<li><strong>Ranking e Freelancers.</strong></a> 
										- Como o nível geral indica o seu engajamento e uso do MsSkills, a nova funcionalidade de listagem de freelancers só estará
										disponível para usuários de nível 3 ou superior. Com isso conseguimos garantir que os usuários listados serão desenvolvedores
										que já estão engajados com o MySkills e é também uma forma de privilegiar os usuários assíduos. 
										 Se você ainda não habilitou o seu status de freelancer no MySkills, basta acessar a página 
										<a href="http://www.myskills.com.br/edit_user" target="_blank"><strong>de edição do seu perfil</strong></a>, 
										e marcar a opção FREELANCER. Por enquanto essa opção servirá apenas para identificarmos os interessados
										em participar da fase BETA de contratação de freelancers. Daremos mais detalhes e precisaremos do apoio e 
										feedback dos escolhidos.</li>
									<li><strong>Ranking de Habilidades</strong> - A partir de agora, na página do seu perfil, as barras de progresso
										de habilidades terão cores diferentes a partir do nível de cada habilidade: 1, 2, 3. Isso ajudará na visualização
										e entendimento do perfil do usuário. Já fizemos alguns testes e é possível perceber de forma muito mais clara
										as questões óbvias como, desenvolvedores mobile que possuem nível 2 em iOS e Android, porém nível 1 em tecnologias
										web e badckend. O mesmo vale para front end e/ou backend. Verifiquem os perfis de outros desenvolvedores para 
										entender como essa mudança impacta na visualização.
									</li>
									<li><strong>Vaga Programador PHP</strong> - A Bizconecta de Recife - Pernambuco está selecionando desenvolvedor. 
										Entre os conhecimentos demandados estão: Experiência em Linguagem PHP, Experiência em banco de dados SQL, 
										Experiência em JavaScript e JQuery, Experiência Zend Framework, Conhecimento em programação em camadas (MVC),
										Conhecimento Tecnológico AJAX, Conhecimento em programação CSS e Conhecimento em plataforma E-Commerce.
										Os interessados devem entrar em contato através do endereço bizconecta@gmail.com ou bizconecta@bizconecta.com. 
									</li>
								</ul>
								<p>Abaixo as informações mais recentes sobre a sua evolução profissional desde o envio do último boletim.</p>
								<table border=1 cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:540px">
									<tbody>
										<tr>
											<td style="font-size:14px;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;background:#ffffff;color:#000000;font-weight:bold;vertical-align:baseline;letter-spacing:-0.03em;text-align:left;padding:5px 20px">
												<p style="font-weight:bold">Seu Nível</p>
												<p style="font-size:18px">{{$user->limitedUser()->limitedlevel}}</p>
											</td>
											<td style="font-size:14px;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;background:#ffffff;color:#000000;vertical-align:baseline;letter-spacing:-0.03em;text-align:left;padding:5px 20px">
												<p style="font-weight:bold">Checkins</p>
												<p>{{count($user->checkins_since($since))}}</p>
											</td>
											<td style="font-size:14px;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;background:#ffffff;color:#000000;vertical-align:baseline;letter-spacing:-0.03em;text-align:left;padding:5px 20px">
												<p style="font-weight:bold">Badges</p>
												<p>{{count($user->badges)}}</p>
											</td>
											<td style="font-size:14px;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;background:#ffffff;color:#000000;vertical-align:baseline;letter-spacing:-0.03em;text-align:left;padding:5px 20px">
												<p style="font-weight:bold">Seguidores</p>
												<p>{{count($user->followers)}}</p>
											</td>
										</tr>
									</tbody>
								</table>		
								<h3>Seus Checkins na Última Semana</h3>
								<ul>
									@forelse($user->checkins_since($since) as $technology)
										<li>{{date('d/m/Y', strtotime($technology->pivot->checkin_at))}} - {{$technology->name}}</li>
									@empty
										<li><i>Você não fez checkins na última semana :(.</i></li>
									@endforelse
								</ul>
								<p><strong><a href="http://www.myskills.com.br">Comece a semana bem. Acesse a página do seu perfil agora e faça o seu checkin diário.</a></strong></p>
								<p><strong>Checkins</strong> - Através dos checkins você consegue registrar diariamente 
									as tecnologias que tem utilizado para desenvolver. 
									O seu nível é definido a partir do total de checkins feitos ao longo do tempo.
									Além disso eles servem para que você identifique as tecnologias utilizadas por outros
									desenvolvedores. Seja para trocar idéias ou para saber o que a comunidade tem utilizado
									recentemente.
								</p>
								<h3>Seus Badges</h3>
								<p>Esses são os seus badge atuais.</p>								
								@forelse ($user->activebadges as $badge)
									<a href="{{URL::to('/badges/'.$badge->id)}}">
										{{HTML::image('img/badges/'.$badge->image,  $badge->name, array('height'=>75, 'title' => $badge->name))}}
									</a>
								@empty
									<p><i>Já cadastramos dezenas de badges e você ainda não escolheu nenhum?</i></p>
								@endforelse
								<h3>Novos Badges</h3> 
								<p>Fique de olho nos novos badges.</p>
								@forelse (Badge::since() as $new_badge)
									<a href="{{URL::to('/badges/'.$new_badge->id)}}">
										{{HTML::image('img/badges/'.$new_badge->image,  $new_badge->name, array('height'=>75, 'title' => $new_badge->name))}}
									</a>
								@empty
									<p><i>Sem novos badges essa semana.</i></p>
								@endforelse
								<h3>Seus seguidores</h3>
								@forelse ($user->followers as $follower)
									<a href="{{URL::to('/users/'.$follower->id)}}">
										{{HTML::image($follower->getImageUrl('large'),  $follower->name, array('width' => 50, 'height'=>50, 'title' => $follower->name))}}
									</a>
								@empty
									<p><i>Sem seguidores ainda. Está na hora de começar a socializar.</i></p>								
								@endforelse
								<h3>Novos Usuários</h3>
								@forelse (User::users_since($since) as $new_user)
									<a href="{{URL::to('/users/'.$new_user->id)}}">
										{{HTML::image($new_user->getImageUrl('large'),  $new_user->name, array('width' => 50, 'height'=>50, 'title' => $new_user->name))}}
									</a>
								@empty
									<p><i>Sem novos usuários essa semana. Que tal convidar alguns amigos?</i></p>
								@endforelse
							</td>
						</tr>
					</tbody>
				</table>				
			</td>
		</tr>
	</tbody>
</table>



