<?php
/**
 * Created by PhpStorm.
 * User: SIRzhou
 * Date: 2016/5/24
 * Time: 21:42
 */

namespace Admin\Controller;
use Think\Controller;

class InfoController extends CommonController{
    public function index(){
        $I = M('biaozhuntype');
       // $zhang = $I->where('pid = 0')->select();
       $list=$I->field("id,typename,details,pid,path,sort,concat(path,'.',id) as bpath")->group('bpath')->select();

        foreach($list as $key=>$value){

            $list[$key]['count']=count(explode('.',$value['bpath']));
        }
        $this->assign('list',$list);
        $this->display();
    }
    //组合多维数组
    Static Public function unlimitedForLayer ($cate, $name = 'child', $pid = 0) {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['pid'] == $pid) {
                $v[$name] = self::unlimitedForLayer($cate, $name, $v['id']);
                $arr[] = $v;
            }
        }
        return $arr;
    }

    public static function layer($cate,$id=0){//一棵树形成一个数组
        static $arr=array();
        foreach($cate as $v){
            if($v['id']==$id){
                $v['cate']=self::layer($cate,$v['id']);
                $arr[]=$v;

            }
        }
        return $arr;

    }
    public function edit(){
        $id = $_GET['id'];
        $e = M('biaozhuntype');
        
        $one = $e->where("id = $id")->find();
        $this->assign('one',$one);
        $this->index('edit');
    }
    public function add(){
        $I = M('biaozhuntype');
        // $zhang = $I->where('pid = 0')->select();
        $list=$I->field("id,typename,details,pid,path,sort,concat(path,'.',id) as bpath")->group('bpath')->select();

        foreach($list as $key=>$value){
            $list[$key]['count']=count(explode('.',$value['bpath']));
        }
        $this->assign('alist',$list);
        $this->display('add');
    }

    //执行添加
    public function doadd(){
        //引入分类MODEL
        $type=new \Admin\Model\InfoModel('biaozhuntype');
        if($vo=$type->create()){
            if($type->add()){
                $this->success('添加分类成功');
            }else{
                $this->error('添加分类失败');
            }
        }else{
            $this->error($type->getError());
        }
    }

    //删除分类
    public function del(){
        $lei = M('biaozhuntype');
        $id = $_GET['id'];
        $check = $lei->where("pid = $id")->select();
        if ($check != null) {
            $this->error("你小弟还没清理干净呢");
        }else{
            $res = $lei->delete($id);
        }
        if ($res>0) {
            $this->success("删除成功！");
        }else{
            $this->error("删除失败");
        }
    }

    //生成查找带回树html文件
    public function createTree(){
        $I = M('biaozhuntype');
        $list=$I->field("id,typename,details,pid,path,sort,concat(path,'.',id) as bpath")->group('bpath')->order('id asc')->select();

        foreach($list as $key=>$value){

            $list[$key]['count']=count(explode('.',$value['bpath']));
        }

        $arr = self::unlimitedForLayer($list,'child',0);
  //      echo '<pre>';
//var_dump($arr);die;
        $html = '<div class="pageContent">
	<div class="pageFormContent" layoutH="58"><ul class="tree expand">';
        foreach ($arr as $zhang){
            $html .= '<li><a href="javascript:">'.$zhang['sort'].'</a>';

                foreach ($zhang['child'] as $jie){
                    $html .= '<ul>';
                        $html .= '<li><a href="javascript:">'.$jie['sort'].'</a>';
                            foreach ($jie['child'] as $tiao){
                                $html .= '<ul>';
                                    $html .= '<li><a href="javascript:">'.$tiao['sort'].'</a>';                                  foreach ($tiao['child'] as $kuan){
                                                 $html .= '<ul>';
                                                        foreach ($kuan['child'] as $xiang){
                                                            $html .= '<li><a href="javascript:" onclick="$.bringBack({'."sort:'".$xiang['sort']."',psort:'".$kuan['sort']."'})".'">'.$xiang['sort'].'</a>';
                                                        }
                                                        $html .= '</li>';
                                                 $html .= '</ul>';
                                }
                                    $html .= '</li>';
                                $html .= '</ul>';
                            }
                        $html .= '</li>';
                    $html .= '</ul>';
                }
            $html .= '</li>';
        }
        $html .= '</ul></div>
	
	<div class="formBar">
		<ul>
			<li><div class="button"><div class="buttonContent"><button class="close" type="button">关闭</button></div></div></li>
		</ul>
	</div>
</div>';
       // $html = iconv('GBK','utf-8',$html);
     //  echo $html;
        file_put_contents('1.html',$html);
        //echo '<pre>';
        //var_dump($arr);die();
    }

    public function lists(){
        $id = $_GET['id'];
        $I = M('biaozhuntype');
        $zhang = $I->where("pid = $id")->select();
        $this->display('list');
    }

    public function discusslist(){
        $this->display('discuss');
    }

    public function infoType(){
        $this->display('infotype');
    }
}
