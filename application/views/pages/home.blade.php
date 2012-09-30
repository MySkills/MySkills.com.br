@layout('templates.main')
@section('content')
<div id="landing">    
    <div class="inner">        
        <div class="container">        
            <div class="row">
			 	<div class="span6 landing-text">
				    <h1>Meet the best developers.</h1>
				    <h2>Hire great professionals.</h2>
					<p class="landing-actions">
						<a href="javascript:;" class="btn btn-large btn-info">Sign-Up!</a>
						<a href="javascript:;" target="_blank" class="btn btn-large">Sign-In</a>
					</p>
				</div> <!-- /landing-text -->
				<div class="span6 landing-screenshot">
					<iframe width="450" height="321" src="http://www.youtube.com/embed/BCH9lpp1XZg" frameborder="0" allowfullscreen></iframe>
				</div>                
            </div> <!-- .row -->
        </div> <!-- /container -->
    </div> <!-- /inner -->
</div> <!-- /landing --> 
@endsection