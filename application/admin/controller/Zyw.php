<?php

namespace app\admin\controller;

use app\admin\common\Base;
use think\Request;
use shuzu\ArrayList;
use Phpqrcode\phpqrcode;
use Endroid\QrCode\QrCode;
use think\Loader;

class Zyw extends Base
{

    /**
     * 生成指定网址的二维码
     * @param string $url 二维码中所代表的网址
     * @param string $label 标签参数
     */
    public function create_qrcode($url="http://www.baidu.com",$label=4)
    {
        $qrCode = new \Endroid\QrCode\QrCode();//创建生成二维码对象
        $qrCode->setText($url)
        ->setSize(150)
        ->setPadding(10)
        ->setErrorCorrection('high')
        ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
        ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
        ->setLabel($label)      //标签
        ->setLabelFontSize(10)  //标签中字体的大小
        ->setImageType(\Endroid\QrCode\QrCode::IMAGE_TYPE_PNG);
        header("Content-type: image/png");
        $qrCode->render();
    }
    public function index()
    {
		Vendor('shuzu.ArrayList');
        $list = ['zyw','zyw','aaa','bbb'];
        $arrayList = new ArrayList($list);
        $arrayList->add('cccc');
        $arrayList->unique();
        echo $arrayList->toJson();
		
       
    }
protected $current_action;
    public function zzz()
    {
        Loader::import("org/Auth", EXTEND_PATH);
        $auth=new \Auth();
        $this->current_action = request()->module().'/'.request()->controller().'/'.lcfirst(request()->action());
        $result = $auth->check($this->current_action,session('user_id'));
        if($result){
            echo "权限验证成功";
        }
    }
	 
	public function rew()
{
      $bundles =new CaptchaType();
	  var_dump($bundles);
}
	
	public function zyw(){
		
		header('Content-type: image/jpeg');
		$builder = new CaptchaBuilder;
		$builder->build();
		$builder->output();
		return $this -> view -> fetch('zyw');
	}

    function qrcode($url="http:www.baidu.com",$size=4){
    Vendor('Phpqrcode.phpqrcode');
    QRcode::png($url,false,QR_ECLEVEL_L,$size,2,false,0xFFFFFF,0x000000);
    }
   
}
