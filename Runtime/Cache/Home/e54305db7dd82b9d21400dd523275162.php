<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<meta content="<?php echo C('WEB_SITE_KEYWORD');?>" name="keywords"/>
<meta content="<?php echo C('WEB_SITE_DESCRIPTION');?>" name="description"/>
<link rel="shortcut icon" href="<?php echo SITE_URL;?>/favicon.ico">
<title><?php echo empty($page_title) ? C('WEB_SITE_TITLE') : $page_title; ?></title>
<link href="/Public/static/font-awesome/css/font-awesome.min.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/Public/Home/css/base.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/Public/Home/css/module.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/Public/Home/css/weiphp.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/Public/static/bootstrap/js/html5shiv.js?v=<?php echo SITE_VERSION;?>"></script>
<![endif]-->

<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
<!--<![endif]-->
<script type="text/javascript" src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/static/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/Public/static/zclip/ZeroClipboard.min.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/Public/Home/js/dialog.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/Public/Home/js/admin_common.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/Public/Home/js/admin_image.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/Public/static/masonry/masonry.pkgd.min.js"></script>
<script type="text/javascript">
var  IMG_PATH = "/Public/Home/images";
var  STATIC = "/Public/static";
var  ROOT = "";
var  UPLOAD_PICTURE = "<?php echo U('home/File/uploadPicture',array('session_id'=>session_id()));?>";
var  UPLOAD_FILE = "<?php echo U('File/upload',array('session_id'=>session_id()));?>";
</script>
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

</head>
<body>
	<!-- 头部 -->
	<style type="text/css">
  .public_title{
    position: relative;
    top: -18px;
    color: #666;
    font-size: 18px;
    left: 10px;
  }
</style>

<!-- 提示 -->
<div id="top-alert" class="top-alert-tips alert-error" style="display: none;">
  <a class="close" href="javascript:;"><b class="fa fa-times-circle"></b></a>
  <div class="alert-content">这是内容</div>
</div>
<!-- 导航条
================================================== -->
<div class="navbar navbar-inverse navbar-fixed-top">
 	<?php if ($mid ) { $link = M ( 'public_link' )->where ( 'uid=' . $mid )->order ( 'is_use desc' )->select (); foreach ( $link as $l ) { $mp_ids [] = $l ['mp_id']; $is_use [$l ['mp_id']] = $l ['is_use']; } $mp_ids = getSubByKey ( $link, 'mp_id' ); if (! empty ( $mp_ids )) { $mp_ids_list = count ( $mp_ids ); $mp_ids = implode ( ',', $mp_ids ); $map ['id'] = array ( 'in', $mp_ids ); $public_list = M ( 'public' )->where ( $map )->order ( 'FIND_IN_SET(id,"' . $mp_ids . '")' )->select (); $public = $public_list [0]; $token = get_token (); if ($public ['public_id'] && ($is_use [$public ['id']] == 0 || $token == '' || $token == - 1)) { get_token ( $public ['public_id'] ); } unset ( $public_list [0] ); } else { $mp_ids_list=0; } $publicInfo=M('public')->where(array('uid'=>$mid))->find(); $userInfo=getUserInfo($mid); $nowPublicInfo = M('public')->where(array('token'=>get_token()))->find(); } ?>
    <div class="wrap">
    
       <a class="brand" title="<?php echo C('WEB_SITE_TITLE');?>" href="<?php echo U('index/index');?>">
       <?php if($nowPublicInfo['headface_url'] != NULL): ?><img height="52" src="<?php echo (get_cover_url($nowPublicInfo["headface_url"])); ?>"/>
       	<?php else: ?>
       		<img height="52" src="/Public/Home/images/logo.png"/><?php endif; ?>
      <span class="public_title"><?php echo empty($page_title) ? C('WEB_SITE_TITLE') : $nowPublicInfo['public_name']; ?></span>
       </a>
       
       
            <div class="top_nav">
                <?php if(is_login()): ?><ul class="nav" style="margin-right:0">
                    	<?php if($myinfo["is_init"] == 0 ): ?><li><p>该账号配置信息尚未完善，功能还不能使用</p></li>
                    		<?php elseif($myinfo["is_audit"] == 0 and !$reg_audit_switch): ?>
                    		<li><p>该账号配置信息已提交，请等待审核</p></li>
                    		<?php else: ?> 
                    		<?php if(is_array($core_top_menu)): $i = 0; $__LIST__ = $core_top_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($ca["id"]); ?>" class="<?php echo ($ca["class"]); ?>"><a href="<?php echo ($ca["url"]); ?>" target="_blank"><?php echo ($ca["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    	
                    	
                        
                        <li class="dropdown admin_nav">
                            <a href="#" class="dropdown-toggle login-nav" data-toggle="dropdown" style="">
                                <?php if(!empty($userInfo[headface_url])): ?><img class="admin_head" src="<?php echo (get_cover_url($userInfo["headface_url"])); ?>"/>
                                <?php else: ?>
                                    <img class="admin_head" src="/Public/Home/images/default.png"/><?php endif; ?>
                                <?php echo (getShort(get_username($mid),4)); ?><b class="pl_5 fa fa-sort-down"></b>
                            </a>
                            <ul class="dropdown-menu" style="display:none">
                            	<li><a href="<?php echo U ('Home/Public/add',array('id'=>$publicInfo[id]));?>">账号配置</a></li>
                                <li><a href="<?php echo U ('Home/Public/lists');?>">公众号配置</a></li>
                                <li><a href="<?php echo U('User/profile');?>">修改密码</a></li>
                                <li><a href="<?php echo U('User/logout');?>">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php else: ?>
                    <ul class="nav" style="margin-right:0">
                    	<li style="padding-right:20px">你好!欢迎来到<?php echo C('WEB_SITE_TITLE');?></li>
                        <li>
                            <a href="<?php echo U('User/login');?>">登录</a>
                        </li>
                        <li>
                            <a href="<?php echo U('User/register');?>">注册</a>
                        </li>
                        <li>
                            <a href="<?php echo U('admin/index/index');?>" style="padding-right:0">后台入口</a>
                        </li>
                    </ul><?php endif; ?>
            </div>
        </div>
</div>

<script type="text/javascript">
  $(function(){
    $("a[href='http://demo.idouly.com/weiphp3.0/index.php?s=/home/index/main.html&mdm=172']").attr("target","_self");
   
  })
</script>
	<!-- /头部 -->
	
	<!-- 主体 -->
	
<!-- <?php  if(!is_login()){ Cookie ( '__forward__', $_SERVER ['REQUEST_URI'] ); redirect(U('home/user/login',array('from'=>4))); } ?>
 -->
  <?php $m = strtolower(MODULE_NAME); $c = strtolower(CONTROLLER_NAME); $a = strtolower(ACTION_NAME); if(!is_login()){ redirect(U('home/user/login')); } $ad = ucfirst ( parse_name ( $_REQUEST['_addons'], 1 ) ); $navClass[$ad] = 'active'; $navClass[$m.'_'.$c.'_'.$a] = 'active'; $addonList = D ( 'Addons' )->getWeixinList (false, array(), true); $categorys = M ( 'addon_category' )->order ( 'sort asc, id desc' )->select (); foreach($categorys as &$cate){ foreach($addonList as $k=>$a){ if($cate['id']==intval($a['cate_id'])){ $cate['addons'][] = $a; unset($addonList[$k]); } } } ?>
<div id="main-container" class="admin_container">
  
    <div class="sidebar">

     

      <ul class="sidenav">

        <li>
          <a class="sidenav_parent" href="javascript:;"> 
            <img src="https://res.wx.qq.com/mpres/htmledition/images/icon/menu/icon_menu_function.png"/>
            管理</a>
          <ul class="sidenav_sub">
            
              <li class="" data-id=""> <a href="<?php echo U('Home/Public/lists');?>">公众号管理</a><b class="active_arrow"></b></li>
              <li class="" data-id=""> <a href="<?php echo U('Home/WeixinMessage/lists');?>">消息管理</a><b class="active_arrow"></b></li>
              <li class="" data-id=""> <a href="<?php echo addons_url('UserCenter://UserCenter/lists'); ?>">用户管理</a><b class="active_arrow"></b></li>
              <li class="" data-id=""> <a href="<?php echo U('Home/Material/material_lists');?>">素材管理</a><b class="active_arrow"></b></li>
              <li class="" data-id=""> <a href="<?php echo U('Home/Message/add');?>">群发管理</a><b class="active_arrow"></b></li>
            
          </ul>
        </li>  
        
        <?php if(is_array($categorys)): $i = 0; $__LIST__ = $categorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i; if($ca['addons'] != ''): ?><li>
          <a class="sidenav_parent" href="javascript:;"> 
            <img src="https://res.wx.qq.com/mpres/htmledition/images/icon/menu/icon_menu_function.png"/>
            <?php echo ($ca["title"]); ?></a>
          <ul class="sidenav_sub">
            <?php if(is_array($ca["addons"])): $i = 0; $__LIST__ = $ca["addons"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo["class"]); ?>" data-id="<?php echo ($vo["id"]); ?>"> <a href="<?php echo ($vo[addons_url]); ?>"><?php echo ($vo["title"]); ?></a><b class="active_arrow"></b></li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
        </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>

        <!-- <li>
          <?php if(!empty($now_top_menu_name)): ?><a class="sidenav_parent" href="javascript:;"> 
            <img src="https://res.wx.qq.com/mpres/htmledition/images/icon/menu/icon_menu_function.png"/>
            <?php echo ($now_top_menu_name); ?></a><?php endif; ?>
          <ul class="sidenav_sub">
            <?php if(is_array($core_side_menu)): $i = 0; $__LIST__ = $core_side_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo["class"]); ?>" data-id="<?php echo ($vo["id"]); ?>"> <a href="<?php echo ($vo["url"]); ?>"> <?php echo ($vo["title"]); ?> </a><b class="active_arrow"></b></li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
        </li> -->
        
      </ul>
    </div>
 
  <div class="main_body">
    
  <div class="span9 page_message">
  <section id="contents"> 
  	
    <div class="tab-content">
    <?php if(!empty($normal_tips)): ?><p class="normal_tips"><b class="fa fa-info-circle"></b> <?php echo ($normal_tips); ?></p>
		<br/><?php endif; ?> 
    	<?php if(empty($info)): ?><!-- 还没创建店铺 -->
        	<h3><center><br/><br/><br/><br/>你还没有创建店铺，请先<a href="<?php echo U('add');?>">创建店铺</a>！</center></h3>
        <?php else: ?>	
            <div class="shop_base">
            <?php if(!empty($info["logo"])): ?><img src="<?php echo (get_cover_url($info["logo"])); ?>">
            	<?php else: ?>
            	<img alt="默认LOGO" src="/Public/Home/images/smile.png"><?php endif; ?>
                <div class="info">
                    <p class="name"><?php echo ($info["title"]); ?></p>
                    <p><?php echo ($info["intro"]); ?></p>
                    <div class="shop_summary">
                        <span>在售商品: <em><?php echo (intval($count["sale_count"])); ?></em></span>
                        <span>下架商品: <em><?php echo intval($count['total_count']-$count[sale_count]);?></em></span>
                        <span>新订单数: <em style="color:red"><?php echo (intval($order["new_count"])); ?></em></span>
                        <span>总订单数: <em><?php echo (intval($order["total_count"])); ?></em></span>
                    </div>
                </div>
                <div class="right_btn">
                	<a class="btn" href="<?php echo addons_url('Shop://Shop/preview');?>" target="_blank">预览店铺</a>
                    &nbsp;&nbsp;
                    <a class="border-btn" id="copyLink" href="javascript:;" data-clipboard-text="<?php echo addons_url('Shop://Wap/index',array('shop_id'=>$info['id'],'publicid'=>$public_info[id]));?>">复制链接</a>
                    <script type="application/javascript">
                    	$.WeiPHP.initCopyBtn('copyLink');
                    </script>
                </div>
            </div>
            
            <h3>24小时流量趋势</h3>
            <div class="shop_pv" style="height:400px;">
            	
            </div><?php endif; ?>
    </div>
  </section>
  </div>

  </div>
</div>

<script type="text/javascript">
    $(function(){
       
      $("ul.nav li[class='active'] a").attr("target","_self");
       
      var now_url = "<?php echo GetCurUrl(); ?>";  // 获取当前浏览地址
      // alert(now_url);
      $(".sidenav_sub a[href='"+now_url+"']").parent().addClass("active");
       
    })
</script>

	<!-- /主体 -->

	<!-- 底部 -->
	<div class="wrap bottom" style="background:#fff; border-top:#ddd;">
    <p class="copyright">本系统由<a href="http://weiphp.cn" target="_blank">WeiPHP</a>强力驱动</p>
</div>

<script type="text/javascript">
(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "", //当前网站地址
		"APP"    : "/index.php?s=", //当前项目地址
		"PUBLIC" : "/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
})();
</script>
 
<script type="text/javascript" src="/Public/static/highcharts-4.0.1/js/highcharts.js"></script>
<script>
$(function () {
    $('.shop_pv').highcharts({
        chart: {
            type: 'area'
        },
		title: {
            text: ''
        },
        xAxis: {
            categories: [<?php echo ($highcharts["xAxis"]); ?>]
        },
        series: [{
			name:'流量',
            data: [<?php echo ($highcharts["series"]); ?>]
        },{
			name:'订单',
            data: [<?php echo ($highcharts["series2"]); ?>]
        },]
    });
});   	
</script>			
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<?php echo ($tongji_code); ?>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>

	<!-- /底部 -->
</body>
</html>