@layout('templates.main')
@section('content')
<?php 
	$facebook = IoC::resolve('facebook-sdk');
	$uid = $facebook->getUser();								
?>

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
								<p>FB-uid -> {{$uid}}</p>
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
@endsection