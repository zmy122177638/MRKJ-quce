<?php
namespace Library;
class ZhanXing{
     public function ObtainData($ymd,$time){//占星数据获取
         $url = "https://xp.ixingpan.com/xp.php?type=natal&name=小明&sex=0&dist=2853&date={$ymd}&time={$time}&dst=0&hsys=P";
         $headers=array(
             'Content-Type:application/x-www-form-urlencoded',
         );
         $ch = curl_init();
         curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
         curl_setopt($ch,CURLOPT_URL,$url); //设置请求地址
         curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//不需要证书验证
         curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
         curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);//不直接输出到页面
         $json = curl_exec($ch);

         preg_match("/星体落入星座[\s\S]*各宫位置/",$json,$lrxz);
         $Stars=array();
         preg_match("/ps00[\s\S]*月亮/",$lrxz[0],$taiyang);
         $taiyangXZ=mb_substr($taiyang[0],11,10,'utf-8');
         $taiyangXZ=str_replace('<','',$taiyangXZ);
         $str=strlen($taiyang[0]);
         $taiyang=mb_substr($taiyang[0],10,$str,'utf-8');
         preg_match("/ph00[\s\S]*月亮/",$taiyang,$taiyang);
         $taiyangGW=mb_substr($taiyang[0],11,10,'utf-8');
         $taiyangGW=str_replace('<','',$taiyangGW);
         $Stars['taiyang'][0]=$taiyangXZ;
         $Stars['taiyang'][1]=$taiyangGW;


         preg_match("/ps01[\s\S]*水星/",$lrxz[0],$shuixing);
         $shuixingXZ=mb_substr($shuixing[0],11,10,'utf-8');
         $shuixingXZ=str_replace('<','',$shuixingXZ);
         $str=strlen($shuixing[0]);
         $shuixing=mb_substr($shuixing[0],10,$str,'utf-8');
         preg_match("/ph01[\s\S]*水星/",$shuixing,$shuixing);
         $shuixingGW=mb_substr($shuixing[0],11,10,'utf-8');
         $shuixingGW=str_replace('<','',$shuixingGW);
         $Stars['yueliang'][0]=$shuixingXZ;
         $Stars['yueliang'][1]=$shuixingGW;

         preg_match("/ps02[\s\S]*金星/",$lrxz[0],$jinxing);
         $jinxingXZ=mb_substr($jinxing[0],11,10,'utf-8');
         $jinxingXZ=str_replace('<','',$jinxingXZ);
         $str=strlen($jinxing[0]);
         $jinxing=mb_substr($jinxing[0],10,$str,'utf-8');
         preg_match("/ph02[\s\S]*金星/",$jinxing,$jinxing);
         $jinxingGW=mb_substr($jinxing[0],11,10,'utf-8');
         $jinxingGW=str_replace('<','',$jinxingGW);
         $Stars['shuixing'][0]=$jinxingXZ;
         $Stars['shuixing'][1]=$jinxingGW;

         preg_match("/ps03[\s\S]*火星/",$lrxz[0],$huoxing);
         $huoxingXZ=mb_substr($huoxing[0],11,10,'utf-8');
         $huoxingXZ=str_replace('<','',$huoxingXZ);
         $str=strlen($huoxing[0]);
         $huoxing=mb_substr($huoxing[0],10,$str,'utf-8');
         preg_match("/ph03[\s\S]*火星/",$huoxing,$huoxing);
         $huoxingGW=mb_substr($huoxing[0],11,10,'utf-8');
         $huoxingGW=str_replace('<','',$huoxingGW);
         $Stars['jinxing'][0]=$huoxingXZ;
         $Stars['jinxing'][1]=$huoxingGW;

         preg_match("/ps04[\s\S]*木星/",$lrxz[0],$muxing);
         $muxingXZ=mb_substr($muxing[0],11,10,'utf-8');
         $muxingXZ=str_replace('<','',$muxingXZ);
         $str=strlen($muxing[0]);
         $muxing=mb_substr($muxing[0],10,$str,'utf-8');
         preg_match("/ph04[\s\S]*木星/",$muxing,$muxing);
         $muxingGW=mb_substr($muxing[0],11,10,'utf-8');
         $muxingGW=str_replace('<','',$muxingGW);
         $Stars['huoxing'][0]=$muxingXZ;
         $Stars['huoxing'][1]=$muxingGW;

         preg_match("/ps05[\s\S]*土星/",$lrxz[0],$tuxing);
         $tuxingXZ=mb_substr($tuxing[0],11,10,'utf-8');
         $tuxingXZ=str_replace('<','',$tuxingXZ);
         $str=strlen($tuxing[0]);
         $tuxing=mb_substr($tuxing[0],10,$str,'utf-8');
         preg_match("/ph05[\s\S]*土星/",$tuxing,$tuxing);
         $tuxingGW=mb_substr($tuxing[0],11,10,'utf-8');
         $tuxingGW=str_replace('<','',$tuxingGW);
         $Stars['muxing'][0]=$tuxingXZ;
         $Stars['muxing'][1]=$tuxingGW;

         preg_match("/ps06[\s\S]*天王/",$lrxz[0],$tianwang);
         $tianwangXZ=mb_substr($tianwang[0],11,10,'utf-8');
         $tianwangXZ=str_replace('<','',$tianwangXZ);
         $str=strlen($tianwang[0]);
         $tianwang=mb_substr($tianwang[0],10,$str,'utf-8');
         preg_match("/ph06[\s\S]*天王/",$tianwang,$tianwang);
         $tianwangGW=mb_substr($tianwang[0],11,10,'utf-8');
         $tianwangGW=str_replace('<','',$tianwangGW);
         $Stars['tuxing'][0]=$tianwangXZ;
         $Stars['tuxing'][1]=$tianwangGW;

         preg_match("/ps07[\s\S]*海王/",$lrxz[0],$haiwang);
         $haiwangXZ=mb_substr($haiwang[0],11,10,'utf-8');
         $haiwangXZ=str_replace('<','',$haiwangXZ);
         $str=strlen($haiwang[0]);
         $haiwang=mb_substr($haiwang[0],10,$str,'utf-8');
         preg_match("/ph07[\s\S]*海王/",$haiwang,$haiwang);
         $haiwangGW=mb_substr($haiwang[0],11,10,'utf-8');
         $haiwangGW=str_replace('<','',$haiwangGW);
         $Stars['tianwang'][0]=$haiwangXZ;
         $Stars['tianwang'][1]=$haiwangGW;

         preg_match("/ps08[\s\S]*冥王/",$lrxz[0],$mingwang);
         $mingwangXZ=mb_substr($mingwang[0],11,10,'utf-8');
         $mingwangXZ=str_replace('<','',$mingwangXZ);
         $str=strlen($mingwang[0]);
         $mingwang=mb_substr($mingwang[0],10,$str,'utf-8');
         preg_match("/ph08[\s\S]*冥王/",$mingwang,$mingwang);
         $mingwangGW=mb_substr($mingwang[0],11,10,'utf-8');
         $mingwangGW=str_replace('<','',$mingwangGW);
         $Stars['haiwang'][0]=$mingwangXZ;
         $Stars['haiwang'][1]=$mingwangGW;

         preg_match("/ps09[\s\S]*婚神/",$lrxz[0],$hunsheng);
         $hunshengXZ=mb_substr($hunsheng[0],11,10,'utf-8');
         $hunshengXZ=str_replace('<','',$hunshengXZ);
         $str=strlen($hunsheng[0]);
         $hunsheng=mb_substr($hunsheng[0],10,$str,'utf-8');
         preg_match("/ph09[\s\S]*婚神/",$hunsheng,$hunsheng);
         $hunshengGW=mb_substr($hunsheng[0],11,10,'utf-8');
         $hunshengGW=str_replace('<','',$hunshengGW);
         $Stars['mingwang'][0]=$hunshengXZ;
         $Stars['mingwang'][1]=$hunshengGW;
         //dump($lrxz);
         foreach($Stars as $key=>$value){
             $Stars[$key][0]=str_replace('/','',$value[0]);
             $Stars[$key][1]=str_replace('/','',$value[1]);
         }

         //dump($Stars);
         $GLOBALS['Stars']=$Stars;



         preg_match("/各宫位置[\s\S]*相位列表/",$json,$ggwz);
         $various_gong=array();
         preg_match("/hs01[\s\S]*q=第2宫/",$ggwz[0],$gong1);
         $gong1=str_replace(' ','',$gong1[0]);
         $gong1XZ=mb_substr($gong1,10,10,'utf-8');
         $gong1GZX=mb_substr($gong1,53,2,'utf-8');
         $gong1RXZ=mb_substr($gong1,70,2,'utf-8');
         preg_match("/hsh01[\s\S]*q=第2宫/",$ggwz[0],$gong1);
         $gong1RG=mb_substr($gong1[0],12,3,'utf-8');
         $various_gong[1][0]=$gong1XZ;
         $various_gong[1][1]=$gong1GZX;
         $various_gong[1][2]=$gong1RXZ;
         $various_gong[1][3]=$gong1RG;

         preg_match("/hs02[\s\S]*q=第3宫/",$ggwz[0],$gong2);
         $gong2=str_replace(' ','',$gong2[0]);
         $gong2XZ=mb_substr($gong2,10,10,'utf-8');
         $gong2GZX=mb_substr($gong2,53,2,'utf-8');
         $gong2RXZ=mb_substr($gong2,70,2,'utf-8');
         preg_match("/hsh02[\s\S]*q=第3宫/",$ggwz[0],$gong2);
         $gong2RG=mb_substr($gong2[0],12,3,'utf-8');
         $various_gong[2][0]=$gong2XZ;
         $various_gong[2][1]=$gong2GZX;
         $various_gong[2][2]=$gong2RXZ;
         $various_gong[2][3]=$gong2RG;

         preg_match("/hs03[\s\S]*q=第4宫/",$ggwz[0],$gong3);
         $gong3=str_replace(' ','',$gong3[0]);
         $gong3XZ=mb_substr($gong3,10,10,'utf-8');
         $gong3GZX=mb_substr($gong3,53,2,'utf-8');
         $gong3RXZ=mb_substr($gong3,70,2,'utf-8');
         preg_match("/hsh03[\s\S]*q=第4宫/",$ggwz[0],$gong3);
         $gong3RG=mb_substr($gong3[0],12,3,'utf-8');
         $various_gong[3][0]=$gong3XZ;
         $various_gong[3][1]=$gong3GZX;
         $various_gong[3][2]=$gong3RXZ;
         $various_gong[3][3]=$gong3RG;

         preg_match("/hs04[\s\S]*q=第5宫/",$ggwz[0],$gong4);
         $gong4=str_replace(' ','',$gong4[0]);
         $gong4XZ=mb_substr($gong4,10,10,'utf-8');
         $gong4GZX=mb_substr($gong4,53,2,'utf-8');
         $gong4RXZ=mb_substr($gong4,70,2,'utf-8');
         preg_match("/hsh04[\s\S]*q=第5宫/",$ggwz[0],$gong4);
         $gong4RG=mb_substr($gong4[0],12,3,'utf-8');
         $various_gong[4][0]=$gong4XZ;
         $various_gong[4][1]=$gong4GZX;
         $various_gong[4][2]=$gong4RXZ;
         $various_gong[4][3]=$gong4RG;

         preg_match("/hs05[\s\S]*q=第6宫/",$ggwz[0],$gong5);
         $gong5=str_replace(' ','',$gong5[0]);
         $gong5XZ=mb_substr($gong5,10,10,'utf-8');
         $gong5GZX=mb_substr($gong5,53,2,'utf-8');
         $gong5RXZ=mb_substr($gong5,70,2,'utf-8');
         preg_match("/hsh05[\s\S]*q=第6宫/",$ggwz[0],$gong5);
         $gong5RG=mb_substr($gong5[0],12,3,'utf-8');
         $various_gong[5][0]=$gong5XZ;
         $various_gong[5][1]=$gong5GZX;
         $various_gong[5][2]=$gong5RXZ;
         $various_gong[5][3]=$gong5RG;

         preg_match("/hs06[\s\S]*q=第7宫/",$ggwz[0],$gong6);
         $gong6=str_replace(' ','',$gong6[0]);
         $gong6XZ=mb_substr($gong6,10,10,'utf-8');
         $gong6GZX=mb_substr($gong6,53,2,'utf-8');
         $gong6RXZ=mb_substr($gong6,70,2,'utf-8');
         preg_match("/hsh06[\s\S]*q=第7宫/",$ggwz[0],$gong6);
         $gong6RG=mb_substr($gong6[0],12,3,'utf-8');
         $various_gong[6][0]=$gong6XZ;
         $various_gong[6][1]=$gong6GZX;
         $various_gong[6][2]=$gong6RXZ;
         $various_gong[6][3]=$gong6RG;

         preg_match("/hs07[\s\S]*q=第8宫/",$ggwz[0],$gong7);
         $gong7=str_replace(' ','',$gong7[0]);
         $gong7XZ=mb_substr($gong7,10,10,'utf-8');
         $gong7GZX=mb_substr($gong7,53,2,'utf-8');
         $gong7RXZ=mb_substr($gong7,70,2,'utf-8');
         preg_match("/hsh07[\s\S]*q=第8宫/",$ggwz[0],$gong7);
         $gong7RG=mb_substr($gong7[0],12,3,'utf-8');
         $various_gong[7][0]=$gong7XZ;
         $various_gong[7][1]=$gong7GZX;
         $various_gong[7][2]=$gong7RXZ;
         $various_gong[7][3]=$gong7RG;

         preg_match("/hs08[\s\S]*q=第9宫/",$ggwz[0],$gong8);
         $gong8=str_replace(' ','',$gong8[0]);
         $gong8XZ=mb_substr($gong8,10,10,'utf-8');
         $gong8GZX=mb_substr($gong8,53,2,'utf-8');
         $gong8RXZ=mb_substr($gong8,70,2,'utf-8');
         preg_match("/hsh08[\s\S]*q=第9宫/",$ggwz[0],$gong8);
         $gong8RG=mb_substr($gong8[0],12,3,'utf-8');
         $various_gong[8][0]=$gong8XZ;
         $various_gong[8][1]=$gong8GZX;
         $various_gong[8][2]=$gong8RXZ;
         $various_gong[8][3]=$gong8RG;

         preg_match("/hs09[\s\S]*q=第10宫/",$ggwz[0],$gong9);
         $gong9=str_replace(' ','',$gong9[0]);
         $gong9XZ=mb_substr($gong9,10,10,'utf-8');
         $gong9GZX=mb_substr($gong9,53,2,'utf-8');
         $gong9RXZ=mb_substr($gong9,70,2,'utf-8');
         preg_match("/hsh09[\s\S]*q=第10宫/",$ggwz[0],$gong9);
         $gong9RG=mb_substr($gong9[0],12,3,'utf-8');
         $various_gong[9][0]=$gong9XZ;
         $various_gong[9][1]=$gong9GZX;
         $various_gong[9][2]=$gong9RXZ;
         $various_gong[9][3]=$gong9RG;

         preg_match("/hs10[\s\S]*q=第11宫/",$ggwz[0],$gong10);
         $gong10=str_replace(' ','',$gong10[0]);
         $gong10XZ=mb_substr($gong10,10,10,'utf-8');
         $gong10GZX=mb_substr($gong10,53,2,'utf-8');
         $gong10RXZ=mb_substr($gong10,70,2,'utf-8');
         preg_match("/hsh10[\s\S]*q=第11宫/",$ggwz[0],$gong10);
         $gong10RG=mb_substr($gong10[0],12,3,'utf-8');
         $various_gong[10][0]=$gong10XZ;
         $various_gong[10][1]=$gong10GZX;
         $various_gong[10][2]=$gong10RXZ;
         $various_gong[10][3]=$gong10RG;

         preg_match("/hs11[\s\S]*q=第12宫/",$ggwz[0],$gong11);
         $gong11=str_replace(' ','',$gong11[0]);
         $gong11XZ=mb_substr($gong11,10,10,'utf-8');
         $gong11GZX=mb_substr($gong11,53,2,'utf-8');
         $gong11RXZ=mb_substr($gong11,70,2,'utf-8');
         preg_match("/hsh11[\s\S]*q=第12宫/",$ggwz[0],$gong11);
         $gong11RG=mb_substr($gong11[0],12,3,'utf-8');
         $various_gong[11][0]=$gong11XZ;
         $various_gong[11][1]=$gong11GZX;
         $various_gong[11][2]=$gong11RXZ;
         $various_gong[11][3]=$gong11RG;

         preg_match("/hs12[\s\S]*相位列表/",$ggwz[0],$gong12);
         $gong12=str_replace(' ','',$gong12[0]);
         $gong12XZ=mb_substr($gong12,10,10,'utf-8');
         $gong12GZX=mb_substr($gong12,53,2,'utf-8');
         $gong12RXZ=mb_substr($gong12,70,2,'utf-8');
         preg_match("/hsh12[\s\S]*相位列表/",$ggwz[0],$gong12);
         $gong12RG=mb_substr($gong12[0],12,3,'utf-8');
         $various_gong[12][0]=$gong12XZ;
         $various_gong[12][1]=$gong12GZX;
         $various_gong[12][2]=$gong12RXZ;
         $various_gong[12][3]=$gong12RG;

         foreach($various_gong as $key=>$value){
             $various_gong[$key][0]=str_replace('<','',$value[0]);
             $various_gong[$key][3]=str_replace('<','',$value[3]);
             if(strpos($value[1],'太')){$various_gong[$key][1]='太阳';
             }else if(strpos($value[1],'月')){$various_gong[$key][1]='月亮';
             }else if(strpos($value[1],'水')){$various_gong[$key][1]='水星';
             }else if(strpos($value[1],'金')){$various_gong[$key][1]='金星';
             }else if(strpos($value[1],'火')){$various_gong[$key][1]='火星';
             }else if(strpos($value[1],'木')){$various_gong[$key][1]='木星';
             }else if(strpos($value[1],'土')){$various_gong[$key][1]='土星';
             }else if(strpos($value[1],'天')){$various_gong[$key][1]='天王';
             }else if(strpos($value[1],'海')){$various_gong[$key][1]='海王';
             }else if(strpos($value[1],'冥')){$various_gong[$key][1]='冥王';
             }

             if(strpos($value[2],'射')){$various_gong[$key][2]='射手';
             }else if(strpos($value[2],'摩')){$various_gong[$key][2]='摩羯';
             }else if(strpos($value[2],'水')){$various_gong[$key][2]='水瓶';
             }else if(strpos($value[2],'双')){$various_gong[$key][2]='双鱼';
             }else if(strpos($value[2],'白')){$various_gong[$key][2]='白羊';
             }else if(strpos($value[2],'金')){$various_gong[$key][2]='金牛';
             }else if(strpos($value[2],'双')){$various_gong[$key][2]='双子';
             }else if(strpos($value[2],'巨')){$various_gong[$key][2]='巨蟹';
             }else if(strpos($value[2],'狮')){$various_gong[$key][2]='狮子';
             }else if(strpos($value[2],'处')){$various_gong[$key][2]='处女';
             }else if(strpos($value[2],'天')){$various_gong[$key][2]='天秤';
             }
             if(strpos($value[2],'天蝎')){$various_gong[$key][2]='天蝎';}
         }
         foreach($various_gong as $key=>$value){
             $various_gong[$key][0]=str_replace('>','',$value[0]);
         }
         //dump($various_gong);
         $GLOBALS['variousGong']=$various_gong;

         preg_match("/相位列表[\s\S]*解盘概述/",$json,$xwlb);
         $xiangwei=array();
         $xwlb=str_replace(' ','',$xwlb[0]);

         preg_match("/pp00[\s\S]*pp00/",$xwlb,$Xwty);
         preg_match("/太阳[\s\S]*pp00/",$Xwty[0],$Xwty);
         if($Xwty[0]!=''){
             $taiyang0=mb_substr($Xwty[0],15,2,'utf-8');
             $XWnumber=$taiyang0=='六合'?30:29;
             $taiyang1=mb_substr($Xwty[0],$XWnumber,2,'utf-8');
             $xiangwei['taiyang'][0]=$taiyang0;
             $xiangwei['taiyang'][1]=$taiyang1;
             $xiangwei['taiyang']['name']='太阳';
         }

         preg_match("/pp01[\s\S]*pp01/",$xwlb,$Xwyl);
         preg_match("/月亮[\s\S]*pp01/",$Xwyl[0],$Xwyl);
         if($Xwyl[0]!=''){
             $yueliang0=mb_substr($Xwyl[0],15,2,'utf-8');
             $XWnumber=$yueliang0=='六合'?30:29;
             $yueliang1=mb_substr($Xwyl[0],$XWnumber,2,'utf-8');
             $xiangwei['yueliang'][0]=$yueliang0;
             $xiangwei['yueliang'][1]=$yueliang1;
             $xiangwei['yueliang']['name']='月亮';
         }

         preg_match("/pp02[\s\S]*pp02/",$xwlb,$Xwyl);
         preg_match("/水星[\s\S]*pp02/",$Xwyl[0],$Xwyl);
         if($Xwyl[0]!=''){
             $shuixing0=mb_substr($Xwyl[0],15,2,'utf-8');
             $XWnumber=$shuixing0=='六合'?30:29;
             $shuixing1=mb_substr($Xwyl[0],$XWnumber,2,'utf-8');
             $xiangwei['shuixing'][0]=$shuixing0;
             $xiangwei['shuixing'][1]=$shuixing1;
             $xiangwei['shuixing']['name']='水星';
         }

         preg_match("/pp03[\s\S]*pp03/",$xwlb,$Xwyl);
         preg_match("/金星[\s\S]*pp03/",$Xwyl[0],$Xwyl);
         if($Xwyl[0]!=''){
             $jinxing0=mb_substr($Xwyl[0],15,2,'utf-8');
             $XWnumber=$jinxing0=='六合'?30:29;
             $jinxing1=mb_substr($Xwyl[0],$XWnumber,2,'utf-8');
             $xiangwei['jinxing'][0]=$jinxing0;
             $xiangwei['jinxing'][1]=$jinxing1;
             $xiangwei['jinxing']['name']='金星';
         }
         preg_match("/pp04[\s\S]*pp04/",$xwlb,$Xwyl);
         preg_match("/火星[\s\S]*pp04/",$Xwyl[0],$Xwyl);
         if($Xwyl[0]!=''){
             $huoxing0=mb_substr($Xwyl[0],15,2,'utf-8');
             $XWnumber=$huoxing0=='六合'?30:29;
             $huoxing1=mb_substr($Xwyl[0],$XWnumber,2,'utf-8');
             $xiangwei['huoxing'][0]=$huoxing0;
             $xiangwei['huoxing'][1]=$huoxing1;
             $xiangwei['huoxing']['name']='火星';
         }
         preg_match("/pp05[\s\S]*pp05/",$xwlb,$Xwyl);
         preg_match("/木星[\s\S]*pp05/",$Xwyl[0],$Xwyl);
         if($Xwyl[0]!=''){
             $muxing0=mb_substr($Xwyl[0],15,2,'utf-8');
             $XWnumber=$muxing0=='六合'?30:29;
             $muxing1=mb_substr($Xwyl[0],$XWnumber,2,'utf-8');
             $xiangwei['muxing'][0]=$muxing0;
             $xiangwei['muxing'][1]=$muxing1;
             $xiangwei['muxing']['name']='木星';
         }
         preg_match("/pp06[\s\S]*pp06/",$xwlb,$Xwyl);
         preg_match("/土星[\s\S]*pp06/",$Xwyl[0],$Xwyl);
         if($Xwyl[0]!=''){
             $tuxing0=mb_substr($Xwyl[0],15,2,'utf-8');
             $XWnumber=$tuxing0=='六合'?30:29;
             $tuxing1=mb_substr($Xwyl[0],$XWnumber,2,'utf-8');
             $xiangwei['tuxing'][0]=$tuxing0;
             $xiangwei['tuxing'][1]=$tuxing1;
             $xiangwei['tuxing']['name']='土星';
         }
         preg_match("/pp07[\s\S]*pp07/",$xwlb,$Xwyl);
         preg_match("/天王[\s\S]*pp07/",$Xwyl[0],$Xwyl);
         if($Xwyl[0]!=''){
             $tianwaing0=mb_substr($Xwyl[0],15,2,'utf-8');
             $XWnumber=$tianwaing0=='六合'?30:29;
             $tianwaing1=mb_substr($Xwyl[0],$XWnumber,2,'utf-8');
             $xiangwei['tianwaing'][0]=$tianwaing0;
             $xiangwei['tianwaing'][1]=$tianwaing1;
             $xiangwei['tianwaing']['name']='天王';
         }
         preg_match("/pp08[\s\S]*pp08/",$xwlb,$Xwyl);
         preg_match("/海王[\s\S]*pp08/",$Xwyl[0],$Xwyl);
         if($Xwyl[0]!=''){
             $haiwang0=mb_substr($Xwyl[0],15,2,'utf-8');
             $XWnumber=$haiwang0=='六合'?30:29;
             $haiwang1=mb_substr($Xwyl[0],$XWnumber,2,'utf-8');
             $xiangwei['haiwang'][0]=$haiwang0;
             $xiangwei['haiwang'][1]=$haiwang1;
             $xiangwei['haiwang']['name']='海王';
         }
         preg_match("/pp09[\s\S]*pp09/",$xwlb,$Xwyl);
         preg_match("/冥王[\s\S]*pp09/",$Xwyl[0],$Xwyl);
         if($Xwyl[0]!=''){
             $mingwang0=mb_substr($Xwyl[0],15,2,'utf-8');
             $XWnumber=$mingwang0=='六合'?30:29;
             $mingwang1=mb_substr($Xwyl[0],$XWnumber,2,'utf-8');
             $xiangwei['mingwang'][0]=$mingwang0;
             $xiangwei['mingwang'][1]=$mingwang1;
             $xiangwei['mingwang']['name']='冥王';
         }

         foreach($xiangwei as $key=>$value){
             $xiangwei[$key][0]=str_replace('<','',$value[0]);
         }
         //dump($xiangwei);
         $GLOBALS['xiangwei']=$xiangwei;
     }
    public function starsGong($stars,$variousGong){
        $statsData=array();
        //dump($variousGong);
        foreach($stars as $key=>$value){
            $gongData=mb_substr($value[1],0,1,'utf-8');
            if($key=='taiyang'){$name='太阳';
            }else if($key=='yueliang'){$name='月亮';
            }else if($key=='shuixing'){$name='水星';
            }else if($key=='jinxing'){$name='金星';
            }else if($key=='huoxing'){$name='火星';
            }else if($key=='muxing'){$name='木星';
            }else if($key=='tuxing'){$name='土星';
            }else if($key=='tianwang'){$name='天王';
            }else if($key=='haiwang'){$name='海王';
            }else if($key=='mingwang'){$name='冥王';
            }
            if($gongData==4){//家庭
              $starsJT=M()->query("select gong{$gongData},gong{$gongData}_2 from tb_zhanxing_starsgong where name='{$name}'");
                $statsData[0]['jiating']=$starsJT[0];
                $statsData[0]['jiating'][0]=$name;
                $statsData[0]['jiating'][1]=mb_substr($value[0],0,2,'utf-8');
            }
            if($gongData==6){//职业
                $starsJT=M()->query("select gong{$gongData},gong{$gongData}_2 from tb_zhanxing_starsgong where name='{$name}'");
                $statsData[0]['zhiye']=$starsJT[0];
                $statsData[0]['zhiye'][0]=$name;
                $statsData[0]['zhiye'][1]=mb_substr($value[0],0,2,'utf-8');
            }
            if($gongData==2){//财富
                $starsJT=M()->query("select gong{$gongData},gong{$gongData}_2 from tb_zhanxing_starsgong where name='{$name}'");
                $statsData[0]['caifu']=$starsJT[0];
                $statsData[0]['caifu'][0]=$name;
                $statsData[0]['caifu'][1]=mb_substr($value[0],0,2,'utf-8');
            }
            if($gongData==7){//婚姻
                $starsJT=M()->query("select gong{$gongData},gong{$gongData}_2 from tb_zhanxing_starsgong where name='{$name}'");
                $statsData[0]['hunyin']=$starsJT[0];
                $statsData[0]['hunyin'][0]=$name;
                $statsData[0]['hunyin'][1]=mb_substr($value[0],0,2,'utf-8');
            }
            if($gongData==8){//疾厄
                $starsJT=M()->query("select gong{$gongData},gong{$gongData}_2 from tb_zhanxing_starsgong where name='{$name}'");
                $statsData[0]['jier']=$starsJT[0];
                $statsData[0]['jier'][0]=$name;
                $statsData[0]['jier'][1]=mb_substr($value[0],0,2,'utf-8');
            }
        }
        foreach($variousGong as $key=>$value){
            $name=mb_substr($value[0],0,2,'utf-8');
            if($key==4){//家庭
                $starsJT=M()->query("select gong{$key},gong{$key}_2 from tb_zhanxing_starsgong where name='{$name}'");
                $starsJT[0]['gong4']=str_replace('他们','你',$starsJT[0]['gong4']);
                $starsJT[0]['gong4_2']=str_replace('他们','你',$starsJT[0]['gong4_2']);
                $statsData[1]['jiating']=$starsJT[0];
                $statsData[1]['jiating'][0]=$name;
                $statsData[1]['jiating'][1]=$key;
            }
            if($key==6){//职业
                $starsJT=M()->query("select gong{$key},gong{$key}_2 from tb_zhanxing_starsgong where name='{$name}'");
                $starsJT[0]['gong6']=str_replace('他们','你',$starsJT[0]['gong6']);
                $starsJT[0]['gong6_2']=str_replace('他们','你',$starsJT[0]['gong6_2']);
                $statsData[1]['zhiye']=$starsJT[0];
                $statsData[1]['zhiye'][0]=$name;
                $statsData[1]['zhiye'][1]=$key;
            }
            if($key==2){//财富
                $starsJT=M()->query("select gong{$key},gong{$key}_2 from tb_zhanxing_starsgong where name='{$name}'");
                $starsJT[0]['gong2']=str_replace('他们','你',$starsJT[0]['gong2']);
                $starsJT[0]['gong2_2']=str_replace('他们','你',$starsJT[0]['gong2_2']);
                $statsData[1]['caifu']=$starsJT[0];
                $statsData[1]['caifu'][0]=$name;
                $statsData[1]['caifu'][1]=$key;
            }
            if($key==7){//婚姻
                $starsJT=M()->query("select gong{$key},gong{$key}_2 from tb_zhanxing_starsgong where name='{$name}'");
                $starsJT[0]['gong7']=str_replace('他们','你',$starsJT[0]['gong7']);
                $starsJT[0]['gong7_2']=str_replace('他们','你',$starsJT[0]['gong7_2']);
                $statsData[1]['hunyin']=$starsJT[0];
                $statsData[1]['hunyin'][0]=$name;
                $statsData[1]['hunyin'][1]=$key;
            }
            if($key==8){//疾厄
                $starsJT=M()->query("select gong{$key},gong{$key}_2 from tb_zhanxing_starsgong where name='{$name}'");
                $starsJT[0]['gong8']=str_replace('他们','你',$starsJT[0]['gong8']);
                $starsJT[0]['gong8_2']=str_replace('他们','你',$starsJT[0]['gong8_2']);
                $statsData[1]['jier']=$starsJT[0];
                $statsData[1]['jier'][0]=$name;
                $statsData[1]['jier'][1]=$key;
            }
        }

         return $statsData;

    }

    public function constellation($month,$day){//获取星座
        // 检查参数有效性
        if ($month < 1 || $month > 12 || $day < 1 || $day > 31) return false;

        // 星座名称以及开始日期
        $constellations = array(
            array( "20" => "水瓶座"),
            array( "19" => "双鱼座"),
            array( "21" => "白羊座"),
            array( "20" => "金牛座"),
            array( "21" => "双子座"),
            array( "22" => "巨蟹座"),
            array( "23" => "狮子座"),
            array( "23" => "处女座"),
            array( "23" => "天秤座"),
            array( "24" => "天蝎座"),
            array( "22" => "射手座"),
            array( "22" => "摩羯座")
        );
        list($constellation_start, $constellation_name) = each($constellations[(int)$month-1]);
        if ($day < $constellation_start) list($constellation_start, $constellation_name) = each($constellations[($month -2 < 0) ? $month = 11: $month -= 2]);
        return $constellation_name;
    }

}
