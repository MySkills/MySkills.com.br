@layout('templates.main')
@section('content')
<?php 
	$user = User::find($user_id); 
?>
<!-- Unauthorized Modal -->
<div id="unauthorizedModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"> {{__('security.unauthorized')}} </h3>
  </div>
  <div class="modal-body">
    <p>{{__('security.needsign')}}</p>
		{{HTML::link('connect/session/facebook', __('security.subscribe').'(Facebook)', array('class' => 'btn'))}}
		{{HTML::link('connect/session/github', __('security.subscribe').'(Github)', array('class' => 'btn btn-primary'))}}
		{{HTML::link('connect/session/linkedin', __('security.subscribe').'(Linkedin)', array('class' => 'btn'))}}
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">{{__('security.close')}}</button>
  </div>
</div>
<!-- Send Message Modal -->
<div id="addMessageModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">{{__('user.sendmessage')}}</h3>
</div>
@if( Auth::check())
	<div class="modal-body">

		{{Form::open('messages', 'PUT',array('class' =>'form-horizontal'))}}
		{{Form::hidden('recipient_id', $user->id)}}
		<div class="control-group" >
			<label class="control-label" for="inputEmail">{{__('user.recipient')}}</label>
			<div class="controls">
				{{HTML::image($user->getImageUrl('square'),  $user->name)}}  {{$user->name}}
			</div>
		</div>
		<div class="control-group" >
			<label class="control-label" for="inputEmail">{{__('user.message')}}</label>
			<div class="controls">				
				{{Form::textarea('text', '',array('class' =>'span3', 'placeholder' => __('user.message'), 'rows' => '8' ))}}
			</div>
		</div>			
		<div class="control-group" >		
			<div class="controls">				
				{{Form::submit(__('jobs.submit'), array('class' => 'btn-primary'))}}
				{{Form::close()}}			
			</div>
		</div>
  	</div>
  	<div class="modal-footer">
    	<button class="btn" data-dismiss="modal" aria-hidden="true">{{__('jobs.cancel')}}</button>
  	</div>
@else
	<div class="modal-body">
	    <p>You are not authenticated</p>
  	</div>
  	<div class="modal-footer">
    	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  	</div>
@endif  
</div>
<!-- /end Modal --> 
<div id="subheader">	
	<div class="inner">
		<div class="container">
			<h1>{{$user->name}}</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->

<div id="subpage">
	<div class="container">
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
		<div class="row">		
			<div class="span2">
				<div>
					{{HTML::image($user->getImageUrl('large'),  $user->name)}}
				</div>
				@if( Auth::check())				
					@if(count($user->followers()->where('follower_id', '=', Auth::user()->id)->get()) == 0)
						{{Form::open('followers', 'PUT')}}
						{{Form::hidden('user_id', $user->id)}}
						{{Form::submit(__('user.follow'), array('class' => 'btn btn-mini btn-success'))}}
						{{Form::close()}}
					@else
						{{Form::open('followers', 'DELETE')}}
						{{Form::hidden('user_id', $user->id)}}
						{{Form::submit(__('user.unfollow'), array('class' => 'btn btn-mini btn-danger'))}}
						{{Form::close()}}
					@endif
                    <a href="#addMessageModal" role="button" class="btn btn-mini btn-success" data-toggle="modal"><i class="icon-envelope"></i> {{__('user.sendmessage')}}</a>
				@else
				<div class="row">
					<div class="span1">
						<a href="#unauthorizedModal" role="button" class="btn btn-mini btn-warning" data-toggle="modal" data-target="#unauthorizedModal">{{__('user.follow')}}</a>
					</div>
					<div class="span1">
						<a href="#unauthorizedModal" role="button" class="btn btn-mini btn-warning" data-toggle="modal" data-target="#unauthorizedModal">{{__('user.sendmessage')}}</a>
					</div>
				</div>
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
						@if($user->provider == 'facebook')
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