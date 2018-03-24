<?php
namespace app\index\common;
use think\Controller;
use think\Request;
use think\Session;
use think\View;
use think\Db;   // 引用数据库操作类
 


class Base extends Controller
{
   protected function test(){
			//banner
		$sybanner =Db::table('banner')->select();
		  	//获取数据-erjicaidan
		$caidan =Db::table('category')->select();
			//公告
		$notice =Db::table('news')->where('fid',42)->select();
		
		    //2.模板赋值
		$this -> view -> assign('notice', $notice);
        $this -> view -> assign('caidan', $caidan);
        $this -> view -> assign('sybanner',$sybanner);

	   }
}
