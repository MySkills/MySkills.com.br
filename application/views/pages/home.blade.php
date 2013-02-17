@layout('templates.main')
@section('content')
<div class="row">
	<div class="span6">
		<div id="container">
		@foreach ($newUsers as $user)
			<div class="box">
				{{HTML::image($user->getImageUrl('large'), $user->name, array('width'=>'190', 'class'=>'dev'))}}
				<p>{{HTML::link('/users/'.$user->id, $user->name)}}<p>
				@foreach ($user->partial_badges(6) as $badge)
					{{HTML::image('img/badges/'.$badge->image, $badge->name, array('width' => 30, 'height'=>30))}}
				@endforeach
				@for ($i = 0; $i <= (5-count($user->activebadges)); $i++)
					{{HTML::image('img/badges/unlock100.png', ' ', array('width' => 30, 'height'=>30))}}
				@endfor				
			</div>
		@endforeach
		</div>
	</div>
	<div class="span6">
		<div id="container">
		@foreach ($topUsers as $topUser)
		<?php $user = User::find($topUser->id); ?>
			<div class="box">
				{{HTML::image($user->getImageUrl('large'), $user->name, array('width'=>'190', 'class'=>'dev'))}}
				<p>{{HTML::link('/users/'.$user->id, $user->name)}}<p>
				@foreach ($user->partial_badges(6) as $badge)
					{{HTML::image('img/badges/'.$badge->image, $badge->name, array('width' => 30, 'height'=>30))}}
				@endforeach
				@for ($i = 0; $i <= (5-count($user->activebadges)); $i++)
					{{HTML::image('img/badges/unlock100.png', ' ', array('width' => 30, 'height'=>30))}}
				@endfor				
			</div>
		@endforeach
		</div>
	</div>

</div>
@endsection