@layout('templates.main')
@section('content')
<div id="subheader">
	<div class="inner">
		<div class="container">
			<h1>{{$technology->name}}</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->
<div id="subpage">	
	<div class="container">
		<div class="row">
			<div class="span3">
				<ul class="nav nav-pills nav-stacked">
					@foreach($technologies as $tech)
						@if($tech->id == $technology->id)
							<li class="active">{{HTML::link('technology/'.$tech->id, $tech->name . "(" . $tech->total . ")")}}</li>
						@else
							<li>{{HTML::link('technology/'.$tech->id, $tech->name . "(" . $tech->total . ")")}}</li>
						@endif
					@endforeach
				</ul>
			</div> <!-- /span10 -->
			<div class="span7">
				<table class="table table-striped table-bordered table-condensed">
					<caption><h2>{{$technology->name}}</h2>
						<span class="label label-info">{{__('technology.topactive')}}</span>.
					</caption>
					<thead>
						<tr>
							<th width="5%">{{__('users.picture')}}</th>
							<th width="20%">{{__('users.name')}}</th>
							<th width="5%">{{__('users.checkins')}}</th>							
							<th width="70%">{{__('users.badges')}}</th>							
						</tr>
					</thead>
					<tbody>

					@foreach ($developers as $developer)
					<?php 
					$techpoints = $developer->techpoints;
					$developer = User::find($developer->id); 
					?>
					<tr>
						<td>
							<a href="{{URL::to('/users/'.$developer->id)}}">
								{{HTML::image($developer->getImageUrl('square'), $developer->name, array('width' => 50, 'height'=>50, 'title' => $developer->name))}}
							</a>
						</td>
						<td>
							{{HTML::link('users/'.$developer->id, $developer->name)}}
						</td>
						<td>
							{{$techpoints}}
						</td>						
						<td>
							@foreach ($developer->partial_badges(7) as $badge)
								{{HTML::image('img/badges/'.$badge->image, $badge->name, array('width' => 50, 'height'=>50, 'title' => $badge->name))}}
							@endforeach
							@for ($i = 0; $i <= (6-count($developer->activebadges)); $i++)
								{{HTML::image('img/badges/unlock100.png', 'Unlock', array('width' => 50, 'height'=>50, 'title' => 'Unlock'))}}
							@endfor
						</td>
					</tr>
					@endforeach
					</tbody>
				</table>

			</div> <!-- /span10 -->
			<div class="span2">
				<div class="sidebar">
					<h3>{{__('technology.about')}}</h3>
					<p>{{__('technology.about1')}}</p>
				</div> <!-- /sidebar -->
			</div> <!-- /span2 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection