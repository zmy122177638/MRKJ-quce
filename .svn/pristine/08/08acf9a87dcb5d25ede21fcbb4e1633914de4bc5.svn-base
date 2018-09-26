<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="format-detection" content="telephone=no">
    <title>支付页</title>
    <!--[if lt IE 9]>  
        <script src="http://cdn.bootcss.com/html5shiv/r29/html5.js"></script>
        <script src="https://cdn.bootcss.com/respond./quce/Public/js/1.4.2/respond.min.js"></script>    
    <![endif]-->
    <link rel="stylesheet" href="/quce/Public/css/_paypage.css">
    <script src="/quce/Public/js/rem.js"></script>
</head>
<body>
    <div id="mainbox">
        <div class="brief-image">
            <img src="http://7xlmq3.com1.z0.glb.clouddn.com/article/1512636981589.jpg" alt="" style="width: 100%;">
            <div class="brief-price">
                <span><?php echo ($answer['title']); ?></span>
                <span id="buyQuiz" class="brief-pricenum" style="display: none;"><span class="brief-buynow showconfrimbox">立即测试</span></span>
            </div>
        </div>
        <div class="brief-box brief-desc">
            <div class="brief-splite"><span></span><p>测试介绍</p></div>
            <div class="brief-text">
                <p><?php echo ($answer['content']); ?></p>
                <!--<p>我们常说的情商，实际上指的是情绪智力。情绪智力是一种与情绪相关的心理素质，主要是指对自我情绪的识别、理解和调节能力以及处理人际关系的能力。情绪智力高的人有着更清晰的自我认知、更高的情绪管理能力以及更和谐的人际关系。</p><p>本测评将通过情绪觉察、情绪管理、情绪驱动、情绪理解和社交技巧五个方面来综合评估你的情绪智力指数，并根据你的具体情况提供有针对性的指导和建议，帮助你更好地认识自己、理解他人，建立和谐融洽的人际关系。</p>            </div>-->
            <!-- <p id="openExample" class="brief-example">查看报告示例></p> -->
        </div>
        <div class="brief-box">
            <div class="brief-splite"><span></span><p>测试须知</p></div>
            <div class="brief-floatbox"><span>题目数：</span><span class="float-box"><?php echo ($answer['count']); ?>题</span></div>
            <div class="brief-floatbox"><span>预计用时：</span><span class="float-box">约15分钟</span></div>
            <div class="brief-floatbox"><span>原价：</span><span class="float-box" style="-webkit-text-decoration-line:line-through;text-decoration-line: line-through;">99.00元</span></div>
            <div class="brief-floatbox"><span>体验价：</span><span class="float-box"><?php echo (cookie('price')); ?>元</span></div>
            <div class="brief-floatbox"><span>报告长度：</span><span class="float-box">9页</span></div>
            <div class="brief-floatbox"><span>我的性别：</span><span class="float-box" id="float_gender">男</span></div>
            <p id="showGenderBox" class="brief-example">修改性别></p>

            <!-- 未支付 -->
            <div id="startQuiz" class="brief-startbtn showconfrimbox">立即测试<span style="font-size: 0.28rem;">（￥<?php echo (cookie('price')); ?>）</span></div>
            <!-- 已支付 -->
            <!-- <div class="historybtnbox">
                <div id="startQuiz" class="brief-double-startbtn showconfrimbox">再次购买<span style="font-size: 14px;">（￥8.80）</span></div>
                <div id="historybtn" data-id="3185545" class="brief-double-reportbtn showconfrimbox">查看报告</div>
            </div> -->
        </div>
        <div class="brief-box">
            <div class="brief-splite"><span></span><p>温馨提示</p></div>
            <div class="brief-text">
                <p>① 本测评为付费测试， 体验价为<?php echo (cookie('price')); ?>元</p>
                <p>② 测试题：<?php echo ($answer['count']); ?>题，测试时间：约15分钟</p>
                <p>③ 本测评不能重复测试，答题结束后会形成一份专业的测评报告，请您根据自己的实际情况作答。</p>
                <p>④ 由于题目数量较多，在付费成功后，跳转页面可能需要时间进行加载，请耐心等候（建议在网络较好的情况下进行测试）</p>
                <p>⑤ 若遇到支付失败问题，请加官方<span style="color:#ff6073">客服微信：2307821835</span></p>
            </div>
        </div>
    </div>
    <!-- 支付弹窗 -->
    <div id="ConfirmPaybox" class="ConfirmPaybox">
        <div id="ConfirmPaybg" class="ConfirmPaybg"></div>
        <div id="haha" class="ConfirmPayInfo">
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

                <?php if($wxlogin == 1): ?><a class="weixinzfFH"><span  class="ConfirmPaybtn weixinzfFH">微信支付</span></a>
                    <?php else: ?>
                    <a class="ConfirmPaybtn" href="<?php echo U('Paycs/paywx','',false);?>" >微信支付</a>
                    <a class="ConfirmPaybtn" href="<?php echo U('Paycs/payzfb','',false);?>">支付宝支付</a><?php endif; ?>

            </div>
        </div>
    </div>


    <!-- 修改性别 -->
    <div id="setgenderbox" class="setgenderbox">
        <div id="genderbox" class="new-ceshi">
            <span class="alerttitle">选择性别</span>
            <span id="closebtn"><img style="display: block; width: 100%;" src="/quce/Public/images/close.png" alt=""></span>
            <div class="splite-line"></div>
            <div class="genderbtnbox">
                <div class="genderbtn"><p id="gender_male">男<span class="gender-check"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NDVBODczMURERTMyMTFFNkFDRTdDNEZDRDFEMzZDRTMiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NDVBODczMUVERTMyMTFFNkFDRTdDNEZDRDFEMzZDRTMiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo0NUE4NzMxQkRFMzIxMUU2QUNFN0M0RkNEMUQzNkNFMyIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo0NUE4NzMxQ0RFMzIxMUU2QUNFN0M0RkNEMUQzNkNFMyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pmi/r20AAAC0SURBVHjaYvz//z8DJYCRAgMSKDFAAIjvA3EguQbMh9KJDCADSMQOQPweiAXAlkMFQZx6KCZkwHkgLoDxQUQC1EQQBgEFPJpBGu8ji4EIA6imBKgB63FoFoBa4oBuADK+DzXEAYsB87EZjq4oAGrAfhwBp0DIAAaoZnRXnMcVwLii6T9UE9aAI2QAA9Sv/6Ga30O9RpIBCv8RYD++dIEvwcwnIl3gzUygDKMAxBfwZQqAAAMAyMJB5DBcafQAAAAASUVORK5CYII="></span></p></div>
                <div class="genderbtn"><p id="gender_fmale">女<span class="gender-check"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NDVBODczMURERTMyMTFFNkFDRTdDNEZDRDFEMzZDRTMiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NDVBODczMUVERTMyMTFFNkFDRTdDNEZDRDFEMzZDRTMiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo0NUE4NzMxQkRFMzIxMUU2QUNFN0M0RkNEMUQzNkNFMyIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo0NUE4NzMxQ0RFMzIxMUU2QUNFN0M0RkNEMUQzNkNFMyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pmi/r20AAAC0SURBVHjaYvz//z8DJYCRAgMSKDFAAIjvA3EguQbMh9KJDCADSMQOQPweiAXAlkMFQZx6KCZkwHkgLoDxQUQC1EQQBgEFPJpBGu8ji4EIA6imBKgB63FoFoBa4oBuADK+DzXEAYsB87EZjq4oAGrAfhwBp0DIAAaoZnRXnMcVwLii6T9UE9aAI2QAA9Sv/6Ga30O9RpIBCv8RYD++dIEvwcwnIl3gzUygDKMAxBfwZQqAAAMAyMJB5DBcafQAAAAASUVORK5CYII="></span></p></div>
            </div>
            <div class="setgenderbtnbox">
                <p id="setgenderbtn" class="setGender">确认</p>
            </div>
        </div>
    </div>

<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script src="/quce/Public/js/jquery.min.js"></script>
<script>
    $(".weixinzfFH").on('click',function(){
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
                        location.href="<?php echo U('Index/payEndtesting','',false);?>?orderid=<?php echo (cookie('orderid')); ?>";
                    }     // 使用以上方式判断前端返回,微信团队郑重提示：res.err_msg将在用户支付成功后返回    ok，但并不保证它绝对可靠。
                }
        );
    });
</script>
<script>
        var fromapp = '0';  //是否微信
        var title = "你的情商有多高？"; //标题
        var gender = '男'; //性别
        var scaleod_male = '';
        var scaleod_fmale = '';
        var updatestatus = false;
        var openpayconfirm = false;
        var playedurl = "/index.php/wetest/index/played/status/1";

        var ConfirmList = document.getElementsByClassName('showconfrimbox');
        var payUrl = '/index.php/wetest/xinli001/payindex/id/4724';
        var setGenderUrl = '/index.php/wetest/xinli001/setgender/gender/';
        var exampleUrl = '/index.php/wetest/xinli001/examplereport/gid/36/aid/0';
        var reportUrl = '/index.php/wetest/xinli001/play/employeetestid/';
        //示例
        // document.getElementById('openExample').onclick = function(){
        //     location.href = exampleUrl;
        // }
        var historybtn = document.getElementById('historybtn');
        historybtn && (historybtn.onclick = function() {
            var eid = historybtn.getAttribute('data-id');
            location.href = reportUrl + eid;
        });
        // buy quiz
        function showConfirmBox(){
            if(gender != '男' && gender != '女'){
                showSetGenderBox(true);
                openpayconfirm = true;
            }else{
                document.getElementById('ConfirmPaybox').classList.add('showConfirm');
            }
        }
        document.getElementById('buyQuiz').onclick = function(){
            showConfirmBox();
        }
        document.getElementById('startQuiz').onclick = function(){
            showConfirmBox();
        }
        document.getElementById('ConfirmPaybg').onclick = function(){
            document.getElementById('ConfirmPaybox').classList.remove('showConfirm');
        }
        // document.getElementById('ConfirmPaybtn').onclick = function(){
        //     var url = payUrl + '/gender/' + gender + '/aid/0';
        //     if(fromapp != 1){
        //         location.href = url;
        //     }else{
        //         console.log('微信客户端')
        //         // openWindow(apiHost + url, title);
        //     }
        // }

        // gender box
        function showSetGenderBox(status){
            updatestatus = status;
            document.getElementById('setgenderbox').style.display = 'block';
            document.getElementById('genderbox').setAttribute('class','new-ceshi bouncein');
        }
        function closeSetGenderBox(){
            document.getElementById('setgenderbox').style.display = 'none';
            document.getElementById('genderbox').setAttribute('class','new-ceshi');
        }
        document.getElementById('showGenderBox').onclick = function(){
            showSetGenderBox(false);
        }
        document.getElementById('closebtn').onclick = function(){
            closeSetGenderBox();
        }
        document.getElementById('gender_male').onclick = function(){
            document.getElementById('gender_male').setAttribute('class','gender');
            document.getElementById('gender_fmale').removeAttribute('class','');
            gender = '男';
        }
        document.getElementById('gender_fmale').onclick = function(){
            document.getElementById('gender_fmale').setAttribute('class','gender');
            document.getElementById('gender_male').removeAttribute('class','');
            gender = '女';
        }
        document.getElementById('setgenderbtn').onclick = function(){
            closeSetGenderBox();
            if(updatestatus){
                var img = new Image();
                img.src = setGenderUrl + '' + gender;
            }
            document.getElementById('float_gender').innerHTML = gender;
            if(openpayconfirm){
                openpayconfirm = false;
                showConfirmBox();
            }
        }

        window.onload = function(){
            if(gender != '男' && gender != '女'){
                showSetGenderBox(true);
            }
        }
    </script>
</body>
</html>