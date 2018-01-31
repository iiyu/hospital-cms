<?php 

function check_code($code, $id = ""){  
    $verify = new \Think\Verify();  
    return $verify->check($code, $id);  
}
 function verify_c(){
    	$Verify = new \Think\Verify();
    	$Verify->entry();
 }
//数字转大写
function numToStr($int){
    $code = array('零', '一', '二', '三', '四', '五', '六', '七', '八', '九','十','十一','十二','十三','十四','十五');
    foreach ($code as $key => $value)
    {
        if ($int == $key)
        {
            return $code[$int];
        }
    }
}

//左边菜单栏输出
function outMenu($group,$tree){
    $html = '';
    foreach($tree as $t){
        if($t['group_id']==$group){
            if(empty($t['pid'])){
                $html .= '<li><a href="'.__APP__.'/'.$t['name'].'/index/" target="navTab" rel="'.$t['name'].'">'.$t['title'].'</a></li>';
            }else{
                $html .='<li><a>'.$t['title'].'</a><ul>';
                $html .=outMenu($group,$t['pid']);
                $html  = $html.'</ul></li>';
            }
        }
    }
    return $html;
}
/**
+----------------------------------------------------------
* 字符串截取，支持中文和其他编码
+----------------------------------------------------------
* @static
* @access public
+----------------------------------------------------------
* @param string $str 需要转换的字符串
* @param string $start 开始位置
* @param string $length 截取长度
* @param string $charset 编码格式
* @param string $suffix 截断显示字符
+----------------------------------------------------------
* @return string
+----------------------------------------------------------
*/
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)
{
    if(function_exists("mb_substr")){
   if($suffix){
    return mb_substr($str, $start, $length, $charset)."...";
   }else{
    return mb_substr($str, $start, $length, $charset);
    }
}
    elseif(function_exists('iconv_substr')) {
   if($suffix){
        return iconv_substr($str,$start,$length,$charset)."...";
   }else{
    return iconv_substr($str,$start,$length,$charset);
    }
    }
    $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
    $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
    $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
    $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
    preg_match_all($re[$charset], $str, $match);
    $slice = join("",array_slice($match[0], $start, $length));
    if($suffix){ 
     return $slice."...";
}else{
   return $slice;
   }

}
 ?>
