
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
									<li><strong>Principal mudança da semana - Mudando a forma de evolução de níveis</strong></a> 
										- O MySkills é uma comunidade que pretende de forma lúdica, atrair uma comunidade de desenvolvedores
										interessados em interagir, demonstrar e trocar conhecimento e aprender com outros membros da comunidade.
										Para isso, algumas técnicas de gamificação são utilizadas tais como: o leaderboard, o uso de badges, pontuação,
										o conceito de níveis e de habilidades. É importante ressaltar que a forma de pontuação e métodos usados para
										rankear e desenvolvedores e tornar o processo atrativo estará sempre em evolução. Assim como o balanceamento
										de pontos e fases (<i>Game Balance</i>). Em função disso, uma nova mudança foi adicionada. Nas primeiras versões
										qualquer desenvolvedores que atingisse apenas pontuação necessária para mudar de fase, automaticamente evoluia de fase.
										A pontuação inicialmente por fase era respectivamente: 20, 40 e 60 pontos para as três primeiras fases. Sendo que ao 
										passar de fase, a pontuação de experiência é zerada e a contagem recomeça. A partir de agora algumas mudanças foram feitas.
										A principal delas é que um desenvolvedor não poderá alcançar um nível sem ter pelo menos uma habilidade um nível abaixo.
										Um exemplo prático. Atualmente um desenvolvedor que faz 20 checkins em tecnologias diferentes no mesmo dia alcança o nível 2. Assim como
										um desenvolvedor que faz 20 checkins na mesma tecnologia em 20 dias. Na prática, a idéia é que você pode evoluir por 
										profundidade de conhecimento ou ou amplitude. Porém, a partir de agora, não será mais permitido que um desenvolvedor
										evolua para o nível 3 sem ter pelo menos uma habilidade no nível 2. A idéia é que um desenvolvedor pode sim evoluir com
										uma larga amplitude, porém, para ser considerado experiente, ele tem que estar se aprofundando em pelo menos uma tecnologia.
										Se isso não fosse feito, um desenvolvedor que passar uma semana testando dezenas de tecnologias diferentes, será considerado
										um dos mais experientes da comunidade. Todas as mudanças visam refletir a realidade do mercado de desenvolvimento e como
										o conhecimento efetivamente evolui. Qualquer dúvida, crítica ou sugestão, basta entrar em contato.</li>
									<li><strong>Agradecimentos</strong></a> 
										- O MySkills é uma comunidade que só consegue evoluir da melhor forma de maneira colaborativa. Com envio de dúvidas, críticas
										e sugestões de vocês. Então gostaria de agradecer a todos que tem enviado dicas de melhoria, sugestões de novas tecnologias e 
										novos badges a serem adicionados e também pela paciência e entender que estamos apenas em 1% de onde queremos chegar. Agradecimento
										especial ao 
										<a href="http://www.myskills.com.br/pt/users/276" target="_blank"><strong>Ricardo Fuhrmann</strong></a> e ao 
										<a href="http://www.myskills.com.br/pt/users/406" target="_blank"><strong>Ariel Patschiki</strong></a> que tem enviado várias sugestões e comentários no 
											<a href="http://www.myskills.com.br/pt/channel" target="_blank"><strong>Canal de Atendimento</strong></a>. Quanto mais complicado
											o nome desse pessoal, mais eles contribuem. :)</li>
									<li><strong>Correção de imagens do Github</strong></a> 
										- Quem havia se cadastrado com o Github deve ter percebido que estavamos utilizando versões pequenas de imagem o que dava um
										problema de visualização e resolução. Isso foi resolvido e agora as fotos de usuários do Github aparecem com ótima resolução.</li>
									<li><strong>Remover um checkin</strong></a> 
										- Algumas pessoas solicitaram a criação da funcionalidade de remover um checkin ou remover um badge cadastrado por engano.
										A partir de agora é possível remover o checkin, clicando na mesma página onde é feito o checkin. É possível fazer apenas um único
										checkin por dia em uma tecnologia específica. Porém, é possível apagar vários checkins no mesmo dia para a mesma tecnologia. E para
										a exclusão do badge, basta acessar a 
										<a href="http://www.myskills.com.br/pt/badges" target="_blank"><strong>lista de badges</strong></a> e clicar na opção de remover.</li>
								
								</ul>
								<p>Abaixo as informações mais recentes sobre a sua evolução profissional na última semana.</p>
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



