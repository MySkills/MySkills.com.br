@layout('templates.main')
@section('content')
<?php
	$topusers = DB::query("SELECT
		U.id, U.name name, SUM(B.points) rank
	FROM
		users U, badges B, badge_user BU
	WHERE
		U.id = BU.user_id AND
		B.id = BU.badge_id
	GROUP BY
		U.name
	order by rank desc, U.created_at desc");

	$newusers = User::order_by('created_at', 'desc')->take(count($topusers))->get();

	if (Auth::check()) {
	  $user = User::find(Auth::user()->id);
	  $user->lastlogin = date('Y-m-d H:i:s');
	  $user->save();
	}

?>


<div id="subheader">	
	<div class="inner">
		<div class="container">
			<h1>{{__('users.badcode')}}</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->
<div id="subpage">
	<div class="container">
		<div class="row">		
			<div class="span5">

				<!-- NEW USERS -->
				<table class="table table-striped table-bordered table-condensed">
					<caption>
						<span class="label label-info">{{__('users.new_users')}}</span>.
					</caption>
					<thead>
						<tr>
							<th width="10%">{{__('users.picture')}}</th>
							<th width="20%">{{__('users.name')}}</th>
							<th width="60%">{{__('users.badges')}}</th>
							<th width="10%">{{__('users.Points')}}</th>
						</tr>
					</thead>
					<tbody>

					@foreach ($newusers as $user)
					<tr>
						<td>
							{{HTML::image($user->getImageUrl('square'), $user->name, array('width' => 50, 'height'=>50))}}
						</td>
						<td>
							{{HTML::link('users/'.$user->id, $user->name)}}
						</td>
						<td>
							@foreach ($user->partial_badges(4) as $badge)
								{{HTML::image('img/badges/'.$badge->image, $badge->name, array('width' => 50, 'height'=>50))}}
							@endforeach
							@for ($i = 0; $i <= (3-count($user->activebadges)); $i++)
								{{HTML::image('img/badges/unlock100.png', ' ', array('width' => 50, 'height'=>50))}}
							@endfor
						</td>
						<td>{{$user->getpoints()}}</td>
					</tr>
					@endforeach
					</tbody>
				</table>
			</div>
			<div class="span5">
				<!-- TOP USERS -->
				<table class="table table-striped table-bordered table-condensed">
					<caption>
						<span class="label label-info">{{__('users.top_users')}}</span>.
					</caption>
					<thead>
						<tr>
							<th width="10%">{{__('users.picture')}}</th>
							<th width="20%">{{__('users.name')}}</th>
							<th width="60%">{{__('users.badges')}}</th>
							<th width="10%">{{__('users.Points')}}</th>
						</tr>
					</thead>
					<tbody>

					@foreach ($topusers as $quser)
					<?php
						$user = User::find($quser->id);
					?>
					<tr>
						<td>
							{{HTML::image($user->getImageUrl('square'), $user->name, array('width' => 50, 'height'=>50))}}
						</td>
						<td>
							{{HTML::link('users/'.$user->id, $user->name)}}
						</td>
						<td>
							@foreach ($user->partial_badges(4) as $badge)
								{{HTML::image('img/badges/'.$badge->image, $badge->name, array('width' => 50, 'height'=>50))}}
							@endforeach
							@for ($i = 0; $i <= (3-count($user->activebadges)); $i++)
								{{HTML::image('img/badges/unlock100.png', ' ', array('width' => 50, 'height'=>50))}}
							@endfor
						</td>
						<td>{{$user->getpoints()}}</td>
					</tr>
					@endforeach
					</tbody>
				</table>

			</div> <!-- /span8 -->
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
			</div> <!-- /span4 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->
@endsection