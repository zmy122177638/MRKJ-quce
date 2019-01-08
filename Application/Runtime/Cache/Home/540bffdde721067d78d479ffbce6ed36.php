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
    <link rel="stylesheet" href="/quce/Public/css/YD_calendar.min.css">

    <script type="text/javascript">
        var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan style='display:none;' id='cnzz_stat_icon_"+<?php echo ($channelID); ?>+"'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s19.cnzz.com/z_stat.php%3Fid%3D"+<?php echo ($channelID); ?>+"' type='text/javascript'%3E%3C/script%3E"));
    </script>

    <script src="/quce/Public/js/rem.js"></script>
    <script src="/quce/Public/js/jquery.min.js"></script>
    <script src="/quce/Public/js/layer_mobile/layer.js"></script>
    <script src="/quce/Public/js/YD_calendar.min.js"></script>
    <style>
        body{background-color:#F9E0CD;}
        .img_box{font-size:0;position: relative;}
        .img_box img{vertical-align: middle;}
        .leftm20{margin:0.2rem 0.2rem 0.2rem 0;}
        .rightm20{margin:0.2rem 0 0.2rem 0.2rem;}
        .rm18{margin-right:0.18rem;}
        .fiex_bt{
            height:0.8rem;
            line-height: 0.8rem;
            display: block;
            margin:0.1rem 0.2rem 0.1rem;
        }
        .jk_gif{
            position: absolute;
            padding:0.2rem;
            width:100%;
            box-sizing:border-box;
            top:0;
            left:0;
        }
        #video{
            position: absolute;
            padding:0.2rem;
            width:100%;
            box-sizing:border-box;
            top:0;
            left:0;
        }
        
        /* 表单 */
        .m_form_wrap{position: relative;margin:0.6rem 0.2rem 0.32rem;;}
        .m_form_title{
            width:3.7rem;
            font-size:0.32rem;
            color:#333333;
            height:0.72rem;
            line-height: 0.72rem;
            text-align: center;
            background:url('/quce/Public/images/jktest/ycjb_ziliao.png') 0% 0% /100% 100% no-repeat;
            position: absolute;
            top:-0.36rem;
            left:50%;
            margin-lefT:-1.85rem;
        }
        .m_form_ul{border:1px solid #FD9266;padding-top:0.4rem;background-color:#FFFFFF;}
        .m_form_ul li{margin-bottom:0;border:none;border-radius:0;border-bottom: 1px solid #bd9382;}
        .m_form_btnwrap{border-radius:0.7rem;font-weight:bold;}
        /* 悬浮按钮 */
        .public_sus_container{
            position: fixed;
            left:0;
            bottom:0;
            width: 100%;
            display: none;
            z-index: 40;        
        }
        .public_sus_container .public_sus_content{
            overflow: hidden;
            width: 100%;
            height:1rem;
            line-height: 1rem;
            background-color:rgba(0, 0, 0, 0.5);
        }
        /* menu */
        /* .public_menu_container{
            position: fixed;
            right:0.1rem;
            bottom:1.8rem;
        }
        .public_menu_content{
            display: flex;
            flex-direction: column;
            height:1.8rem;
            align-items: center;
            justify-content: space-between;
        }
        .public_menu_content .navigate{
            display:block;
            width:0.8rem;
            height:0.8rem;
            border-radius: 50%;
            padding:0;
        }
        .public_menu_content .navigate:nth-child(1){
            background:url('/quce/Public/images/public/home.png') center center no-repeat rgba(0, 0, 0, 0.5);
            background-size:0.48rem;
        }
        .public_menu_content .navigate:nth-child(2){
            background:url('/quce/Public/images/public/my.png') center center no-repeat rgba(0, 0, 0, 0.5);
            background-size:0.48rem;
        } */
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
    <div class="public_banner">
        <img src="/quce/Public/images/jktest/ycjb_banner.png" width="100%" alt="">
    </div>
    <div class="public_banner leftm20" id="scrollT">
        <img src="/quce/Public/images/jktest/ycjb_yiyi.png" width="100%" alt="">
    </div>
    <!-- main -->
    <main class="test_content">
        <div class="m_form_container">
            <form id="m_form" action="<?php echo U('Paycs/paypage','',false);?>" method="POST" id="frm">
                <div class="m_form_wrap">
                    <div class="m_form_title">请填写您的登记资料</div>
                    <ul class="m_form_ul">
                        <li>
                            <div class="f_left">您的姓名</div>
                            <div class="f_auto"><input type="text" id="username" name="username" placeholder="匿名 (可不填)"></div>
                        </li>
                        <li>
                            <div class="f_left">您的性别</div>
                            <div class="f_auto">
                                <label for="man">
                                    <input type="radio" name="gender" checked="checked" style="display: none" id="man" value="1">
                                    <span class="select"></span>
                                    <span class="sex_t">男</span>
                                </label>
                                <label for="woman">
                                    <input type="radio" name="gender" style="display: none" id="woman" value="0">
                                    <span class="select"></span>
                                    <span class="sex_t">女</span> 
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="f_left">出生日期</div>
                            <div class="f_auto"><input type="text" data-date="1985-04-18-7" data-id="birthday" id="datetime" readonly="true" placeholder="请选择出生日期"></div>
                            <input type="hidden" id="birthday" name="birthday">
                        </li>
                    </ul>
                </div>
                <div class="m_form_btnwrap J_formSubmit">立即检测身体问题</div>
                <p class="m_form_prompt">目前已有<span><?php echo ($clickTJ); ?>人</span>申请检测</p>
            </form>
        </div>
        <div class="img_container">
            <div class="img_box rightm20">
                <img src="/quce/Public/images/jktest/ycjb_smkg1.png" width="100%" alt="">
                <div class="img_box rm18">
                    <img src="/quce/Public/images/jktest/ycjb_smkg0.png" width="100%" alt="">
                    <!-- 视频 -->
                    <video id="video" controls="controls" width="vdBox" webkit-playsinline="true" x-webkit-airplay="true"  playsinline="true" poster="/quce/Public/images/jktest/poster.png" x5-video-player-type="h5" x5-video-player-fullscreen="true">
                        您的浏览器不支持 video 标签。
                        <source src="/quce/Public/images/jktest/jkvideo.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="img_box rm18">
                    <img src="/quce/Public/images/jktest/ycjb_smkg3.png" width="100%" alt="">
                </div>
            </div>
            <div class="img_box leftm20"><img src="/quce/Public/images/jktest/ycjb_zyjc.png" width="100%" alt=""></div>
            <div class="img_box rightm20">
                <div class="img_box">
                    <img src="/quce/Public/images/jktest/ycjb_zuanjia1.png" width="100%" alt="">
                </div>
                <div class="img_box rm18">
                    <img src="/quce/Public/images/jktest/ycjb_zuanjia2.png" width="100%" alt="">
                </div>
                <div class="img_box rm18">
                    <img src="/quce/Public/images/jktest/ycjb_zuanjia3.png" width="100%" alt="">
                </div>
            </div>
            <div class="img_box rightm20"><img src="/quce/Public/images/jktest/ycjb_yhpl.png" width="100%" alt=""></div>
            <div class="img_box leftm20"><img src="/quce/Public/images/jktest/ycjb_ycsm.png" width="100%" alt=""></div>
        </div>
    </main>
    
    <!-- footer -->
<footer class="public_fonter_container">
    <div class="public_fonter_content">
        <?php if(($_COOKIE['channel']== qudao183)): ?><p>客服QQ号：2307821835</p>
            <?php else: ?>
            <img src="/quce/Public/images/QR_core.png" width="30%" class="public_QRicon" alt="">
            <p>长按二维码添加客服微信</p><?php endif; ?>
        <p>在线服务时间：周一至周五9:00-18:00</p>
        <p><small>(以上测试纯属测试本身，不作为证明任何人能力的依据)</small></p>
    </div>
</footer>
    <!-- 悬浮Home -->
    <!-- <aside class="public_menu_container">
        <div class="public_menu_content">
            <a href="" class="navigate"></a>
            <a href="" class="navigate"></a>
        </div>
    </aside> -->
    <!-- 悬浮按钮 -->
    <aside class="public_sus_container">
        <div class="public_sus_content">
            <a href="javascript:;" class="m_form_btnwrap fiex_bt">立即检测身体问题</a>
        </div>
    </aside>
    <script>
        // 第一帧作为缩略图
        // window.onload = function () {
        //     var video;//video标签
        //     var scale = 0.8;//第一帧图片与源视频的比例
        //     video = $("#video").get(0);//赋值标签
        //     video.addEventListener('loadeddata',function(){
        //         var canvas = document.createElement("canvas");//canvas画布
        //         canvas.width = video.videoWidth * scale;
        //         canvas.height = video.videoHeight * scale;
        //         canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);//画图
        //         console.log(video.poster)
        //         video.poster = canvas.toDataURL("image/png");
        //         console.log(video.poster)
        //     })
        // }
        window.history.pushState('',null,'');
        window.addEventListener('popstate',function(){
            window.location.href = "<?php echo U('Index/index','',false);?>";
        })
        
        new lCalendar().init('#datetime');//男

        $(".J_formSubmit").on('click',function(){
            $.getJSON("<?php echo U('Paycs/index_cs','',false);?>",function(data){});//提交按钮统计

            if($("[name='username']").val() == ""){
                $("[name='username']").val('匿名');
            }else if($("[name='username']").val().length < 2){
                layer.open({
                    content: '姓名长度不能少于2'
                    ,skin: 'msg'
                    ,time: 2
                });
                return false;
            }
            var patrn= /[\u4E00-\u9FA5]|[\uFE30-\uFFA0]/gi;
            if(!patrn.exec($("[name='username']").val())){
                layer.open({
                    content: '请输入中文名字'
                    ,skin: 'msg'
                    ,time: 2
                });
                return false;
            }
            if($("[name='birthday']").val() == ""){
                layer.open({
                    content: '请选择生时'
                    ,skin: 'msg'
                    ,time: 2
                });
                return false;
            }

            var birthday=$("[name='birthday']").val();
            var username=$("[name='username']").val();
            var gender=$("[name='gender']").val();
            if(!birthday||!username||!gender){
                layer.open({
                    content: '请重新提交信息'
                    ,skin: 'msg'
                    ,time: 2
                });
                return false;
            }
            layer.open({
                type: 2
                ,content: '加载中'
                ,time: 2
                ,end(){
                    $('#m_form').submit();
                }
            });
        });

        //测算底部悬浮
        $(function(){
            var topShow=$(".J_formSubmit");
            if(topShow.length){
                var topShow=topShow.offset().top;
                var testBtn=$(".public_sus_container");
                $(window).scroll(function(){
                    var wt=$(window).scrollTop();
                    wt>topShow?(testBtn.fadeIn(),$('.public_fonter_container').css('padding-bottom','1rem')):(testBtn.fadeOut(),$('.public_fonter_container').css('padding-bottom','0.4rem'));
                });
                // goTop
                $('.public_sus_container').on('click',function(){$('html,body').animate({scrollTop:$('#scrollT')[0].offsetTop},500)});
            }
        });
        

    </script>
</body>
</html>