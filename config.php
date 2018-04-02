<?php

/*
 * This file is part of PHP CS Fixer.
 * (c) kcloze <pei.greet@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

$path           = __DIR__ . '/tmp/';

return $options = [
   'path'     => $path,
   /*
    * swoole 配置项
    */
   'swoole'  => [
        //默认允许几个机器人登录
        'workNum'=> 1,
   ],
   /*
    * 下载配置项
    */
   'download' => [
       'image'         => true,
       'voice'         => true,
       'video'         => true,
       'emoticon'      => true,
       'file'          => true,
       'emoticon_path' => $path . 'emoticons', // 表情库路径（PS：表情库为过滤后不重复的表情文件夹）
   ],
   /*
    * 输出配置项
    */
   'console' => [
       'output'  => true, // 是否输出
       'message' => true, // 是否输出接收消息 （若上面为 false 此处无效）
   ],
   /*
    * 日志配置项
    */
   'log'      => [
       'level'         => 'debug',
       'permission'    => 0777,
       'system'        => $path . 'log', // 系统报错日志
       'message'       => $path . 'log', // 消息日志
   ],
   /*
    * 缓存配置项
    */
   'cache' => [
       'default' => 'file', // 缓存设置 （支持 redis 或 file）
       'stores'  => [
           'file' => [
               'driver' => 'file',
               'path'   => $path . 'cache',
           ],
           'redis' => [
               'driver'     => 'redis',
               'connection' => 'default',
           ],
       ],
   ],
   /*
    * 拓展配置
    * ==============================
    * 如果加载拓展则必须加载此配置项
    */
   'extension' => [
       // 管理员配置（必选），优先加载 remark_name
       'admin' => [
           'remark'   => '火星上的罗文',
           'nickname' => '罗文',
       ],
   ],
   'params'=> [
       'tulingApi'=> 'http://www.tuling123.com/openapi/api',
       'tulingKey'=> 'c3107f0a4969472db0d2ccef018845ff',
       'enableWordList' => [
           '114',
       ],
       'disableWordList' => [
           '886114',
       ]
   ],

];
