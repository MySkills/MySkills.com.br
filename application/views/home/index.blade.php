@layout('templates.main')
@section('content')
  @if ( Auth::guest() )
      <div id="landing">    
          <div class="inner">        
              <div class="container">        
                  <div class="row">
      			 	<div class="span8 landing-text">
      				    <h1>Meet the best developers.</h1>
      				    <h2>Hire great professionals.</h2>
      					<p class="landing-actions">
                  {{HTML::link('connect/session/facebook', 
                    'Sign-Up(Facebook)', array('class' 
                      => 'btn btn-large'))}}          
                  {{HTML::link('connect/session/github', 
                    'Sign-Up(Github)', array('class' 
                      => 'btn btn-large btn-primary'))}}                            
                  {{HTML::link('connect/session/linkedin', 
                    'Sign-Up(Linkedin)', array('class' 
                      => 'btn btn-large'))}}                                             
      					</p>
      				</div> <!-- /landing-text -->
      				<div class="span4 landing-screenshot">
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
            <div class="span2">
              <div class="sidebar">
                <h3><span class="slash">About the Dashboard</span></h3>
                <p>
                Here you will find information about what is going on here.</p>
              </div> <!-- /sidebar -->
            </div> <!-- /span2 -->

            <div class="span8"> 
                <p>We are creating a brand new developer community. 
                  We are in Beta, therefore you might find some
                  bugs and we will be really glad if you report 
                  anything, so we can fix any problem. On the other 
                  hand we are working hard to deploy new features and 
                  improvements for you.</p>

                  <p>Feel free to ask questions or propose new features.</p>

                <address>
                <strong>Eduardo Cruz</strong><br />
                  eduardo.cruz@myskills.com.br<br />
                  Founder of MySkills.com.br
                </address>

                  {{HTML::image('img/github-80-120.png','Github Social Coding', array('align'=>'right'))}}
                <h3>New features and News</h3>

                <dl class="dl-horizontal">

                  <dt><strong><span class="label label-warning">Multiple authentication</span></strong></dt>
                  <dd>                    
                    Now we have not only <span class="label label-info">Facebook</span>, 
                    but also <span class="label label-info">Linkedin</span> 
                    and <span class="label label-success">Github authentication</span>. 
                    The last one was on top of our list, since we are a community of 
                    developers. Github authentication is one of the features we need to 
                    measure software development skills and engagement. We hope you are
                    as excited as we are to improve profiles based on github content.</dd>
                  <p></p>
                    {{HTML::image('img/badges/unlock100.png','Unlock Badge', array('align'=>'right', 'width'=>'75', 'height'=>'75'))}}
                  <dt><strong><span class="label label-warning">Badges list</span></strong></dt>
                  <dd>We finally added a list of our <span class="label label-info">
                    Badges</span>. So, what problem does it solve? First, it provides
                    users with an <span class="label label-info">overview</span> of which 
                    badges you can unlocock. And as soon as we have new badges you will 
                    find them on the list. Second, you now how much 
                    <span class="label label-info">points</span> we define for each badge. 
                    Defining points is part of a very comples gamification concept called 
                    Game Balance and we will make different kinds of experiments with badge 
                    points. Third, you have the badge <span class="label label-info">description</span>, 
                    providing information about the concepts related to the badges. And finally, 
                    you have the badge <span class="label label-info">Issuer</span>, which
                    provides the content or the validation process of that badge. We hope
                    this information help you better understand what are the concepts relatec
                    to the achievements we are preparing for you. Feel free to propose new
                    ideas and badges.</dd>
                </dl>
            </div> <!-- /span10 -->
            <div class="span2">
              <div class="sidebar">
                <h3><span class="slash">About the Dashboard</span></h3>
                <p>
                Here you will find information about what is going on here.</p>
              </div> <!-- /sidebar -->
            </div> <!-- /span2 -->
          </div> <!-- /row -->
        </div> <!-- /container -->  
      </div> <!-- /subpage -->   
  @endif  
@endsection