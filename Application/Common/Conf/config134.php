<?php
return array(
	//'配置�?=>'配置�?

    'TMPL_L_DELIM'          =>  '<!--{',            // 模板引擎普通标签开始标�?
    'TMPL_R_DELIM'          =>  '}-->',            // 模板引擎普通标签结束标�?
    'DEFAULT_FILTER'        =>  'htmlspecialchars','addslashes', // 默认参数过滤方法 用于I函数...

    'DB_TYPE'               =>  'mysql',     // 数据库类�?
    'DB_HOST'               =>  'rm-wz98cpzs4b6r64064.mysql.rds.aliyuncs.com', // 服务器地址
    'DB_NAME'               =>  'sm_db',          // 数据库名
    'DB_USER'               =>  'root',      // 用户�?
    'DB_PWD'                =>  'uAiqwVwjJ8-i',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'tb_',    // 数据库表前缀

    'URL_MODEL'             =>  1,       // URL访问模式,可选参�?�?�?�?,代表以下四种模式�?
    'URL_PATHINFO_DEPR'=>'-',// 更改PATHINFO参数分隔符
    'TMPL_PARSE_STRING' =>  array(
        '__UPLOAD__'=>__ROOT__."/Upload"
    ),

    'HTML_CACHE_ON'     =>    false, // 开启静态缓存
    'HTML_CACHE_TIME'   =>    10,   // 全局静态缓存有效期（秒）
    'HTML_FILE_SUFFIX'  =>    '.shtml', // 设置静态缓存文件后缀
    'HTML_CACHE_RULES'  =>     array(
        'Index:index'=>array('index',30),
    ),

    'URL_ROUTER_ON'   => true, //静态路�?
    'URL_MAP_RULES'=>array(
        'Ziwei' => 'Ziwei/ziwei'
    ),

    //自定义函数
    'LOAD_EXT_FILE' => 'func_public',
);