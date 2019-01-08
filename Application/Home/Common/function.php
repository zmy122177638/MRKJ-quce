<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25
 * Time: 14:04
 */
function zwmp($ymd,$hour,$sex,$judge){
    $yymd=$ymd;
    $year=mb_substr($ymd,0,4);$yyear=$year;
    $x=mb_substr($year,0,2);
    $y=mb_substr($year,2,2);
    $m=mb_substr($ymd,5,2);$ym=$m; //月
    $d=mb_substr($ymd,8,2);$yd=$d;//日
    $t=$hour; //时
    $ymd=$year."年".$m."月".$d."日".$t."时";

    $date1=date_create($year."-01-0");
    $date2=date_create($yymd);
    $diff=date_diff($date1,$date2);
    $lsjiazi=array('0','甲子','乙丑','丙寅','丁卯','戊辰','己巳','庚午','辛未','壬申','癸酉','甲戌','乙亥','丙子','丁丑','戊寅','己卯','庚辰','辛巳','壬午','癸未'
    ,'甲申','乙酉','丙戌','丁亥','戊子','己丑','庚寅','辛卯','壬辰','癸巳','甲午','乙未','丙申','丁酉','戊戌','己亥','庚子','辛丑','壬寅','癸卯'
    ,'甲辰','乙巳','丙午','丁未','戊申','己酉','庚戌','辛亥','壬子','癸丑','甲寅','乙卯','丙辰','丁巳','戊午','己未','庚申','辛酉','壬戌','癸亥');
    $tiangan=array('0','甲','乙','丙','丁','戊','己','庚','辛','壬','癸');//天干
    $dizhi=array('0','子','丑','寅','卯','辰','巳','午','未','申','酉','戌','亥');//地支
    $shishendata=array('0','jia','yi','bing','ding','wu','ji','geng','xin','ren','gui');
    $shishendatadz=array('0','zi','chou','yin','mao','chen','si','wu','wei','shen','you','xu','hai');

    if($year<=2000){
        if($y==00){$y=100;}
        $datarzg=5*($y-1)+floor(($y-1)/4)+15+$diff->days;
        $data=$datarzg%60;
        if($data==0){$data=60;}
        $rizhudata=$lsjiazi[$data];
    }else{
        $datarzg=5*($y-1)+floor(($y-1)/4)+$diff->days;
        $data=$datarzg%60;
        if($data==0){$data=60;}
        $rizhudata=$lsjiazi[$data];
    }


    $datayl=yinli($year,$m,$d);//阴历转换
    $year=$datayl[0];
    $x=mb_substr($datayl[0],0,2);
    $y=mb_substr($datayl[0],2,2);
    $m=$datayl[4]; //月
    $d=$datayl[5];//日

    $jieqi=cookie('jieqi');
    $jieqi2=cookie('jieqi2');
    if($datayl[1]=='正月'&&($jieqi=='大寒' or $jieqi2=='立春')){
        $year-=1;
    }
    if($jieqi=='立春'||$jieqi=='雨水'){$m=1;
    }else if($jieqi=='惊蛰'||$jieqi=='春分'){$m=2;
    }else if($jieqi=='清明'||$jieqi=='谷雨'){$m=3;
    }else if($jieqi=='立夏'||$jieqi=='小满'){$m=4;
    }else if($jieqi=='芒种'||$jieqi=='夏至'){$m=5;
    }else if($jieqi=='小暑'||$jieqi=='大暑'){$m=6;
    }else if($jieqi=='立秋'||$jieqi=='处暑'){$m=7;
    }else if($jieqi=='白露'||$jieqi=='秋分'){$m=8;
    }else if($jieqi=='寒露'||$jieqi=='霜降'){$m=9;
    }else if($jieqi=='立冬'||$jieqi=='小雪'){$m=10;
    }else if($jieqi=='大雪'||$jieqi=='冬至'){$m=11;
    }else if($jieqi=='小寒'||$jieqi=='大寒'){$m=12;
    }

    if($jieqi==$jieqi2){
        $m-=1;
        if($m==0)$m=12;
    }


    //        获取年天干
    $ng=($year-3)%10;
    if($datayl[1]=='腊月'&&$jieqi=='立春'){$ng+=1;}
    if($ng==0){$ng=10;}
    if($ng>10){$ng=1;}
//        获取年地支
    $nd=($year-3)%12;
    if($datayl[1]=='腊月'&&$jieqi=='立春'){$nd+=1;}
    if($nd==0){$nd=12;}
    if($nd>12){$nd=1;}




//获取月的干支
    if($ng==1||$ng==6){
        $arryuezhu=array('','丙寅','丁卯','戊辰','己巳','庚午','辛未','壬申','癸酉','甲戌','乙亥','丙子','丁丑');
    }else if($ng==2||$ng==7){
        $arryuezhu=array('','戊寅','己卯','庚辰','辛巳','壬午','癸未','甲申','乙酉','丙戌','丁亥','戊子','己丑');
    } else if($ng==3||$ng==8){
        $arryuezhu=array('','庚寅','辛卯','壬辰','癸巳','甲午','乙未','丙申','丁酉','戊戌','己亥','庚子','辛丑');
    }else if($ng==4||$ng==9){
        $arryuezhu=array('','壬寅','癸卯','甲辰','乙巳','丙午','丁未','戊申','己酉','庚戌','辛亥','壬子','癸丑');
    }else{
        $arryuezhu=array('','甲寅','乙卯','丙辰','丁巳','戊午','己未','庚申','辛酉','壬戌','癸亥','甲子','乙丑');
    }


    $yuezhudata=$arryuezhu[$m];
    $yg=array_search(mb_substr($yuezhudata,0,1,'utf-8'),$tiangan);
    $yd=array_search(mb_substr($yuezhudata,1,1,'utf-8'),$dizhi);

//        获取日地支数字
//    if($m%2==0){$i=6;}else{$i=0;}
//    $z=$gd+4*$x+10+$i;$z%=12;$z+=1;
//    if($z==0){$z=12;
//    }else if($z>12){$z=1;}
    $g=array_search(mb_substr($rizhudata,0,1,'utf-8'),$tiangan);
    $z=array_search(mb_substr($rizhudata,1,1,'utf-8'),$dizhi);

//获取时干支
    $sg=$hour/2;
    $sd=$sg+1;//时地
    if($g==1||$g==6){
        $arrshizhu=array('甲','乙','丙','丁','戊','己','庚','辛','壬','癸','甲','乙');
    }else if($g==2||$g==7){
        $arrshizhu=array('丙','丁','戊','己','庚','辛','壬','癸','甲','乙','丙','丁');
    }else if($g==3||$g==8){
        $arrshizhu=array('戊','己','庚','辛','壬','癸','甲','乙','丙','丁','戊','己');
    }else if($g==4||$g==9){
        $arrshizhu=array('庚','辛','壬','癸','甲','乙','丙','丁','戊','己','庚','辛');
    }else{
        $arrshizhu=array('壬','癸','甲','乙','丙','丁','戊','己','庚','辛','壬','癸');
    }
    $sg=array_search($arrshizhu[$sg],$tiangan);


    if($datayl[4]>cookie('runyue')&&cookie('runyue')!=0){//判断闰月
        $m=$datayl[4]-1; //月
    }else{
        $m=$datayl[4]; //月
    }

    if($tiangan[$ng]=='甲'||$tiangan[$ng]=='己'){
        $tiang=array('丙','丁','戊','己','庚','辛','壬','癸','甲','乙','丙','丁');
    }else if($tiangan[$ng]=='乙'||$tiangan[$ng]=='庚'){
        $tiang=array('戌','己','庚','辛','壬','癸','甲','乙','丙','丁','戊','己');
    }else if($tiangan[$ng]=='丙'||$tiangan[$ng]=='辛'){
        $tiang=array('庚','辛','壬','癸','甲','乙','丙','丁','戊','己','庚','辛');
    }else if($tiangan[$ng]=='丁'||$tiangan[$ng]=='壬'){
        $tiang=array('壬','癸','甲','乙','丙','丁','戊','己','庚','辛','壬','癸');
    }else{
        $tiang=array('甲','乙','丙','丁','戊','己','庚','辛','壬','癸','甲','乙');
    }

//        获取阴阳男女
    if($ng==1||$ng==3||$ng==5||$ng==7||$ng==9){
        $yysex='阳'.$sex;$yyng='阳';
    }else{
        $yysex='阴'.$sex;$yyng='阴';
    }
    if($yg==1||$yg==3||$yg==5||$yg==7||$yg==9){$yyyg='阳';}else{$yyyg='阴';}
    if($g==1||$g==3||$g==5||$g==7||$g==9){$yyg='阳';}else{$yyg='阴';}
    if($sg==1||$sg==3||$sg==5||$sg==7||$sg==9){$yysg='阳';}else{$yysg='阴';}
    $arryysz=array($yyng,$yyyg,$yyg,$yysg);
    $GLOBALS['arryysz']=$arryysz;//四柱阴阳

    //        获取生肖
    $arrsx=array('0','鼠','牛','虎','兔','龙','蛇','马','羊','猴','鸡','狗','猪');
    $datasxwz=($year+9)%12;
    if($datayl[1]=='腊月'&&$jieqi=='立春'){$datasxwz+=1;}
    if($datasxwz==0){$datasxwz=12;}
    if($datasxwz>12){$datasxwz=1;}
    $shengxiao=$arrsx[$datasxwz];
    $GLOBALS['shengxiao']=$shengxiao;
//获取命宫身宫
    $arrsm=M()->query("select {$shishendatadz[$sd]} from tb_zw_msgong where id={$m}");
    $smgong=$arrsm[0][$shishendatadz[$sd]];
    $GLOBALS['smgong']=$smgong;
//        获取十二宫
    $shiergong=array('福德','田宅','事业','部属','迁移','疾厄','财帛','子女','夫妻','兄弟','命宫','父母');
    $mgwz=array_search(mb_substr($smgong,0,1,'utf-8'),$dizhi);
    $data=13-$mgwz;
    $arr=array_slice($shiergong,$data);
    $shierg=array_merge($arr,$shiergong);

//      获取五行局
    $dizhix=array('寅','卯','辰','巳','午','未','申','酉','戌','亥','子','丑');
    $datamgwz=array_search('命宫',$shierg);
    $datafqwz=array_search('夫妻',$shierg);
    $tgdz=$tiang[$datamgwz].$dizhix[$datamgwz];

    if($tgdz=='丙子'||$tgdz=='丁丑'||$tgdz=='甲寅'||$tgdz=='乙卯'||$tgdz=='壬辰'||$tgdz=='癸巳'||$tgdz=='丙午'||$tgdz=='丁未'||$tgdz=='甲申'||$tgdz=='乙酉'||$tgdz=='壬戌'||$tgdz=='癸亥'){
        $wxj='水二局';
    }else if($tgdz=='壬子'||$tgdz=='癸丑'||$tgdz=='庚寅'||$tgdz=='辛卯'||$tgdz=='戊辰'||$tgdz=='己巳'||$tgdz=='壬午'||$tgdz=='癸未'||$tgdz=='庚申'||$tgdz=='辛酉'||$tgdz=='戊戌'||$tgdz=='己亥'){
        $wxj='木三局';
    }else if($tgdz=='甲子'||$tgdz=='乙丑'||$tgdz=='壬寅'||$tgdz=='卯金'||$tgdz=='庚辰'||$tgdz=='辛巳'||$tgdz=='甲午'||$tgdz=='乙未'||$tgdz=='壬申'||$tgdz=='癸酉'||$tgdz=='庚戌'||$tgdz=='辛亥'){
        $wxj='金四局';
    }else if($tgdz=='庚子'||$tgdz=='辛丑'||$tgdz=='戊寅'||$tgdz=='己卯'||$tgdz=='丙辰'||$tgdz=='丁巳'||$tgdz=='庚午'||$tgdz=='辛未'||$tgdz=='戊申'||$tgdz=='己酉'||$tgdz=='丙戌'||$tgdz=='丁亥'){
        $wxj='土五局';
    }else{
        $wxj='火六局';
    }

//   获取八字
    $bznianzhu=$tiangan[$ng].$dizhi[$nd];
    $bzyuezhu=$tiangan[$yg].$dizhi[$yd];
    $bzrizhu=$tiangan[$g].$dizhi[$z];
    $shizhudz=array('子','丑','丑','寅','寅','卯','卯','辰','辰','巳','巳','午','午','未','未','申','申','酉','酉','戌','戌','亥','亥','子');
    $bzshizhu=$tiangan[$sg].$shizhudz[$hour];
    $GLOBALS['bznianzhu']=$bznianzhu;
    $GLOBALS['bzyuezhu']=$bzyuezhu;
    $GLOBALS['bzrizhu']=$bzrizhu;
    $GLOBALS['bzshizhu']=$bzshizhu;
    $sizhu=array();
    array_push($sizhu,$bznianzhu,$bzyuezhu,$bzrizhu,$bzshizhu);
    $GLOBALS['sizhu']=$sizhu;
    if($judge=='sizhu'){return ;}//判断结束位置

//  获取四柱纳音
    $nianzhuny=M()->query("select ny from tb_wedlock where name='{$bznianzhu}'");
    $yuezhuny=M()->query("select ny from tb_wedlock where name='{$bzyuezhu}'");
    $rizhuny=M()->query("select ny from tb_wedlock where name='{$bzrizhu}'");
    $shizhuny=M()->query("select ny from tb_wedlock where name='{$bzshizhu}'");
    if(empty($shizhuny)){
        $shizhuny=M()->query("select ny from tb_wedlock where id=".$t*2);
        if(empty($shizhuny)){
            $shizhuny=M()->query("select ny from tb_wedlock where id=1");
        }
    }
    $sizhuny=array();
    array_push($sizhuny,implode($nianzhuny[0]));array_push($sizhuny,implode($yuezhuny[0]));
    array_push($sizhuny,implode($rizhuny[0]));array_push($sizhuny,implode($shizhuny[0]));
    $GLOBALS['sizhuny']=$sizhuny;

//  获取十神
    $shishendata=array('0','jia','yi','bing','ding','wu','ji','geng','xin','ren','gui');
    $nianzhuss=M()->query("select {$shishendata[$ng]} from tb_shishen where id={$g}");
    $yuezhuss=M()->query("select {$shishendata[$yg]} from tb_shishen where id={$g}");
    $shizhuss=M()->query("select {$shishendata[$sg]} from tb_shishen where id={$g}");
    $GLOBALS['nianzhuss']=$nianzhuss[0];
    $GLOBALS['yuezhuss']=$yuezhuss[0];
    $GLOBALS['shizhuss']=$shizhuss[0];


//  获取支神
    $shishendatadz=array('0','zi','chou','yin','mao','chen','si','wu','wei','shen','you','xu','hai');
    $m=($m)?$m:12;
    $nianzhuzs=M()->query("select {$shishendatadz[$nd]} from tb_dizhi_shishen where id={$g}");
    $yuezhuzs=M()->query("select {$shishendatadz[$yd]} from tb_dizhi_shishen where id={$g}");
    $rizhuzs=M()->query("select {$shishendatadz[$z]} from tb_dizhi_shishen where id={$g}");
    $shizhuzs=M()->query("select {$shishendatadz[$sd]} from tb_dizhi_shishen where id={$g}");
    if(empty($shizhuzs)){$shizhuzs=M()->query("select {$shishendata[$sg]} from tb_dizhi_shishen where id=1");}
    $zhishen=array();
    array_push($zhishen,implode($nianzhuzs[0]));array_push($zhishen,implode($yuezhuzs[0]));
    array_push($zhishen,implode($rizhuzs[0]));array_push($zhishen,implode($shizhuzs[0]));
    $GLOBALS['zhishen']=$zhishen;

//  获取藏干
    $canggan=array();
    $cangganarr=M()->query("select {$shishendatadz[$nd]},{$shishendatadz[$yd]},{$shishendatadz[$z]},{$shishendatadz[$sd]} from tb_dizhi_shishen where id=11");
    array_push($canggan,$cangganarr[0][$shishendatadz[$nd]]);array_push($canggan,$cangganarr[0][$shishendatadz[$yd]]);
    array_push($canggan,$cangganarr[0][$shishendatadz[$z]]);array_push($canggan,$cangganarr[0][$shishendatadz[$sd]]);
    $GLOBALS['canggan']=$canggan;

    //  获取八字地势数据
    $bzdishi=array();
    $niannum=mb_substr($sizhu[0],1,1,'utf-8');
    $yuenum=mb_substr($sizhu[1],1,1,'utf-8');
    $rinum=mb_substr($sizhu[2],1,1,'utf-8');
    $shinum=mb_substr($sizhu[3],1,1,'utf-8');
    $arrnianws=M()->query("select name from tb_bz_wangshuai where $shishendata[$g]='{$niannum}'");
    $arryuews=M()->query("select name from tb_bz_wangshuai where $shishendata[$g]='{$yuenum}'");
    $arrriws=M()->query("select name from tb_bz_wangshuai where $shishendata[$g]='{$rinum}'");
    $arrshiws=M()->query("select name from tb_bz_wangshuai where $shishendata[$g]='{$shinum}'");
    array_push($bzdishi,$arrnianws[0]['name']);array_push($bzdishi,$arryuews[0]['name']);
    array_push($bzdishi,$arrriws[0]['name']);array_push($bzdishi,$arrshiws[0]['name']);

    $GLOBALS['bzdishi']=$bzdishi;

//  获取旺相休囚死
    $wxsqs=array('0','木火水金土','木火水金土','土金火木水','火土木水金','火土木水金','土金木火水','金水土火木','金水土火木','土金火木水','水木金土火','水木金土火','土金火木水');
    $GLOBALS['wxsqs']=$wxsqs[intval($m)];
//  获取喜用神
    if($m>=1&&$m<=2){$xiys='土';}else if($m>=3&&$m<=4){$xiys='木';}else if($m>=5&&$m<=6){$xiys='金';
    }else if($m>=7&&$m<=9){$xiys='水';}else{$xiys='火';}
    $GLOBALS['xiys']=$xiys;

//  获取胎元
    $taiyuanx=$yg+1;
    if($taiyuanx>10){
        $taiyuanx-=10;
    }
    $taiyuany=$yd+3;
    if($taiyuany>12){
        $taiyuany-=12;
    }
    $taiyuan=$tiangan[$taiyuanx].$dizhi[$taiyuany];
    $GLOBALS['taiyuan']=$taiyuan;

//  获取日空
//    $rikongwzx=$z+10;
//    $rikongwzy=$rikongwzx+1;
//    if($rikongwzx>12){$rikongwzx-=12;}
//    if($rikongwzy>12){$rikongwzy-=12;}
    $rikongwzx=$z-$g;
    if($rikongwzx<1){$rikongwzx+=12;}
    $rikong=$dizhi[$rikongwzx-1].$dizhi[$rikongwzx];
    $GLOBALS['rikong']=$rikong;

    if($judge=='NOdayun'){return ;}//判断结束位置

//获取大运日期
    $arrjeiqi=array("小寒","大寒","立春","雨水","惊蛰","春分","清明","谷雨",
        "立夏","小满","芒种","夏至","小暑","大暑","立秋","处暑",
        "白露","秋分","寒露","霜降","立冬","小雪","大雪","冬至");

    $jieqiwz=array_search(cookie('jieqi'),$arrjeiqi);
    if($yysex=='阳男'||$yysex=='阴女'){
        if($jieqiwz%2==0){$jieqiwz+=2;}else{$jieqiwz+=1;}
        $jieqiwz=($jieqiwz>23)?0:$jieqiwz;
        for($i=0;$i<=40;$i++){
            $strtotime=date("Y-m-d", strtotime("$i day", strtotime($yymd)));
            $jieqiname=jieqi($strtotime);
            if($jieqiname==$arrjeiqi[$jieqiwz]){
                break;
            }
        }
        $dyday=round((strtotime($strtotime)-strtotime($yymd))/3600/24);
        $jieiapi=jieqiapi(mb_substr($strtotime,0,4),$arrjeiqi[$jieqiwz]);
        cookie('jieiqname',$arrjeiqi[$jieqiwz].':'.substr($strtotime,0,4).'年'.substr($strtotime,5,2).'月'.substr($strtotime,8,2).'日 '.mb_substr($jieiapi,0,2).'时');
    }else{
        if($jieqiwz%2){$jieqiwz-=2;}else{$jieqiwz-=1;}
        $jieqiwz=($jieqiwz<0)?23:$jieqiwz;
        for($i=0;$i<=40;$i++){
            $strtotime=date("Y-m-d", strtotime("-$i day", strtotime($yymd)));
            $jieqiname=jieqi($strtotime);
            if($jieqiname==$arrjeiqi[$jieqiwz]){
                $strtotime=date("Y-m-d", strtotime("1 day", strtotime($strtotime)));
                break;
            }
        }
        $jieiapi=jieqiapi(mb_substr($strtotime,0,4),$arrjeiqi[0]);
        if($yymd==$strtotime&&substr($jieiapi,0,2)>$hour){
            $jieqiwz-=2;if($jieqiwz<0){$jieqiwz=22;}
            for($i=0;$i<=40;$i++){
                $strtotime=date("Y-m-d", strtotime("-$i day", strtotime($yymd)));$jieqiname=jieqi($strtotime);
                if($jieqiname==$arrjeiqi[$jieqiwz]){$strtotime=date("Y-m-d", strtotime("1 day", strtotime($strtotime)));break;}}
        }
        $dyday=round((strtotime($yymd)-strtotime($strtotime))/3600/24);
        if($jieqiwz==23){
            $jieiapi=jieqiapi(mb_substr($strtotime,0,4),$arrjeiqi[0]);
            cookie('jieqiname',$arrjeiqi[0].':'.substr($strtotime,0,4).'年'.substr($strtotime,5,2).'月'.substr($strtotime,8,2).'日 '.mb_substr($jieiapi,0,2).'时');
        }else{
            $jieiapi=jieqiapi(mb_substr($strtotime,0,4),$arrjeiqi[$jieqiwz+1]);
            cookie('jieqiname',$arrjeiqi[$jieqiwz+1].':'.substr($strtotime,0,4).'年'.substr($strtotime,5,2).'月'.substr($strtotime,8,2).'日 '.mb_substr($jieiapi,0,2).'时');
        }
    }

    $jieqinum=mb_substr($jieiapi,0,2);
    $dayun=floor($dyday/3);
    $dayunx=floor($dyday/3);
    if($dyday%3){$dayuny=$dyday%3;}else{$dayuny=0;}
    if($yysex=='阳男'||$yysex=='阴女'){
        $numx=ceil(($hour-$jieqinum)*5/30);
        $dayuny=$dayuny*4-$numx;
    }else{
        $numx=ceil(($jieqinum-$hour)*5/30);
        $dayuny=$dayuny*4-$numx;
    }
    if($dayuny<0&&$dayun!=0){$dayuny+=12;$dayun-=1;$dayunx-=1;}
    if($dayuny>=5){$dayun+=1;}
    $GLOBALS['dayun']=$dayun;
    $GLOBALS['dayunx']=$dayunx;
    $GLOBALS['dayuny']=$dayuny;

    $dayungz=array();
    $dayungznum=array_search($sizhu[1],$lsjiazi);
    for($i=1;$i<=8;$i++){
        if($yysex=='阳男'||$yysex=='阴女'){
            $datanum=$dayungznum+$i;
            if($datanum>60){$datanum-=60;}
            $dayunbz=$lsjiazi[$datanum];
            array_push($dayungz,$dayunbz);
        }else{
            $datanum=$dayungznum-$i;
            if($datanum<1){$datanum+=60;}
            $dayunbz=$lsjiazi[$datanum];
            array_push($dayungz,$dayunbz);
        }
    }
    $GLOBALS['dayungz']=$dayungz;
//大运十神
    $dayunss=array();
    for($i=0;$i<8;$i++){
        $dysswz=array_search(mb_substr($dayungz[$i],0,1,'utf-8'),$tiangan);
        $nianzhuss=M()->query("select {$shishendata[$dysswz]} from tb_shishen where id={$g}");
        array_push($dayunss,$nianzhuss[0][$shishendata[$dysswz]]);
    }
    $GLOBALS['dayunss']=$dayunss;


    if($judge!='zw'){return ;}//判断结束位置

//        获取主星
    if($wxj=='水二局'){
        $wxjtj='water2';
    }else if($wxj=='木三局'){
        $wxjtj='wood3';
    }else if($wxj=='金四局'){
        $wxjtj='gold4';
    }else if($wxj=='土五局'){
        $wxjtj='soil5';
    }else{
        $wxjtj='fire6';
    }
    $wxjtjx=M()->query("select * from tb_wuxingju where id=".$d);
    $datadizhi=array_search($wxjtjx[0][$wxjtj],$dizhix);

    $datazxxb=12-$datadizhi;
    $zhuxing=array('紫微','','','','廉贞','','','天同','武曲','太阳','','天机');
    $arr=array_slice($zhuxing,$datazxxb);
    $arrzx=array_merge($arr,$zhuxing);

    $datazweiwz=array_search('紫微',$arrzx);
    $ziweimwsx=M()->query("select zwei from tb_zhuxingmwsx where id=".$datazweiwz);
    $arrzx[$datazweiwz]='紫微'.$ziweimwsx[0]['zwei'];

    $datalzhenwz=array_search('廉贞',$arrzx);
    $lzhenmwsx=M()->query("select lzhen from tb_zhuxingmwsx where id=".$datalzhenwz);
    $arrzx[$datalzhenwz]='廉贞'.$lzhenmwsx[0]['lzhen'];

    $datattongwz=array_search('天同',$arrzx);
    $ttongmwsx=M()->query("select ttong from tb_zhuxingmwsx where id=".$datattongwz);
    $arrzx[$datattongwz]='天同'.$ttongmwsx[0]['ttong'];

    $datawuquwz=array_search('武曲',$arrzx);
    $wuqumwsx=M()->query("select wuqu from tb_zhuxingmwsx where id=".$datawuquwz);
    $arrzx[$datawuquwz]='武曲'.$wuqumwsx[0]['wuqu'];

    $datatyangwz=array_search('太阳',$arrzx);
    $tyangmwsx=M()->query("select tyang from tb_zhuxingmwsx where id=".$datatyangwz);
    $arrzx[$datatyangwz]='太阳'.$tyangmwsx[0]['tyang'];

    $datatjiwz=array_search('天机',$arrzx);
    $tjimwsx=M()->query("select tji from tb_zhuxingmwsx where id=".$datatjiwz);
    $arrzx[$datatjiwz]='天机'.$tjimwsx[0]['tji'];


//        获取天府星系
    $tianfu=array('天府','太阴','贪狼','巨门','天相','天梁','七杀','','','','破军','');
    $datatf=$datazweiwz;
    if($datatf==1){$tfwz=11;}else if($datatf==2){$tfwz=10;}else if($datatf==3){$tfwz=9;}else if($datatf==4){
        $tfwz=8;
    }else if($datatf==5){$tfwz=7;}else if($datatf==7){$tfwz=5;}else if($datatf==8){$tfwz=4;}else if($datatf==9){
        $tfwz=3;
    }else if($datatf==10){$tfwz=2;}else if($datatf==11){$tfwz=1;}else{
        $tfwz=$datatf;
    }

    $datatfxb=12-$tfwz;
    $arr=array_slice($tianfu,$datatfxb);
    $arrtf=array_merge($arr,$tianfu);

    $datatfuwz=array_search('天府',$arrtf);
    $tfumwsx=M()->query("select tfu from tb_zhuxingmwsx where id=".$datatfuwz);
    $arrtf[$datatfuwz]='天府'.$tfumwsx[0]['tfu'];
    $datatyinwz=array_search('太阴',$arrtf);
    $tyinmwsx=M()->query("select tyin from tb_zhuxingmwsx where id=".$datatyinwz);
    $arrtf[$datatyinwz]='太阴'.$tyinmwsx[0]['tyin'];
    $datatlangwz=array_search('贪狼',$arrtf);
    $tlangmwsx=M()->query("select tlang from tb_zhuxingmwsx where id=".$datatlangwz);
    $arrtf[$datatlangwz]='贪狼'.$tlangmwsx[0]['tlang'];
    $datajmenwz=array_search('巨门',$arrtf);
    $jmenmwsx=M()->query("select jmen from tb_zhuxingmwsx where id=".$datajmenwz);
    $arrtf[$datajmenwz]='巨门'.$jmenmwsx[0]['jmen'];
    $datatxiangwz=array_search('天相',$arrtf);
    $txiangmwsx=M()->query("select txiang from tb_zhuxingmwsx where id=".$datatxiangwz);
    $arrtf[$datatxiangwz]='天相'.$txiangmwsx[0]['txiang'];
    $datatliangwz=array_search('天梁',$arrtf);
    $tliangmwsx=M()->query("select tliang from tb_zhuxingmwsx where id=".$datatliangwz);
    $arrtf[$datatliangwz]='天梁'.$tliangmwsx[0]['tliang'];
    $dataqshawz=array_search('七杀',$arrtf);
    $qshamwsx=M()->query("select qsha from tb_zhuxingmwsx where id=".$dataqshawz);
    $arrtf[$dataqshawz]='七杀'.$qshamwsx[0]['qsha'];
    $datapjunwz=array_search('破军',$arrtf);
    $pjunmwsx=M()->query("select pjun from tb_zhuxingmwsx where id=".$datapjunwz);
    $arrtf[$datapjunwz]='破军'.$pjunmwsx[0]['pjun'];

//创建吉星、凶星空数组
    $arrjix=array();$arrxiongx=array();
//        获取生月诸星
    $datasyzx=M()->query("select * from tb_shengyuezx where id=".$m);
    $datazfu=array_search($datasyzx[0]['zfu'],$dizhix);
    $syzx=array();
    $syzx[$datazfu]='左辅 ';$arrjix[$datazfu]='左辅,';
    $dataybi=array_search($datasyzx[0]['ybi'],$dizhix);
    $syzx[$dataybi]=$syzx[$dataybi].'右弼 ';$arrjix[$dataybi]=$arrjix[$dataybi].'右弼,';
    $dataysha=array_search($datasyzx[0]['ysha'],$dizhix);
    $syzx[$dataysha]=$syzx[$dataysha].'阴煞 ';
    $datatxing=array_search($datasyzx[0]['txing'],$dizhix);
    $syzx[$datatxing]=$syzx[$datatxing].'天刑 ';
    $datatyao=array_search($datasyzx[0]['tyao'],$dizhix);
    $syzx[$datatyao]=$syzx[$datatyao].'天姚 ';
    $datatyue=array_search($datasyzx[0]['tyue'],$dizhix);
    $syzx[$datatyue]=$syzx[$datatyue].'天月 ';
    $datatwu=array_search($datasyzx[0]['twu'],$dizhix);
    $syzx[$datatwu]=$syzx[$datatwu].'天巫 ';
    $dataxshen=array_search($datasyzx[0]['xshen'],$dizhix);
    $syzx[$dataxshen]=$syzx[$dataxshen].'解神 ';
//    $datatma=array_search($datasyzx[0]['tma'],$dizhix);
//    $syzx[$datatma]=$syzx[$datatma].'天马 ';

//        获取生年支系诸星
    $datasnzx=M()->query("select * from tb_shengnianzx where id=".$nd);
    $datatxi=array_search($datasnzx[0]['txi'],$dizhix);
    $snzx=array();
    $snzx[$datatxi]='天喜 ';
    $datatxv=array_search($datasnzx[0]['txv'],$dizhix);
    $snzx[$datatxv]=$snzx[$datatxv].'天虚 ';
    $datatkong=array_search($datasnzx[0]['tkong'],$dizhix);
    $snzx[$datatkong]=$snzx[$datatkong].'天空 ';
    $datatku=array_search($datasnzx[0]['tku'],$dizhix);
    $snzx[$datatku]=$snzx[$datatku].'天哭 ';
    $datatde=array_search($datasnzx[0]['tde'],$dizhix);
    $snzx[$datatde]=$snzx[$datatde].'天德 ';
    $datahluan=array_search($datasnzx[0]['hluan'],$dizhix);
    $snzx[ $datahluan]=$snzx[ $datahluan].'红鸾 ';
    $datalchi=array_search($datasnzx[0]['lchi'],$dizhix);
    $snzx[$datalchi]=$snzx[$datalchi].'龙池 ';
    $datafge=array_search($datasnzx[0]['fge'],$dizhix);
    $snzx[$datafge]=$snzx[$datafge].'凤阁 ';
    $datagchen=array_search($datasnzx[0]['gchen'],$dizhix);
    $snzx[$datagchen]=$snzx[$datagchen].'孤辰 ';
    $datagsu=array_search($datasnzx[0]['gsu'],$dizhix);
    $snzx[$datagsu]=$snzx[$datagsu].'寡宿 ';
    $datapsui=array_search($datasnzx[0]['psui'],$dizhix);
    $snzx[$datapsui]=$snzx[$datapsui].'破碎 ';
//    $datadhao=array_search($datasnzx[0]['dhao'],$dizhix);
//    $snzx[$datadhao]=$snzx[$datadhao].'大耗 ';
    $datahgai=array_search($datasnzx[0]['hgai'],$dizhix);
    $snzx[$datahgai]=$snzx[$datahgai].'华盖 ';
    $dataxchi=array_search($datasnzx[0]['xchi'],$dizhix);
    $snzx[$dataxchi]=$snzx[$dataxchi].'咸池 ';
    $datajsha=array_search($datasnzx[0]['jsha'],$dizhix);
    $snzx[$datajsha]=$snzx[$datajsha].'劫杀 ';
    $datatma=array_search($datasnzx[0]['tma'],$dizhix);
    $snzx[$datatma]=$snzx[$datatma].'天马 ';$arrjix[$datatma]=$arrjix[$datatma].'天马,';
    $dataflian=array_search($datasnzx[0]['flian'],$dizhix);
    $snzx[$dataflian]=$snzx[$dataflian].'蜚蠊 ';
    $snzx[14]=$datasnzx[0]['szhu'];
    $mingzhu=M()->query("select mzhu from tb_shengnianzx  where id={$mgwz}");
    $snzx[13]=$mingzhu[0]['mzhu'];

//        时系诸星
    $datasxzx=M()->query("select * from tb_shixizx where id=".$sd);
    $datawchang=array_search($datasxzx[0]['wchang'],$dizhix);
    $sxzx=array();
    $wchangwsx=M()->query("select wchang from tb_zhuxingmwsx where id=".$datawchang);
    $sxzx[$datawchang]='文昌'.$wchangwsx[0]['wchang'].' ';$arrjix[$datawchang]=$arrjix[$datawchang].'文昌,';
    $datawqu=array_search($datasxzx[0]['wqu'],$dizhix);
    $wquwsx=M()->query("select wqu from tb_zhuxingmwsx where id=".$datawqu);
    $sxzx[$datawqu]=$sxzx[$datawqu].'文曲'.$wquwsx[0]['wqu'];$arrjix[$datawqu]=$arrjix[$datawqu].'文曲,';
    $datatkong=array_search($datasxzx[0]['tkong'],$dizhix);
    $sxzx[$datatkong]=$sxzx[$datatkong].'地空 ';$arrxiongx[$datatkong]='地空,';
    $datadjie=array_search($datasxzx[0]['djie'],$dizhix);
    $sxzx[$datadjie]=$sxzx[$datadjie].'地劫 ';$arrxiongx[$datadjie]=$arrxiongx[$datadjie].'地劫,';
    $datatfu=array_search($datasxzx[0]['tfu'],$dizhix);
    $sxzx[$datatfu]=$sxzx[$datatfu].'台辅 ';
    $datafgao=array_search($datasxzx[0]['fgao'],$dizhix);
    $sxzx[$datafgao]=$sxzx[$datafgao].'封诰 ';


//        获取生年干系诸星
    $datangzx=M()->query("select * from tb_shengniangx where id=".$ng);
    $dataqyang=array_search($datangzx[0]['qyang'],$dizhix);
    $sngx=array();
    $qyangmwsx=M()->query("select qyang from tb_zhuxingmwsx where id=".$dataqyang);
    $sngx[$dataqyang]='擎羊'.$qyangmwsx[0]['qyang'].' ';$arrxiongx[$dataqyang]=$arrxiongx[$dataqyang].'擎羊,';
    $datatluo=array_search($datangzx[0]['tluo'],$dizhix);
    $tluomwsx=M()->query("select tluo from tb_zhuxingmwsx where id=".$datatluo);
    $sngx[$datatluo]=$sngx[$datatluo].'陀罗'.$tluomwsx[0]['tluo'].' ';$arrxiongx[$datatluo]=$arrxiongx[$datatluo].'陀罗,';
    $datatyue=array_search($datangzx[0]['tyue'],$dizhix);
    $sngx[$datatyue]=$sngx[$datatyue].'天钺 ';$arrjix[$datatyue]=$arrjix[$datatyue].'天钺,';
    $datatkui=array_search($datangzx[0]['tkui'],$dizhix);
    $sngx[$datatkui]=$sngx[$datatkui].'天魁 ';$arrjix[$datatkui]=$arrjix[$datatkui].'天魁,';
    $datalcun=array_search($datangzx[0]['lcun'],$dizhix);
    $sngx[$datalcun]=$sngx[$datalcun].'禄存 ';$arrjix[$datalcun]=$arrjix[$datalcun].'禄存,';
    $datatfu=array_search($datangzx[0]['tfu'],$dizhix);
    $sngx[$datatfu]=$sngx[$datatfu].'天福 ';
    $datatguan=array_search($datangzx[0]['tguan'],$dizhix);
    $sngx[$datatguan]=$sngx[$datatguan].'天官 ';
    $datazkong=array_search($datangzx[0]['jielu'],$dizhix);
    $sngx[$datazkong]=$sngx[$datazkong].'截路';
    if($nd==11||$nd==12){$strfkong=mb_substr($datangzx[0]['xunkong'],0,1,'utf-8');
    }else if($nd==9||$nd==10){$strfkong=mb_substr($datangzx[0]['xunkong'],1,1,'utf-8');
    }else if($nd==7||$nd==8){$strfkong=mb_substr($datangzx[0]['xunkong'],2,1,'utf-8');
    }else if($nd==5||$nd==6){$strfkong=mb_substr($datangzx[0]['xunkong'],3,1,'utf-8');
    }else if($nd==3||$nd==4){$strfkong=mb_substr($datangzx[0]['xunkong'],4,1,'utf-8');
    }else{$strfkong=mb_substr($datangzx[0]['xunkong'],5,1,'utf-8');}
    $datafkong=array_search($strfkong,$dizhix);
    $sngx[$datafkong]=$sngx[$datafkong].'旬空';


//        获取生年将前12星
    $datasnjq=$dizhi[$nd];
    if($datasnjq=='寅'||$datasnjq=='午'||$datasnjq=='戌'){
        $snjq=array('指背','咸池','月煞','亡神','将星','攀鞍','岁驿','息神','华盖','劫煞','灾煞','天煞');
    }else if($datasnjq=='申'||$datasnjq=='子'||$datasnjq=='辰'){
        $snjq=array('岁驿','息神','华盖','劫煞','灾煞','天煞','指背','咸池','月煞','亡神','将星','攀鞍');
    }else if($datasnjq=='巳'||$datasnjq=='酉'||$datasnjq=='丑'){
        $snjq=array('劫煞','灾煞','天煞','指背','咸池','月煞','亡神','将星','攀鞍','岁驿','息神','华盖');
    }else{
        $snjq=array('亡神','将星','攀鞍','岁驿','息神','华盖','劫煞','灾煞','天煞','指背','咸池','月煞');
    }

//        获取生年岁前12星
    $datasnsq=array('丧门','贯索','官符','小耗','大耗','龙德','白虎','天德','吊客','病符','岁建','晦气');
    if($nd>=2){
        $datasnsqwz=13-$nd;
        $arrsnsq=array_slice($datasnsq,$datasnsqwz);
        $snsq=array_merge($arrsnsq,$datasnsq);
    }else{
        $snsq=$datasnsq;
    }

//        获取生年博士12星

    $datajqwz=12-$datalcun;
    if($yysex=='阳男'||$yysex=='阴女'){
        $snbsarr=array('博士','力士','青龙','小耗','将军','奏书','飞廉','喜神','病符','大耗','伏兵','官符');
    }else{
        $snbsarr=array('博士','官符','伏兵','大耗','病符','喜神','飞廉','奏书','将军','小耗','青龙','力士');
    }
    $arrbs=array_slice($snbsarr,$datajqwz);
    $snbs=array_merge($arrbs,$snbsarr);

//        获取长生12星
    if($wxj=='水二局'){$csgwz=6;}else if($wxj=='木三局'){$csgwz=9;
    }else if($wxj=='金四局'){$csgwz=3;}else if($wxj=='土五局'){$csgwz=6;}else{$csgwz=0;}
    if($yysex=='阳男'||$yysex=='阴女'){
        $arrcs=array('长生','沐浴','冠带','临官','帝旺','衰','病','死','墓','绝','胎','养');
    }else{
        $arrcs=array('长生','养','胎','绝','墓','死','病','衰','帝旺','临官','冠带','沐浴');
    }
    $datacsgwz=12-$csgwz;
    $arrcsx=array_slice($arrcs,$datacsgwz);
    $cssex=array_merge($arrcsx,$arrcs);
    $GLOBALS['cssex']=$cssex;

//        获取大限
    if($wxj=='水二局'){
        if($yysex=='阳男'||$yysex=='阴女'){
            $dx=array('2-11','12-21','22-31','32-41','42-51','52-61','62-71','72-81','82-91','92-101','102-111','112-121');
        }else{
            $dx=array('2-11','112-121','102-111','92-101','82-91','72-81','62-71','52-61','42-51','32-41','22-31','12-21');
        }
    }else if($wxj=='木三局'){
        if($yysex=='阳男'||$yysex=='阴女'){
            $dx=array('3-12','13-22','23-32','33-42','43-52','53-62','63-72','73-82','83-92','93-102','103-112','113-122');
        }else{
            $dx=array('3-12','113-122','103-112','93-102','83-92','73-82','63-72','53-62','43-52','33-42','23-32','13-22');
        }
    }else if($wxj=='金四局'){
        if($yysex=='阳男'||$yysex=='阴女'){
            $dx=array('4-13','14-23','24-33','34-43','44-53','54-63','64-73','74-83','84-93','94-103','104-113','114-123');
        }else{
            $dx=array('4-13','114-123','104-113','94-103','84-93','74-83','64-73','54-63','44-53','34-43','24-33','14-23');
        }
    }else if($wxj=='土五局'){
        if($yysex=='阳男'||$yysex=='阴女'){
            $dx=array('5-14','15-24','25-34','35-44','45-54','55-64','65-74','75-84','85-94','95-104','105-114','115-124');
        }else{
            $dx=array('5-14','115-124','105-114','95-104','85-94','75-84','65-74','55-64','45-54','35-44','25-34','15-24');
        }
    }else{
        if($yysex=='阳男'||$yysex=='阴女'){
            $dx=array('6-15','16-25','26-35','36-45','46-55','56-65','66-75','76-85','86-95','96-105','106-115','116-125');
        }else{
            $dx=array('6-15','116-125','106-115','96-105','86-95','76-85','66-75','56-65','46-55','36-45','26-35','16-25');
        }
    }

    $data=array_search('命宫',$shierg);
    $arrdx=array_slice($dx,12-$data);
    $dx=array_merge($arrdx,$dx);

//        获取小限
    $arrxiaoxian=array('1 13 25 37 49 61 73 85 97 109','2 14 26 38 50 62 74 86 98 110','3 15 27 39 51 63 75 87 99 111','4 16 28 40 52 64 76 88 100 112',
        '5 17 29 41 53 65 77 89 101 113','6 18 30 42 54 66 78 90 102 114','7 19 31 43 55 67 79 91 103 115','8 20 32 44 56 68 80 92 104 116',
        '9 21 33 45 57 69 81 93 105 117','10 22 34 46 58 70 82 94 106 118','11 23 35 47 59 71 83 95 107 119','12 24 36 48 60 72 84 96 108 120');
    $arrxiaoxiann=array('1 13 25 37 49 61 73 85 97 109','12 24 36 48 60 72 84 96 108 120','11 23 35 47 59 71 83 95 107 119','10 22 34 46 58 70 82 94 106 118',
        '9 21 33 45 57 69 81 93 105 117','8 20 32 44 56 68 80 92 104 116','7 19 31 43 55 67 79 91 103 115','6 18 30 42 54 66 78 90 102 114',
        '5 17 29 41 53 65 77 89 101 113','4 16 28 40 52 64 76 88 100 112','3 15 27 39 51 63 75 87 99 111','2 14 26 38 50 62 74 86 98 110');
    if($dizhi[$nd]=='寅'||$dizhi[$nd]=='午'||$dizhi[$nd]=='戌'){
        if($sex=='男'){
            $dataxxwz=array_search('辰',$dizhix);
            $arrxx=array_slice($arrxiaoxian,12-$dataxxwz);
            $xx=array_merge($arrxx,$arrxiaoxian);
        }else{
            $dataxxwz=array_search('辰',$dizhix);
            $arrxx=array_slice($arrxiaoxiann,12-$dataxxwz);
            $xx=array_merge($arrxx,$arrxiaoxiann);
        }
    }else if($dizhi[$nd]=='申'||$dizhi[$nd]=='子'||$dizhi[$nd]=='辰'){
        if($sex=='男'){
            $dataxxwz=array_search('戌',$dizhix);
            $arrxx=array_slice($arrxiaoxian,12-$dataxxwz);
            $xx=array_merge($arrxx,$arrxiaoxian);
        }else{
            $dataxxwz=array_search('戌',$dizhix);
            $arrxx=array_slice($arrxiaoxiann,12-$dataxxwz);
            $xx=array_merge($arrxx,$arrxiaoxiann);
        }
    }else if($dizhi[$nd]=='巳'||$dizhi[$nd]=='酉'||$dizhi[$nd]=='丑'){
        if($sex=='男'){
            $dataxxwz=array_search('未',$dizhix);
            $arrxx=array_slice($arrxiaoxian,12-$dataxxwz);
            $xx=array_merge($arrxx,$arrxiaoxian);
        }else{
            $dataxxwz=array_search('未',$dizhix);
            $arrxx=array_slice($arrxiaoxiann,12-$dataxxwz);
            $xx=array_merge($arrxx,$arrxiaoxiann);
        }
    }else{
        if($sex=='男'){
            $dataxxwz=array_search('丑',$dizhix);
            $arrxx=array_slice($arrxiaoxian,12-$dataxxwz);
            $xx=array_merge($arrxx,$arrxiaoxian);
        }else{
            $dataxxwz=array_search('丑',$dizhix);
            $arrxx=array_slice($arrxiaoxiann,12-$dataxxwz);
            $xx=array_merge($arrxx,$arrxiaoxiann);
        }
    }


//        其他星获取
    $qtx=array();
    if($dizhi[$nd]=='寅'||$dizhi[$nd]=='午'||$dizhi[$nd]=='戌'){
        $datahxwz=M()->query("select ywx from tb_huoxing where id=".$sd);
        $datahxwz=$datahxwz[0]['ywx'];
    }else if($dizhi[$nd]=='申'||$dizhi[$nd]=='子'||$dizhi[$nd]=='辰'){
        $datahxwz=M()->query("select szc from tb_huoxing where id=".$sd);
        $datahxwz=$datahxwz[0]['szc'];
    }else if($dizhi[$nd]=='巳'||$dizhi[$nd]=='酉'||$dizhi[$nd]=='丑'){
        $datahxwz=M()->query("select syc from tb_huoxing where id=".$sd);
        $datahxwz=$datahxwz[0]['syc'];
    }else{
        $datahxwz=M()->query("select hmw from tb_huoxing where id=".$sd);
        $datahxwz=$datahxwz[0]['hmw'];
    }
    $datahxwz=array_search($datahxwz,$dizhix);

    $hxingmwsx=M()->query("select hxing from tb_zhuxingmwsx where id=".$datahxwz);
    //获取火星
    $qtx[$datahxwz]='火星'.$hxingmwsx[0]['hxing'];$arrxiongx[$datahxwz]=$arrxiongx[$datahxwz].'火星,';

    if($dizhi[$nd]=='寅'||$dizhi[$nd]=='午'||$dizhi[$nd]=='戌'){
        $datalxwz=M()->query("select ywx from tb_lingxing where id=".$sd);
        $datalxwz=$datalxwz[0]['ywx'];
    }else if($dizhi[$nd]=='申'||$dizhi[$nd]=='子'||$dizhi[$nd]=='辰'){
        $datalxwz=M()->query("select szc from tb_lingxing where id=".$sd);
        $datalxwz=$datalxwz[0]['szc'];
    }else if($dizhi[$nd]=='巳'||$dizhi[$nd]=='酉'||$dizhi[$nd]=='丑'){
        $datalxwz=M()->query("select syc from tb_lingxing where id=".$sd);
        $datalxwz=$datalxwz[0]['syc'];
    }else{
        $datalxwz=M()->query("select hmw from tb_lingxing where id=".$sd);
        $datalxwz=$datalxwz[0]['hmw'];
    }
    $datalxwz=array_search($datalxwz,$dizhix);
    $lxingmwsx=M()->query("select lxing from tb_zhuxingmwsx where id=".$datalxwz);
    //获取铃星
    $qtx[$datalxwz]=$qtx[$datalxwz].'铃星'.$lxingmwsx[0]['lxing'];$arrxiongx[$datalxwz]=$arrxiongx[$datalxwz].'铃星,';



    $datastwz=$datazfu+($d%12)-1;
    if($datastwz>11){
        $datastwz%=12;
    }
    $qtx[$datastwz]=$qtx[$datastwz].'三台 ';


    $databzwz=$dataybi-($d%12)+1;
    if($databzwz<0){
        $databzwz%=12;
    }
    $qtx[$databzwz]=$qtx[$databzwz].'八座 ';

    $datatgwz=$datawqu+($d%12)-2;
    if($datatgwz>11){
        $datatgwz%=12;
    }
    $qtx[$datatgwz]=$qtx[$datatgwz].'天贵 ';

    $dataeguangwz=$datawchang+($d%12)-2;
    if($dataeguangwz>11){
        $dataeguangwz%=12;
    }
    $qtx[$dataeguangwz]=$qtx[$dataeguangwz].'恩光 ';

    $datamgongwz=array_search('命宫',$shierg);
    $datatcaiwz=$datamgongwz+$nd-1;
    if($datatcaiwz>11){
        $datatcaiwz%=12;
    }
    $qtx[$datatcaiwz]=$qtx[$datatcaiwz].'天才 天寿 ';

    $datatshiwz=array_search('疾厄',$shierg);
    $qtx[$datatshiwz]=$qtx[$datatshiwz].'天使 ';

    $datatshangwz=array_search('部属',$shierg);
    $qtx[$datatshangwz]=$qtx[$datatshangwz].'天伤 ';


//        获取四化星
    $shua=M()->query("select * from tb_sihua where id=".$ng);

//        获取流年流月流日
    $lnlylr=array();
    $lnlylr[$nd]='流年 ';

    $datalywz=$nd-$m+$t;
    if($datalywz<0){
        $datalywz+=11;
    }
    if($datalywz>11){
        $datalywz-=12;
    }
    $lnlylr[$datalywz]=$lnlylr[$datalywz].'流月 ';

    $dated=date("d");
    $datalrwz=$datalywz+($dated%=12)-1;
    if($datalrwz>11){
        $datalrwz-=12;
    }
    $lnlylr[$datalrwz]=$lnlylr[$datalrwz].'流日 ';

//        获取大限宫与小限宫
    $datayear=date('Y')-$year;
    foreach($dx as $key=>$value){
        $datadxx=mb_substr($value,-2);
        $datadxy=mb_substr($value,-3);
        if($datadxx>0){
            if(($datadxx-10)<=$datayear&&$datayear<=$datadxx){
                $lnlylr[$key]=$lnlylr[$key].'大限 ';
                break;
            }
        }else if($datadxy>0){
            if(($datadxy-10)<=$datayear&&$datayear<=$datadxy){
                $lnlylr[$key]=$lnlylr[$key].'大限 ';
                break;
            }
        }
    }


    foreach($xx as $key=>$value){
        if(preg_match("/(".$datayear.")/",$value)){
            $lnlylr[$key]=$lnlylr[$key].'小限 ';
            break;
        }
    }

//    获取wedlock数据
    $ngnz=$tiangan[$g].$dizhi[$z];
    $wedlock=M()->query("select * from tb_wedlock where name='{$ngnz}'");
    $datajyfs=$ngnz.'fraction';
    if(S($datajyfs)==''){
        $datajy=mt_rand($wedlock[0]['exp-fraction']-2,$wedlock[0]['exp-fraction']);
        S($datajyfs,$datajy,2592000);
    }
    $GLOBALS['wedlock']=$wedlock[0];
    $GLOBALS['jyfraction']=S($datajyfs);
    $GLOBALS['position']=$wedlock[0]['position'];
    $GLOBALS['see-spouse']=$wedlock[0]['see-spouse'];
    $GLOBALS['ny']=$wedlock[0]['ny'];
    $GLOBALS['mgwz']=$dizhix[$datamgongwz];

    $GLOBALS['yysex']=$yysex;
    $GLOBALS['srg']=$shierg;
    $GLOBALS['wxj']=$wxj;


    if($sex=='男'){
        $GLOBALS['nanwxj']='男'.mb_substr($wxj,0,1,'utf-8');
        $GLOBALS['manfraction']=$wedlock[0]['love-analysis-man'];
        $dataman=$g.$z.'manfraction';
        if(S($dataman)==''){
            $datamant=mt_rand($wedlock[0]['exp-fraction']-2,$wedlock[0]['exp-fraction']);
            S($dataman,$datamant,2592000);
        }
        $GLOBALS['manf']=S($dataman);
    }else{
        $GLOBALS['nvwxj']='女'.mb_substr($wxj,0,1,'utf-8');
        $GLOBALS['womanfraction']=$wedlock[0]['love-analysis-woman'];
        $datawoman=$ngnz.'womanfraction';
        if(S($datawoman)==''){
            $datawomant=mt_rand($wedlock[0]['exp-fraction']-2,$wedlock[0]['exp-fraction']);
            S($datawoman,$datawomant,2592000);
        }
        $GLOBALS['womanf']=S($datawoman);
    }

    $GLOBALS['arrjix']=$arrjix;//吉星
    $GLOBALS['arrxiongx']=$arrxiongx;//凶星
    $GLOBALS['tg']=$tiang;
    $GLOBALS['ymd']=$ymd;
    $GLOBALS['arrzx']=$arrzx;
    $GLOBALS['arrtf']=$arrtf;
    $GLOBALS['zx']=$arrzx[$datamgongwz]; $GLOBALS['fqzx']=$arrzx[$datafqwz];
    $GLOBALS['tf']=$arrtf[$datamgongwz]; $GLOBALS['fqtf']=$arrtf[$datafqwz];
    $GLOBALS['syzx']=$syzx; $GLOBALS['fqsyzx']=explode(' ',$syzx[$datafqwz]);
    $GLOBALS['snzx']=$snzx; $GLOBALS['fqsnzx']=explode(' ',$snzx[$datafqwz]);
    $mssnzx=array();$mssnzx[13]=$snzx[13];$mssnzx[14]=$snzx[14];
    $GLOBALS['mssnzx']=$mssnzx;
    $GLOBALS['sxzx']=$sxzx; $GLOBALS['fqsxzx']=explode(' ',$sxzx[$datafqwz]);
    $GLOBALS['sngx']=$sngx; $GLOBALS['fqsngx']=explode(' ',$sngx[$datafqwz]);
    $GLOBALS['snjq']=$snjq;
    $GLOBALS['snsq']=$snsq;
    $GLOBALS['snbs']=$snbs;
    $GLOBALS['dx']=$dx;
    $GLOBALS['qtx']=$qtx;//其他星 如火星、铃星
    $arrxx=array();
    for($i=0;$i<12;$i++){
        $dataxx=explode(' ',$xx[$i]);
        $arrxx[$i]=$dataxx;
    }
    $GLOBALS['xx']=$arrxx;//小限
    $GLOBALS['shua']=$shua;
    $GLOBALS['lnlylr']=$lnlylr;

    if($sex=='男'){
        $GLOBALS['nansx']='男'.$shengxiao;
    }else{
        $GLOBALS['nvsx']='女'.$shengxiao;
    }
    $GLOBALS['datamgongwz']=$datamgongwz;//命宫位置

}

function zwmpf($ymd,$hour,$sex){

}

function wxhp($wxnn){
    $datawxnn=M()->query("select * from tb_bzfpb where name='{$wxnn}'");
    $wxfraction=$wxnn.'wxfraction';
    if(S($wxfraction)==''){
        if($datawxnn[0]['fraction']>=19){
            $datawx=mt_rand($datawxnn[0]['fraction']-2,$datawxnn[0]['fraction']);
            S($wxfraction,$datawx,2592000);
        }else{
            $datawx=mt_rand($datawxnn[0]['fraction']-3,$datawxnn[0]['fraction']);
            S($wxfraction,$datawx,2592000);
        }
    }
    $GLOBALS['wxnn']=$datawxnn[0];
    $GLOBALS['wxfraction']=S($wxfraction);
}

function sxhp($nansx,$nvsx){
    $datannsx=M()->query("select * from tb_shengxiaohp where name='{$nansx}{$nvsx}'");
    if(empty($datannsx)){
        $datannsx=M()->query("select * from tb_shengxiaohp where name='{$nvsx}{$nansx}'");
    }
    $sxfraction=$nansx.$nvsx.'sxfraction';
    if(S($sxfraction)==''){
        if($datannsx[0]['fraction']>=19){
            $datasx=mt_rand($datannsx[0]['fraction']-2,$datannsx[0]['fraction']);
            S($sxfraction,$datasx,2592000);
        }else{
            $datasx=mt_rand($datannsx[0]['fraction']-3,$datannsx[0]['fraction']);
            S($sxfraction,$datasx,2592000);
        }
    }
    $GLOBALS['sxnn']= $datannsx[0];
    $GLOBALS['sxfraction']=S($sxfraction);
}




