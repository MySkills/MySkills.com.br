@layout('templates.main')
@section('content')
<div id="unauthorizedModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">{{__('security.unauthorized')}}</h3>
  </div>
  <div class="modal-body">
    <p>{{__('security.needsign')}}</p>
		{{HTML::link('connect/session/facebook', __('security.subscribe').'(Facebook)', array('class' => 'btn'))}}
		{{HTML::link('connect/session/github', __('security.subscribe').'(Github)', array('class' => 'btn  btn-primary'))}}
		{{HTML::link('connect/session/linkedin', __('security.subscribe').'(Linkedin)', array('class' => 'btn '))}}
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">{{__('security.close')}}</button>
  </div>
</div>
<div id="subheader">	
	<div class="inner">
		<div class="container">
			<h1>{{$badge->name}}</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->

<div id="subpage">
	<div class="container">
		<div class="row">		
			<div class="span1">
				{{HTML::image('img/badges/'.$badge->image, $badge->name, array('width' => '100', 'height' => '100'))}}

			</div> <!-- /span2 -->
			<div class="span2">
				<p>{{$badge->name}} - {{$badge->issuer->name}} </p>
				<p>{{$badge->description}}</p>
			</div> <!-- /span4 -->
			<div class="span7">
				<table class="table table-striped table-bordered table-condensed">
					<caption>
						<span class="label label-info">{{count($badge->users)." ". __('badges.topactive')}}</span>.
					</caption>
					<thead>
						<tr>
							<th width="10%">{{__('users.picture')}}</th>
							<th width="20%">{{__('users.name')}}</th>
							<th width="5%">{{__('users.level')}}</th>
							<th width="5%">{{__('users.points')}}</th>
							<th width="650%">{{__('users.badges')}}</th>
						</tr>
					</thead>
					<tbody>

					@foreach ($developers as $developer)
					<?php 
					$dev = User::find($developer->id); 
					?>
					<tr>
						<td>
							<a href="{{URL::to('/users/'.$developer->id)}}">
								{{HTML::image($dev->getImageUrl('square'), $dev->name, array('width' => 50, 'height'=>50, 'title' => $dev->name))}}
							</a>
						</td>
						<td>
							{{HTML::link('users/'.$dev->id, $dev->name)}}
						</td>
						<td>
							{{$dev->limitedUser()->limitedlevel}}
						</td>
						<td>
							{{$developer->rank}}
						</td>						
						<td>
							@foreach ($dev->partial_badges(6) as $badge)
								<a href="{{URL::to('/badges/'.$badge->id)}}">
									{{HTML::image('img/badges/'.$badge->image, $badge->name, array('width' => 50, 'height'=>50, 'title' => $badge->name))}}
								</a>
							@endforeach
							@for ($i = 0; $i <= (5-count($dev->activebadges)); $i++)
								{{HTML::image('img/badges/unlock100.png', 'Unlock', array('width' => 50, 'height'=>50, 'title' => 'Unlock'))}}
							@endfor
						</td>
					</tr>
					@endforeach
					</tbody>
				</table>


			</div> <!-- /span5 -->
			<div class="span2">
				<div class="sidebar">
					<h3><span class="slash">Badge</span></h3>									
	                    @if( Auth::check())
                            @if(count($badge->users()->where('user_id', '=', Auth::user()->id)->get()) == 0)
								{{Form::open('badges', 'PUT')}}
								{{Form::hidden('badge_id', $badge->id)}}
								{{Form::submit(__('badges.request'),  array('class' => 'btn btn-small btn-success'))}}
								{{Form::close()}}
							@else
								@if(count($badge->users()->where('user_id', '=', Auth::user()->id)->where('badge_user.active','=',0)->get()) == 0)
									{{Form::open('badges', 'DELETE')}}
									{{Form::hidden('badge_id', $badge->id)}}
									{{Form::submit(__('badges.remove'),  array('class' => 'btn btn-small btn-danger'))}}
									{{Form::close()}}
								@else
										<span class="label">{{__('badges.approval')}}</span>									
								@endif
							@endif
	                    @else
	                       <a href="#unauthorizedModal" role="button" class="btn btn-small btn-warning" data-toggle="modal">{{__('badges.request')}}</a>
	                    @endif							
				</div> <!-- /sidebar -->
			</div> <!-- /span4 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection