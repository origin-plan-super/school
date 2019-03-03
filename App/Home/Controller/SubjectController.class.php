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

class SubjectController extends CommonController
{


    public function getList()
    {
        echo 1;
    }

    /**
     * 显示课程信息
     */
    public function subject()
    {

        $subject_id = I('get.subject_id');


        //取相关科目的课程列表
        $model = M('subject');
        $where = [];
        $where['subject_id'] = $subject_id;
        $subject = $model->where($where)->find();

        $this->assign('subject', $subject);
        if (I('type')) {
            $this->assign('type', I('type'));
        }

        //人数判断
        $sub = updatePeople($subject_id);
        $isbm = $sub > 0;
        $this->assign('isbm', $isbm);

        //人数判断end

        //当前用户是否已经报名判断

        // $model = M('order');
        // $where = [];
        // $where['user_id'] = $user_id;
        // $where['subject_id'] = $subject_id;
        // $use = $model->where($where)->find();
        //未报名就是true，已报名就是false

        // 判断修改为，不能报名同样的类目 
        /**
         * 之前判断是：这个用户和当前课程进行匹配，找到数据就是已经报名
         * 现在改成：这个用户和当前课程的分类进行匹配，如果找到数据就是已报名
         */

        $use = $this->getIsBm($subject_id);

        if (!$use) {
            //未报名
            $this->assign('use', true);
        } else {
            //已报名
            $this->assign('use', false);
        }


        $this->display();
    }

    /**
     * 获取用户是否在相同类目 下报过名
     */
    private function getIsBm($subject_id)
    {
        $user_id = session('user_id');
        $Subject = D('Subject');
        $where = [];
        $where['subject_id'] = $subject_id;
        $exam_id = $Subject->where($where)->getField('exam_id');
        $where = [];
        $where['exam_id'] = $exam_id;
        $subjectList = $Subject->where($where)->getField('subject_id', true);
        $Order = D('Order');
        $where = [];
        $where['subject_id'] = ['in', $subjectList];
        $where['user_id'] = $user_id;
        $res = $Order->where($where)->select();
        return $res;
    }

    /**
     * 报名
     */
    public function enlist($subject_id)
    {

        //已报名判断;

        //当前用户是否已经报名判断
        $user_id = session('user_id');
        $model = M('order');
        $where = [];
        $where['user_id'] = $user_id;
        $where['subject_id'] = $subject_id;
        $use = $model->where($where)->find();


        // ===============


        //满员判断
        $model = M('subject');
        $where = [];
        $where['subject_id'] = $subject_id;
        $subject = $model->where($where)->find();



        if (IS_POST) {
            //未报名就是true，已报名就是false
            $is = ($use === null);
            if ($is) {
                //还未报名

            } else {

                //已报名
                $url = U('subject/subject', 'subject_id=' . $subject_id);
                $res['res'] = -3;
                $res['url'] = $url;
                echo json_encode($res);
                die;
            }


            if ($subject['sub'] <= 0) {
                //满员
                $url = U('subject/subject', 'subject_id=' . $subject_id);


                $res['res'] = -2;
                $res['url'] = $url;
                //=========判断end=========

                //=========输出json=========
                echo json_encode($res);
                //=========输出json=========

                die;
            }

            if (!isRepeat()) {
                //重复提交
                $url = U('Index/index');

                $res['res'] = -1;
                $res['url'] = $url;
                //=========判断end=========

                //=========输出json=========
                echo json_encode($res);
                //=========输出json=========

                exit;
            }



            if (I('post.type') == 3) {
                //企业
                $add = I('post.');
                unset($add['type']);


                //=========添加数据=========
                $model = M('firm');
                //=========添加数据区
                $add['firm_id'] = date('YmdHis') . rand(10000, 99999);   //生成订单号（预约号）
                $add['add_time'] = time();
                $add['edit_time'] = time();
                //=========sql区
                $result = $model->add($add);
                if ($result) {
                    $this->success('报名成功！', U('build/build', 'type=3'), 2);
                }
            } else {
                //学生
                //=========添加数据=========
                $model = M('order');
                //=========添加数据区
                $add = I('post.');
                $add['order_id'] = date('YmdHis') . rand(10000, 99999);   //生成订单号（报名号）
                $add['add_time'] = time(); //添加时间
                $add['edit_time'] = time(); //修改时间
                //=========sql区
                $result = $model->add($add);

                if ($result) {
                    //成功后需要修改剩余人数
                    $model = M('subject');
                    $where = [];
                    $where['subject_id'] = $subject_id;
                    $model->where($where)->setDec('sub'); // 剩余人数-1

                    //=========判断=========
                    $res['res'] = 1;
                    $res['url'] = U('Subject/subject', 'subject_id=' . $add['subject_id']);
                    //=========判断end=========

                    //=========输出json=========
                    echo json_encode($res);
                    //=========输出json=========
                }
            }
        } else {


            //未报名就是true，已报名就是false
            $is = ($use === null);
            if ($is) {
                //还未报名

            } else {
                //已报名
                $url = U('subject/subject', 'subject_id=' . $subject_id);
                echo "<script>top.location.href='$url'</script>";
                die;
            }



            if ($subject['sub'] <= 0) {
                //满员
                $url = U('subject/subject', 'subject_id=' . $subject_id);
                echo "<script>top.location.href='$url'</script>";
                die;
            }
            $_repeat_code = setRepeat();
            $this->assign('_repeat_code', $_repeat_code);
            $this->display();
        }
    }
}
