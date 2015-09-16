<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="stylesheet" href="{{ url('backend/assets/css/amazeui.min.css') }}"/>
    <link rel="stylesheet" href="{{ url('backend/assets/css/admin.css') }}">
    <link rel="stylesheet" href="{{ url('backend/assets/css/ext.css') }}">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

{{--<div class="am-cf admin-main">
</div>--}}
    <!-- content start -->
    {{--<div class="admin-content">--}}
        @yield('content')
    {{--</div>--}}
    <!-- content end -->




<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="{{ url('backend/assets/js/amazeui.ie8polyfill.min.js') }}"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="{{ url('backend/assets/js/jquery.min.js') }}"></script>
<!--<![endif]-->
<script src="{{ url('backend/assets/js/amazeui.min.js') }}"></script>
<script src="{{ url('backend/assets/js/app.js') }}"></script>
<script src="{{ url('layer/layer.js') }}"></script>
<script src="{{ url('backend/assets/js/ext.js') }}"></script>
@yield('js')
</body>
</html>
