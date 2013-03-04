@layout('templates.main')
@section('content')

<div id="subheader">
	<div class="inner">
		<div class="container">
			<h1>Weekly Newsletter</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->
<div id="subpage">	
	<div class="container">
		<div class="row">
			<div class="span10 pagination-centered">


<h2>{{$total}} e-mails Sent</h2>
			</div> <!-- /span10 -->
			<div class="span2">
				<div class="sidebar">
					<h3><span class="slash">{{__('blog.about')}}</span></h3>
					<p>{{__('blog.about1')}}</p>
				</div> <!-- /sidebar -->
			</div> <!-- /span2 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection