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
    <script src="/quce/Public/js/vue.min.js"></script>
    <script src="/quce/Public/js/jquery.min.js"></script>
    <script src="/quce/Public/js/echarts.min.js"></script>
    <style>
        .order_top_info{font-size:0.28rem;color: #989898;text-align: center;padding:0.2rem;background-color:#ffffff;}
        /* shenti */
        .result_container{background-color:#F9E0CD;overflow: hidden;}
        .result_box{
            margin:0.2rem;
            padding:0.2rem;
            background-color:#ffffff;
            border:1px solid #FD9266;
            border-radius: 0.12rem;
        }
        .result_title_img{width:4.07rem;height:0.47rem;vertical-align: middle;}
        .result_content_title{
            text-align: center;
            margin:0.2rem 0 0.6rem;;
        }
        .result_c_ul{
            list-style: none;
        }
        .result_c_li{
            font-size:0.3rem;
            line-height: 1.6;
            margin-bottom:0.3rem;
        }
        .result_li_title{
            color:#8F0808;
            font-size:0.3rem;
            font-weight:bold;
            
        }
        .result_li_c{
            color:#333333;
        }
        .result_tz_name{
            font-size:0.58rem;
            color:#8F0808;
            text-align: center;
            margin-bottom:0.6rem;
            font-family: '楷体';
        }
        .result_tz_zd{
            width:3.6rem;
            height:0.7rem;
            line-height:0.7rem;
            text-align: center;
            font-size:0.36rem;
            color:#333333;
            margin:0 auto 0.4rem;
            background:url('/quce/Public/images/jktest/duankuang.png') 0% 0% /100% 100% no-repeat;
        }
    </style>
</head>
<body>
    
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
    <div id="app">
        <div class="result_container">
            <div class="order_top_info">订单号：{{order}}<span></span></div>
            <div class="result_content">
                <div class="result_box">
                    <h3 class="result_content_title"><img src="/quce/Public/images/jktest/jgy_csjg.png" class="result_title_img" alt=""></h3>
                    <ul class="result_c_ul">
                        <li class="result_c_li" v-for="item in listDate">
                            <h4 class="result_li_title">{{item.title}}:</h4>
                            <p class="result_li_c">{{item.text}}</p>
                        </li>
                    </ul>
                </div>
                <div class="result_box">
                    <h3 class="result_content_title"><img src="/quce/Public/images/jktest/jgy_tzpx.png" class="result_title_img" alt=""></h3>
                    <h4 class="result_tz_name">{{tiziName}}</h4>
                    <h5 class="result_tz_zd">药膳指导</h5>
                    <ul class="result_c_ul">
                        <li class="result_c_li" v-for="item in yaoshan">
                            <h4 class="result_li_title">{{item.title}}:</h4>
                            <p class="result_li_c">{{item.text}}</p>
                        </li>
                    </ul>
                </div>
                <div class="result_box">
                    <h3 class="result_content_title"><img src="/quce/Public/images/jktest/jgy_pcbg.png" class="result_title_img" alt=""></h3>
                    <ul class="result_c_ul">
                        <li class="result_c_li" v-for="item in ziwei">
                            <h4 class="result_li_title">{{item.title}}:</h4>
                            <p class="result_li_c">{{item.text}}</p>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- footer -->
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
        </div>
        
    </div>
    <script>
        var vm = new Vue({
            el:'#app',
            data:{
                order:'',
                listDate:[],
                tiziName:'',
                yaoshan:[],
                ziwei:[]

            },
            mounted() {
                this.ajaxData();
            },
            methods:{
                ajaxData(){
                    var _self = this;
                    $.post("<?php echo U('Paycs/jieguoyeJson','',false);?> ",function(data){
                        var result = JSON.parse(data);
                        _self.listDate = result.data;
                        _self.order = result.orderid;
                        _self.tiziName = result.name;
                        _self.yaoshan = result.yaoshan;
                        _self.ziwei = result.ziwei;
                        console.log(result)
                        // _self.$nextTick(function(){_self.echartsInit();})
                    })
                },
            //     echartsInit(){
            //         var _self  = this;
            //         let radar_eachart = echarts.init(document.getElementById('radar_eachart'));
            //         let option3 = {
            //             color: ['#FF5500'],
            //             title:{
            //                 text:'情商分能力模型',
            //                 left:'50%',
            //                 top:'5%',
            //                 textAlign:'center'
            //             },
            //             tooltip : {
            //                 trigger: 'axis',
            //             },
            //             radar: [
            //                 {
            //                     indicator: [
            //                         {text: '管理别人的能力', max: 10,color:'#333333'},
            //                         {text: '认识自己的能力', max: 10,color:'#333333'},
            //                         {text: '激励自己的能力', max: 10,color:'#333333'},
            //                         {text: '管理自己的能力', max: 10,color:'#333333'},
            //                         {text: '认识别人的能力', max: 10,color:'#333333'}
            //                     ],
            //                     center: ['50%','58%'],
            //                     radius:60,
            //                 },
            //             ],
            //             series : [
            //                 {
            //                     type: 'radar',
            //                     tooltip: {
            //                         trigger: 'item'
            //                     },
            //                     itemStyle: {normal: {areaStyle: {type: 'default'}}},
            //                     data: [
            //                         {
            //                             value: [_self.result.glbr.fraction,_self.result.rszj.fraction,_self.result.jlzj.fraction,_self.result.glzj.fraction,_self.result.rsbr.fraction],
            //                             name: '情商能力'
            //                         }
            //                     ]
            //                 },
            //             ]
            //         };
            //         radar_eachart.setOption(option3)
            //     }
            // }
            }
        })
        window.history.pushState(null,null,location.href);
        window.addEventListener('popstate',function(){
            window.location.href="<?php echo U('Index/mytest','',false);?>"
        })
    </script>
</body>
</html>