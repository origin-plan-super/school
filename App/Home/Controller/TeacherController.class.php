<?php
/**
* +----------------------------------------------------------------------
* 创建日期：2017年12月16日
* 最新修改时间：2017年12月16日
* +----------------------------------------------------------------------
* https：//github.com/ALNY-AC
* +----------------------------------------------------------------------
* 微信：AJS0314
* +----------------------------------------------------------------------
* QQ:1173197065
* +----------------------------------------------------------------------
* #####师资管理控制器#####
* @author 代码狮
*
*/
namespace Home\Controller;
use Think\Controller;
class TeacherController extends CommonController{
    
    
    //显示老师信息
    public function show(){
        
        $teacher_id=I('teacher_id');
        
        $model=M('teacher');
        $where=[];
        $where['teacher_id']=$teacher_id;
        $teacher=$model->where($where)->find();
        
        $this->assign('teacher',$teacher);
        
        
        $this->display();
    }
    
    
}