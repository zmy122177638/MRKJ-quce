<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="format-detection" content="telephone=no">
        <title>马年运势总览</title>
        <!--[if lt IE 9]>  
            <script src="http://cdn.bootcss.com/html5shiv/r29/html5.js"></script>
            <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>    
		<![endif]-->
		 <link rel="stylesheet" type="text/css" href="/quce/Public/css/_zodiac_ys.css"/>
		 <script src="/quce/Public/js/rem.js"></script>
	</head>
	<body> 
		<div class="main-wrap">
			<div class="head-container">		
				<img class="head-img" src="/quce/Public/images/zodiac/s<?php echo ($arr['id']); ?>.jpg">
				<div class="head-title-wrap">
					<p class="head-title">
						<strong><?php echo ($arr['dizhi']); echo ($arr['name']); ?></strong>
						<span><?php echo ($arr['xianghe']); ?></span>
					</p>			
				</div>  
				<img class="head-change" src="/quce/Public/images/zodiac/change.png"  onclick="changeCons()"/>
			</div>
			<div class="btn-container">
				<a class="col-xs-3 btn-item" data-id="ztys" href="javascript:;" onclick="checkUrl(this)">
					<img src="/quce/Public/images/zodiac/zongys.png" />
					<div class="btn-active active-ztys" style="display: block;"></div>
				</a>   
				<a class="col-xs-3 btn-item" data-id="ysxj" href="javascript:;" onclick="checkUrl(this)">
					<img src="/quce/Public/images/zodiac/yunsxj.png" />
					<div class="btn-active active-ysxj"></div>
				</a>
				<a class="col-xs-3 btn-item" data-id="sxys" href="javascript:;" onclick="checkUrl(this)">
					<img src="/quce/Public/images/zodiac/shengyys.png" />
					<div class="btn-active active-sxys"></div>
				</a>
				<a class="col-xs-3 btn-item" href="<?php echo U('Zodiac/zodiacPeidui','',false);?>">
					<img src="/quce/Public/images/zodiac/shengxpd.png" />
					<div class="btn-active active-month"></div>
				</a>
				<hr class="no-active">
			</div>
		</div>
		<script>
			function changeCons(){
				location.href="<?php echo U('Zodiac/zodiacIndex','',false);?>";
			}
			function checkUrl(element) {
				var item_id = element.getAttribute('data-id');
				var itemWrap = document.querySelectorAll('.zodiac_item');
				var activeShow = document.querySelectorAll('.btn-active');
				itemWrap.forEach(function(item){item.style.display = 'none';})
				activeShow.forEach(function(item){item.style.display = 'none';})
				document.querySelector('.active-'+item_id).style.display = "block";
				document.querySelector('#'+item_id).style.display = "block";
			}
		</script> 
		<!-- 总运势 -->
		<div class="main-wrap zodiac_item" id="ztys" style="display: block">    
			<div class="main-container">
				<div class="analys-item"> 
					<div class="item-tip " style="background:#00adc1">狗年运势</div>
					<p class="item-content"><?php echo ($arr['year_yunshi']); ?></p>
				</div>	
				<div class="analys-item">
					<div class="item-tip" style="background:#9bc53f">总体运势</div>
					<p class="item-content"><?php echo ($arr['zong_yunshi']); ?></p>
				</div>
				<div class="analys-item">
					<div id="fold-btn" class="fold-btn"><span class='fold-flag' attr='1'>展开 +</span></div>
					<div class="item-tip" style="background:#e84c3d">性格</div>
					<p class="item-content fold-able"><?php echo ($arr['xingge']); ?></p>
					
				</div>				
			</div>	
		</div>	
		<!--  运势详解 -->
		<div class="main-wrap zodiac_item" id="ysxj">   
			<div class="main-container">
				<div class="analys-item">
					<div class="item-tip" style="background:#9bc53f">健康</div>
					<p class="item-content"><?php echo ($arr['jiankang']); ?></p>
				</div>
				<div class="analys-item">
					<div class="item-tip" style="background:#00adc1">爱情</div>
					<p class="item-content"><?php echo ($arr['aiqing']); ?></p>
				</div>		
				<div class="analys-item">
					<div class="item-tip" style="background:#f87c4b">财运</div>
					<p class="item-content"><?php echo ($arr['caiyun']); ?></p>
				</div>	
				<div class="analys-item">
					<div class="item-tip" style="background:#f2a91c">事业</div>
					<p class="item-content"><?php echo ($arr['shiye']); ?></p>
				</div>
				<div class="analys-item">
					<div class="item-tip" style="background:#1bbc9b">流年</div>
					<p class="item-content"><?php echo ($arr['liunian']); ?></p>
				</div>
				<div class="analys-item">
					<div class="item-tip" style="background:#3598db">优点</div>
					<p class="item-content"><?php echo ($arr['youdian']); ?></p>
				</div>  
				<div class="analys-item">
					<div class="item-tip" style="background:#e84c3d">缺点</div>
					<p class="item-content"><?php echo ($arr['quedian']); ?></p>
				</div>
				<div class="analys-item"> 
					<div class="item-tip" style="background:#f39c11">姻缘</div>
					<p class="item-content"><?php echo ($arr['yinyuan']); ?></p>
				</div>			
			</div>
		</div>		
		<!-- 生肖运势 -->
		<div class="main-wrap zodiac_item" id="sxys">     
		<div class="main-container">
			<div class="analys-item">
					<div class="fold-btn"><span class='fold-flag' attr='1'>展开 +</span></div> 
					<div class="item-tip" style="background:#f87c4b">正月</div>
					<p class="item-content fold-able"><?php echo ($arr['month1']); ?></p>
				</div><div class="analys-item">
					<div class="fold-btn"><span class='fold-flag' attr='1'>展开 +</span></div> 
					<div class="item-tip" style="background:#f87c4b">二月</div>
					<p class="item-content fold-able"><?php echo ($arr['month2']); ?></p>
				</div><div class="analys-item">
					<div class="fold-btn"><span class='fold-flag' attr='1'>展开 +</span></div> 
					<div class="item-tip" style="background:#f87c4b">三月</div>
					<p class="item-content fold-able"><?php echo ($arr['month3']); ?></p>
				</div><div class="analys-item">
					<div class="fold-btn"><span class='fold-flag' attr='1'>展开 +</span></div> 
					<div class="item-tip" style="background:#f87c4b">四月</div>
					<p class="item-content fold-able"><?php echo ($arr['month4']); ?></p>
				</div><div class="analys-item">
					<div class="fold-btn"><span class='fold-flag' attr='1'>展开 +</span></div> 
					<div class="item-tip" style="background:#f87c4b">五月</div>
					<p class="item-content fold-able"><?php echo ($arr['month5']); ?></p>
				</div><div class="analys-item">
					<div class="fold-btn"><span class='fold-flag' attr='1'>展开 +</span></div> 
					<div class="item-tip" style="background:#f87c4b">六月</div>
					<p class="item-content fold-able"><?php echo ($arr['month6']); ?></p>
				</div><div class="analys-item">
					<div class="fold-btn"><span class='fold-flag' attr='1'>展开 +</span></div> 
					<div class="item-tip" style="background:#f87c4b">七月</div>
					<p class="item-content fold-able"><?php echo ($arr['month7']); ?></p>
				</div><div class="analys-item">
					<div class="fold-btn"><span class='fold-flag' attr='1'>展开 +</span></div> 
					<div class="item-tip" style="background:#f87c4b">八月</div>
					<p class="item-content fold-able"><?php echo ($arr['month8']); ?></p>
				</div><div class="analys-item">
					<div class="fold-btn"><span class='fold-flag' attr='1'>展开 +</span></div> 
					<div class="item-tip" style="background:#f87c4b">九月</div>
					<p class="item-content fold-able"><?php echo ($arr['month9']); ?></p>
				</div><div class="analys-item">
					<div class="fold-btn"><span class='fold-flag' attr='1'>展开 +</span></div> 
					<div class="item-tip" style="background:#f87c4b">十月</div>
					<p class="item-content fold-able"><?php echo ($arr['month10']); ?></p>
				</div><div class="analys-item">
					<div class="fold-btn"><span class='fold-flag' attr='1'>展开 +</span></div> 
					<div class="item-tip" style="background:#f87c4b">冬月</div>
					<p class="item-content fold-able"><?php echo ($arr['month11']); ?></p>
				</div><div class="analys-item">
					<div class="fold-btn"><span class='fold-flag' attr='1'>展开 +</span></div> 
					<div class="item-tip" style="background:#f87c4b">腊月</div>
					<p class="item-content fold-able"><?php echo ($arr['month12']); ?></p>
				</div>		
			</div>	
		</div>			
		<script>
			var flag =  document.querySelectorAll('.fold-flag');
			flag.forEach(function(item){
				item.onclick = function(){
					if(this.getAttribute('attr') == '1'){
						this.setAttribute('attr','0');
						this.innerHTML = '收起 -';
						this.parentNode.parentNode.lastElementChild.style.height = 'auto';
					}else{
						this.setAttribute('attr','1');
						this.innerHTML = '展开+';
						this.parentNode.parentNode.lastElementChild.style.cssText = 'height:0.76rem;overflow: hidden;line-height: 0.4rem;';
					}
				}
			})
		</script>
	</body>
</html>