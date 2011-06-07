<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Hello World</title>
	<meta name="description" content="Hi World">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">

	<!--[if lt IE 7 ]><meta http-equiv="imagetoolbar" content="no"><![endif]-->

  <link rel="stylesheet" href="/css/style.css?v=1">
  <script src="/js/modernizr-1.7.min.js"></script>
  <script src="http://cdn.jquerytools.org/1.2.5/full/jquery.tools.min.js"></script>
	<script src="/js/facebook.js"></script>
	  
</head>
<body>

  <div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
      FB.init({appId: '<?php echo $app_id; ?>', status: true, cookie: true,
               xfbml: true});
                
                FB.getLoginStatus(function(response) {
                   if (response.session) {
                     // logged in and connected user, someone you know
                     if (response.status == "connected")
                      window.location = "/hops/analyze";
                   } else {
                     // no user session available, someone you dont know
                     //alert('not logged in');
                   }
                 });
    
    };
    (function() {
      var e = document.createElement('script'); e.async = true;
      e.src = document.location.protocol +
        '//connect.facebook.net/en_US/all.js';
      document.getElementById('fb-root').appendChild(e);
    }());

  </script>

<div id="container">

<header>
<h2>Hello World From Kohana 3.1 with Facebook</h2>
</header>

  <fb:login-button 
        perms="email,user_status,user_online_presence,user_interests,user_likes,user_notes,user_hometown,user_about_me,user_activities,user_checkins,user_events"  
        redirect_url="<?php echo url::base(TRUE)?>hops/analyze"
        on-login="window.location='/hops/analyze';">Give us permission to analyze your profile data
  </fb:login-button>


<footer class="foot">
<p align="center">Some info here</p>
</footer>

</div>
  
<!--[if lt IE 7 ]>
    <script src="/js/libs/dd_belatedpng.js"></script>
    <script>DD_belatedPNG.fix("img, .png_bg"); // Fix any <img> or .png_bg bg-images. Also, please read goo.gl/mZiyb </script>
<![endif]-->

<script>
    var _gaq=[["_setAccount","UA-654330-1"],["_trackPageview"]];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
    s.parentNode.insertBefore(g,s)}(document,"script"));
</script> 

</body>
</html>