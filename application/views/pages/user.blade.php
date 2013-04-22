@layout('templates.main')
@section('content')
<?php
	if (Auth::check()) {
		$user->logLastAccess();
	}
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
		@if($user->limitedUser()->limitedlevel < $user->limitedUser()->level)
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>{{__('user.limitedlevelmessage', array('level' => $user->limitedUser()->level, 'skilllevel' => $user->limitedUser()->level-1))}}</strong>
			</div>
		@endif

		<div class="row">
			<div class="span3 pagination-centered box">
				{{HTML::image($user->getImageUrl('large'),  $user->name, array('title' => $user->name))}}
				<h1>{{$user->name}}</h1>
				<div class="sidebar">
					@if(Auth::check())
						<a href="#addMessageModal" role="button" class="btn btn-success" data-toggle="modal"><i class="icon-envelope"></i> {{__('user.sendmessage')}}</a>
					@else
						<a href="#unauthorizedModal" role="button" class="btn btn-warning" data-toggle="modal" data-target="#unauthorizedModal"><i class="icon-envelope"></i>{{__('user.sendmessage')}}</a>
					@endif
				</div> <!-- /sidebar -->
			</div> <!-- /span2 -->
			<div class="span7">
				<div class="row">
					<div class="span1 sidebar pagination-centered well">
					@if($user_level == 1)
						{{HTML::image('img/browserquest/'.'level1.png',  __('user.level').' 1', array('width' => 75, 'height'=>75, 'title' => __('user.level').' 1'))}}							
					@endif
					@if($user_level == 2)
						{{HTML::image('img/browserquest/'.'level2.png',  __('user.level').' 2', array('width' => 75, 'height'=>75, 'title' => __('user.level').' 2'))}}
					@endif
					@if($user_level == 3)
						{{HTML::image('img/browserquest/'.'level3.png',  __('user.level').' 3', array('width' => 75, 'height'=>75, 'title' => __('user.level').' 3'))}}
					@endif
					{{__('user.level')}} {{$user_level}}

					</div>
					<div class="progress progress-danger span5">
						<div class="bar" style="width: {{$user->life*3.33}}%;">{{$user->life}}/30 <i class="icon-heart"></i></div>
					</div>

					<div class="progress progress-info span5">
						<div class="bar" style="width: {{($user->technologies()->count() - $user->pglevel($user->level-1))*100/$user->levellimit($user->level)}}%;">{{$user->technologies()->count() - $user->pglevel($user->level-1)}}/{{$user->levellimit($user->level)}} <i class="icon-fire"></i></div>
					</div>

				<div class="pagination-centered span5">
				@if(Auth::check())
					@if($user->id == Auth::user()->id)
						{{Form::open('checkin', 'PUT', array('class' => 'form-inline'))}}
						{{Form::submit("CHECKIN.: ".__('user.usedtoday').'.: ', array('class'=>'btn btn-success'))}}
						{{Form::select('technology_id', $technology_list)}}
						{{Form::close()}}
					@endif
				@else
					{{Form::open('checkin', 'PUT', array('class' => 'form-inline'))}}
					<a href="#unauthorizedModal" role="button" class="btn btn-warning" data-toggle="modal" data-target="#unauthorizedModal">{{"CHECKIN.: ".__('user.usedtoday')}}.:</a>
					{{Form::select('technology_id', $technology_list)}}
					{{Form::close()}}
				@endif
				</div>

				</div>
				<ul id="BadgeTab" class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#checkins">Checkins ({{count($user->technologies)}})</a></li>
					<li class><a data-toggle="tab" href="#badges">Badges Conquistados ({{count($user->badges)}})</a></li>
					<li class><a data-toggle="tab" href="#followers">Seguidores ({{count($user->followers)}})</a></li>
					<li class><a data-toggle="tab" href="#projects">Projetos (0)</a></li>
				</ul>
				<div id="BadgeTabContent" class="tab-content">
					<div class="tab-pane fade in active" id="checkins">
						@foreach($user->checkins as $checkin)
							@if(Auth::check())
							@endif
							<div class="row">
								<div class="progress progress-info span3">
									@if($checkin->level == 1)
										<div class="bar" style="width: {{$checkin->points*5}}%;">{{$checkin->points}}/20 </div>
									@endif
									@if($checkin->level == 2)
										<div class="bar" style="width: {{($checkin->points-19)*2.5}}%;">{{$checkin->points-20}}/40 </div>
									@endif
									@if($checkin->level == 3)
										<div class="bar" style="width: {{($checkin->points-59)*1.66}}%;">{{$checkin->points-60}}/60 </div>
									@endif

								</div>
								@if(Auth::check())
									@if($user->id == Auth::user()->id)
										{{Form::open('checkin', 'PUT', array('class' => 'form-inline'))}}
										<div class="span2">
											<input type="image" src="/img/add.png"> {{HTML::link('technology/'.$checkin->id, $checkin->name)}} {{Form::hidden('technology_id', $checkin->id)}}
										</div>
										{{Form::close()}}
									@else 
									<div class="span2">
										{{HTML::link('technology/'.$checkin->id, $checkin->name)}}
									</div>
									@endif
								@else
									<div class="span2">
										<a href="#unauthorizedModal" role="button" data-toggle="modal" data-target="#unauthorizedModal">
											{{HTML::image('img/add.png')}}
										</a>
										{{HTML::link('technology/'.$checkin->id, $checkin->name)}}

									</div>
								@endif
								<div class="span1">{{__('user.level')}}.: {{$checkin->level}}</div>
								@if(Auth::check())	
									@if($user->id == Auth::user()->id)
										{{Form::open('checkin', 'DELETE', array('class' => 'form-inline'))}}
											<div class="span1">$ {{$checkin->points}} {{HTML::image('img/coin16.png')}}
											<input type="image" src="/img/minus.png">{{Form::hidden('technology_id', $checkin->id)}}
											</div>
										{{Form::close()}}
									@endif
								@else 
								<div class="span1">$ {{$checkin->points}} {{HTML::image('img/coin16.png')}}
									<a href="#unauthorizedModal" role="button" data-toggle="modal" data-target="#unauthorizedModal">
										{{HTML::image('img/minus.png')}}
									</a>									
								</div>
								@endif
								
							</div>
							@if(Auth::check())
								@if($user->id == Auth::user()->id)
									
								@endif
							@endif

						@endforeach
					</div>
					<div class="tab-pane fade" id="badges">
						<div class="sidebar pagination-centered">
							@foreach ($user->activebadges as $badge)
								<a href="{{URL::to('/badges/'.$badge->id)}}">
									{{HTML::image('img/badges/'.$badge->image,  $badge->name, array('width' => 75, 'height'=>75, 'title' => $badge->name))}}
								</a>
							@endforeach
							@for ($i = 0; $i <= (15-count($user->activebadges)); $i++)
								{{HTML::image('img/badges/unlock100.png', 'Unlock', array('width' => 75, 'height'=>75, 'title' => 'Unlock'))}}
							@endfor
						</div> <!-- /sidebar -->
					</div>
					<div class="tab-pane fade" id="followers">
						<div class="sidebar pagination-centered">
								@foreach ($user->followers as $follower)
								<a href="{{URL::to('/users/'.$follower->id)}}">
									{{HTML::image($follower->getImageUrl('large'),  $follower->name, array('width' => 50, 'height'=>50, 'title' => $follower->name))}}
								</a>
							@endforeach
						</div>
					</div>
					<div class="tab-pane fade" id="projects">
					</div>
				</div>
			</div> <!-- /span4 -->
			<div class="span2 pagination-centered">
				<div class="sidebar pagination-centered">
					@if(count($user->technologies) > 20)
						<h3><span class="slash">{{__('user.items')}}</span></h3>
						{{HTML::image('img/browserquest/'.'chest.png',  'Chest', array('width' => 48, 'height'=>48, 'title' => 'Chest'))}}
					@endif					
					@if( Auth::check())
						@if($user->id <> Auth::user()->id)
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
						@endif
					@else
					<a href="#unauthorizedModal" role="button" class="btn btn-warning" data-toggle="modal" data-target="#unauthorizedModal">{{__('user.follow')}}</a>
					@endif
				</div> <!-- /sidebar -->
			</div> <!-- /span4 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection