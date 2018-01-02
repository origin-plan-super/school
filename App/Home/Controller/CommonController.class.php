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
        // session('user_id','13914896237');
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