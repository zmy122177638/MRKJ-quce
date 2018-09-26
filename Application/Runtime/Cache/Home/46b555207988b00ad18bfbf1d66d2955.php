<?php if (!defined('THINK_PATH')) exit();?>
	<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="format-detection" content="telephone=no">
        <title>生肖配对</title>
        <!--[if lt IE 9]>  
            <script src="http://cdn.bootcss.com/html5shiv/r29/html5.js"></script>
            <script src="https://cdn.bootcss.com/respond./quce/Public/js/1.4.2/respond.min.js"></script>    
        <![endif]-->
        <link rel="stylesheet" href="/quce/Public/css/_zodiac_peidui.css">
        <script src="/quce/Public/js/rem.js"></script>
        <script src="/quce/Public/js/jquery.min.js" type="text/javascript"></script> 
        <script type="text/javascript" src="/quce/Public/js/iscroll.js"></script>
	</head> 
    <body onload="loaded()">		  
		<div class="main-container">
            <header>
                <ul class="nav-wrap">
                    <li><a href="<?php echo U('Zodiac/xzpeidui','',false);?>" class="nav-a"><span>星座配对</span></a> </li>
                    <li><a href="<?php echo U('Zodiac/namepd','',false);?>"  class="nav-a active"><span>姓名配对</span></a></li>
                </ul>
            </header> 
            <div class="main-wrap">
                <div class="head-wrap">
                    <img src="/quce/Public/images/zodiac/sx-logo.png" class="head-logo" />
                    <img src="/quce/Public/images/zodiac/sxpd.png" class="head-title-img" />
                </div>
                <div id="select-container">
                    <div class="help-tip">滑动选择你和TA的生肖</div>
                    <div class="select-title">
                        <div class="gt-wrap">
                            <img src="/quce/Public/images/zodiac/sxgirl.png" class="title-img" />
                        </div>
                        <div class="null-space"></div>
                        <div class="bt-warp">
                            <img src="/quce/Public/images/zodiac/sxboy.png" class="title-img" />
                        </div>
                    </div>
                    <div class="select-wrap">
                        <div id="wrapper-g" class="sel-girl">
                            <div id="scroller-g" class="scroller">
                                <ul class="ul-g">
                                    <li><img src="/quce/Public/images/zodiac/sx12.png" class="li-img" /> <span class="li-span"> 亥猪</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx1.png" class="li-img" /> <span class="li-span"> 子鼠</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx2.png" class="li-img" /> <span class="li-span"> 丑牛</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx3.png" class="li-img" /> <span class="li-span">寅虎</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx4.png" class="li-img" /> <span class="li-span"> 卯兔</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx5.png" class="li-img" /> <span class="li-span"> 辰龙</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx6.png" class="li-img" /> <span class="li-span">巳蛇</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx7.png" class="li-img" /> <span class="li-span"> 午马</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx8.png" class="li-img" /> <span class="li-span"> 未羊</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx9.png" class="li-img" /> <span class="li-span"> 申猴</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx10.png" class="li-img" /> <span class="li-span">酉鸡</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx11.png" class="li-img" /> <span class="li-span">戌狗</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx12.png" class="li-img" /> <span class="li-span"> 亥猪</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx1.png" class="li-img" /> <span class="li-span"> 子鼠</span></li>
                                </ul>
                            </div>
                            <div class="cui-mask"></div>
                        </div>
                        <div class="sel-tip">
                            <span class="arrow-left"></span><span style="vertical-align: middle;">VS</span><span class="arrow-right"></span>
                        </div>
                        <div id="wrapper-b" class="sel-boy">
                            <div id="scroller-b" class="scroller">
                                <ul class="ul-b">
                                    <li><img src="/quce/Public/images/zodiac/sx12.png" class="li-img" /> <span class="li-span"> 亥猪</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx1.png" class="li-img" /> <span class="li-span"> 子鼠</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx2.png" class="li-img" /> <span class="li-span"> 丑牛</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx3.png" class="li-img" /> <span class="li-span">寅虎</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx4.png" class="li-img" /> <span class="li-span"> 卯兔</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx5.png" class="li-img" /> <span class="li-span"> 辰龙</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx6.png" class="li-img" /> <span class="li-span">巳蛇</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx7.png" class="li-img" /> <span class="li-span"> 午马</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx8.png" class="li-img" /> <span class="li-span"> 未羊</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx9.png" class="li-img" /> <span class="li-span"> 申猴</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx10.png" class="li-img" /> <span class="li-span">酉鸡</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx11.png" class="li-img" /> <span class="li-span">戌狗</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx12.png" class="li-img" /> <span class="li-span"> 亥猪</span></li>
                                    <li><img src="/quce/Public/images/zodiac/sx1.png" class="li-img" /> <span class="li-span"> 子鼠</span></li>
                                </ul>
                            </div>
                            <div class="cui-mask"></div>
                        </div>
                    </div>
                    <div class="submit-wrap">
                        <div id="submit-btn">开始配对 </div>
                    </div>
                </div>
                <!-- 结果 -->
                <div id="reult-container">
                    <div class="pdxz mt10">
                        <span class='result-title'>配对生肖</span>
                        <span class="man_zodiac">男牛</span> VS <span class="woman_zodiac">女牛</span>
                    </div>
                    <div class="pdxz mt10">
                        <span class='result-title'>结果评述</span>
                        <div class='text-indent'>评述文</div>
                    </div>
                    <div class="submit-wrap">
                        <div id="submit-btn" onclick="peidui()">我也要配对</div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            var myScrollb;
            var myScrollg;
            var liheight = document.querySelector('.ul-b').firstElementChild.clientHeight;
            var gid = 1 + 1;
            var bid = 1 + 1;
            var initScoll = -1 * liheight;
            var zodiacData = ['鼠','牛','虎','兔','龙','蛇','马','羊','猴','鸡','狗','猪'];
            function loaded() {
                /* 男生 */
                myScrollb = new IScroll('#wrapper-b', {
                    scrollX: false,
                    scrollY: true,
                    momentum: false,
                    snap: false,
                    snapSpeed: 400,
                    keyBindings: true
                });

                myScrollb.on('scrollEnd', function() {
                    checkScoll(myScrollb, 0);
                });
                /* 女孩*/
                myScrollg = new IScroll('#wrapper-g', {
                    scrollX: false,
                    scrollY: true,
                    momentum: false,
                    snap: false,
                    snapSpeed: 400,
                    keyBindings: true
                });

                myScrollg.on('scrollEnd', function() {
                    checkScoll(myScrollg, 1);
                });

                function init() {
                    myScrollb.scrollBy(0, initScoll);
                    myScrollg.scrollBy(0, initScoll);
                    $('.activefnt-b').removeClass('activefnt-b');
                    $('.ul-b li').eq(1 + 1).find('span').addClass('activefnt-b');
                    $('.activefnt-g').removeClass('activefnt-g');
                    $('.ul-g li').eq(1 + 1).find('span').addClass('activefnt-g');
                }
                init();

                function checkScoll(scroll, flg) {
                    y = scroll.y;
                    absy = Math.abs(y);
                    if (absy % liheight >= liheight / 2) {
                        scollup = absy % liheight - liheight;
                        scroll.scrollBy(0, scollup);
                        console.log('absy:' + absy % liheight + 'scollup:' + scollup)
                    }
                    if (absy % liheight > 0 && absy % liheight < liheight / 2) {
                        scolldown = absy % liheight;
                        scroll.scrollBy(0, scolldown);
                        console.log('absy:' + absy % liheight + 'scolldown:' + scolldown)
                    }
                    absy = Math.abs(y);
                    if (absy < liheight) {
                        index = 1;
                    } else {
                        index = Math.round(absy / liheight) + 1;
                    }
                    index = Math.round(absy / liheight) + 1;
                    if (!flg) {
                        $('.activefnt-b').removeClass('activefnt-b');
                        $('.ul-b li').eq(index).find('span').addClass('activefnt-b');
                        bid = index;
                    } else {
                        $('.activefnt-g').removeClass('activefnt-g');
                        $('.ul-g li').eq(index).find('span').addClass('activefnt-g');
                        gid = index;
                    }
                    console.log('滚动距离：' + y + '校正后距离：' + scroll.y + "当前选中：" + index)
                    console.log(scroll.y)
                }
            }
            
            $('#submit-btn').on('click',function(){
                console.log('bid:' + zodiacData[bid -1] + 'gid:' + zodiacData[gid -1])
                $.post("<?php echo U('Zodiac/zodiacPeiduiObtain','',false);?>",{male:zodiacData[bid -1],female:zodiacData[gid -1]},function(result){
                    var data = JSON.parse(result);
                    $('.man_zodiac').text(data.male_name);
                    $('.woman_zodiac').text(data.female_name);
                    $('.text-indent').text(data.text);
                    $('#select-container').hide();
                    $('#reult-container').show();
                })
            })

            String.prototype.temp = function(obj) {
                return this.replace(/\##\w+\##/gi, function(matchs) {
                    var returns = obj[matchs.replace(/\##/g, "")];
                    return (returns + "") == "undefined" ? "" : returns;
                });
            };
            function peidui() {window.location = "<?php echo U('Zodiac/zodiacPeidui','',false);?>";}
	    </script>
    </body>
</html>