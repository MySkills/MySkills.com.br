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
			<div class="span10">
				<table class="table table-striped table-condensed">
					<caption>
						These are our community users.
					</caption>
					<thead>
						<tr>
							<th width="10%">Picture</th>
							<th width="10%">Name</th>
							<th width="10%">Points</th>
							<th width="50%">Badges</th>						
							<th width="20%">Since</th>
						</tr>
					</thead>
					<tbody>
					<?php $users = User::order_by('points', 'desc')->get(); ?>
					@foreach ($users as $user)
					<tr>
						<td><img src="{{$user->getImageUrl()}}" width="50" height="50"></td>
						@if($user->social_url != '')
							<td>{{HTML::link($user->social_url, $user->name)}}</td>															
						@else
							@if($user->provider == 'facebook')
								<td>{{HTML::link('http://www.facebook.com/'.$user->uid, $user->name)}}</td>
							@endif
						@endif
						<td>{{$user->points}}</td>
						<td>
							@foreach ($user->badges as $badge)
								<img src="img/badges/{{$badge->image}}" width="50" height="50">								    
							@endforeach
							@for ($i = 0; $i <= (8-count($user->badges)); $i++)
								<img src="img/badges/unlock100.png" width="50" height="50">
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
					<h3><span class="slash">About the Leaderboard</span></h3>
					<p>
					Here you will find a reference to users of our community.</p>
				</div> <!-- /sidebar -->
			</div> <!-- /span4 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection