@layout('templates.manguezal_main')
@section('content')
<div id="applyNow" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"> APPLY NOW </h3>
  </div>
  <div class="modal-body">
    	We are always searching for talented professionals. 
    	Just sign-up below and we will get in touch with you soon.
    	<p></p>
		{{HTML::link('connect/session/facebook', 'Apply with Facebook', array('class' => 'btn btn-large'))}}
		{{HTML::link('connect/session/github', 'Apply with Github', array('class' => 'btn btn-large'))}}
		{{HTML::link('connect/session/linkedin', 'Apply with Linkedin', array('class' => 'btn btn-large'))}}
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">{{__('security.close')}}</button>
  </div>
</div>

<div id="subheader">	
	<div class="inner">
		<div class="container">
			<h1>{{__('manguezal.job_positions')}}</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->

<div id="gallery">
	<div class="item">
		<a 	href="#applyNow" 
			role="button" 
			data-toggle="modal" 
			data-target="#applyNow">
				{{HTML::image('img/manguezal/eventick.png', 'Eventick', array('width' => '310', 'height' => '105'))}}
		</a>
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/sequaz.png', 'Sequaz', array('width' => '310', 'height' => '105'))}}
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/conecta.png', 'Conecta.la', array('width' => '310', 'height' => '105'))}}
	</div>

	<div class="item">
		<a href="#">{{HTML::image('img/manguezal/surfguru.png', 'SurfGuru', array('width' => '310', 'height' => '105'))}}</a>
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/drbusca.png', 'Dr. Busca', array('width' => '310', 'height' => '105'))}}
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/eztiva.png', 'eztiva', array('width' => '310', 'height' => '105'))}}
	</div>

	<div class="item">
		<a href="#">{{HTML::image('img/manguezal/opara.png', 'Opará', array('width' => '310', 'height' => '105'))}}</a>
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/landscape.png', 'Landscape', array('width' => '310', 'height' => '105'))}}
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/favoritoz.png', 'Favoritoz', array('width' => '310', 'height' => '105'))}}
	</div>

	<div class="item">
		<a href="#">{{HTML::image('img/manguezal/redu.png', 'Redu', array('width' => '310', 'height' => '105'))}}</a>
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/bidcorp.png', 'Bidcorp', array('width' => '310', 'height' => '105'))}}
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/mobiclub.png', 'Mobiclub', array('width' => '310', 'height' => '105'))}}
	</div>

	<div class="item">
		<a href="#">{{HTML::image('img/manguezal/myskills.png', 'MySkills', array('width' => '310', 'height' => '105'))}}</a>
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/qualitasupply.png', 'Qualita Supply', array('width' => '310', 'height' => '105'))}}
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/pycursos.png', 'PyCursos', array('width' => '310', 'height' => '105'))}}
	</div>

	<div class="item">
		<a href="#">{{HTML::image('img/manguezal/ubee.png', 'Ubee', array('width' => '310', 'height' => '105'))}}</a>
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/guava.png', 'Guava', array('width' => '310', 'height' => '105'))}}
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/economize.png', 'Economize', array('width' => '310', 'height' => '105'))}}
	</div>

	<div class="item">
		<a href="#">{{HTML::image('img/manguezal/via0800.png', 'Via 0800', array('width' => '310', 'height' => '105'))}}</a>
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/seboslivres.png', 'Sebos Livres', array('width' => '310', 'height' => '105'))}}
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/icaregames.png', 'Icare Games', array('width' => '310', 'height' => '105'))}}
	</div>

	<div class="item">
		<a href="#">{{HTML::image('img/manguezal/naips.png', 'Naips', array('width' => '310', 'height' => '105'))}}</a>
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/publie.png', 'Publie', array('width' => '310', 'height' => '105'))}}
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/estuario.png', 'Estuario', array('width' => '310', 'height' => '105'))}}
	</div>

	<div class="item">
		<a href="#">{{HTML::image('img/manguezal/likemedia.png', 'LikeMedia', array('width' => '310', 'height' => '105'))}}</a>
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/idealizza.png', 'Idealizza', array('width' => '310', 'height' => '105'))}}
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/lookmobile.png', 'Look Mobile', array('width' => '310', 'height' => '105'))}}
	</div>

	<div class="item">
		<a href="#">{{HTML::image('img/manguezal/beagletech.png', 'Beagle Tech', array('width' => '310', 'height' => '105'))}}</a>
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/criticallab.png', 'Critical Lab', array('width' => '310', 'height' => '105'))}}
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/yetidev.png', 'Yeti', array('width' => '310', 'height' => '105'))}}
	</div>

	<div class="item">
		<a href="#">{{HTML::image('img/manguezal/pingmind.png', 'Pingmind', array('width' => '310', 'height' => '105'))}}</a>
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/bluwhee.png', 'Bluwhee', array('width' => '310', 'height' => '105'))}}
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/agoracompre.png', 'Agora Compre', array('width' => '310', 'height' => '105'))}}
	</div>

	<div class="item">
		<a href="#">{{HTML::image('img/manguezal/say2me.png', 'Say2Me', array('width' => '310', 'height' => '105'))}}</a>
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/mobipass.png', 'Mobi Pass', array('width' => '310', 'height' => '105'))}}
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/guaraling.png', 'Guaraling', array('width' => '310', 'height' => '105'))}}
	</div>

	<div class="item">
		<a href="#">{{HTML::image('img/manguezal/robolivre.png', 'RoboLivre', array('width' => '310', 'height' => '105'))}}</a>
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/azklepio.png', 'Azklepio', array('width' => '310', 'height' => '105'))}}
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/prodeaf.png', 'Prodeaf', array('width' => '310', 'height' => '105'))}}
	</div>

	<div class="item">
		<a href="#">{{HTML::image('img/manguezal/pocketstore.png', 'Pocketstore', array('width' => '310', 'height' => '105'))}}</a>
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/propost.png', 'Pro', array('width' => '310', 'height' => '105'))}}
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/coeus.png', 'Coeus', array('width' => '310', 'height' => '105'))}}
	</div>

	<div class="item">
		<a href="#">{{HTML::image('img/manguezal/brechoh.png', 'Brechoh', array('width' => '310', 'height' => '105'))}}</a>
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/plingideas.png', 'Pling Ideas', array('width' => '310', 'height' => '105'))}}
	</div>
	<div class="item">
		{{HTML::image('img/manguezal/30ideas.png', '30 ideas', array('width' => '310', 'height' => '105'))}}
	</div>
</div>

<div id="subpage">
	<div class="container">
		<div class="row">		
			<div class="span8">
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
			</div> <!-- /span8 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection