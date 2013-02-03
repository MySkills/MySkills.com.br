@layout('templates.main')
@section('content')
<?php $user = User::find($permalink); ?>
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
                    <a href="#" role="button" class="btn btn-warning btn-mini" data-toggle="modal"><i class="icon-envelope"></i> Message Me (Coming Soon)</a>
			</div> <!-- /span2 -->
			<div class="span4">
				.
			</div> <!-- /span4 -->
			<div class="span4">
				.
			</div> <!-- /span4 -->

			<div class="span2">
				<div class="sidebar">
					<h3><span class="slash">{{$user->active()}} User</span></h3>
					<p>Badges earned</p>
						@foreach ($user->activebadges as $badge)
							{{HTML::image('img/badges/'.$badge->image,  $badge->name, array('width' => 50, 'height'=>50))}}
						@endforeach
						@for ($i = 0; $i <= (7-count($user->badges)); $i++)
							{{HTML::image('img/badges/unlock100.png', '', array('width' => 50, 'height'=>50))}}
						@endfor	
				</div> <!-- /sidebar -->
			</div> <!-- /span4 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection