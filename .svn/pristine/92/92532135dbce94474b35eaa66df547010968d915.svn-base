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
        <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>    
    <![endif]-->
    <link rel="stylesheet" href="/quce/Public/css/common.css">
    <link rel="stylesheet" href="/quce/Public/css/_register.css">
    <script src="/quce/Public/js/rem.js"></script>
    <script src="/quce/Public/js/layer_mobile/layer.js"></script>
    <script src="/quce/Public/js/jquery.min.js"></script>
</head>
<body>
    <header>
        <a href="javascript:history.go(-1)" class="page_back"></a>
        <h1 class="page_title">用户注册</h1>
        <a href="<?php echo U('Index/index','',false);?>" class="page_home"></a>
    </header>
    <main>
        <div class="login_container">
            <!-- 用户登录 -->
            <div class="sign_container">
                <form action="<?php echo U('Login/registerSubmission','',false);?>" method="POST" id="register_form">
                    <ul class="sign_ul">
                        <li><input type="text" id="username" maxlength="16" name="username" placeholder="用户名(16个字符以内)" ></li>
                        <li><input type="password" id="password1" name="password" placeholder="密码"></li>
                        <li><input type="password" id="password2" placeholder="确认密码"></li>
                        <li><input type="text" id="phone" maxlength="11" name="phone" placeholder="请输入手机号"></li>
                    </ul>
                    <a class="registerBtn">提交</a>
                </form>
            </div>
        </div>
    </main>
    <script>
        var registerBtn = document.querySelector('.registerBtn');
        var username = document.querySelector('#username');
        var password1 = document.querySelector('#password1');
        var password2 = document.querySelector('#password2');
        var phone = document.querySelector('#phone');
        registerBtn.onclick = function(){
            if(username.value == ""){
                layer.open({content: '请输入用户名',skin: 'msg',time: 2});
                return false;
            }else if(username.value.length < 6){
                layer.open({content: '用户名长度不能少于6位数',skin: 'msg',time: 2});
                return false;
            }
            if(password1.value == ""){
                layer.open({content: '请输入密码',skin: 'msg',time: 2});
                return false;
            }else if(password1.value.length < 6){
                password1.value = '';password2.value = "";
                layer.open({content: '密码长度不能少于6位数',skin: 'msg',time: 2});
                return false;
            }
            if(password2.value == ""){
                layer.open({content: '请输入确认密码',skin: 'msg',time: 2});
                return false;
            }
            if(phone.value == ""){
                layer.open({content: '请输入手机号',skin: 'msg',time: 2});
                return false;
            }else if(!/^[1][3,4,5,7,8][0-9]{9}$/.test(phone.value)){
                layer.open({content: '手机号错误',skin: 'msg',time: 2});
                return false;
            }
            if(password1.value != password2.value){
                password1.value = '';password2.value = "";
                layer.open({content: '两次密码不一致',skin: 'msg',time: 2});
                return false;
            }

            $.getJSON("<?php echo U('Login/userSelect','',false);?>",{user:username.value},function(data){
                if(data == 1){
                    layer.open({content: '用户名已注册',skin: 'msg',time: 2});
                    return false;
                }else{
                    layer.open({content: '注册成功',skin: 'msg',time: 2});
                    setTimeout(function(){
                        $('#register_form').submit();
                    },2000);

                }
            });

        }
    </script>
</body>
</html>