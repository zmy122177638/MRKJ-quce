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
		<script src="https://cdn.bootcss.com/respond./quce/Public/js/1.4.2/respond.min.js"></script>    
    <![endif]-->
    <script src="/quce/Public/js/rem.js"></script>
    <style>
        *{margin:0;padding:0;}
        .result_item{padding:0.4rem;box-sizing: border-box;}
        .result_title{
            font-size:0.36rem;
            color: #000000;
            text-align: center;
            margin-bottom:0.4rem;
            text-shadow: 3px 3px 5px rgb(82, 80, 81);
        }
        .result_content{
            font-size:0.3rem;
            color:#333333;
            padding:0.3rem;
            text-indent: 2em;
            border:1px solid #dddddd;
            border-radius: 0.1rem;
            box-shadow:0 0 10px 5px rgb(83, 83, 85);
            position: relative;
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="result_container">
            <div class="result_wrap">
                <div class="result_item">
                    <div class="result_title"><?php echo ($arr['title']); ?></div>
                    <div class="result_content">
                        <p><?php echo ($arr['text']); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.history.pushState(null,null,location.href);
        window.addEventListener('popstate',function(){
            window.location.href="<?php echo U('Index/mytest','',false);?>"
        })
    </script>
</body>
</html>