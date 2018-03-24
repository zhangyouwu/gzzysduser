<?php

namespace app\admin\controller;

use app\admin\common\Base;
use think\Request;
use app\admin\model\Download as DownloadModel;
use app\admin\model\Client as ClientModel;
use think\Db;

class Download extends Base
{
    /**
     * 资料下载
     *
     * @return \think\Response
     */
    public function index()
    {

        //2.用模型获取分页数据
			$download_list=DownloadModel::order(['id'])->  paginate(8);
        //3.获取记录数量
 			$count = DownloadModel::count();
        //4.模板赋值
        $this -> view -> assign('download_list',$download_list);
        $this -> view -> assign('count', $count);
        //3.模板渲染
        return $this -> view -> fetch('download_list');

    }

    /**
     * 资料添加
     *
     * @return \think\Response
     */
    public function create()
    {
        //
		$this ->uif();	
		return $this->view->fetch('download_add');
    }
	   
	   /**
     * 资料修改
     *
     * @return \think\Response
     */ 
	   	public function entry()
    {
        //
		$this ->uif();
	 //2.用模型获取分页数据
			$download_list=DownloadModel::order(['id'])->  paginate(8);
        //3.获取记录数量
 			$count = DownloadModel::count();
        //4.模板赋值
        $this -> view -> assign('download_list',$download_list);
        $this -> view -> assign('count', $count);
		return $this->view->fetch('download_entry');
    }


    /**
     * 资料新增
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save()
    {
        //判断一下提交类型
        if ($this->request->isPost()) {
 			 $status = 0;
			 $message ="请填入数据~~";
            //1.获取一下提交的数据
            $data = $this->request->param();
			
  			/**************************start*****************************/
			 
					$res = DownloadModel::create($data);
					if (is_null($res)) {
							 $status = 0;
							 $message ="添加失败~~";
					} else{
						$status = 1;
						$message ="添加成功~~";
					} 
			
          
            /**************************end*****************************/
			 return ['status'=>$status, 'message'=>$message];
           

        }else {
            $status = 0;
			$message ="提交类型错误~~";
			return ['status'=> $status, 'message'=> $message];
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 资料编辑
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //1.查询要编辑的记录
        $data = DownloadModel::get($id);


        //2.将查询结果赋值给模板
        $this -> view -> assign('data', $data);

        //3.渲染模板
        return $this->view->fetch('download_edit');
    }

    /**
     * 资料更新
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //1.获取所有提交过来的数据，包括文件
        $data = $this ->request -> param();

        //2.对于文件单独操作打包成一个文件对象
	 /**************************start*****************************/
            //4.执行更新操作
            $res =DownloadModel::update([
                'name' => $data['name'],
                'url' => $data['url']
            ],['id'=> $data['id']]);

            //5.检测更新
            if (is_null($res)) {
                $this -> error('更新失败~~');
            }

            //6.更新成功
            $this->success('更新成功~~');
            /****************************end****************************/
    }

    /**
     * 删除资料
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
       DownloadModel::destroy($id);

    }
	 /**
     * 资料搜索指定资源
     *
     * @return \think\Response
     */
    public function search(Request $request)
    {
		  

      	//1.获取所有提交过来的数据，
            $data = $request -> param();
		 	$na = $data['na'];
			//1.查询数据
			$count = Db::table('download')->where('name','like','%'.$na.'%')->count();
           	$search=Db::table('download')->where('name','like','%'.$na.'%')->paginate(5,false,['query' => request()->param()]);
		    //2.将查询结果赋值给模板
        	$this -> view -> assign('download_list', $search);
  			$this -> view -> assign('count', $count);
        	//3.渲染模板
			return $this -> view -> fetch('download_list');


    }
	 /**
     * 资料搜索指定资源
     *
     * @return \think\Response
     */
    public function searchedit(Request $request)
    {
		  

      	//1.获取所有提交过来的数据，
            $data = $request -> param();
		 	$na = $data['na'];
			//1.查询数据
			$count = Db::table('download')->where('name','like','%'.$na.'%')->count();
           	$search=Db::table('download')->where('name','like','%'.$na.'%')->paginate(5,false,['query' => request()->param()]);
		    //2.将查询结果赋值给模板
        	$this -> view -> assign('download_list', $search);
  			$this -> view -> assign('count', $count);
        	//3.渲染模板
			return $this -> view -> fetch('download_entry');


    }
}
