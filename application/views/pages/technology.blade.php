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
			<div class="span10">
				<table class="table table-striped table-bordered table-condensed">
					<caption>
						<span class="label label-info">Usuários ativos que mais fazem checkins nessa tecnologia.</span>.
					</caption>
					<thead>
						<tr>
							<th width="5%">{{__('users.picture')}}</th>
							<th width="20%">{{__('users.name')}}</th>
							<th width="75%">{{__('users.badges')}}</th>							
						</tr>
					</thead>
					<tbody>

					@foreach ($developers as $developer)
					<?php $developer = User::find($developer->id); ?>
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
							@foreach ($developer->partial_badges(12) as $badge)
								{{HTML::image('img/badges/'.$badge->image, $badge->name, array('width' => 50, 'height'=>50, 'title' => $badge->name))}}
							@endforeach
							@for ($i = 0; $i <= (11-count($developer->activebadges)); $i++)
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
					<h3><span class="slash">About Technologies</span></h3>
					<p>
					Here you will find information about the most frequently asked questions. Do you also have a question? Get in touch with us and we will be really glad to answer it.</p>
				</div> <!-- /sidebar -->
			</div> <!-- /span2 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection