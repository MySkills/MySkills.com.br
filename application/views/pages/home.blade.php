@layout('templates.main')
@section('content')
<div class="row span12">
		<div class="btn-group offset3">
			{{HTML::link('/', __('home.listall'), array('class' => 'btn btn-success btn-large'))}}
			{{HTML::link('home/index/1', __('home.certified_devs'), array('class' => 'btn btn-success btn-large'))}}
			{{HTML::link('home/index/2', __('home.certified_managers'), array('class' => 'btn btn-success btn-large'))}}
			{{HTML::link('home/index/3', __('home.mobile_devs'), array('class' => 'btn btn-success btn-large'))}}
			{{HTML::link('home/index/4', __('home.scholars'), array('class' => 'btn btn-success btn-large'))}}
		</div>
</div>

	<div class="row boxback">
		<div class="span2">
				<div class="sidebar">
					<h3><span class="slash">{{__('users.join_us')}}</span></h3>
					<h3><span class="slash">{{__('home.weare')}}.: {{User::count()}}</span></h3>
					@if ( Auth::guest() )
						{{HTML::link('connect/session/facebook', __('home.sign-up').' (Facebook)', array('class' => 'btn btn-small btn-warning'))}}
						{{HTML::link('connect/session/github', '&nbsp;'. __('home.sign-up').' (Github) &nbsp;&nbsp;', array('class' => 'btn btn-small btn-warning'))}}
						{{HTML::link('connect/session/linkedin', __('home.sign-up').' (Linkedin)', array('class' => 'btn btn-small btn-warning'))}}
					@endif
					<p>{{__('users.about1')}}</p>
					<h4><span class="slash">{{__('users.new_users')}}</span></h4>
				<table>
					@foreach ($newUsers as $user)
					
					<tr>
						<td>
							<a href="{{URL::to('/users/'.$user->id)}}">
								{{HTML::image($user->getImageUrl('square'), $user->name, array('width' => 50, 'height'=>50, 'title' => $user->name))}}
							</a>
						</td>
						<td>
							@foreach ($user->partial_badges(1) as $badge)
								<a href="{{URL::to('/badges/'.$badge->id)}}">
									{{HTML::image('img/badges/'.$badge->image, $badge->name, array('width' => 50, 'height'=>50, 'title' => $badge->name))}}
								</a>
							@endforeach
							@for ($i = 1; $i <= (1-count($user->activebadges)); $i++)
								{{HTML::image('img/badges/unlock100.png', 'Unlock', array('width' => 50, 'height'=>50, 'title' => 'Unlock'))}}
							@endfor
						</td>
					</tr>
					@endforeach
				</table>

				<h4><span class="slash">{{__('badges.new_badges')}}</span></h4>
				<table>
					@foreach ($newBadges as $badge)
					
					<tr>
						<td>
							<a href="{{URL::to('/badges/'.$badge->id)}}">
								{{HTML::image('img/badges/'.$badge->image, $badge->name, array('width' => 75, 'height'=>75, 'title' => $badge->name))}}
							</a>
						</td>
					</tr>
					@endforeach
				</table>

				</div> <!-- /sidebar -->
		</div>
		<div class="span10" id="container">
			@foreach ($topUsers as $topUser)
			<?php
				$user = User::find($topUser->id);
				$technology_points = count($user->technologies);
				?>
				<div class="box">
					<a href="{{URL::to('/users/'.$user->id)}}">
						{{HTML::image($user->getImageUrl('large'), $user->name, array('width'=>'200', 'class'=>'dev', 'title' => $user->name, 'id' => 'profilepicture'))}}
					</a>
					<p>{{HTML::link('/users/'.$user->id, $user->name)}}<p>
						<div id="userlevel">
							<h5> {{__('user.level')}} {{$user->level}}<span class="arrow"></span> </h5>
						</div>
					<div class="progress progress-danger">
						<div class="bar" style="width: {{$user->life*3.33}}%;"><i class="icon-heart"></i> {{__('home.alwayshere')}}</div>
					</div>

					<div class="progress progress-info">
						@if(count($user->technologies) < 20)
							<div class="bar" style="width: {{count($user->technologies)*5}}%;"> <i class="icon-fire"></i> {{count($user->technologies)}}/20 {{__('home.nextlevel')}} </div>
						@elseif(count($user->technologies) < 60)
							<div class="bar" style="width: {{(count($user->technologies)-20)*2.5}}%;"> <i class="icon-fire"></i> {{count($user->technologies)-20}}/40 {{__('home.nextlevel')}}</div>
						@elseif(count($user->technologies) < 120)
							<div class="bar" style="width: {{(count($user->technologies)-60)*1.25}}%;"> <i class="icon-fire"></i> {{count($user->technologies)-20}}/80 {{__('home.nextlevel')}}</div>
						@else
 							<div class="bar" style="width: {{(count($user->technologies)-140)*0.625}}%;"> <i class="icon-fire"></i> {{count($user->technologies)-60}}/160 {{__('home.nextlevel')}}</div>
						@endif
					</div>
					@foreach ($user->partial_badges(4) as $badge)
						<a href="{{URL::to('/badges/'.$badge->id)}}">
							{{HTML::image('img/badges/'.$badge->image, $badge->name, array('width' => 30, 'height'=>30, 'title' => $badge->name))}}
						</a>
					@endforeach
					@for ($i = 0; $i <= (3-count($user->activebadges)); $i++)
						{{HTML::image('img/badges/unlock100.png', 'Unlock', array('width' => 30, 'height'=>30, 'title' => 'Unlock'))}}
					@endfor				
					<div class="pull-right">
					@if (count($user->technologies) <= 20)
						{{HTML::image('img/browserquest/'.'level1-mini.png',  __('user.level').' 1', array('width' => 24, 'height'=>24, 'title' =>__('user.level').' 1'))}}
					@elseif (count($user->technologies) <= 60)
						{{HTML::image('img/browserquest/'.'level2-mini.png',  __('user.level').' 2', array('width' => 24, 'height'=>24, 'title' => __('user.level').' 2'))}}					
					@else
						{{HTML::image('img/browserquest/'.'level3-mini.png',  __('user.level').' 3', array('width' => 24, 'height'=>24, 'title' => __('user.level').' 3'))}}
					@endif
						{{count($user->technologies)}} {{HTML::image('img/coin16.png', 'Coin')}}
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection