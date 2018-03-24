<?php
namespace app\index\controller;
use app\index\common\Base;
use think\Db;   // 引用数据库操作类

class Bases extends Base
{
 /**
 *
 *	商品首页
 */
	   public function index()
    {
	
			 //1.获取数据-商品
		$bases =Db::table('bases')->where('class2',40)->select();
		$bases1 =Db::table('bases')->where('class2',41)->select();
		$bases2 =Db::table('bases')->where('class2',49)->select();
			$bases3 =Db::table('bases')->where('class2',50)->select();
	
		    //2.模板赋值
       
		$this -> view -> assign('bases', $bases);
		$this -> view -> assign('bases1', $bases1);
		$this -> view -> assign('bases2', $bases2);
			$this -> view -> assign('bases3', $bases3);
		$this -> test();
		   	//3.模板渲染
        return $this->view->fetch('bases');
    }
	
/**
 *
 *	商品内页
 */
	  public function show($id)
    {
		    //1.获取数据
		$show =Db::table('category')->where('id',$id)->find();
	
		$basesshow =Db::table('bases')->where('class2',$id)->select();
		    //2.模板赋值
		$this -> view -> assign('basesshow', $basesshow);
        $this -> view -> assign('show', $show);
		$this -> test();
		   	//3.模板渲染
        return $this->view->fetch('show');
    }
	
/**
 *
 *	商品详情页
 */
		  public function detail($id)
    {
			    //1.获取数据
		//$show =Db::table('category')->where('id',$id)->find();
	
		    //1.获取数据
		$detail =Db::table('bases')->where('id',$id)->find();
		
			   //上一篇  
		$front=Db::table('bases')->where("id<".$id)->order('id desc')->limit('0,1')->find();

			//下一篇  
			$after=Db::table('bases')->where("id>".$id)->order('id desc')->limit('0,1')->find();  
 
		    //2.模板赋值
			$this -> view -> assign('after', $after);  
 
		    //2.模板赋值
			$this -> view -> assign('front', $front);
		    //2.模板赋值
			  // $this -> view -> assign('show', $show);
			$this -> test();
			$this -> view -> assign('detail', $detail);
    
		   	//3.模板渲染
        return $this->view->fetch('bases_detail');
    }


}



