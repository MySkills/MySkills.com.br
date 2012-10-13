<!DOCTYPE HTML>
<html>
<head>
<title>MySkills.com.br - Daily Checkin App</title>
{{HTML::style('css/bootstrap-responsive.css')}}
{{HTML::style('css/bootstrap-responsive.min.css')}}
{{HTML::style('css/bootstrap.css')}}
{{HTML::style('css/bootstrap.min.css')}}
</head>
<body>
	<div class="row-fluid pagination-centered">
		<div>
			{{HTML::image('img/MySkills-155-100.png',  'MySkills logo', array('width' => '125'))}}
		</div>
	</div>
	<div class="row-fluid pagination-centered">
		<div class="alert alert-info">
			<h3>Please Sign-In</h3>
			 <p>We will not post on your wall!!!</p>
		</div>
		<div>
			{{HTML::link('connect/session/facebook', 
                    'Sign-In(Facebook)', array('class' 
                      => 'btn btn-large btn-primary'))}}
		</div>
	<div>
</body>
</html>