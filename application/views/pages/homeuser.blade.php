@layout('templates.main')
@section('content')
<?php
  if (Auth::check()) {
    $user = User::find(Auth::user()->id);
    $user->logLastAccess();
  }
?>


<!-- Send Message Modal -->
<div id="addMessageModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">{{__('wall.sharelink')}}</h3>
</div>
@if( Auth::check())
  <div class="modal-body">

    {{Form::open('links', 'PUT',array('class' =>'form-horizontal'))}}
    <div class="control-group" >
      <label class="control-label">{{__('links.title')}}</label>
      <div class="controls">        
        {{Form::text('title', '',array('class' =>'span3', 'placeholder' => __('links.title')))}}
      </div>
    </div>      

    <div class="control-group" >
      <label class="control-label">{{__('links.url')}}</label>
      <div class="controls">        
        {{Form::text('url', '',array('class' =>'span3', 'placeholder' => 'http://'))}}
      </div>
    </div>      
    <div class="control-group" >
      <label class="control-label">{{__('links.description')}}</label>
      <div class="controls">        
        {{Form::text('description', '',array('class' =>'span3', 'placeholder' => __('links.description')))}}
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


<div class="container">
	<div class="row">
      <div class="col-md-2">
        <div class="sidebar">                 
          <h3><span class="slash">{{__('home.weare')}}.: {{User::count()}}</span></h3>  
          <h3><span class="slash">{{__('home.freelancers')}}.: {{User::where('freelancer', '=', 1)->count()}}</span></h3>                  
          <h4><span class="slash">{{__('users.new_users')}}</span></h4>
        <table>
          @foreach ($newUsers as $newuser)
          
          <tr>
            <td>
              <a href="{{URL::to('/users/'.$newuser->id)}}">
                {{HTML::image($newuser->getImageUrl('square'), $newuser->name, array('width' => 50, 'height'=>50, 'title' => $newuser->name))}}
              </a>
            </td>
            <td>
              @foreach ($newuser->partial_badges(1) as $badge)
                <a href="{{URL::to('/badges/'.$badge->id)}}">
                  {{HTML::image('img/badges/'.$badge->image, $badge->name, array('width' => 50, 'height'=>50, 'title' => $badge->name))}}
                </a>
              @endforeach
              @for ($i = 1; $i <= (1-count($newuser->activebadges)); $i++)
                {{HTML::image('img/badges/unlock100.png', 'Unlock', array('width' => 50, 'height'=>50, 'title' => 'Unlock'))}}
              @endfor
            </td>
          </tr>
          @endforeach
        </table>


        </div> <!-- /sidebar -->
      </div> <!-- /col-md-2 -->
    <div class="col-md-7">
            <h1>Bem-vindo(a) ao MySkills</h1>

 <div id="myPublisherDiv"></div>
        <script type="text/javascript">
          // Initialize API key, session, and token...
          // Think of a session as a room, and a token as the key to get in to the room
          // Sessions and tokens are generated on your server and passed down to the client
          var apiKey = "31047142";
          var sessionId = "1_MX4zMTA0NzE0Mn4xMjcuMC4wLjF-U3VuIEp1biAwMiAxMDoxMDoxOSBQRFQgMjAxM34wLjY5Mjk4MzE1fg";
          var token = "T1==cGFydG5lcl9pZD0zMTA0NzE0MiZzZGtfdmVyc2lvbj10YnJ1YnktdGJyYi12MC45MS4yMDExLTAyLTE3JnNpZz1iZmRjMGNiMzZhMjU5Y2RhOGQ4NDc2ZmQ0MmQ3YjM4Y2QwYjc0NmQ4OnJvbGU9cHVibGlzaGVyJnNlc3Npb25faWQ9MV9NWDR6TVRBME56RTBNbjR4TWpjdU1DNHdMakYtVTNWdUlFcDFiaUF3TWlBeE1Eb3hNRG94T1NCUVJGUWdNakF4TTM0d0xqWTVNams0TXpFMWZnJmNyZWF0ZV90aW1lPTEzNzAxOTMwMjImbm9uY2U9MC44NzU5MTc0ODY5OTg1NTY0JmV4cGlyZV90aW1lPTEzNzA3OTc4MjgmY29ubmVjdGlvbl9kYXRhPQ==";

          // Initialize session, set up event listeners, and connect
          var session = TB.initSession(sessionId);
          session.addEventListener('sessionConnected', sessionConnectedHandler);
          session.connect(apiKey, token);
          
          function sessionConnectedHandler(event) {
            var publisher = TB.initPublisher(apiKey, 'myPublisherDiv');
            session.publish(publisher);
          }
        </script>
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
        
      {{Form::open('messages', 'PUT',array('class' =>'form-inline'))}}
      {{Form::textarea('text', '',array('class' =>'span6', 'placeholder' => __('wall.sendyourmessage'), 'rows' => '1' ))}}
      {{Form::submit(__('jobs.submit'), array('class' => 'btn-success '))}}
      {{Form::close()}}     

      <a href="#addMessageModal" role="button" class="btn btn-success" data-toggle="modal"><i class="icon-share"></i> {{__('wall.sharelink')}}</a>
        <table class="table-striped table-hover">
        @foreach($wallmessages as $wallmessage)
          <?php 
            $messagesender = User::find($wallmessage->sender_id);
            $messageuser = User::find($wallmessage->user_id);
            $userbadge = Badge::find($wallmessage->reference);
          ?>
        <tr>
          <td>
            @if($wallmessage->message_type == 'badge')
              <a class="pull-left" href="{{URL::to('/badges/'.$userbadge->id)}}">
                {{HTML::image('img/badges/'.$userbadge->image, $userbadge->name, array('width' => 50, 'height'=>50, 'hspace' => '15', 'title' => $userbadge->name, 'class' => 'media-object'))}}
              </a>
            @elseif($wallmessage->message_type == 'link')
                  <a href="{{URL::to('/users/'.$messageuser->id)}}">
                  {{HTML::image($messageuser->getImageUrl('large'),  $messageuser->name, array('width' => 50, 'height'=>50, 'hspace' => '15', 'title' => $user->name, 'class' => 'media-object'))}}
                </a>
            @else
              <a class="pull-left" href="{{URL::to('/users/'.$messagesender->id)}}">
                {{HTML::image($messagesender->getImageUrl('large'),  $messagesender->name, array('width' => 50, 'height'=>50, 'hspace' => '15', 'title' => $user->name, 'class' => 'media-object'))}}
              </a>
            @endif
          </td>
          <?php $messagedate = Date::forge($wallmessage->created_at)->ago(); ?>
          <td width="90">{{$messagedate}}</td>
            <td>
              {{$wallmessage->user_name}}
              @if($wallmessage->message_type == 'link')
                  <strong>{{HTML::link($wallmessage->reference, $wallmessage->text, array('target' => '_blank'))}}</strong>
              @elseif($wallmessage->message_type == 'checkin')
                  {{HTML::link('/technology/'.$wallmessage->reference, $wallmessage->text)}}
              @else
                  {{nl2br(htmlspecialchars($wallmessage->text))}}
              @endif                 

            </td>          
              @if($wallmessage->message_type == 'badge' || $wallmessage->message_type == 'checkin')
                <td>
                  <a href="{{URL::to('/users/'.$messageuser->id)}}">
                  {{HTML::image($messageuser->getImageUrl('large'),  $messageuser->name, array('width' => 50, 'height'=>50, 'hspace' => '15', 'title' => $user->name, 'class' => 'media-object'))}}
                </a>                
                </td>
              @elseif($wallmessage->message_type == 'link')
                <td>
                  {{HTML::image('img/50_link.jpg', 'Link icon', array('width' => 50, 'height'=>50, 'hspace' => '15', 'title' => 'Link icon', 'class' => 'media-object'))}}
                </td>
              @endif
            <td>
              @if($wallmessage->sender_id == Auth::user()->id)
              {{Form::open('messages', 'DELETE')}}
              {{Form::hidden('message_id', $wallmessage->id)}}
              {{Form::submit(__('messages.delete'), array('class' => 'btn btn-danger btn-mini'))}}
              {{Form::close()}}
              @endif
            </td>          
        </tr>
        @endforeach
        </table>
    </div>
      <div class="col-md-3">
        <div class="sidebar">
          <h3><span class="slash">Seus Skills</span></h3>
              {{Form::open('checkin', 'PUT', array('class' => 'form-inline'))}}
              {{Form::submit("CHECKIN.: ".__('user.usedtoday').'.: ', array('class'=>'btn btn-success'))}}
              {{Form::select('technology_id', $technology_list)}}
              {{Form::close()}}
              @foreach($user->checkins as $checkin)
                <div class="row">
                  <div class="progressbar">                    
                      @if($checkin->level == 1)
                        <div class="progress-bar progress-info" role="progressbar" aria-valuenow="{{$checkin->points*5}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$checkin->points*5}}%">
                          {{$checkin->points}}/20
                        </div>
                      @endif
                      @if($checkin->level == 2)
                        <div class="progress-bar progress-info" role="progressbar" aria-valuenow="{{($checkin->points-19)*2.5}}" aria-valuemin="0" aria-valuemax="100" style="width: {{($checkin->points-19)*2.5}}%">
                          {{($checkin->points-19)*2.5}}/40
                        </div>
                      @endif
                      @if($checkin->level == 3)
                        <div class="progress-bar progress-info" role="progressbar" aria-valuenow="{{($checkin->points-59)*1.66}}" aria-valuemin="0" aria-valuemax="100" style="width: {{($checkin->points-59)*1.66}}%">
                          {{$checkin->points-60}}/60
                        </div>
                      @endif
                  </div>
                <div>                          
                      {{Form::open('checkin', 'PUT', array('class' => 'form-inline'))}}
                      {{Form::hidden('technology_id', $checkin->id)}}
                      <input type="image" src="/img/add.png"> {{HTML::link('technology/'.$checkin->id, $checkin->name)}}
                      {{Form::close()}}                
                  </div>
                </div>
              @endforeach


        </div> <!-- /sidebar -->
      </div> <!-- /col-md-2 -->

	</div>	
</div>
@endsection