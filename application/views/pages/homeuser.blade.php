@layout('templates.main')
@section('content')
<?php
  if (Auth::check()) {
    $user = User::find(Auth::user()->id);
    $user->logLastAccess();
  }
?>
<div class="container">
	<div class="row">
      <div class="span2">
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
      </div> <!-- /span2 -->
    <div class="span7">
            <h1>Bem-vindo(a) ao MySkills</h1>
      {{Form::open('messages', 'PUT',array('class' =>'form-inline'))}}
      {{Form::textarea('text', '',array('class' =>'span6', 'placeholder' => __('wall.sendyourmessage'), 'rows' => '1' ))}}
      {{Form::submit(__('jobs.submit'), array('class' => 'btn-success '))}}
      {{Form::close()}}     

        <table class="table-striped table-hover">
        @foreach($wallmessages as $wallmessage)
        <?php $messageuser = User::find($wallmessage->sender_id) ?>
        <tr>
          <td>
            <a class="pull-left" href="{{URL::to('/users/'.$user->id)}}">
              {{HTML::image($messageuser->getImageUrl('large'),  $messageuser->name, array('width' => 50, 'height'=>50, 'hspace' => '15', 'title' => $user->name, 'class' => 'media-object'))}}
            </a>
          </td>
          <?php $messagedate = Date::forge($wallmessage->created_at)->ago(); ?>
          <td width="90">{{$messagedate}}</td>
            <td>
              {{HTML::link('users/'.$wallmessage->user_id, $wallmessage->user_name)}}
              {{nl2br(htmlspecialchars($wallmessage->text))}}
            </td>          
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
      <div class="span3">
        <div class="sidebar">
          <h3><span class="slash">Seus Skills</span></h3>
              {{Form::open('checkin', 'PUT', array('class' => 'form-inline'))}}
              {{Form::submit("CHECKIN.: ".__('user.usedtoday').'.: ', array('class'=>'btn btn-success'))}}
              {{Form::select('technology_id', $technology_list)}}
              {{Form::close()}}
              @foreach($user->checkins as $checkin)
                @if(Auth::check())
                @endif
                <div class="row">
                  <div class="progress progress-info span1">
                    @if($checkin->level == 1)
                      <div class="bar" style="width: {{$checkin->points*5}}%;">{{$checkin->points}}/20 </div>
                    @endif
                    @if($checkin->level == 2)
                      <div class="bar" style="width: {{($checkin->points-19)*2.5}}%;">{{$checkin->points-20}}/40 </div>
                    @endif
                    @if($checkin->level == 3)
                      <div class="bar" style="width: {{($checkin->points-59)*1.66}}%;">{{$checkin->points-60}}/60 </div>
                    @endif
                  </div>

                      {{Form::open('checkin', 'PUT', array('class' => 'form-inline'))}}
                      {{Form::hidden('technology_id', $checkin->id)}}
                      <div>
                        <div class="row">
                          <div><input type="image" src="/img/add.png"> {{HTML::link('technology/'.$checkin->id, $checkin->name)}}</div>
                        </div>
                      </div>
                      {{Form::close()}}
                </div>
              @endforeach


        </div> <!-- /sidebar -->
      </div> <!-- /span2 -->

	</div>	
</div>
@endsection