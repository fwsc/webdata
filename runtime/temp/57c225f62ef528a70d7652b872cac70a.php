<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"G:\wamp\www\xiangmu\public/../application/admin\view\link\index.html";i:1510833660;s:71:"G:\wamp\www\xiangmu\public/../application/admin\view\public\header.html";i:1508761816;s:71:"G:\wamp\www\xiangmu\public/../application/admin\view\public\footer.html";i:1486396310;}*/ ?>
<!--包含头部文件-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/static/h-ui.admin/css/style.css" />
  <link rel="stylesheet" type="text/css" href="__STATIC__/admin/css/common.css" />
  <link rel="stylesheet" type="text/css" href="__STATIC__/admin/uploadify/uploadify.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>新楚门业后台管理员管理</title>
<meta name="keywords" content="tp5打造门平台系统">
<meta name="description" content="o2o门平台">
</head>
	<link rel="stylesheet" type="text/css" href="__STATIC__/index/style/base.css">
	<link rel="stylesheet" type="text/css" href="__STATIC__/index/style/library_base.css">
	<script type="text/javascript" src="__STATIC__/index/js_lp/library_base.js"></script>
	<script type="text/javascript" src="__STATIC__/index/js_lp/jq_lp.js"></script>
	<script type="text/javascript" src="__STATIC__/index/js_lp/anima.js"></script>
<body>
<nav class="breadcrumb"><a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a><i class="Hui-iconfont">&#xe67f;(按右边按钮可以刷新)</nav>
<div class="page-container">
	
  <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a class="btn btn-primary radius" onclick="o2o_s_edit('添加链接','<?php echo url('link/add'); ?>','','300')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加</a></span> <span class="r"></span> </div>

 <div class="mt-20">
    <table class="table table-border table-bordered table-bg table-hover table-sort">
      <thead>
        <tr class="text-c">
          <th>ID</th>
          <th>链接网站名</th>
          <th>链接网址</th>
          <th>更改</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      	<?php if(is_array($results) || $results instanceof \think\Collection): if( count($results)==0 ) : echo "" ;else: foreach($results as $key=>$vo): ?>
      <tr class="text-c">
      	<td><?php echo $key+1; ?></td>
      	<td><?php echo $vo['link_name']; ?></td>
      	<td><?php echo $vo['link_addr']; ?></td>
        <td class="td-manage"><a style="text-decoration:none" class="ml-5"  onclick="o2o_s_edit('更改<?php echo $vo['link_name']; ?>链接','<?php echo url('link/change', ['id'=>$vo['id']]); ?>','','300')" title="更改"><i class="Hui-iconfont">更改</i></a></td>
        <td class="td-manage"> <a style="text-decoration:none" class="ml-5"  href="<?php echo url('link/del', ['id'=>$vo['id']]); ?>" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
      </tr>
      <?php endforeach; endif; else: echo "" ;endif; ?>       
      </tbody>
    </table>
  </div>
 
</div>

<!--包含头部文件-->
<script type="text/javascript" src="__STATIC__/admin/hui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/admin/hui/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/hui/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/hui/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/hui/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="__STATIC__/admin/hui/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>  
<script type="text/javascript" src="__STATIC__/admin/hui/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/hui/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="__STATIC__/admin/js/common.js"></script>
<script type="text/javascript" src="__STATIC__/admin/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="__STATIC__/admin/js/image.js"></script>

</body>
</html>