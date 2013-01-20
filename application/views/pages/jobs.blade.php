@layout('templates.main')
@section('content')
<div id="unauthorizedModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"> {{__('security.unauthorized')}} </h3>
  </div>
  <div class="modal-body">
    <p>{{__('security.needsign')}}</p>
		{{HTML::link('connect/session/facebook',
		__('security.subscribe').'(Facebook)', array('class'
		  => 'btn btn-large'))}}
		{{HTML::link('connect/session/github',
		__('security.subscribe').'(Github)', array('class'
		  => 'btn btn-large btn-primary'))}}
		{{HTML::link('connect/session/linkedin',
		__('security.subscribe').'(Linkedin)', array('class'
		  => 'btn btn-large'))}}
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
<!-- Modal -->
<div id="addJobModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">{{__('jobs.addjob')}}</h3>
</div>
@if( Auth::check())
	<div class="modal-body">
	    <p>{{__('jobs.describe')}}</p>
{{--
		{{Form::open('jobs/'.Auth::user()->id, 'PUT')}}
		{{Form::label('title', __('jobs.jobtitle'))}}
		{{Form::text('title', '',array('class' =>'input-xxlarge', 'placeholder' =>__('jobs.jobtitle')))}}
		{{Form::label('description', 'Job Description')}}		
		{{Form::textarea('description','',array('class' =>'input-xxlarge'))}}
		{{Form::submit('Submit', array('class' => 'btn-primary'))}}
		{{Form::close()}}	
--}}
		{{Form::open('jobs/'.Auth::user()->id, 'PUT',array('class' =>'form-horizontal'))}}
		<div class="control-group" >
			<label class="control-label" for="inputEmail">{{__('jobs.the')}}</label>
			<div class="controls">
				{{Form::text('company', '',array('class' =>'input-medium', 'placeholder' => __('jobs.company')))}} 
			</div>
		</div>
		<div class="control-group" >
			<label class="control-label" for="inputEmail">{{__('jobs.ishiring')}}</label>			
			<div class="controls">				
				{{Form::text('title', '',array('class' =>'input-medium', 'placeholder' => __('jobs.jobtitle')))}}
			</div>
		</div>			
		<div class="control-group" >		
			<label class="control-label" for="inputEmail">{{__('jobs.responsiblefor')}}</label>
			<div class="controls">
				{{Form::text('description', '',array('class' =>'input-xlarge', 'placeholder' => __('jobs.responsibilities')))}}
			</div>
		</div>			
		<div class="control-group" >
			<label class="control-label" for="inputEmail">{{__('jobs.weprovide')}}</label>
			<div class="controls">								
				{{Form::text('benefits', '',array('class' =>'input-xlarge', 'placeholder' => __('jobs.benefits')))}}	
			</div>
		</div>			
		<div class="control-group" >		
			<div class="controls">				
				{{Form::submit(__('jobs.submit'), array('class' => 'btn-primary'))}}
				{{Form::close()}}			
			</div>
		</div>
		<span class="label label-info">{{__('jobs.example')}}:</span>
		<i> 			
			{{__('jobs.the')}}
			<strong>MYSKILLS</strong> {{__('jobs.ishiring')}}
			<strong>{{__('jobs.mobiledeveloper')}}</strong> {{__('jobs.responsiblefor')}}
			<strong>{{__('jobs.apps')}}</strong>. {{__('jobs.weprovide')}}
			<strong>{{__('jobs.salary')}}</strong>
			<strong></strong>						
		</i>
  	</div>
  	<div class="modal-footer">
    	<button class="btn" data-dismiss="modal" aria-hidden="true">{{__('jobs.cancel')}}</button>
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
			<h1>{{__('jobs.jobs')}}</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->
<div id="subpage">
	<div class="container">
		<div class="row">		
            <div class="span2">
              <div class="sidebar">
                <h3><span class="slash">{{__('jobs.addjob')}}</span></h3>
                <p>{{__('jobs.adddescription')}}</p>
				@if( Auth::guest() )    
					<a href="#unauthorizedModal" role="button" class="btn btn-warning" data-toggle="modal">{{__('jobs.addjob')}}</a>
				@else
                    <a href="#addJobModal" role="button" class="btn btn-primary" data-toggle="modal">{{__('jobs.addjob')}}</a>
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
							<th width="10%">{{__('jobs.company')}}</th>
							<th width="10%">{{__('jobs.jobtitle')}}</th>
							<th width="30%">{{__('jobs.responsibilities')}}</th>
							<th width="30%">{{__('jobs.benefits')}}</th>
							<th width="10%">{{__('jobs.candidates')}}</th>	
							<th width="10%">{{__('jobs.action')}}</th>						
						</tr>
					</thead>
					<tbody>
					<?php $jobs = Job::order_by('created_at', 'desc')->get(); ?>
					@foreach ($jobs as $job)
						<tr>
							<td>{{$job->company}}</td>
							<td>{{$job->title}}</td>
							<td>{{$job->description}}</td>
							<td>{{$job->benefits}}</td>							
							@if( Auth::guest() )    
								<td>
									{{count($job->candidates)}}
								</td>							
								<td>
									<a href="#unauthorizedModal" role="button" class="btn btn-mini btn-warning" data-toggle="modal">Aply for this Job</a>									
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
		                 			<td colspan=6>
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