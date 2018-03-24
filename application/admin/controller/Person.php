<?php
namespace app\admin\controller;
use app\admin\common\Base;
use think\Session;
use think\Db;
use think\Request;
use app\admin\model\Admin as AdminModel;
class Person extends Base
{
	
	/**
	*个人信息
	*
	*/
	public function person()
    {
       	
		$userinfo=Session::get('user_info');
		$uif=Db::table('admin')->where('id',$userinfo['id'])->find();
		//var_dump($uif);
	
	    $this -> view -> assign('uif',$uif);
        return $this->view->fetch('person');
    }
	/**
	*修改个人信息
	*
	*/
		public function edit()
    {
       	
		$this->uif();
        return $this->view->fetch('person_edit');
    }
	
	/**
	*更新基本信息
	*
	*/
		public function save(Request $request){
		//设置初始值
        $status = 0;
		$message = '修改失败,请写入修改内容';
		//获取提交的数据
		$data = $request -> param();
		//更新数据
		$res =Db::table('admin')
    	->where('id',$data['id'])
		->update([
			 		'card' => $data['card'],
					'sex' => $data['sex'],
					'name' => $data['name'],
					'email' => $data['email'],
					'phone' => $data['phone']
		]);
		
		if($res){
		$status = 1;
		$message = '修改成功';
			}
		return ['status'=> $status, 'message'=> $message];
		}
	/**
	*修改个人头像
	*
	*/
		public function image()
    {


		$this->uif();
        return $this->view->fetch('person_image');
    }
	
	/**
	*上传图片
	*
	*/
		public function saveimage(){
			
			//获取上传文件
			$ima = request()->file('image');
			$info = $ima->move(ROOT_PATH . 'public' . DS . 'uploads'.DS.'toux');
			  $aaw=$info->getSaveName();
			//2获取一下上传的文件对象
           $aaa=33;
			$path = ROOT_PATH.'public'.DS.'uploads'.DS;
			$result = array('code'=>$aaw,'msg'=>$path,'msg1'=>$aaa);
			//$result =  $admin->visible(['id','image'])->toJson();

			return json_encode($result);
			
		
		}
		
		/**
	*更新头像
	*
	*/
		public function imglod(Request $request){
		$data = $request -> param();
		$kkk = $data['kkk'];
			//设置初始值
        $status = 0;
		if($kkk==''||$kkk==null){
			$message = '请上传图片';
		}else{
			
			Db::table('admin')
			->where('id',$data['id'])
			->update([
						'image' => $kkk
						
			]);
			
			
			$status = 1;
			$message = '更改成功';
			}
		return ['status'=> $status, 'message'=> $message];
		
		}
	/**
	*修改个人密码
	*
	*/
		public function password()
    {


		$this->uif();
        return $this->view->fetch('person_password');
    }
	/**
	*改密码
	*
	*/
		public function pass(Request $request)
    {
		//赋初值
		$status = 0;
		$message = '修改失败';
		//获取数据
    	$data = $request -> param();
		//$id = $data['id']);
		$password = $data['pswd'];
		$password1 = md5($data['password']);
        $password2 = md5($data['repass1']);
        $password3 = md5($data['repass2']);
		//判断
		if ($password != $password1){
            //设置返回信息
			$status = 0;
            $message = '原密码不正确~~';
			
        } elseif ($password2!= $password3) {
			$status = 0;
            $message = '两次输入密码不一致~~';
          
        }else{
        //4.执行更新操作
       			 $res = AdminModel::update([
					'password' => $password2
				],['id'=> $data['id']]);
			  
				if (is_null($res)) {
					$status = 0;
					$message = '修改密码失败~~';
					
				}else{
				//6.更新成功
					$status = 1;
					$message = '修改密码成功~~';
				}
	 	}
		return ['status'=> $status, 'message'=> $message];
    }
}
