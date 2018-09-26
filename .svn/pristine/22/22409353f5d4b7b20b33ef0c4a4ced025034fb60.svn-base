<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="format-detection" content="telephone=no">
    <title>星座配对</title>
    <!--[if lt IE 9]>  
        <script src="http://cdn.bootcss.com/html5shiv/r29/html5.js"></script>
        <script src="https://cdn.bootcss.com/respond./quce/Public//quce/Public/js/1.4.2/respond.min.js"></script>    
    <![endif]-->
    <link rel="stylesheet" href="/quce/Public/css/_xzpeidui.css">
    <script src="/quce/Public/js/rem.js"></script>
</head>

<body>
    <!-- 头部 -->
    <div class="nav_body">
        <div class="nav_contain">
            <div class="navItem"><img src="/quce/Public/images/peidui/contell0.png" alt="" class="navImg"></div>
            <div class="navItem"><img src="/quce/Public/images/peidui/namePd0.png" alt="" class="navImg"></div>
            <div class="navItem "><img src="/quce/Public/images/peidui/nameNum0.png" alt="" class="navImg"></div>
        </div>
        <div class="preload">
            <img src="/quce/Public/images/peidui/contell1.png" alt="">
            <img src="/quce/Public/images/peidui/namePd1.png" alt="">
            <img src="/quce/Public/images/peidui/nameNum1.png" alt="">
        </div>
        <script>
            (function(){
                var item = document.querySelectorAll('.navItem>img');
                for(var i=0;i<item.length;i++){
                    (function (i){
                        item[i].onclick = function(e){
                            for(var j=0;j<item.length;j++){
                                item[j].parentNode.className = 'navItem';
                                item[j].src =  item[j].src.replace(/1.png/,'0.png');
                                window.open(jumpUrl[i],'_self');
                            }
                            e.target.src =  e.target.src.replace(/0.png/,'1.png');
                            e.target.parentNode.className = 'navItem navItem_active';
                        }
                    })(i);
                }
                var href = window.location.href;
                var index = 0;
                if(href.match(/xzpeidui/ig))
                    index=0;
                if(href.match(/namepd/ig))
                    index=1;
                if(href.match(/newnamenum/ig))
                    index=2;
                item[index].src =  item[index].src.replace(/0.png/,'1.png');
                item[index].parentNode.className = 'navItem navItem_active';
                var jumpUrl = ["<?php echo U('Zodiac/xzpeidui','',false);?>","<?php echo U('Zodiac/namepd','',false);?>","<?php echo U('Zodiac/newnamenum','',false);?>"];
            })()
        </script>
    </div>
    <!-- 主体内容 -->
    <div class="content">
        <div class="xzpd_name"><img src="/quce/Public/images/xzpeidui/xzpd_name.png" width="100%" alt=""></div>
        <p class="explanation">输入姓名并滑动选择星座即可生成你的星座配对卡片</p>
        <div class="xzpd_ipt">
            <input type="text" class="woman-name" placeholder="输入女生姓名" maxlength="5">
            <input type="text" class="man-name" placeholder="输入男生姓名" maxlength="5">
        </div>
        <div class="xzpd_scroll_container">
            <div class="activefnt"></div>
            <div id="wrapper-g" class="wrapper">
                <div class="scroller">
                    <ul>
                        <li><img src='/quce/Public/images/xzpeidui/left-juxie-2.png' alt='巨蟹座' class='unselected' />
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-juxie-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-shizi-2.png' alt='狮子座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-shizi-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-chunv-2.png' alt='处女座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-chunv-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-tianping-2.png' alt='天秤座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-tianping-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-tianxie-2.png' alt='天蝎座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-tianxie-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-sheshou-2.png' alt='射手座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-sheshou-1.png'/>
                        </li>
                        <li><img src="/quce/Public/images/xzpeidui/left-mojie-2.png" alt="摩羯座" class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-mojie-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-shuiping-2.png' alt='水瓶座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-shuiping-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-shuangyu-2.png' alt='双鱼座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-shuangyu-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-baiyang-2.png' alt='白羊座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-baiyang-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-jinniu-2.png' alt='金牛座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-jinniu-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-shuangzi-2.png' alt='双子座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-shuangzi-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-juxie-2.png' alt='巨蟹座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-juxie-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-shizi-2.png' alt='狮子座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-shizi-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-chunv-2.png' alt='处女座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-chunv-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-tianping-2.png' alt='天秤座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-tianping-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-tianxie-2.png' alt='天蝎座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-tianxie-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-sheshou-2.png' alt='射手座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-sheshou-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-mojie-2.png' alt='摩羯座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-mojie-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-shuiping-2.png' alt='水瓶座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-shuiping-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-shuangyu-2.png' alt='双鱼座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-shuangyu-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-baiyang-2.png' alt='白羊座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-baiyang-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-jinniu-2.png' alt='金牛座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-jinniu-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-shuangzi-2.png' alt='双子座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-shuangzi-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-juxie-2.png' alt='巨蟹座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-juxie-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/left-shizi-2.png' alt='狮子座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/left-shizi-1.png'/>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="wrapper-b" class="wrapper">
                <div class="scroller">
                    <ul>
                        <li><img src='/quce/Public/images/xzpeidui/right-juxie-2.png' alt='巨蟹座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-juxie-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-shizi-2.png' alt='狮子座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-shizi-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-chunv-2.png' alt='处女座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-chunv-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-tianping-2.png' alt='天秤座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-tianping-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-tianxie-2.png' alt='天蝎座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-tianxie-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-sheshou-2.png' alt='射手座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-sheshou-1.png'/>
                        </li>
                        <li><img src="/quce/Public/images/xzpeidui/right-mojie-2.png" alt="摩羯座" class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-mojie-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-shuiping-2.png' alt='水瓶座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-shuiping-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-shuangyu-2.png' alt='双鱼座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-shuangyu-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-baiyang-2.png' alt='白羊座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-baiyang-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-jinniu-2.png' alt='金牛座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-jinniu-1.png'/>
                            </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-shuangzi-2.png' alt='双子座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-shuangzi-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-juxie-2.png' alt='巨蟹座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-juxie-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-shizi-2.png' alt='狮子座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-shizi-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-chunv-2.png' alt='处女座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-chunv-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-tianping-2.png' alt='天秤座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-tianping-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-tianxie-2.png' alt='天蝎座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-tianxie-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-sheshou-2.png' alt='射手座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-sheshou-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-mojie-2.png' alt='摩羯座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-mojie-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-shuiping-2.png' alt='水瓶座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-shuiping-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-shuangyu-2.png' alt='双鱼座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-shuangyu-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-baiyang-2.png' alt='白羊座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-baiyang-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-jinniu-2.png' alt='金牛座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-jinniu-1.png'/>
                            </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-shuangzi-2.png' alt='双子座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-shuangzi-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-juxie-2.png' alt='巨蟹座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-juxie-1.png'/>
                        </li>
                        <li><img src='/quce/Public/images/xzpeidui/right-shizi-2.png' alt='狮子座' class='unselected'/>
                            <img class='selected' src='/quce/Public/images/xzpeidui/right-shizi-1.png'/>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="xzpd_btn_wrap"><img src="/quce/Public/images/xzpeidui/start.png" alt="开始配对" class="start"></div>
    </div>
    <!-- 测算结果 -->
    <div class="result">
        <!-- html2canvas -->
        <div class="result_container">
            <div class="result_wrap">
                <div class="result_title"><span class="t_left"></span>星座配对结果<span class="t_right"></span></div>
                <div class="result_n_wrap">
                    <div class="result_n_msgl">
                        <span class="result_n_name woman"></span>
                        <p class="result_n_xz"><img src="/quce/Public/images/xzpeidui/left-shuiping-1.png" width="100%" class="womanxz" alt="女生星座"></p>
                    </div>
                    <div class="result_n_ic"><img src="/quce/Public/images/xzpeidui/rusult_xin.png" width="100%" alt=""></div>
                    <div class="result_n_msgr">
                        <span class="result_n_name man"></span>
                        <p class="result_n_xz"><img src="/quce/Public/images/xzpeidui/right-shuiping-1.png" width="100%" class="manxz" alt="男生星座"></p>
                    </div>
                </div>
                <div class="result_fen_wrap">
                    <div class="result_fen_b">
                        <p class="pdzs"></p>
                        <p>配对指数</p>
                    </div>
                    <div class="result_fen_b">
                        <p class="pdbz"></p>
                        <p>配对比重</p>
                    </div>
                </div>
                <div class="hrBox"><img src="/quce/Public/images/xzpeidui/fenge.png" width="100%" alt=""></div>
                <div class="result_t_wrap">
                    <p class="result_t_t">结果评述</p>
                    <p class="result_t_c"></p>
                </div>
                <div class="hrBox"><img src="/quce/Public/images/xzpeidui/fenge.png" width="100%" alt=""></div>
                <div class="result_t_wrap">
                    <p class="result_t_p"></p>
                </div>
                <div class="QRcode">
                    <img src="/quce/Public/images/xzpeidui/QRcode_nwxzg.png" alt="qr" class="qr">
                    <img src="/quce/Public/images/xzpeidui/description.png" alt="" class="description">
                </div>
            </div>
        </div>
        <!-- 切换 -->
        <div class="result_img_container">
            <div class="result_imgwrap"><img src="" class="result_img" width="100%" alt="结果图片"></div>
            <div class="result_t_f">
                <img src="/quce/Public/images/xzpeidui/agin.png" alt="再来一次" class="again">
                <img src="/quce/Public/images/xzpeidui/show.png" alt="炫耀缘分" class="show"> 
            </div>
        </div>
    </div>
    <!-- 提示保存 -->
    <div class="zwfy-report-cartoonBox">
        <div class="zwfy-report-cartoonBox-filter"></div>
        <img src="/quce/Public/images/xzpeidui/hand1.png" alt="" class="zwfy-report-cartoon zwfy-report-cartoon-active">
        <img src="/quce/Public/images/xzpeidui/hand2.png" alt="" class="zwfy-report-cartoon">
        <img src="/quce/Public/images/xzpeidui/hand3.png" alt="" class="zwfy-report-cartoon">
        <p>长按图片<br>即可保存到相册</p>
    </div>
    <!-- 加载 -->
    <div class="loadingBox" style="display:none">
        <div class="loading_wrap">
            <img src="/quce/Public/images/xzpeidui/loading.png" alt="" class="loading">
            <p>正在测算</p>
        </div>
    </div>
</body>
<script src='/quce/Public/js/jquery.min.js'></script>
<script src="/quce/Public/js/iscroll.js"></script>
<script src="/quce/Public/js/html2canvas2016.js"></script>
<script src="/quce/Public/js/_xzpeidui.js"></script>
<script src="/quce/Public/js/layer_mobile/layer.js"></script>
<script>
    // 星座图
    var bstart = ['/quce/Public/images/xzpeidui/left-shuiping-1.png', '/quce/Public/images/xzpeidui/left-shuangyu-1.png', '/quce/Public/images/xzpeidui/left-baiyang-1.png', '/quce/Public/images/xzpeidui/left-jinniu-1.png', '/quce/Public/images/xzpeidui/left-shuangzi-1.png', '/quce/Public/images/xzpeidui/left-juxie-1.png', '/quce/Public/images/xzpeidui/left-shizi-1.png', '/quce/Public/images/xzpeidui/left-chunv-1.png', '/quce/Public/images/xzpeidui/left-tianping-1.png', '/quce/Public/images/xzpeidui/left-tianxie-1.png', '/quce/Public/images/xzpeidui/left-sheshou-1.png', '/quce/Public/images/xzpeidui/left-mojie-1.png'];
    var gstart = ['/quce/Public/images/xzpeidui/right-shuiping-1.png', '/quce/Public/images/xzpeidui/right-shuangyu-1.png', '/quce/Public/images/xzpeidui/right-baiyang-1.png', '/quce/Public/images/xzpeidui/right-jinniu-1.png', '/quce/Public/images/xzpeidui/right-shuangzi-1.png', '/quce/Public/images/xzpeidui/right-juxie-1.png', '/quce/Public/images/xzpeidui/right-shizi-1.png', '/quce/Public/images/xzpeidui/right-chunv-1.png', '/quce/Public/images/xzpeidui/right-tianping-1.png', '/quce/Public/images/xzpeidui/right-tianxie-1.png', '/quce/Public/images/xzpeidui/right-sheshou-1.png', '/quce/Public/images/xzpeidui/right-mojie-1.png'];
    function onStartHandle() {
        womanName = document.querySelector(".woman-name").value.trim();
        manName = document.querySelector(".man-name").value.trim();
        if (womanName === '') {
            layer.open({content: '请输入女生姓名',skin: 'msg',time: 2});
            return;
        }
        if (manName === '') {
            layer.open({content: '请输入男生姓名',skin: 'msg',time: 2});
            return;
        }
        // ajax数据
        ajaxDataEvent();
    }
    // 异步回调
    function callback(){
            // 隐藏主页
            $('.content').hide()
            $('.nav_body').hide();
            //显示等待界面
            $('.loadingBox').show()
            // 显示结果
            $('.result').show();
            $('.result_container').show();
            // 开始截图
            playhtml2Canvas();
        }
    // 传递数据
    function ajaxDataEvent(){
        $('.woman').html(womanName);
        $('.man').html(manName);
        $('.womanxz').attr('src',bstart[gid - 1]);
        $('.manxz').attr('src',gstart[bid - 1]);
        let xzdata = ['水瓶','双鱼','白羊','金牛','双子','巨蟹','狮子','处女','天秤','天蝎','射手','摩羯']
        $.post("<?php echo U('Zodiac/xzpeiduiObtain','',false);?>",{male:xzdata[bid -1],female:xzdata[gid -1]},function(data){
            var data = JSON.parse(data)
            $('.pdzs').text(data.zhishu);
            $('.pdbz').text(data.bizhong);
            $('.result_t_c').text(data.pingshu);
            $('.result_t_p').text(data.text);
            callback(); //执行回调
        })
    }
</script>
</html>