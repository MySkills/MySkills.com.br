<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>~ MANGUEZAL ~ A Community of Startups. Recife/PE - Brazil ~</title>

    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/bootstrap-responsive.css') }}  

    {{ HTML::style('css/manguezal.css') }}
    <link rel="shortcut icon" type="image/x-icon" href="files/favicon.ico">
    <body>
        <div id="header">     
            <nav>
                <p style="text-align: center; margin-top: -23px;">
                    {{HTML::image('img/manguezal/logo.png', 'Logo', array('height' => '50', 'title' => 'Logo'))}}
                </p>
            </nav>
        </div>

<br /><br /><br /><br /><br /><br />
    @yield('content')

<div id="information">
            <h2 style="text-align: center; border-top: 1px solid #d1d7cb; border-bottom: 1px solid #d1d7cb; background: #B49400;">Premiere Sponsor</h2>
            <p style="text-align: center; padding: 25px 0 25px 0; margin: 0;"><a href="http://icb.la/" target="_blank">
                {{HTML::image('img/manguezal/sponsor-icb.png')}}
            </a>
            </p>

            <h2 style="text-align: center; border-top: 1px solid #d1d7cb; border-bottom: 1px solid #d1d7cb; background: #B49400;">Powered By</h2>
            <p style="text-align: center; padding: 25px 0 25px 0; margin: 0;"><a href="http://www.myskills.com.br/en" target="_blank">
                {{HTML::image('img/manguezal/myskills.png')}}
            </a>
            </p>

        </div>
        <footer>
            <div id="footer-content">
                <div id="address">STOP TALKING. START MAKING.</div>       
                <!--
                <div id="contacts"><a id="mail" href="mailto:us@manguez.al">us@manguez.al</a> +55 (81) 8184-1128</div>
                -->
                <div id="contacts"><a id="mail" href="javascript:">MANGUEZ.AL</a>- Recife/PE - BRAZIL</div>
            </div>
        </footer> 
        {{HTML::script('js/jquery-1.7.2.min.js')}} 
       
        <script type="text/javascript">

          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-29516429-1']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();

        </script>       
    </body>
</html>