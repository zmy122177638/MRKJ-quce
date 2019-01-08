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
    <link rel="stylesheet" href="/quce/Public/css/_cspayEndtesting.css">
    <link rel="stylesheet" href="/quce/Public/css/public_zm.css">
    <script src="/quce/Public/js/rem.js"></script>
    <script src="/quce/Public/js/vue.min.js"></script>
    <script src="/quce/Public/js/layer_mobile/layer.js"></script>
    <script src="/quce/Public/js/jquery.min.js"></script>
    <script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
    <style>
        .answer_container{background-color:#F8E9DD;}
        .answer_progres_container{overflow: hidden;}
        .answer_timu_pro{
            padding:0.05rem 0.4rem;
            font-size:0.36rem;
            color:#ffffff;
            background-color:#ff5704;
            border-radius: 0.7rem 0 0 0.7rem;
            -webkit-border-radius: 0.7rem 0 0 0.7rem;
            position: absolute;
            right:0;
            top:0.3rem;
        }
        .answer_timu_item{background-color:transparent;margin-top: 0;}
        .answer_timu_title_wrap{
            margin:1.8rem 0.2rem 0.7rem;
            position: relative;
        }
        .answer_timu_title_img{
            width:1.2rem;
            height:1.2rem;
            position: absolute;
            left:0.5rem;
            top:-1.2rem;
        }

        .answer_timu_title{
            border:1px solid #FF7942;
            border-radius:0.2rem;
            background-color:#ffffff;
            padding:0.3rem;
            position: relative;
        }
        .answer_timu_title::after{
            content:'';
            display: inline-block;
            width:0.3rem;
            height:0.3rem;
            border-top:1px solid #FF7942;
            border-left:1px solid #FF7942;
            /* border:1px solid  #FD9266; */
            position: absolute;
            left:30%;
            top:-0.18rem;
            border-radius: 0.05rem;
            transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            background-color:#ffffff;
        }
        .answer_timu_list li{
            box-shadow:1px 1px 0.1rem rgb(216, 132, 35);
            border:1px solid #FF7942;
            background-color:#ffffff;
            font-size:0.36rem;
            
        }
        .answer_timu_c{padding-left:0.2rem;}
        .answer_timu_list li.on{background-color:#FF7942;}
        .answer_test_point{
            font-size:0.28rem;
            color:#333333;
            padding:0 0.3rem 0.3rem;
        }
        .answer_test_point span{color:#f2621b;font-weight:bold;}
        .test_promt_confirm{background-color:#f2621b;}
    </style>
</head>
<body>
    <div id="app">
        <div class="answer">
            <div class="answer_container">
                <div class="answer_test_wrap">
                    <!-- 头表 -->
                    <!-- <div class="answer_test_header" v-if="timuIndex == 1">
                        <p>本次测试共{{timuObject.length}}题，请您根据自己的实际情况作答，以自己的第一印象为准，祝您答题愉快。</p>
                    </div> -->
                    <!-- <div class="answer_test_header">
                        <div class="answer_num">{{timuIndex}}/{{timuObject.length}}</div>
                        <div class="answer_progres">
                            <div class="answer_progres_wrap">
                                <div class="answer_progres_active" :style="'width:'+(2.8/timuObject.length)*timuIndex+'rem'"></div>
                            </div>
                        </div>
                        <div class="answer_c_time">
                            <img src="/quce/Public/images/clock.png" class="clock_icon" alt="">
                            <span>还剩：{{tiemswitch(time)}}</span>
                        </div>
                        <div class="answer_test_promt"><img src="/quce/Public/images/wenhao.png" @click="switchTestPromt()" class="why_icon" alt=""></div>
                    </div> -->
                    <!-- 题表 -->
                    <div class="answer_body">
                        <div class="answer_timu_pro">第{{timuIndex}}/{{timuObject.length}}题</div>
                        <!-- <div class="answer_progres_container"> -->
                            <!-- <div class="answer_progres_timu">第{{timuIndex}}/{{timuObject.length}}题</div> -->
                            <!-- <div class="answer_progres">
                                <div class="answer_progres_t">0%</div>
                                <div class="answer_progres_wrap">
                                    <div class="answer_progres_active" :style="'width:'+(5.6/timuObject.length)*timuIndex+'rem'">
                                        <span class="answer_progres_active_promt">{{getprogreing}}</span>
                                    </div>
                                </div>
                                <div class="answer_progres_t">100%</div>
                            </div> -->
                        <!-- </div> -->
                        <div class="answer_timu_item">
                            <div class="answer_timu_title_wrap">
                                <img src="/quce/Public/images/jktest/dty_laoren.png" class="answer_timu_title_img" alt="">
                                <div class="answer_timu_title">{{timuIndex+'、'+timuObject[timuIndex-1].timu_title}}</div>
                            </div>
                            
                            <ul class="answer_timu_list">
                                <li v-for="(_timu,index) in timuObject[timuIndex-1].timu" :class="_timu.checked?'on':''" @click="selectTimuNext(_timu.fen,timuIndex,index)">
                                    <!-- <p class="answer_timu_l">{{timuLetter[index-1]}}</p> -->
                                    <p class="answer_timu_c">{{_timu.title}}</p>
                                    <!-- <p :class="[_timu.checked?'answer_timu_checked':'','answer_timu_check']"></p> -->
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- 脚 -->
                    <div class="answer_footer">
                        <div class="answer_footer_prevBtn" v-show="timuIndex > 1" @click="selectTimuPrve()">返回上一题</div>
                        <div class="answer_footer_prevBtn" :style="submit_B?'background-color:#ff5704;color:#ffffff;':''" v-show="timuIndex == timuObject.length" @click="selectTimuSubmit()">提交</div>
                    </div>
                </div>
                
                <!-- 测试提示 -->
                <div class="test_promt_container" v-show="testPromt_B">
                    <div class="test_promt_wrap">
                        <div class="close_test_promt" @click="switchTestPromt()"></div>
                        <div class="test_promt_title">测试提示</div>
                        <div class="test_promt_content">
                            <p>在做题过程中，请注意一下几点：</p>
                            <p>1. 测试一共<span class="a_color">{{timuObject.length}}题</span>，请尽量在<span class="a_color">30分钟内</span>完成，否则数据可能无法保存；</p>
                            <p>2. 答案没有对错之分，如实作答即可，若遇到难以抉择的问题，请根据第一感觉作答，你的作答将得到严格保密；</p>
                            <p>3. 下面开始检测您的身体，请您一定耐心做完题目。</p>
                        </div>
                        <div class="test_promt_confirm" @click="switchTestPromt()">我知道了</div>
                    </div>
                </div>
                <div class="answer_test_point">
                    <p><span>健康小贴士：</span>干嚼食物有健脑的功能，可增加脑细胞的信息传递，堤防大脑老化的作用。</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        var vm = new Vue({
            el:'#app',
            data:{
                timuLetter:['A','B','C','D','E','F','G'], //题目选项
                timuIndex:1,  //题目序号
                timuObject:[{timu_title:''}], //题目数据
                testPromt_B:true, //测试提示
                // moveAnimation:false, //默认下一题动画
                submit_B:false, //是否答题结束
                double_B:false,
                totalFenNumArray:[], //选中的分
                // time:1800,
            },
            mounted() {
                this.getTestObject();
                // this.tiemswitch();
            },
            computed:{
                getprogreing(){
                    let num = Number(100/this.timuObject.length*this.timuIndex).toFixed(1);
                    if(num >= 100 ){
                        return '完成'
                    }else{
                        return num+'%'
                    }
                }
            },
            methods:{
                // 获取数据
                getTestObject(){
                    var _self = this;
                    layer.open({
                        type: 2
                        ,content: '加载中',
                        shadeClose: false,
                        success:function(){
                            $.get("<?php echo U('Index/topic','',false);?>?subject=<?php echo ($subject); ?>",function(data){
                                var data = JSON.parse(data);
                                _self.timuObject = data; //流动数据
                                console.log(data)
                                console.log(_self.timuObject)
                                layer.closeAll();
                                // _self.timestart(_self);

                            }); 
                        }
                    });
                },
                // 开始计时
                // timestart(_self){
                //     _self.time--;
                //     if(_self.time > 0){
                //         setTimeout(function(){
                //             _self.timestart(_self)
                //         },1000)
                //     }else{
                //         layer.open({
                //             title: [
                //             '答题未结束',
                //             'background-color: #FF4351; color:#ffffff;'
                //             ]
                //             ,btn:['继续测试','重新测试']
                //             ,content: '你可以选择继续测试或者重新测试。'
                //             ,shadeClose:false
                //             ,yes:function(index){
                //                 _self.timuIndex = _self.timuIndex;
                //                 layer.close(index);
                //                 _self.time = 1800;
                //                 _self.timestart(_self);             
                //             }
                //             ,no:function(){
                //                 _self.time = 1800;
                //                 _self.totalFenNumArray = [];
                //                 _self.timuIndex = 1;
                //                 _self.timestart(_self);
                //                 _self.timuObject.forEach(function(item,index){
                //                     for(let index in item.timu){item.timu[index].checked = false}
                //                 })
                //             }
                //         });
                //     }
                // },
                // 时间转换
                // tiemswitch(time){
                //     // let hours = Math.floor( time / 3600);
                //     let Minute = Math.floor(time / 60) % 60;
                //     let second = time % 60;
                //     function addTwoNum(num){return num < 10?'0'+num:num}
                //     return addTwoNum(Minute)+':'+addTwoNum(second)
                // },
                //close测试提示
                switchTestPromt(){this.testPromt_B = !this.testPromt_B;},
                // 选中下一题
                /*
                    @fenNum(number) 分数
                    @timuIndex(number) 题序列号
                    @index(number) 选中序列号
                */
                selectTimuNext(fenNum,timuIndex,index){
                    var _self = this;
                    if(!_self.double_B){
                        _self.double_B = true;
                        for(let Tindex in _self.timuObject[timuIndex-1].timu){
                            _self.timuObject[timuIndex-1].timu[Tindex].checked = false;
                        }
                        _self.timuObject[timuIndex-1].timu[index].checked = true;   
                        if(timuIndex == _self.timuObject.length){
                            _self.timuIndex = null;
                            _self.timuIndex = _self.timuObject.length;
                            console.log(_self.timuIndex )
                            _self.submit_B = true; 
                            _self.totalFenNumArray.splice(_self.timuIndex-1,1,fenNum); //最后一题
                            _self.double_B = false;
                        }else{
                            _self.timuIndex = null;
                            _self.timuIndex = timuIndex;
                            setTimeout(function(){
                                _self.timuIndex++;
                                _self.double_B = false;
                            },400)
                            _self.totalFenNumArray.push(fenNum); 
                            //添加分数
                            // document.querySelector('.answer_body').classList.remove('answer_animation_right_in');
                            // document.querySelector('.answer_body').classList.add('answer_animation_left_out');
                            // _self.moveAnimation = false;
                        }
                    }
                    // console.log(_self.totalFenNumArray)
                },
                // 上一题
                selectTimuPrve(){
                    var _self = this;
                    _self.timuIndex--;
                    _self.totalFenNumArray.splice(_self.timuIndex-1,1);  //返回删除分数
                },
                getFen(sliceArr,arr){
                    var newArr = [];
                    for(var i=0;i<sliceArr.length;i++){
                        newArr.push(arr.slice(sliceArr[i].start-1,sliceArr[i].end).reduce(function(total,item){return Number(total) + Number(item);},0))
                    }
                    return newArr;
                },
                // 提交
                selectTimuSubmit(){
                    var _self = this;
                    if(_self.submit_B){
                        var sliceArr = [
                            {start:1,end:8},
                            {start:9,end:16},
                            {start:17,end:23},
                            {start:24,end:31},
                            {start:32,end:39},
                            {start:40,end:45},
                            {start:46,end:53},
                            {start:54,end:60},
                            {start:61,end:67},
                        ]
                        var totalNumA = _self.getFen(sliceArr,_self.totalFenNumArray)
                        layer.open({
                            type: 2
                            ,content: '正在为您分析',
                            shadeClose: false,
                            time:2,
                            end:function(){
                                //点击回调入库
                                $.getJSON("<?php echo U('Paycs/answerPage_tj','',false);?>",function(data){});
                                window.location.href = "<?php echo U('Paycs/jieguoye','',false);?>?totalArr="+JSON.stringify(totalNumA);
                            }
                        }); 
                    }
                },
            }
        })
    </script>
</body>
</html>