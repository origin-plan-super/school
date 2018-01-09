<?php
/**
* +----------------------------------------------------------------------
* 创建日期：2017年11月28日
* +----------------------------------------------------------------------
* https：//github.com/ALNY-AC
* +----------------------------------------------------------------------
* 微信：AJS0314
* +----------------------------------------------------------------------
* QQ:1173197065
* +----------------------------------------------------------------------
* #####需要登录权限的继承本控制器#####
* @author 代码狮
*
*/
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    
    
    //ThinkPHP提供的构造方法
    public function _initialize() {
        
        
        //判断cookie的账户密码能用不
        $user_id= cookie('user_id');
        $user_pwd= cookie('user_pwd');
        
        $model=M('user');
        $where=[];
        $where['user_id']=$user_id;
        $user=$model->where($where)->find();
        
        if($user['user_pwd']===$user_pwd){
            //密码正确，就不重新登录了
            
            session('user_id',$user_id);
        }else{
            //密码不正确，清空一下缓存
            session(null);
        }
        
        if (empty(session('user_id'))) {
            $url=U('Login/login');
            echo "<script>top.location.href='$url'</script>";
            exit ;
        }
        
        $app_name = M('config')->getField('app_name');
        C('TMPL_PARSE_STRING.__APPNAME__',$app_name);
    }
    
    //空操作
    public function _empty(){
        $this->error('页面不存在！',U('Index/index'),3);
    }
    
}