@layout('templates.main')
@section('content')
<div id="subheader">	
	<div class="inner">
		<div class="container">
			<h1>{{$badge->name}}</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->

<div id="subpage">
	<div class="container">
		<div class="row">		
			<div class="span2">
				{{HTML::image('img/badges/'.$badge->image, $badge->name, array('width' => '75', 'height' => '75'))}}

			</div> <!-- /span2 -->
			<div class="span8">
				<p>{{$badge->name}} - {{$badge->issuer->name}}</p>
				<p>{{$badge->description}}</p>
			</div> <!-- /span4 -->

			<div class="span2">
				<div class="sidebar">
					<h3><span class="slash">Badge</span></h3>
				</div> <!-- /sidebar -->
			</div> <!-- /span4 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection