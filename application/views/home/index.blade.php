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
						<a href="#myModal" class="btn btn-large btn-info" data-toggle="modal">Sign-Up!</a>
						<a href="#myModal" target="_blank" class="btn btn-large" data-toggle="modal">Sign-In</a>
            <?php $users = User::all() ?>
              @foreach ($users as $user)
                 <div class="user">User.: {{ $user->firstname }}</div>
              @endforeach              
					</p>
				</div> <!-- /landing-text -->
				<div class="span6 landing-screenshot">
					<iframe width="450" height="321" src="http://www.youtube.com/embed/nGh4Q01cwnk" frameborder="0" allowfullscreen></iframe>
				</div>                
            </div> <!-- .row -->
        </div> <!-- /container -->
    </div> <!-- /inner -->
</div> <!-- /landing -->
<!-- Modal -->
<div class="modal hide" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	<h3 id="myModalLabel">Thank you</h3>
  	</div>
  	<div class="modal-body">
    	<p>We are very glad that you are interested. We will deploy this feature really soon...</p>
  	</div>
  	<div class="modal-footer">
    	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  	</div>
</div>
@endsection