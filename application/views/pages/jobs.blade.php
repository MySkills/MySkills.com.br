@layout('templates.main')
@section('content')
<!-- Modal -->
<div id="addJobModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Add a New Job Position</h3>
</div>
@if( Auth::check())
	<div class="modal-body">
	    <p>Describe the new job position for your company.</p>
		{{Form::open('jobs/'.Auth::user()->id, 'PUT')}}
		{{Form::label('title', 'Job Title')}}
		{{Form::text('title', '',array('class' =>'input-xxlarge'))}}
		{{Form::label('description', 'Job Description')}}		
		{{Form::textarea('description','',array('class' =>'input-xxlarge'))}}
		{{Form::submit('Submit', array('class' => 'btn-primary'))}}
		{{Form::close()}}	
  	</div>
  	<div class="modal-footer">
    	<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
  	</div>
@else
	<div class="modal-body">
	    <p>You are not authenticated</p>
  	</div>
  	<div class="modal-footer">
    	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  	</div>
@endif  
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
            <div class="span2">
              <div class="sidebar">
                <h3><span class="slash">Add New Job</span></h3>
                <p>Add a new job position for your company right now.</p>
				@if( Auth::guest() )    
					{{Form::submit('Sign-Up to Submit')}}
				@else
                    <a href="#addJobModal" role="button" class="btn btn-primary" data-toggle="modal">Add a New Job</a>
				@endif

              </div> <!-- /sidebar -->
            </div> <!-- /span2 -->			
			<div class="span8">
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
						Apply for one of the Job Opportunities below.
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
							@if( Auth::guest() )    
								<td>
									{{count($job->candidates)}}
								</td>							
								<td>
									{{Form::submit('Sign-Up to Apply')}}
								</td>								
							@else
								@if($job->recruiter_id == Auth::user()->id)
									<td>
										{{count($job->candidates)}}
									</td>							
									<td>
										{{Form::open('jobs/'.$job->id, 'DELETE')}}
										{{Form::submit('DELETE')}}
										{{Form::close()}}	
									</td>									
								@else
									<td>
										{{count($job->candidates)}}
									</td>							
									<td>
			                            @if(count($job->candidates()->where('user_id', '=', Auth::user()->id)->get()) == 0)
											{{Form::open('jobs/'.$job->id.'/'.Auth::user()->id, 'PUT')}}
											{{Form::submit('Apply for this job')}}
											{{Form::close()}}	
										@else
											<span class="label">You Applied</span>
										@endif
									</td>
								@endif
							@endif
						
             			</tr>
             			@if( Auth::check() ) 
							@if($job->recruiter_id == Auth::user()->id)                 		
		                 		<tr>
		                 			<td colspan=4>                     		
		                 			<div class="row-fluid">
		               					@foreach ($job->candidates as $user)
		                 			 		<div class="span1">
		                 			 			<img src="{{$user->getImageUrl('square')}}" width="50" class="img-polaroid">
		                   						@if($user->social_url != '')
													{{HTML::link($user->social_url, $user->name)}}
												@else
													@if($user->provider == 'facebook')
														{{HTML::link('http://www.facebook.com/'.$user->uid, $user->name)}}
													@endif
												@endif
											</div>
		               					@endforeach
		               				</div>
									</td>                   				
		                 		</tr>                   			
							@endif  
						@endif           		
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
							<li><span class="label">You Applied</span></li>
							<li><span class="label label-info">Recruiter Reviewing</span></li>
							<li><span class="label label-success">Recruiter Approved</span></li>
						</ul>
								
				
				</div> <!-- /sidebar -->
			</div> <!-- /span4 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection