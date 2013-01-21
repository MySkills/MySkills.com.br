@layout('templates.main')
@section('content')
@if( Auth::check())
	<?php $user = User::find(Auth::user()->id); ?>
@endif
<div id="unauthorizedModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Unauthorized Access</h3>
  </div>
  <div class="modal-body">
    <p>You need to sign-up.</p>
		{{HTML::link('connect/session/facebook', 'Sign-Up(Facebook)', array('class' => 'btn btn-large'))}}
		{{HTML::link('connect/session/github', 'Sign-Up(Github)', array('class' => 'btn btn-large btn-primary'))}}
		{{HTML::link('connect/session/linkedin', 'Sign-Up(Linkedin)', array('class' => 'btn btn-large'))}}
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
<div id="subheader">	
	<div class="inner">
		<div class="container">
			<h1>Badges</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->
<div id="subpage">
	<div class="container">
		<div class="row">		
			<div class="span10">
				@if(Session::get('status'))
					@if(Session::get('status')=='ERROR')
						<div class="alert alert-error">
					@else
						<div class="alert alert-success">
					@endif
						 <button type="button" class="close" data-dismiss="alert">×</button>
						<strong>{{Session::get('status')}}</strong>
					</div>
				@endif
				<table class="table table-striped table-condensed">
					<caption>
						Choose your next professional achievement!!! :)
					</caption>
					<thead>
						<tr>
							<th width="10%">Badge</th>
							<th width="10%">Points</th>
							<th width="10%">Name</th>
							<th width="60%">Description</th>
							<th width="10%">Issuer</th>
						</tr>
					</thead>
					<tbody>
					<?php $badges = Badge::order_by('points', 'asc')->get(); ?>
					@foreach ($badges as $badge)
					<tr>
						<td>
							{{HTML::image('img/badges/'.$badge->image, $badge->name, array('width' => '75', 'height' => '75'))}}
						</td>
						<td>{{$badge->points}}</td>
						<td>{{$badge->name}}</td>
						<td>{{$badge->description}}</td>
						<td>
							{{$badge->issuer->name}}
		                    @if( Auth::check())
	                            @if(count($badge->users()->where('user_id', '=', $user->id)->get()) == 0)
									{{Form::open('badges/'.$badge->id.'/'.Auth::user()->id, 'PUT')}}
									{{Form::submit('Apply for this badge',  array('class' => 'btn btn-small btn-success'))}}
									{{Form::close()}}
								@else
									@if(count($badge->users()->where('user_id', '=', $user->id)->where('badge_user.active','=',0)->get()) == 0)
											<span class="label label-info">Approved</span>
									@else
											<span class="label">Waiting for Approval</span>									
									@endif
								@endif
		                    @else
		                       <a href="#unauthorizedModal" role="button" class="btn btn-mini btn-warning" data-toggle="modal">Apply for this badge</a>
		                    @endif
						</td>
					</tr>
					@endforeach
					</tbody>
				</table>
			</div> <!-- /span10 -->
			<div class="span2">
				<div class="sidebar">
					<h3><span class="slash">About Badges</span></h3>
					<p>
					Here you not only say that you know something.
					We prepared an achievement ranking system where you
					can receive badges and points to improve your profile.
					</p>
					<p>In the near future, recruiters will use badges and
						achievements as a pre-condition to apply for a job.
					</p>
				</div> <!-- /sidebar -->
			</div> <!-- /span2 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection