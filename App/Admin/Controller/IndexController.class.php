<?php
/**
* +----------------------------------------------------------------------
* 创建日期：2017年11月17日
* +----------------------------------------------------------------------
* https：//github.com/ALNY-AC
* +----------------------------------------------------------------------
* 微信：AJS0314
* +----------------------------------------------------------------------
* QQ:1173197065
* +----------------------------------------------------------------------
* #####主页控制器#####
* @author 代码狮
*
*/
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index() {
        
        
        
        $model=M('pages');
        $InfoPages=$model->select();
        
        
        $this->assign('pages1',$InfoPages[0]['pages_title']);
        $this->assign('pages2',$InfoPages[1]['pages_title']);
        $this->assign('pages3',$InfoPages[2]['pages_title']);
        
        
        
        $this -> display();
        
    }
    public function home(){
        $this -> display();
    }
    
}