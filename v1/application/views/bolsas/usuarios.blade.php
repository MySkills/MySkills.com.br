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
					<?php $users = User::order_by('created_at', 'desc')->get(); ?>
					@foreach ($users as $user)
					<tr>
						<td>
							{{HTML::image($user->getImageUrl('square'),  $user->name, array('width' => 50, 'height'=>50))}}
						</td>
						<td>
							{{HTML::link('users/'.$user->id, $user->name)}}
						</td>
						<td>{{$user->getpoints()}}</td>
						<td>
						</td>
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