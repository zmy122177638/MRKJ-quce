<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="format-detection" content="telephone=no">
    <!-- 去除浏览器地址栏和菜单栏 -->
    <meta name='apple-mobile-web-app-capable' content='yes' />
    <meta name='full-screen' content='true' />
    <meta name='x5-fullscreen' content='true' />
    <meta name='360-fullscreen' content='true' />
    <title>情商测试</title>
    <!--[if lt IE 9]>  
        <script src="http://cdn.bootcss.com/html5shiv/r29/html5.js"></script>
        <script src="https://cdn.bootcss.com/respond./quce/Public/js/1.4.2/respond.min.js"></script>    
    <![endif]-->
    <link rel="stylesheet" href="/quce/Public/css/public_zm.css">
    <link rel="stylesheet" href="/quce/Public/css/_cspay.css">
    <script src="/quce/Public/js/rem.js"></script>
    <script src="/quce/Public/js/Anles.js"></script>
    <script src="/quce/Public/js/jquery.min.js"></script>
    <style>
         /*pay confrim box*/
         .ConfirmPaybox {
            position: fixed;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            z-index: 99;
            display: none;
        }
        .ConfirmPaybg {
            display: block;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.4);
        }
        .ConfirmPayInfo {
            display: block;
            position: absolute;
            width: 100%;
            left: 0;
            bottom: 0;
            background-color: white;
            transform:translateY(217px);
            -webkit-transform:translateY(217px);
            -moz-transform:translateY(217px);
            -ms-transform:translateY(217px);
            -o-transform:translateY(217px);
        }
        .ConfirmPay-titlebox {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 0 0.2rem;
        }
        .ConfirmPay-title {
            text-align: left;
            color: #444444;
            font-weight: 900;
            margin: 0.41rem 0 0.31rem 0;
            font-size: 0.36rem;
            line-height: 0.36rem;
        }
        .ConfirmPay-list {
            font-size: 0.28rem !important;
            text-align: left;
            margin-bottom: 0.51rem;
            line-height: 0.28rem;
        }
        .ConfirmPay-list a {
            color: #808080;
            text-decoration: none;
            -webkit-tap-highlight-color: transparent;
        }
        .ConfirmPay-list span {
            color: #9596ab;
            text-decoration: underline;
        }
        .ConfirmPay-spliteline {
            display: block;
            height: 1px;
            background-color: #EEEEEE;
        }
        .ConfirmPay-prizebox {
            overflow: hidden;
            padding: 0 0.2rem;
            line-height: 1.8rem;
        }
        .ConfirmPay-prizetext {
            float: left;
            font-size:0.28rem;
            color: #999999;
        }
        .ConfirmPay-prize {
            float: right;
            font-size: 0.84rem;
            color: #444444;
            font-family: helvetica;
        }
        .ConfirmPaybtnbox {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 0 0.2rem 0.4rem 0.2rem;
        }
        .ConfirmPaybtnbox .ConfirmPaybtn:nth-child(1){margin-bottom:0.3rem;background-color: #00C800;}
        .ConfirmPaybtn{
            background-color: #56AAE6;
            font-size: 0.32rem;
            border-radius: 0.12rem;
            height:1rem;
            line-height: 1rem;
            text-align: center;
            display: block;
            color: white;
            -webkit-border-radius: 0.12rem;
            -moz-border-radius: 0.12rem;
            -ms-border-radius: 0.12rem;
            -o-border-radius: 0.12rem;
            -webkit-tap-highlight-color: transparent;
            text-decoration: none;
        }
        .ConfirmPaybtn::before{
            content:'';
            width:0.64rem;
            height:0.64rem;
            display: inline-block;
            vertical-align: middle;
            margin-right:0.3rem;
        }
        .ConfirmPaybtn:nth-child(1)::before{
            background:url('/quce/Public/images/wxzf.png') no-repeat;
            background-size:100% 100%;
        }
        .ConfirmPaybtn:nth-child(2)::before{
            background:url('/quce/Public/images/zfbzf.png') no-repeat;
            background-size:100% 100%;
        }
        .showConfirm {
            display: block;
        }
        /* animation */
        .showConfirm .ConfirmPayInfo {
            -webkit-animation:upin 0.3s 0s 1 ease normal forwards;
            animation: upin 0.3s 0s 1 ease normal forwards;
        }
        @keyframes upin {
            100% {
                transform:translateY(0);
                -webkit-transform:translateY(0);
                -moz-transform:translateY(0);
                -ms-transform:translateY(0);
                -o-transform:translateY(0);
            }
        }

        /* 修改 */
        body{background-color:#FFDEDE;}
        .seeBtn{
            height:1rem;
            line-height: 1rem;
            text-align: center;
            color:#ffffff;
            border-radius: 0.1rem;
            -webkit-border-radius: 0.1rem;
            -moz-border-radius: 0.1rem;
            -ms-border-radius: 0.1rem;
            font-size:0.34rem;
            background:linear-gradient(#ff8585,#ef0d0d);
            box-sizing: border-box;
            box-shadow: 0 0.06rem #c21717;
        }
        .paypage_box{
            background: url('/quce/Public/images/qstest/img_bj.png') no-repeat;
            background-size:100% 100%;
        }
    </style>
</head>
<body>
    <!-- header -->
    
<!-- header -->
<header class="public_header_container">
    <nav class="public_header_nav">
        <a href="<?php echo U('Index/index','',false);?>" class="public_header_home"></a>
        <h1 class="public_header_title"><?php echo (cookie('titleName')); ?></h1>
        <a href="<?php echo U('Index/mytest','',false);?>" class="public_header_mytest">我的测算</a>
    </nav>
</header>
    <div class="public_banner"><img src="/quce/Public/images/qstest/banner.png" width="100%" alt=""></div>
    <div class="paypage_content">
        <div class="paypage_box">
            <h3 class="box_title">您的情商分析报告</h3>
            <p class="seeCount"><?php echo ($csNum); ?>人已取得报告</p>
            <ul class="p_list">
                <li>1.内含您情商的整体情况详解，根据您的情商得分，分析您家庭、朋友、职场的人际关系差的症结。</li>
                <li>2.对比您的情绪控制及处理能力，让您直观了解自己情绪差的原因。</li>
                <li>3.各项情商能力一一对比，情商专家给您最专业的改善建议，让你能家和、人和、事和！</li>
            </ul>
            <p class="discount">优惠价19元</p>
            <div class="seeBtn J_pay_event">查看自己情商得分和处事能力分析报告</div>
            <p class="discountTime">距优惠结束还有：<span class="countTime"></span></p>
        </div>
        <div class="lock_test_box">
            <h3 class="lock_title">你将获得5大情商机密</h3>
            <div class="lock_img_box">
                <img class="J_pay_event" src="/quce/Public/images/qstest/img_01.png" width="100%" alt="">
                <img class="J_pay_event" src="/quce/Public/images/qstest/img_02.png" width="100%" alt="">
                <img class="J_pay_event" src="/quce/Public/images/qstest/img_03.png" width="100%" alt="">
                <img class="J_pay_event" src="/quce/Public/images/qstest/img_04.png" width="100%" alt="">
                <img class="J_pay_event" src="/quce/Public/images/qstest/img_05.png" width="100%" alt="">
            </div>
        </div>
    </div>
    <!-- 支付弹窗 -->
    <div id="ConfirmPaybox" class="ConfirmPaybox">
        <div id="ConfirmPaybg" class="ConfirmPaybg"></div>
        <div class="ConfirmPayInfo">
            <div class="ConfirmPay-titlebox">
                <p class="ConfirmPay-title"><?php echo ($answer['title']); ?></p>
                <p class="ConfirmPay-list"><a href="<?php echo U('Index/mytest','',false);?>">支付后的测试可在我的&nbsp;<span>我测过的</span>&nbsp;中查看。</a></p>
                <span class="ConfirmPay-spliteline"></span>
            </div>
            <div class="ConfirmPay-prizebox">
                <span class="ConfirmPay-prizetext">支付总额：</span>
                <span class="ConfirmPay-prize">￥<?php echo (cookie('price')); ?></span>
            </div>
            <div class="ConfirmPaybtnbox">
                <?php if($wxlogin == 1): ?><a href="javascript:;" class="ConfirmPaybtn wxzf">微信支付</a>
                    <?php else: ?>
                    <a class="ConfirmPaybtn" href="<?php echo U('Paycs/paywx','',false);?>" >微信支付</a>
                    <a class="ConfirmPaybtn" href="<?php echo U('Paycs/payzfb','',false);?>">支付宝支付</a><?php endif; ?>
            </div>
        </div>
    </div>
    <!-- 返回弹窗 -->
    <div class="back_popup_container">
        <div class="back_popup_bg"></div>
        <div class="back_popup_wrap">
            <div class="back_popup_close"></div>
            <h4 class="back_popup_title">快速获取专业情商测评报告</h4>
            <div class="back_popup_top">
                <img src="/quce/Public/images/qstest/img_BJ_back.png" class="back_popup_banner" alt="">
                <img src="/quce/Public/images/cstest/zhun.png" class="back_popup_zhun" alt="">
                <p class="back_popup_top_c">最专业情商报告解读，最权威的专家建议，助你走上人和、家和、事和之路。</p>
            </div>
            <div class="back_popup_Btn J_pay_event">立即领取</div>
            <p class="back_popup_count"><span><?php echo ($csNum); ?>人</span>已获取</p>
        </div>
    </div>
    <script>
        let URL = window.location.href;
        let totalArr = URL.split('?')[1].split('=')[1];
        let isWx = "<?php echo (cookie('wxlogin')); ?>";
        $('.J_pay_event').on('click',function(){
            $.post("<?php echo U('Paycs/jieguoyeJson','',false);?>",{totalArr},function(data){
                if(data){
                    if(isWx == 1){
                        wxzf();
                    }else{
                        $('#ConfirmPaybox').addClass('showConfirm');
                    }
                }else{
                    console.log('未缓存答题卡')
                }
            })    
        })
        $('.ConfirmPaybg').on('click',function(e){
            $('#ConfirmPaybox').removeClass('showConfirm');
        })
        
        window.history.pushState('',null,'');
        window.addEventListener('popstate',function(e){
            $('.back_popup_container').addClass('show');
        })
        $('.back_popup_close').on('click',function(){
            $('.back_popup_container').removeClass('show');
        })
        function wxzf(){
            WeixinJSBridge.invoke(
                'getBrandWCPayRequest', {
                    "appId":"<?php echo ($appId); ?>",     //公众号名称，由商户传入
                    "timeStamp":"<?php echo ($timeStamp); ?>",         //时间戳，自1970年以来的秒数
                    "nonceStr":"<?php echo ($nonceStr); ?>", //随机串
                    "package":"<?php echo ($package); ?>",
                    "signType":"<?php echo ($signType); ?>",         //微信签名方式：
                    "paySign":"<?php echo ($paySign); ?>" //微信签名
                },
                function(res){
                    if(res.err_msg == "get_brand_wcpay_request:ok" ) {
                        location.href="<?php echo U('Paycs/jieguoye','',false);?>";
                    }     // 使用以上方式判断前端返回,微信团队郑重提示：res.err_msg将在用户支付成功后返回    ok，但并不保证它绝对可靠。
                }
            );
        }
        $('.seeBtn').on('click',function(){
            //点击回调入库
            $.getJSON("<?php echo U('Paycs/zhifu_tj','',false);?>",function(data){});
        });
        $('.back_popup_Btn').on('click',function(){
            //点击回调入库
            $.getJSON("<?php echo U('Paycs/zhifu_return','',false);?>",function(data){});
        });

        new AnlesPlugin.countDownUp({
            setHDTime:86400,
            countName:'countDownTime',
            loop:true, 
            type:'MaxHours',
            callback(timeArr){
                $('.countTime').text(timeArr[1]+'分'+timeArr[2]+'秒')
            }
        })
    </script>
</body>
</html>