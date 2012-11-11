@layout('templates.main')
@section('content')
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Refer a user for this job position</h3>
  </div>
  <div class="modal-body">
    <p>(Coming Soon…)</p>
    <p>Here you can add a reference for a social network profile of a developer
    	who is not a user from MySkills. It might be a friend of yours. A colleague
    	or even a technical speaker that you think might be the best fit for this position.</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
<div id="subheader">	
	<div class="inner">
		<div class="container">
			<h1>Jobs</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->
<div id="subpage">
	<div class="container">
		<div class="row">		
			<div class="span10">
					<table class="table table-striped table-condensed">
						<caption>
							These are our Job Opportunities.
						</caption>
						<thead>
							<tr>
								<th width="10%">Title</th>
								<th width="65%">Description</th>
								<th width="10%">Candidates</th>	
								<th width="15%">Action</th>						
							</tr>
						</thead>
						<tbody>
						<?php $jobs = Job::order_by('created_at', 'desc')->get(); ?>
						@foreach ($jobs as $job)
						<tr>
							<td>{{$job->title}}</td>
							<td>{{$job->description}}</td>
							<td>{{count($job->candidates)}}</td>							
							<td>
								
								<div class="btn-group">
								  <a class="btn btn-mini btn-info dropdown-toggle" data-toggle="dropdown" href="#">
								    Choose Action
								    <span class="caret"></span>
								  </a>
								  <ul class="dropdown-menu">
								    <!-- dropdown menu links -->
								    <li><a href="">Apply for this job</a></li>								    
								    <li>
								    	{{HTML::link('#myModal',
											'Refer a User', array('data-toggle' => 'modal'))}}
								    </li>								    
								  </ul>
								</div>													
							</td>							
                 		</tr>
              			@endforeach     
						</tbody>
					</table>
			</div> <!-- /span8 -->
			<div class="span2">
				<div class="sidebar">
					<h3><span class="slash">About our Jobs</span></h3>
					<p>
					Here you have access to Job Opportunities.</p>
					<p><strong>ACTION</strong> - Click the Apply button
						to apply for the jobs you want.</p>
					<p><strong>Status</strong> - Define your status 
						for each job position.</p>
						<ul>
							<li><span class="label">APPLIED</span></li>
							<li><span class="label label-info">REVIEWING</span></li>
							<li><span class="label label-success">APPROVED</span></li>
						</ul>
								
				
				</div> <!-- /sidebar -->
			</div> <!-- /span4 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection