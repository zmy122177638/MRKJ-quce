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
	<!-- <link rel="Shortcut Icon" href="网站.ico图标路径" /> -->
	<!--[if lt IE 9]>  
		<script src="http://cdn.bootcss.com/html5shiv/r29/html5.js"></script>
		<script src="https://cdn.bootcss.com/respond./quce/Public/js/1.4.2/respond.min.js"></script>    
	<![endif]-->
    <link rel="stylesheet" href="/quce/Public/css/common.css">
    <link rel="stylesheet" href="/quce/Public/css/_listdetails.css">
    <script src="/quce/Public/js/rem.js"></script>
    <script src="/quce/Public/js/vue.min.js"></script>
    <script src="/quce/Public/js/jquery.min.js"></script>
	<script src="/quce/Public/js/Headroom.js"></script>
</head>
<body>
    <div id="app">
        <header>
            <a href="javascript:history.go(-1)" class="page_back"></a>
            <h1 class="page_title">星座</h1>
            <a href="<?php echo U('Index/index','',false);?>" class="page_home"></a>
        </header>
        <!-- 全部测试 -->
        <main>
            <div class="major">
                <!-- <h3 class="public_title"><span class="p_text">全部测试</span></h3> -->
                <div class="tab">
                    <div :class="currtab==0?'curr':'navigatetwo'"  @click="setTapEvent(0)">最热</div>
                    <div :class="currtab==1?'curr':'navigatetwo'"  @click="setTapEvent(1)">最新</div>
                </div>
                <div v-show="currtab==0" class="qc_classlist">
                    <!-- 最火 -->
                    <ul>
                        <li v-for="item in HottestData" :key="item.id" >
                            <a :href="subject+'?subject='+item.subject" target="_blank" class="Hot_item">
                                <div class="H_left">
                                    <figure><img :src="'/quce/Public/images/quce/'+item.title_img" alt=""></figure>
                                    <div class="H_center">
                                        <p class="H_title">{{item.title}}</p>
                                        <p class="H_hot"><span>{{item.hotstar}}万人在测</span></p>
                                        <p class="H_direction">{{item.content}}</p>
                                    </div>
                                </div>
                                <div class="H_right">
                                    <button class="navigate_btn">去测 ></button>
                                </div>
                            </a>
                        </li>
                    </ul> 
                    <!-- 加载 -->
                    <div class="loadPoint" v-show="loadPoint">
                        <img src="/quce/Public/images/loading.gif" v-if="loadtext=='加载中...'" class="load_gif" alt="">{{loadtext}}
                    </div>
                </div>
                
                <div v-show="currtab==1" class="qc_classlist">
                    <!-- 最新 -->
                    <ul>
                        <li v-for="item in NewesttData" :key="item.id" >
                            <a :href="subject+'?subject='+item.subject" target="_blank" class="Hot_item" >
                                <div class="H_left">
                                    <figure><img :src="'/quce/Public/images/quce/'+item.title_img" alt=""></figure>
                                    <div class="H_center">
                                        <p class="H_title">{{item.title}}</p>
                                        <p class="H_hot"><span>{{item.hotstar}}万人在测</span></p>
                                        <p class="H_direction">{{item.content}}</p>
                                    </div>
                                </div>
                                <div class="H_right">
                                    <button class="navigate_btn">去测 ></button>
                                </div>
                            </a>
                        </li>
                    </ul> 
                    <!-- 加载 -->
                    <div class="loadPoint" v-show="loadPoint1">
                        <img src="/quce/Public/images/loading.gif" v-if="loadtext1=='加载中...'" class="load_gif" alt="">{{loadtext1}}
                    </div>
                </div>
            </div>
            <!-- gotop -->
			<div id="goTop" @click="scrollTopEvent()"></div>
        </main>
    </div>
    <script>
        var subject="<?php echo U('Index/palace','',false);?>";
        var vm = new Vue({
			el:'#app',
			data:{
				Hotpage:1,
				NewPage:1,
				currtab:0,
				HottestData:[],
				NewesttData:[],
				subject:subject,
				loadPoint:false,
				loadPoint1:false,
				throttleB:true,
				loadtext:'加载中...',
				loadtext1:'加载中...',
			},
			mounted(){
				this.getsubjectData();
				this.loadpluginEvent();
				window.addEventListener('scroll',this.scrollBottomEvent,true);
			},
			methods:{
				// 获取数据
				getsubjectData(){
					var _self = this;
					$.get("<?php echo U('Index/indexAnswer','',false);?>",{page:_self.Hotpage},function(data){
						var data = JSON.parse(data);
						_self.HottestData = data;
						console.log(_self.HottestData)
					});
					$.get("<?php echo U('Index/indexAnswerNew','',false);?>",{page:_self.NewPage},function(data){
						var data = JSON.parse(data);
						_self.NewesttData = data;
						console.log(_self.NewesttData)
					});
				}, 
				// loadplugin
				loadpluginEvent(){
					// headroom     
					var headroom = new Headroom(document.querySelector('.tab'), {
						"tolerance": 8,
						"offset": 205,
						"classes": {
							"initial": "animated",
							"pinned": "slideInDown",
							"unpinned": "slideOutUp"
						}
					});
					headroom.init();// headroom.destroy(); 销毁实例

					var headroom1 = new Headroom(document.querySelector('#goTop'), {
						"tolerance": 8,
						"offset": 205,
						"classes": {
							"initial": "animated",
							"pinned": "bounceIn",
							"unpinned": "bounceOut"
						}
					});
					headroom1.init();// headroom.destroy(); 销毁实例
				},
				// tab切换
				setTapEvent(index){this.currtab = index;},
				// 返回顶部
				scrollTopEvent(){$('html,body').animate({scrollTop:0},700)},
				// 上拉加载
				scrollBottomEvent(){
					var _self = this;
					var scrollTop = document.documentElement.scrollTop || window.pageYOffset|| document.body.scrollTop;
					var scrollHeight = document.body.scrollHeight;
					var screenHeight = window.screen.height;
					if(scrollHeight - scrollTop < screenHeight+1){
						if(_self.currtab == "0"){
							_self.loadPoint = true;
							if(!_self.throttleB){ return;}
							if(_self.throttleB){
								_self.Hotpage++;
								$.get("<?php echo U('Index/indexAnswer','',false);?>",{page:_self.Hotpage},function(data){
									var data = JSON.parse(data);
									console.log(data[0].page)
									if(data[0].content != undefined){
										data.forEach(function (item){
											_self.HottestData.push(item)
										});
									}else{
										_self.loadtext = "没有更多了"
									}
								}); 
								_self.throttleB = false;
								setTimeout(function(){
									_self.throttleB =true;
								},1000)
							}
						}else if(_self.currtab == "1"){
							_self.loadPoint1 = true;
							if(!_self.throttleB){ return;}
							if(_self.throttleB){
								_self.NewPage++;
								$.get("<?php echo U('Index/indexAnswerNew','',false);?>",{page:_self.NewPage},function(data){
									var data = JSON.parse(data);
									console.log(data[0].page)
									if(data[0].content != undefined){
										data.forEach(function (item){
											_self.NewesttData.push(item)
										});
									}else{
										_self.loadtext1 = "没有更多了"
									}
								}); 
								_self.throttleB = false;
								setTimeout(function(){
									_self.throttleB =true;
								},1000)
							}
						}
					}
				},
			}
		})
    </script>
</body>
</html>