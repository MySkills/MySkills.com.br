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

				<!-- NEW USERS -->
				<table class="table table-striped table-bordered table-condensed">
					<caption>
						<span class="label label-info">{{__('messages.yourmessages')}}</span>.
					</caption>
					<thead>
						<tr>
							<th width="20%">{{__('messages.date')}}</th>
							<th width="10%">{{__('messages.picture')}}</th>
							<th width="20%">{{__('messages.sender')}}</th>
							<th width="50%">{{__('messages.message')}}</th>
						</tr>
					</thead>
					<tbody>

					@forelse($messages as $message)
					<?php $sender = User::find($message->sender_id); ?>
					<tr>
						<td>
							{{$message->created_at}}
						</td>
						<td>
							{{HTML::image($sender->getImageUrl('square'), $sender->name, array('width' => 50, 'height'=>50))}}
						</td>
						<td>
							{{HTML::link('users/'.$sender->id, $sender->name)}}
						</td>
						<td>
							{{$message->text}}
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