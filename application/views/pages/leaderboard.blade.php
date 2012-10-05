@layout('templates.main')
@section('content')
<div id="subheader">	
	<div class="inner">
		<div class="container">
			<h1>Leaderboard</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->
<div id="subpage">
	<div class="container">
		<div class="row">		
			<div class="span8">					
					<table class="table table-striped table-condensed">
						<caption>
							These are our community users.
						</caption>
						<thead>
							<tr>
								<th>id</th>
								<th>Username</th>
								<th>Nickname</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Name</th>
								<th>e-mail</th>
								<th>From</th>
								<th>Since</th>
							</tr>
						</thead>
						<tbody>
						<?php $users = User::all() ?>
						@foreach ($users as $user)
                 		<tr>
                 			<td>{{$user->id}}</td>
                 			<td>{{$user->username}}</td>
                 			<td>{{$user->nickname}}</td>
                 			<td>{{$user->firstname}}</td>
                 			<td>{{$user->lastname}}</td>
                 			<td>{{$user->name}}</td>
                 			<td>{{$user->email}}</td>
                 			<td>{{$user->social_provider}}</td>
                 			<td>{{$user->created_atl}}</td>
                 		</tr>
              			@endforeach     
						</tbody>
					</table>
			</div> <!-- /span8 -->
			<div class="span4">
				<div class="sidebar">
					<h3><span class="slash">About the Leaderboard</span></h3>
					<p>
					Here you will find a reference to users of our community.</p>
				</div> <!-- /sidebar -->
			</div> <!-- /span4 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection