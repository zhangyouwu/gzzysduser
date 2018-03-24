<?php
namespace app\index\controller;
use app\index\common\Base;
use think\Db;   // 引用数据库操作类

class Resume extends Base
{
    public function index()
    {
		    //1.获取数据-caidan
		$singlepage =Db::table('category')->where('is_page',1)->select();
		
		    //2.模板赋值
        $this -> view -> assign('singlepage', $singlepage);
		   	//3.模板渲染
        return $this->view->fetch('resume');
    }
	  public function show($id)
    {
		    //1.获取数据
		$show =Db::table('category')->where('id',$id)->find();
		$singlepage =Db::table('category')->where('is_page',1)->select();
		$jobshow = Db::table('job')->select();
		    //2.模板赋值
        $this -> view -> assign('jobshow', $jobshow);
		$this -> view -> assign('show', $show);
		$this -> view -> assign('singlepage', $singlepage);
		   	//3.模板渲染
        return $this->view->fetch('show');
    }
		 
		 
 public function detail($id)
    {
			//1.获取数据
		$show =Db::table('category')->where('id',$id)->find();
		$singlepage =Db::table('category')->where('is_page',1)->select();
		$jobshow =Db::table('job')->where('id',$id)->find();
		    //2.模板赋值
			$this -> view -> assign('show', $show);
		$this -> view -> assign('singlepage', $singlepage);
		$this -> view -> assign('jobshow', $jobshow);
		   	//3.模板渲染
        return $this->view->fetch('detail');
    }

}




