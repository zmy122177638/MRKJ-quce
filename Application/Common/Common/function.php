<?php
//拿到access_token
function getToken(){
    if(S('token')!=''){
        return S('token');
    }else {
        $id = C("APPID");
        $secret = C("APPSECRET");
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$id}&secret={$secret}";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);//设置请求地址
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//不需要证书验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);//不需要主机验证
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        $arr = json_decode($json, true);
        S('token',$arr['access_token'],7100);
        return $arr['access_token'];
        curl_close($ch);
    }
}
//拿到jsapi_ticket
function getTicket(){
    if(S('ticket')!=''){
        return S('ticket');
    }else{
        $token = S('token');
        $url ="https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token={$token}&type=jsapi";
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);//设置请求地址
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//不需要证书验证
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);//不需要主机验证
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $json = curl_exec($ch);
        $arr=json_decode($json,true);
        S("ticket",$arr['ticket'],7100);
        return $arr['ticket'] ;
        curl_close($ch);
    }
}
function getCode($url){ //不用授权获取code
    if(cookie('code')!=''){
        return cookie('code');
    }else{
        $APPID = C("APPID");
        $url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$APPID}&redirect_uri={$url}&response_type=code&scope=snsapi_base&state=1#wechat_redirect";
        redirect($url);
    }
}
function getOopenid($wzurl){ //不用授权获取openid
    if(cookie('openid')){
        return cookie('openid');
    }else {
        $APPID = C("APPID");
        $APPSECRET = C("APPSECRET");
        $code = cookie('code');
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$APPID}&secret={$APPSECRET}&code={$code}&grant_type=authorization_code";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);//设置请求地址
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//不需要证书验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);//不需要主机验证
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        $arr = json_decode($json, true);
        if($arr['openid']){
            cookie("openid",$arr['openid']);
        }else{
            cookie('code',null);
            redirect($wzurl);exit;
        }
        return $arr['openid'];
    }
}

function wxGetCode($url){ //授权获取code
    if(cookie('code')!=''){
        return cookie('code');
    }else{
        $APPID = C("APPID");
        $url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$APPID}&redirect_uri={$url}&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
        redirect($url);
    }
}
function Caccess_token(){//使用code换取access_token
    if(cookie("openid")&&cookie('accessToken')){

    }else{
        $APPID = C("APPID");
        $secret = C("APPSECRET");
        $code = cookie('code');
        $url ="https://api.weixin.qq.com/sns/oauth2/access_token?appid={$APPID}&secret={$secret}&code={$code}&grant_type=authorization_code";
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);//设置请求地址
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//不需要证书验证
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);//不需要主机验证
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $json = curl_exec($ch);
        $arr=json_decode($json,true);
        if($arr['openid']){
            cookie('accessToken',$arr['access_token'],7100);
            cookie("openid",$arr['openid']);
            cookie('uid',$arr['openid']);
        }
    }
}
function wxgetUsertext(){  //授权获取微信用户的信息
    $accessToken=cookie('accessToken');
    $openid=cookie('openid');
    $url ="https://api.weixin.qq.com/sns/userinfo?access_token={$accessToken}&openid={$openid}&lang=zh_CN";
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);//设置请求地址
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//不需要证书验证
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);//不需要主机验证
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $json = curl_exec($ch);
    $arr=json_decode($json,true);
    return $arr;
}

function wxgzhzf($nick,$name,$orderid){//微信公众号支付
    if(empty($nick)){echo 'nike';exit;}
    $arrdata=M()->query("select id from qc_pay_order where ordernum='{$orderid}' and status=-1 limit 1");
    if(!empty($arrdata)){
        if(cookie('wxzfNum')!=''){
            $orderid=$nick.date('Ymd').mt_rand(1000,9999).date('His');//重新生成订单
            cookie('orderid',$orderid);
            M()->query("update qc_pay_order set ordernum='{$orderid}' where id='{$arrdata[0]['id']}'");
        }
        cookie('wxzfNum',1);
    }else{
        echo '没有订单';exit;
    }
    $price=cookie('price');
    if(empty($price)){$price=8.8;}
    $price*=100;

    $noncestr=noncestr(15);
    $MCHID=C('GMCHID');
    $body=$name;
    $notifyUrl='https://www.yixueqm.com/quce/index.php/Home-Index-return_urlwxx';
    $stringA="appid=".C('APPID')."&body={$body}&mch_id={$MCHID}&nonce_str={$noncestr}&notify_url={$notifyUrl}&openid=".cookie("openid")."&out_trade_no={$orderid}&spbill_create_ip={$_SERVER['REMOTE_ADDR']}&total_fee={$price}&trade_type=JSAPI";
    $stringSignTemp=$stringA."&key=".C('KEY'); //注：key为商户平台设置的密钥key
    $sign=strtoupper(md5($stringSignTemp));

    $strData=array(
        'appid'=>C('APPID'),
        'mch_id'=>$MCHID,
        'nonce_str'=>$noncestr,
        'sign'=>$sign,
        'body'=>$body,
        'out_trade_no'=>$orderid,
        'total_fee'=>$price,
        'spbill_create_ip'=>$_SERVER['REMOTE_ADDR'],
        'notify_url'=>$notifyUrl,
        'trade_type'=>'JSAPI',
        'openid'=>cookie("openid"),
    );
    $xml = "<xml>";
    foreach ($strData as $key=>$val)//数组转xml
    {
        if (is_numeric($val)){
            $xml.="<".$key.">".$val."</".$key.">";
        }else{
            $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
        }
    }
    $xml.="</xml>";
    $strData=$xml;
    //$json=json_encode($data,JSON_UNESCAPED_UNICODE);
    $headers=array(
        'Content-Type:text/xml;charset=utf-8',
    );
    $url="https://api.mch.weixin.qq.com/pay/unifiedorder";

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch,CURLOPT_URL,$url); //设置请求地址
    curl_setopt($ch,CURLOPT_POST,true); //post请求
    curl_setopt($ch,CURLOPT_POSTFIELDS,$strData);// post请求的数据
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//不需要证书验证
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);//不直接输出到页面
    $json = curl_exec($ch);
    return $json;
    curl_close($ch);
}

function H5ZMwxzhifu($nick,$name,$orderid){//知命H5微信支付
    if(empty($nick)){echo 'nike';exit;}
    $arrdata=M()->query("select id from qc_pay_order where ordernum='{$orderid}' and status=-1 limit 1");
    if(!empty($arrdata)){
        if(cookie('wxzfNum')!=''){
            $orderid=$nick.date('Ymd').mt_rand(1000,9999).date('His');//重新生成订单
            cookie('orderid',$orderid);
            M()->query("update qc_pay_order set ordernum='{$orderid}' where id='{$arrdata[0]['id']}'");
        }
        cookie('wxzfNum',1);
    }else{
       echo '没有订单';exit;
    }
    $price=cookie('price');
    $price*=100;

    if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
        $ip = getenv('HTTP_CLIENT_IP');
    } elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
    } elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
        $ip = getenv('REMOTE_ADDR');
    } elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    $ip=preg_match ( '/[\d\.]{7,15}/', $ip, $matches ) ? $matches [0] : '';
    $scene_info="{\"h5_info\": {\"type\":\"Wap\",\"wap_url\": \"https://hy.yixueqm.com\",\"wap_name\": \"知命支付\"}}";


    $noncestr=noncestr(15);
    $MCHID=C('GMCHID');
    $body=$name;
    $type='MWEB';
    $notifyUrl='https://www.yixueqm.com/quce/index.php/Home-Index-return_urlwxx';
    $stringA="appid=".C('APPID')."&body={$body}&mch_id={$MCHID}&nonce_str={$noncestr}&notify_url={$notifyUrl}&out_trade_no={$orderid}&scene_info={$scene_info}&spbill_create_ip={$ip}&total_fee={$price}&trade_type={$type}";
    $stringSignTemp=$stringA."&key=".C('KEY'); //注：key为商户平台设置的密钥key
    $sign=strtoupper(md5($stringSignTemp));

    $strData=array(
        'appid'=>C('APPID'),
        'mch_id'=>$MCHID,
        'nonce_str'=>$noncestr,
        'sign'=>$sign,
        'body'=>$body,
        'out_trade_no'=>$orderid,
        'total_fee'=>$price,
        'spbill_create_ip'=>$ip,
        'notify_url'=>$notifyUrl,
        'trade_type'=>$type,
        'scene_info'=>$scene_info,
    );

    $xml = "<xml>";
    foreach ($strData as $key=>$val)//数组转xml
    {
        if (is_numeric($val)){
            $xml.="<".$key.">".$val."</".$key.">";
        }else{
            $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
        }
    }
    $xml.="</xml>";
    $strData=$xml;
    //$json=json_encode($data,JSON_UNESCAPED_UNICODE);
    $headers=array(
        'Content-Type:text/xml;charset=utf-8',
    );
    $url="https://api.mch.weixin.qq.com/pay/unifiedorder";

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch,CURLOPT_URL,$url); //设置请求地址
    curl_setopt($ch,CURLOPT_POST,true); //post请求
    curl_setopt($ch,CURLOPT_POSTFIELDS,$strData);// post请求的数据
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//不需要证书验证
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);//不直接输出到页面
    $json = curl_exec($ch);
    $code = curl_getinfo($ch,CURLINFO_HTTP_CODE);

    $xmlstring = simplexml_load_string($json, 'SimpleXMLElement', LIBXML_NOCDATA);
    $val = json_decode(json_encode($xmlstring),true);
    curl_close($ch);
    $redirect_url='https://'.$_SERVER['HTTP_HOST']."/quce/index.php/Home-Index-return_url?orderid={$orderid}";
    $redirect_url=urlencode($redirect_url);

    header("location:".$val['mweb_url']."&redirect_url=".$redirect_url);
}



function yinli($y,$m,$d){  //阳历转阴历
    header("Content-Type:text/html;charset=utf-8");

    $lunar = new \Library\Lunar();
    $month = $lunar->convertSolarToLunar($y,$m,$d);//将阳历转换为阴历
    $data = $lunar->getLeapMonth($month[0]);//判断闰月
    cookie('runyue',$data);

    if($m==2&&$d==3){
        $d-=1;
    }
    if($y%4==0)$d+=1;

    $jieqi=$lunar->getJieQi($y,$m,$d);
    cookie('jieqi',$jieqi['name1']);
    cookie('jieqi2',$jieqi['name2']);
    return $month;
}
function yangli($y,$m,$d){//阴历转阳历
    $lunar = new \Library\Lunar();
    $month = $lunar->convertLunarToSolar($y,$m,$d);//将阳历转换为阴历
    return $month;
}

function jieqi($ymd){//计算节气的日期
    $y=mb_substr($ymd,0,4);
    $m=mb_substr($ymd,5,2); //月
    $d=mb_substr($ymd,8,2);//日
    header("Content-Type:text/html;charset=utf-8");
    $lunar = new \Library\Lunar();
    $jieqi=$lunar->getJieQi($y,$m,$d);
    return $jieqi['name1'];

}
function jieqiapi($ymd,$jieqi){//获取节气的具体时间
    $arrjeiqi=array("小寒","大寒","立春","雨水","惊蛰","春分","清明","谷雨",
        "立夏","小满","芒种","夏至","小暑","大暑","立秋","处暑",
        "白露","秋分","寒露","霜降","立冬","小雪","大雪","冬至");
    $key=array_search($jieqi,$arrjeiqi);
    $arrjeiqix=array("xiaohan","dahan","lichun","yushui","jingzhe","chunfen","qingming","guyu",
        "lixia","xiaoman","mangzhong","xiazhi","xiaoshu","dashu","liqiu","chushu",
        "bailu","qiufen","hanlu","shuangjiang","lidong","xiaoxue","daxue","dongzhi");

    $arr=M()->query("select * from tb_24jieqi where year='{$ymd}'");
    $data=mb_substr($arr[0][$arrjeiqix[$key]],12,5,'utf-8');
    if($data){
        return $data;
    }else{
        return '11:55';
    }
}
//流年运程2019
function lnyuncheng2019($zymd,$dayun,$dayunss,$constellation,$hour){
    $y=mb_substr($zymd,0,4);$m=mb_substr($zymd,5,2);$d=mb_substr($zymd,8,2);
    $datayear=date('Y')-$y;
    $GLOBALS['age']=$datayear;
    if($datayear<$dayun+11){$data=0;}else if($datayear<$dayun+21){$data=1;}else if($datayear<$dayun+31){$data=2;
    }else if($datayear<$dayun+41){$data=3;}else if($datayear<$dayun+51){$data=4;
    }else if($datayear<$dayun+61){$data=5;}else if($datayear<$dayun+71){$data=6;}else{$data=7;}
    $arrlnyc=M()->query("select name,dianping from tb_lnyuncheng where name='{$dayunss[$data]}'");
    $GLOBALS['lnyuncheng']=$arrlnyc[0];
    $GLOBALS['datacolor']=$data;

    $cArr=M()->query("select id,yunshi from tb_constellation_2019 where star='{$constellation}'");

    $ln2019['yunshi']=$cArr[0]['yunshi'];
    $cid=$cArr[0]['id'];
    for($i=1;$i<=4;$i++){
        $cid+=1;if($cid>10)$cid-=10;
        if($i==1){$cArr=M()->query("select id,caiyun from tb_constellation_2019 where id=$cid");$ln2019['caiyun']=$cArr[0]['caiyun'];}
        if($i==2){$cArr=M()->query("select id,shiye from tb_constellation_2019 where id=$cid");$ln2019['shiye']=$cArr[0]['shiye'];}
        if($i==3){$cArr=M()->query("select id,aiqing from tb_constellation_2019 where id=$cid");$ln2019['aiqing']=$cArr[0]['aiqing'];}
        if($i==4){$cArr=M()->query("select id,jiankang from tb_constellation_2019 where id=$cid");$ln2019['jiankang']=$cArr[0]['jiankang'];}
    }

    $yjNumber=($y+$m+$d-$hour)%10;
    $monthArr=array();
    for($i=1;$i<=12;$i++){
        $yjNumber+=1;
        if($yjNumber>10)$yjNumber-=10;
        $data='month'.$i;
        $arrlnyc=M()->query("select {$data} from tb_lnyuncheng where id='{$yjNumber}'");
        $monthArr[$i]=$arrlnyc[0][$data];
    }
    $ln2019['monthArr']=$monthArr;
    return $ln2019;
}
function jkzt($srg,$arrzx,$arrtf,$jix,$xiongx,$shua){//健康状态
    $mgwz=array_search('疾厄',$srg);$qywz=array_search('父母',$srg);
    $sywz=array_search('兄弟',$srg);$vbwz=array_search('田宅',$srg);
    $zsqkwz=array();
    array_push($zsqkwz,$mgwz,$qywz,$sywz,$vbwz);
    $GLOBALS['jkztwz']=$zsqkwz;//位置
    $zsqkzx='';//拥有主星
    if(!empty($arrzx[$zsqkwz[0]])){$zsqkzx=mb_substr($arrzx[$zsqkwz[0]],0,2,'utf-8').',';}
    //if(!empty($arrzx[$zsqkwz[1]])){$zsqkzx=$zsqkzx.mb_substr($arrzx[$zsqkwz[1]],0,2,'utf-8').',';}
    if(!empty($arrtf[$zsqkwz[0]])){$zsqkzx=$zsqkzx.mb_substr($arrtf[$zsqkwz[0]],0,2,'utf-8').',';}
    //if(!empty($arrtf[$zsqkwz[1]])){$zsqkzx=$zsqkzx.mb_substr($arrtf[$zsqkwz[1]],0,2,'utf-8').',';}
    if(empty($zsqkzx)){
        if(!empty($arrzx[$zsqkwz[1]])){$zsqkzx=$zsqkzx.mb_substr($arrzx[$zsqkwz[1]],0,2,'utf-8').',';}
        if(!empty($arrtf[$zsqkwz[1]])){$zsqkzx=$zsqkzx.mb_substr($arrtf[$zsqkwz[1]],0,2,'utf-8').',';}
    }

    $hyqgzx=substr($zsqkzx,0,strlen($zsqkzx)-1);
    $GLOBALS['jkztzx']=$hyqgzx;
//吉凶
    $jixing=$jix[$zsqkwz[0]];
    if(!empty($jixing)){$jixing=substr($jixing,0,strlen($jixing)-1).'坐疾厄宫,';}
    $jixingy=$jix[$zsqkwz[1]];
    if(!empty($jixingy)){$jixing=$jixing.substr($jixingy,0,strlen($jixingy)-1).'对照,';}
    $jixingx=$jix[$zsqkwz[2]].$jix[$zsqkwz[3]];
    if(!empty($jixingx)){$jixing=$jixing.substr($jixingx,0,strlen($jixingx)-1).'加会,';}
    $datalu=stristr($hyqgzx,$shua[0]['hlu']);//化禄
    if(!empty($datalu)){$jixing=$jixing.$shua[0]['hlu'].'化禄,';}
    $dataquan=stristr($hyqgzx,$shua[0]['hquan']);//化权
    if(!empty($dataquan)){$jixing=$jixing.$shua[0]['hquan'].'化权,';}
    $datake=stristr($hyqgzx,$shua[0]['hke']);//化科
    if(!empty($datake)){$jixing=$jixing.$shua[0]['hke'].'化科,';}
    $jixing=substr($jixing,0,strlen($jixing)-1);
    $GLOBALS['jkztjx']=$jixing;

    $xiongxing=$xiongx[$zsqkwz[0]].$xiongx[$zsqkwz[1]];
    if(!empty($xiongxing)){$xiongxing=substr($xiongxing,0,strlen($xiongxing)-1).'坐疾厄宫,';}
    $xiongxingx=$xiongx[$zsqkwz[2]].$xiongx[$zsqkwz[3]];
    if(!empty($xiongxingx)){$xiongxing=$xiongxing.substr($xiongxingx,0,strlen($xiongxingx)-1).'加会,';}
    $dataji=stristr($hyqgzx,$shua[0]['hji']);//化忌
    if(!empty($dataji)){$xiongxing=$xiongxing.$shua[0]['hji'].'化忌,';}
    $xiongxing=substr($xiongxing,0,strlen($xiongxing)-1);
    $GLOBALS['jkztxx']=$xiongxing;
//宫位
    $dizhix=array('寅','卯','辰','巳','午','未','申','酉','戌','亥','子','丑');
    $mggongwei=M()->query("select * from tb_zwds_dizhi where dizhi='{$dizhix[$zsqkwz[0]]}' and palace='疾厄'");
    $GLOBALS['jegongwei']=$mggongwei[0]['text'];
//宫位凶吉
    if(cookie('jexj'.$zsqkwz[0])==''){$data=mt_rand(60,100).'.'.mt_rand(10,99);cookie('jexj'.$zsqkwz[0],$data,315360);}
    $GLOBALS['jexj']=cookie('jexj'.$zsqkwz[0]);
//疾厄状况
    $arrzx=explode(',',$zsqkzx);
    $arrzx=array_filter($arrzx);
    $arrzhux=array();
    foreach($arrzx as $key=>$value){
        $arr=M()->query("select * from tb_zwds_zhuxing where star='{$value}' and palace='疾厄'");
        $arr[0]=array_filter($arr[0]);
        $arrzhux=array_merge($arrzhux,$arr);
    }
    $GLOBALS['jearrzhux']=$arrzhux;

    $jxstrz=$jix[$zsqkwz[0]].$xiongx[$zsqkwz[0]];
    $jxstrd=$jix[$zsqkwz[1]].$xiongx[$zsqkwz[1]];
    $jxstrh=$jix[$zsqkwz[2]].$jix[$zsqkwz[3]].$xiongx[$zsqkwz[2]].$xiongx[$zsqkwz[3]];
    $arrfxz=explode(',',substr($jxstrz,0,strlen($jxstrz)-1));$arrfuxz=array();
    $arrfxd=explode(',',substr($jxstrd,0,strlen($jxstrd)-1));$arrfuxd=array();
    $arrfxj=explode(',',substr($jxstrh,0,strlen($jxstrh)-1));$arrfuxj=array();
    foreach($arrfxz as $key=>$value){
        $arr=M()->query("select * from tb_zwds_fuxing where star='{$value}' and palace='疾厄'");
        $arrfuxz=array_merge($arrfuxz,$arr);}
    foreach($arrfxd as $key=>$value){
        $arr=M()->query("select * from tb_zwds_fuxing where star='{$value}' and palace='疾厄'");
        $arrfuxd=array_merge($arrfuxd,$arr);}
    foreach($arrfxj as $key=>$value){
        $arr=M()->query("select * from tb_zwds_fuxing where star='{$value}' and palace='疾厄'");
        $arrfuxj=array_merge($arrfuxj,$arr);}
    for($i=0;$i<count($arrfuxz);$i++){
        if($arrfuxz[$i]['text']==$arrfuxz[$i+1]['text']){
            $arrfuxz[$i]['star']=$arrfuxz[$i]['star'].'坐疾厄宫,'.$arrfuxz[$i+1]['star'];
            $arrfuxz[$i+1]='';$i++;}}
    for($i=0;$i<count($arrfuxd);$i++){
        if($arrfuxd[$i]['text']==$arrfuxd[$i+1]['text']){
            $arrfuxd[$i]['star']=$arrfuxd[$i]['star'].'对照,'.$arrfuxd[$i+1]['star'];
            $arrfuxd[$i+1]='';$i++;}}
    for($i=0;$i<count($arrfuxj);$i++){
        if($arrfuxj[$i]['text']==$arrfuxj[$i+1]['text']){
            $arrfuxj[$i]['star']=$arrfuxj[$i]['star'].'加会,'.$arrfuxj[$i+1]['star'];
            $arrfuxj[$i+1]='';$i++;}}
    $GLOBALS['jearrfuxz']=array_filter($arrfuxz);
    $GLOBALS['jearrfuxd']=array_filter($arrfuxd);
    $GLOBALS['jearrfuxj']=array_filter($arrfuxj);
}