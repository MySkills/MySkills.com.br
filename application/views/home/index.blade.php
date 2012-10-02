@layout('templates.main')
@section('content')
  @if ( Auth::guest() )     
      <div id="landing">    
          <div class="inner">        
              <div class="container">        
                  <div class="row">
      			 	<div class="span6 landing-text">
      				    <h1>Meet the best developers.</h1>
      				    <h2>Hire great professionals.</h2>
      					<p class="landing-actions">
                  {{HTML::link('connect/session/facebook', 'Login with Facebook', array('class' => 'btn btn-large btn-primary'))}}          
      					</p>
      				</div> <!-- /landing-text -->
      				<div class="span6 landing-screenshot">
      					<iframe width="450" height="321" src="http://www.youtube.com/embed/nGh4Q01cwnk" frameborder="0" allowfullscreen></iframe>
      				</div>                
                  </div> <!-- .row -->
              </div> <!-- /container -->
          </div> <!-- /inner -->
      </div> <!-- /landing -->
  @else  
      <div id="subheader">
      
        <div class="inner">
          
          <div class="container">
                
            <h1>Dashboard</h1>
          
          </div> <!-- /.container -->
          
        </div> <!-- /inner -->
        
      </div> <!-- /subheader -->   
      <div id="subpage">  
        
        <div class="container">
          
          <div class="row">
            
            <div class="span8">         
              
                <h3><span class="slash"></span> Welcome to our dashboard</h3>
                
                <ol class="faq-list">
                  
                  <li>
                      <h4>Dashboard</h4>
                      <p>Here you can exchange information with other users.</p>                  
                  </li>
                  
                  
                  
                </ol>
                
              
            </div> <!-- /span8 -->
            
            <div class="span4">
                
              <div class="sidebar">
                
                <h3><span class="slash">About the Dashboard</span></h3>
                        
                <p>
                Here you will find information about what is going on here.</p>
                
              </div> <!-- /sidebar -->
              
            </div> <!-- /span4 -->
          </div> <!-- /row -->
          
        </div> <!-- /container -->  
        
      </div> <!-- /subpage -->   
  @endif  
@endsection