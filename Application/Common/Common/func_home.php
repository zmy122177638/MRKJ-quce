<?php
function ageJK($y,$zsex){//���佡��
    $year=date('Y');
    $age=$year-$y;

    if($age<=20){
        $data='贫血、营养不良、急性胃肠炎、内分泌失调';
    }else if($age<=30){
       if($zsex==0){$data='黑色素瘤、高胆固醇、人头瘤病毒、乳腺癌、急慢性胃肠炎';
       }else{$data='乙肝病毒、黑色素瘤、睾丸癌、高胆固醇、急慢性胃肠炎';
       }
    }else if($age<=40){
        if($zsex==0){$data='宫颈癌、乳腺癌、2型糖尿病、肝胆结石';
        }else{$data='消化类疾病（慢性肝病、胃病、炎症性肠病等）、2型糖尿病、睾丸癌、黑色素瘤、结直肠癌、脂肪肝、心脏病';
        }
    }else if($age<=50){
        if($zsex==0){$data='心脏病，乳腺癌、2型糖尿病、肝胆疾病';
        }else{$data='心脏病、结直肠癌、肝胆疾病、生殖系统肿瘤（前列腺癌）等';
        }
    }else if($age<=60){
        if($zsex==0){$data='骨质疏松、结肠癌、卵巢癌、心脏病、中风';
        }else{$data='心脏病、前列腺癌、结肠癌、中风';
        }
    }else{
        $data='更年期综合症、骨质疏松、关节炎、心脑血管疾病、动脉硬化、颈椎病、焦虑症、痴呆、系统器官衰竭';
    }
    $dataArr=array(
        'age'=>$age,
        'text'=>$data.'的高发上升期'
    );
    return $dataArr;
}
function clickTJ($id){
    $answerArr=M()->query("select title,content,cs_num from qc_choiceti_answer where id='{$id}' limit 1");
    M()->query("update qc_choiceti_answer set cs_num='{$answerArr[0]['cs_num']}'+1 where id='{$id}'");
    return $answerArr[0]['cs_num'];
}

function discountprice($channel,$csName=null){//优惠价格获取
    defaultPrice();//默认价格
    channelPay($channel,$csName);//查询渠道价格
    $price=cookie('price');

    $payArr=M()->query("select * from tb_channel_pay where pay='{$price}' and discountname='discount'");
    if($payArr){
        cookie('discountprice',$payArr[0]['discountprice']);//优惠价格
    }else{
        cookie('discountprice',4);//默认优惠价格
    }
}
function defaultPrice(){//默认价格
    cookie('price',68);
    if(cookie('channel')){
        cookie('price',28);
    }
}
function channelPay($channel,$csName){//渠道价格
    $channelPayArr=M()->query("select * from tb_channel_pay where channel='{$channel}' and csName='{$csName}'");
    if(empty($channelPayArr)){
        $channelPayArr=M()->query("select * from tb_channel_pay where channel='{$channel}'");
    }
    if($channelPayArr){cookie('price',$channelPayArr[0]['pay']);}
}