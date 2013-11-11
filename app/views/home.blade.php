@extends('layouts.master')
@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <div class="col-lg-4">
          <h1>MySkills</h1>  
          <h4 class="text-muted">Evolua suas habilidades.</h4>
        </div>
          <div class="col-lg-1">
            <img src="img/coins-pile.png" alt="Pilha de Moedas" height="75" align="left">
            <p class="text-center text-muted">$ 4.741,00</p>
          </div>

          <div class="col-lg-1">
            <img src="img/browserquest/level4.png" alt="Guerreiro nível 4" align="left">
            <p class="text-center text-muted">4</p>
          </div>
          <div class="col-lg-1">
            <img src="img/browserquest/level3.png" alt="Guerreiro nível 3" align="left">
            <p class="text-center text-muted">12</p>
          </div>
          <div class="col-lg-1">
            <img src="img/browserquest/level2.png" alt="Guerreiro nível 2" align="left">
            <p class="text-center text-muted">23</p>
          </div>
          <div class="col-lg-1">
            <img src="img/browserquest/level1.png" alt="Guerreiro nível 1" align="left">
            <p class="text-center text-muted">745</p>
          </div>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">

        <div class="col-lg-3">
          <h2>Poder de decisão</h2>
          <img src="img/coins-pile.png" alt="Pilha de Moedas" height="75" align="left">
          <p>Somos uma comunidade de desenvolvedores experimentando novos modelos de decisão  e remuneração.  Utilize o sistema diariamente
            e ganhe moedas virtuais que aumentam a sua influência na comunidade.</p>
        </div>

        <div class="col-lg-3">
          <h2>Múltiplos perfis</h2>
          <img src="img/browserquest/level4.png" alt="Guerreiro nível 4" align="left">
          <p>O sistema busca refletir o seu perfil. Quanto mais você utiliza, melhor ele reflete o seu perfil.</p>
          <ul>
            <li>Front-end</li>
            <li>Back-end</li>
            <li>Mobile</li>
            <li>Full-stack</li>
          </ul>
        </div>

        <div class="col-lg-3">
          <h2>Tecnologias</h2>
          <img src="img/badges/github.png" alt="Github" align="left" width="70">
          <p>Adquira badges e faça checkin nas tecnologias que você utiliza. Suba de nível em cada uma delas. Compare o seu perfil, descubra
          novas tecnologias e dê visibilidade aos seus conhecimentos.</p>
        </div>
        <div class="col-lg-3">
          <h2>Links</h2>
          <img src="img/badges/npmbundle.png" alt="Badge NPM" align="left" width="70">
          <p>Compartilhe links para frameworks, biliotecas e componentes que você utiliza no seu dia-a-dia. Receba semanalmente os links
            compartilhados por outros.</p>
        </div>
      </div>
@stop