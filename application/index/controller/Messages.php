<?php
namespace app\index\controller;
use app\index\common\Base;
use think\Db;   // 引用数据库操作类

class Messages extends Base
{
    public function index()
    {
		$this->test();
        return $this->view->fetch('messages');
    }
	  public function save()
    {

         //判断一下提交类型
        if ($this->request->isPost()) {

            //1.获取一下提交的数据,包括上传文件
            $data = $this->request->param();
                /**************************start*****************************/
               
                $res =Db::name('messages')->insert($data);

                //6判断新增是否成功
                if (is_null($res)){
					

                    $this->error('提交失败');
                }
					
                $this->success('提交成功~~');
                /**************************end*****************************/
        }else {
            $this -> error('请求类型错误~~');
        }
		   	//3.模板渲染
    }

}



