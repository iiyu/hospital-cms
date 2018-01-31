<?php
/**
 * Created by PhpStorm.
 * User: SIRzhou
 * Date: 2016/5/24
 * Time: 21:42
 */

namespace Admin\Controller;
use Think\Controller;

class DataController extends CommonController{
    public function updata(){
        $C = M('content');
        $res = $C->select();
        $this->assign('list',$res);
        $this->display();
    }

    public function add(){

        $this->display();
    }

    public function doAdd()
    {
      //  var_dump($_POST);
       // die();
        $m = M("content");
        $data = $m->create();
        $data['upsort'] = $_POST['district_psort'];
        $data['nextsort'] = $_POST['district_sort'];
        $data['content'] = $_POST['fld_content'];
        $data['createtime'] = time();
        //$upload = new \Think\Upload();// 实例化上传类
        //$upload->maxSize = 3145728;// 设置附件上传大小
        //$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        //$upload->rootPath = './Public/Uploads/'; // 设置附件上传目录    // 上传文件
        //$info = $upload->uploadOne($_FILES['fil']);
       // if (!$info) {            // 上传错误提示错误信息
       //     $this->error($upload->getError());
       // } else {                  // 上传成功
        //    $data['file'] = $info['savepath'] . $info['savename'];
            $result = $m->add($data);
            if ($result > 0) {
                $this->success("上传成功！");
            } else {
                $this->error("上传失败！");
            }
      //  }
    }

    public function uploads(){

      //  var_dump($_FILES);die();
       // $m=M("slides");
       // $data = $m->create();
       // $data['createtime']=time();
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728 ;// 设置附件上传大小zip,rar,txt,doc,docx,pdf
        $upload->exts    = array('jpg', 'gif', 'png', 'jpeg','doc','docx','pdf','zip','rar','txt');// 设置附件上传类型
        $upload->rootPath= './Uploads/'; // 设置附件上传目录    // 上传文件
        $info = $upload->uploadOne($_FILES['filedata']);
        if(!$info) {            // 上传错误提示错误信息
            $this->error($upload->getError());
        }else{                  // 上传成功
            $data['pic']=$info['savepath'].$info['savename'];
       //     $result = $m->add($data);
       //     if($result>0){
            //echo '{"err":"","msg":"'.$data['pic'].'"}';
            echo "{'err':'','msg':{'url':'".__ROOT__.'/Uploads/'.$data['pic']."','localname':'".$data['name']."','id':'1'}}";


             //   $this->success("上传成功！");
        //    }else{
              //  $this->error("上传失败！");
            }
        }

}
