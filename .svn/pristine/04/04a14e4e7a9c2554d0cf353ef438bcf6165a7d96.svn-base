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
    <link rel="stylesheet" href="/quce/Public/css/_login.css">
    <script src="/quce/Public/js/rem.js"></script>
    <script src="/quce/Public/js/layer_mobile/layer.js"></script>
    <script src="/quce/Public/js/jquery.min.js"></script>
</head>
<body>
    <header>
        <a href="javascript:history.go(-1)" class="page_back"></a>
        <h1 class="page_title">登录</h1>
        <a href="<?php echo U('Index/index','',false);?>" class="page_home"></a>
    </header>
    <main>
        <div class="login_container">
            <!-- 用户登录 -->
            <div class="sign_container">
                <form  id="sign_form">
                    <ul class="sign_ul">
                        <li><input type="text" id="username" name="username" placeholder="用户名" ></li>
                        <li><input type="password" id="password1" name="password" placeholder="密码"></li>
                    </ul>
                    <a  class="sign_ljbtn">立即登录</a>
                    <a href="<?php echo U('Login/register','',false);?>" class="registerBtn">轻松注册</a>
                </form>
            </div>
            <!-- 一键登录 -->
            <?php if($wxlogin == 1): ?><div class="MyMessage">
                    <div class="openid">
                        <p class="separate">一键登录</p>
                        <div class="ui-btns">
                            <a href="<?php echo U('Login/wxLogin','',false);?>" class="btn_item">
                                <figure class=item_icon><img src="/quce/Public/images/wx.png" alt=""></figure>
                                <span>微信</span>
                            </a>
                            <!-- <a href="javascript:;" class="btn_item">
                                <figure class=item_icon><img src="https://ss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=4195562923,3450190664&fm=27&gp=0.jpg" alt=""></figure>
                                <span>QQ</span>
                            </a> -->
                        </div>
                    </div>
                </div>
                <?php else: endif; ?>
        </div>
    </main>
    <script>
        var sign_ljbtn = document.querySelector('.sign_ljbtn');
        var username = document.querySelector('#username');
        var password = document.querySelector('#password1');
        sign_ljbtn.onclick = function(){
            if(username.value == ""){
                layer.open({content: '请输入用户名',skin: 'msg',time: 2});
                return false;
            }
            if(password.value == ""){
                layer.open({content: '请输入密码',skin: 'msg',time: 2});
                return false;
            }
            $.getJSON("<?php echo U('Login/loginSelect','',false);?>",{user:username.value,password:password.value},function(data){
                if(data == 1){
                    layer.open({content: '登录成功',skin: 'msg',time: 2});
                    setTimeout(function(){
                        window.location.href = "<?php echo U('Login/index','',false);?>";
                    },2000);

                }else{
                    layer.open({content: '用户名不正确或密码错误',skin: 'msg',time: 2});
                    username.value = "";password.value = "";
                    return false;
                }
            });
        }

    </script>
</body>
</html>