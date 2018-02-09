<?php
/**
* +----------------------------------------------------------------------
* 创建日期：2017年11月17日
* +----------------------------------------------------------------------
* https：//github.com/ALNY-AC
* +----------------------------------------------------------------------
* 微信：AJS0314
* +----------------------------------------------------------------------
* QQ:1173197065
* +----------------------------------------------------------------------
* #####主页控制器#####
* @author 代码狮
*
*/
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index() {
        
        //取总校的科目
        $model=M('exam');
        $where=[];
        $where['school_id']=1;
        $master=$model->where($where)->order('sort desc')->select();
        
        
        //取分校科目
        $model=M('exam');
        $where=[];
        $where['school_id']=2;
        $branch=$model->where($where)->order('sort desc')->select();
        
        
        
        $this->assign('master',$master);
        $this->assign('branch',$branch);
        
        
        $this -> display();
    }
    
    
}