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
    <title>预测你容易得哪方面疾病</title>
    <!--[if lt IE 9]>  
        <script src="http://cdn.bootcss.com/html5shiv/r29/html5.js"></script>
        <script src="https://cdn.bootcss.com/respond./quce/Public/js/1.4.2/respond.min.js"></script>    
    <![endif]-->
    <link rel="stylesheet" href="/quce/Public/css/public_zm.css">
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

    </style>
    <style>
        body{background-color:#F9E0CD;}
        .top_message_wrap{
            margin:0.1rem;
            background:url('/quce/Public/images/jktest/zfy_biaotikuang.png') 0% 0% / 100% 100% no-repeat;
            min-height: 4rem;
            overflow: hidden;
        }
        .top_message_title{
            width:6.35rem;
            height:0.38rem;
            background:url('/quce/Public/images/jktest/zfy_dabiaoti.png') 0% 0% / 100% 100% no-repeat;
            margin:0.42rem auto 0.5rem;
        }
        .top_message_content{
            padding:0 0.3rem 0.3rem;
        }
        .comColor{color:#f73232;}
        .top_name{font-size:0.4rem;color:#f73232;font-weight:bold;margin-bottom:0.2rem;}
        .top_txt{font-size:0.32rem;color:#333333;line-height: 1.6;text-indent:2em;}
        .top_txt strong{color:#f74241;font-weight:bold;}
        .pay_wrap p{font-size:0.26rem;text-align: center;padding: 0.25rem 0;}
        .pay_wx{
            width:6.85rem;
            height:1.09rem;
            background: url('/quce/Public/images/jktest/zfy_wxzf.png') 0% 0% / 100% 100% no-repeat;
            margin:0 auto;
            margin-bottom:0.25rem;
            display: block;
        }
        .pay_zfb{
            width:6.85rem;
            height:1.1rem;
            background: url('/quce/Public/images/jktest/zfy_zfb.png') 0% 0% / 100% 100% no-repeat;
            margin:0 auto;
            display: block;
        }
        .lock_container{
            padding:0.2rem;
            
        }
        .lock_content{
            width:100%;
            min-height:9.94rem;
            background:url('/quce/Public/images/jktest/zfy_bj.png') 0% 0% / 100% 100% no-repeat;
            padding:0.5rem;
            box-sizing: border-box;
            position: relative;
        }
        .lock_title{font-size:0.38rem;color:#333333;margin-bottom:0.6rem;}
        .lock_ct{margin-bottom: 0.46rem;}
        .lock_ct p{margin-bottom:0.26rem;font-size:0.28rem;color:#333333;font-weight:bold;}
        .lock_ct p:nth-last-child(1){margin-bottom:0;}
        .lock_btn{
            width:5.3rem;
            height:0.8rem;
            line-height: 0.8rem;
            font-size:0.28rem;
            color:#ffffff;
            font-weight:bold;
            text-align:center;
            background-color:#f73232;
            border-radius:0.7rem;
            margin:0 auto;
        }
        .lock_btn::before{
            content:'';
            width:0.32rem;
            height:0.4rem;
            background:url('/quce/Public/images/jktest/zfy_suo.png') 0% 0% /100% 100%  no-repeat;
            display: inline-block;
            vertical-align:middle;
            margin-right:0.2rem;
        }
        .lock_bt{
            position: absolute;
            font-size:0.32rem;
            color:#333333;
            bottom:0.3rem;
            text-align: center;
            left:50%;
            transform: translateX(-50%);
            -webkit-transform: translateX(-50%);;
            -ms-transform: translateX(-50%);
        }
        .small_box{padding:0.56rem 0.3rem;}
        .small_point{font-size:0.24rem;color:#333333;padding-left:0.4rem;position:relative;line-height: 1.6;}
        .small_point::before{
            content:'注:';
            position: absolute;
            left:0;
            top:0;
        }
    </style>
    <style>
        /* 返回弹窗 */
        .back_popup_container{
            width:100%;
            height:100%;
            position: fixed;
            left:0;top:0;
            z-index: 95;
            display: none;
        }
        .back_popup_container.show{display: block;}
        .back_popup_container.show .back_popup_wrap{
            animation: popupShow .3s forwards ease-in;
        }
        @keyframes popupShow{
            0%{transform: scale(0.3);}
            100%{transform: scale(1)}
        }
        .back_popup_bg{
            width:100%;
            height:100%;
            background-color:rgba(0,0,0,0.7);
            position:absolute;
            top:0;left:0;
        }
        .back_popup_wrap{
            width:6.9rem;
            border-radius: 0.1rem;
            background-color:#ffffff;
            position: absolute;
            background:url('/quce/Public/images/jktest/tq_bj.png') 0% 0% / 100% 100% no-repeat;
            top:12%;
            left:50%;
            z-index: 3;
            margin-left:-3.45rem;
            
        }
        .back_popup_close{
            width:0.5rem;
            height:0.5rem;
            background: url('/quce/Public/images/cstest/btn_close.png') no-repeat;
            background-size:100% 100%;
            position: absolute;
            right: 0;top:-0.7rem;
        }
        .back_popup_title{
            font-size:0.56rem;
            color:#700f0f;
            text-align: center;
            margin:0.42rem 00.5rem;
        }
        .toChina{
            font-size:0.3rem;
            color: #333333;
            text-align: center;
        }
        .back_ul{
            list-style: none;
            display: flex;
            flex-wrap:wrap;
            justify-content:center;
            
        }
        .back_li{
            width:2.85rem;
            background:url('/quce/Public/images/jktest/tq_kuang.png') 0% 0% /100% 100% no-repeat;
            padding:0.4rem 0;
            text-align: center;
            margin:0.28rem 0.2rem 0;
        }
        .back_li p{font-size:0.3rem;color:#333333;}
        .back_li p strong{font-size:0.37rem;color:#c31616;}
        .point_1{
            text-align: center;
            font-size:0.51rem;
            color:#a85b22;
            font-weight:400;
            margin:0.1rem 0 0.26rem;
        }
        .point_2{
            text-align: center;
            font-size:0.63rem;
            color:#a04e17;
        }
        .back_popup_Btn{
            margin:0.4rem 0.5rem 0.5rem;
            height:1rem;
            line-height: 1rem;
            text-align: center;
            color:#ffffff;
            border-radius: 0.7rem;
            font-size:0.36rem;
            background:linear-gradient(#ff8585,#ef0d0d);
            background:-webkit-linear-gradient(#ff8585,#ef0d0d);
            box-sizing: border-box;
            box-shadow: 0 0.06rem #c21717;
        }   
    </style>
</head>
<body>
    <!-- header -->
    
<!-- header -->
<style>
    /* 新改头部 */
  .omd_header{
      height: 1rem;
      line-height: 1rem;
      overflow: hidden;
      background-color:#ffffff;
  }
  .omd_back{
      width:1rem;
      height: 1rem;
      float: left;
      background:url('/quce/Public/images/public/goHome.png') center no-repeat;
      background-size:0.48rem;;
  }
  .omd_home{
      color:#de2126;
      font-size:0.3rem;
      position: relative;
      display: inline-block;
      font-weight: bold;
  }
  .jiantou{
    display: inline-block;
    width:0.17rem;
    height:0.3rem;
    vertical-align: middle;
    background:url('/quce/Public/images/public/more.png')  no-repeat;
    background-size:100% 100%;
  }
  .omd_title{
      font-size:0.3rem;
      color:#666666;  
      position: relative;
      display: inline-block;
  }
  .omd_menu{
      float:right;
      width:1rem;
      height: 1rem;   
      background:url('/quce/Public/images/public/menu.png') center no-repeat;
      background-size:0.52rem;;
  }
  .omd_order{
      float:right;
      width:1rem;
      height: 1rem;   
      background:url('/quce/Public/images/public/mytest.png') center no-repeat;
      background-size:0.52rem;
  }
  /* omd_menu */
  .omd_menu_container{
    height:calc(100Vh - 1rem);
    width:100%;
    position: fixed;
    left:0;
    right: 0;
    bottom:0;
    border-top:2px solid #eeeeee;
    box-sizing: border-box;
    background-color:rgba(255,255,255,0.9);
    display: none;
    transform: translate3d(0,0,0);
    z-index: 99;
  }
  .omd_menu_container.on{
    display: block;
    opacity: 1;
  }
  .omd_menu_container.menuShow{
    animation: menuin 0.3s forwards ease-out;
    -webkit-animation: menuin 0.3s forwards ease-out;
  }
  .omd_menu_container.menuHidden{
    animation: menuOut 0.3s forwards ease-out;
    -webkit-animation: menuOut 0.3s forwards ease-out;
  }
  @keyframes menuin{
    0%{
      transform: scale(3);
      -webkit-transform: scale(3);
      -ms-transform: scale(3);
      -moz-transform: scale(3);
      opacity: 0;
    }
    100%{
      transform: scale(1);
      -webkit-transform: scale(1);
      -ms-transform: scale(1);
      -moz-transform: scale(1);
      opacity: 1;
    }
  }
  @keyframes menuOut{
    0%{
      transform: scale(1);
      -webkit-transform: scale(1);
      -ms-transform: scale(1);
      -moz-transform: scale(1);
      opacity: 1;
    }
    100%{
      transform: scale(3);
      -webkit-transform: scale(3);
      -ms-transform: scale(3);
      -moz-transform: scale(3);
      opacity: 0;
    }
  }
  .omd_menu_wrap{
    margin:0 0.3rem;
  }
  .omd_menu_ul{
    display: flex;
    flex-wrap: wrap;
    list-style: none;
  }
  .omd_menu_li{
    width:calc(100% / 3);
    margin-top:0.4rem;
  }
  .omd_menu_a{
    display: block;
  }
  .omd_menu_a figure img{
    width:1.3rem;
    height:1.3rem;
    vertical-align: middle;
    display: block;
    margin:0 auto;
  }
  .omd_menu_a p{
    font-size:0.36rem;
    color:#333333;
    text-align: center;
    line-height: 1.7;
  }
  </style>
  <!-- 头部 -->
  <header class="omd_header">
      <a href="<?php echo U('Index/index','',false);?>" class="omd_back"></a>
      <a href="<?php echo U('Index/index','',false);?>" class="omd_home">测算大全</a>
      <span class="jiantou"></span>
      <span class="omd_title"><?php echo (cookie('titleName')); ?></span>
      <span class="omd_menu"></span>
      <a href="<?php echo U('Index/mytest','',false);?>" class="omd_order"></a>
  </header>
  <!-- menu菜单 -->
  <aside class="omd_menu_container">
    <div class="omd_menu_wrap">
      <ul class="omd_menu_ul">
        <li class="omd_menu_li">
          <a href="http://www.yixueqm.com/zhiming/index.php/home-lnyc-index" class="omd_menu_a">
            <figure><img src="http://qiniu.ddznzj.com/media/180817/180817174139931.png" alt=""></figure>
            <p>2018运势</p>
          </a>
        </li>
        <li class="omd_menu_li">
          <a href="http://www.yixueqm.com/zhiming/index.php/home-bzjp-index" class="omd_menu_a">
            <figure><img src="http://qiniu.ddznzj.com/media/180817/180817174200502.png" alt=""></figure>
            <p>八字精批</p>
          </a>
        </li>
        <li class="omd_menu_li">
          <a href="http://www.yixueqm.com/zhiming/index.php/home-bzsy-index" class="omd_menu_a">
            <figure><img src="http://qiniu.ddznzj.com/media/180817/180817174511370.png" alt=""></figure>
            <p>事业运势</p>
          </a>
        </li>
        <li class="omd_menu_li">
          <a href="http://www.yixueqm.com/zhiming/index.php/home-szjx-index" class="omd_menu_a">
            <figure><img src="http://qiniu.ddznzj.com/media/180817/180817174524905.png" alt=""></figure>
            <p>数字解析</p>
          </a>
        </li>
        <li class="omd_menu_li">
          <a href="http://www.yixueqm.com/zhiming/index.php/home-xmcs-index" class="omd_menu_a">
            <figure><img src="http://qiniu.ddznzj.com/media/180817/180817174547665.png" alt=""></figure>
            <p>姓名详批</p>
          </a>
        </li>
        <li class="omd_menu_li">
          <a href="http://www.yixueqm.com/zhiming/index.php/home-bzcy-index" class="omd_menu_a">
            <figure><img src="http://qiniu.ddznzj.com/media/180817/180817174607455.png" alt=""></figure>
            <p>八字财运</p>
          </a>
        </li>
        <li class="omd_menu_li">
          <a href="http://www.yixueqm.com/zhiming/index.php/home-Lnyc2019-index" class="omd_menu_a">
            <figure><img src="/quce/Public/images/public/menu_01.png" alt=""></figure>
            <p>2019年运势</p>
          </a>
        </li>
        <li class="omd_menu_li">
          <a href="http://www.yixueqm.com/zhiming/index.php/home-hyzs-index" class="omd_menu_a">
            <figure><img src="http://qiniu.ddznzj.com/media/180817/180817174614741.png" alt=""></figure>
            <p>婚缘走势</p>
          </a>
        </li>
        <li class="omd_menu_li">
          <a href="http://www.yixueqm.com/zhiming/index.php/home-bzhh-index" class="omd_menu_a">
            <figure><img src="http://qiniu.ddznzj.com/media/180817/180817174148357.png" alt=""></figure>
            <p>八字合婚</p>
          </a>
        </li>
        <li class="omd_menu_li">
          <a href="http://www.yixueqm.com/zhiming/index.php/home-bzhh-index" class="omd_menu_a">
            <figure><img src="/quce/Public/images/public/menu_02.png" alt=""></figure>
            <p>宝宝起名</p>
          </a>
        </li>
        <li class="omd_menu_li">
          <a href="http://www.yixueqm.com/zhiming/index.php/home-lath-index" class="omd_menu_a">
            <figure><img src="/quce/Public/images/public/menu_03.png" alt=""></figure>
            <p>恋爱桃花运</p>
          </a>
        </li>
        <li class="omd_menu_li">
          <a href="http://www.yixueqm.com/zhiming/index.php/home-xzcs-index" class="omd_menu_a">
            <figure><img src="/quce/Public/images/public/menu_04.png" alt=""></figure>
            <p>星盘测算</p>
          </a>
        </li>
        <li class="omd_menu_li">
          <a href="http://www.yixueqm.com/zhiming/index.php/home-pfc-index" class="omd_menu_a">
            <figure><img src="/quce/Public/images/public/menu_05.png" alt=""></figure>
            <p>选吉日</p>
          </a>
        </li>
        <li class="omd_menu_li">
          <a href="http://www.yixueqm.com/zhiming/index.php/home-zwds-index" class="omd_menu_a">
            <figure><img src="/quce/Public/images/public/menu_06.png" alt=""></figure>
            <p>一生运势</p>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <script>
    // $().ready(function(){
    //   var isHome = "<?php echo ($titleName['number']); ?>";
    //   if(isHome == '1'){
    //     $('.omd_menu').show();
    //     $('.myOrderNav').show();
    //     $('.omd_order').show();
    //   }
    // });
    $('.omd_menu').on('click',function(){
      var $node = $('.omd_menu_container');
      $('.omd_menu_container').addClass('on');
      $('.omd_menu_container').toggleClass('menuShow');
      if(!$('.omd_menu_container').hasClass('menuShow')){
        $('.omd_menu_container').addClass('menuHidden');
        setTimeout(function(){
          $('.omd_menu_container').removeClass('menuHidden');
          $('.omd_menu_container').removeClass('on');
        },300)
      }
    })
  </script>
    <!--  -->
    <div class="top_message_wrap">
        <h3 class="top_message_title"></h3>
        <div class="top_message_content">
            <h4 class="top_name"><?php echo (cookie('znickname')); ?>：</h4>
            <p class="top_txt">
                您好！您今年<?php echo ($dataArr['age']); ?>岁，<?php echo ($dataArr['age']); ?>岁是<strong><?php echo ($dataArr['text']); ?></strong>,潜伏到逐渐暴露的阶段，如果您近期易累，一定要认真进行本检测。
            </p>
        </div>
    </div>
    <div class="pay_wrap">
        <p>优惠价格: <span class="comColor"><?php echo (cookie('price')); ?>元</span></p>
        <div class="pay_box">
            <?php if($wxlogin == 1): ?><a href="javascript:;" class="pay_wx" onclick="wxzf()"></a>
                <?php else: ?>
            <a href="<?php echo U('Paycs/paywx','',false);?>?csName=健康测试" class="pay_wx"></a>
            <a href="<?php echo U('Paycs/payzfb','',false);?>?csName=健康测试" class="pay_zfb"></a><?php endif; ?>
        </div>
        <p>距优惠结束：<span class="comColor yhTime"><?php echo (cookie('price')); ?>元</span></p>
    </div>
    <div class="lock_container">
        <div class="lock_content">
            <h4 class="lock_title">付费后您将开始检测并获得一份价值500元的身体体质分析报告，报告包含以下方面：</h4>
            <div class="lock_ct">
                <p>1.您的体质属于虚、实、寒、热？</p>
                <p>2.身体有什么重大疾病可能，如心脑血管、糖尿病、中风、癌病、肾病......等等。</p>
                <p>3.人体经络和穴位评估身体整体能量的变化和健康情况。</p>
                <p>4.从饮食、起居、精神等方面给您调养建议。</p>
                <p>5.五脏六腑的基本，体能元气、精神压力、心血管肿病、内分泌等人体各方面问题。</p>
            </div>
            <div class="lock_btn">解锁查看详批内容</div>
            <p class="lock_bt">共113页</p>
        </div>
    </div>
    <div class="small_box">
        <p class="small_point">
            预测以用户输入的信息为准，提供详细准确的个人信息为准，本结果仅供参考和学习研究之用，不作为最终的医疗判断。
        </p>
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
                <?php if($wxlogin == 1): ?><a href="javascript:;" class="ConfirmPaybtn wxzf" onclick="wxzf()">微信支付</a>
                    <?php else: ?>
                    <a class="ConfirmPaybtn" href="<?php echo U('Paycs/paywx','',false);?>?csName=健康测试" >微信支付</a>
                    <a class="ConfirmPaybtn" href="<?php echo U('Paycs/payzfb','',false);?>?csName=健康测试">支付宝支付</a><?php endif; ?>
            </div>
        </div>
    </div>
    <!-- 返回弹窗 -->
    <div class="back_popup_container">
        <div class="back_popup_bg"></div>
        <div class="back_popup_wrap">
            <div class="back_popup_close"></div>
            <h4 class="back_popup_title">你知道吗？</h4>
            <p class="toChina">【在中国】</p>
            <ul class="back_ul">
                <li class="back_li">
                   <p><strong>100个</strong>成年人</p>
                   <p><strong>35个糖尿病</strong></p>
                </li>
                <li class="back_li">
                   <p>每天因心脑血管疾病</p>
                   <p>死亡人数<strong>260万</strong></p>
                </li>
                <li class="back_li">
                   <p><strong>13个</strong>人当中</p>
                   <p><strong>9.5个亚健康</strong></p>
                </li>
                <li class="back_li">
                   <p><strong>六成人</strong>长时间工作</p>
                   <p>处于<strong>过度劳累</strong>状态</p>
                </li>
            </ul>
            <h4 class="point_1">你的身体有无隐含重大风险?</h4>
            <h4 class="point_2">真的健康无暗病吗?</h4>
            <div class="back_popup_Btn J_pay_event">立即检测身体问题</div>
        </div>
    </div>    
    <script>
        $('.lock_btn').click(function(){
            $('#ConfirmPaybox').addClass('showConfirm');
        })
        $('#ConfirmPaybg').click(function(){
            $('#ConfirmPaybox').removeClass('showConfirm');
        })
        window.history.pushState('',null,'');
        window.addEventListener('popstate',function(e){
            $('.back_popup_container').addClass('show');
        })
        $('.back_popup_close').on('click',function(){
            $('.back_popup_container').removeClass('show');
        })
        $('.J_pay_event').click(function(){
            $.getJSON("<?php echo U('Paycs/zhifu_return','',false);?>",function(data){});//返回支付按钮统计
            $('#ConfirmPaybox').addClass('showConfirm');
        })
        function wxzf(){
            $.getJSON("<?php echo U('Paycs/zhifu_tj','',false);?>",function(data){});//支付按钮

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
                        location.href="<?php echo U('Paycs/answerPage','',false);?>";
                    }     // 使用以上方式判断前端返回,微信团队郑重提示：res.err_msg将在用户支付成功后返回    ok，但并不保证它绝对可靠。
                }
            );
        }
        // 计时
        new AnlesPlugin.countDownUp({
            setHDTime:2*60*60,
            countName:'countDownTime',
            loop:true, 
            type:'MaxHours',
            callback(timeArr){
                $('.yhTime').text(timeArr[0]+':'+timeArr[1]+':'+timeArr[2])
            }
        })
    </script>
</body>
</html>