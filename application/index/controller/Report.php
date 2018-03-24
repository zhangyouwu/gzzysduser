<?php
namespace app\index\controller;
use app\index\common\Base;
use think\Db;   // 引用数据库操作类

class Report extends Base
{
 /**
 *
 *	业务首页
 */
	   public function index()
    {
		    //1.获取数据	
		$report =Db::table('report')->order('create_time desc')->paginate(5);
		
	
	
		    //2.模板赋值
		
		$this -> view -> assign('report', $report);
		$this -> test();
		   	//3.模板渲染
        return $this->view->fetch('report');
    }
	
	/**
 *
 *	业务内页
 */
	  public function report()
    {
		    //1.获取数据
		$show =Db::table('category')->where('id',$id)->find();
		$reportshow =Db::table('report')->where('fid',$id)->order('create_time desc')->paginate(4);;
		    //2.模板赋值
		$this -> view -> assign('reportshow', $reportshow);
        $this -> view -> assign('show', $show);
		 		$this -> test();
		   	//3.模板渲染
        return $this->view->fetch('show');
    }
	
/**
 *
 *	业务内页
 */
	  public function show($id)
    {
		    //1.获取数据
		$show =Db::table('category')->where('id',$id)->find();
		$reportshow =Db::table('report')->where('fid',$id)->order('create_time desc')->paginate(4);;
		    //2.模板赋值
		$this -> view -> assign('reportshow', $reportshow);
        $this -> view -> assign('show', $show);
		 		$this -> test();
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
		$detail =Db::table('report')->where('id',$id)->find();
			//查询要编辑的记录
     
		$lanmu=Db::query("select category.cate_name from category join report on report.fid=category.id where  report.id=$id");
			//上一篇  
$front=Db::table('report')->where("id<".$id)->order('id desc')->limit('0,1')->find();

			//下一篇  
			$after=Db::table('report')->where("id>".$id)->order('id desc')->limit('0,1')->find();  
 
		    //2.模板赋值
			$this -> view -> assign('after', $after);  
 
		    //2.模板赋值
			$this -> view -> assign('front', $front);
			   
		    //2.模板赋值
			  
				$this -> view -> assign('lanmu', $lanmu);
				$this -> view -> assign('detail', $detail);
				$this -> test();
					
			
    
		   	//3.模板渲染
        return $this->view->fetch('report_detail');
    }


}



