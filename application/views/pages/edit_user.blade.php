@layout('templates.main')
@section('content')
<?php

if (Auth::check()) {
	$user = User::find(Auth::user()->id);
	$user->lastlogin = date('Y-m-d H:i:s');
	$user->save();
}
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
			</div> <!-- /span2 -->
			<div class="span8">

				<iframe width="640" height="360" src="http://www.youtube.com/embed/7pU5zuS25Gs?rel=0" frameborder="0" allowfullscreen></iframe>

				{{Form::open('users', 'PUT', array('class' =>'form-horizontal'))}}
					<div class="control-group">
						 <label class="control-label" for="name">Name</label>
						 <div class="controls">
      						{{Form::text('name', $user->name, array('id' => 'inputName', 'class' => 'span3'))}}
    					</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="name">e-Mail</label>
						<div class="controls">
							<input class="span3" id="inputIcon" type="email" name="email" required value="{{$user->email}}">
						</div>
					</div>
					<div class="control-group">
						 <label class="control-label" for="name">Nickname</label>
						 <div class="controls">
      						{{Form::text('nickname', $user->nickname, array('id' => 'inputNickname', 'class' => 'span3'))}}
    					</div>
					</div>

					<div class="control-group">
						 <label class="control-label" for="name">Video</label>
						 <div class="controls">
      						{{Form::text('video_url', $user->video_url, array('id' => 'inputVideo', 'class' => 'span3'))}}
    					</div>
					</div>
					<div class="control-group">
						 <label class="control-label" for="name">Freelancer(?)</label>
						 <div class="controls">
      						{{Form::checkbox('freelancer', $user->freelancer, $user->freelancer, array('id' => 'inputFreelancer', 'class' => 'span3'))}}
    					</div>
					</div>

					<div class="control-group">
						<div class="controls">
						{{Form::submit('Save', array('class' => 'btn btn-primary'))}}	
    					</div>
					</div>


				{{Form::close()}}
			</div> <!-- /span8 -->

			<div class="span2">
				<div class="sidebar">
					<h3><span class="slash">{{$user->active()}} User</span></h3>
					<p>{{__('user.badges_earned')}}</p>
						@foreach ($user->activebadges as $badge)
							{{HTML::image('img/badges/'.$badge->image,  $badge->name, array('width' => 50, 'height'=>50))}}
						@endforeach
						@for ($i = 0; $i <= (7-count($user->badges)); $i++)
							{{HTML::image('img/badges/unlock100.png', '', array('width' => 50, 'height'=>50))}}
						@endfor	
					<p>{{__('user.followers')}}</p>
						@foreach ($user->followers as $follower)
							{{HTML::image($follower->getImageUrl('large'),  $follower->name, array('width' => 50, 'height'=>50))}}
						@endforeach

				</div> <!-- /sidebar -->
			</div> <!-- /span2 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection