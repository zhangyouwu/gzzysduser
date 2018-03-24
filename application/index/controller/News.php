<?php
namespace app\index\controller;
use app\index\common\Base;
use think\Db;   // 引用数据库操作类
use think\Request;  

class News extends Base
{
 /**
 *
 *	业务首页
 */
	   public function index()
    {
		    //1.获取数据	
		$news =Db::table('news')->order('create_time desc')->paginate(5);
		$singlepage =Db::table('category')->where('id',5)->find();
	
	
		    //2.模板赋值
		$this -> view -> assign('singlepage', $singlepage);
		$this -> view -> assign('news', $news);
		$this -> test();
		   	//3.模板渲染
        return $this->view->fetch('news');
    }
	
/**
 *
 *	业务内页
 */
	  public function show($id)
    {
		    //1.获取数据
		$show =Db::table('category')->where('id',$id)->find();
		$newsshow =Db::table('news')->where('fid',$id)->order('create_time desc')->select();
		    //2.模板赋值
		$this -> view -> assign('newsshow', $newsshow);
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
		$detail =Db::table('news')->where('id',$id)->find();
			//查询要编辑的记录
     
		$lanmu=Db::query("select category.cate_name from category join news on news.fid=category.id where  news.id=$id");
			//上一篇  
$front=Db::table('news')->where("id<".$id)->order('id desc')->limit('0,1')->find();

			//下一篇  
			$after=Db::table('news')->where("id>".$id)->order('id desc')->limit('0,1')->find();  
 
		    //2.模板赋值
			$this -> view -> assign('after', $after);  
 
		    //2.模板赋值
			$this -> view -> assign('front', $front);
			   
		    //2.模板赋值
			  
				$this -> view -> assign('lanmu', $lanmu);
				$this -> view -> assign('detail', $detail);
				$this -> test();
					
			
    
		   	//3.模板渲染
        return $this->view->fetch('news_detail');
    }
	
	
		public function search(Request $request)
    {
		  
      
      	//1.获取所有提交过来的数据，
		$this -> test();
            $data = $request -> param(); 
		 	$tit = $data['tit'];
			//1.查询数据
           	$search=Db::table('news')->where('title','like','%'.$tit.'%')->paginate(5,false,['query' => request()->param()]);
			$singlepage =Db::table('category')->where('id',5)->find();
	
	
		    //2.模板赋值
		$this -> view -> assign('singlepage', $singlepage);
		    //2.将查询结果赋值给模板
        	$this -> view -> assign('news', $search);
        	//3.渲染模板
        	 return $this -> view -> fetch('news/news');

    }

}



