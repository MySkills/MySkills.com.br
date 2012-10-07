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
								<th width="10%">Picture</th>
								<th width="20%">Name</th>
								<th width="40%">Skills</th>
								<th width="30%">Since</th>
							</tr>
						</thead>
						<tbody>
						<?php $users = User::all() ?>
						@foreach ($users as $user)
						<tr>
							@if ($user->provider =='facebook')
								<td><img src="https://graph.facebook.com/{{$user->uid}}/picture&type=square"></td>
							@elseif ($user->provider =='linkedin')
								<td>&nbsp;</td>
							@elseif ($user->provider =='github')
								<td>&nbsp;</td>
							@else
								<td>&nbsp;</td>
							@endif
							<td>{{HTML::link($user->url, $user->name)}}</td>
							<td>
								<div class="progress progress-success">
									<div class="bar" style="width: 100%;"></div>
								</div>
							</td>
							<td>{{$user->created_at}}</td>
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