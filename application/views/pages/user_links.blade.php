@layout('templates.main')
@section('content')
<?php
	if (Auth::check()) {
		$user->logLastAccess();
	}
?>

<!-- Unauthorized Modal -->
<div id="unauthorizedModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"> {{__('security.unauthorized')}} </h3>
  </div>
  <div class="modal-body">
    <p>{{__('security.needsign')}}</p>
		{{HTML::link('connect/session/facebook', __('security.subscribe').'(Facebook)', array('class' => 'btn'))}}
		{{HTML::link('connect/session/github', __('security.subscribe').'(Github)', array('class' => 'btn btn-primary'))}}
		{{HTML::link('connect/session/linkedin', __('security.subscribe').'(Linkedin)', array('class' => 'btn'))}}
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">{{__('security.close')}}</button>
  </div>
</div>
<!-- Send Message Modal -->
<div id="addMessageModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">{{__('user.sendmessage')}}</h3>
</div>
@if( Auth::check())
	<div class="modal-body">

		{{Form::open('messages', 'PUT',array('class' =>'form-horizontal'))}}
		{{Form::hidden('recipient_id', $user->id)}}
		<div class="control-group" >
			<label class="control-label" for="inputEmail">{{__('user.recipient')}}</label>
			<div class="controls">
				{{HTML::image($user->getImageUrl('square'),  $user->name)}}  {{$user->name}}
			</div>
		</div>
		<div class="control-group" >
			<label class="control-label" for="inputEmail">{{__('user.message')}}</label>
			<div class="controls">				
				{{Form::textarea('text', '',array('class' =>'span3', 'placeholder' => __('user.message'), 'rows' => '8' ))}}
			</div>
		</div>			
		<div class="control-group" >		
			<div class="controls">				
				{{Form::submit(__('jobs.submit'), array('class' => 'btn-primary'))}}
				{{Form::close()}}			
			</div>
		</div>
  	</div>
  	<div class="modal-footer">
    	<button class="btn" data-dismiss="modal" aria-hidden="true">{{__('jobs.cancel')}}</button>
  	</div>
@else
	<div class="modal-body">
	    <p>You are not authenticated</p>
  	</div>
  	<div class="modal-footer">
    	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  	</div>
@endif  
</div>
<!-- /end Modal --> 
<div id="subpage">
	<div class="container">
		@if(Session::get('status'))
			@if(Session::get('status')=='ERROR')
				<div class="alert alert-error">
			@else
				<div class="alert alert-success">
			@endif					
				 <button type="button" class="close" data-dismiss="alert">×</button>
					<strong>{{Session::get('status')}}</strong>
			</div>
		@endif		
		@if($user->limitedUser()->limitedlevel < $user->limitedUser()->level)
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>{{__('user.limitedlevelmessage', array('level' => $user->limitedUser()->level, 'skilllevel' => $user->limitedUser()->level-1))}}</strong>
			</div>
		@endif

		<div class="row">
			<div class="span3 pagination-centered box">
				{{HTML::image($user->getImageUrl('large'),  $user->name, array('title' => $user->name))}}
				<h1>{{$user->name}}</h1>
				<div class="sidebar">
					@if(Auth::check())
						<a href="#addMessageModal" role="button" class="btn btn-success" data-toggle="modal"><i class="icon-envelope"></i> {{__('user.sendmessage')}}</a>
					@else
						<a href="#unauthorizedModal" role="button" class="btn btn-warning" data-toggle="modal" data-target="#unauthorizedModal"><i class="icon-envelope"></i>{{__('user.sendmessage')}}</a>
					@endif				
				</div> <!-- /sidebar -->
				<center>
					<h2>Coding Activity</h2>
					<div id="cal-heatmap" style="height: 200px;"></div>
				</center>
			</div> <!-- /span2 -->
			<div class="span6">
				<div class="row">
				</div>
				<ul id="BadgeTab" class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#links">{{__('user.links')}} ({{count($links)}})</a></li>
				</ul>
				<div id="BadgeTabContent" class="tab-content">					
					<div class="tab-pane fade in active" id="links">
						<table class="table table-bordered table-striped table-condensed">
							<thead>
								<tr>
									<th>Title</th><th>Description</th>
								</tr>
							</thead>
							@foreach($links as $link)
							<tr>
								<td>
									{{HTML::link($link->url, $link->title, array('target' => '_blank'))}}	
								</td>
								<td>
									{{$link->description}}
								</td>
							</tr>
								
							@endforeach
						</table>
					</div>
				</div>
			</div> <!-- /span4 -->
			<div class="span3 pagination-centered">
				<div class="sidebar pagination-centered">
					@if(count($user->technologies) > 20)
						<h3><span class="slash">{{__('user.items')}}</span></h3>
						{{HTML::image('img/browserquest/'.'chest.png',  'Chest', array('width' => 48, 'height'=>48, 'title' => 'Chest'))}}
					@endif					
					@if( Auth::check())
						@if($user->id <> Auth::user()->id)
							@if(count($user->followers()->where('follower_id', '=', Auth::user()->id)->get()) == 0)
								{{Form::open('followers', 'PUT')}}
								{{Form::hidden('user_id', $user->id)}}
								{{Form::submit(__('user.follow'), array('class' => 'btn btn-mini btn-success'))}}
								{{Form::close()}}
							@else
								{{Form::open('followers', 'DELETE')}}
								{{Form::hidden('user_id', $user->id)}}
								{{Form::submit(__('user.unfollow'), array('class' => 'btn btn-mini btn-danger'))}}
								{{Form::close()}}
							@endif
							<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="WMQWR75EFGLXN">
							<table>
							<tr><td><input type="hidden" name="on0" value="Pomodoros">Pomodoros</td></tr><tr><td><select name="os0">
								<option value="4 pomodoros - 2 horas">4 pomodoros - 2 horas R$150,00</option>
								<option value="8 pomodoros - 4 horas">8 pomodoros - 4 horas R$290,00</option>
							</select> </td></tr>
							</table>
							<input type="hidden" name="currency_code" value="BRL">
							<input type="image" src="https://www.paypalobjects.com/pt_BR/BR/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - A maneira mais fácil e segura de efetuar pagamentos online!">
							<img alt="" border="0" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif" width="1" height="1">
							</form>
						@endif
					@else
					<a href="#unauthorizedModal" role="button" class="btn btn-warning" data-toggle="modal" data-target="#unauthorizedModal">{{__('user.follow')}}</a>
					@endif
				</div> <!-- /sidebar -->
			</div> <!-- /span4 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->  

<script type="text/javascript" src="//d3js.org/d3.v3.min.js"></script>
{{ HTML::style('css/cal-heatmap.css') }}
{{HTML::script('js/cal-heatmap.min.js')}}

<script type="text/javascript">
	var my_data = {
		@foreach ($checkins as $checkin)
			"{{$checkin->date}}":{{$checkin->value}},
		@endforeach
	}
	var cal 	= new CalHeatMap();
	
	var parser = function(data) {
		var stats = {};
		for (var d in data) {
			stats[data[d].date] = data[d].value;
		}
		return stats;
	};

	cal.init({
		//data: "{{URL::current()}}/checkins.json",
		data: my_data,
		itemSelector: "#cal-heatmap",
		domain: "month",
		subDomain: "x_day",
		cellSize: 26,
		subDomainTextFormat: "%d",
		range: 1,
		weekStartOnMonday: false,
		displayLegend: true,
		legend: [2, 4],
		legendVerticalPosition: "top",
		legendMargin: [5, 5, 5, 5],
		itemName: ["checkin", "checkins"],
		label: {
			width: 46,
			offset: {x: -10, y: -40}
		}		
	});
</script>

@endsection