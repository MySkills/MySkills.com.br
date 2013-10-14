@layout('templates.main')
@section('content')


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
			<div class="span10">
				<!-- TOP USERS -->
				<table class="table table-striped table-bordered table-condensed">
					<caption>
						<span class="label label-info">{{__('users.top_users')}}</span>.
					</caption>
					<thead>
						<tr>
							<th width="10%">{{__('users.picture')}}</th>
							<th width="10%">{{__('users.name')}}</th>				
							<th width="40%">{{__('users.badges')}}</th>
							<th width="10%">{{__('users.level')}}</th>
							<th width="10%">{{__('users.Points')}}</th>
						</tr>
					</thead>
					<tbody>

					@foreach ($users as $user)
					<tr>
						<td>
							{{HTML::image($user->getImageUrl('square'), $user->name, array('width' => 50, 'height'=>50, 'title' => $user->name))}}
						</td>
						<td>							
							{{HTML::link('users/'.$user->id, $user->name)}}
						</td>
						<td>
							{{$user->email}}
						</td>
						<td>
							{{$user->lastlogin}}
						</td>
						<td>
							@foreach ($user->partial_badges(8) as $badge)
								{{HTML::image('img/badges/'.$badge->image, $badge->name, array('width' => 50, 'height'=>50, 'title' => $badge->name))}}
							@endforeach
							@for ($i = 0; $i <= (7-count($user->activebadges)); $i++)
								{{HTML::image('img/badges/unlock100.png', 'Unlock', array('width' => 50, 'height'=>50, 'title' => 'Unlock'))}}
							@endfor
						</td>
						<td>{{$user->level}}</td>
						<td>{{$user->points}}</td>

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