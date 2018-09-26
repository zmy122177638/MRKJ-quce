<?php
ini_set('date.timezone','PRC');
$config = array (
    //应用ID,您的APPID。
    'app_id' => "2016101302144443",

    //商户私钥，您的原始格式RSA私钥
    'merchant_private_key' => "MIIEvwIBADANBgkqhkiG9w0BAQEFAASCBKkwggSlAgEAAoIBAQC0xT8v+j61qKcjx0IeEaUT1EOJoH9cRSZPqpsqv+15G3WY9HLuktX+Rf7bFm9iS4CSgqD/v6WniiTDUjP0JVzV6moTK5dr1XObGo/Rfpy7phWaj5LXsnL9EYKLRTsOIejg3DxJNJr/57+DMhZEe8JxxthZwXpWiNz++N7jL+tXBcQLZKrBWgVMamuD/mR5a9qQEc5F4wsfyldN4jpHC632Eme6WCRt4C4tdkKYFl8JTB3zgXfqQzBHQshkV1SEfGTJ1rTMy7a/roI7uFlAiaouKSOOwe+dOpq5bX7noWeKQBgn1ZLk7a/+rvdG7Lik4X/TODrNnrOlYiMSxP59yA7nAgMBAAECggEBAIUDapZD/aavnaSu9tCnTR+FHdkEFxLu8tzF/Xz8UqG9ec99d6BivUFngbr2DCl4wveLVSo6e4sHFDwAnaf1YhUpcrn+ZmH7YyBq8A5Hqs5MzDK5mGRMs13RZ4xQ+b5RZ0kl5No88hyBCyNfVJE5u376wLFyszE/bdXTjDYBSZryq8vlW2EID2IQXosabHLxV6TICMz73L0ExgvL+DrI4+u/aE/ijo3T+r62sTzGBtrpYW26FN0CEDjhROiYj6PhsOHKTzZaOA4VMO/kk0VdfZVjDCelgfO4arjTXQfA9i5yz1aTDsQIgaoPVNznl0zDbwi5yFDIgmHEVcbF2Wo5pNkCgYEA+wr51uqq5cV6EpySQNxjSypU6fv4wMU9qZTiJS7KiguOOK8ZSAp2BUBI+3ul5xkI7HrZQIyz0n6GVq9uwzbVja2LFYDQ6n66F8EN20MSro570sbnhhwglBkYMShwrTdx1OD/zee0utcBMgiFVPqy/mRGe07ZAsfBNXX7MmT5SuUCgYEAuFcLGZ/Txv5ms2tsNIe7GSVouvXsV1AT/wsLtU/MZh37bp53Xo4NFHU26yg6fe6t4pV6/8s4u6GPkjOmhWuQdyoUvGPdzLw3KAvH9FNzWMPXdUz27VgK3gY42ZkK0wMMXWCcoWY7Wnvf04tIF/dwreMoS11zXPdO4/Hd9An4OdsCgYEAygnjWNwz/ggYXrIz4o98OhovjMCFSl9zaO+xsUsfJkp2g5goOJpysXczRXIV6w9y5x9XiWOztUyuwUUfV2ziIcvxi7TIbnDfRA7TIAuzFVkGvnPmEUDB12760VVCmaVtr24FcalxAo3XIHVLGUFKnQIG12Z1sI8jJ+tz5vLszyECgYEAhKn4DhftNJAP314XAHMSXpWCmtKzpV63FVygr3rfcjpvofufksgOd8Ono3NPLSRhtei4HXDmwnoSNji/xdNUo74AMFh63oYx97sKyzZnk+FVpVCfgM5U+9ZkgY1XsebGtkj6UFmfq43s1nStjLoCONJ7REnb5XMCLp/5iVDHePMCgYA1kOn9OSGZsdt5+xlj7i4k8WIsFU74QRwN8Cl4FEnCG9cHRcMoaaBtbbjavroAZlRtCRmc7QKp/V9QFx8khDyEFHFpx6AnAva8OoGAfJtyGP0luRZewniDQebAVxVF3V/3AmmKTL2smohCPE81bMHOEJyWk1L3cbnPw0fW7u1+SA==",

    //异步通知地址
    'notify_url' => "https://www.yixueqm.com/quce/index.php/Home-Index-notify_url",

    //同步跳转
    'return_url' => "https://www.yixueqm.com/quce/index.php/Home-Index-return_url",

    //编码格式
    'charset' => "UTF-8",

    //签名方式
    'sign_type'=>"RSA2",

    //支付宝网关
    'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

    //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
    'alipay_public_key' => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCnxj/9qwVfgoUh/y2W89L6BkRAFljhNhgPdyPuBV64bfQNN1PjbCzkIM6qRdKBoLPXmKKMiFYnkd6rAoprih3/PrQEB/VsW8OoM8fxn67UDYuyBTqA23MML9q1+ilIZwBC2AQ2UBVOrFXfFl75p6/B5KsiNG9zpgmLCUYuLkxpLQIDAQAB",

);