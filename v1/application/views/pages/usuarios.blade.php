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
								<th width="10%">uid</th>								
								<th width="10%">Picture</th>
								<th width="20%">Name</th>
								<th width="10%">Link</th>								
								<th width="20%">Update</th>								
								<th width="10%">Skills</th>
								<th width="20%">Since</th>
							</tr>
						</thead>
						<tbody>
						<?php $users = User::all() ?>
						@foreach ($users as $user)
						<tr>
							<td>{{$user->uid}}</td>
							<td><img src="{{$user->image}}" width="50" height="50"></td>
							<td>{{HTML::link($user->social_url, $user->name)}}</td>
							<td>{{HTML::link("http://www.facebook.com/".$user->uid, $user->uid)}}</td>
							<td>{{HTML::link("update/uid/".$user->uid, $user->uid)}}</td>							
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