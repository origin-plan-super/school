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
    
    
    /**
    * 带条件的查询
    */
    public function getListWhere(){
        
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
            
            
            $result= $model->limit("$page,$limit")->order($order)->where($where)->select();
            $res['sql']=$model->_sql();
            
            
            $res['count']=$model->where($where)->count();
        }else{
            
            $count= $model->order($order)->where($where)->count();
            $res['count']=$count;
            $result= $model->limit("$page,$limit")->order($order)->where($where)->select();
            $res['sql']=$model->_sql();
            
        }
        
        
        //转换时间戳
        $result=   toTime($result);
        //统计数量
        $model=M('order');
        foreach ($result as $key => $value) {
            $subject_id=$value['subject_id'];
            $num=$value['num'];
            $where=[];
            $where['subject_id']=$subject_id;
            $count = $model->where($where)->count();
            $sub=$num-$count;
            if($sub<=0){
                $sub="<span class='layui-badge'>已满员</span>";
            }
            $result[$key]['sub']=$sub;
        }
        
        
        
        if(!IS_AJAX){
            dump($result);
            die;
        }
        if($result){
            $res['res']=$res['count'];
            $res['code']=1;
            $res['data']= $result;
            $res['msg']= $result;
        }else{
            $res['code']=-1;
            $res['msg']='没有数据！';
        }
        
        echo json_encode($res);
        
        
    }
}