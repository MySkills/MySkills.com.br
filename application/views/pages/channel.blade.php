@layout('templates.main')
@section('content')

<div id="subheader">
	<div class="inner">
		<div class="container">
			<h1>{{__('channel.service_channel')}}</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->
<div id="subpage">	
	<div class="container">
		<div class="row">
			<div class="span10 pagination-centered">
				<!-- UserVoice JavaScript SDK (only needed once on a page) -->
				<script>(function(){var uv=document.createElement('script');uv.type='text/javascript';uv.async=true;uv.src='//widget.uservoice.com/noRybcYKo5PMAEWgH4g2nA.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(uv,s)})()</script>

				<!-- The Classic Widget will be embeded wherever this div is placed -->
				<div data-uv-inline="classic_widget" data-uv-mode="full" data-uv-primary-color="#cc6d00" data-uv-link-color="#007dbf" data-uv-default-mode="feedback" data-uv-forum-id="171773" data-uv-width="100%" data-uv-height="550px"></div>
			</div> <!-- /span10 -->
			<div class="span2">
				<div class="sidebar">
					<h3><span class="slash">{{__('channel.about')}}</span></h3>
					<p>{{__('channel.about1')}}</p>
				</div> <!-- /sidebar -->
			</div> <!-- /span2 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection