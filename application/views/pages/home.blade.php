@layout('templates.main')
@section('content')
	<div class="row boxback">
		<div class="span12" id="container">
			@foreach ($topUsers as $topUser)
			<?php $user = User::find($topUser->id); ?>
				<div class="box">
					{{HTML::image($user->getImageUrl('large'), $user->name, array('width'=>'170', 'class'=>'dev'))}}
					<p>{{HTML::link('/users/'.$user->id, $user->name)}}<p>
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