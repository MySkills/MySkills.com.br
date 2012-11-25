@layout('templates.main')
@section('content')
<div id="unauthorizedModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Unauthorized Access</h3>
  </div>
  <div class="modal-body">
    <p>You need to sign-up.</p>
		{{HTML::link('connect/session/facebook',
		'Sign-Up(Facebook)', array('class'
		  => 'btn btn-large'))}}
		{{HTML::link('connect/session/github',
		'Sign-Up(Github)', array('class'
		  => 'btn btn-large btn-primary'))}}
		{{HTML::link('connect/session/linkedin',
		'Sign-Up(Linkedin)', array('class'
		  => 'btn btn-large'))}}
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
<div id="subheader">
	<div class="inner">
		<div class="container">
			<h1>Pricing Plans</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->
<div id="subpage">	
	<div class="container">
		<div class="row">
			<div class="span12">
				<h2><span class="slash">//</span> Recruiter - Choose a Plan </h2>
			</div> <!-- /span12 -->				
		</div> <!-- /row -->
		<div class="row">	
			<div class="span12">
				<div class="pricing-plans plans-2">						
					<div class="plan-container">
				        <div class="plan">
					        <div class="plan-header">
					        	<div class="plan-title">
					        		Startup	        		
				        		</div> <!-- /plan-title -->
					            <div class="plan-price">
				                	<span class="note">R$</span>0<span class="term">Per Month</span>
								</div> <!-- /plan-price -->
					        </div> <!-- /plan-header -->	        
					        <div class="plan-features">
								<ul>
									<li><strong>Free</strong> setup</li>
									<li><strong>Post 1</strong> Job Position</li>
									<li><strong>Up to 10</strong> Applicants</li>
								</ul>
							</div> <!-- /plan-features -->
							<div class="plan-actions">				
		                    @if( Auth::guest())
								<a href="#unauthorizedModal" role="button" class="btn btn-mini btn-warning" data-toggle="modal">Purchase Now</a>
		                    @else
											<span class="label label-info">Your Plan</span>
		                    @endif								

							</div> <!-- /plan-actions -->
						</div> <!-- /plan -->
				    </div> <!-- /plan-container -->
				    <div class="plan-container best-value">
				        <div class="plan">
					        <div class="plan-header">				                
					        	<div class="plan-title">
					        		Business	        		
				        		</div> <!-- /plan-title -->
					            <div class="plan-price">
				                	<span class="note">R$</span>99<span class="term">Per Month</span>
								</div> <!-- /plan-price -->
					        </div> <!-- /plan-header -->	          
					        <div class="plan-features">
								<ul>					
									<li><strong>Free</strong> setup</li>
									<li><strong>10</strong> Job Positions</li>
									<li><strong>Up to 100</strong> Applicants</li>
								</ul>
							</div> <!-- /plan-features -->
							<div class="plan-actions">				
								<a href="javascript:;" class="btn">Coming Soon</a>	
							</div> <!-- /plan-actions -->
						</div> <!-- /plan -->
				    </div> <!-- /plan-container -->
				</div>
			</div> <!-- /span12 -->
		</div> <!-- /row -->		
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection