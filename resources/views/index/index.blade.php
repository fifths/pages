<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>bt1080</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/" title="bt天堂1024">BT天堂1024</a>
        </div>
        <div class="navbar-collapse collapse" role="navigation">
            <ul class="nav navbar-nav text-center">
                <!--<li><a href="#" target="_blank">Bootstrap2中文文档</a></li>-->
                <!--<li class="text-center"></li>-->
                    <form class="navbar-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/about/">关于</a></li>
            </ul>
        </div>
    </div>
</div>

<!--
<div class="jumbotron masthead">

    123
</div>-->
    <div class="container l-head-nav bgs">
        <ul class="nav nav-pills">
            <li ><a href="#"> link</a></li>
            <li ><a href="#"> link</a></li>
            <li ><a href="#"> link</a></li>
            <li ><a href="#"> link</a></li>
            <li ><a href="#"> link</a></li>
            <li ><a href="#"> link</a></li>
            <li ><a href="#"> link</a></li>
            <li ><a href="#"> link</a></li>
            <li ><a href="#"> link</a></li>
            <li ><a href="#"> link</a></li>
            <li ><a href="#"> link</a></li>
            <li ><a href="#"> link</a></li>
            <li ><a href="#"> link</a></li>
            <li ><a href="#"> link</a></li>
            <li ><a href="#"> link</a></li>
            <li ><a href="#"> link</a></li>
            <li ><a href="#"> link</a></li>
            <li ><a href="#"> link</a></li>
            <li ><a href="#"> link</a></li>
            <li ><a href="#"> link</a></li>
        </ul>
    </div>
<div class="container bgs">
<div class="alert alert-success">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    <span class="sr-only">Error:</span>
    Enter a valid email address
</div>
</div>
<div class="container bgs">
    <div class="row">
        <div class="col-md-8">
            <ol class="breadcrumb">
                最新
            </ol>

            @foreach ($articles as $article)

            <div class="row l-post">
                <div class="col-xs-2">
                    <img class="img-rounded img-responsive" src="/uploads/{{$article->picture}}" alt="..." >
                </div>
                <div class="col-xs-10">
                    <div class="title">
                        <p class="tt cl">
                            <a href="#" target="_blank" class=""><b><font color="#FF6600">{{$article->title}}<i>/{{$article->other_title}}</i>.{{$article->date}}</font></b></a>
                            <span class="pull-right"><font color="red">{{$article->created_at}}</font></span>
                        </p>
                        <p>又名：
                            <a href="/subject/27049.html" target="_blank">聊斋之宅妖</a>/聊斋之捉妖记/Monster Hunt
                        </p>
                        <p class="des">
                            {{$article->date}}(中国大陆<em>|</em>香港)<em>/</em>白百何<em>/</em>井柏然<em>/</em>姜武<em>/</em>金燕玲<em>/</em>钟汉良<em>/</em>曾志伟<em>/</em>吴君如<em>/</em>汤唯<em>/</em>姚晨<em>/</em>闫妮<em>/</em>保剑锋<em>/</em>王栎鑫<em>/</em>郭晓冬<em>/</em>李菁菁<em>/</em>田雨橙<em>/</em>张悦轩<em>/</em>许诚毅
                        </p>
                        <p class="rt">
                            豆瓣评分：<strong>{{$article->score}}</strong>{{--<em class="dian">.</em><em class="fm">2</em>--}} &nbsp;<a href="/jumpto.php?aid=27049" rel="nofollow" target="_blank" title="去豆瓣查看影片介绍"><em class="e_db"></em></a>
                        </p>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="l-line"></div>
                </div>
            </div>

            @endforeach

            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />            <br />
            <br />
            <br />
            <br />            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />


            <nav class="text-center">
                <ul class="pagination">
                    <li><a href="#" aria-label="Previous"><span aria-hidden="true">上一页</span></a></li>
                    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#" aria-label="Previous"><span aria-hidden="true">下一页</span></a></li>
                </ul>
            </nav>
        </div>
        <div class="col-md-2">
            <ol class="breadcrumb">
                最新
            </ol>
            {{--捉妖记/捉妖记.2015
            又名：聊斋之宅妖/聊斋之捉妖记/Monster Hunt
            2015(中国大陆|香港)/白百何/井柏然/姜武/金燕玲/钟汉良/曾志伟/吴君如/汤唯/姚晨/闫妮/保剑锋/王栎鑫/郭晓冬/李菁菁/田雨橙/张悦轩/许诚毅
            豆瓣评分：7.2--}}
        </div>
        <div class="col-md-2">
            <ol class="breadcrumb">
                最新
            </ol>
            {{--捉妖记/捉妖记.2015
            又名：聊斋之宅妖/聊斋之捉妖记/Monster Hunt
            2015(中国大陆|香港)/白百何/井柏然/姜武/金燕玲/钟汉良/曾志伟/吴君如/汤唯/姚晨/闫妮/保剑锋/王栎鑫/郭晓冬/李菁菁/田雨橙/张悦轩/许诚毅
            豆瓣评分：7.2--}}
        </div>
    </div>
</div>


<br />
<br />
<br />
<br />
<br />
<br />
<br />
<div class="container">
<div class="row bg-danger">
    <div class="col-md-1">.col-md-1</div>
    <div class="col-md-1">.col-md-1</div>
    <div class="col-md-1">.col-md-1</div>
    <div class="col-md-1">.col-md-1</div>
    <div class="col-md-1">.col-md-1</div>
    <div class="col-md-1">.col-md-1</div>
    <div class="col-md-1">.col-md-1</div>
    <div class="col-md-1">.col-md-1</div>
    <div class="col-md-1">.col-md-1</div>
    <div class="col-md-1">.col-md-1</div>
    <div class="col-md-1">.col-md-1</div>
    <div class="col-md-1">.col-md-1</div>
</div>
<div class="row bg-info">
    <div class="col-md-8">.col-md-8</div>
    <div class="col-md-4">.col-md-4</div>
</div>
<div class="row bg-primary">
    <div class="col-md-4">.col-md-4</div>
    <div class="col-md-4">.col-md-4</div>
    <div class="col-md-4">.col-md-4</div>
</div>
<div class="row bg-success">
    <div class="col-md-6">.col-md-6</div>
    <div class="col-md-6">.col-md-6</div>
</div>
</div>




<!--<nav class="main-navigation">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="navbar-header">
                        <span class="nav-toggle-button collapsed" data-toggle="collapse" data-target="#main-menu">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-bars"></i>
                        </span>
                </div>
                <div class="collapse navbar-collapse" id="main-menu">
                    <ul class="menu">
                        <li class="nav-current" role="presentation"><a href="/">首页</a></li>
                        <li  role="presentation"><a href="http://lumen.golaravel.com" title="Lumen中文文档"  target="_blank">Lumen</a></li>
                        <li  role="presentation"><a href="http://wenda.golaravel.com" title="Laravel问答社区"  target="_blank">问答社区</a></li>
                        <li  role="presentation"><a href="/laravel/docs/" title="Laravel 中文文档" target="_blank">中文文档</a></li>
                        <li  role="presentation"><a href="/post/laravel-documents-offline-package/" title="下载 Laravel 中文文档离线版">下载离线文档</a></li>
                        <li  role="presentation"><a href="http://www.laravel.com/api/" title="Laravel 框架 API" target="_blank">API</a></li>
                        <li  role="presentation"><a href="http://www.golaravel.com/php/" title="PHP 中文手册" target="_blank">PHP中文手册</a></li>
                        <li  role="presentation"><a href="http://www.phpcomposer.com" title="Composer 中文文档" target="_blank">Composer</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>-->
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />


<footer class="footer ">
    <div class="container">
        <div class="row footer-top">
            <div class="col-sm-6 col-lg-6">
                <h4>
                    <img src="http://static.bootcss.com/www/assets/img/logo.png">
                </h4>
                <p>本网站所列开源项目的中文版文档全部由<a href="http://www.bootcss.com/">Bootstrap中文网</a>成员翻译整理，并全部遵循 <a href="http://creativecommons.org/licenses/by/3.0/" target="_blank">CC BY 3.0</a>协议发布。</p>
            </div>
            <div class="col-sm-6  col-lg-5 col-lg-offset-1">
                <div class="row about">
                    <div class="col-xs-3">
                        <h4>关于</h4>
                        <ul class="list-unstyled">
                            <li><a href="/about/">关于我们</a></li>
                            <li><a href="/ad/">广告合作</a></li>
                            <li><a href="/links/">友情链接</a></li>
                            <li><a href="/hr/">招聘</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <h4>联系方式</h4>
                        <ul class="list-unstyled">
                            <li><a href="http://weibo.com/bootcss" title="Bootstrap中文网官方微博" target="_blank">新浪微博</a></li>
                            <li><a href="mailto:admin@bootcss.com">电子邮件</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <h4>旗下网站</h4>
                        <ul class="list-unstyled">
                            <li><a href="http://www.golaravel.com/" target="_blank">Laravel中文网</a></li>
                            <li><a href="http://www.ghostchina.com/" target="_blank">Ghost中国</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <h4>赞助商</h4>
                        <ul class="list-unstyled">
                            <li><a href="http://www.ucloud.cn/" target="_blank">UCloud</a></li>
                            <li><a href="https://www.upyun.com" target="_blank">又拍云</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <hr>
        <div class="row footer-bottom">
            <ul class="list-inline text-center">
                <li><a href="http://www.miibeian.gov.cn/" target="_blank">京ICP备11008151号</a></li><li>京公网安备11010802014853</li>
            </ul>
        </div>
    </div>
</footer>





<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>