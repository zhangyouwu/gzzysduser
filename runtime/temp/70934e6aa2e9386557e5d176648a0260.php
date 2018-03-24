<?php if (!defined('THINK_PATH')) exit(); /*a:9:{s:89:"G:\myphp_www\PHPTutorial\WWW\gzzysduser\public/../application/admin\view\index\index.html";i:1517360543;s:91:"G:\myphp_www\PHPTutorial\WWW\gzzysduser\public/../application/admin\view\public\header.html";i:1517360545;s:93:"G:\myphp_www\PHPTutorial\WWW\gzzysduser\public/../application/admin\view\public\base_css.html";i:1517360545;s:92:"G:\myphp_www\PHPTutorial\WWW\gzzysduser\public/../application/admin\view\public\base_js.html";i:1517360545;s:95:"G:\myphp_www\PHPTutorial\WWW\gzzysduser\public/../application/admin\view\public\base_jsend.html";i:1517360545;s:88:"G:\myphp_www\PHPTutorial\WWW\gzzysduser\public/../application/admin\view\public\top.html";i:1517360544;s:95:"G:\myphp_www\PHPTutorial\WWW\gzzysduser\public/../application/admin\view\public\admin_menu.html";i:1519372387;s:91:"G:\myphp_www\PHPTutorial\WWW\gzzysduser\public/../application/admin\view\public\footer.html";i:1517360545;s:95:"G:\myphp_www\PHPTutorial\WWW\gzzysduser\public/../application/admin\view\public\bg-changer.html";i:1517360545;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>智越时代综合管理系统！</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="__STATIC__/css/font.css">
	<link rel="stylesheet" href="__STATIC__/css/xadmin.css">
    <!--分页css-->
    <link rel="stylesheet" href="__STATIC__/css/cate.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/Swiper/3.4.2/css/swiper.min.css">
    <style>
/*****logo********/
.adlogo{width:150px;}
.adlogo1{width:150px;}
/*****表格黑色背景********/
.bg11{background-color: rgba(0,0,0,0.4);}
.center{text-align:center;}
.dywid{width:90px}
.wid1{width:150px}

/*****进度条********/
button {
	display: inline-block;
	padding: 6px 12px;
	font-size: 14px;
	line-height: 1.42857143;
	text-align: center;
	cursor: pointer;
	border: 1px solid transparent;
	border-radius: 4px;
	color: #fff;
	background-color: #5bc0de;
}

.main {
	width: 1000px;
	margin: 100px auto;
}

#step {
	margin-bottom: 60px;
}

.btns {
	float: left;
}

.info {
	float: left;
	height: 34px;
	line-height: 34px;
	margin-left: 40px;
	font-size: 28px;
	font-weight: bold;
	color: #928787;
}

.info span {
	color: red;
}
</style>
     <!--
<script src="__STATIC__/js/jquery-1.11.1.min.js"  type="text/javascript"></script>
<!--加载jQuery1.11.1版本-->
<!--
<script>
    var jQuery_1_11_1 = $.noConflict();
    $(function() { jQuery_1_11_1('.flexslider').flexslider();  })
</script>-->

<!--引入boostrap-->
<!--<link rel="stylesheet" type="text/css" href="__STATIC__/lib/bootstrap/css/bootstrap.css" />
<script type="text/javascript" src="__STATIC__/lib/bootstrap/js/bootstrap.js"></script>-->

    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.bootcss.com/Swiper/3.4.2/js/swiper.jquery.min.js"></script>
    <script src="__STATIC__/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="__STATIC__/js/xadmin.js"></script>
     <link rel="stylesheet" type="text/css" href="__STATIC__/jdt/css/jquery.step.css" />
<script src="__STATIC__/jdt/js/jquery.step.min.js"  type="text/javascript"></script>
     <script type="text/javascript" src="__STATIC__/ueditor/ueditor.config.js"></script>
     <script type="text/javascript" src="__STATIC__/ueditor/ueditor.all.min.js"></script>
     <script type="text/javascript" src="__STATIC__/ueditor/lang/zh-cn/zh-cn.js"></script>
    
		<script type="text/javascript" charset="utf-8">
        var editor = new UE.ui.Editor({
            initialFrameHeight : 500,
			initialFrameWidth:1160
        });
        ue = editor.render('editor');
        </script>


</head>
<body>
    <!-- 顶部开始 -->
    <!-- 顶部开始 -->
<div class="container">
    <div class="logo"><a href="./index.html" style="font-size:36px"><img src="__ROOT__/zysd.png" class="adlogo1" >综合管理系统!</a></div>
    <div class="open-nav"><i class="iconfont">&#xe699;</i></div>
    <ul class="layui-nav right" lay-filter="">
        <li class="layui-nav-item">
            <a href="javascript:;">admin</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
                <dd><a href="">个人信息</a></dd>
                <dd><a href="">切换帐号</a></dd>
                <dd><a href="<?php echo url('login/logout'); ?>">退出</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item"><a href="http://www.gzzysd.com" target="_blank"><img src="__ROOT__/logo.png" class="adlogo" ></a></li>
    </ul>
</div>


    <!-- 顶部结束 -->
    <!-- 中部开始 -->
    <div class="wrapper">
        <!-- 左侧菜单开始 -->
<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">
            <li class="list" current>
                <a href="javascript:;"  target="_self">
                    <i class="iconfont">&#xe761;</i>
             	个人中心
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu" style="display:none">
                    <li>
                        <a href="<?php echo url('person/person'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                           	个人基本信息
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('person/edit'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                           	修改个人基本信息
                        </a>
                    </li>
                    
                     <li>
                        <a href="<?php echo url('person/image'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                           	修改头像
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('person/password'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                           	修改密码
                        </a>
                    </li>
                </ul>
            </li>

            <li class="list" >
                <a href="javascript:;">
                  <i class="layui-icon" style="top: 3px;">&#xe628;</i>
                  信息录入
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu" style="display:none">
                    <li>
                        <a href="<?php echo url('admin/create'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                           	员工信息录入
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo url('client/create'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                             客户信息录入
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo url('beian/create'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                             备案信息录入
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo url('website/create'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                             网站进度录入
                        </a>
                    </li>
                     <li>
                        <a href="#">
                            <i class="iconfont">&#xe6a7;</i>
                             员工业绩录入
                        </a>
                    </li>
                </ul>
            </li>



            
            
             <li class="list" >
                <a href="javascript:;">
                      <i class="layui-icon" style="top: 3px;">&#xe62a;</i>
                    信息查看
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?php echo url('admin/report'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            员工信息
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('client/index'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            客户信息
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo url('beian/index'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            备案信息
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('website/index'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            网站信息
                        </a>
                    </li>
                     
                </ul>
            </li>
            
              <li class="list" >
                <a href="javascript:;">
                   <i class="layui-icon" style="top: 3px;">&#xe62c;</i>
          进度管理
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                     <li>
                        <a href="<?php echo url('beian/plan'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            备案进度
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('website/plan'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            网站进度
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('client/noplay'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            未下单网站
                        </a>
                    </li>
                    
                </ul>
            </li>
          
               <li class="list" >
                <a href="javascript:;">
                   <i class="layui-icon" style="top: 3px;">&#xe609;</i>
             资料管理
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                   
                     <li>
                        <a href="<?php echo url('download/create'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                        	添加资料
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo url('download/index'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                           	资料下载
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('download/entry'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                           	修改资料
                        </a>
                    </li>
                </ul>
            </li>
          

           

            
            
           


          
            <li class="list" >
                <a href="javascript:;">
                     <i class="layui-icon">&#xe612;</i>
                    部门管理
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu" style="display:none">
                	 
                    <li>
                        <a href="<?php echo url('admin/bumen1'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            管理层
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo url('admin/bumen2'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                           	商务
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo url('admin/bumen3'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            技术
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('admin/bumen4'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            后勤
                        </a>
                    </li>
                </ul>
            </li>
            
            
               

           

            
            
           


          
            <li class="list" >
                <a href="javascript:;">
                     <i class="layui-icon">&#xe612;</i>
                开发者应用
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu" style="display:none">
                    <li>
                        <a href="<?php echo url('test/index'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            程序员专用
                        </a>
                    </li>
          
                </ul>
            </li>
           
      
            

        </ul>
    </div>
</div>
<!-- 左侧菜单结束 -->
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <blockquote class="layui-elem-quote">
                注意：智越时代V1.1 每个页面都可以独立设置一个背景主题，如果想更换背景，请点击右边的转动框。
            </blockquote>
            <blockquote class="layui-elem-quote">
                欢迎使用智越时代客户管理系统！<span class="f-14">智越时代v1.1</span>联系方式： 0851-85770877
            </blockquote>
            <fieldset class="layui-elem-field layui-field-title site-title">
              <legend><a name="default">信息统计</a></legend>
            </fieldset>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>统计</th>
                        <th>资讯库</th>
                        <th>图片库</th>
                        <th>产品库</th>
                        <th>用户</th>
                        <th>管理员</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>总数</td>
                        <td>92</td>
                        <td>9</td>
                        <td>0</td>
                        <td>8</td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <td>今日</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>昨日</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>本周</td>
                        <td>2</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>本月</td>
                        <td>2</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                </tbody>
            </table>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th colspan="2" scope="col">服务器信息</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th width="30%">服务器计算机名</th>
                        <td><span id="lbServerName">http://127.0.0.1/</span></td>
                    </tr>
                    <tr>
                        <td>服务器IP地址</td>
                        <td>192.168.1.1</td>
                    </tr>
                    <tr>
                        <td>服务器域名</td>
                        <td>x.xuebingsi.com</td>
                    </tr>
                    <tr>
                        <td>服务器端口 </td>
                        <td>80</td>
                    </tr>
                    <tr>
                        <td>服务器IIS版本 </td>
                        <td>Microsoft-IIS/6.0</td>
                    </tr>
                    <tr>
                        <td>本文件所在文件夹 </td>
                        <td>D:\WebSite\HanXiPuTai.com\XinYiCMS.Web\</td>
                    </tr>
                    <tr>
                        <td>服务器操作系统 </td>
                        <td>Microsoft Windows NT 5.2.3790 Service Pack 2</td>
                    </tr>
                    <tr>
                        <td>系统所在文件夹 </td>
                        <td>C:\WINDOWS\system32</td>
                    </tr>
                    <tr>
                        <td>服务器脚本超时时间 </td>
                        <td>30000秒</td>
                    </tr>
                    <tr>
                        <td>服务器的语言种类 </td>
                        <td>Chinese (People's Republic of China)</td>
                    </tr>
                    <tr>
                        <td>.NET Framework 版本 </td>
                        <td>2.050727.3655</td>
                    </tr>
                    <tr>
                        <td>服务器当前时间 </td>
                        <td>2017-01-01 12:06:23</td>
                    </tr>
                    <tr>
                        <td>服务器IE版本 </td>
                        <td>6.0000</td>
                    </tr>
                    <tr>
                        <td>服务器上次启动到现在已运行 </td>
                        <td>7210分钟</td>
                    </tr>
                    <tr>
                        <td>逻辑驱动器 </td>
                        <td>C:\D:\</td>
                    </tr>
                    <tr>
                        <td>CPU 总数 </td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>CPU 类型 </td>
                        <td>x86 Family 6 Model 42 Stepping 1, GenuineIntel</td>
                    </tr>
                    <tr>
                        <td>虚拟内存 </td>
                        <td>52480M</td>
                    </tr>
                    <tr>
                        <td>当前程序占用内存 </td>
                        <td>3.29M</td>
                    </tr>
                    <tr>
                        <td>Asp.net所占内存 </td>
                        <td>51.46M</td>
                    </tr>
                    <tr>
                        <td>当前Session数量 </td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>当前SessionID </td>
                        <td>gznhpwmp34004345jz2q3l45</td>
                    </tr>
                    <tr>
                        <td>当前系统用户名 </td>
                        <td>NETWORK SERVICE</td>
                    </tr>
                </tbody>
            </table>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
    </div>
    <!-- 中部结束 -->
    <!-- 底部开始 -->
    <!-- 底部开始 -->
<div class="footer">
    <div class="copyright">Copyright ©2017 ZhiYue v2.3 All Rights Reserved. 本后台系统由智越时代提供前端技术支持</div>
</div>
<!-- 底部结束 -->
    <!-- 底部结束 -->
    <!-- 背景切换开始 -->
    <!-- 背景切换开始 -->
<div class="bg-changer">
    <div class="swiper-container changer-list">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img class="item" src="__STATIC__/images/a.jpg" alt=""></div>
            <div class="swiper-slide"><img class="item" src="__STATIC__/images/b.jpg" alt=""></div>
            <div class="swiper-slide"><img class="item" src="__STATIC__/images/c.jpg" alt=""></div>
            <div class="swiper-slide"><img class="item" src="__STATIC__/images/d.jpg" alt=""></div>
            <div class="swiper-slide"><img class="item" src="__STATIC__/images/e.jpg" alt=""></div>
            <div class="swiper-slide"><img class="item" src="__STATIC__/images/f.jpg" alt=""></div>
            <div class="swiper-slide"><img class="item" src="__STATIC__/images/g.jpg" alt=""></div>
            <div class="swiper-slide"><img class="item" src="__STATIC__/images/h.jpg" alt=""></div>
            <div class="swiper-slide"><img class="item" src="__STATIC__/images/i.jpg" alt=""></div>
            <div class="swiper-slide"><img class="item" src="__STATIC__/images/j.jpg" alt=""></div>
            <div class="swiper-slide"><img class="item" src="__STATIC__/images/k.jpg" alt=""></div>
            <div class="swiper-slide"><span class="reset">初始化</span></div>
        </div>
    </div>
    <div class="bg-out"></div>
    <div id="changer-set"><i class="iconfont">&#xe696;</i></div>
</div>
<!-- 背景切换结束 -->

    <!-- 背景切换结束 -->

</body>
</html>