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
  <title>黄历</title>
  <!--[if lt IE 9]>  
      <script src="http://cdn.bootcss.com/html5shiv/r29/html5.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>    
  <![endif]-->
  <script src="/quce/Public/js/rem.js"></script>
  <script src="/quce/Public/js/vue.min.js"></script>
  <script src="/quce/Public/js/jquery.min.js"></script>
  <style>
    *{margin:0;padding:0;}
    html,body{
      color:#333333;
      font-family:Helvetica;
      height:100%;
      width:100%;
    }
    #app{
      min-height:100%;
      width:100%;
      background-color:#fcf7f1;
    }
    .calendar-container{padding-bottom:0.4rem;}
    .calendar-top{
      display: flex;
      display: -webkit-box;
      height:2.3rem;
    }
    .calendar-top-left{
      width:1.08rem;
      height:100%;
      background:url('/quce/Public/images/home/hsdt_zjt.png') center 40% / 0.26rem 0.48rem no-repeat;
      -webkit-tap-highlight-color: transparent;
    }
    .calendar-top-right{
      width:1.08rem;
      height:100%;
      background:url('/quce/Public/images/home/hsdt_yjt1.png') center 40% / 0.26rem 0.48rem no-repeat;
      -webkit-tap-highlight-color: transparent;
    }
    .calendar-top-center{
      -webkit-box-flex:1;
      flex: 1;
      display: flex;
      display: -webkit-box;
      -webkit-box-orient: vertical;
      -webkit-box-pack:center;
      flex-direction:column;
      justify-content: center;
    }
    .calendar-top-center h3{font-size:1rem;color:#d32f2f;text-align: center;font-weight:bold;}
    .calendar-top-center p{font-size:0.28rem;color:#b06d3d;text-align: center;margin-top:0.2rem;}

    .calendar-center{}
    .calendar-center-top{
      margin: 0 0.3rem;
      height: 0.26rem;
      background: url('/quce/Public/images/home/bordertop.png') no-repeat center center;
      background-size: 100% 100%;
    }
    .calendar-center-bottom{
      margin: 0 0.3rem;
      height: 0.26rem;
      background: url('/quce/Public/images/home/borderbottom.png') no-repeat center center;
      background-size: 100% 100%;
    }
    .calendar-center-center{
      margin: 0 0.3rem;
      position: relative;
      background: url('/quce/Public/images/home/bordermiddle.png') repeat-y center;
      background-size: 100% 100%;
    }
    .calendar-center-state{
      padding:0 0.3rem 0.3rem;
      border-bottom:0.02rem solid #dc915b;
    }
    .calendar-center-box{
      display: flex;
      display:-webkit-box;
      align-items:center;
      -webkit-box-align:center;
    }
    .calendar-center-box:nth-last-child(1){margin-top:0.4rem;}
    .calendar-center-icon{width:0.5rem;height:0.5rem;vertical-align: middle;}
    .calendar-center-c{
      flex: 1;
      -webkit-box-flex:1;
      font-size:0.28rem;
      color:#333333;
      padding:0 0.3rem 0 0.4rem;
    }
    .calendar-center-zsfw{border-bottom:0.02rem solid #dc915b;padding:0.2rem 0;font-size: 0.3rem;text-align: center;}
    .calendar-center-zsfw-t{color: #d32f2f;}
    .calendar-center-zsfw-c{color:#333333;margin-top:0.15rem;}

    .calendar-center-yszd{overflow: hidden;border-bottom:0.02rem solid #dc915b;}
    .calendar-center-yszd>div {
        box-sizing: border-box;
        width: 33.3%;
        height: 3.4rem;
        font-size: 0.26rem;
        text-align: center;
        float: left;
    }
    .tscontent, .cscontent {
      box-sizing: border-box;
      border-bottom: 0.02rem solid #dc915b;
      height:50%;
    }
    .hlListTitle {
      width: 100%;
      color: #d32f2f;
      font-size: 0.3rem;
      padding: 0.2rem 0;
    }
    .hlListTxt {
      /* max-width: 1rem; */
      margin: 0 auto;
      line-height: 0.4rem;
      color: #333;
      text-align: center;
      font-size: 0.28rem;
    }
    .pzTxt {
      max-width: 1.3rem;
      line-height: 0.4rem;
      color: #333;
      text-align: center;
    }
    .pzcontent {
      border-left: 1px solid #dc915b;
      border-right: 1px solid #dc915b;
      padding-top:0.8rem;
      box-sizing:border-box;
    }

    .calendar-center-scjx{padding-bottom:0.2rem;}
    .scjx-title{margin:0.3rem 0 0;color: #d32f2f;line-height: 1.6;font-size: 0.3rem;text-align: center;}
    .scjx-ul{
      list-style: none;
      display: flex;
    }
    .scjx-li{
      width:calc(100% / 12);
      height: 0.6rem;
      color: #333333;
      text-align: center;
      font-size:0.24rem;
      padding:0.1rem 0.15rem;
      box-sizing:border-box;
    }
    .scjx-ul-k{
      list-style: none;
      display: flex;
      margin-top:0.2rem;
    }
    .scjx-li-k{
      color: #333333;
      text-align: center;
      font-size:0.24rem;
      width: calc(100% / 12);
    }
  </style>
</head>
<body>
  <div id="app">
    <div class="calendar-container">
      <div class="calendar-top">
        <div class="calendar-top-left" @click="selectDate(0)"></div>
        <div class="calendar-top-center">
          <h3>{{regStrTime(CalendarData.zytime)}}</h3>
          <p>{{CalendarData.bznf}}</p>
        </div>
        <div class="calendar-top-right" @click="selectDate(1)"></div>
      </div>
      <div class="calendar-center">
        <div class="calendar-center-top"></div>
        <div class="calendar-center-center">
          <div class="calendar-center-state">
            <div class="calendar-center-box">
              <img src="/quce/Public/images/home/hsdt_yi.png" class="calendar-center-icon" alt="">
              <div class="calendar-center-c">
                  <p>{{CalendarData.jrsy}}</p>
              </div>
            </div>
            <div class="calendar-center-box">
              <img src="/quce/Public/images/home/hsdt_ji.png" class="calendar-center-icon" alt="">
              <div class="calendar-center-c">
                <p>{{CalendarData.jrsj}}</p>
              </div>
            </div>
          </div>
          <div class="calendar-center-zsfw">
            <p class="calendar-center-zsfw-t">诸神方位</p>
            <p class="calendar-center-zsfw-c">{{CalendarData.csw}}</p>
          </div>
          <div class="calendar-center-yszd">
            <div class="tsxxcswx">
                <div class="tscontent">
                    <div class="hlListTitle">胎神</div>
                    <div class="hlListTxt tsTxt">{{CalendarData.jrts}}</div>
                </div>
                <div class="xxcontent">
                    <div class="hlListTitle">星宿</div>
                    <div class="hlListTxt xxTxt">{{regStr(CalendarData.xs)}}</div>
                </div>
            </div>
            <div class="pzcontent">
                <div class="hlListTitle">彭祖</div>
                <div class="hlListTxt pzTxt">{{regStr(CalendarData.pzbj)}}</div>
            </div>
            <div class="tsxxcswx">
                <div class="cscontent">
                    <div class="hlListTitle">冲煞</div>
                    <div class="hlListTxt csTxt">{{regStr(CalendarData.xc)}}<br>{{regStr(CalendarData.ss)}}</div>
                </div>
                <div class="wxcontent">
                    <div class="hlListTitle">五行</div>
                    <div class="hlListTxt wxTxt">{{CalendarData.wx}}</div>
                </div>
            </div>
          </div>
          <div class="calendar-center-scjx">
            <p class="scjx-title">时辰吉凶</p>
            <ul class="scjx-ul-k">
              <li class="scjx-li-k" v-for="item in hoursKey">{{item}}</li>
            </ul>
            <ul class="scjx-ul">
              <li class="scjx-li" v-for="(item,index) of hoursVal" v-if="index > 0">{{item}}</li>
            </ul>
          </div>
        </div>
        <div class="calendar-center-bottom"></div>
      </div>
    </div>
  </div>
  <script>
    var myVue = new Vue({
      el:'#app',
      data:{
        CalendarData:{},
        hoursKey:['子时','丑时', '寅时', '卯时', '辰时', '巳时', '午时', '未时', '申时', '酉时', '戌时', '亥时'],
        hoursVal:[],
      },
      computed:{
        
      },
      mounted(){
        this.init();
      },
      methods:{
        init(){
          this.getTimes();
          this.getCalendarData();
        },
        getTimes(){
          var toTime =  this.defaultTime?new Date(this.defaultTime):new Date();
          this.year = toTime.getFullYear();
          this.month = toTime.getMonth() + 1;
          this.day = toTime.getDate();
          this.defaultTime = new Date(this.year+'/'+this.month+'/'+this.day).getTime();
        },
        getCalendarData(){
          var that = this;
          $.getJSON("<?php echo U('Index/calendar','',false);?>",{year:this.year,month:this.month,day:this.day},function(data){
            that.CalendarData = data;
            var scyj = eval("("+data.scyj+")");
            that.hoursVal  = scyj['5'];
          })
        },
        selectDate(state){
          var calTime = 24*60*60*1000; // 天毫秒数
          if(state){
            this.defaultTime+=calTime;
            this.init();
          }else{
            this.defaultTime-=calTime;
            this.init();
          }
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
      }
    })
  </script>
</body>
</html>