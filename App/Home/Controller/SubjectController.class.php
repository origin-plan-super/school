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
* #####课程控制器#####
* @author 代码狮
*
*/
namespace Home\Controller;
use Think\Controller;
class SubjectController extends CommonController{
    
    /**
    * 显示课程信息
    */
    public function subject(){
        
        $subject_id=I('get.subject_id');
        
        
        //取相关科目的课程列表
        $model=M('subject');
        $where=[];
        $where['subject_id']=$subject_id;
        $subject=$model->where($where)->find();
        
        $this->assign('subject',$subject);
        if(I('type')){
            $this->assign('type',I('type'));
        }
        
        
        $this->display();
        
        
    }
    
    
    /**
    * 报名
    */
    public function enlist($subject_id){
        
        if(IS_POST){
            
            
            
            if(!isRepeat()){
                //重复提交
                $url=U('Index/index');
                echo "<script>top.location.href='$url'</script>";
                exit;
            }
            
            
            if(I('post.type')==3){
                
                $add=I('post.');
                unset($add['type']);
                
                
                //=========添加数据=========
                $model=M('firm');
                //=========添加数据区
                $add['firm_id']= date('YmdHis').rand(10000,99999);   //生成订单号（预约号）
                $add['add_time']=time();
                $add['edit_time']=time();
                //=========sql区
                $result=$model->add($add);
                if($result){
                    $this->success('报名成功！',U('build/build','type=3'),2);
                }
                
            }else{
                
                //=========添加数据=========
                $model=M('order');
                //=========添加数据区
                $add=I('post.');
                $add['order_id']= date('YmdHis').rand(10000,99999);   //生成订单号（报名号）
                $add['add_time']=time();//添加时间
                $add['edit_time']=time();//修改时间
                //=========sql区
                $result=$model->add($add);
                
                if($result){
                    $this->success('报名成功！',U('Subject/subject','subject_id='.$add['subject_id']),2);
                }
                
                
            }
            
            
            
        }else{
            
            
            $_repeat_code=  setRepeat();
            $this->assign('_repeat_code',$_repeat_code);
            
            $this->display();
        }
    }
    
}