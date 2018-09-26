<?php
namespace Home\Controller;
use Think\Controller;
class interfaceController extends Controller {
    public function index(){//首页数据接口
        $zhimingArr=M()->query("select name,image,subject from qc_zhiming_link where type='quce' limit 8");
        $bannerArr=M()->query("select name,image,subject from qc_zhiming_link where type='banner' ");
        foreach($zhimingArr as $key=>$values){
            $zhimingArr[$key]['image']='https://www.yixueqm.com/quce/Public/images/'.$values['image'];
        }
        foreach($bannerArr as $key=>$values){
            $bannerArr[$key]['image']='https://www.yixueqm.com/quce/Public/images/'.$values['image'];
        }
        $arr['zhiming']=$zhimingArr;
        $arr['banner']=$bannerArr;
        echo json_encode($arr);
    }
    public function wxEntry(){//微信数据录入
        $nickname=I("request.nickname");
        $openid=I("request.openid");
        $city=I("request.city");
        $province=I("request.province");
        $headimgurl=I("request.headimgurl");

        cookie('uid',$openid);
        $userArr=M()->query("select id from qc_user where  wx_openid='{$openid}' limit 1");
        if(empty($userArr)){
            M()->query("insert into qc_user (nickname,address,head_img,wx_openid)values(
                                                '{$nickname}','{$province},{$city}','{$headimgurl}','{$openid}')");
        }
    }
}