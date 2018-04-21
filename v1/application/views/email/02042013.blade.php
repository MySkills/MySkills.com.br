
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
								<p>Para você achar que era primeiro de abril, nosso boletim segue na Terça-feira com as seguintes novidades:</p>
								<ul>
									<li><strong>Life 30 dias</strong></a> 
										- Finalmente ativamos aquela barrinha vermelha que você se perguntava para que servia :) 
										Ele a sua frequência de uso no sistema. Sempre que você acessar o MySkills a barrinha enche.
										E vai decrescendo até chegar a zero. Quando zerar, seu usuário é removido das listagens e rankings.
										Se você já está a mais de trinta dias sem acessar o MySkills, seu usuário já é considerado inativo.</li>
									<li><<strong>Nível na primeira página</strong>
										- A informação do nível do usuário agora está na primeira página também. Se você ainda está no nível um,
										está na hora de fazer os seus checkins diários.</li>
									<li><<strong>Links em todas as imagens</strong>
										- Essa até eu sentia falta. :) Agora todas as fotos e imagens de badge possuem link. Basta clicar na foto para
										ir direto até o perfil do usuário. Ou clicar no badge novo daquele seu colega.</li>
									<li><a href="http://www.myskills.com.br/pt/badges/51" target="_blank"><strong>Novo curso patrocinado pelo Google</strong></a> 
										- Confira o badge do Google Chromne Dev Tools. Badge do novo curso da Codeschool para aqueles que concluírem 
										esse novo curso gratuito patrocinado pelo Google.</li>
								</ul>
								<p>Abaixo as informações mais recentes sobre a sua evolução profissional na última semana.</p>
								<table border=1 cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:540px">
									<tbody>
										<tr>
											<td style="font-size:14px;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;background:#ffffff;color:#000000;font-weight:bold;vertical-align:baseline;letter-spacing:-0.03em;text-align:left;padding:5px 20px">
												<p style="font-weight:bold">Seu Nível</p>
												<p style="font-size:18px">{{$user->level}}</p>
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
									{{HTML::image('img/badges/'.$badge->image,  $badge->name, array('height'=>75, 'title' => $badge->name))}}
								@empty
									<p><i>Já cadastramos dezenas de badges e você ainda não escolheu nenhum?</i></p>
								@endforelse
								<h3>Novos Badges</h3> 
								<p>Fique de olho nos novos badges.</p>
								@forelse (Badge::since() as $new_badge)
									{{HTML::image('img/badges/'.$new_badge->image,  $new_badge->name, array('height'=>75, 'title' => $new_badge->name))}}
								@empty
									<p><i>Sem novos badges essa semana.</i></p>
								@endforelse
								<h3>Seus seguidores</h3>
								@forelse ($user->followers as $follower)
									{{HTML::image($follower->getImageUrl('large'),  $follower->name, array('width' => 50, 'height'=>50, 'title' => $follower->name))}}
								@empty
									<p><i>Sem seguidores ainda. Está na hora de começar a socializar.</i></p>								
								@endforelse
								<h3>Novos Usuários</h3>
								@forelse (User::users_since($since) as $new_user)
									{{HTML::image($new_user->getImageUrl('large'),  $new_user->name, array('width' => 50, 'height'=>50, 'title' => $new_user->name))}}
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



