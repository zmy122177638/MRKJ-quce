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
    <link rel="stylesheet" href="/quce/Public/css/_payEndtesting.css">
    <script src="/quce/Public/js/rem.js"></script>
    <script src="/quce/Public/js/vue.min.js"></script>
    <script src="/quce/Public/js/layer_mobile/layer.js"></script>
	<script src="/quce/Public/js/jquery.min.js"></script>
</head>
<body>
    <div id="app">
        <div class="answer">
            <div class="answer_container">
                <div class="answer_test_wrap">
                    <!-- 头表 -->
                    <div class="answer_test_header">
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
                        <div class="answer_test_promt"><img src="/quce/Public/images/wenhao.png" @click="openTestPromt()" class="why_icon" alt=""></div>
                    </div>
                    <!-- 题表 -->
                    <div class="answer_body">
                        <div class="answer_timu_item">
                            <div class="answer_timu_title">{{timuIndex+'、'+timuObject[timuIndex-1].timu_title}}</div>
                            <ul class="answer_timu_list">
                                <li v-for="(_timu,index) in timuObject[timuIndex-1].timu" @click="selectTimuNext(_timu.fen,timuIndex,index)">
                                    <p class="answer_timu_c"><span class="answer_timu_l">{{timuLetter[index-1]}}</span>{{_timu.title}}</p>
                                    <p :class="[_timu.checked?'answer_timu_checked':'','answer_timu_check']"></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- 脚 -->
                    <div class="answer_footer">
                        <div class="answer_footer_prevBtn" v-show="timuIndex > 1" @click="selectTimuPrve()">上一题</div>
                        <div class="answer_footer_prevBtn" :style="submit_B?'background-color:#ffdd2b;color:#000000;':'background-color:rgba(0,0,0,0.5)'" v-show="timuIndex == timuObject.length" @click="selectTimuSubmit()">提交</div>
                    </div>
                </div>
                <!-- 测试提示 -->
                <div class="test_promt_container" v-show="testPromt_B">
                    <div class="test_promt_wrap">
                        <div class="close_test_promt" @click="closeTestPromt()"></div>
                        <div class="test_promt_title">测试提示</div>
                        <div class="test_promt_content">
                            <p>在做题过程中，请注意一下几点：</p>
                            <p>1. 测试一共<span class="a_color">{{timuObject.length}}题</span>，请尽量在<span class="a_color">30分钟内</span>完成，否则数据可能无法保存（右上方有时间进度条）；</p>
                            <p>2. 答案没有对错之分，如实作答即可，若遇到难以抉择的问题，请根据第一感觉作答，你的作答将得到严格保密；</p>
                            <p>3. 如遇电话，死机等导致测试中断，可到公众号找回，系统将保留你的答案记录。</p>
                        </div>
                        <div class="test_promt_confirm" @click="closeTestPromt()">好的</div>
                    </div>
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
                timuObject:[], //题目数据
                testPromt_B:false, //测试提示
                moveAnimation:false, //默认下一题动画
                submit_B:false, //是否答题结束
                totalFenNumArray:[], //选中的分
                time:1800,
            },
            created(){
                this.layerLoadding();
                this.getTestObject();
                
            },
            mounted() {
                this.tiemswitch();
            },
            methods:{
                // 进入加载
                layerLoadding(){
                    layer.open({
                        type: 2
                        ,content: '加载中',
                        shadeClose: false,
                    });
                },
                // 获取数据
                getTestObject(){
                    var _self = this;
                    $.ajaxSettings.async = false;
                    $.get("<?php echo U('Index/topic','',false);?>?subject=<?php echo ($subject); ?>",function(data){
                        var data = JSON.parse(data);
                        _self.timuObject = data; //流动数据

                        layer.closeAll();
                        _self.timestart(_self);
                    }); 
                    
                },
                // 开始计时
                timestart(_self){
                    _self.time--;
                    if(_self.time > 0){
                        setTimeout(function(){
                            _self.timestart(_self)
                        },1000)
                    }else{
                        layer.open({
                            title: [
                            '答题未结束',
                            'background-color: #FF4351; color:#ffffff;'
                            ]
                            ,btn:['继续测试','重新测试']
                            ,content: '你可以选择继续测试或者重新测试。'
                            ,shadeClose:false
                            ,yes:function(index){
                                _self.timuIndex = _self.timuIndex;
                                layer.close(index);
                                _self.time = 1800;
                                _self.timestart(_self);             
                            }
                            ,no:function(){
                                _self.time = 1800;
                                _self.totalFenNumArray = [];
                                _self.timuIndex = 1;
                                _self.timestart(_self);
                                console.log(132)
                                _self.timuObject.forEach(function(item,index){
                                    for(let index in item.timu){item.timu[index].checked = false}
                                })
                            }
                        });
                    }
                },
                // 时间转换
                tiemswitch(time){
                    // let hours = Math.floor( time / 3600);
                    let Minute = Math.floor(time / 60) % 60;
                    let second = time % 60;
                    function addTwoNum(num){return num < 10?'0'+num:num}
                    return addTwoNum(Minute)+':'+addTwoNum(second)
                },
                //close测试提示
                closeTestPromt(){this.testPromt_B = !this.testPromt_B;},
                // open测试提示
                openTestPromt(){this.testPromt_B = !this.testPromt_B;},
                // 选中下一题
                /*
                    @fenNum(number) 分数
                    @timuIndex(number) 题序列号
                    @index(number) 选中序列号
                */
                selectTimuNext(fenNum,timuIndex,index){
                    var _self = this;
                    for(let Tindex in _self.timuObject[timuIndex-1].timu){
                        _self.timuObject[timuIndex-1].timu[Tindex].checked = false;
                    }
                    _self.timuObject[timuIndex-1].timu[index].checked = true;
                    
                    if(timuIndex == _self.timuObject.length){
                        _self.timuIndex = null;
                        _self.timuIndex = _self.timuObject.length;
                        _self.submit_B = true; 
                        _self.totalFenNumArray.splice(_self.timuIndex-1,1,fenNum); //最后一题
                    }else{
                        _self.timuIndex++;
                        _self.totalFenNumArray.push(fenNum); //添加分数
                        document.querySelector('.answer_body').classList.remove('answer_animation_right_in');
                        document.querySelector('.answer_body').classList.add('answer_animation_left_out');
                        _self.moveAnimation = false;
                    }
                    console.log(_self.totalFenNumArray)
                    // 监听题目动画
                    document.querySelector('.answer_body').addEventListener('animationend',function(){
                        if(!_self.moveAnimation){
                            this.classList.remove('answer_animation_left_out');
                            this.classList.add('answer_animation_left_in');
                        }else{
                            this.classList.remove('answer_animation_right_out');
                            this.classList.add('answer_animation_right_in');
                        }
                    })
                },
                // 上一题
                selectTimuPrve(){
                    var _self = this;
                    _self.timuIndex--;
                    _self.totalFenNumArray.splice(_self.timuIndex-1,1);  //返回删除分数
                    document.querySelector('.answer_body').classList.remove('answer_animation_left_in');
                    document.querySelector('.answer_body').classList.add('answer_animation_right_out');
                    _self.moveAnimation = true;
                },
                // 提交
                selectTimuSubmit(){
                    var _self = this;
                    var totalFenNum  = _self.totalFenNumArray.reduce(function(total,active){return total += Number(active);},0)
                    console.log('总分'+totalFenNum);
                    layer.open({
                        type: 2
                        ,content: '正在提交',
                        shadeClose: false,
                        time:2,
                        end:function(){
                            location.href="<?php echo U('Paycs/jieguoye','',false);?>?totalFenNum="+totalFenNum;
                        }
                    });
                }
            }
        })
    </script>
</body>
</html>