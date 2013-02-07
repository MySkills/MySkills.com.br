@layout('templates.main')
@section('content')
<?php $technology = Technology::find(1); ?>
<?php $pivot = $technology->users()->pivot(); ?>

<div id="subheader">	
	<div class="inner">
		<div class="container">
			<h1>Skills</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->
<div id="subpage">
	<div class="container">
		<div class="row">		
			<div class="span2">
				<div class="sidebar">
					<h3><span class="slash">PHP Laravel Developers</span></h3>
					<p>{{HTML::image('/img/'.$technology->image,  $technology->name, array('width' => 100, 'height'=>75))}}						
					We are developing MySkills with a new PHP web framework called Laravel. Therefore, we are
					inviting Laravel developers to become the first Beta Users of our 
					<a href="https://build.phonegap.com/apps/224373/share" target="_blank">Mobile App</a> proving
					feedback about who are coding with Laravel everyday.</p>
				</div> <!-- /sidebar -->
			</div> <!-- /span2 -->
			<div class="span8">
			<div class="btn-toolbar">
				<div class="btn-group">
				  <button class="btn">Android</button>
				  <button class="btn">BlackBerry</button>
				  <button class="btn">iOS</button>
				</div>

				<div class="btn-group">
				  <button class="btn">PHP</button>
				  <button class="btn">Code Igniter</button>
				  <button class="btn">Laravel</button>
				  <button class="btn">Yii</button>
				  <button class="btn">Zend</button>				  
				</div>

				<div class="btn-group">
				  <button class="btn">Python</button>
				  <button class="btn">Django</button>
				</div>

				<div class="btn-group">
				  <button class="btn">Ruby</button>					
				  <button class="btn">Rails</button>
				</div>

				<div class="btn-group">
				  <button class="btn">Javascript</button>					
				  <button class="btn">Node</button>
				</div>

				<div class="btn-group">
				  <button class="btn">HTML 5</button>
				</div>

				<div class="btn-group">
				  <button class="btn">MongoDB</button>
				</div>

			</div>

				<table class="table table-striped table-condensed">
					<tr>
						<td>						
							<p>Using our <a href="https://build.phonegap.com/apps/224373/share" target="_blank">Mobile App</a> 
							developers can use daily checkins to provide feedback about technologies and skills
							that they are putting in practice. Below you have a list of developers coding with.: {{$technology->name}} - {{$technology->description}}<p>
							<p> Read more about the <strong>Gamification of Laravel Learning and Use with Daily Checkins</strong> at the <a href="http://forums.laravel.com/viewtopic.php?id=3523" target="_blank">Official Laravel Forum</a></p>

						</td>
						<td>
							
						</td>
					</tr>

				</table>
						
				<table class="table table-striped table-condensed">
					<caption>

					</caption>
					<thead>
						<tr>
							<th width="10%">Picture</th>
							<th width="20%">Name</th>
							<th width="40%">Technology</th>					
							<th width="20%">Checkin</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($technology->users as $user)
					<tr>
						<td>
							{{HTML::image($user->getImageUrl('square'),  $user->name)}}
						</td>
						<td>
							{{HTML::link('users/'.$user->id, $user->name)}}
						</td>
						<td>
							{{$technology->name}} - {{$technology->description}}
						</td>
						<?php $date = date_create($user->pivot->checkin_at); ?>
						<td>{{date_format($date, 'jS F Y')}}</td>
             		</tr>
          			@endforeach     
					</tbody>
				</table>
			</div> <!-- /span8 -->
			<div class="span2">
				<div class="sidebar">
					<h3><span class="slash">About Skills</span></h3>
					<p>
					Here you will find a set of Skills, Frameworks and Technologies that developers
					use everyday. With our mobile application you can checkin daily on your skills and provide
					information about which skills are you putting in practice.</p>
				</div> <!-- /sidebar -->
			</div> <!-- /span2 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection