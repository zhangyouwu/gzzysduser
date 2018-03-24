<?php
namespace app\index\controller;
use app\index\common\Base;
use think\Db;   // 引用数据库操作类

class Contacts extends Base
{
    public function index()
    {
			$singlepage =Db::table('category')->where('id',51)->find();
			$this -> view -> assign('singlepage', $singlepage);
	
		 
					$this->test();
        return $this->view->fetch('contacts');
    }
	
	 public function job()
    {
		$singlepage =Db::table('category')->where('id',52)->find();
			$this -> view -> assign('singlepage', $singlepage);
		$showjob =Db::table('job')->select();
		    $this -> view -> assign('showjob', $showjob);
					$this->test();
        return $this->view->fetch('job');
    }
	public function map()
    {
		$show =Db::table('category')->where('id',8)->find();
		    $this -> view -> assign('show', $show);
					$this->test();
        return $this->view->fetch('map');
    }
	public function detail($id)
    {
			//1.获取数据
		$show =Db::table('category')->where('id',$id)->find();
	
		$jobshow =Db::table('job')->where('id',$id)->find();
		$this->test();
		    //2.模板赋值
		$this -> view -> assign('show', $show);
		
		
		$this -> view -> assign('jobshow', $jobshow);
		   	//3.模板渲染
        return $this->view->fetch('detail');
    }
	public function resume($id)
    {
			//1.获取数据
		$show =Db::table('category')->where('id',$id)->find();
		
		//1.查询要编辑的记录
		$jobresume=$show =Db::table('job')->where('id',$id)->find();
	$this->test();

        //2.将查询结果赋值给模板
   
		$this -> view -> assign('jobresume',$jobresume);
		    //2.模板赋值
			$this -> view -> assign('show', $show);
		
		
		   	//3.模板渲染
        return $this->view->fetch('resume');
    }

}



