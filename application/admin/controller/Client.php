<?php

namespace app\admin\controller;

use app\admin\common\Base;
use think\Request;
use app\admin\model\Client as ClientModel;
use think\Db;

class Client extends Base
{
    /**
     * 显示资源列表11
     *
     * @return \think\Response
     */
    public function index()
    {
        //1、1.获取到所有的数据记录
        // $client = ClientModel::all();

        //2.用模型获取分页数据
        $client_list=ClientModel::order(['id'])->  paginate(7);
		    //$client_list=ClientModel::order(['sort'=>'desc'])->  paginate(5);

        //3.获取记录数量
        $count = ClientModel::count();
        //4.模板赋值
       // $this -> view -> assign('client',$client);
        $this -> view -> assign('client_list',$client_list);
        $this -> view -> assign('count', $count);


        //3.模板渲染

        return $this -> view -> fetch('client_list');

    }

    /**
     * 显示创建资源表单页.11
     *
     * @return \think\Response
     */
    public function create()
    {
        //
		$this ->uif();
        return $this->view->fetch('client_add');
    }

    /**
     * 保存新建的资源11
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
            //2获取一下上传的文件对象
			 $res = ClientModel::create($data);
			//3判断新增是否成功
                if (is_null($res)){
					 $status = 0;
			 		 $message ="录入失败~~";
                }else{
					 $status = 1;
			 		 $message ="成功录入一条消息~~";
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
     * 显示编辑资源表单页.11
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //1.查询要编辑的记录
        $data = ClientModel::get($id);


        //2.将查询结果赋值给模板
        $this -> view -> assign('data', $data);

        //3.渲染模板
        return $this->view->fetch('client_edit');
    }
	  /**
     * 显示编商务11
     *
     * @param  int  $id
     * @return \think\Response
     */
	 public function editsw($id)
    {
        //1.查询要编辑的记录
        $data = ClientModel::get($id);


        //2.将查询结果赋值给模板
        $this -> view -> assign('data', $data);

        //3.渲染模板
        return $this->view->fetch('client_editsw');
    }


    /**
     * 保存更新的资源11
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //1.获取所有提交过来的数据
        $data = $this ->request -> param();
        $status = 0;
		$message ="修改错误~~";
		 //4.执行更新操作
        $res = ClientModel::update([
                'name' => $data['name'],
                'address' => $data['address'],
				'is_play' => $data['is_play'],
				'badata' => $data['badata'],
				'lxr' => $data['lxr'],
				'servertime' => $data['servertime'],
                'url' => $data['url']
            ],['id'=> $data['id']]);
		 $status = 1;
		$message ="修改成功~~";
		return ['status'=> $status, 'message'=> $message];
    }
	 /**
     * 保存更新商务11
     * @param  \think\Request  $request
     * @param  int  $id
     */
    public function updatesw(Request $request, $id)
    {
        //1.获取所有提交过来的数据
        $data = $this ->request -> param();
        $status = 0;
		$message ="修改错误~~";
		 //4.执行更新操作
        $res = ClientModel::update([
				'serversw' => $data['serversw']
            ],['id'=> $data['id']]);
		$status = 1;
		$message ="修改成功~~";
		return ['status'=> $status, 'message'=> $message];
    }
		 /**
     * 显示资源列表11
     *
     * @return \think\Response
     */
    public function noplay()
    {
        //2.用模型获取分页数据
		$client_list = Db::query("select client.*  FROM  client WHERE client.is_play=0  ORDER BY client.id");
        //3.获取记录数量
 		$count = Db::table('client') ->where('is_play',0) ->count();
        //4.模板赋值
       	$this -> view -> assign('client_list',$client_list);
        $this -> view -> assign('count', $count);
        //3.模板渲染
        return $this -> view -> fetch('client_noplay');
    }
	
		 /**
     * 显示资源列表11
     *
     * @return \think\Response
     */
    public function editnoplay($id)
    {
        //1.用模型获取分页数据
		$data = Db::table('client') -> where('id',$id) ->find();
        //2.模板赋值
       	$this -> view -> assign('data',$data);
        //3.模板渲染
        return $this -> view -> fetch('client_editnoplay');
    }
	
			 /**
     * 显示资源列表11
     *
     * @return \think\Response
     */
    public function savenoplay()
    {
         //1.获取所有提交过来的数据
        $data = $this ->request -> param();
		//1.用模型获取分页数据
		$res = ClientModel::update([
				'name' => $data['name'],
				'is_play' => $data['is_play'],
				'noplay' => $data['noplay']
        ],['id'=> $data['id']]);
		$status = 1;
		$message ="修改成功~~";
		return ['status'=> $status, 'message'=> $message];
    }

    /**
     * 删除指定资源11
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
        ClientModel::destroy($id);

    }
	 /**
     * 搜索指定资源11
     *
     * @return \think\Response
     */
    public function searchclient(Request $request)
    {
		  
      
      	//1.获取所有提交过来的数据，
            $data = $request -> param();
		 	$name = $data['na'];
			//1.查询数据
			$count = Db::table('client')->where('name','like','%'.$name.'%')->count();
           	$search=Db::table('client')->where('name','like','%'.$name.'%')->paginate(7,false,['query' => request()->param()]);
		    //2.将查询结果赋值给模板
        	$this -> view -> assign('client_list', $search);
  			$this -> view -> assign('count', $count);
        	//3.渲染模板
			 return $this -> view -> fetch('client_list');


    }
}
