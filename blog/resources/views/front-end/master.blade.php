<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Flattern - Flat and trendy bootstrap site template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- css -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700"
          rel="stylesheet">
    <link href="{{asset('/')}}front-end/css/bootstrap.css" rel="stylesheet"/>
    <link href="{{asset('/')}}front-end/css/bootstrap-responsive.css" rel="stylesheet"/>
    <link href="{{asset('/')}}front-end/css/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="{{asset('/')}}front-end/css/jcarousel.css" rel="stylesheet"/>
    <link href="{{asset('/')}}front-end/css/flexslider.css" rel="stylesheet"/>
    <link href="{{asset('/')}}front-end/css/style.css" rel="stylesheet"/>
    <!-- Theme skin -->
    <link href="{{asset('/')}}front-end/skins/default.css" rel="stylesheet"/>
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="{{asset('/')}}front-end/ico/apple-touch-icon-144-precomposed.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="{{asset('/')}}front-end/ico/apple-touch-icon-114-precomposed.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="{{asset('/')}}front-end/ico/apple-touch-icon-72-precomposed.png"/>
    <link rel="apple-touch-icon-precomposed" href="{{asset('/')}}front-end/ico/apple-touch-icon-57-precomposed.png"/>
    <link rel="shortcut icon" href="{{asset('/')}}front-end/ico/favicon.png"/>

    <!-- =======================================================
      Theme Name: Flattern
      Theme URL: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/
      Author: BootstrapMade.com
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
<div id="app">
    <div id="wrapper">
        <!-- toggle top area -->
        @include('front-end.includes.header')

        <router-view></router-view>

        @include('front-end.includes.footer')
    </div>
    <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<!-- javascript
  ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('/')}}front-end/js/jquery.js"></script>
<script src="{{asset('/')}}front-end/js/jquery.easing.1.3.js"></script>
<script src="{{asset('/')}}front-end/js/bootstrap.js"></script>
<script src="{{asset('/')}}front-end/js/jcarousel/jquery.jcarousel.min.js"></script>
<script src="{{asset('/')}}front-end/js/jquery.fancybox.pack.js"></script>
<script src="{{asset('/')}}front-end/js/jquery.fancybox-media.js"></script>
<script src="{{asset('/')}}front-end/js/google-code-prettify/prettify.js"></script>
<script src="{{asset('/')}}front-end/js/portfolio/jquery.quicksand.js"></script>
<script src="{{asset('/')}}front-end/js/portfolio/setting.js"></script>
<script src="{{asset('/')}}front-end/js/jquery.flexslider.js"></script>
<script src="{{asset('/')}}front-end/js/jquery.nivo.slider.js"></script>
<script src="{{asset('/')}}front-end/js/modernizr.custom.js"></script>
<script src="{{asset('/')}}front-end/js/jquery.ba-cond.min.js"></script>
<script src="{{asset('/')}}front-end/js/jquery.slitslider.js"></script>
<script src="{{asset('/')}}front-end/js/animate.js"></script>

<!-- Template Custom JavaScript File -->
<script src="{{asset('/')}}front-end/js/custom.js"></script>

</body>
</html>
