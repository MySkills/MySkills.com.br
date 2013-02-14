<!DOCTYPE HTML>
<html lang="en">
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-32586156-1']);
    _gaq.push(['_setDomainName', 'myskills.com.br']);
    _gaq.push(['_trackPageview']);
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
    <!-- start Mixpanel -->
    <script type="text/javascript">
        /** Novo Mix panel **/
        (function(c,a){var b,d,h,e;b=c.createElement("script");b.type="text/javascript";b.async=!0;b.src=("https:"===c.location.protocol?"https:":"http:")+'//api.mixpanel.com/site_media/js/api/mixpanel.2.js';d=c.getElementsByTagName("script")[0];d.parentNode.insertBefore(b,d);a._i=[];a.init=function(b,c,f){function d(a,b){var c=b.split(".");2==c.length&&(a=a[c[0]],b=c[1]);a[b]=function(){a.push([b].concat(Array.prototype.slice.call(arguments,0)))}}var g=a;"undefined"!==typeof f?g=
                    a[f]=[]:f="mixpanel";g.people=g.people||[];h="disable track track_pageview track_links track_forms register register_once unregister identify name_tag set_config people.set people.increment".split(" ");for(e=0;e<h.length;e++)d(g,h[e]);a._i.push([b,c,f])};a.__SV=1.1;window.mixpanel=a})(document,window.mixpanel||[]);
        mixpanel.init("7f870774942301f4f0b1e8a1dd1f3e68");
    </script><!-- end Mixpanel --> 
<head>
    <meta charset="utf-8">
    <title>{{__('main.title')}}</title>
<script src="//cdn.optimizely.com/js/111465504.js"></script>
        <meta property="og:title" content="Meet the best developers"/>
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://www.myskills.com.br"/>
        <meta property="og:image" content="http://www.myskills.com.br/img/MySkills-64.png"/>
        <meta property="og:site_name" content="MySkills.com.br"/>
        <meta property="og:description" content="Hire the best professionals."/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/bootstrap-responsive.css') }}  
    {{ HTML::style('css/bootstrap-toggle-buttons.css') }}

    {{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600') }}  
    {{ HTML::style('css/font-awesome.css') }}

    {{ HTML::style('css/reboot-landing.css') }}
    {{ HTML::style('css/reboot-landing-responsive.css') }}
    {{ HTML::style('css/themes/green/theme.css') }}

    {{ HTML::style('css/pages/homepage.css') }}
    {{ HTML::style('css/plans.css') }}

    {{ HTML::style('js/lightbox/themes/default/jquery.lightbox.css') }}    

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    @if (Auth::check())
        <?php $user = User::find(Auth::user()->id); ?>
        @if(isset($user))
            <script>
                mixpanel.identify('{{$user->id}}');
                mixpanel.people.set({
                    @if($page == 'register')
                    $created: '{{date('Y-m-d H:i:s')}}',
                    @endif
                    $last_login: '{{date('Y-m-d H:i:s')}}',
                    $name:'{{$user->name}}',
                    $email:'{{$user->email}}'
                });
                mixpanel.name_tag('{{$user->name}}');
                mixpanel.track('{{$page}}');
            </script>
        @endif
    @else
        <script>
            mixpanel.track('{{$page}}');
        </script>
    @endif

</head>
<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                {{HTML::link('/','Reboot Admin', array('class' => 'brand'))}}
                <div class="nav-collapse">
                    <ul class="nav pull-right">
                        @if ($page == 'home')
                            <li class="active"> {{HTML::link('/', __('main.home'))}} </li>
                        @else
                            <li> {{HTML::link('/', __('main.home'))}} </li>
                        @endif
                        @if ($page=='upgrade')
                            <li class="active">{{HTML::link('upgrade',__('upgrade.professionalupgrade'))}}</li>
                        @else
                            <li>{{HTML::link('upgrade',__('upgrade.professionalupgrade'))}} </li>
                        @endif
                        @if ($page=='badges')
                            <li class="active">{{HTML::link('badges',__('main.badges'))}}</li>
                        @else
                            <li>{{HTML::link('badges',__('main.badges'))}} </li>
                        @endif
                        @if($page=='jobs')
                            <li class="active">{{HTML::link('jobs',__('main.jobs'))}}</li>
                        @else
                            <li>{{HTML::link('jobs',__('main.jobs'))}}</li>
                        @endif
                        @if ( Auth::check())
                            @if ($page=='profile')
                                <li class="dropdown active">
                            @else
                                <li class="dropdown">
                            @endif
                                    <a id="profile" href="#" class="dropdown-toggle" data-toggle="dropdown">{{$user->name}}
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="profile">
                                        <li class="presentation">{{HTML::link('profile',__('main.view'), array('role' => 'menuitem', 'tabindex' =>'-1'))}}</li>
                                        <li class="presentation">{{HTML::link('edit_user',__('main.edit'), array('role' => 'menuitem', 'tabindex' =>'-1'))}}</li>
                                        <li role="presentation" class="divider"></li>
                                        <li role="presentation">{{HTML::link('logout',__('main.logout'), array('role' => 'menuitem', 'tabindex' =>'-1'))}}</li>
                                    </ul>
                                </li>
                        @else
                                <li class="dropdown">
                                    <a id="profile" href="#" class="dropdown-toggle" data-toggle="dropdown">{{__('main.signin')}}
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="profile">
                                        <li class="presentation">{{HTML::link('connect/session/facebook', 'Facebook', array('role' => 'menuitem', 'tabindex' =>'-1'))}}</li>
                                        <li class="presentation">{{HTML::link('connect/session/github', 'Github', array('role' => 'menuitem', 'tabindex' =>'-1'))}}</li>
                                        <li class="presentation">{{HTML::link('connect/session/linkedin', 'Linkedin', array('role' => 'menuitem', 'tabindex' =>'-1'))}}</li>
                                    </ul>
                                </li>

                        @endif
                    </ul>
                </div><!--/.nav-collapse -->
            </div> <!-- /container -->
        </div> <!-- /navbar-inner -->
    </div> <!-- /navbar -->
    @yield('content')
    <div id="extra">
    <?php
      $users = User::order_by('lastlogin', 'desc')->take(25)->get();
    ?>

    @foreach($users as $user)
        {{HTML::image($user->getImageUrl('square'),  $user->name, array('width' => 50, 'height'=>50))}}
    @endforeach

    <div class="inner">

        <div class="container">

            <div class="row">
                
                <div class="span4">
                    <h3>Quick Links</h3>
                    <ul class="footer-links clearfix">
                        <li>{{HTML::link('termsofuse', 'Terms of Service')}}</li>
                    </ul>
                    <ul class="footer-links clearfix">
                        <li>{{HTML::link('privacypolicy', 'Privacy Policy')}}</li>
                    </ul>
                </div> <!-- /span4 -->

                <div class="span4">
                    <h3><span class="slash">//</span>{{__('main.subscribe_update')}}</h3>
                        <script type="text/javascript" language="JavaScript" src="http://myskills.us5.list-manage1.com/subscriber-count?b=28&u=00d2e3de-199f-4c91-ae5a-5433b3ea5e9f&id=30cd3f42fe"></script>
                        <div id="mc_embed_signup1">
                        <form action="http://myskills.us5.list-manage1.com/subscribe/post?u=c22dec5cbd87c068118755814&amp;id=30cd3f42fe" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
                            <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="{{__('main.email')}}" required>
                        <div class="clear"><input type="submit" value="{{__('main.subscribe')}}" name="subscribe" id="mc-embedded-subscribe" class="button">
                        </div>
                        </form>
                    </div>
                </div> <!-- /span4 -->

                <div class="span4">
                    <a href="http://mixpanel.com/f/partner"><img src="http://mixpanel.com/site_media/images/partner/badge_blue.png" alt="Real Time Web Analytics" /></a>                
                </div> <!-- /span4 -->

            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /inner -->
</div> <!-- /extra -->

<div id="footer">
                    
    <div class="inner">
    
        <div class="container">
        
            <div class="row">
                <div id="footer-copyright" class="span4">
                    &copy; 2012 MySkills.com.br
                </div> <!-- /span4 -->
                
                <div id="footer-terms" class="span8">

                </div> <!-- /span8 -->
            </div> <!-- /row -->
            
        </div> <!-- /container -->
        
    </div> <!-- /inner -->
    
</div> <!-- /footer -->
    



{{HTML::script('js/jquery-1.7.2.min.js')}}
{{HTML::script('js/bootstrap.js')}}
{{HTML::script('js/lightbox/jquery.lightbox.min.js')}}
{{HTML::script('js/jcarousellite_1.0.1.js')}}

<script>
    $(function () {
        $(".screenshot").lightbox();
    });
</script>
<!-- begin olark code --><script data-cfasync="false" type='text/javascript'>/*{literal}<![CDATA[*/
window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){f[z]=function(){(a.s=a.s||[]).push(arguments)};var a=f[z]._={},q=c.methods.length;while(q--){(function(n){f[z][n]=function(){f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={0:+new Date};a.P=function(u){a.p[u]=new Date-a.p[0]};function s(){a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{b.contentWindow[g].open()}catch(w){c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{var t=b.contentWindow[g];t.write(p());t.close()}catch(x){b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
/* custom configuration goes here (www.olark.com/documentation) */
olark.identify('8338-468-10-6680');/*]]>{/literal}*/</script><noscript><a href="https://www.olark.com/site/8338-468-10-6680/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript><!-- end olark code -->    
  </body>
</html>
