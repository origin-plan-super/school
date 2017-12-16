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
class BookController extends CommonController{
    
    public function saveField(){
        
        if(IS_POST){
            
            $info = I('post.');
            $id = $info['id'];
            
            if(!empty($id)){
                
                $table =   strtolower($info['table']);
                $save = $info['save'];
                $save['edit_time'] = time();
                $save['book_list']=json_encode($save['book_list']);
                
                $model = M($table);
                $where[$table.'_id'] = $id;
                
                $result =   $model->where($where)->save($save);
                
                
                
                
                if($result!== false){
                    $res['res'] = 1;
                    $res['msg'] = $result;
                }else{
                    $res['res'] = -1;
                    $res['msg'] = $result.'【'.$id.'】【'.json_encode($save).'】【'.$table.'】';
                }
            }else{
                $res['res'] = -2;
                $res['msg'] = $table.'_id is null id:'.$id;
            }
            
        }else{
            $res['res'] = -2;
            $res['msg'] = 'is no post';
        }
        
        
        
        
        
        
        
        echo json_encode($res);
        
    }
    public function showList(){
        
        
        
        
        $this->display();
        
    }
    
    public function bookClass(){
        $this->display();
    }
    public function edit(){
        
        $book_id=I('get.book_id');
        
        $model=M('book');
        $where=[];
        $where['book_id']=$book_id;
        $book=$model->where($where)->find();
        
        $book['book_list']=json_decode($book['book_list'],true);
        $this->assign('book',$book);
        
        
        
        
        $model=M('book_class');
        $where=[];
        $book_class=$model->where($where)->select();
        
        $this->assign('book_class',$book_class);
        
        
        
        $this->display();
        
    }
    
    
}