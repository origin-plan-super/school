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
* #####科目控制器#####
* @author 代码狮
*
*/
namespace Admin\Controller;
use Think\Controller;
class ExamController extends CommonController{
    
    //主
    public function index(){
        echo 1;
    }
    
    
    /**
    * 管理科目课程
    */
    public function showList(){
        $get=I('get.');
        $exam_id=$get['exam_id'];
        
        
        $this->assign('exam_id',$exam_id);
        $model=M('exam');
        $where=[];
        $where['exam_id']=$exam_id;
        $exam=$model->where($where)->find();
        
        $this->assign('exam',$exam);
        
        
        //配置路径导航
        //先找到看看是总校还是分校
        
        $model=M('school');
        $where=[];
        $where['school_id']=$exam['school_id'];
        $school=$model->where($where)->find();
        $this->assign('school',$school);
        
        
        $this->display();
        
    }
    
    /**
    * 编辑课程信息
    */
    public function show(){
        
        $get=I('get.');
        $subject_id=$get['subject_id'];
        
        
        $this->assign('subject_id',$subject_id);
        $model=M('subject');
        $where=[];
        $where['subject_id']=$subject_id;
        $subject=$model->where($where)->find();
        $this->assign('subject',$subject);
        $this->display();
        
    }
    
    
    //空操作
    public function _empty(){
        
    }
    
}