@layout('templates.main')
@section('content')
<div id="subheader">	
	<div class="inner">
		<div class="container">
			<h1>Badges</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->
<div id="subpage">
	<div class="container">
		<div class="row">		
			<div class="span10">					
					<table class="table table-striped table-condensed">
						<caption>
							Choose your next professional achievement!!! :)
						</caption>
						<thead>
							<tr>
								<th width="10%">Badge</th>
								<th width="10%">Points</th>
								<th width="10%">Name</th>								
								<th width="60%">Description</th>
								<th width="10%">Issuer</th>								
							</tr>
						</thead>
						<tbody>
						<?php $badges = Badge::order_by('points', 'asc')->get(); ?>
						@foreach ($badges as $badge)
						<tr>
							<td><img src="img/badges/{{$badge->image}}" width="75" height="75"></td>
							<td>{{$badge->points}}</td>
							<td>{{$badge->name}}</td>
							<td>{{$badge->description}}</td>
							<td>{{$badge->issuer->name}}</td>							
                 		</tr>
              			@endforeach     
						</tbody>
					</table>
			</div> <!-- /span10 -->
			<div class="span2">
				<div class="sidebar">
					<h3><span class="slash">About Badges</span></h3>
					<p>
					Here you not only say that you know something.
					We prepared an achievement ranking system where you
					can receive badges and points to improve your profile.
					</p>
					<p>In the near future, recruiters will use badges and
						achievements as a pre-condition to apply for a job.
					</p>
				</div> <!-- /sidebar -->
			</div> <!-- /span2 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection