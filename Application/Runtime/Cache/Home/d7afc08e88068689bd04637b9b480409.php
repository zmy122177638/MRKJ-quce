<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	  <meta name="renderer" content="webkit">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="format-detection" content="telephone=no">
	  <meta name="Author" content="Anles">
    <title>知命测算</title>
    <!--[if lt IE 9]>  
        <script src="http://cdn.bootcss.com/html5shiv/r29/html5.js"></script>
        <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>    
    <![endif]-->
    <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan style='display:none;' id='cnzz_stat_icon_1275330282'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s19.cnzz.com/z_stat.php%3Fid%3D1275330282' type='text/javascript'%3E%3C/script%3E"));</script>
    <script src="/quce/Public/js/rem.js"></script>
    <script src="/quce/Public/js/vue.min.js"></script>
    <script src="/quce/Public/js/jquery.min.js"></script>
    <style>
      *{margin:0;padding:0;}
      a{-webkit-tap-highlight-color:transparent;}
      .nav-box{border-bottom:0.1rem solid #f1f1f1;}
      .nav-item{text-decoration: none;display: block;}
      img{vertical-align: middle;}
      .banner-t{
        display: flex;
        box-sizing:border-box;
        padding:0.2rem;
        justify-content: space-between;
        display: -webkit-box;
        -webkit-box-pack:justify; 
      }
      .banner-t a{width:3.5rem;height:2.36rem;}
      /* listData */
      .nav-content{padding:0.4rem 0.2rem;}
      .nav-title{
        display:flex;
        display:-webkit-box;
        -webkit-box-pack:justify;
        justify-content:space-between;
        box-sizing:border-box;
        margin-bottom:0.2rem;
      }
      .nav-title .nav-t-left{
        font-size:0.36rem;
        color:#333333;
        font-weight:bold;
      }
      .nav-title .nav-t-left::before{
        content:'';
        width:0.06rem;
        height:0.3rem;
        display:inline-block;
        background-color:#F04F4E;
        margin-right:0.2rem;
        vertical-align:middle;
      }
      .nav-title .nav-t-right{
        color:#999999;
        font-size:0.3rem;
        line-height: 1.6; 
      }
      .nav-title .nav-t-right::after{
        content:'';
        width:0.14rem;
        height:0.24rem;
        display:inline-block;
        background:url('/quce/Public/images/home/hsdt_yjt.png') 0% 0% / 100% 100% no-repeat;
        margin-left:0.1rem;
      }
      .nav-flex{
        display: flex;
        display: -webkit-box;
        -webkit-box-align:center;
        align-items:center;
        padding:0.3rem 0;
      }
      .nav-item-img img{width:1.2rem;height:1rem;border-radius:0.12rem;object-fit: cover;}
      .nav-item-content{
        -webkit-box-flex: 1;
        flex:1;
        padding-left:0.2rem;
        overflow:hidden;
        box-sizing:border-box;
      }
      .nav-item-content h3{font-size:0.32rem;color:#333333;text-overflow:ellipsis;white-space:nowrap;overflow:hidden;}
      .nav-item-content p{font-size:0.28rem;color:#707070;margin-top:0.2rem;text-overflow:ellipsis;white-space:nowrap;overflow:hidden;}
      .nav-item-btn{
        width:1.6rem;
        height:0.54rem;
        line-height: 0.54rem;
        text-align: center;
        border:0.02rem solid #F04F4E;
        border-radius:0.7rem;
        font-size:0.3rem;
        color:#F04F4E;
        margin-left:0.2rem;
      }
      .nav-more{
        font-size:0.3rem;
        color:#333333;
        text-align: center;
        margin-top:0.2rem;
        line-height: 1.6;
        -webkit-tap-highlight-color: transparent;
      }
      .nav-more-icon::after{
        content:'';
        display:inline-block;
        width:0.24rem;
        height:0.14rem;
        background:url('/quce/Public/images/home/hsdt_xjt.png') 0% 0% / 100% 100% no-repeat;
        margin-left:0.1rem;
        vertical-align:middle;
      }
      /* tow */
      .nav-date-box{
        display: flex;
        display: -webkit-box;
      }
      .nav-date-item{
        width: 50%;
        flex: 1;
        -webkit-box-flex:1;
      }

      .nav-date-nav{
        overflow: hidden;
      }
      .nav-date-li{
        width:50%;
        height:1.4rem;
        display: flex;
        flex-direction:column;
        justify-content: center;
        align-items: center;
        float:left;
        border-left:1px solid #EEEEEE;
        border-bottom:1px solid #EEEEEE;
        box-sizing: border-box;
      }
      .nav-date-li:nth-last-child(1){border-bottom:none;}
      .nav-date-li:nth-last-child(2){border-bottom:none;}
      .nav-date-li img{
        width: 0.68rem;
        height:0.68rem;
        border-radius: 0.1rem;
      }
      .nav-date-li h3{
        text-align: center;
        font-size:0.24rem;
        color:#333333;
        font-weight:normal;
        margin-top:0.1rem;
      }
      .nav-date-flex{
        display: flex;
        box-sizing:border-box;
      }
      .nav-d-box{
        float:left;
        width:50%;
        height:1.4rem;
        display: flex;
        display:-webkit-box;
        -webkit-box-pack:center;
        -webkit-box-align:center;
        flex-direction:column;
        align-items: center;
        justify-content: center;
        -webkit-box-orient: vertical;
      }
      .nav-d-box p:nth-last-child(1){margin-top:0.06rem;}
      .nav-date-title{font-size:1rem;color:#F04F4E;text-align: center;}
      .nav-date-date{font-size:0.3rem;color:#F04F4E;}
      .nav-date-bz{font-size:0.3rem;color:#000000;}
      /* 优惠券 */
      .discount_container{
          width:100%;
          height:100%;
          position: fixed;
          top:0;
          left:0;
          z-index: 99;
          display: none;
      }
      .discount_bg{
          width:100%;
          height:100%;
          position: absolute;
          background-color:rgba(0,0,0,0.7);
          top:0;left: 0;
      }
      .discount_container.on{display: block;}
      .discount_container.on .discount_content{animation:onShow 0.3s ease-out forwards;}
      @keyframes onShow{
          0%{opacity: 0;transform: scale(0.3);-webkit-transform: scale(0.3);}
          100%{opacity: 1;transform: scale(1);-webkit-transform: scale(1);}
      }
      .discount_content{
          width:6.6rem;
          height:7rem;
          background:url('/quce/Public/images/public/fyh_bj.png') 0% 0% / 100% 100% no-repeat;
          position: absolute;
          left:50%;
          margin-left:-3.3rem;
          top:15%;
      }
      .discount_txt{padding:1.3rem 0.65rem 0;}
      .discount_txt p{line-height: 1.5;color:#333333;font-size:0.34rem;}
      .discount_strong{color:#ec1212;font-weight: bold;}
      .discount_bottom{
          width:100%;
          height:2.26rem;
          background:url('/quce/Public/images/public/yhj_bj1.png') 0% 0% / 100% 100% no-repeat;
          position: absolute;
          z-index: 2;
          bottom:0;
          left:0;
          display: flex;
          justify-content: center;
          align-items: center;
          display: -webkit-box;
          -webkit-box-align: center;
          -webkit-box-pack: center;
      }
      .discount_container.on .discount_content .discount_coupon{
          animation:YHJonShow 0.3s ease-out 0.3s forwards;
      }
      @keyframes YHJonShow{
          0%{bottom:0rem;}
          100%{bottom:1.88rem;}
      }
      .discount_coupon{
          width:5.16rem;
          height:1.66rem;
          background:url('/quce/Public/images/public/fyh_yhj.png') 0% 0% / 100% 100% no-repeat;
          position: absolute;
          bottom: 0.01rem;
          left:50%;
          margin-left:-2.58rem;
          display: flex;
          display: -webkit-box;
          transition: all 0.3s ease-out 0.3s;
          z-index: 1;
          transform: translate3d(0,0,0);
          -webkit-transform: translate3d(0,0,0);
      }
      .discount_coupon .coupon_money{
          width:2rem;
          height:1.66rem;
          font-size:0.54rem;
          color:#fffacf;
          text-align: center;
          line-height:1.66rem;
      }
      .discount_coupon .coupon_money strong{font-size:1.08rem;}
      .discount_coupon .coupon_txt{
          flex: 1;
          -webkit-box-flex:1;
          text-align: center;
          line-height:1.66rem;
          font-size: 0.57rem;
          font-weight: bold;
          color:#fffacf;
          letter-spacing:0.1rem;
      }
      .discount_btn{
          width:2.78rem;
          height:0.98rem;
          margin-top:0.3rem;
          background:linear-gradient(#FF5F1F,#EF1C1C);
          background:-webkit-linear-gradient(#FF5F1F,#EF1C1C);
          text-align: center;
          line-height: 0.98rem;
          border-radius: 0.7rem;
          box-sizing: border-box;
          font-size:0.4rem;
          color:#ffffff;
          font-weight:bold;
          text-decoration:none;
          display: block;
      }
      .discount_btn:nth-child(2){
          margin-left:0.3rem;
          background:none;
          color:#333333;
          border:0.02rem solid #ec1212;
      }
      .discount_close{
          width:0.36rem;
          height:0.36rem;
          background:url('/quce/Public/images/public/close_.png') 0% 0% / 100% 100% no-repeat;
          position: absolute;
          top:-0.64rem;
          right:0rem;
      }
      .nav-date-error{
        display: flex;
        align-items: center;
        justify-content: center;
        background-color:#ed4852;
        border-radius: 0.7rem;
      }
      .nav-date-error a{
        display: block;
        flex: 1;
        width:100%;
        color:#ffffff;
        font-size:0.45rem;
        text-decoration: none;
        text-align: center;
      }
    </style>
</head>
<body>
    <div id="app">
      <div class="nav-box">
        <div class="banner">
            <a href="javascript:;" @click="navtoUrl(navData[0].url,navData[0].typeid)" class="nav-item"><img :src="navData[0].img" width="100%" alt=""></a>
        </div>
        <div class="banner-t">
          <a href="javascript:;" @click="navtoUrl(navData[1].url,navData[1].typeid)" class="nav-item"><img :src="navData[1].img" width="100%" alt=""></a>
          <a href="javascript:;" @click="navtoUrl(navData[2].url,navData[2].typeid)" class="nav-item"><img :src="navData[2].img" width="100%" alt=""></a>
        </div>
      </div>
      <div class="nav-box">
        <div class="nav-date-box">
          <div :class="['nav-date-item','nav-date-flex',{'nav-date-error':!dateShow}]">
            <a href="<?php echo U('Index/yellowCalen','',false);?>" class="nav-item" v-if="dateShow">
              <h3 class="nav-date-title nav-d-box">{{fillNum(dateData.time.match(/月(.*)日/)[1])}}</h3>
              <div class="nav-date-date nav-d-box">
                <p>{{dateData.time.match(/.*月/)[0]}}</p>
                <p>{{dateData.weekday}}</p>
              </div>
              <div class="nav-date-bz nav-d-box">
                <p>{{sliceStr(dateData.bznf,0,3)}}</p>
                <p>{{regStr(dateData.ss)}}</p>
              </div>
              <div class="nav-date-bz nav-d-box">
                <p>{{regStrTime(dateData.zytime)}}</p>
                <p>{{dateData.ly}}</p>
              </div>
            </a>
            <a href="<?php echo U('Index/yellowCalen','',false);?>" v-else class="nav-item-error">查看今日黄历</a>
          </div>
          <div class="nav-date-item nav-date-nav">
            <a href="javascript:;" @click="navtoUrl(item.url,item.typeid)" class="nav-date-li nav-item" v-for="(item,index) in navData" v-if="index > 2">
              <img :src="item.img" alt="">
              <h3>{{item.name}}</h3>
            </a>
          </div>
        </div>
      </div>
      <div class="nav-box">
        <div class="nav-content">
          <div class="nav-title">
            <div class="nav-t-left">精选测试</div>
            <a :href="'https://www.yixueqm.com/jianceH5/totalTest.html?channel='+channel" class="nav-t-right nav-item">更多</a>
          </div>
          <ul class="nav-ul">
            <li class="nav-li" v-for="(item,index) in listData" :key="item.id" v-if="index < showListNum">
              <a href="javascript:;" @click="navtoUrl(item.weburi,item.title)" class="nav-item nav-flex">
                <div class="nav-item-img"><img :src="item.imgurl" alt=""></div>
                <div class="nav-item-content">
                  <h3>{{item.title}}</h3>
                  <p>{{item.content}}</p>
                </div>
                <div class="nav-item-btn">开始测试</div>
              </a>
            </li>
          </ul>
          <div class="nav-more nav-more-icon" @click="getMoreTest()" v-if="showListB">查看更多</div>
          <div class="nav-more" v-else="showListB">没有更多了</div>
        </div>
      </div>
      <!-- 返回弹窗 -->
      <!-- <div :class="['discount_container',{'on':discountShow}]">
        <div class="discount_bg"></div>
        <div class="discount_content">
            <div class="discount_txt">
                <p>送您一份<span class="discount_strong">见面礼</span>，特赠<span class="discount_strong">2019运势测算抵扣券一张</span>，开运秘籍等您拿！</span>
                </p>
            </div>
            <div class="discount_coupon">
                <div class="coupon_money">￥<strong>$discountprice</strong></div>
                <div class="coupon_txt">优惠券</div>
            </div>
            <div class="discount_bottom">
                <?php if($wxlogin == 1): ?><a href="javascript:;" class="discount_btn YHPay">马上使用</a>
                    <a href="javascript:;" class="discount_btn share_btn">送给朋友用</a>
                    <?php else: ?>
                    <a href="javascript:;" @click="yhNavEvent()" class="discount_btn YHPay">马上使用</a><?php endif; ?>
            </div>
            <div class="discount_close" @click="discountSwitch()"></div>
        </div>
      </div> -->
    </div>
    <style>
  .loading{
    position: fixed;
    background: rgba(0,0,0,0.8);
    top:0;right:0;
    left:0;bottom:0;
    z-index: 99;
    width:100%;
    height:100%;
  }
  .spinner {
    left:50%;
    top:40%;
    transform: translate(-50%,-50%);
    width: 1.8rem;
    height: 1.8rem;
    position: relative;
  }
  .Tip{
    position: absolute;
    bottom:-0.8rem;
    font-size:0.32rem;
    color:#ffffff;
    width:100%;
    text-align: center;
    text-shadow: 0 0 5px #cccccc;
  }
  
  .container1 > div, .container2 > div, .container3 > div {
    width: 0.5rem;
    height: 0.5rem;
    background-color: #ffffff;
  
    border-radius: 100%;
    position: absolute;
    -webkit-animation: bouncedelay 1.2s infinite ease-in-out;
    animation: bouncedelay 1.2s infinite ease-in-out;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
  }
  
  .spinner .spinner-container {
    position: absolute;
    width: 100%;
    height: 100%;
  }
  
  .container2 {
    -webkit-transform: rotateZ(45deg);
    transform: rotateZ(45deg);
  }
  
  .container3 {
    -webkit-transform: rotateZ(90deg);
    transform: rotateZ(90deg);
  }
  
  .circle1 { top: 0; left: 0; }
  .circle2 { top: 0; right: 0; }
  .circle3 { right: 0; bottom: 0; }
  .circle4 { left: 0; bottom: 0; }
  
  .container2 .circle1 {
    -webkit-animation-delay: -1.1s;
    animation-delay: -1.1s;
  }
  
  .container3 .circle1 {
    -webkit-animation-delay: -1.0s;
    animation-delay: -1.0s;
  }
  
  .container1 .circle2 {
    -webkit-animation-delay: -0.9s;
    animation-delay: -0.9s;
  }
  
  .container2 .circle2 {
    -webkit-animation-delay: -0.8s;
    animation-delay: -0.8s;
  }
  
  .container3 .circle2 {
    -webkit-animation-delay: -0.7s;
    animation-delay: -0.7s;
  }
  
  .container1 .circle3 {
    -webkit-animation-delay: -0.6s;
    animation-delay: -0.6s;
  }
  
  .container2 .circle3 {
    -webkit-animation-delay: -0.5s;
    animation-delay: -0.5s;
  }
  
  .container3 .circle3 {
    -webkit-animation-delay: -0.4s;
    animation-delay: -0.4s;
  }
  
  .container1 .circle4 {
    -webkit-animation-delay: -0.3s;
    animation-delay: -0.3s;
  }
  
  .container2 .circle4 {
    -webkit-animation-delay: -0.2s;
    animation-delay: -0.2s;
  }
  
  .container3 .circle4 {
    -webkit-animation-delay: -0.1s;
    animation-delay: -0.1s;
  }
  
  @-webkit-keyframes bouncedelay {
    0%, 80%, 100% { -webkit-transform: scale(0.0) }
    40% { -webkit-transform: scale(1.0) }
  }
  
  @keyframes bouncedelay {
    0%, 80%, 100% {
      transform: scale(0.0);
      -webkit-transform: scale(0.0);
    } 40% {
      transform: scale(1.0);
      -webkit-transform: scale(1.0);
    }
  }
</style>
<div class="loading">
  <div class="spinner">
    <div class="spinner-container container1">
      <div class="circle1"></div>
      <div class="circle2"></div>
      <div class="circle3"></div>
      <div class="circle4"></div>
    </div>
    <div class="spinner-container container2">
      <div class="circle1"></div>
      <div class="circle2"></div>
      <div class="circle3"></div>
      <div class="circle4"></div>
    </div>
    <div class="spinner-container container3">
      <div class="circle1"></div>
      <div class="circle2"></div>
      <div class="circle3"></div>
      <div class="circle4"></div>
    </div>
    <div class="Tip">加载中...</div>
  </div>
</div>

    <script>
      var myVue = new Vue({
        el:'#app',
        data:{
          dateData:{},
          navData: [
            {img:''},
            {img:''},
            {img:''}
          ],
          listData: [],
          showListNum: 4,
          showListB: true,
          discountShow: false,
          channel: 'qudao0',
          page:0,
          dateShow: true
        },
        created() {
          // if(localStorage.getItem('isYH')){
          //   this.discountShow = false;
          // }else{
          //   this.discountShow = true;
          // }
        },
        mounted() {
          this.urlparams = this.parseQueryString(location.href);
          this.getChannel();
          this.getTimes();
          this.getnavData();
          this.getnavList();
        },
        methods:{
          getChannel(){
            // 获取渠道
            if (this.urlparams.channel) {
              this.channel = this.urlparams.channel;
              sessionStorage.setItem('channel', this.channel);
            } else {
              if (sessionStorage.getItem('channel') && sessionStorage.getItem('channel') != 0) {
                this.channel = sessionStorage.getItem('channel');
              }	else {
                this.channel = 'qudao0';
                sessionStorage.setItem('channel', this.channel);
              }
            }  
          },
          discountSwitch(){
            this.discountShow = !this.discountShow;
          },
          yhNavEvent(){
            localStorage.setItem("isYH",1);
            window.location.href = this.navData[2].url+'?discount=1&channel='+ this.channel;
          },
          navtoUrl(url,typeid){
            // console.log(typeid)
            $.post("<?php echo U('Index/homeCnzz','',false);?>",{typeid:typeid},function(data){})
            if(/\?/.test(url)){
              window.location.href = url + '&channel=' + this.channel;
            }else{
              window.location.href = url + '?channel=' + this.channel;
            }
            
          },
          getnavData(){
            var that = this;
            $.getJSON("<?php echo U('Index/homeData','',false);?>",function(data){
              that.navData = data;
            })
            $.getJSON("<?php echo U('Index/calendar','',false);?>",{year:this.year,month:this.month,day:this.day},function(data){
              if(data){
                that.dateData = data;
              }else{
                that.dateShow = false;
              }
              
            })
          },
          getTimes(){
            var toTime =  new Date();
            this.year = toTime.getFullYear();
            this.month = toTime.getMonth() + 1;
            this.day = toTime.getDate();
          },
          getnavList(){
            var that = this;
            $.getJSON('https://www.yixueqm.com/jiance/index.php/Home-Index-moreselftestsup',{online:0,typeid:99,page:that.page},function(data){
              if(data.code){
                that.listData = that.listData.concat(JSON.parse(data.content));
                // 拉取所有测试
                that.page++;
                that.getnavList();
              }else{
                // 关闭loading
                document.querySelector('.loading').style.display = 'none';
              }
            })
          },
          sliceStr(str,start,end){
            var newStr = str.slice(start,end);
            return newStr;
          },
          fillNum(num){
            return num < 10?'0'+num:num;
          },
          regStr(str){
            var Reg = new RegExp('^[\u4e00-\u9fa5]+:','i');
            var newStr = str.replace(Reg,'');
            return newStr;
          },
          regStrTime(str){
            var matchArr = str.match(/年(.*)+日/);
            var time = matchArr[1];
            var newStr = time.replace(/\s/g,'')
            return newStr;
          },
          getMoreTest(){
            if(this.showListNum > this.listData.length){
              this.showListNum = this.listData.length;
              this.showListB = false;
            }else{
              this.showListNum += 4;
            }
          },
          parseQueryString(url) {
            var reg_url = /^[^\?]+\?([\w\W]+)$/,
              reg_para = /([^&=]+)=([\w\W]*?)(&|$|#)/g,
              arr_url = reg_url.exec(url),
              ret = {}
            if (arr_url && arr_url[1]) {
              var str_para = arr_url[1], result
              while ((result = reg_para.exec(str_para)) != null) {
                ret[result[1]] = result[2]
              }
            }
            return ret
          }
        }
      })
    </script>
</body>
</html>