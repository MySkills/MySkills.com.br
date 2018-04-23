@layout('templates.main')
@section('content')

<div id="subheader">
	<div class="inner">
		<div class="container">
			<h1>Blog</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->
<div id="subpage">	
	<div class="container">
		<div class="row">
			<div class="col-md-10 pagination-centered">

				<iframe width="640" height="360" src="http://www.youtube.com/embed/7pU5zuS25Gs?rel=0" frameborder="0" allowfullscreen></iframe>

			</div> <!-- /span10 -->
			<div class="col-md-2">
				<div class="sidebar">
					<h3><span class="slash">{{__('blog.about')}}</span></h3>
					<p>{{__('blog.about1')}}</p>
				</div> <!-- /sidebar -->
			</div> <!-- /span2 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection