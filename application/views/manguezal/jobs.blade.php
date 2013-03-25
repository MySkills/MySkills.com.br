@layout('templates.manguezal_main')
@section('content')
<div id="subheader">	
	<div class="inner">
		<div class="container">
			<h1>{{__('manguezal.job_positions')}}</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->

<div id="gallery">
	<div class="item">
		{{HTML::image('img/manguezal/ubee.png', 'UBee', array('width' => '310', 'height' => '105'))}}
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/opara.png', 'Opará', array('width' => '310', 'height' => '105'))}}
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/ubee.png', 'UBee', array('width' => '310', 'height' => '105'))}}
	</div>
</div>

<div id="subpage">
	<div class="container">
		<div class="row">		
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
						<p class="welcome">{{__('jobs.applybelow')}}</p>
					</caption>
					<thead>
						<tr>
						@if(Auth::check())
							<th width="10%">{{__('jobs.recruiter')}}</th>
						@endif
							<th width="10%">{{__('jobs.company')}}</th>
							<th width="10%">{{__('jobs.jobtitle')}}</th>
							<th width="30%">{{__('jobs.responsibilities')}}</th>
							<th width="30%">{{__('jobs.benefits')}}</th>
							<th width="10%">{{__('jobs.candidates')}}</th>	
							<th width="10%">{{__('jobs.action')}}/{{__('jobs.status')}}</th>						
						</tr>
					</thead>
					<tbody>
					@foreach ($jobs as $job)
					<?php 
						$recruiter = User::find($job->recruiter_id);
					?>
						<tr>
							@if(Auth::check())
							<td>
								{{HTML::image($recruiter->getImageUrl('square'),  $recruiter->name, array('width' => 50, 'height'=>50))}}
								{{HTML::link('users/'.$recruiter->id, $recruiter->name)}}
							</td>
							@endif
							<td>{{$job->company}}</td>
							<td>{{$job->title}}</td>
							<td>{{$job->description}}</td>
							<td>{{$job->benefits}}</td>							
							@if( Auth::guest() )    
								<td>
									{{count($job->candidates)}}
								</td>							
								<td>
									<a href="#unauthorizedModal" role="button" class="btn btn-mini btn-warning" data-toggle="modal">{{__('jobs.apply')}}</a>									
								</td>								
							@else
								@if($job->recruiter_id == Auth::user()->id)
									<td>
										{{count($job->candidates)}}
									</td>							
									<td>
										{{Form::open('jobs/'.$job->id, 'DELETE')}}
										{{Form::submit(__('jobs.delete'))}}
										{{Form::close()}}	
									</td>									
								@else
									<td>
										{{count($job->candidates)}}
									</td>							
									<td>
			                            @if(count($job->candidates()->where('user_id', '=', Auth::user()->id)->get()) == 0)
											{{Form::open('jobs/'.$job->id.'/'.Auth::user()->id, 'PUT')}}
											{{Form::submit(__('jobs.apply'), array('class' => 'btn btn-success'))}}
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
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection