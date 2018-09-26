<?php
return array(
	//'配置项'=>'配置值'

    'TMPL_L_DELIM'          =>  '<!--{',            // 模板引擎普通标签开始标记
    'TMPL_R_DELIM'          =>  '}-->',            // 模板引擎普通标签结束标记
    'DEFAULT_FILTER'        =>  'htmlspecialchars','addslashes', // 默认参数过滤方法 用于I函数...

    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'db_wedlock',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'tb_',    // 数据库表前缀

    'URL_MODEL'             =>  1,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    'URL_PATHINFO_DEPR'=>'-',// 更改PATHINFO参数分隔符
    'TMPL_PARSE_STRING' =>  array(
        '__UPLOAD__'=>__ROOT__."/Upload"
    ),

    'HTML_CACHE_ON'     =>    true, // 开启静态缓存
    'HTML_CACHE_TIME'   =>    10,   // 全局静态缓存有效期（秒）
    'HTML_FILE_SUFFIX'  =>    '.shtml', // 设置静态缓存文件后缀
    'HTML_CACHE_RULES'  =>     array(
        'Index:index'=>array('index',5),
    ),

    'URL_ROUTER_ON'   => true, //静态路由
    'URL_MAP_RULES'=>array(
        'Index' => 'Index/index'
    ),

    'TMPL_TEMPLATE_SUFFIX'  =>  '.html',

    //自定义函数
    'LOAD_EXT_FILE' => 'func_public',
);