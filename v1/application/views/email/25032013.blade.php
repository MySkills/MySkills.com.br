
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
								<p>Para a semana de 18/03/2013 a 24/03/2013, temos as seguintes novidades:</p>
								<ul>
									<li><a href="http://www.myskills.com.br/pt/users/276" target="_blank"><strong>Ricardo Fuhrmann</strong></a> 
										- É o ganhador do prêmio de R$ 600,00 em licença de acesso ao CodeSchool. Parabens Ricardo!!! 
										Queremos ver muito mais código rodando agora, hein? :)</li>
									<li><<strong>Nova categoria PaaS</strong>
										- Temos uma nova categoria de badges para os desenvolvedores web que tem aplicações em PaaS (Platforms as a Service)
										tais como: Heroku, Amazon Web Services, Google App Engine e PagodaBox.</li>
									<li><<strong>Nova categoria Comunidade</strong>
										- Outra categoria nova de badges são os badges relativos a grupos e comunidades. Começamos com o Internet Defense League.
										Para quem não conhece, o IDL é uma comunidade mundial de internautas que lutam contra as tentativas de controle e restrição
										de uso da Internet e conta com apoio de instituições como: Mozilla, Wordpress, Reddit, PHP e muitas outras.</li>
									<li><a href="http://www.myskills.com.br/pt/channel" target="_blank"><strong>Canal de Atendimento</strong></a> 
										- O nosso canal de atendimento não é novo. Mas é sempre bom lembrar que se você tem uma sugestão encontrou algum erro
										no sistema basta registrar lá.</li>
								</ul>
								<p>O ganhador do prêmio no valor de R$ 600,00 para acessar o CodeSchool durante 1 ano.</p>
								<table border=1 cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:540px">
									<tbody>
										<tr>
											<td>
												<center>
												<img src="https://graph.facebook.com/100000222369062/picture?type=square" width="50" height="50" title="Ricardo Fuhrmann" alt="Ricardo Fuhrmann">
												<p style="font-size:18px"><strong>Ricardo Fuhrmann</strong></p>
												</center>
											</td>
										</tr>
									</tbody>
								</table>
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



