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
 * #####科目列表控制器#####
 * @author 代码狮
 *
 */
namespace Home\Controller;

use Think\Controller;

class ExamController extends CommonController
{

    /**
     * 显示科目列表
     */
    public function exam()
    {

        $exam_id = I('get.exam_id');

        //取科目的信息
        $model = M('exam');
        $where = [];
        $where['exam_id'] = $exam_id;
        $exam = $model->where($where)->find();


        //取相关科目的课程列表
        $model = M('subject');
        $where = [];
        $where['exam_id'] = $exam_id;
        $where['is_show'] = 1;
        $subject = $model->where($where)->select();

        $this->assign('subject', $subject);
        $this->assign('exam', $exam);

        if (I('type')) {
            $this->assign('type', I('type'));
        }



        $this->display();
    }
}
