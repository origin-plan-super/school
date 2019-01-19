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
namespace Admin\Controller;

use Think\Controller;

class SubjectController extends CommonController
{


    public function getList()
    {


        $school_id = I('school_id', 1);
        $Subject = D();

        $list = $Subject
            ->table('s_subject as t1,s_exam as t2')
            ->field('t1.*,t2.exam_id,t2.exam_title,t2.school_id')
            ->where('t1.exam_id = t2.exam_id AND t2.school_id=' . $school_id)
            ->group('t1.subject_id')
            ->select();


        array_multisort(array_column($list, 'exam_title'), SORT_DESC, $list);



        $res = [];
        $res['result'] = $list;

        echo json_encode($res);


    }


}