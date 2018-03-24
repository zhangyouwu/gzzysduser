<?php
namespace app\index\controller;
use app\index\common\Base;
use think\Db;   // 引用数据库操作类

class Caseaa extends Base
{
    public function index()
    {

        return $this->view->fetch('caseaa');
    }

}



