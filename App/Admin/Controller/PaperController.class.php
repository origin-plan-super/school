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
* #####发布文章控制器#####
* @author 代码狮
*
*/
namespace Admin\Controller;
use Think\Controller;
class PaperController extends CommonController{
    
    
    //发布
    public function add(){
        
        
        if(!empty(I('get.paper_id'))){
            $model=M('paper');
            $where=[];
            $where['paper_id']=I('get.paper_id');
            $paper=$model->where($where)->find();
            $this->assign('paper',$paper);
        }
        $this->display();
        
    }
    
    //编辑
    public function edit(){
        
        
        if(!empty(I('get.paper_id'))){
            $model=M('paper');
            $where=[];
            $where['paper_id']=I('get.paper_id');
            $paper=$model->where($where)->find();
            $this->assign('paper',$paper);
            $this->display();
        }else{
            $this->error('没有找不到文章！');
        }
        
    }
    
    
    
    
    //显示列表
    public function showList(){
        $this->display();
        
    }
    
    
}