<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:55:"/webdata/public/../application/admin/view/news/add.html";i:1510835300;s:60:"/webdata/public/../application/admin/view/public/header.html";i:1508761816;s:60:"/webdata/public/../application/admin/view/public/footer.html";i:1486396310;}*/ ?>
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
上传的文件必须为为JPG，JPEG，png，gif文件格式其中一种，都不能大于15M(按右边按钮可以刷新)
<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
<div class="cl pd-5 bg-1 bk-gray mt-20"> <h1>新闻上传</h1></div>
<article class="page-container">
	<form class="form form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo url('news/upload'); ?>">
	基本信息：
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>新闻标题：</label>
			<div class="formControls col-xs-8 col-sm-3">
				<input type="text" class="input-text" value="" placeholder="" id="" name="title">
			</div>
		</div>
		

		
        <div class="row cl">
              <label class="form-label col-xs-4 col-sm-2">新闻图片：</label>
              <div class="formControls col-xs-8 col-sm-9">
                <input id="file_upload_other"  name="news_pic" type="file" multiple="true" >
                <img style="display: none" id="upload_org_code_img_other" src="" width="150" height="150">
                <input id="file_upload_image_other" name="licence_logo" type="hidden" multiple="true" value="">
              </div>
        </div>
        
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">新闻概要：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<textarea name="description" rows="6" cols="100"></textarea>
			</div>
		</div>


		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button  class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 申请</button>	
			</div>
		</div>
	</form>
</article>

<!--包含尾部文件-->
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
<script type="text/javascript" src="__STATIC__/admin/hui/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="__STATIC__/admin/hui/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="__STATIC__/admin/hui/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script>
 var SCOPE = {
   'city_url' : '<?php echo url('api/city/getCitysByParentId'); ?>',
    'category_url' : '<?php echo url('api/category/getCategoryByParentId'); ?>',
	'uploadify_swf' : '__STATIC__/admin/uploadify/uploadify.swf',
	'image_upload' : '<?php echo url('api/image/upload'); ?>',
 };
</script>
<!--分配编辑器-->
<script>
$(function(){
	var ue = UE.getEditor('editor');
	var ue1 = UE.getEditor('editor1');
});
</script>
</body>
</html>