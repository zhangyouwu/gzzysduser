<?php

namespace app\admin\controller;

use app\admin\common\Base;
use think\Request;
use app\admin\model\Website as WebsiteModel;
use app\admin\model\Client as ClientModel;
use think\Db;

class Website extends Base
{
    /**
     * 显示资源列表11
     *
     * @return \think\Response
     */
    public function index()
    {
        //2.用模型获取分页数据
		$website_list = Db::query("select website.*,client.*,client.id as cid FROM website join client on website.w_id=client.id ORDER BY website.id");
        //3.获取记录数量
 		$count = WebsiteModel::count();
        //4.模板赋值
       	$this -> view -> assign('website_list',$website_list);
        $this -> view -> assign('count', $count);
        //3.模板渲染
        return $this -> view -> fetch('website_list');
    }

    /**
     * 显示创建资源表单页.11
     * @return \think\Response
     */
    public function create()
    {
		$this ->uif();
		$client_list=ClientModel::order(['id'])->  paginate(7);
        $count = ClientModel::count();
		$this -> view -> assign('client_list',$client_list);
        $this -> view -> assign('count', $count);
		return $this->view->fetch('website_add');
    }
	 /**
     * 显示创建资源表单页.11
     * @return \think\Response
     */
	    public function entry()
    {
        //
		$this ->uif();
		$data = $this->request->param();
		$w_id = $data['w_id'];
		$client = ClientModel::get($w_id);
		$website = WebsiteModel::get(['w_id' => $w_id]);
		//var_dump($website);
		$this -> view -> assign('client',$client);
		$this -> view -> assign('website',$website);
		  return $this->view->fetch('website_entry');
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
			$w_id=$data['w_id'];
  			/**************************start*****************************/
			 //在website表中进行查询:以b_id为条件
        			$map = ['w_id'=>$w_id];
        			$website = WebsiteModel::get($map);
       				 //如果没有查询到该用户
					if (is_null($website)){		
							$res = WebsiteModel::create([
							'w_id' => $data['w_id'],
							'w_order' => $data['w_order'],
							'w_online_time' => $data['w_online_time'],
							'w_online' => $data['w_online'],
							'w_info' => $data['w_info'],
							'w_designok' => $data['w_designok'],
							'w_design' => $data['w_design'],
							'w_designadd' => $data['w_designadd'],
							'w_designtime' => $data['w_designtime'],
							'w_programok' => $data['w_programok'],
							'w_program' => $data['w_program'],
							'w_programadd' => $data['w_programadd'],
							'w_programtime' => $data['w_programtime'],
							]);
							$res1 = ClientModel::update([
							'is_play' => $data['w_play'],	
						],['id'=> $data['w_id']]);
							 $status = 1;
							 $message ="成功录入一条消息~~";
					} else{
						$res = WebsiteModel::update([
							'w_order' => $data['w_order'],
							'w_online_time' => $data['w_online_time'],
							'w_online' => $data['w_online'],
							'w_info' => $data['w_info'],
							'w_designok' => $data['w_designok'],
							'w_design' => $data['w_design'],
							'w_designadd' => $data['w_designadd'],
							'w_designtime' => $data['w_designtime'],
							'w_programok' => $data['w_programok'],
							'w_program' => $data['w_program'],
							'w_programadd' => $data['w_programadd'],
							'w_programtime' => $data['w_programtime'],
						],['w_id'=> $data['w_id']]);
						$res1 = ClientModel::update([
							'is_play' => $data['w_play'],	
						],['id'=> $data['w_id']]);
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
     * 显示资源列表11
     *
     * @return \think\Response
     */
    public function plan()
    {
        //2.用模型获取分页数据
		//$beian=BeianModel::order(['id'])->  paginate(7);
		$client_list=Db::query("select website.*,client.*,client.id as cid FROM website join client on website.w_id=client.id ORDER BY website.id");
		//$beian_list = Db::query("select beian.*,client.*,client.id as cid FROM beian join client on beian.b_id=client.id ORDER BY beian.id");
        //3.获取记录数量
 		$count = WebsiteModel::count();
        //4.模板赋值
        //$this -> view -> assign('beian_list',$beian_list);
		$this -> view -> assign('client_list',$client_list);
        $this -> view -> assign('count',$count);
        //3.模板渲染
        return $this -> view -> fetch('website_plan');
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
		$website =WebsiteModel::get(['w_id' => $id]);
		$client =ClientModel::get($id);
		//$client_list=ClientModel::order(['id'])->  paginate(7);
		//$beian_list = Db::query("select beian.*,client.*,client.id as cid FROM beian join client on beian.b_id=client.id ORDER BY beian.id");
        //4.模板赋值
        //$this -> view -> assign('beian_list',$beian_list);
		    $this -> view -> assign('website',$website);
			$this -> view -> assign('client',$client);
        //3.模板渲染
        return $this -> view -> fetch('website_planshow');
    }
    /**
     * 显示编辑资源表单页.··11
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($w_id)
    {
        //1.查询要编辑的记录
        $data = WebsiteModel::get(['w_id' => $w_id]);
		$client = ClientModel::get($w_id);
        //2.将查询结果赋值给模板
		$this -> view -> assign('client', $client);
        $this -> view -> assign('data', $data);
        //3.渲染模板
        return $this->view->fetch('website_edit');
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
        //1.获取所有提交过来的数据，包括文件
        $data = $this ->request -> param();
        /**************************start*****************************/
       // $status = 0;
		//$message ="修改失败~~";
		  
		 //1.获取所有提交过来的数据，包括文件
		$res =WebsiteModel::update([
                'w_order' => $data['w_order'],
                'w_online' => $data['w_online'],
				'w_online_time' => $data['w_online_time'],
				'w_design' => $data['w_design'],
                'w_designadd' => $data['w_designadd'],
				'w_designok' => $data['w_designok'],
				'w_designtime' => $data['w_designtime'],
				'w_program' => $data['w_program'],
                'w_programadd' => $data['w_programadd'],
				'w_programok' => $data['w_programok'],
				'w_programtime' => $data['w_programtime'],
				'w_info' => $data['w_info']
            ],['w_id'=> $data['w_id']]);
        $status = 0;
		$res1 =ClientModel::update([
                'name' => $data['name'],
				'url' => $data['url'],
				'is_play' => $data['is_play']
            ],['id'=> $data['w_id']]);
			if (is_null($res)){
                $status = 1;
				$message ="修改成功~~";
            }
			 $status = 1;
		  $message ="修改成功~~";
       
		return ['status'=> $status, 'message'=> $message];
          
        /****************************end*****************************/
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
       WebsiteModel::destroy($id);

    }
	 /**
     * 新闻搜索指定资源11
     *
     * @return \think\Response
     */
    public function searchwebsite(Request $request)
    {
		  
      //1.获取所有提交过来的数据，
            $data = $request -> param();
		 	$name = $data['na'];
			//1.查询数据
			$search = Db::query("select website.*,client.*,client.id as cid FROM website join client on website.w_id=client.id WHERE client.name like '%$name%' ORDER BY website.id");
			//$count = Db::table('client')->where('name','like','%'.$name.'%')->count();
			$count = WebsiteModel::count();
           	//$search=Db::table('client')->where('name','like','%'.$name.'%')->paginate(7,false,['query' => request()->param()]);
		    //2.将查询结果赋值给模板
        	$this -> view -> assign('website_list', $search);
  			$this -> view -> assign('count', $count);
        	//3.渲染模板
			return $this -> view -> fetch('website_list');


    }
}
