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
        (function(c,a){var b,d,h,e;b=c.createElement("script");b.type="text/javascript";b.async=!0;b.src=("https:"===c.location.protocol?"https:":"http:")+'//api.mixpanel.com/site_media/js/api/mixpanel.2.js';d=c.getElementsByTagName("script")[0];d.parentNode.insertBefore(b,d);a._i=[];a.init=function(b,c,f){function d(a,b){var c=b.split(".");2==c.length&&(a=a[c[0]],b=c[1]);a[b]=function(){a.push([b].concat(Array.prototype.slice.call(arguments,0)))}}var g=a;"undefined"!==typeof f?g=
                    a[f]=[]:f="mixpanel";g.people=g.people||[];h="disable track track_pageview track_links track_forms register register_once unregister identify name_tag set_config people.set people.increment".split(" ");for(e=0;e<h.length;e++)d(g,h[e]);a._i.push([b,c,f])};a.__SV=1.1;window.mixpanel=a})(document,window.mixpanel||[]);
        mixpanel.init("7f870774942301f4f0b1e8a1dd1f3e68");
    </script>
    <!-- end Mixpanel --> 
    <!-- start trak.io -->

    <script type="text/javascript">
    var trak=trak||[];trak.io=trak.io||{};trak.io.load=function(e){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src=("https:"===document.location.protocol?"https://":"http://")+"d29p64779x43zo.cloudfront.net/v1/trak.io.min.js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(t,n);var r=function(e){return function(){trak.push([e].concat(Array.prototype.slice.call(arguments,0)))}},i=["initialize","identify","track","alias","channel","source","host","protocol","page_view"];for(var s=0;s<i.length;s++) trak.io[i[s]]=r(i[s]);trak.io.initialize.apply(trak.io,arguments)};
    trak.io.load('0a7cc89fab378af388fb08d4af81138266014b73');
    </script>
    <!-- end trak.io --> 

    {{HTML::script('js/jquery-1.7.2.min.js')}}
<head>
    <meta charset="utf-8">
    <title>{{__('main.title')}}</title>
    @if(isset($og_type))
        <meta property="fb:app_id" content="380703318658533" />
        <meta property="og:type"   content="{{$og_type}}" />
    @else
        <meta property="og:type" content="website" />
    @endif
    @if(isset($og_points))
        <meta property="og:points"   content="{{$og_points}}" />
    @endif
    <meta property="og:url" content="{{URL::full()}}"/>    
    @if(isset($og_title))
        <meta property="og:title" content="{{$og_title}}"/>
    @else
        <meta property="og:title" content="Junte-se a nós."/>
    @endif
    @if(isset($og_image))
        <meta property="og:image" content="{{$og_image}}"/>
    @else
        <meta property="og:image" content="http://www.myskills.com.br/img/MySkills-64.png"/>
    @endif
    <meta property="og:site_name" content="MySkills.com.br"/>
    @if(isset($og_description))
        <meta property="og:description" content="{{$og_description}}"/>
    @else
        <meta property="og:description" content="A vida é muito curta para se escrever codigo ruim."/>
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    {{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600') }}  
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/bootstrap-responsive.css') }}  

    {{ HTML::style('css/font-awesome.css') }}

    {{ HTML::style('css/reboot-landing.css') }}
    {{ HTML::style('css/reboot-landing-responsive.css') }}
    {{ HTML::style('css/themes/green/theme.css') }}

    {{ HTML::style('css/pages/homepage.css') }}
    {{ HTML::style('css/plans.css') }}


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

                trak.io.identify({
                    name: '{{$user->name}}',
                    email: '{{$user->email}}',
                    avatar_url: '{{$user->getImageUrl("large")}}',
                    account_id: '{{$user->id}}'
                });
                trak.io.track('{{$page}}');
            </script>
        @endif
    @else
        <script>
            mixpanel.track('{{$page}}');
            trak.io.track('{{$page}}');            
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
                {{HTML::link('/','MySkills Logo', array('class' => 'brand'))}}
                <div class="nav-collapse">
                    <ul class="nav pull-right">
                        @if ($page == 'home')
                            <li class="active"> {{HTML::link('/', __('main.home'))}} </li>
                        @else
                            <li> {{HTML::link('/', __('main.home'))}} </li>
                        @endif
                        @if(Auth::check())
                            @if($user->provider == 'facebook')
                                <li><a href='#' onclick="FacebookInviteFriends();">{{__('main.invite')}}</a></li>
                            @endif
                        @endif
                        @if ($page=='badges')
                            <li class="active">{{HTML::link('badges',__('main.badges'))}}</li>
                        @else
                            <li>{{HTML::link('badges',__('main.badges'))}} </li>
                        @endif
                        @if($page=='technologies')
                            <li class="active">{{HTML::link('technologies',__('main.technologies'))}}</li>
                        @else
                            <li>{{HTML::link('technologies',__('main.technologies'))}}</li>
                        @endif
                        @if ( Auth::check())
                            <?php $count_messages = count(User::unreadmessages()); ?>
                            <li>
                                <a href="/messages"><i class="icon-envelope"></i>
                                    @if($count_messages > 0)
                                    <span class="badge badge-warning">{{$count_messages}}</span>
                                    @endif
                                </a>
                            </li>
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
                        <li class="dropdown">
                            <a id="profile" href="#" class="dropdown-toggle" data-toggle="dropdown">{{__('main.language')}}
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="profile">
                                <li class="presentation"><a  href="/en" role="menuitem" tabindex="-1">English</a></li>
                                <li class="presentation"><a  href="/pt" role="menuitem" tabindex="-1">Português</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a id="profile" href="#" class="dropdown-toggle" data-toggle="dropdown">{{__('main.help')}}
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="profile">
                                <li>{{HTML::link('upgrade',__('main.about'))}} </li>
                                <li>{{HTML::link('blog', __('main.blog'))}}</li>
                                <li>{{HTML::link('channel', __('main.channel'))}}</li>
                            </ul>
                        </li>

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
<a href="http://smallactsmanifesto.org" title="Small Acts Manifesto"><img src="/img/smallacts-badge-88x31-blue.png" style="border: none;" alt="Small Acts Manifesto" /></a>                </div> <!-- /span4 -->

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
                    <ul class="footer-links clearfix">
                        <li>{{HTML::link('termsofuse', 'Terms of Service')}}</li>
                    </ul>
                    <ul class="footer-links clearfix">
                        <li>{{HTML::link('privacypolicy', 'Privacy Policy')}}</li>
                    </ul>
                </div> <!-- /span8 -->
            </div> <!-- /row -->
            
        </div> <!-- /container -->
        
    </div> <!-- /inner -->
    
</div> <!-- /footer -->


        {{HTML::script('js/jquery.masonry.min.js')}}
        <script>

        $(document).ready(function() {
            var $container = $('#container');
            $container.imagesLoaded( function(){
              $container.masonry({
                itemSelector : '.box',
                gutterWidth: 1
              });
            });
            $container.masonry();
        });
        </script>

        {{HTML::script('js/bootstrap.js')}}

        @if(Auth::check())
            @if($user->provider == 'facebook')
                <!-- Facebook Request -->
                <script src="http://connect.facebook.net/en_US/all.js"></script>
                <script>
                FB.init({
                appId: '380703318658533',
                cookie:true,
                status:true,
                xfbml:true
                });

                function FacebookInviteFriends()
                {
                FB.ui({
                method: 'apprequests',
                message: "{{__('main.join')}}"
                });
                }
                </script>
            @endif
        @endif
    </body>
</html>
