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
						{{__('badges.choose')}} :)
					</caption>
					<thead>
						<tr>
							<th width="10%">Badge</th>
							<th width="10%">{{__('badges.points')}}</th>
							<th width="10%">{{__('badges.name')}}</th>
							<th width="60%">{{__('badges.description')}}</th>
							<th width="10%">{{__('badges.issuer')}}</th>
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
									{{Form::submit(__('badges.request'),  array('class' => 'btn btn-small btn-success'))}}
									{{Form::close()}}
								@else
									@if(count($badge->users()->where('user_id', '=', $user->id)->where('badge_user.active','=',0)->get()) == 0)
											<span class="label label-info">{{__('badges.approved')}}</span>
									@else
											<span class="label">{{__('badges.approval')}}</span>									
									@endif
								@endif
		                    @else
		                       <a href="#unauthorizedModal" role="button" class="btn btn-mini btn-warning" data-toggle="modal">{{__('badges.request')}}</a>
		                    @endif
						</td>
					</tr>
					@endforeach
					</tbody>
				</table>
			</div> <!-- /span10 -->
			<div class="span2">
				<div class="sidebar">
					<h3><span class="slash">{{__('badges.about')}}</span></h3>
					<p>{{__('badges.about1')}}</p>
					<p>{{__('badges.about2')}}</p>
				</div> <!-- /sidebar -->
			</div> <!-- /span2 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection