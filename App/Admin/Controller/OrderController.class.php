<?php
/**
* +----------------------------------------------------------------------
* 创建日期：2017年11月28日
* 最新修改时间：2017年11月28日
* +----------------------------------------------------------------------
* https：//github.com/ALNY-AC
* +----------------------------------------------------------------------
* 微信：AJS0314
* +----------------------------------------------------------------------
* QQ:1173197065
* +----------------------------------------------------------------------
* #####品牌控制器#####
* @author 代码狮
*
*/
namespace Admin\Controller;
use Think\Controller;
class OrderController extends CommonController{
    
    
    
    /**
    * 获得
    */
    public function getList(){
        
        
        $get = I('get.');
        $table = strtolower($get['table']);
        //创建模型
        $model = M($table);
        
        //定制分页-start
        $page=$get['page'];
        $limit=$get['limit'];
        
        $page=($page-1)* $limit;
        //定制分页-end
        
        $where=$get['where']?$get['where']:[];
        $order=$get['order']?$get['order']:'add_time desc';
        
        if(!empty($get['key'])){
            
            $key=$get['key'];
            
            $key_where= $get['key_where'] ? $get['key_where']: $table.'_id';
            
            $where[$key_where] = array(
            'like',
            "%".$key."%",
            'OR'
            );
            
            // $result= $model->limit("$page,$limit")->order($order)->where($where)->select();
            $result= $model->order($order)->where($where)->select();
            // $res['sql']=$model->_sql();
            // $res['count']=$model->where($where)->count();
            
            
        }else{
            
            
            // $result= $model->limit("$page,$limit")->order($order)->where($where)->select();
            // $res['sql']=$model->_sql();
            
            $result= $model->order($order)->where($where)->select();
            
            // $count= $model->order($order)->where($where)->count();
            // $res['count']=$count;
        }
        
        //转换时间戳
        $result=   toTime($result);
        
        
        //找到课程信息
        $subject=M('subject');
        $exam=M('exam');
        $school=M('school');
        
        foreach ($result as $key => $value) {
            
            
            $where=[];
            $where['subject_id']=$value['subject_id'];
            $subject_info = $subject->where($where)->find();
            if($subject_info){
                $result[$key] = array_merge($result[$key],$subject_info);
            }
            
            //找exam
            $where=[];
            $where['exam_id']=$subject_info['exam_id'];
            $exam_info = $exam->where($where)->find();
            if($exam_info){
                $result[$key] = array_merge($result[$key],$exam_info);
            }
            
            //找school
            $where=[];
            $where['school_id']=$exam_info['school_id'];
            $school_info = $school->where($where)->find();
            if($school_info){
                $result[$key] = array_merge($result[$key],$school_info);
            }
            
        }
        
        //筛选学校
        
        $school_id=I('school_id');
        $arr=[];
        foreach ($result as $key => $value) {
            
            if($value['school_id']==$school_id){
                $arr[] = $value;
            }
            
        }
        $res['count']=count($arr);
        //取区间
        $arr=array_slice($arr ,$page,$limit);
        
        if($arr){
            $res['res']=$res['count'];
            $res['code']=1;
            $res['data']= $arr;
            $res['msg']= $arr;
        }else{
            $res['code']=-1;
            $res['msg']='没有数据！';
        }
        echo json_encode($res);
        
        
    }
    
    
    public function showList(){
        
        $school_id=  I('school_id');
        
        
        $model=M('school');
        $where=[];
        $where['school_id']=$school_id;
        $school=$model->where($where)->find();
        
        $this->assign('school',$school);
        
        
        $this->display();
    }
    
    public function printXLS(){
        
        
        if(IS_POST){
            
            $list=I('post.list');
            
            F('order.list',$list);
            
            $res['res']=$order;
            $res['msg']=U();
            
            
            //=========输出json=========
            echo json_encode($res);
            //=========输出json=========
            
        }else{
            
            $list=   F('order.list');
            
            
            $model=M('order');
            $where=[];
            if(!I('get.is_all')){
                $where['order_id']=['in',$list];
            }
            $order=$model->where($where)->select();
            
            
            
            //找到课程信息
            $subject=M('subject');
            $exam=M('exam');
            $school=M('school');
            
            foreach ($order as $key => $value) {
                
                $where=[];
                $where['subject_id']=$value['subject_id'];
                
                $subject_info = $subject->where($where)->find();
                
                //找exam
                $where=[];
                $where['exam_id']=$subject_info['exam_id'];
                $exam_info = $exam->where($where)->find();
                
                
                //找school
                $where=[];
                $where['school_id']=$exam_info['school_id'];
                $school_info = $school->where($where)->find();
                
                unset($exam_info['add_time']);
                unset($subject_info['add_time']);
                unset($school_info['add_time']);
                
                $order[$key] = array_merge($order[$key],$subject_info,$exam_info,$school_info);
                
            }
            
            
            //转换时间戳
            $order=   toTime($order);
            
            
            $this->assign('order',$order);
            
            $file_name='【'.__APPNAME__.'】报名列表'. date('Y-m-d H:i:s');
            $this->assign('file_name',$file_name);
            
            $this->display('print');
            
        }
        
        
    }
    
}