<?php
function noncestr($data){//获取随机数
    if(cookie('noncestr')){
        return cookie('noncestr');
    }else{
        $chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $password='';
        for($i=0;$i<=$data;$i++){
            $password.=substr($chars, mt_rand(0, strlen($chars)-1),1);
        }
        cookie('noncestr',$password,7200);
        return $password;
    }
}
function wxJsdkData(){//微信分享网址参数
    return 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}

function obtain_channelID($name){//获取渠道ID
    $channel=cookie('channel');

    $cnzzIDArr=M()->query("select cnzzID from qc_cnzz_id where channel='{$channel}' and type='{$name}'");
    return $cnzzIDArr[0]['cnzzID'];

}
function cnzz_pvuv($name){//pV uV  统计
    $date=date('Ymd');
    $channel=cookie('channel');
    if(strlen($channel)>20){exit;}

    $cnzzArr=M()->query("select id,pv,uv from qc_cnzz_pvuv where date='{$date}' and channel='{$channel}' and csName='{$name}' limit 1");
    if(empty($cnzzArr)){
        M()->query("insert into qc_cnzz_pvuv (date,channel,csName,pv,uv)values(
                    '{$date}','{$channel}','{$name}',1,0)");
    }else{
        M()->query("update qc_cnzz_pvuv set pv='{$cnzzArr[0]['pv']}'+1 where id='{$cnzzArr[0]['id']}'");
    }

    //Uv
    $UvName=$channel.$name;
    $timex=time();
    $timey=strtotime("+1 day",strtotime($date));
    $timedata=$timey-$timex;

    $data=cookie($UvName);
    if(empty($data)){
        $cnzzArr=M()->query("select id,pv,uv from qc_cnzz_pvuv where date='{$date}' and channel='{$channel}' and csName='{$name}' limit 1");
        M()->query("update qc_cnzz_pvuv set uv='{$cnzzArr[0]['uv']}'+1 where id='{$cnzzArr[0]['id']}'");
        cookie($UvName,1,$timedata);
    }

}