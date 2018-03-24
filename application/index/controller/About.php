<?php
namespace app\index\controller;
use app\index\common\Base;
use think\Db;   // 引用数据库操作类

class About extends Base
{
    public function index()
    {
		$singlepage =Db::table('category')->where('id',2)->find();
		$this -> view -> assign('singlepage', $singlepage);
		$this -> test();
		   	//3.模板渲染
        return $this->view->fetch('about');
    }
	  public function show($id)
    {
		    //1.获取数据
		$show =Db::table('category')->where('id',$id)->find();
		    //2.模板赋值
		$this -> test();
        $this -> view -> assign('show', $show);
		   	//3.模板渲染
        return $this->view->fetch('show');
    }
	

}




