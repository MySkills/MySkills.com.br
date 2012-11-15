@layout('templates.main')
@section('content')
<div id="subheader">	
	<div class="inner">
			<div class="container">
				<div>
					<h1>Welcome</h1>				
				</div>
			</div> 
		<!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->
<div id="subpage">
	<div class="container">
		<div class="row">		
			<div class="span10">
			<div class="row">
				<div class="span5">
					<h3>Welcomer Recruiters</h3>
				</div>
				<div class="span5">						
					<h3>Welcome Developers</h3>
				</div>
			</div> <!-- /row> -->			
			<div class="row">

				<div class="span5">
					<p>This is your first time here. We are very glad that you are now 
					part of our community.</p>

					<p>The main problem we are trying to solve for you is to 
					have access to a pool of qualified developer with different
					levels of skills:</p>

					<div class="row">
						<div class="span1">
							{{HTML::image('img/profile/senior-female.png', 'Female Trainee')}}
							<strong>Senior</strong>
						</div>
						<div class="span1">
							{{HTML::image('img/profile/professional-female.png', 'Female Professional')}}
							<strong>Professional</strong>
						</div>
						<div class="span1">
							{{HTML::image('img/profile/trainee-female.png','Female Trainee')}}
							<strong>Trainee</strong>
						</div>
						
					</div>

					<p>If you need to hire someone with technical skills, 
					we want you to find this professional here.</p>

					<p>These are the features we are planning for you (COMING SOON):</p>
					<ul>
						<li><i class="icon-file"></i>Post a job;</li>
						<li><i class="icon-user"></i>Hire an applicant;</li>
						<li><i class="icon-search"></i>Search professionals based on their skills;</li>
					</ul>
				</div>
				<div class="span5">
					<p>These is your first time here. We are very glad that you are now 
					part of our community.</p>

					<p>The main problem we are trying to solve for you is to 
					have access to a pool of qualified developer.</p>

					<p>You will select your level of expertise and define
						your next professional achievements.</p>

					<div class="row">
						<div class="span1">
							{{HTML::image('img/profile/senior-male.png','Male Senior')}}
							<strong>Senior</strong>
						</div>
						<div class="span1">
							{{HTML::image('img/profile/professional-male.png', 'Male Professional')}}
							<strong>Professional</strong>
						</div>
						<div class="span1">
							{{HTML::image('img/profile/trainee-male.png','')}}
							<strong>Trainee</strong>
						</div>
					</div>

					<p>If you want to exchange ideas, learn about new technologies
					and trends or even get a job or a trainning course you came
					to the right place.</p>

					<p>These are the features we are planning for you (COMING SOON):</p>
					<ul>
						<li><i class="icon-user"></i>Apply for a job;</li>
						<li><i class="icon-book"></i>Apply for a trainning course;</li>
						<li><i class="icon-certificate"></i>Unlock badges;</li>						
						<li><i class="icon-search"></i>Search for new technologies and trends;</li>
					</ul>
				</div>
			</div> <!-- /row -->
			</div> <!-- /span10 -->
			<div class="span2">
				<div class="sidebar">
					<h3><span class="slash">Welcome</span></h3>
					<p>
					This is your first time on MySkills.com.br

				</div> <!-- /sidebar -->
			</div> <!-- /span2 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection