<?php
namespace app\index\controller;
use app\index\common\Base;
use think\Db;   // 引用数据库操作类


class Index extends Base
{
    public function index()
    {
        $product1 =Db::query('select * from product where class2=61');
		$product2 =Db::query('select * from product where class2=62');
		$product3 =Db::query('select * from product where class2=63');
		   $news1 =Db::query('select * from news where fid=42');
		      $news2 =Db::query('select * from news where fid=43');
        $this -> view -> assign('product1', $product1);
		 $this -> view -> assign('product2', $product2);
		  $this -> view -> assign('product3', $product3);
		      $this -> view -> assign('news1', $news1);
			  	      $this -> view -> assign('news2', $news2);
	
		      $this -> test();
        return $this->view->fetch('index');
    }


}




