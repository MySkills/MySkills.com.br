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
    <title>MySkills.com.br - Software Developer Meritocracy</title>
    
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
            mixpanel.people.set(
              'name':'{{$user->name}}'
              '$email':'{{$user->email}}'
            );
            mixpanel.name_tag('{{$user->name}}');
            mixpanel.track('{{$page}}', {'name':'{{$user->name}}'});
          </script>
        @else
        @endif
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
                        <li class="active"> {{HTML::link('/','Home')}} </a></li>
                    @else
                        <li> {{HTML::link('/','Home')}} </a></li>
                    @endif
                    @if ( Auth::guest() )                          
                        @if ($page=='features' )
                            <li class="active">{{HTML::link('features','Features')}}</a></li>
                        @else
                            <li>{{HTML::link('features','Features')}}</a></li>
                        @endif
                        @if ($page=='faq')
                            <li class="active">{{HTML::link('faq','FAQ')}} </a></li>
                        @else
                            <li>{{HTML::link('faq','FAQ')}} </a></li>
                        @endif
                    @endif                    
                    @if($page=='jobs')
                        <li class="active">{{HTML::link('jobs','Jobs')}}</a></li>
                    @else
                        <li>{{HTML::link('jobs','Jobs')}}</a></li>
                    @endif
                    @if($page=='leaderboard')
                        <li class="active">{{HTML::link('users','Users')}}</a></li>
                    @else
                        <li>{{HTML::link('users','Users')}}</a></li>
                    @endif
                    @if ($page=='badges')
                        <li class="active">{{HTML::link('badges','Badges')}} </a></li>
                    @else
                        <li>{{HTML::link('badges','Badges')}} </a></li>
                    @endif
                    @if ( Auth::guest() )            
                    @else                    
                        <li>{{HTML::link('logout','Logout')}} </a></li>
                    @endif                    
                </ul>
            </div><!--/.nav-collapse -->    

    
        </div> <!-- /container -->
        
    </div> <!-- /navbar-inner -->
    
</div> <!-- /navbar -->


                @yield('content')
    

            
<div id="extra">
    
    <div class="inner">
        
        <div class="container">
            
            <div class="row">
                
                <div class="span4">
                    
                <!-- Removed Quick Links -->                    

                </div> <!-- /span4 -->
                
                
                <div class="span4">
                    
                <!-- Removed Stay in Touch -->                    

                </div> <!-- /span4 -->
                
                <div class="span4">
                    
                    <h3><span class="slash">//</span> Subscribe and get updates</h3>
                    

                                                        <script type="text/javascript" language="JavaScript" src="http://myskills.us5.list-manage1.com/subscriber-count?b=28&u=00d2e3de-199f-4c91-ae5a-5433b3ea5e9f&id=30cd3f42fe"></script>
                    
             <div id="mc_embed_signup1">

                                    <form action="http://myskills.us5.list-manage1.com/subscribe/post?u=c22dec5cbd87c068118755814&amp;id=30cd3f42fe" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">

                                        <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>

                                        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>

                                    </form>

                                </div>

                    
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
                    &copy; 2012 Reboot Landing.
                </div> <!-- /span4 -->
                
                <div id="footer-terms" class="span8">
                    <a href="http://mixpanel.com/f/partner"><img src="http://mixpanel.com/site_media/images/partner/badge_blue.png" alt="Real Time Web Analytics" /></a>
                </div> <!-- /span8 -->
            </div> <!-- /row -->
            
        </div> <!-- /container -->
        
    </div> <!-- /inner -->
    
</div> <!-- /footer -->
    




<script src="./js/jquery-1.7.2.min.js"></script>    
<script src="./js/bootstrap.js"></script>
<script src="./js/lightbox/jquery.lightbox.min.js"></script>
<script src="./js/jcarousellite_1.0.1.js"></script>

<script>
    $(function () {
        $(".screenshot").lightbox();
    });
</script>
  </body>
</html>
