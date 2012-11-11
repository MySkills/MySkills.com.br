@layout('templates.main')
@section('content')
<!-- Modal -->
<div id="referModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Refer a user for this job position</h3>
  </div>
  <div class="modal-body">
    <p>(Coming Soon…)</p>
    <p>You know the right person for this job position?
    	Here you will have the opportunity to refer a colleague
    	or friend.</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
<div id="applyModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Apply for the Job</h3>
  </div>
  <div class="modal-body">
    <p>(Coming Soon…)</p>
    <p>Here you can apply for this job and describe and
    	describe how you can use your skills to help this company.</p>
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
				@if(Session::get('status'))
					@if(Session::get('status')=='ERROR')
						<div class="alert alert-error">
					@else
						<div class="alert alert-success">
					@endif					
						 <button type="button" class="close" data-dismiss="alert">×</button>
	   					<strong>{{Session::get('status')}}</strong>
					</div>
				@endif
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
								@if( Auth::guest() )    
									{{Form::submit('Sign-Up to Apply')}}
								@else
		                            @if(count($job->candidates()->where('user_id', '=', Auth::user()->id)->get()) == 0)
										{{Form::open('jobs/'.$job->id.'/'.Auth::user()->id, 'PUT')}}
										{{Form::submit('Apply for this job')}}
										{{Form::close()}}	
									@else
										<span class="label">You Applied</span>
									@endif
								@endif
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