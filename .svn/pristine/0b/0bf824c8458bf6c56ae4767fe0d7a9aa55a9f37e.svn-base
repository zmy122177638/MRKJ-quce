<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="format-detection" content="telephone=no">
    <title>有趣的测算</title>
    <!--[if lt IE 9]>  
        <script src="http://cdn.bootcss.com/html5shiv/r29/html5.js"></script>
        <script src="https://cdn.bootcss.com/respond./quce/Public/js/1.4.2/respond.min.js"></script>    
    <![endif]-->
    <link rel="stylesheet" href="/quce/Public/css/common.css">
    <script src="/quce/Public/js/rem.js"></script>
    <style>
        body{background-color:#efeff4;}
        main{padding-top:0.92rem;}
        .login_container{margin-top:0.2rem;}
        .user_nav{list-style: none;}
        .user_nav li{margin-bottom:0.2rem;}
        .nav_i{
            text-decoration: none;
            display: flex;
            display: -webkit-flex;
            display: -webkit-box;
            align-items: center;
            -webkit-box-align: center;
            padding:0.3rem 0.25rem;
            background-color:#ffffff;
            color:#333333;
            font-size:0.28rem;
            -webkit-tap-highlight-color: rgba(255,255,255,0);
            position: relative;
        }
        .nav_genduo::after{
            content: '';
            width:0.26rem;height:0.26rem;
            position: absolute;
            display: inline-block;
            background:url('/quce/Public/images/arrow.png') no-repeat;
            background-size:100% 100%;
            right:0.4rem;
            top:50%;
            margin-top:-0.13rem;
        }
        .nav_t{
            padding:0.3rem 0.2rem;
            background-color:#EF4E3A;
            text-align: center;
            display: block;
            text-decoration: none;
            color:#ffffff;
            font-size:0.28rem;
            -webkit-tap-highlight-color: transparent;
        }
        .n_right p:nth-child(2){font-size:0.28rem;color:#8f8f94;}
        .n_right p:nth-child(2) span{color: #4a87ee;}
        .nav_navt{
            width:0.8rem;
            height:0.8rem;
            margin-right:0.2rem;
        }
    </style>
</head>
<body>
    <header class="animated">
    <nav>
        <a href="<?php echo U('Index/index','',false);?>" class="navigate <?php echo ($head=='index' ? 'active':''); ?>">首页</a>
        <a href="<?php echo U('Index/mytest','',false);?>" class="navigate <?php echo ($head=='mytest' ? 'active':''); ?>">我的历史</a>
        <?php if($channel == 'qudao150'): else: ?>
            <a href="<?php echo U('Login/index','',false);?>" class="navigate <?php echo ($head=='login' ? 'active':''); ?>">我的</a><?php endif; ?>

        <!--active-->
    </nav>
</header>
    <main>
        <div class="login_container">
            <div class="user_content">
                <ul class="user_nav">
                    <?php if($userData['nickname'] == ''): ?><li>
                            <a href="<?php echo U('Login/login','',false);?>" class="nav_i">
                                <img src="http://qiniu.ddznzj.com/media/180601/180601180815365.png" alt="" class="nav_navt">
                                <div class="n_right">
                                    <p>亲，您现在还是游客哦！</p>
                                    <p><span>立即登录</span>，享受更多服务</p>
                                </div>
                            </a>
                        </li>
                        <?php else: ?>
                        <li>
                            <a href="<?php echo U('Login/login','',false);?>" class="nav_i">
                                <img src="<?php echo ($userData['headimgurl']); ?>" alt="" class="nav_navt">
                                <div class="n_right">
                                    <p><?php echo ($userData['nickname']); ?></p>
                                    <p><span><?php echo ($userData['province']); ?></span><?php echo ($userData['city']); ?></p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Index/mytest','',false);?>" class="nav_i nav_genduo">
                                <p>我测过的</p>
                            </a>
                        </li><?php endif; ?>
                    <?php if($userData['nickname'] == ''): ?><li><a href="<?php echo U('Login/login','',false);?>" class="nav_t">立即登录</a></li>
                        <?php else: ?>
                        <li><a href="<?php echo U('Login/loginOut','',false);?>" class="nav_t">退出</a></li><?php endif; ?>

                </ul>
            </div>
        </div>
    </main>
</body>
</html>