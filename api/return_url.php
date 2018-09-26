<?php
/* *
 * 功能：支付宝页面跳转同步通知页面
 * 版本：2.0
 * 修改日期：2016-11-01
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。

 *************************页面功能说明*************************
 * 该页面可在本机电脑测试
 * 可放入HTML等美化页面的代码、商户业务逻辑程序代码
 */
require_once "config.php";
require_once 'wappay/service/AlipayTradeService.php';


$arr=$_GET;
$alipaySevice = new AlipayTradeService($config);
$result = $alipaySevice->check($arr);

/* 实际验证过程建议商户添加以下校验。
1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
4、验证app_id是否为该商户本身。
*/
if($result) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代码
	
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
    //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

	//商户订单号

	$out_trade_no = htmlspecialchars($_GET['out_trade_no']);

	//支付宝交易号

	$trade_no = htmlspecialchars($_GET['trade_no']);
	echo "验证成功456<br />外部订单号：".$out_trade_no;
    print_r($_REQUEST);

	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {

    //验证失败
    //echo "验证失败123";

}

//商户订单号
$out_trade_no = htmlspecialchars($_GET['out_trade_no']);
//支付宝交易号
$trade_no = htmlspecialchars($_GET['trade_no']);
//商家appID
$app_id=htmlspecialchars($_GET['app_id']);
//支付价格
$price=htmlspecialchars($_GET['total_amount']);

$otn=mb_substr($out_trade_no,0,4);
if($otn=='MGZM'){
    header("location:https://hy.yixueqm.com/miguzuimei_tqhy/index.php/Home/Index/return_url?shop={$out_trade_no}&order={$trade_no}&appid={$app_id}&price={$price}&uid={$_COOKIE['uid']}");
}else if(!empty($otn)){
    header("location:https://hy.yixueqm.com/zhouyiqigua/index.php/Home/Index/return_url?shop={$out_trade_no}&order={$trade_no}&appid={$app_id}&price={$price}&uid={$_COOKIE['uid']}");
} else{
    echo "回调有误";
}


?>
<title>支付宝手机网站支付接口</title>
	</head>
    <body>
    </body>
</html>

<!--Array-->
<!--(-->
<!--[total_amount] => 0.01-->
<!--[timestamp] => 2017-09-27 12:02:01-->
<!--[sign] => V76XzzGG8ojSasxeD3oY40YWyjktNgHniDF5QLVf8HSZKBTe/V7zaC6cSjD/gPe6wtQRNZG4F3T3Tskjt4YlTDAWg2DSeayw+Gd40lm+lpxPLj9sy5JtfJSvFpwXAZl410wcD4MUQgJuQIPT7i6wWPJkKsdzyOMgktjDoiHiPW5H9MegkmPcsqbMJN9Lnc9fFq/moenuS1rM0EKTcf/g5NTfDiR7GSpy7EyV7GsMxqg/UKg14AIZ/oSGqH/1soKe0qLCh5hDKMXFN5NAF/t08ayTZL4aTLe8TGBiO5ouys6rFT1EBYEp1nEzPTAkdyncoRfzCcQMBC72fn5GNoqtOA==-->
<!--[trade_no] => 2017092721001004800220706536-->
<!--[sign_type] => RSA2-->
<!--[auth_app_id] => 2016101302144443-->
<!--[charset] => UTF-8-->
<!--[seller_id] => 2088901472027196-->
<!--[method] => alipay.trade.wap.pay.return-->
<!--[app_id] => 2016101302144443-->
<!--[out_trade_no] => 201792712114814-->
<!--[version] => 1.0-->
<!--)-->
