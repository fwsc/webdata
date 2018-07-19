<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"G:\wamp\www\xiangmu\public/../application/admin\view\category\index.html";i:1510833831;s:71:"G:\wamp\www\xiangmu\public/../application/admin\view\public\header.html";i:1508761816;s:71:"G:\wamp\www\xiangmu\public/../application/admin\view\public\footer.html";i:1486396310;}*/ ?>
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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>每个系列的产品推荐要满足四个，特别是最新的系列(按右边按钮可以刷新)<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a class="btn btn-primary radius" onclick="o2o_s_edit('添加上传','<?php echo url('category/add'); ?>','','300')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加</a></span> <span class="r"></span> </div>

 <div class="mt-20">
    <table class="table table-border table-bordered table-bg table-hover table-sort">
      <thead>
        <tr class="text-c">
          <th>ID</th>
          <th>系列</th>
          <th>图片</th>
          <th>产品名</th>
          <th>是否推荐</th>
          <th>删除</th>
        </tr>
      </thead>
      <tbody>
      	<?php if(is_array($results) || $results instanceof \think\Collection): if( count($results)==0 ) : echo "" ;else: foreach($results as $key=>$vo): ?>
      <tr class="text-c">
      	<td><?php echo $key+1; ?></td>
      	<td><?php echo $vo['category']; ?></td>
      	<td width="300" height="300"><img width="300" height="300" src="__STATIC__/index/images/<?php echo $vo['savename']; ?>"></td>
      	<td><?php echo $vo['pro_name']; ?></td>
        <?php
          if($intid == -1)
            $intid = intval($vo['id']);  
          if($rec == 2)
          $rec = intval($vo['recommend']);
        ?>
      	<td><?php if($rec == 1 and $vo['id'] == $intid): ?>推荐&nbsp;<p><a href="<?php echo url('category/index',['recommend'=>0,'id'=>$vo['id']]); ?>">转为不推荐</a></p>
        <?php elseif($rec == 0 and $vo['id'] == $intid): ?>不推荐&nbsp;<p><a href="<?php echo url('category/index',['recommend'=>1,'id'=>$vo['id']]); ?>">转为推荐</a></p>
      	<?php else: ?>不推荐&nbsp;<p><a href="<?php echo url('category/index',['recommend'=>1,'id'=>$vo['id']]); ?>">转为推荐</a></p>
      	<?php endif; ?>
        </td>
        <td class="td-manage"><a style="text-decoration:none" class="ml-5"  href="<?php echo url('category/dele', ['id'=>$vo['id'],'savename'=>$vo['savename']]); ?>" title="直接删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
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