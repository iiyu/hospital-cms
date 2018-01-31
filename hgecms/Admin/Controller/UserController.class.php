<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController {
    public function index(){
        $u = M(user);
        $ures = $u->select();
        $this->assign('user',$ures);
        $this->display();
    }
    
    public function edit(){
        $id = I('get.id',1);
        $u = M(user);
        $ures = $u->where("userid = $id")->find();
        $this->assign('nuser',$ures);
        $this->display();
    }

    public function doEdit(){
        $id = $_POST['sn'];
        $u = M(user);
        $is = $u->where("userid = $id")->setField('is_approve',$_POST['renzheng']);
        if($is){
            echo '{
                "statusCode":"200",
                "message":"审核成功",
                "navTabId":"info",
                "rel":"",
                "callbackType":"closeCurrent",
                "forwardUrl":"",
                "confirmMsg":""
                   }';
        }else{
            echo '{
                "statusCode":"300",
                "message":"审核失败",
                "navTabId":"edit"
                   }';
        }
    }

    public function del(){
        $id = $_GET['id'];
        $u = M(user);
        $dis = $u->where("userid = $id")->delete();
        if ($dis){
            echo '{
                "statusCode":"200",
                "message":"删除成功"，
                   }';
        }
        
    }
}