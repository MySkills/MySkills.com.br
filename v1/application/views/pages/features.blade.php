@layout('templates.main')
@section('content')
<div id="subheader">
	<div class="inner">
		<div class="container">
			<h1>Features</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->
<div id="subpage">	
	<div class="container">
		<div class="row">
			<div class="span6 feature-block">
				<h2><span class="slash">//</span> Recruiter - Find the developers you need</h2>
				<div class="thumbnail">
					    <iframe width="450" height="315" src="http://www.youtube.com/embed/BCH9lpp1XZg" frameborder="0" allowfullscreen=""></iframe>
				</div> <!-- /thumbnail -->
				<p>On MySkills recruiters can search for developers with pre-defined skills. No more unrelated resumes. Developer profiles are presented with validated badges representing knowldge, skills and professional achievements. This information is used to match the desired developers with job opportunities.</p>
			</div> <!-- /span6 -->
			<div class="span6 feature-block">
				<h2><span class="slash"></span>Developer - Find the job you want</h2>
				<div class="thumbnail">
					<iframe width="450" height="315" src="http://www.youtube.com/embed/nGh4Q01cwnk" frameborder="0" allowfullscreen=""></iframe>
				</div> <!-- /thumbnail -->
				<p>Badges are our way of providing recognition for software development skills. As a developer you can claim badges related to: courses, certification, online tests, events or Apps developed. You can also earn Skill Points for answering questions about software development technologies or referring good professionals. The more badges and Skill Points you earn, the better is your position on MySkills community.</p>
			</div> <!-- /span6 -->
		</div> <!-- /row -->
		<br /><br />
		<div class="row">
			<div class="span4 feature-block">
				<h3><span class="slash"></span>Developer - Present your skills</h3>
				<div class="thumbnail">
					{{ HTML::image('img/features-profile.png', 'Profile image')}}
				</div> <!-- /thumbnail -->
				<p>On each developer profile you can see a list of badges, locked or unlocked, depending on the developer skills. Claim more badges and stand out on MySkills community.</p>
			</div> <!-- /span4 -->
			<div class="span4 feature-block">
				<h3><span class="slash"></span>Developer - Claim Badges</h3>
				<div class="thumbnail">
					{{ HTML::image('img/features-claim.png', 'Claim')}}
				</div> <!-- /thumbnail -->
				<p>Our badge ranking system is a multi-level representation of knowledge with pre-defined roles related to each concept. We have badges for web development and mobile development. We also have badges that represent course or event participation. Also badges for online tests and certifications. But we also recognize outstanding projects and Apps that you have created during your professional career.</p>
			</div> <!-- /span4 -->
			<div class="span4 feature-block">
				<h3><span class="slash"></span>Developer - Apply for a job</h3>
				<div class="thumbnail">
					{{ HTML::image('img/features-job.png', 'Job')}}					
				</div> <!-- /thumbnail -->
				<p>Are you looking for a job that matches your skills? Or want to learn the skills that companies are searching for? On MySkills you can apply for a job or identify which skills you need to improve to be part of that tech company you like.</p>
			</div> <!-- /span4 -->
		</div> <!-- /row -->
		<br /><br />
		<div class="row">
			<div class="span12">
				<h3><span class="slash"></span>New Features (Coming Soon) </h3>
			</div>
			<div class="span4 feature-list">	
				<ul>
					<li>
						<div class="feature-icon">
							<i class="icon-check"></i>
						</div>
						<div class="feature-text">
							<h4>Developer - Video Profile</h4>
                            Add a 1 minute Youtube video to improve your profile.
						</div>
					</li>
					<li>
						<div class="feature-icon">
							<i class="icon-check"></i>
						</div>
						<div class="feature-text">
                            <h4>Developer - Apply for a Company</h4>
                            Show you are interested in working in a specific tech company (regardless of open job opportunities).
						</div>						
					</li>
                </ul>
            </div> <!-- /span4 -->
            <div class="span4 feature-list">		
                <ul>					
					<li>
						<div class="feature-icon">
							<i class="icon-check"></i>
						</div>
						
						<div class="feature-text">
                            <h4>Developer - Mobile Quiz</h4>
                            Answer questions about software development on your mobile phone and earn Skill Points.
						</div>
					</li>
					<li>
						<div class="feature-icon">
							<i class="icon-check"></i>
						</div>
						<div class="feature-text">
                            <h4>Refer a Friend</h4>
                            You have a network of great professionals? Refer your colleagues and the better they are, more skill points you earn.
						</div>
					</li>
				</ul>
			</div> <!-- /span4 -->
			<div class="span4 feature-list">		
				<ul>
					<li>
						<div class="feature-icon">
							<i class="icon-check"></i>
						</div>
						<div class="feature-text">
                            <h4>Developer - Badges for Online Tests</h4>
                            Apply for online tests on many technologies to present your software development skills.
						</div>
					</li>
					<li>
						<div class="feature-icon">
							<i class="icon-check"></i>
						</div>
						<div class="feature-text">
                            <h4>Developer - Badges for Apps</h4>
                            You studied a new technology by yourself created and published an amazing App? You deserve a Badge to recognize that.
						</div>
					</li>
				</ul>
			</div> <!-- /span4 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection