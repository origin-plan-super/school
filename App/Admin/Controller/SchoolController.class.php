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
* #####学校控制器#####
* @author 代码狮
*
*/
namespace Admin\Controller;
use Think\Controller;
class SchoolController extends CommonController{
    
    //主
    public function index(){
        echo 1;
    }
    
    /**
    * 管理科目
    */
    public function showList(){
        
        $get=I('get.');
        $school_id=$get['school_id'];
        $this->assign('school_id',$school_id);
        
        
        $model=M('school');
        $where=[];
        $where['school_id']=$school_id;
        $school=$model->where($where)->find();
        $this->assign('school',$school);
        
        
        $this->display();
        
    }
    
    /**
    * 分校管理
    */
    public function branch(){
        $this->display();
    }
    
    
    
    //空操作
    public function _empty(){
        
    }
    
}