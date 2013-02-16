@layout('templates.main')
@section('content')
<?php $messages = User::messages(); ?>
<div id="subheader">	
	<div class="inner">
		<div class="container">
			<h1>{{__('messages.messages')}}</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->
<div id="subpage">
	<div class="container">
		<div class="row">
			<div class="span10">
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
				<!-- NEW USERS -->
				<table class="table table-striped table-bordered table-condensed">
					<caption>
						<span class="label label-info">{{__('messages.yourmessages')}}</span>.
					</caption>
					<thead>
						<tr>
							<th width="10%">{{__('messages.date')}}</th>
							<th width="10%">{{__('messages.sender')}}</th>
							<th width="10%">{{__('messages.recipient')}}</th>
							<th width="60%">{{__('messages.message')}}</th>
							<th width="10%">{{__('messages.action')}}</th>
						</tr>
					</thead>
					<tbody>

					@forelse($messages as $message)
					<?php
						$sender 	= User::find($message->sender_id);
						$recipient 	= User::find($message->recipient_id);
						?>
					<tr>
						<td>
							{{$message->created_at}}
						</td>
						<td>
							{{HTML::image($sender->getImageUrl('square'), $sender->name, array('width' => 50, 'height'=>50))}}
							{{HTML::link('users/'.$sender->id, $sender->name)}}
						</td>
						<td>
							{{HTML::image($recipient->getImageUrl('square'), $recipient->name, array('width' => 50, 'height'=>50))}}
							{{HTML::link('users/'.$recipient->id, $recipient->name)}}
						</td>
						<td>
							{{$message->text}}
						</td>
						<td>
							{{Form::open('messages', 'DELETE')}}
							{{Form::hidden('message_id', $message->id)}}
							{{Form::submit(__('messages.delete'), array('class' => 'btn btn-danger btn-mini'))}}
							{{Form::close()}}
						</td>
					</tr>
					@empty
						{{__('messages.nomessages')}}
					@endforelse
					</tbody>
				</table>
			</div>
			<div class="span2">
				<div class="sidebar">
					<h3><span class="slash">{{__('messages.about')}}</span></h3>
					<p>{{__('messages.about1')}}</p>
				</div> <!-- /sidebar -->
			</div> <!-- /span4 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->
@endsection