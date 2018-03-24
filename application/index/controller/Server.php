<?php
namespace app\index\controller;
use app\index\common\Base;
use think\Db;   // 引用数据库操作类

class Server extends Base
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
		$server =Db::table('server')->where('fid',40)->select();
		$server1 =Db::table('server')->where('fid',41)->select();
		
		    //2.模板赋值
        $this -> view -> assign('singlepage', $singlepage);
		$this -> view -> assign('server', $server);
		$this -> view -> assign('server1', $server1);
	
		   	//3.模板渲染
        return $this->view->fetch('server');
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
	$servershow =Db::table('server')->where('fid',$id)->select();
		    //2.模板赋值
			$this -> view -> assign('servershow', $servershow);
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
		$detail =Db::table('server')->where('id',$id)->find();
		
			   
		    //2.模板赋值
			  // $this -> view -> assign('show', $show);
		 $this -> view -> assign('singlepage', $singlepage);
			$this -> view -> assign('detail', $detail);
    
		   	//3.模板渲染
        return $this->view->fetch('server_detail');
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
	$detail=Db::table('server')->where("id<".$id)->order('id desc')->limit('1')->find();  
 
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
	$detail=Db::table('server')->where("id>".$id)->order('id desc')->limit('1')->find();  
 
		    //2.模板赋值
		 $this -> view -> assign('singlepage', $singlepage);
			$this -> view -> assign('detail', $detail);
    
		   	//3.模板渲染
        return $this->view->fetch('business_detail');
    }

}



