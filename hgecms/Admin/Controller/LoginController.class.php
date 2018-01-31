<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
	//登录后台
    public function login(){
    	
    	$this->display('login');
    }
    public function checklogin(){
    	$username = I('post.username','','htmlspecialchars');
		$password = md5(I('post.password','','htmlspecialchars'));
	 	 if(check_code($_POST['verify']) === false){       //给function.php中定义的函数check_code，然后它返回真假
         $this->error('验证码错误');
         }else{
		$M = M('admin');
		$res = $M->where("adminname = '%s' and apassword = '%s'",$username,$password)->find();
		
		if ($res) {
			$_SESSION['username'] = $res['adminname'];
			$this->redirect('Admin/Index/index');
		}else{
			$this->error('登陆失败');
		}
		}
    }

    //退出登陆
    public function logout(){
    	session(null);
    	$this->success('欢迎再来',U('Admin/Login/login'),3);
    }
    public function verify_c(){
    	$Verify = new \Think\Verify();
    	$Verify->entry();
    }
}