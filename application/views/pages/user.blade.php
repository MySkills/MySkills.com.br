@layout('templates.main')
@section('content')
<div id="unauthorizedModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"> {{__('security.unauthorized')}} </h3>
  </div>
  <div class="modal-body">
    <p>{{__('security.needsign')}}</p>
		{{HTML::link('connect/session/facebook', __('security.subscribe').'(Facebook)', array('class' => 'btn btn-large'))}}
		{{HTML::link('connect/session/github', __('security.subscribe').'(Github)', array('class' => 'btn btn-large btn-primary'))}}
		{{HTML::link('connect/session/linkedin', __('security.subscribe').'(Linkedin)', array('class' => 'btn btn-large'))}}
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">{{__('security.close')}}</button>
  </div>
</div>
<?php 
	$user = User::find($user_id); 
?>
<div id="subheader">	
	<div class="inner">
		<div class="container">
			<h1>{{$user->name}}</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->

<div id="subpage">
	<div class="container">
		<div class="row">		
			<div class="span2">
				{{HTML::image($user->getImageUrl('large'),  $user->name)}}
				@if( Auth::check())				
					@if(count($user->followers()->where('user_id', '=', $user->id)->get()) == 0)
						{{Form::open('followers', 'PUT')}}
						{{Form::hidden('user_id', $user->id)}}
						{{Form::submit(__('user.follow'), array('class' => 'btn btn-mini btn-success'))}}
						{{Form::close()}}
					@else
						{{Form::open('followers', 'DELETE')}}
						{{Form::hidden('user_id', $user->id)}}
						{{Form::submit(__('user.unfollow'), array('class' => 'btn btn-mini btn-primary'))}}
						{{Form::close()}}
					@endif
				@else
					<a href="#unauthorizedModal" role="button" class="btn btn-warning" data-toggle="modal" data-target="#unauthorizedModal">{{__('user.follow')}}</a>
				@endif
			</div> <!-- /span2 -->
			<div class="span2">
				<h3>{{__('user.followers')}}</h3>
						@foreach ($user->followers as $follower)
							{{HTML::image($follower->getImageUrl('large'),  $follower->name, array('width' => 50, 'height'=>50))}}
						@endforeach
			</div> <!-- /span4 -->
			<div class="span6">
				@if(Auth::check())
					@if(Auth::user()->id == $user_id)
						<h3>{{__('user.friends')}}</h3>.
						@if($user->provider = 'facebook')
						<?php $friends = $user->getFriends('facebook') ?>
							@forelse($friends as $friend) 
							<div class="span1">
								{{HTML::image($friend->getImageUrl('square'), $user->name, array('width' => 50, 'height'=>50))}}
								{{HTML::link('users/'.$friend->id, $friend->name)}}
							</div>
							@empty
								{{__('user.nofriends')}}
							@endforelse
						@endif
					@else
						&nbsp;
					@endif
				@else
				&nbsp;
				@endif
			</div> <!-- /span4 -->

			<div class="span2">
				<div class="sidebar">
					<h3><span class="slash">{{$user->active()}} User</span></h3>
					<p>{{__('user.badges_earned')}}</p>
						@foreach ($user->activebadges as $badge)
							{{HTML::image('img/badges/'.$badge->image,  $badge->name, array('width' => 50, 'height'=>50))}}
						@endforeach
						@for ($i = 0; $i <= (8-count($user->badges)); $i++)
							{{HTML::image('img/badges/unlock100.png', '', array('width' => 50, 'height'=>50))}}
						@endfor	


				</div> <!-- /sidebar -->
			</div> <!-- /span4 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection