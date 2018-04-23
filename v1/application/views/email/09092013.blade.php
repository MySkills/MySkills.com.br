{{$user->name}}
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
								<ul>Em 09 de Setembro de 1884 ocorreu a invenção do Cachorro Quente. Mas por aqui, é dia do newsletter do MySkills. :)</ul>
								<ul>								
									<li><strong>Curso Be MEAN (AngulaJS/Node.js/MongoDB - São Paulo)</strong> - Para quem se inscreveu é bom relembrar. Para quem não se inscreveu e/ou não soube, hoje começa
										em São Paulo o curso Be MEAN do colega <a href="http://www.myskills.com.br/pt/users/266" target="_blank">Jean Carlos Nascimento, o "Suissa"</a>. O curso terá duração de 20 horas com AngularJS, Node.js e MongoDB.
										Na página do <a href="http://www.myskills.com.br/pt/badges/102" target="_blank">Badge do Be MEAN</a> você encontra o link para mas informações. 
									</li>
									<li><strong>Curso PHP (Recife)</strong> - Para quem está em Recife, no dia 21/09 começa o curso de PHP da Treinamento in Foco. Saiba mais através
									da <a href="https://www.facebook.com/treinamentoinfoco" target="_blank">Fan Page do curso</a>.
									</li>
									<li><strong>Você usa o Sublime Text?</strong> - Você usa o Sublime Text? Se ainda não ouviu falar, o sublime text é um editor de texto (pago) bastante usado
										pela comunidade de front-end. Se você utiliza, você agora pode instalar o pacote do Codeivate, que permite registrar quais linguagens você está 
										utilizando no Sublime Text e gerar estatísticas automaticamente. <a href="http://www.codeivate.com/" target="_blank">Confira no site do Codeivate</a>. 
										Percebeu a semelhança com o relatório de checkins do MySkills? O mais legal é que esses dados podem ser acessados via JSON. E nos já estamos começando a
										fazer a integração. Com isso, seu perfil no MySkills ficará mais rico com dados sobre a sua produtividade, sem exigir tanta preocupação com os checkins diários.
										Para fazer o primeiro teste, <a href="http://www.codeivate.com/install" target="_blank">basta instalar o plugin no Sublime Text</a> e adicionar o seu login do Codeivate no seu perfil do MySkills. Com isso, quem acessar o 
										seu perfil no MySkills verá automaticamente em qual linguagem você está programando naquele momento, caso você esteja usando o Sublime Text.
										Para desabilitar, basta remover o seu login do Codeivate <a href="http://www.myskills.com.br/pt/edit_user" taget="_blank">do seu perfil no Myskills</a>.
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
									<p><i>Sem novos badges essa semana. :(</i></p>
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



