<?php
namespace app\index\controller;
use app\index\common\Base;
use think\Db;   // 引用数据库操作类

class Traning extends Base
{
 /**
 *
 *	业务首页
 */
	   public function index()
    {
		    //1.获取数据	
		$traning =Db::table('traning')->order('create_time desc')->paginate(5);
		$singlepage =Db::table('category')->where('id',30)->find();
	
	
		    //2.模板赋值
		$this -> view -> assign('singlepage', $singlepage);
		$this -> view -> assign('traning', $traning);
		$this -> test();
		   	//3.模板渲染
        return $this->view->fetch('traning');
    }
/**
 *
 *	文件下载
 */
	  public function report()
    {
		  //1.获取数据	
		$report =Db::table('report')->order('create_time desc')->paginate(5);
		$singlepage =Db::table('category')->where('id',31)->find();
	
	
		    //2.模板赋值
		$this -> view -> assign('singlepage', $singlepage);
		$this -> view -> assign('report', $report);
		$this -> test();
		   	//3.模板渲染
        return $this->view->fetch('report');
    }
	  public function reportsize()
    {
		$report =Db::table('report')->order('create_time desc')->field('url')->paginate(5);
		var_dump($report);
		//$list = $report->getField('url');
		//var_dump($list);
		 $file = new \think\File('./robots.txt'); //注意，robots.txt这个是必须要传的。
		echo $file->getSize(); //文件大小
		echo "*********************";
		echo "<br/>";
		echo $file->current(); //输出robots.txt里的第一行内容。
			echo "tttttttttttttttttttttttt";
		echo "\n";
    }
	

	
	
/**
 *
 *	业务内页
 */
	  public function show($id)
    {
		    //1.获取数据
		$show =Db::table('category')->where('id',$id)->find();
		$traningshow =Db::table('traning')->where('fid',$id)->order('create_time desc')->paginate(4);;
		    //2.模板赋值
		$this -> view -> assign('traningshow', $traningshow);
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
		$detail =Db::table('traning')->where('id',$id)->find();
			//查询要编辑的记录
     
		$lanmu=Db::query("select category.cate_name from category join traning on traning.fid=category.id where  traning.id=$id");
			//上一篇  
$front=Db::table('traning')->where("id<".$id)->order('id desc')->limit('0,1')->find();

			//下一篇  
			$after=Db::table('traning')->where("id>".$id)->order('id desc')->limit('0,1')->find();  
 
		    //2.模板赋值
			$this -> view -> assign('after', $after);  
 
		    //2.模板赋值
			$this -> view -> assign('front', $front);
			   
		    //2.模板赋值
			  
				$this -> view -> assign('lanmu', $lanmu);
				$this -> view -> assign('detail', $detail);
				$this -> test();
					
			
    
		   	//3.模板渲染
        return $this->view->fetch('traning_detail');
    }


}



