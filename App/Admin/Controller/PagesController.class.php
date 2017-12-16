<?php
/**
* +----------------------------------------------------------------------
* 创建日期：2017年12月8日
* 最新修改时间：2017年12月8日
* +----------------------------------------------------------------------
* https：//github.com/ALNY-AC
* +----------------------------------------------------------------------
* 微信：AJS0314
* +----------------------------------------------------------------------
* QQ:1173197065
* +----------------------------------------------------------------------
* #####页面控制器#####
* @author 代码狮
*
*/
namespace Admin\Controller;
use Think\Controller;
class PagesController extends CommonController{
    
    //主
    public function index(){
        
        echo 1;
    }
    
    //主
    public function showList(){
        
        $this->display();
        
    }
    //设计页面
    public function studio($pages_id){
        
        $model=M('pages');
        $where=[];
        $where['pages_id']=$pages_id;
        $pages=$model->where($where)->find();
        $this->assign('pages',$pages);
        
        
        $this->display();
    }
    
}