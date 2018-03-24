<?php
namespace app\index\controller;
use app\index\common\Base;
use think\Db;   // 引用数据库操作类
use think\Search;
class Product extends Base
{
 /**
 *
 *	商品首页
 */
	   public function index()
    {
	
			 //1.获取数据-商品
		$product =Db::table('product')->where('class2',61)->select();
		$product1 =Db::table('product')->where('class2',62)->select();
		$product2 =Db::table('product')->where('class2',63)->select();
	
		    //2.模板赋值
       
		$this -> view -> assign('product', $product);
		$this -> view -> assign('product1', $product1);
		$this -> view -> assign('product2', $product2);
		$this -> test();
		   	//3.模板渲染
        return $this->view->fetch('product');
    }
	
/**
 *
 *	商品内页
 */
	  public function show($id)
    {
		    //1.获取数据
		$show =Db::table('category')->where('id',$id)->find();
	
		$productshow =Db::table('product')->where('class2',$id)->select();
		    //2.模板赋值
		$this -> view -> assign('productshow', $productshow);
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
		$detail =Db::table('product')->where('id',$id)->find();
		
			   //上一篇  
		$front=Db::table('product')->where("id<".$id)->order('id desc')->limit('0,1')->find();

			//下一篇  
			$after=Db::table('product')->where("id>".$id)->order('id desc')->limit('0,1')->find();  
 
		    //2.模板赋值
			$this -> view -> assign('after', $after);  
 
		    //2.模板赋值
			$this -> view -> assign('front', $front);
		    //2.模板赋值
			  // $this -> view -> assign('show', $show);
			$this -> test();
			$this -> view -> assign('detail', $detail);
    
		   	//3.模板渲染
        return $this->view->fetch('product_detail');
    }


}



