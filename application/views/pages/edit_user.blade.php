@layout('templates.main')
@section('content')
<?php 

Locate::refresh();
echo 'Service Used: ' . Locate::get('service') . "<br>";
echo 'Timestamp: ' . Locate::get('timestamp') . "<br>";
echo 'IP: ' . Locate::get('ip') . "<br>";
echo 'City: ' . Locate::get('city') . "<br>";
echo 'State: ' . Locate::get('state') . "<br>";
echo 'State Acronym: ' . Locate::get('state_code') . "<br>";
echo 'Country: ' . Locate::get('country') . "<br>";
echo 'Country Acronym: ' . Locate::get('country_code') . "<br>";
echo 'Zipcode: ' . Locate::get('zipcode') . "<br>";
echo 'Latitude: ' . Locate::get('lat') . "<br>";
echo 'Longitude: ' . Locate::get('lng') . "<br>";

?>

<?php $user = User::find(Auth::user()->id) ?>
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
			<div class="span8">
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
					  		<input class="span3" id="inputIcon" type="email" required value="{{$user->email}}">
						</div>
					</div>

					<div class="control-group">
						 <label class="control-label" for="name">Video</label>
						 <div class="controls">
      						{{Form::text('video_url', $user->video_url, array('id' => 'inputVideo', 'class' => 'span3'))}}
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