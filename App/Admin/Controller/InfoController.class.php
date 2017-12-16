<?php
/**
* +----------------------------------------------------------------------
* 创建日期：2017年12月12日
* 最新修改时间：2017年12月12日
* +----------------------------------------------------------------------
* https：//github.com/ALNY-AC
* +----------------------------------------------------------------------
* 微信：AJS0314
* +----------------------------------------------------------------------
* QQ:1173197065
* +----------------------------------------------------------------------
* #####图文详情控制器#####
* @author 代码狮
*
*/

namespace Admin\Controller;
use Think\Controller;
class InfoController extends CommonController{
    
    
    function showList($pages_id){
        
        $model=M('info_pages');
        $where=[];
        $where['info_pages_id']=$pages_id;
        $pages=$model->where($where)->find();
        
        $this->assign('pages',$pages);
        
        $this->display();
    }
    
    
}