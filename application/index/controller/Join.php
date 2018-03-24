<?php
namespace app\index\controller;
use app\index\common\Base;
use think\Db;   // 引用数据库操作类

class Join extends Base
{
    public function index()
    {
		    //1.获取数据-caidan
		$singlepage =Db::table('category')->where('is_page',1)->select();
		
		    //2.模板赋值
        $this -> view -> assign('singlepage', $singlepage);
		   	//3.模板渲染
        return $this->view->fetch('join');
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
	public function resume($id)
    {
			//1.获取数据
		$show =Db::table('category')->where('id',$id)->find();
		$singlepage =Db::table('category')->where('is_page',1)->select();
		//1.查询要编辑的记录
		$jobresume=$show =Db::table('job')->where('id',$id)->find();


        //2.将查询结果赋值给模板
   
		$this -> view -> assign('jobresume',$jobresume);
		    //2.模板赋值
			$this -> view -> assign('show', $show);
		$this -> view -> assign('singlepage', $singlepage);
		
		   	//3.模板渲染
        return $this->view->fetch('resume');
    }
		public function save($title)
    {
		//判断一下提交类型
        if ($this->request->isPost()) {

            //1.获取一下提交的数据,包括上传文件
            $data = $this->request->param();
                /**************************start*****************************/
               
                $res =Db::name('resume')->insert($data);

                //6判断新增是否成功
                if (is_null($res)){
					

                    $this->error('投递失败');
                }
					
                $this->success('投递成功~~');
                /**************************end*****************************/
        }else {
            $this -> error('请求类型错误~~');
        }
		   	//3.模板渲染
        
    }

}




