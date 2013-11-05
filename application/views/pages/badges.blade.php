@layout('templates.main')
@section('title')
	{{__('badges.pagetitle')}}
@endsection
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
		{{HTML::link('connect/session/facebook', __('security.subscribe').'(Facebook)', array('class' => 'btn'))}}
		{{HTML::link('connect/session/github', __('security.subscribe').'(Github)', array('class' => 'btn  btn-primary'))}}
		{{HTML::link('connect/session/linkedin', __('security.subscribe').'(Linkedin)', array('class' => 'btn'))}}
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
			<div class="col-md-10">
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
					
					@foreach($badgetypes as $badgetype)
						@if($badgetype->id==2)
							<li class="active"><a data-toggle="tab" href="#{{$badgetype->name}}">{{$badgetype->name}}</a></li>
						@else
							<li class><a data-toggle="tab" href="#{{$badgetype->name}}">{{$badgetype->name}}</a></li>
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
								<div class="row">
									<div class="col-md-6">
										<table class="table table-striped table-condensed">
											<caption>
												<span class="label label-info">Os mais novos</span>.
											</caption>
											<thead>
												<tr>
													<th width="10%"><center>Badge</center></th>
													<th width="15%"><center>Nome</center></th>
													<th width="45%"><center>Descrição</center></th>
													<th width="15%"><center>Solicite</center></th>
												</tr>
											</thead>
											<tbody>
									@foreach ($badgetype->newbadges() as $badgez)
									<?php $badge = Badge::find($badgez->id); ?>
												<tr>
													<td><center>
														<a href="{{URL::to('/badges/'.$badge->id)}}">
															{{HTML::image('img/badges/'.$badge->image, $badge->name, array('width' => '75', 'height' => '75', 'title' => $badge->name))}}</a></center></td>

													<td><center>{{HTML::link('badges/'.$badge->id, $badge->name. " (".count($badge->users).")")}}</center></td>
												<td>{{$badge->description}}</td>				
													<td><center>
						                    @if( Auth::check())
					                            @if(count($badge->users()->where('user_id', '=', $user->id)->get()) == 0)
													{{Form::open('badges', 'PUT')}}
													{{Form::hidden('badge_id', $badge->id)}}
													{{Form::submit(__('badges.request'),  array('class' => 'btn btn-mini btn-success'))}}
													{{Form::close()}}
												@else
													@if(count($badge->users()->where('user_id', '=', $user->id)->where('badge_user.active','=',0)->get()) == 0)
														{{Form::open('badges', 'DELETE')}}
														{{Form::hidden('badge_id', $badge->id)}}
														{{Form::submit(__('badges.remove'),  array('class' => 'btn btn-mini btn-danger'))}}
														{{Form::close()}}
													@else
															<span class="label">{{__('badges.approval')}}</span>									
													@endif
												@endif
						                    @else
						                       <a href="#unauthorizedModal" role="button" class="btn btn-mini btn-warning" data-toggle="modal">{{__('badges.request')}}</a>
						                    @endif</center>
												</td>
									@endforeach											
										</tr>
									</table>
									</div>	
									<div class="col-md-6">
										<table class="table table-striped table-condensed">
											<caption>
												<span class="label label-info">Os mais usados</span>.
											</caption>
											<thead>
												<tr>
													<th width="10%"><center>Badge</center></th>
													<th width="15%"><center>Nome</center></th>
													<th width="45%"><center>Descrição</center></th>
													<th width="15%"><center>Solicite</center></th>
												</tr>
											</thead>
											<tbody>											
									@foreach (Badgetype::topBadges($badgetype->id) as $badgez)
									<?php $badge = Badge::find($badgez->id); ?>
												<tr>
													<td><center>
														<a href="{{URL::to('/badges/'.$badge->id)}}">
															{{HTML::image('img/badges/'.$badge->image, $badge->name, array('width' => '75', 'height' => '75', 'title' => $badge->name))}}</a></center></td>

													<td><center>{{HTML::link('badges/'.$badge->id, $badge->name. " (".count($badge->users).")")}}</center></td>
												<td>{{$badge->description}}</td>				
													<td><center>
						                    @if( Auth::check())
					                            @if(count($badge->users()->where('user_id', '=', $user->id)->get()) == 0)
													{{Form::open('badges', 'PUT')}}
													{{Form::hidden('badge_id', $badge->id)}}
													{{Form::submit(__('badges.request'),  array('class' => 'btn btn-mini btn-success'))}}
													{{Form::close()}}
												@else
													@if(count($badge->users()->where('user_id', '=', $user->id)->where('badge_user.active','=',0)->get()) == 0)
														{{Form::open('badges', 'DELETE')}}
														{{Form::hidden('badge_id', $badge->id)}}
														{{Form::submit(__('badges.remove'),  array('class' => 'btn btn-mini btn-danger'))}}
														{{Form::close()}}
													@else
															<span class="label">{{__('badges.approval')}}</span>									
													@endif
												@endif
						                    @else
						                       <a href="#unauthorizedModal" role="button" class="btn btn-mini btn-warning" data-toggle="modal">{{__('badges.request')}}</a>
						                    @endif</center>
												</td>
									@endforeach											
										</tr>
									</table>
									</div>	

								</div>
						    </div>
					@endforeach
				</div>
			</div> <!-- /col-md-10 -->
			<div class="col-md-2">
				<div class="sidebar">
					<h3><span class="slash">{{__('badges.about')}}</span></h3>
					<p>{{__('badges.about1')}}</p>
					<p>{{__('badges.about2')}}</p>
				</div> <!-- /sidebar -->
			</div> <!-- /col-md-2 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection