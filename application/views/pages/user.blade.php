@layout('templates.main')
@section('content')
<?php $user = User::find($permalink); ?>

<?php

$facebook = IoC::resolve('facebook-sdk');
var_dump($facebook);
$uid = $facebook->getUser();
var_dump($uid);

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
             @if(count($user->followers()->where('user_id', '=', $user->id)->get()) == 0)
				{{Form::open('followers', 'PUT')}}
				{{Form::hidden('user_id', $user->id)}}
				{{Form::submit(__('user.follow'), array('class' => 'btn btn-mini btn-warning'))}}
				{{Form::close()}}
			@else
				{{Form::open('followers', 'DELETE')}}
				{{Form::hidden('user_id', $user->id)}}
				{{Form::submit(__('user.unfollow'), array('class' => 'btn btn-mini btn-primary'))}}
				{{Form::close()}}

			@endif
			</div> <!-- /span2 -->
			<div class="span4">

				.
			</div> <!-- /span4 -->
			<div class="span4">
				<h3>Friends</h3>.
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
					<p>{{__('user.followers')}}</p>
						@foreach ($user->followers as $follower)
							{{HTML::image($follower->getImageUrl('large'),  $follower->name, array('width' => 50, 'height'=>50))}}
						@endforeach

				</div> <!-- /sidebar -->
			</div> <!-- /span4 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection