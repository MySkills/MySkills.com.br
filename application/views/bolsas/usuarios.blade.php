@layout('templates.bolsas')
@section('content')
<div id="subheader">	
	<div class="inner">
		<div class="container">
			<h1>Usuários</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->
<div id="subpage">
	<div class="container">
		<div class="row">		
			<div class="span10">
				<table class="table table-striped table-condensed">
					<caption>
						These are our community users.
					</caption>
					<thead>
						<tr>
							<th width="10%">Foto</th>
							<th width="10%">Nome</th>
							<th width="10%">Perfil</th>
							<th width="10%">Graduação</th>							
							<th width="20%">Publicações Nacionais</th>
							<th width="20%">Publicações Internacionais</th>							
							<th width="20%">Desde</th>
						</tr>
					</thead>
					<tbody>
					<?php $users = User::order_by('points', 'desc')->get(); ?>
					@foreach ($users as $user)
					<tr>
						<td>
							{{HTML::image($user->getImageUrl('square'),  $user->name, array('width' => 50, 'height'=>50))}}
						</td>
						<td>
							{{HTML::link('users/'.$user->id, $user->name)}}
						</td>
						<td>{{$user->points}}</td>
						<td>
							@foreach ($user->activebadges as $badge)
								{{HTML::image('img/badges/'.$badge->image,  $badge->name, array('width' => 50, 'height'=>50))}}
							@endforeach
							@for ($i = 0; $i <= (8-count($user->activebadges)); $i++)
								{{HTML::image('img/badges/unlock100.png',  ' ', array('width' => 50, 'height'=>50))}}
							@endfor								
						</td>
						{{-- 
						<td>
							<div class="progress progress-success">
								<?php $points = (100*$user->points)/133 ?>
								<div class="bar" style="width: {{$points}}%"></div>
							</div>
						</td>
						--}}
						<td>{{$user->created_at}}</td>
             		</tr>
          			@endforeach     
					</tbody>
				</table>
			</div> <!-- /span8 -->
			<div class="span2">
				<div class="sidebar">
					<h3><span class="slash">Sobre os Usuários</span></h3>
					<p>
					Nossa listagem é formada por bolsistas e coordenadores. O objetivo é
					fazer a ponte entre os desenvolvedores interessados em participar como
					bolsista em um projeto nacional de pesquisa e os coordenadores que estão
					buscando futuros pesquisadores qualificados de acordo com a sua demanda.
				</p>
				</div> <!-- /sidebar -->
			</div> <!-- /span4 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection