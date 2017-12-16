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
* #####楼宇控制器#####
* @author 代码狮
*
*/

namespace Home\Controller;
use Think\Controller;
class BuildController extends CommonController {
    public function build() {
        
        //取总校的科目
        $model=M('exam');
        $where=[];
        $where['school_id']=3;
        $exam=$model->where($where)->select();
        $this->assign('exam',$exam);
        
        
        $model=M('teacher');
        $teacher=$model->select();
        $this->assign('teacher',$teacher);
        
        
        $this -> display();
    }
    
    
}