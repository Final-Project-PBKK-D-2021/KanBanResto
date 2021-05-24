<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie6"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie7"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie8"> <![endif]-->
<!--[if IE 9 ]>
<html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('pageTitle')</title>
    <link rel="icon" href="{{asset('assets/images/logo-lkihi.png')}}">
    <!-- For iPhone 4 Retina display: -->
    <link rel="apple-touch-icon-precomposed"
          href="{{asset('assets')}}/images//apple-touch-icon-114x114-precomposed.png">
    <!-- For iPad: -->
    <link rel="apple-touch-icon-precomposed" href="{{asset('assets')}}/images//apple-touch-icon-72x72-precomposed.png">
    <!-- For iPhone: -->
    <link rel="apple-touch-icon-precomposed" href="{{asset('assets')}}/images//apple-touch-icon-57x57-precomposed.png">
    <!-- Library - Google Font Familys -->
    <link
        href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900|Vollkorn:400,400i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/revolution/css/settings.css">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets')}}/revolution/fonts/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets')}}/revolution/fonts/font-awesome/css/font-awesome.min.css">
    <!-- RS5.3 Layers and Navigation Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/revolution/css/navigation.css">
    <!-- Library -->
    <link href="{{asset('assets')}}/css/lib.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/flags.css" rel="stylesheet">
    <!-- Custom - Common CSS -->
    <link href="{{asset('assets')}}/css/plugins.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/elements.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/rtl.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="{{asset('css')}}/app.css">
    <!--[if lt IE 9]>
    <script src="js/html5/respond.min.js"></script>
    <![endif]-->
    @yield('stylesheet')
    @yield('style')
    @yield('script')
</head>
<body data-offset="200" data-spy="scroll" data-target=".ownavigation" style="background-color: #b89b5e;">
<!-- Loader -->
<div id="site-loader" class="load-complete">
    <div class="loader">
        <div class="loader-inner ball-clip-rotate">
            <div></div>
        </div>
    </div>
</div><!-- Loader /- -->

@yield('pageContent')

<!-- JQuery v1.12.4 -->
<script src="{{asset('assets')}}/js/jquery-1.12.4.min.js"></script>
<!-- Library - Js -->
<script src="{{asset('assets')}}/js/lib.js"></script>
<script src="{{asset('assets')}}/js/jquery.flagstrap.min.js"></script>
<script src="{{asset('assets')}}/js/jquery.knob.js"></script>
<!-- RS5.3`````` Core JS Files -->
<script type="text/javascript"
        src="{{asset('assets')}}/revolution/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
<script type="text/javascript"
        src="{{asset('assets')}}/revolution/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>
<script type="text/javascript"
        src="{{asset('assets')}}/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script type="text/javascript"
        src="{{asset('assets')}}/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript"
        src="{{asset('assets')}}/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript"
        src="{{asset('assets')}}/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<!-- Library - Theme JS -->
<script src="{{asset('assets')}}/js/functions.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VMCBY7D0ST"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'G-VMCBY7D0ST');
</script>
</body>
</html>
