<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MySkills.com.br - Software Developer Meritocracy</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/bootstrap-responsive.css') }}  
    
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
            
            <a class="brand" href="./">
                Reboot Admin                
            </a>            

            <div class="nav-collapse">
                <ul class="nav pull-right">
                @if ( Auth::guest() )            
                    <li class="active">{{HTML::link('/', 'Home')}} </a></li>                   
                    <li>{{HTML::link('features', 'Features')}} </a></li>                   
                    <li>{{HTML::link('faq', 'FAQ')}} </a></li>                                       
                @else                    
                    <li class="active"><a href="./">    Home        </a></li>
                    <li><a href="./features.html">      Features    </a></li>                                   
                    <li><a href="./pricing.html">       Plans       </a></li>                    
                    <li><a href="./features.html">      Features    </a></li>
                    <li><a href="./about.html">         About Us    </a></li>
                    <li><a href="./faq.html">           FAQ         </a></li>
                    <li><a href="./contact.html">       Contact Us  </a></li>
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
                    
                    <h3><span class="slash">//</span> Quick Links</h3>
                    
                    
                    <ul class="footer-links clearfix">
                        <li><a href="./">Home</a></li>
                        <li><a href="./pricing.html">Plans</a></li>
                        <li><a href="../features.html">Features</a></li>
                        <li><a href="./about.html">About</a></li>
                        <li><a href="./faq.html">FAQ</a></li>
                    </ul>
                    
                    <ul class="footer-links clearfix">      
                        <li><a href="javascript:;">Support</a></li>
                        <li><a href="javascript:;">License</a></li>
                        <li><a href="javascript:;">Terms of Use</a></li>
                        <li><a href="javascript:;">Privacy Policy</a></li>
                        <li><a href="javascript:;">Something Else</a></li>
                    </ul>
                    
                </div> <!-- /span4 -->
                
                
                <div class="span4">
                    
                    <h3><span class="slash">//</span> Stay In Touch</h3>
                    
                    
                    <p>There are real people behind Reboot Landing, so if you have a question or suggestion (no matter how small) please get in touch with us:</p>
                    
                    <ul class="social-icons-container">

                        
                        <li>                            
                            <a href="http://www.facebook.com/MySkills.com.br" class="social-icon social-icon-facebook">
                                Facebook
                            </a>
                        </li>
                        
                    </ul> <!-- /extra-social -->
                    
                </div> <!-- /span4 -->
                
                <div class="span4">
                    
                    <h3><span class="slash">//</span> Subscribe and get updates</h3>
                    

                    <p>Subscribe to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                    
                    
                    <form>
                        
                        <input type="text" name="subscribe_email" placeholder="Your Email" />
                        
                        <br />
                        
                        <button class="btn ">Subscribe</button>
                    </form>
                    
                    
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
