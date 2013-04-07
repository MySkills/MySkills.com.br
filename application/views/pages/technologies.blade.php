@layout('templates.main')
@section('content')
<div id="subheader">
	<div class="inner">
		<div class="container">
			<h1>Technologies</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->
<div id="subpage">	
	<div class="container">
		<div class="row">
			<div class="span10">
				<ul class="nav nav-pills nav-stacked">
					@foreach($technologies as $tech)
							<li>{{HTML::link('technology/'.$tech->id, $tech->name)}}</li>
					@endforeach
				</ul>
			</div> <!-- /span10 -->
			<div class="span2">
				<div class="sidebar">
					<h3><span class="slash">About Technologies</span></h3>
					<p>
					Here you will find information about the most frequently asked questions. Do you also have a question? Get in touch with us and we will be really glad to answer it.</p>
				</div> <!-- /sidebar -->
			</div> <!-- /span2 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection