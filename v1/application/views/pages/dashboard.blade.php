@layout('templates.main')
@section('content')
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
			<div class="span10">
					<h3><span class="slash"></span> Welcome to our dashboard</h3>
					<ol class="faq-list">
						<li>
								<p>Here you can exchange information with other users.</p>	
						</li>
					</ol>
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
@endsection