@layout('templates.main')
@section('content')
<div class="container">
	<div class="row">
      <div class="span2">
        <div class="sidebar">
          <h3><span class="slash">{{__('home.weare')}}.: {{User::count()}}</span></h3>          
          <h4><span class="slash">{{__('users.new_users')}}</span></h4>
        <table>
          @foreach ($newUsers as $user)
          
          <tr>
            <td>
              <a href="{{URL::to('/users/'.$user->id)}}">
                {{HTML::image($user->getImageUrl('square'), $user->name, array('width' => 50, 'height'=>50, 'title' => $user->name))}}
              </a>
            </td>
            <td>
              @foreach ($user->partial_badges(1) as $badge)
                <a href="{{URL::to('/badges/'.$badge->id)}}">
                  {{HTML::image('img/badges/'.$badge->image, $badge->name, array('width' => 50, 'height'=>50, 'title' => $badge->name))}}
                </a>
              @endforeach
              @for ($i = 1; $i <= (1-count($user->activebadges)); $i++)
                {{HTML::image('img/badges/unlock100.png', 'Unlock', array('width' => 50, 'height'=>50, 'title' => 'Unlock'))}}
              @endfor
            </td>
          </tr>
          @endforeach
        </table>


        </div> <!-- /sidebar -->
      </div> <!-- /span2 -->
    <div class="span8">
            <h1>Bem-vindo(a) ao MySkills</h1>
      {{Form::open('messages', 'PUT',array('class' =>'form-inline'))}}
      {{Form::textarea('text', '',array('class' =>'span7', 'placeholder' => __('wall.sendyourmessage'), 'rows' => '1' ))}}
      {{Form::submit(__('jobs.submit'), array('class' => 'btn-primary'))}}
      {{Form::close()}}     

        <table class="table-striped table-hover">
        @foreach($wallmessages as $wallmessage)
        <?php $user = User::find($wallmessage->sender_id) ?>
        <tr>
          <td>
            <a class="pull-left" href="{{URL::to('/users/'.$user->id)}}">
              {{HTML::image($user->getImageUrl('large'),  $user->name, array('width' => 50, 'height'=>50, 'hspace' => '15', 'title' => $user->name, 'class' => 'media-object'))}}
            </a>
          </td>
          <?php $messagedate = Date::forge($wallmessage->created_at)->ago(); ?>
          <td width="90">{{$messagedate}}</td>

            <td>
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
      <div class="span2">
        <div class="sidebar">
          <h3><span class="slash">Compartilhe</span></h3>
          <p>Através desse mural você conseguirá compartilhar informações
            com outros desenvolvedores. Nesse momento qualquer usuário pode ver as mensagens.
            Em breve, o mural será segmentado por nível do usuário.</p>
        </div> <!-- /sidebar -->
      </div> <!-- /span2 -->

	</div>	
</div>
@endsection