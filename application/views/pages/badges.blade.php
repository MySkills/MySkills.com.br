@layout('templates.main')
@section('content')
@if( Auth::check())
	<?php $user = User::find(Auth::user()->id); ?>
@endif
<div id="unauthorizedModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">{{__('security.unauthorized')}}</h3>
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
			<div class="span9">
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
				<ul id="BadgeTab" class="nav nav-tabs">
					<?php $badgetypes = Badgetype::where('active', '=', 1)->order_by('points', 'desc')->get(); ?>
					@foreach($badgetypes as $badgetype)
						@if($badgetype->id==2)
							<li class="active"><a data-toggle="tab" href="#{{$badgetype->name}}">{{$badgetype->name}} ({{$badgetype->points}} pontos)</a></li>
						@else
							<li class><a data-toggle="tab" href="#{{$badgetype->name}}">{{$badgetype->name}} ({{$badgetype->points}} pontos)</a></li>
						@endif
					@endforeach

				</ul>
				<div id="BadgeTabContent" class="tab-content">
					@foreach($badgetypes as $badgetype)					
						@if($badgetype->id==2)
							<div class="tab-pane fade in active" id="{{$badgetype->name}}">
						@else
							<div class="tab-pane fade" id="{{$badgetype->name}}">
						@endif
								<?php $badges = Badge::where('badgetype_id', '=', $badgetype->id)->where('active', '=', 1)->order_by('id', 'desc')->get(); ?>
								<div class="row">
									@foreach ($badges as $badge)
										<div class="span1">
											{{HTML::image('img/badges/'.$badge->image, $badge->name, array('width' => '75', 'height' => '75'))}}
										</div>
										<div class="span2">
											<table class="table table-striped table-condensed">
												<tr><td>{{$badge->name}}</td></tr>
												<tr><td>

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
												</td></tr>
												<tr><td>{{$badge->description}}</td></tr>
												<tr><td>{{__('badges.issuer')}}.: {{$badge->issuer->name}}</td></tr>
											</table>
										</div>										
									@endforeach											
								</div>
						    </div>
					@endforeach
				</div>
			</div> <!-- /span10 -->
			<div class="span3">
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