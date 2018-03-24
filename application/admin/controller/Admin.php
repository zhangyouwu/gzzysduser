<?php

namespace app\admin\controller;

use app\admin\common\Base;
use app\admin\model\Admin as AdminModel;
use think\Request;
use think\Db;   // 引用数据库操作类
use think\Session;

class Admin extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //

        //1.读取admin管理员表的信息
        $admin = AdminModel::all();

        //3.获取记录数量
        $count = AdminModel::count();

        //2.将当前管理员的信息赋值给模板
        $this -> view -> assign('admin', $admin);

        $this -> view -> assign('count', $count);
        //3.渲染模板
        return $this -> view -> fetch('admin_list');

    }
	    public function bumen2()
    {
        //

        //1.读取admin管理员表的信息
        $admin = Db::table('admin')->where('depart',2)->select();

        //3.获取记录数量
        $count = Db::table('admin')->where('depart',2)->count();

        //2.将当前管理员的信息赋值给模板
        $this -> view -> assign('admin', $admin);

        $this -> view -> assign('count', $count);
        //3.渲染模板
        return $this -> view -> fetch('admin_list');

    }
	  public function bumen3()
    {
        //

        //1.读取admin管理员表的信息
        $admin = Db::table('admin')->where('depart',3)->select();

        //3.获取记录数量
        $count = Db::table('admin')->where('depart',3)->count();

        //2.将当前管理员的信息赋值给模板
        $this -> view -> assign('admin', $admin);

        $this -> view -> assign('count', $count);
        //3.渲染模板
        return $this -> view -> fetch('admin_list');

    }
	  public function bumen4()
    {
        //
  //1.读取admin管理员表的信息
        $admin = Db::table('admin')->where('depart',4)->select();

        //3.获取记录数量
        $count = Db::table('admin')->where('depart',4)->count();

        //2.将当前管理员的信息赋值给模板
        $this -> view -> assign('admin', $admin);

        $this -> view -> assign('count', $count);
        //3.渲染模板
        return $this -> view -> fetch('admin_list');

    }
	  public function bumen1()
    {
        //
  //1.读取admin管理员表的信息
        $admin = Db::table('admin')->where('depart',1)->select();

        //3.获取记录数量
        $count = Db::table('admin')->where('depart',1)->count();

        //2.将当前管理员的信息赋值给模板
        $this -> view -> assign('admin', $admin);

        $this -> view -> assign('count', $count);
        //3.渲染模板
        return $this -> view -> fetch('admin_list');

    }
	    public function report()
    {
        //

        //1.读取admin管理员表的信息
        $admin = AdminModel::all();

        //3.获取记录数量
        $count = AdminModel::count();

        //2.将当前管理员的信息赋值给模板
        $this -> view -> assign('admin', $admin);

        $this -> view -> assign('count', $count);
        //3.渲染模板
        return $this -> view -> fetch('admin_report');

    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
		$this ->uif();
        return $this->view->fetch('admin_add');
    }
  /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function editdepart($id)
    {
        //
		$data=Db::table('admin')->where('id',$id)->find();
		$this ->uif();
		$this ->view -> assign('data',$data);
        return $this->view->fetch('admin_editdepart');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save()
    {
        //判断一下提交类型
        if ($this->request->isPost()) {
			$status = 0;
			$message ="新增失败~~";
            //1.获取一下提交的数据,
            $data = $this->request->param();
			$userName=$data['username'];
			//在admin表中进行查询:以用户为条件

        $map = ['username'=> $userName];

        $admin = AdminModel::get($map);

        //将用户名与密码分开验证



        //如果没有查询到该用户

        if (is_null($admin)){

           /*************************START****************************/
            $res = AdminModel::create($data);

            //6判断新增是否成功
            if (is_null($res)){
                $status = 0;
				$message ="请填入数据~~";
            }else{
				$status = 1;
				$message ="成功录入1条信息~~";
			}
			return ['status'=> $status, 'message'=> $message];
			/*************************END****************************/

        } else {
             $status = 0;
			 $message ="该账号已经存在~~";
			 return ['status'=> $status, 'message'=> $message];
        }
		

        }else {
			 $status = 0;
			 $message ="请求类型错误~~";
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
     * 搜索指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function search(Request $request)
    {
      
        //获取一下表单提交的数据,并保存在变量中
        $data = $request -> param();
        $userName = $data['username'];
		
		 //在admin表中进行查询:以用户为条件
        $map = ['username'=> $userName];
        $admin = AdminModel::get($map);
		
			//1.查询数据
			 $count = Db::table('admin')->where('username', $userName)->count();
           $search=Db::table('admin')->where('username', $userName)->select();
		    //2.将查询结果赋值给模板
        	$this -> view -> assign('admin', $search);
  			$this -> view -> assign('count', $count);
        	//3.渲染模板
        	 return $this -> view -> fetch('admin_list');
		
		
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
        //1.查询要编辑的记录
        $data = AdminModel::get($id);

        //2.将查询结果赋值给模板
        $this -> view -> assign('data', $data);

        //3.渲染模板
        return $this->view->fetch('admin_edit');
    }
    /**
     * 改密码
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function password($id)
    {
        //
        //1.查询要编辑的记录
        $data = AdminModel::get($id);

        //2.将查询结果赋值给模板
        $this -> view -> assign('data', $data);

        //3.渲染模板
        return $this->view->fetch('admin_password');
    }
    /**
     * 改密码
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function show($id)
    {
        //
        //1.查询要编辑的记录
        $data = AdminModel::get($id);

        //2.将查询结果赋值给模板
        $this -> view -> assign('data', $data);


        //3.渲染模板
        return $this->view->fetch('admin_view');
    }
    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */

    //执行更新操作
    public function update(Request $request, $id)
    {
        //1.获取所有提交过来的数据，包括文件
        $data = $this ->request -> param();


        //4.执行更新操作
        $res = AdminModel::update([
            'username' => $data['username'],
			 'name' => $data['name'],
            'email' => $data['email'],
			'phone' => $data['phone'],
			'entry_time' => $data['entry_time'],
			'is_job' => $data['is_job'],
            'sex' => $data['sex']
        ],['id'=> $data['id']]);

        //5.检测更新
        if (is_null($res)) {
            $this -> error('更新失败~~');
        }

        //6.更新成功
        $this->success('更新成功~~');

    }
	
	    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */

    //执行更新操作
    public function updatedapart(Request $request, $id)
    {
        //1.获取所有提交过来的数据，包括文件
		$grade1=0;
        $data = $this ->request -> param();
		 if($data['grade']=='领导'){
			 $grade1=1;
			 }else if($data['grade']=='经理'){
				  $grade1=2;
				 }else{
					   $grade1=3;
					 }
        //4.执行更新操作
        $res = AdminModel::update([
            'username' => $data['username'],
			 'grade' => $grade1,
			 'depart' => $data['depart']
			 
           
        ],['id'=> $data['id']]);

        //5.检测更新
        if (is_null($res)) {
            $this -> error('更新失败~~');
        }

        //6.更新成功
        $this->success('更新成功~~');

    }

    //执行更新操作
    public function update1(Request $request, $id)
    {
        //1.获取所有提交过来的数据，包括文件
        $data = $this ->request -> param();
       /* $password1 = md5($data['password1']);
        $password2 = md5($data['password2']);
        $password3 = md5($data['password3']);*/

        $password1 = md5($data['password1']);
        $password2 = md5($data['password2']);
        $password3 = md5($data['password3']);
       // $password4 = $data['password3'];

        //$admin = AdminModel::get();
        $yp=Db::table('admin')->where('id',$data['id'])->value('password');
        if ($yp != $password3){
            //设置返回信息
            //$message = '用户名不正确';
            $this -> error('原密码不正确~~');

        } elseif ($password1!= $password2) {

            $this -> error('两次输入密码不一致~~');

        }else{
        //6.更新成功

        //4.执行更新操作
        $res = AdminModel::update([
            'password' => $data['password1']
        ],['id'=> $data['id']]);
        }
        if (is_null($res)) {
            $this -> error('修改密码失败~~');
        }
        //6.更新成功
        $this->success('修改密码成功~~');

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
        AdminModel::destroy($id);

    }
	/**
     * 资料搜索指定资源
     *
     * @return \think\Response
     */
    public function searchreport(Request $request)
    {
		  

      	//1.获取所有提交过来的数据，
            $data = $request -> param();
		 	$name = $data['name'];
			//1.查询数据
			$count = Db::table('admin')->where('name','like','%'.$name.'%')->count();
           	$search=Db::table('admin')->where('name','like','%'.$name.'%')->select();
		    //2.将查询结果赋值给模板
        	$this -> view -> assign('admin', $search);
  			$this -> view -> assign('count', $count);
        	//3.渲染模板
			return $this -> view -> fetch('admin_report');


    }
}
