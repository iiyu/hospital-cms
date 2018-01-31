<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $id = I('get.id',1);
        $I = M('biaozhuntype');
        $zhang = $I->where("pid = 0")->select();
        $jie = $I->where("pid = $id")->select();

        $this->assign('zhang',$zhang);
        $this->assign('jie',$jie);
        $this->assign('id',$id);
        $this->assign('sort',$sort);

        $this->display();
    }


	public function content(){
		$id = I('get.id');
		$I = M('content');
		$row = $I->where("id = $id")->find();
		//var_dump($row);die();
		$this->assign('row',$row);
		$this->display();
	}


public function getAjax(){
    $pid = $_GET['pid'];
    $I = M('biaozhuntype');
	$C = M('content');
    $list=$I->field("id,typename,details,pid,path,sort,concat(path,'.',id) as bpath")->group('bpath')->order('id asc')->select();

    foreach($list as $key=>$value){

        $list[$key]['count']=count(explode('.',$value['bpath']));
    }

    $arr = self::unlimitedForLayer($list,'child',$pid);
   // $this->assign('list',$list);
   // $this->display();
  //  echo '<pre>';
//var_dump($arr);die;

    $html = '';
	$i=0;
    foreach ($arr as $val){
		$i++;
		$html .= "<h5>" . $val['sort'] . ' ' . $val['details'] . "</h5>\n";
		$html .= '<div class="list">
		<ul>
			<li class="a1">评审标准</li>
			<li class="a2">评审要点</li>
			<li class="a3">资料</li>
		</ul>';

		foreach ($val['child'] as $key => $kuan) {
			//var_dump($kuan);die;
			$sort = $kuan['sort'];
		//	echo $sort;
			$res = $C->where("upsort = '".$sort."'")->select();
		//	var_dump($res);die;
			$html .= '<dl><dt class="b1"><span>'.$kuan['sort'].'</span>'.$kuan['details'].'</dt>';
			$html .= '<dt class="b2">';
			$html .= '<span>【C】';
			foreach ($kuan['child'] as $key => $xiang){
				if (substr($xiang['sort'],0,1) == 'C'){
					$html .= '<br />'.$xiang['details'];
				}
			}
			$html .= '</span>';
			$html .= '<span>【B】符合“C”，并';
			foreach ($kuan['child'] as $key => $xiang){
				if (substr($xiang['sort'],0,1) == 'B'){
					$html .= '<br />'.$xiang['details'];
				}
			}
			$html .= '</span>';

			$html .= '<span>【A】符合“B”，并';
			foreach ($kuan['child'] as $key => $xiang){
				if (substr($xiang['sort'],0,1) == 'A'){
					$html .= '<br />'.$xiang['details'];
				}
			}
			$html .= '</span>';

			$html .='</dt>';
			$html .='<dd id="MstTtz_00'.($i).'_1">';
			$html .='<strong id="MstTtz_00'.($i).'" style="height:48px">';
			foreach ($kuan['child'] as  $key => $xiang){
				$html .= '<em class="c2" onmouseover="GetTab(\'MstTtz_00'.$i.'\','.$key.')">'.$xiang['sort'].'</em>';
			}
			$html .= '</strong>';
			foreach ($kuan['child'] as  $key => $xiang){
				$html .= '<span style="display:none;">';
				foreach ($res as $val){

					//echo $val['nextsort'];
					//echo $xiang['sort'];die();
					if ($val['nextsort'] == $xiang['sort']){

						$html .= '<a href="';
						$html .= "/hgecms/index.php/Home/Index/content/id/".$val['id'].'"';
						$html .= 'target="_blank" Title="';
						$html .= $val['title'];
						$html .= '"><div>'.$val['title'].'</div></a><br/>';

					}

				}
				$html .= '</span>';
			}
				$html .= '</dd></dl>';
		}
			$html .='</div>';
    }

$this->ajaxReturn($html);

}
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

    public function getcat(){
        echo "[{\"Chapter\":\"1.1.1.1\",\"FlowList\":[{\"FlowId\":1,\"FlowName\":\"科室自查\",\"Rank\":1,\"IsOpen\":false,\"IsComment\":true,\"Available\":false},{\"FlowId\":2,\"FlowName\":\"医院自评\",\"Rank\":0,\"IsOpen\":false,\"IsComment\":false,\"Available\":false},{\"FlowId\":3,\"FlowName\":\"专家预评\",\"Rank\":0,\"IsOpen\":false,\"IsComment\":false,\"Available\":false},{\"FlowId\":4,\"FlowName\":\"专家评审\",\"Rank\":0,\"IsOpen\":false,\"IsComment\":false,\"Available\":false}]},{\"Chapter\":\"1.1.2.1\",\"FlowList\":[{\"FlowId\":1,\"FlowName\":\"科室自查\",\"Rank\":0,\"IsOpen\":false,\"IsComment\":false,\"Available\":false},{\"FlowId\":2,\"FlowName\":\"医院自评\",\"Rank\":0,\"IsOpen\":false,\"IsComment\":false,\"Available\":false},{\"FlowId\":3,\"FlowName\":\"专家预评\",\"Rank\":0,\"IsOpen\":false,\"IsComment\":false,\"Available\":false},{\"FlowId\":4,\"FlowName\":\"专家评审\",\"Rank\":0,\"IsOpen\":false,\"IsComment\":false,\"Available\":false}]},{\"Chapter\":\"1.1.3.1\",\"FlowList\":[{\"FlowId\":1,\"FlowName\":\"科室自查\",\"Rank\":0,\"IsOpen\":false,\"IsComment\":false,\"Available\":false},{\"FlowId\":2,\"FlowName\":\"医院自评\",\"Rank\":0,\"IsOpen\":false,\"IsComment\":false,\"Available\":false},{\"FlowId\":3,\"FlowName\":\"专家预评\",\"Rank\":0,\"IsOpen\":false,\"IsComment\":false,\"Available\":false},{\"FlowId\":4,\"FlowName\":\"专家评审\",\"Rank\":0,\"IsOpen\":false,\"IsComment\":false,\"Available\":false}]},{\"Chapter\":\"1.1.4.1\",\"FlowList\":[{\"FlowId\":1,\"FlowName\":\"科室自查\",\"Rank\":0,\"IsOpen\":false,\"IsComment\":false,\"Available\":false},{\"FlowId\":2,\"FlowName\":\"医院自评\",\"Rank\":0,\"IsOpen\":false,\"IsComment\":false,\"Available\":false},{\"FlowId\":3,\"FlowName\":\"专家预评\",\"Rank\":0,\"IsOpen\":false,\"IsComment\":false,\"Available\":false},{\"FlowId\":4,\"FlowName\":\"专家评审\",\"Rank\":0,\"IsOpen\":false,\"IsComment\":false,\"Available\":false}]}]";
    }
    public function getone(){
        echo '
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>

</title><link href="../css/style.css" rel="stylesheet" type="text/css" /></head>
<body>
    <form name="t" method="post" action="AuditTips.aspx?Chapter=1.1.1.1&amp;FlowID=1&amp;_=1464351907679" id="t">
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKLTk1MjgzNzk3MmRkuCG2IyepBi3ew5slrOnjKvAPNEM=" />

<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="0510F0FF" />
        <p>
评审标准：1.1.1.1 &nbsp;&nbsp; 评审流程：科室自查 &nbsp;&nbsp;评审结果：A<br />
            =======================================================<br />
            ghhhhhhhhhhhhhhhhhhhhh
        </p>
    </form>
</body>
</html> ';
    }
}