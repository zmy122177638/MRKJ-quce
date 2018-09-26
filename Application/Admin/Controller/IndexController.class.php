<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display("Index/index");
    }
    public function bookselect(){
        $arr=M()->query("select * from tb_book order by id desc limit 5");
        $this->assign('arr',$arr);
        $this->display("Book/bookselect");
    }

    public function bookadd(){
        if(!empty($_POST)&&!empty($_FILES)){
        $bookimage=$_FILES['bookimage'];
             $pref=uniqid();
             $suff=strrchr($bookimage['name'],'.');
             $filename=$pref.$suff;
            $add=str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']);
             move_uploaded_file($_FILES['bookimage']['tmp_name'],$add."/Upload/bookimage/".$filename);
             $data['bookname']=I('post.bookname');
             $data['page']=I('post.page');
             $data['bookimage']=$filename;
             $bool=M('book')->add($data);
            if($bool){
                $this->success('成功',U('Index/bookselect'));
            }else{
                $this->error('失败',U('Index/bookselect'));
            }
        }else{
            $this->display("Book/bookadd");
        }
    }


    public function booksselect(){
        $arr=M()->query("select * from tb_books where pid={$_GET['id']} order by id desc ");
        $this->assign('arr',$arr);
        $this->display("Book/booksselect");
    }
    public function booksadd(){
        if(!empty($_POST)&&!empty($_FILES)){
            $booksimage=$_FILES['booksimage'];
            $pref=uniqid();
            $suff=strrchr($booksimage['name'],'.');
            $filename=I('post.pid').'-'.$pref.$suff;
            $add=str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']);
            move_uploaded_file($_FILES['booksimage']['tmp_name'],$add."/Upload/bookimage/".$filename);
            $data['booksname']=I('post.booksname');
            $data['booksimage']=$filename;
            $data['audio']=I('post.audio');
            $data['timel']=I('post.timel');
            $data['pid']=I('post.pid');
            $bool=M('books')->add($data);
            if($bool){
                $this->success('成功',U('Index/bookselect'));
            }else{
                $this->error('失败',U('Index/bookselect'));
            }
        }else{
            $arr=M()->query("select bookname,id from tb_book where id=".$_GET['id']);
            $this->assign('arr',$arr);
            $this->display("Book/booksadd");
        }
    }
}