<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:48:"/webdata/application/index/view/index/enjoy.html";i:1516957327;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"> -->
	<title>新楚门业</title>
	<meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <link rel="shortcut icon"  href="__STATIC__/index/images/lgo.png">
  	<link rel="stylesheet" type="text/css" href="__STATIC__/index/style/base.css">
	<link rel="stylesheet" type="text/css" href="__STATIC__/index/style/enjoy.css">
	<script type="text/javascript" src="__STATIC__/index/js/jq.js"></script>
	<script type="text/javascript" src="__STATIC__/index/js/base.js"></script>
	<script type="text/javascript" src="__STATIC__/index/js/enjoy.js"></script>
</head>
<body>
	<header><!--头部-->
		<div id="top">
			<div id="h_top">
				<h1>
					<!-- <span class="hh1">西安哈雷工贸有限公司</span><br>
					<img src="__STATIC__/index/images/h1.png">
					<span class="hh2"> 
						<em class="xcmmc">新楚木门</em>
						<em class="xcmme">xinchumumen</em>
					</span> -->
					<img src="__STATIC__/index/images/gg.png">
				</h1>
			</div>
			<div id="nav">
				<ul id="nav_true">
					<li><a href="index.html">首页</a></li>
					<li><a href="enjoy.html">款式欣赏</a></li>
					<li><a href="news.html">新闻资讯</a></li>
					<li><a href="contact.html">联系我们</a></li>
				</ul>
				<ul id="nav_copy">
					<li></li>
					<li class="index"></li>
					<li></li>
					<li></li>
				</ul>
			</div>
			
		</div><!--end of top-->
	</header>
	<div id="content">
		<!-- 轮播 -->
		<div id="lunbo">
			<ul>
				<?php if(is_array($lunbo) || $lunbo instanceof \think\Collection): $i = 0; $__LIST__ = $lunbo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<li><a href="###"><img src="__STATIC__/index/images/<?php echo $vo['savename']; ?>" alt="新楚门业图"></a></li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			<!-- 轮播进度 -->
			<div class="index_doc">
				<span class="index_span"></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div><!-- end of index_doc -->
		 </div> <!-- end of lunbo 轮播-->
		<div id="enjoy_content">
			<div class="xilie_nav">
				<img src="__STATIC__/index/images/leftyes.png" alt="" class="left" id="left_img">
				<div class="p_nav">
					<ul >
				<?php if(is_array($series) || $series instanceof \think\Collection): if( count($series)==0 ) : echo "" ;else: foreach($series as $key=>$vo): ?>
						<li><a href="<?php echo url('index/enjoy',['category'=>$vo['category']]); ?>"><?php echo $vo['category']; ?></a></li>
				<?php endforeach; endif; else: echo "" ;endif; ?>			
					</ul>
				</div>
				<img src="__STATIC__/index/images/rightno.png" alt="" class="left_img" id="right_img">
			</div><!--end of p_nav-->
			<div id="hide_hdt">
				<div id="show_img">
				<?php if(is_array($xilie1) || $xilie1 instanceof \think\Collection): if( count($xilie1)==0 ) : echo "" ;else: foreach($xilie1 as $key=>$vo): ?>
					<figure>
						<img src="__STATIC__/index/images/<?php echo $vo['savename']; ?>">
					</figure>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				</div><!--end of show_img-->
			</div>
			
			<div style="width: 1000px; height: 50px; margin: 0 auto;"></div>
		</div><!--end of enjoy_content-->
		<footer>
			<div id="foot">
				<p>西安哈雷工贸有限公司新楚木门</p>
				<span>版权所有 @ 西安哈雷工贸有限公司 备案信息:湘C123456789号 技术支持：新叶网络工作室</span>
				<span>邮箱：123456789@qq.com     电话：12345678911     QQ：123456789     地址：西安市浐灞生态区赵村朝阳工业园区1号院</span>
				<ul>
					<?php if(is_array($link) || $link instanceof \think\Collection): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<li><a href="http://<?php echo $vo['link_addr']; ?>"><?php echo $vo['link_name']; ?></a></li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</footer>
	</div><!--end of content-->
<script type="text/javascript">
	var ENJOY = {
		'static':"__STATIC__",
	};

</script>	
</body>
</html>