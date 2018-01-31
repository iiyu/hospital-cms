<?php 
namespace Admin\Controller;
use Think\Controller;
/**
* 
*/
class CommonController extends Controller
{
	//初始化方法，自动调用执行
	function _initialize()
	{
		if ($_SESSION['username'] == "") {
			$this->error('非法操作',U('Admin/Login/login'),3);
		}
	}
	
	public function myRelust($result){
                if($result == false){
                    $this->error("操作失败！");
                }else{
                    $this->success("操作成功！");
                }
            }
}

 ?>