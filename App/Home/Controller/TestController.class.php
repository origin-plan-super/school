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
 * #####电子书控制器#####
 * @author 代码狮
 *
 */

namespace Home\Controller;

use Think\Controller;

class TestController extends CommonController
{

    public function test()
    {


        // $Order = D('Order');
        // $where = [];
        // $where['user_name'] = ['exp', 'is null'];
        // $user_id = $Order->where($where)->getField('user_id', true);

        // $User = D('User');
        // $where = [];
        // $where['user_id'] = ['in', $user_id];
        // $result = $User->where($where)->field('user_id,user_name')->select();

        // foreach ($result as $k => $v) {
        //     $where = [];
        //     $where['user_id'] = $v['user_id'];
        //     $save = [];
        //     $save['user_name'] = $v['user_name'];
        //     dump($where);
        //     dump($save);
        //     // $result = $Order->where($where)->save($save);
        //     // dump($result);
        // }

        // dump($result);

        die;
        // // dump(strtotime('-2 days'));
        // // die;
        // $Order = D('Order');
        // $time = strtotime('-5 days');
        // $where = [];
        // $where['add_time'] = ['lt', $time];
        // $where['is'] = 0;

        // $result = $Order->where($where)->select();
        // $result = toTime($result);

        // dump($result);
        // // $this->display();
    }

    public function send()
    {
        dump(I('get.code'));
        send_sms('17621643903', I('get.code'));
    }
}
