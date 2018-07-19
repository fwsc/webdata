<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:47:"/webdata/application/index/view/index/news.html";i:1516957329;}*/ ?>
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
	<link rel="stylesheet" type="text/css" href="__STATIC__/index/style/news.css">
	<script type="text/javascript" src="__STATIC__/index/js/jq.js"></script>
	<script type="text/javascript" src="__STATIC__/index/js/base.js"></script>
	<!-- <script type="text/javascript" src="js/enjoy.js"></script> -->
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
					<li></li>
					<li class="index"></li>
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
		<div id="page">
<?php echo $news->render(); ?>
		</div><!-- end of page 轮播-->
<?php if(is_array($news) || $news instanceof \think\Collection): if( count($news)==0 ) : echo "" ;else: foreach($news as $key=>$vo): if($key%2 == 0): ?>
		<div class="news_main back_black">
			<div class="news_content">
				<p><?php echo $vo['content']; ?></p>
				<figure>
					<img src="__STATIC__/index/images/<?php echo $vo['savename']; ?>">
				</figure>
			</div>
		</div><!-- end of news_main back_black-->
	<?php else: ?>
		<div class="news_main bac_whilt">
			<div class="news_content">
				<p><?php echo $vo['content']; ?></p>
				<figure>
					<img src="__STATIC__/index/images/<?php echo $vo['savename']; ?>">
				</figure>
			</div>
		</div><!-- end of nnews_main bac_whilt-->
	<?php endif; endforeach; endif; else: echo "" ;endif; ?>
	<?php echo $news->render(); ?>
		<div style=" height: 50px; width: 100%;background: #f2f2f2;"></div>
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
</body>
</html>