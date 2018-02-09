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
class BookController extends CommonController{
    
    
    public function showList(){
        
        
        //获得分类
        
        $model=M('book_class');
        $where=[];
        $book_class=$model->where($where)->select();
        
        $this->assign('book_class',$book_class);
        
        
        $where=[];
        
        
        //搜索
        if(!empty(I('get.key') )){
            $key=I('get.key');
            
            $key =  preg_replace('/\s(?=\S)/','%',$key);
            
            $key =  explode('%',$key);
            
            $where['book_title'] = array(
            'like',
            $key,
            'OR'
            );
            
        }
        
        /**
        *
        * 1:pdf
        * 2:音频
        * 3:视频
        *
        */
        $where['book_type']=I('get.type');
        
        switch (I('get.type')) {
            case 1:
                $this->assign('title','看书坊');
                break;
            case 2:
                $this->assign('title','听书吧');
                break;
            case 3:
                $this->assign('title','微课堂');
                break;
            default:
                break ;
                
        }
        
        
        $model=M('book');
        $where['book_class_id']=$book_class[0]['book_class_id'];
        $book[0]=$model->where($where)->order('sort desc')->select();
        
        $where['book_class_id']=$book_class[1]['book_class_id'];
        $book[1]=$model->where($where)->order('sort desc')->select();
        
        $where['book_class_id']=$book_class[2]['book_class_id'];
        $book[2]=$model->where($where)->order('sort desc')->select();
        
        
        $this->assign('book',$book);
        
        $this->display();
    }
    
    public function ebook(){
        
        
        $book_id=I('get.book_id');
        
        $model=M('book');
        $where=[];
        $where['book_id']=$book_id;
        $book=$model->where($where)->find();
        
        $book['book_list']=json_decode($book['book_list'],true);
        $this->assign('book',$book);
        
        $this->display();
    }
    public function pdf(){
        
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
        
        
        
        $this->display();
        
    }
    
    
}