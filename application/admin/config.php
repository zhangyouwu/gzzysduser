<?php
//后台模块的配置文件
return [

    // 视图输出字符串内容替换
    'view_replace_str'       => [
        //重置_STATIC__常量
        '__STATIC__' => '/static/admin',
    ],
    //自定义success和error的提示页面模板
    // 默认跳转页面对应的模板文件
    'dispatch_success_tmpl'  => THINK_PATH . 'tpl' . DS . 'dispatch_jump.tpl',
    'dispatch_error_tmpl'    => THINK_PATH . 'tpl' . DS . 'dispatch_jump.tpl',

];