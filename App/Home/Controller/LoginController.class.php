<?php
/**
* +----------------------------------------------------------------------
* 创建日期：2017年12月14日
* 最新修改时间：2017年12月14日
* +----------------------------------------------------------------------
* https：//github.com/ALNY-AC
* +----------------------------------------------------------------------
* 微信：AJS0314
* +----------------------------------------------------------------------
* QQ:1173197065
* +----------------------------------------------------------------------
* #####文章控制器#####
* @author 代码狮
*
*/
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{
    
    //ThinkPHP提供的构造方法
    public function _initialize() {
        
        $app_name = M('config')->getField('app_name');
        C('TMPL_PARSE_STRING.__APPNAME__',$app_name);
    }
    
    //主
    public function login(){
        
        
        if(IS_POST){
            
            $post=I('post.');
            
            $user_pwd=$post['user_pwd'];
            $user_id=$post['user_id'];
            
            $model=M('user');
            $where=[];
            $where['user_id']=$user_id;
            $user=$model->where($where)->find();
            
            if($user['user_pwd']===$user_pwd){
                //登录成功
                session('user_id',$user_id);
                $url=U('Index/index');
                $res['res']=1;
                $res['msg']=$url;
                
            }else{
                //登录失败
                $res['res']=-1;
            }
            
            //=========输出json=========
            echo json_encode($res);
            //=========输出json=========
        }else{
            $this->display();
        }
        
        
        
    }
    //注册
    public function reg(){
        
        if(IS_POST){
            
            $post=I('post.');
            
            $model=M('user');
            $where['user_phone']=$post['user_phone'];
            $result=$model->where($where)->find();
            
            if(!$result){
                //不存在
                
                //=========添加数据区
                $add=[];
                $add['user_id']=$post['user_phone'];
                $add['user_phone']=$post['user_phone'];
                $add['user_name']=$post['user_name'];
                $add['user_pwd']=$post['user_pwd'];
                $add['add_time']=time();
                $add['edit_time']=time();
                //=========sql区
                $result=$model->add($add);
                //=========判断=========
                if($result){
                    //成功
                    $url=U('Login/login');
                    $res['res']=1;
                    $res['msg']=$url;
                }else{
                    //失败
                    $res['res']=-1;
                }
                //=========判断end=========
                
            }else{
                //存在
                $res['res']=0;
            }
            //=========输出json=========
            echo json_encode($res);
            //=========输出json=========
        }else{
            $this->display();
        }
        
    }
}