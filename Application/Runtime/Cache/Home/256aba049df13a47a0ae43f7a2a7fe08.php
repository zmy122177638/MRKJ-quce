<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="format-detection" content="telephone=no">
    <title>趣味心理测试</title>
    <!--[if lt IE 9]>  
        <script src="http://cdn.bootcss.com/html5shiv/r29/html5.js"></script>
        <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>    
    <![endif]-->
    <link rel="stylesheet" href="/quce/Public/css/common.css">
    <script src="/quce/Public/js/rem.js"></script>
    <script src="/quce/Public/js/Headroom.js"></script>
    <style>
        .goBack{
            position: absolute;
            -webkit-tap-highlight-color: transparent;
            left:0.3rem;
            top:0;
            top:50%;
            transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
        }
        .goBack img{width:0.64rem;height:0.64rem;vertical-align: middle;}
        .list_title{
            font-size:0.34rem;
            color:#999999;
            text-align: center;
            height:0.88rem;
            line-height: 0.88rem;
            font-weight: 400;
            border-bottom:0.1rem solid #EFEFF4;
        }
        main{padding-top:0.9rem;}
        .classlist_wrap{
            display: flex;
            flex-wrap: wrap;
            list-style: none;
        }
        .classlist_wrap li{padding:0.16rem;width:50%;box-sizing:border-box;}
        .classlist_wrap li a{text-decoration: none;display: block;-webkit-tap-highlight-color: transparent;}
        .classlist_wrap li a img{width: 100%;vertical-align: middle;}
    </style>
</head>
<body>
    <header>
        <a href="javascript:history.go(-1)" class="page_back"></a>
        <h1 class="page_title">分类</h1>
        <a href="<?php echo U('Index/index','',false);?>" class="page_home"></a>
    </header>
    <main>
        <ul class="classlist_wrap">
            <li><a href=""><img src="/quce/Public/images/list_xz.png"  alt=""></a></li>
            <li><a href=""><img src="/quce/Public/images/list_ys.png"  alt=""></a></li>
            <li><a href=""><img src="/quce/Public/images/list_qg.png"  alt=""></a></li>
            <li><a href=""><img src="/quce/Public/images/list_xl.png"  alt=""></a></li>
            <li><a href=""><img src="/quce/Public/images/list_xg.png"  alt=""></a></li>
            <li><a href=""><img src="/quce/Public/images/list_zs.png"  alt=""></a></li>
            <li><a href=""><img src="/quce/Public/images/list_eg.png"  alt=""></a></li>
            <li><a href=""><img src="/quce/Public/images/list_qw.png"  alt=""></a></li>
            <li><a href=""><img src="/quce/Public/images/list_zsf.png"  alt=""></a></li>
            <li><a href=""><img src="/quce/Public/images/list_sy.png"  alt=""></a></li>
            <li><a href=""><img src="/quce/Public/images/list_jk.png"  alt=""></a></li>
        </ul>
    </main>
</body>
</html>