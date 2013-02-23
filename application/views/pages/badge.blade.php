@layout('templates.main')
@section('content')
<div id="unauthorizedModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">{{__('security.unauthorized')}}</h3>
  </div>
  <div class="modal-body">
    <p>{{__('security.needsign')}}</p>
		{{HTML::link('connect/session/facebook', __('security.subscribe').'(Facebook)', array('class' => 'btn'))}}
		{{HTML::link('connect/session/github', __('security.subscribe').'(Github)', array('class' => 'btn  btn-primary'))}}
		{{HTML::link('connect/session/linkedin', __('security.subscribe').'(Linkedin)', array('class' => 'btn '))}}
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">{{__('security.close')}}</button>
  </div>
</div>
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
	                    @if( Auth::check())
                            @if(count($badge->users()->where('user_id', '=', Auth::user()->id)->get()) == 0)
								{{Form::open('badges/'.$badge->id.'/'.Auth::user()->id, 'PUT')}}
								{{Form::submit(__('badges.request'),  array('class' => 'btn btn-success'))}}
								{{Form::close()}}
							@else
								@if(count($badge->users()->where('user_id', '=', Auth::user()->id)->where('badge_user.active','=',0)->get()) == 0)
										<span class="label label-info">{{__('badges.approved')}}</span>
								@else
										<span class="label">{{__('badges.approval')}}</span>									
								@endif
							@endif
	                    @else
	                       <a href="#unauthorizedModal" role="button" class="btn btn-warning" data-toggle="modal">{{__('badges.request')}}</a>
	                    @endif							
				</div> <!-- /sidebar -->
			</div> <!-- /span4 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection