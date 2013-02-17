@layout('templates.main')
@section('content')
	<div class="row boxback">
		<div class="span2">
				<div class="sidebar">
					<h3><span class="slash">{{__('users.join_us')}}</span></h3>
					@if ( Auth::guest() )
						{{HTML::link('connect/session/facebook', __('home.sign-up').' (Facebook)', array('class' => 'btn btn-small btn-warning'))}}
						{{HTML::link('connect/session/github', '&nbsp;'. __('home.sign-up').' (Github) &nbsp;&nbsp;', array('class' => 'btn btn-small btn-warning'))}}
						{{HTML::link('connect/session/linkedin', __('home.sign-up').' (Linkedin)', array('class' => 'btn btn-small btn-warning'))}}
					@endif
					<p>{{__('users.about1')}}</p>
				</div> <!-- /sidebar -->
		</div>
		<div class="span11" id="container">
			@foreach ($topUsers as $topUser)
			<?php $user = User::find($topUser->id); ?>
				<div class="box">
					{{HTML::image($user->getImageUrl('large'), $user->name, array('width'=>'200', 'class'=>'dev'))}}
					<p>{{HTML::link('/users/'.$user->id, $user->name)}}<p>
					<div class="progress progress-success">
					  <div class="bar" style="width: 100%;">Vida: 100%</div>
					</div>
					<div class="progress progress-info">
					  <div class="bar" style="width: 100%;">Experiência: 100%</div>
					</div>

					@foreach ($user->partial_badges(5) as $badge)
						{{HTML::image('img/badges/'.$badge->image, $badge->name, array('width' => 30, 'height'=>30))}}
					@endforeach
					@for ($i = 0; $i <= (4-count($user->activebadges)); $i++)
						{{HTML::image('img/badges/unlock100.png', ' ', array('width' => 30, 'height'=>30))}}
					@endfor				
				</div>
			@endforeach
		</div>
	</div>
@endsection