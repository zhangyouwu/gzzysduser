<?php
namespace app\index\controller;
use app\index\common\Base;
use think\Db;   // 引用数据库操作类

class Business extends Base
{
 /**
 *
 *	业务首页
 */
	   public function index()
    {
		    //1.获取数据
		$singlepage =Db::table('category')->where('is_page',0)->select();
			 //1.获取数据-业务
		$field =Db::table('field')->where('fid',32)->select();
		$field1 =Db::table('field')->where('fid',33)->select();
		$field2 =Db::table('field')->where('fid',34)->select();
		$field3 =Db::table('field')->where('fid',35)->select();
		    //2.模板赋值
        $this -> view -> assign('singlepage', $singlepage);
		$this -> view -> assign('field', $field);
		$this -> view -> assign('field1', $field1);
		$this -> view -> assign('field2', $field2);
		$this -> view -> assign('field3', $field3);
		   	//3.模板渲染
        return $this->view->fetch('business');
    }
	
/**
 *
 *	业务内页
 */
	  public function show($id)
    {
		    //1.获取数据
		$show =Db::table('category')->where('id',$id)->find();
	$singlepage =Db::table('category')->where('is_page',0)->select();
	$fieldshow =Db::table('field')->where('fid',$id)->select();
		    //2.模板赋值
			$this -> view -> assign('fieldshow', $fieldshow);
        $this -> view -> assign('show', $show);
		 $this -> view -> assign('singlepage', $singlepage);
		   	//3.模板渲染
        return $this->view->fetch('show');
    }
	
/**
 *
 *	业务详情页
 */
		  public function detail($id)
    {
			    //1.获取数据
		//$show =Db::table('category')->where('id',$id)->find();
	$singlepage =Db::table('category')->where('is_page',0)->select();
		    //1.获取数据
		$detail =Db::table('field')->where('id',$id)->find();
		
			   
		    //2.模板赋值
			  // $this -> view -> assign('show', $show);
		 $this -> view -> assign('singlepage', $singlepage);
			$this -> view -> assign('detail', $detail);
    
		   	//3.模板渲染
        return $this->view->fetch('business_detail');
    }
/**
 *
 *	分页shang
 */
		  public function pageshang($id)
    {
			    //1.获取数据	
	$singlepage =Db::table('category')->where('is_page',0)->select();
		    
				//上一篇  
	$detail=Db::table('field')->where("id<".$id)->order('id desc')->limit('1')->find();  
 
		    //2.模板赋值
		 $this -> view -> assign('singlepage', $singlepage);
			$this -> view -> assign('detail', $detail);
    
		   	//3.模板渲染
        return $this->view->fetch('business_detail');
    }
	
	/**
 *
 *	分页xia
 */
		  public function pagexia($id)
    {
			    //1.获取数据	
	$singlepage =Db::table('category')->where('is_page',0)->select();
		    
				//上一篇  
	$detail=Db::table('field')->where("id>".$id)->order('id desc')->limit('1')->find();  
 
		    //2.模板赋值
		 $this -> view -> assign('singlepage', $singlepage);
			$this -> view -> assign('detail', $detail);
    
		   	//3.模板渲染
        return $this->view->fetch('business_detail');
    }

}



