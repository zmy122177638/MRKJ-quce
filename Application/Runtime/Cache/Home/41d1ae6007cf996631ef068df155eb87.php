<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="format-detection" content="telephone=no">
        <title>生肖运势</title>
        <!--[if lt IE 9]>  
            <script src="http://cdn.bootcss.com/html5shiv/r29/html5.js"></script>
            <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>    
        <![endif]-->
        <script src="/quce/Public/js/rem.js"></script>
		<style>
            *{margin:0;padding:0;}
			.zodiac_title{font-size:0.4rem;color:#94a6ba;padding:0.2rem 0;text-align: center;}
            .zodiac_ul{
                list-style: none;
                border-top:0.02rem solid #eeeeee;

                display: flex;
                flex-wrap: wrap;
            }
            .zodiac_ul li{
                width:25%;
                border-right: 0.02rem solid #eeeeee;
                border-bottom:  0.02rem solid #eeeeee;
                box-sizing: border-box;
            }
            .zodiac_ul li:nth-child(4n){border-right:none;}
            .zodiac_ul li .zodiac_navito{
                -webkit-tap-highlight-color: transparent;
                padding:0.2rem;
                display: block;
                box-sizing: border-box;
            }
		</style>
	</head>
	<body>
        <div class="zodiac_container">
            <h2 class="zodiac_title">请选择您要查看的属相</h2>
            <div class="zodiac_content">
                <ul class="zodiac_ul">
                    <li><a href="<?php echo U('Zodiac/zodiacYs','',false);?>?zodiac=鼠" class="zodiac_navito"><img src="/quce/Public/images/zodiac/1.png" width="100%" alt=""></a></li>
                    <li><a href="<?php echo U('Zodiac/zodiacYs','',false);?>?zodiac=牛" class="zodiac_navito"><img src="/quce/Public/images/zodiac/2.png" width="100%" alt=""></a></li>
                    <li><a href="<?php echo U('Zodiac/zodiacYs','',false);?>?zodiac=虎" class="zodiac_navito"><img src="/quce/Public/images/zodiac/3.png" width="100%" alt=""></a></li>
                    <li><a href="<?php echo U('Zodiac/zodiacYs','',false);?>?zodiac=兔" class="zodiac_navito"><img src="/quce/Public/images/zodiac/4.png" width="100%" alt=""></a></li>
                    <li><a href="<?php echo U('Zodiac/zodiacYs','',false);?>?zodiac=龙" class="zodiac_navito"><img src="/quce/Public/images/zodiac/5.png" width="100%" alt=""></a></li>
                    <li><a href="<?php echo U('Zodiac/zodiacYs','',false);?>?zodiac=蛇" class="zodiac_navito"><img src="/quce/Public/images/zodiac/6.png" width="100%" alt=""></a></li>
                    <li><a href="<?php echo U('Zodiac/zodiacYs','',false);?>?zodiac=马" class="zodiac_navito"><img src="/quce/Public/images/zodiac/7.png" width="100%" alt=""></a></li>
                    <li><a href="<?php echo U('Zodiac/zodiacYs','',false);?>?zodiac=羊" class="zodiac_navito"><img src="/quce/Public/images/zodiac/8.png" width="100%" alt=""></a></li>
                    <li><a href="<?php echo U('Zodiac/zodiacYs','',false);?>?zodiac=猴" class="zodiac_navito"><img src="/quce/Public/images/zodiac/9.png" width="100%" alt=""></a></li>
                    <li><a href="<?php echo U('Zodiac/zodiacYs','',false);?>?zodiac=鸡" class="zodiac_navito"><img src="/quce/Public/images/zodiac/10.png" width="100%" alt=""></a></li>
                    <li><a href="<?php echo U('Zodiac/zodiacYs','',false);?>?zodiac=狗" class="zodiac_navito"><img src="/quce/Public/images/zodiac/11.png" width="100%" alt=""></a></li>
                    <li><a href="<?php echo U('Zodiac/zodiacYs','',false);?>?zodiac=猪" class="zodiac_navito"><img src="/quce/Public/images/zodiac/12.png" width="100%" alt=""></a></li>
                </ul>
            </div>
        </div>
    </body>
</html>