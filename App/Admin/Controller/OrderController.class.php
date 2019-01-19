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

class OrderController extends CommonController
{



    /**
     * 获得
     */
    public function getList()
    {


        $get = I('get.');
        $subect_id = $get['subect_id'];
        $table = strtolower($get['table']);
        //创建模型
        $model = M($table);
        /**
         * 先从科目表找到用户输入的科目标题，然后 将id当做条件 筛选
         */

        
        //定制分页-start
        $page = $get['page'];
        $limit = $get['limit'];

        // $page = ($page - 1) * $limit;
        //定制分页-end

        $where = $get['where'] ? $get['where'] : [];


        $order = $get['order'] ? $get['order'] : 'add_time desc';

        if (!empty($get['key'])) {

            $key = $get['key'];

            $where = [];
            if ($subect_id) {
                $where['t2.subject_id'] = ['in', $subect_id];
            }

            $where['t1.user_name'] = array(
                'like',
                "%" . trim($key) . "%",
                'OR'
            );

            $result = $model
                ->table('s_order as t1,s_subject as t2,s_exam as t3,s_school as t4')
                ->field('t1.*,t2.*,t3.*,t4.*')
                ->where("t1.subject_id = t2.subject_id AND t2.exam_id =  t3.exam_id AND t3.school_id = t4.school_id AND t4.school_id = " . $get['school_id'])
                ->where($where)
                ->order('t1.add_time desc')
                ->limit(($page - 1) * $limit, $limit)
                ->select();

            $count = $model
                ->table('s_order as t1,s_subject as t2,s_exam as t3,s_school as t4')
                ->field('t1.*,t2.*,t3.*,t4.*')
                ->where("t1.subject_id = t2.subject_id AND t2.exam_id =  t3.exam_id AND t3.school_id = t4.school_id AND t4.school_id = " . $get['school_id'])
                ->where($where)
                ->order('t1.add_time desc')
                ->count() + 0;

            if ($result) {
                $res['res'] = $count;
                $res['count'] = $count;
                $res['code'] = 1;
                $res['data'] = $result;
                $res['msg'] = $result;
            } else {
                $res['code'] = -1;
                $res['msg'] = '没有数据！';
            }
            echo json_encode($res);
            die;




        } else {
            
            
            // $result= $model->limit("$page,$limit")->order($order)->where($where)->select();
            // $res['sql']=$model->_sql();
            $where = [];
            if ($subect_id) {
                $where['t2.subject_id'] = ['in', $subect_id];
            }

            $result = $model
                ->table('s_order as t1,s_subject as t2,s_exam as t3,s_school as t4')
                ->field('t1.*,t2.*,t3.*,t4.*')
                ->where("t1.subject_id = t2.subject_id AND t2.exam_id =  t3.exam_id AND t3.school_id = t4.school_id AND t4.school_id = " . $get['school_id'])
                ->where($where)
                ->order('t1.add_time desc')
                ->limit(($page - 1) * $limit, $limit)
                ->select();

            $count = $model
                ->table('s_order as t1,s_subject as t2,s_exam as t3,s_school as t4')
                ->field('t1.*,t2.*,t3.*,t4.*')
                ->where("t1.subject_id = t2.subject_id AND t2.exam_id =  t3.exam_id AND t3.school_id = t4.school_id AND t4.school_id = " . $get['school_id'])
                ->where($where)
                ->order('t1.add_time desc')
                ->count() + 0;

            if ($result) {
                $res['res'] = $count;
                $res['count'] = $count;
                $res['code'] = 1;
                $res['data'] = $result;
                $res['msg'] = $result;
            } else {
                $res['code'] = -1;
                $res['msg'] = '没有数据！';
            }
            echo json_encode($res);
            die;
         
            // $count= $model->order($order)->where($where)->count();
            // $res['count']=$count;
        }
    
        //转换时间戳
        $result = toTime($result);


        $Subject = D('Subject');

        $arr = $Subject->where($where)->select();
      
        
        //找到课程信息
        $subject = M('subject');
        $exam = M('exam');
        $school = M('school');

        foreach ($result as $key => $value) {


            $where = [];
            $where['subject_id'] = $value['subject_id'];
            $subject_info = $subject->where($where)->find();
            if ($subject_info) {
                $result[$key] = array_merge($result[$key], $subject_info);
            }
            
            //找exam
            $where = [];
            $where['exam_id'] = $subject_info['exam_id'];
            $exam_info = $exam->where($where)->find();
            if ($exam_info) {
                $result[$key] = array_merge($result[$key], $exam_info);
            }
            
            //找school
            $where = [];
            $where['school_id'] = $exam_info['school_id'];
            $school_info = $school->where($where)->find();
            if ($school_info) {
                $result[$key] = array_merge($result[$key], $school_info);
            }

        }
        
        //筛选学校

        $school_id = I('school_id');
        $arr = [];
        foreach ($result as $key => $value) {

            if ($value['school_id'] == $school_id) {
                $arr[] = $value;
            }

        }

        $res['count'] = count($arr);
        //取区间
        $arr = array_slice($arr, $page, $limit);

        if ($arr) {
            $res['res'] = $res['count'];
            $res['code'] = 1;
            $res['data'] = $arr;
            $res['msg'] = $arr;
        } else {
            $res['code'] = -1;
            $res['msg'] = '没有数据！';
        }
        echo json_encode($res);


    }


    public function showList()
    {

        $school_id = I('school_id');


        $model = M('school');
        $where = [];
        $where['school_id'] = $school_id;
        $school = $model->where($where)->find();

        $this->assign('school', $school);
        $this->display();

    }

    public function printXLS()
    {


        if (IS_POST) {

            $list = I('post.list');

            F('order.list', $list);

            $res['res'] = $order;
            $res['msg'] = U();
            
            
            //=========输出json=========
            echo json_encode($res);
            //=========输出json=========

        } else {

            $list = F('order.list');


            $model = M('order');
            $where = [];
            if (!I('get.is_all')) {
                $where['order_id'] = ['in', $list];
            }
            $order = $model->where($where)->select();
            
            
            
            //找到课程信息
            $subject = M('subject');
            $exam = M('exam');
            $school = M('school');

            foreach ($order as $key => $value) {

                $where = [];
                $where['subject_id'] = $value['subject_id'];

                $subject_info = $subject->where($where)->find();
                
                //找exam
                $where = [];
                $where['exam_id'] = $subject_info['exam_id'];
                $exam_info = $exam->where($where)->find();
                
                
                //找school
                $where = [];
                $where['school_id'] = $exam_info['school_id'];
                $school_info = $school->where($where)->find();

                unset($exam_info['add_time']);
                unset($subject_info['add_time']);
                unset($school_info['add_time']);

                $order[$key] = array_merge($order[$key], $subject_info, $exam_info, $school_info);

            }
            
            
            //转换时间戳
            $order = toTime($order);


            $this->assign('order', $order);

            $file_name = '【' . __APPNAME__ . '】报名列表' . date('Y-m-d H:i:s');
            $this->assign('file_name', $file_name);

            $this->display('print');

        }


    }

}