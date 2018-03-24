<?php

namespace app\admin\controller;

use app\admin\common\Base;
use think\Request;
use app\admin\model\Beian as BeianModel;
use app\admin\model\Client as ClientModel;
use think\Db;

class Beian extends Base
{
    /**
     * 显示资源列表11
     *
     * @return \think\Response
     */
    public function index()
    {
        //2.用模型获取分页数据
		//$beian=BeianModel::order(['id'])->  paginate(7);
		$beian_list = Db::query("select beian.*,client.*,client.id as cid FROM beian join client on beian.b_id=client.id ORDER BY beian.id");
        //3.获取记录数量
 		$count = BeianModel::count();
        //4.模板赋值
        $this -> view -> assign('beianlist',$beian_list);
		
        $this -> view -> assign('count',$count);
        //3.模板渲染
        return $this -> view -> fetch('beian_list');
    }
	
	 /**
     * 显示资源列表11
     *
     * @return \think\Response
     */
    public function plan()
    {
        //2.用模型获取分页数据
		//$beian=BeianModel::order(['id'])->  paginate(7);
		$client_list=Db::query("select beian.*,client.*,client.id as cid FROM beian join client on beian.b_id=client.id ORDER BY beian.id");
		//$beian_list = Db::query("select beian.*,client.*,client.id as cid FROM beian join client on beian.b_id=client.id ORDER BY beian.id");
        //3.获取记录数量
 		$count = BeianModel::count();
        //4.模板赋值
        //$this -> view -> assign('beian_list',$beian_list);
		$this -> view -> assign('client_list',$client_list);
        $this -> view -> assign('count',$count);
        //3.模板渲染
        return $this -> view -> fetch('beian_plan');
    }
	
		 /**
     * 显示资源列表11
     *
     * @return \think\Response
     */
    public function planshow($id)
    {
        //2.用模型获取分页数据
		//$beian=BeianModel::order(['id'])->  paginate(7);
		$beian =BeianModel::get(['b_id' => $id]);
		$client =ClientModel::get($id);
		//$client_list=ClientModel::order(['id'])->  paginate(7);
		//$beian_list = Db::query("select beian.*,client.*,client.id as cid FROM beian join client on beian.b_id=client.id ORDER BY beian.id");
        //4.模板赋值
        //$this -> view -> assign('beian_list',$beian_list);
		    $this -> view -> assign('beian',$beian);
			$this -> view -> assign('client',$client);
        //3.模板渲染
        return $this -> view -> fetch('beian_planshow');
    }

    /**
     * 显示创建资源表单页.11
     *
     * @return \think\Response
     */
    public function create()
    {
		$this ->uif();
		$client_list=ClientModel::order(['id'])->  paginate(7);
        $count = ClientModel::count();
		$this -> view -> assign('client_list',$client_list);
        $this -> view -> assign('count', $count);
		return $this->view->fetch('beian_add');
    }
	 /**
     * 显示创建资源表单页.11
     *
     * @return \think\Response
     */
	   	public function entry()
    {
		$this ->uif();
		$data = $this->request->param();
		$b_id = $data['b_id'];
		$client = ClientModel::get($b_id);
		$beian = BeianModel::get(['b_id' => $b_id]);
		//var_dump($beian);
		$this -> view -> assign('beian',$beian);
		$this -> view -> assign('client',$client);
		return $this->view->fetch('beian_entry');
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
			$b_id=$data['b_id'];
  			/**************************start*****************************/
			 //在beian表中进行查询:以b_id为条件
        			$map = ['b_id'=>$b_id];
        			$beian = BeianModel::get($map);
       				 //如果没有查询到该用户
					if (is_null($beian)){		
							$res = BeianModel::create([
							'b_id' => $data['b_id'],
							'b_ymsyr' => $data['b_ymsyr'],
							'b_icp' => $data['b_icp'],
							'b_sub' => $data['b_sub'],
							'b_info' => $data['b_info'],
							'b_state' => $data['b_state']
							]);
							$res1 = ClientModel::update([
							'badata' => $data['b_is_data'],
							'lxr' => $data['b_faren']	
						],['id'=> $data['b_id']]);
							 $status = 1;
							 $message ="成功录入一条消息~~";
					} else{
						$res = BeianModel::update([
							'b_ymsyr' => $data['b_ymsyr'],
							'b_icp' => $data['b_icp'],
							//'b_faren' => $data['b_faren'],
							//'b_is_data' => $data['b_is_data'],
							'b_sub' => $data['b_sub'],
							'b_info' => $data['b_info'],
							'b_state' => $data['b_state']
						],['b_id'=> $data['b_id']]);
						$res1 = ClientModel::update([
							'badata' => $data['b_is_data'],	
							'lxr' => $data['b_faren']	
						],['id'=> $data['b_id']]);
							 $status = 1;
						 	$message ="更新成功~~";
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
    public function edit($b_id)
    {
        //1.查询要编辑的记录
        $data = BeianModel::get(['b_id' => $b_id]);
		$client = ClientModel::get($b_id);
        //2.将查询结果赋值给模板
        $this -> view -> assign('data', $data);
		 $this -> view -> assign('client', $client);
        //3.渲染模板
        return $this->view->fetch('beian_edit');
    }

    /**
     * 保存更新的资源11
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update()
    {
		
		  $status = 0;
		  $message ="修改失败~~";
		 //1.获取所有提交过来的数据，包括文件
        $data = $this ->request -> param();
		$res =WebsiteModel::update([
                'b_icp' => $data['b_icp'],
                'b_sub' => $data['b_sub'],
				'b_state' => $data['b_state'],
				'b_info' => $data['b_info']
            ],['w_id'=> $data['w_id']]);
        $status = 0;
		$res1 =ClientModel::update([
                'name' => $data['name'],
                'lxr' => $data['lxr'],
				'url' => $data['url'],
				'badata' => $data['badata']
            ],['id'=> $data['b_id']]);
			if (is_null($res)){
                $status = 1;
		  $message ="修改成功~~";
            }
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
       BeianModel::destroy($id);

    }
	 /**
     * 新闻搜索指定资源11
     *
     * @return \think\Response
     */
    public function searchbeian(Request $request)
    {
			//1.获取所有提交过来的数据，
            $data = $request -> param();
		 	$name = $data['na'];
			//1.查询数据
			$search = Db::query("select beian.*,client.*,client.id as cid FROM beian join client on beian.b_id=client.id WHERE client.name like '%$name%' ORDER BY beian.id");
			//$count = Db::table('client')->where('name','like','%'.$name.'%')->count();
			$count = BeianModel::count();
           	//$search=Db::table('client')->where('name','like','%'.$name.'%')->paginate(7,false,['query' => request()->param()]);
		    //2.将查询结果赋值给模板
        	$this -> view -> assign('beianlist', $search);
  			$this -> view -> assign('count', $count);
        	//3.渲染模板
			return $this -> view -> fetch('beian_list');
    }
}
