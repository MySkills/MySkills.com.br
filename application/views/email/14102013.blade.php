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
								<ul>
									<li><strong>Flat Design</strong> - Android, iOS 7, Twitter Bootstrap 3, Flat UI...todos estão investindo
										no Flat Design atualmente. Como sempre, essa semana temos diversos links na seção abaixo e para que
										você esteja sempre se atualizando indicamos vários referentes a Flat Design.
									</li>
									<li><strong>Freelancers</strong> - Lembrando que se você ainda não mudou o seu status para freelancer, basta
										ir na <a href="http://www.myskills.com.br/pt/edit_user" target="_blank">página de edição do seu perfil</a>
										e marcar a opção. A lista ainda não está acessível através do menu do site, mas você já pode ver
										em primeira mão, a lista <a href="http://www.myskills.com.br/developers/freelancers" target="_blank"><strong>clicando aqui</strong></a>.
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
								<h3>Links (NOVO)</h3>
								<ul>
									@forelse($links as $link)
										<li><Strong>{{$link->title}}</strong> - {{HTML::link($link->url, $link->description)}}</li>
									@empty
										<li><i>Sem links dessa vez :(.</i></li>
									@endforelse
								</ul>

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
									<p><i>Sem novos badges essa semana. :( Quer sugerir algum? </i></p>
								@endforelse
								<h3>Seus seguidores</h3>
								@forelse ($user->followers as $follower)
									<a href="{{URL::to('/users/'.$follower->id)}}">
										{{HTML::image($follower->getImageUrl('large'),  $follower->name, array('width' => 50, 'height'=>50, 'title' => $follower->name))}}
									</a>
								@empty
									<p><i>Sem seguidores ainda. Está na hora de começar a socializar. :(</i></p>								
								@endforelse
								<h3>Novos Usuários</h3>
								@forelse (User::users_since($since) as $new_user)
									<a href="{{URL::to('/users/'.$new_user->id)}}">
										{{HTML::image($new_user->getImageUrl('large'),  $new_user->name, array('width' => 50, 'height'=>50, 'title' => $new_user->name))}}
									</a>
								@empty
									<p><i>Sem novos usuários essa semana. Que tal convidar alguns amigos? :)</i></p>
								@endforelse
							</td>
						</tr>
					</tbody>
				</table>				
			</td>
		</tr>
	</tbody>
</table>



