<?php
namespace app\admin\controller;
use app\admin\common\Base;
use Endroid\QrCode\QrCode;
/**
 * QRcode 处理
 * Class Qrcodes
 * @package app\admin\controller
 */
class Qrcodes extends Base
{
    /**
     * QRcode动态生成
     * @return mixed
     */
    public function index() {
        return $this->fetch('index',[
            'crumbs'=>[
                ['item'=>0,'url' => '/','name'=>'首页'],
                ['item'=>0,'url' => '/qr-show.html','name'=>'QRcode二维码'],
                ['item'=>1,'url' => '','name'=>'QRcode动态生成']
            ]
        ]);
    }

    /**
     * 动态生成带LOGO的二维码
     * @throws \Endroid\QrCode\Exceptions\DataDoesntExistsException
     * @throws \Endroid\QrCode\Exceptions\ImageFunctionFailedException
     * @throws \Endroid\QrCode\Exceptions\ImageFunctionUnknownException
     * @throws \Endroid\QrCode\Exceptions\ImageTypeInvalidException
     */
    public function qrcode_act_show(){
        $rand_ar = [
            'http://www.mgchen.com/',
            'http://www.mgchen.com/a/35.html',
            'http://www.mgchen.com/a/16.html',
            'http://www.mgchen.com/a/13.html'
        ];
        $rand_titile = [
            'Cocolait',
            'Cocolait_act',
            'Cocolait_rand',
            'Cocolait_blog'
        ];
        $rand_logo = [
            './logo-4.png',
            './logo.png'
        ];
        $qrCode = new QrCode();
        $qrCode
            ->setText($rand_ar[rand(0,3)])      // 设置二维码生成的内容
            ->setSize(240)                      //设置二维码图像生成的尺寸
            ->setPadding(0)                    //设置二维码周围的padding值
            ->setErrorCorrection('high')
            ->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0])
            ->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0])
            ->setLabel($rand_titile[rand(0,3)]) //设置标题
            ->setLabelFontSize(16)       //设置标题文字字体大小
            ->setLogo($rand_logo[rand(0,1)])   //填充LOGO
            ->setLogoSize(60)           //设置logo图片显示的尺寸
            ->setImageType(QrCode::IMAGE_TYPE_PNG);
        //设置输出头部
        header('Content-Type: '.$qrCode->getContentType());
        // 以http方式 访问直接输出
        $qrCode->render();
    }

    /**
     * 动态生成普通二维码
     * @throws \Endroid\QrCode\Exceptions\DataDoesntExistsException
     * @throws \Endroid\QrCode\Exceptions\ImageFunctionFailedException
     * @throws \Endroid\QrCode\Exceptions\ImageFunctionUnknownException
     * @throws \Endroid\QrCode\Exceptions\ImageTypeInvalidException
     */
    public function qrcode_general_show(){
        $rand_ar = [
            'http://www.mgchen.com/',
            'http://www.mgchen.com/a/35.html',
            'http://www.mgchen.com/a/16.html',
            'http://www.mgchen.com/a/13.html'
        ];
        $rand_titile = [
            'cocolait_1',
            'cocolait_2',
            'cocolait_3',
            'cocolait_4'
        ];
        $qrCode = new QrCode();
        $qrCode
            ->setText($rand_ar[rand(0,3)])      // 设置二维码生成的内容
            ->setSize(240)                      //设置二维码图像生成的尺寸
            ->setPadding(0)                    //设置二维码周围的padding值
            ->setErrorCorrection('high')
            ->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0])
            ->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0])
            ->setLabel($rand_titile[rand(0,3)]) //设置标题
            ->setLabelFontSize(16)       //设置标题文字字体大小
            ->setImageType(QrCode::IMAGE_TYPE_PNG);
        //设置输出头部
        header('Content-Type: '.$qrCode->getContentType());
        // 以http方式 访问直接输出
        $qrCode->render();
    }
}
