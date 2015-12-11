<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

/**
 * 系统配文件
 * 所有系统级别的配置
 */
return array(
	// 数据库配置
		'DB_TYPE'   => 'mysql', // 数据库类型
		'DB_HOST'   => 'mysql56.rdsmxaxdpurey85.rds.bj.baidubce.com', // 服务器地址
		'DB_NAME'   => 'haozhixian2015', // 数据库名
		'DB_USER'   => 'pchen', // 用户名
		'DB_PWD'    => 'ihmmyhxy14h5i131334l3mj402x3mwljyx430myh',  // 密码
		'DB_PORT'   => '3307', // 端口
		'DB_PREFIX' => 'wp_', // 数据库表前缀
		'DB_PARAMS' => array (
				\PDO::ATTR_CASE => \PDO::CASE_NATURAL
		),

	// 系统数据加密设置
		'DATA_AUTH_KEY' => '>d@+X~!KpYG:QlMg^`-UC(3m&u8FH"ItnT[2|NSf', // 默认数据加密KEY

	// 调试配置
		'SHOW_PAGE_TRACE' => true,
		'PAGE_TRACE_SAVE' => true,

	// 用户相关设置数
		'USER_ADMINISTRATOR' => 1, // 管理员用户ID

	// URL配置
		'URL_CASE_INSENSITIVE' => false, // 默认false 表示URL区分大小写 true则表示不区分大小写
		'URL_MODEL' => 3, // URL模式
		'DIV_DOMAIN' => false, // 泛域名支持,注：在localhost 或者IP地址下访问下无效

	// 全局过滤配置
		'DEFAULT_FILTER' => 'safe', // 全局过滤函数

	// 数据缓存设置
		'DATA_CACHE_PREFIX' => SITE_DIR_NAME . '_', // 缓存前缀
		'DATA_CACHE_TYPE' => 'File', // 数据缓存类型
		'MEMCACHE_HOST' => '127.0.0.1',
		'MEMCACHE_PORT' => 11211,
		'DATA_CACHE_TIMEOUT' => 86400,

		'PICTURE_UPLOAD_DRIVER' => 'Local',

	// 本地上传文件驱动配置
		'UPLOAD_LOCAL_CONFIG' => array (),

	// 七牛上传文件驱动配置
		'UPLOAD_QINIU_CONFIG' => array (
				'accessKey' => '',
				'secrectKey' => '',
				'bucket' => '',
				'domain' => '',
				'timeout' => 3600
		),

	// 百度云上传文件驱动配置
		'UPLOAD_BCS_CONFIG' => array (
				'AccessKey' => '',
				'SecretKey' => '',
				'bucket' => '',
				'rename' => false
		),

	// 图片上传相关配置
		'PICTURE_UPLOAD' => array (
				'maxSize' => 2097152, // 2M 上传的文件大小限制 (0-不做限制)
				'exts' => 'jpg,gif,png,jpeg', // 允许上传的文件后缀
				'rootPath' => './Uploads/Picture/'
		),

	// 编辑器图片上传相关配置
		'EDITOR_UPLOAD' => array (
				'maxSize' => 2097152, // 2M 上传的文件大小限制 (0-不做限制)
				'exts' => 'jpg,gif,png,jpeg', // 允许上传的文件后缀
				'rootPath' => './Uploads/Editor/'
		),

	// 文件上传相关配置
		'DOWNLOAD_UPLOAD' => array (
				'maxSize' => 5242880, // 5M 上传的文件大小限制 (0-不做限制)
				'exts' => 'jpg,gif,png,jpeg,zip,rar,tar,gz,7z,doc,docx,txt,xml,xls,xlsx,csv,pem', // 允许上传的文件后缀
				'rootPath' => './Uploads/Download/'
		),

		'TRACE_PAGE_TABS'=>array(
				'base'=>'基本',
				'file'=>'文件',
				'think'=>'流程',
				'error|debug|sql'=>'调试',
				'user'=>'用户'
		)
);
