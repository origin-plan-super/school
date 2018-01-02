<?php
/**
* +----------------------------------------------------------------------
* 创建日期：2017年12月14日
* 最新修改时间：2017年12月14日
* +----------------------------------------------------------------------
* https：//github.com/ALNY-AC
* +----------------------------------------------------------------------
* 微信：AJS0314
* +----------------------------------------------------------------------
* QQ:1173197065
* +----------------------------------------------------------------------
* #####文章控制器#####
* @author 代码狮
*
*/
namespace Home\Controller;
use Think\Controller;
class PaperController extends CommonController{
    
    
    //主
    public function originality(){
        
        $model=M('paper');
        $where=[];
        $where['pages_title']='独具匠心';
        $paper=$model->where($where)->select();
        $this->assign('paper',$paper);
        $this->display();
        
        
    }
    
    public function panel(){
        
        $model=M('paper');
        $where=[];
        $where['pages_title']='虹桥面塑';
        
        
        //课程简介
        
        $where['class_title']='课程简介';
        $paper[0]=$model->where($where)->select();
        
        //教材
        
        
        $where['class_title']='教材';
        $paper[1]=$model->where($where)->select();
        
        
        //作品展示
        
        $where['class_title']='作品展示';
        $paper[2]=$model->where($where)->select();
        
        
        $this->assign('paper',$paper);
        
        $this->display();
        
    }
    
    public function tradition(){
        
        
        $model=M('paper');
        $where=[];
        $where['pages_title']='传统礼仪';
        
        
        //课程内容
        $where['class_title']='课程内容';
        $paper[0]=$model->where($where)->select();
        
        
        //教材
        $where['class_title']='教材';
        $paper[1]=$model->where($where)->select();
        
        
        //安排
        $where['class_title']='安排';
        $paper[2]=$model->where($where)->select();
        
        
        //视频
        $where['class_title']='视频';
        $paper[3]=$model->where($where)->select();
        
        $this->assign('paper',$paper);
        
        $this->display();
        
    }
    
    public function show(){
        
        $paper_id=I('get.paper_id');
        $model=M('paper');
        $where=[];
        $where['paper_id']=$paper_id;
        $paper=$model->where($where)->find();
        
        $this->assign('paper',$paper);
        
        $this->display();
    }
    //空操作
    public function _empty(){
        
    }
    
}