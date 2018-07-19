<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"E:\wamp\wamp\www\js\webdata/application/index\view\index\index.html";i:1510576654;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>新楚门业</title>
	<!-- <meta name="Generator" content="EditPlus®">
 	 <meta name="Author" content="">
 	 <meta name="Keywords" content="">
  <meta name="Description" content=""> -->
  	<link rel="shortcut icon"  href="__STATIC__/index/images/lgo.png">
  	<link rel="stylesheet" type="text/css" href="__STATIC__/index/style/base.css">
	<link rel="stylesheet" type="text/css" href="__STATIC__/index/style/index.css">
	<script type="text/javascript" src="__STATIC__/index/js/jq.js"></script>
	<script type="text/javascript" src="__STATIC__/index/js/jquery-2.0.2.min.js"></script>
	<script type="text/javascript" src="__STATIC__/index/js/base.js"></script>
	<script type="text/javascript" src="__STATIC__/index/js/index.js"></script>
	<script type="text/javascript" src="__STATIC__/index/js/main.js"></script>
	<style>
	#loading{
		background-color: #374140;
		/*background: #ccc;*/
		height: 100%;
		width: 100%;
		position: fixed;
		z-index: 999;
		margin-top: 0px;
		top: 0px;
	}
	#loading-center{
		width: 100%;
		height: 100%;
		position: relative;
	}
	#loading-center-absolute {
		position: absolute;
		left: 50%;
		top: 50%;
		height: 150px;
		width: 150px;
		margin-top: -75px;
		margin-left: -75px;
	}
	.object{
		width: 20px;
		height: 20px;
		background-color: #FFF;
		float: left;
		margin-right: 20px;
		margin-top: 65px;
		-moz-border-radius: 50% 50% 50% 50%;
		-webkit-border-radius: 50% 50% 50% 50%;
		border-radius: 50% 50% 50% 50%;
	}

	#object_one {	
		-webkit-animation: object_one 1.5s infinite;
		animation: object_one 1.5s infinite;
		}
	#object_two {
		-webkit-animation: object_two 1.5s infinite;
		animation: object_two 1.5s infinite;
		-webkit-animation-delay: 0.25s; 
	    animation-delay: 0.25s;
		}
	#object_three {
	    -webkit-animation: object_three 1.5s infinite;
		animation: object_three 1.5s infinite;
		-webkit-animation-delay: 0.5s;
	    animation-delay: 0.5s;	
		}
	@-webkit-keyframes object_one {
	75% { -webkit-transform: scale(0); }
	}
	@keyframes object_one {

	  75% { 
	    transform: scale(0);
	    -webkit-transform: scale(0);
	  }
	}
	@-webkit-keyframes object_two {
	  75% { -webkit-transform: scale(0); }
	}
	@keyframes object_two {
	  75% { 
	    transform: scale(0);
	    -webkit-transform:  scale(0);
	  }
	}
	@-webkit-keyframes object_three {

	  75% { -webkit-transform: scale(0); }
	}
	@keyframes object_three {

	  75% { 
	    transform: scale(0);
	    -webkit-transform: scale(0);
	  } 
	}
	</style>
</head>
<body>
	<div id="loading">
		<div id="loading-center">
			<div id="loading-center-absolute">
				<div class="object" id="object_one"></div>
				<div class="object" id="object_two"></div>
				<div class="object" id="object_three"></div>
			</div>
		</div>
	</div>
	<header><!--头部-->
		<div id="top">
			<div id="h_top">
				<h1>
					<span class="hh1">西安哈雷工贸有限公司</span><br>
					<img src="__STATIC__/index/images/h1.png">
					<span class="hh2"> 
						<em class="xcmmc">新出木门</em>
						<em class="xcmme">xinchumumen</em>
					</span>
				</h1>
			</div>
			<div id="nav">
				<ul id="nav_copy">
					<li class="index"></li>
					<li></li>
					<li></li>
					<li></li>
				</ul>
				<ul id="nav_true">
					<li><a href="<?php echo url('index/index'); ?>">首页</a></li>
					<li><a href="<?php echo url('index/enjoy'); ?>">款式欣赏</a></li>
					<li><a href="<?php echo url('index/news'); ?>">新闻资讯</a></li>
					<li><a href="<?php echo url('index/contact'); ?>">联系我们</a></li>
				</ul>
			</div><!--end of nav-->
		</div><!--end of top-->
	</header><!--end of header-->
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
		 </div> <!-- end of lunbo -->
		 <!-- 简约自然 品质生活-->
		 <!-- 简约自然 品质生活-->
		<div id="sty_life"><!-- 外面样式-->
			<div id="life" class="yiyang">
				<h2>
					<div class="h_life">
						<div class="s_life">
							<span>简约自然</span>
							<img src="__STATIC__/index/images/lgo.png" alt="图片">
							<span>品质生活</span>
						</div>
						<div class="s_life">
							<span>NATURAL</span>
							<img src="__STATIC__/index/images/and.png" alt="图片">
							<span>LIFE</span>
						</div>
					</div>
				</h2>
				<!-- 可搜索的 -->
				<div class="product" id="product">
					<div class="s_product"> 
						<div class="h_sreach">
							<img src="__STATIC__/index/images/san.png" alt="小图标" id="show_chose"/>
							<span><?php  echo $xilie[0]['category'];   ?></span>
						</div>
						<!-- <img src="images/men1.png" id="show_chose"> -->
						 <div class="r_product c_product">
							<div class="box_animate box2_animate">
								<img src="__STATIC__/index/images/<?php echo $tuijian1['savename']; ?>" class="a_y">
								<div class="p_animate"></div>
								<span class="wenzi"><?php echo $tuijian1['pro_name']; ?></span>
								<figure class="ys_img"><img src="__STATIC__/index/images/ys.png"></figure>
								<figure class="zm_img"><img src="__STATIC__/index/images/zm.png"></figure>
								<figure class="zx_img"><img src="__STATIC__/index/images/ys.png"></figure>
								<figure class="ym_img"><img src="__STATIC__/index/images/ym.png"></figure>
								<a href="<?php echo url('index/enjoy',['category'=>$tuijian1['category']]); ?>" class="jnsb"></a><!--为了让鼠标安全离开-->
							</div> 
						</div> 
						<!-- end of r_ product -->
						<div class="sreach">
							<h3>
								<input type="text" name="" value="<?php  echo $xilie[0]['category'];   ?>" id="product_name"/>
								<img src="__STATIC__/index/images/cha.png" alt="搜索关键字" id="close_sreach" />
							</h3>
							<ul>
					<?php if(is_array($xilie) || $xilie instanceof \think\Collection): $i = 0; $__LIST__ = $xilie;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<li><?php echo $vo['category']; ?></li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</div>
					</div><!-- end of s_product -->
					<div class="r_product m_product" id="">
						<div class="box_animate">
							<img src="__STATIC__/index/images/<?php echo $tuijian2['savename']; ?>" class="a_y">
							<div class="p_animate"></div>
							<span class="wenzi"><?php echo $tuijian2['pro_name']; ?></span>
							<figure class="ys_img"><img src="__STATIC__/index/images/ys.png"></figure>
							<figure class="zm_img"><img src="__STATIC__/index/images/zm.png"></figure>
							<figure class="zx_img"><img src="__STATIC__/index/images/ys.png"></figure>
							<figure class="ym_img"><img src="__STATIC__/index/images/ym.png"></figure>
							<a href="<?php echo url('index/enjoy',['category'=>$tuijian2['category']]); ?>" class="jnsb"></a><!--为了让鼠标安全离开-->
						</div>
					</div><!-- end of s_product -->
					<div class="r_product" id="product">
						<div class="box_animate box2_animate">
							<img src="__STATIC__/index/images/<?php echo $tuijian3['savename']; ?>" class="a_y">
							<div class="p_animate"></div>
							<span class="wenzi"><?php echo $tuijian3['pro_name']; ?></span>
							<figure class="ys_img"><img src="__STATIC__/index/images/ys.png"></figure>
							<figure class="zm_img"><img src="__STATIC__/index/images/zm.png"></figure>
							<figure class="zx_img"><img src="__STATIC__/index/images/ys.png"></figure>
							<figure class="ym_img"><img src="__STATIC__/index/images/ym.png"></figure>
							<a href="<?php echo url('index/enjoy',['category'=>$tuijian3['category']]); ?>" class="jnsb"></a><!--为了让鼠标安全离开-->
						</div>
					</div><!-- end of r_ product -->
					<div class="r_product m_product" id="product1">
						<div class="box_animate">
							<img src="__STATIC__/index/images/<?php echo $tuijian4['savename']; ?>" class="a_y">
							<div class="p_animate"></div>
							<span class="wenzi"><?php echo $tuijian4['pro_name']; ?></span>
							<figure class="ys_img"><img src="__STATIC__/index/images/ys.png"></figure>
							<figure class="zm_img"><img src="__STATIC__/index/images/zm.png"></figure>
							<figure class="zx_img"><img src="__STATIC__/index/images/ys.png"></figure>
							<figure class="ym_img"><img src="__STATIC__/index/images/ym.png"></figure>
							<a href="<?php echo url('index/enjoy',['category'=>$tuijian4['category']]); ?>" class="jnsb"></a><!--为了让鼠标安全离开-->
						</div>
						<div id="more"><a href="<?php echo url('index/enjoy'); ?>">MORE</a></div>
					</div><!-- end of r_ product -->
				</div><!-- end of product -->
			</div><!-- end of yiyang -->
		</div><!-- end of sty_life -->
		 <!-- 钻石品质 历久如新-->
		 <div id="sty_quality"><!-- 外面样式-->
			<div id="quality" class="yiyang">
				<h2>
					<div class="h_life">
						<div class="s_life w_life">
							<span>钻石品质</span>
							<img src="__STATIC__/index/images/lgoa.png" alt="图片">
							<span>历久如新</span>
						</div>
						<div class="s_life w_life">
							<span>DIOMOND</span>
							<img src="__STATIC__/index/images/andh.png" alt="图片">
							<span>DURABLE</span>
						</div>
					</div>
				</h2>
				<div id="c_quality">
					<div class="i_quality one_quality">
						<img src="__STATIC__/index/images/<?php echo $pinzhi1['savename']; ?>" class="big_img">
						<div class="quality_introduce">
							<p><?php echo $pinzhi1['content']; ?></p>
						</div>
						<img src="__STATIC__/index/images/mark.png" alt="小图片" class="sm_img" style="display: none;">
					</div>
					<div class="i_quality two_quality">
						<img src="__STATIC__/index/images/<?php echo $pinzhi2['savename']; ?>" class="big_img">
						<div class="quality_introduce">
							<p><?php echo $pinzhi2['content']; ?></p>
						</div>
						<img src="__STATIC__/index/images/mark.png" alt="小图片" class="sm_img" style="display: none;">
					</div>
					<div class="i_quality three_quality">
						<img src="__STATIC__/index/images/<?php echo $pinzhi3['savename']; ?>" alt="大图" class="big_img">
						<div class="quality_introduce">
							<p><?php echo $pinzhi3['content']; ?></p>
						</div>
						<img src="__STATIC__/index/images/mark.png" alt="小图片" class="sm_img">
					</div>
				</div><!-- end of c_quality -->
			</div><!-- end of yiyang -->
		</div><!-- end of sty_quality -->
		 <!-- 茶余新闻 饭后资讯-->
		 <div id="sty_rise_news">
			<div id="rise_news" class="yiyang">
			<h2>
				<div class="h_life">
					<div class="s_life">
						<span>茶余新闻</span>
						<img src="__STATIC__/index/images/lgo.png" alt="图片">
						<span>饭后资讯</span>
					</div>
					<div class="s_life">
						<span>NEWS</span>
						<img src="__STATIC__/index/images/and.png" alt="图片">
						<span>TEAS</span>
					</div>
				</div>
			</h2>
			<div id="news">
				<ul class="side_nav">
				<?php if(is_array($news) || $news instanceof \think\Collection): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<li><?php echo $vo['title']; ?></li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<div class="h_img">
				<?php if(is_array($news) || $news instanceof \think\Collection): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($key == 0): ?>
					<div class="img_div">
						<?php  $page = intval($key/4)+1;   ?>
						<a href="<?php echo url('index/news',['page'=>$page]); ?>"><img src="__STATIC__/index/images/<?php echo $vo['savename']; ?>" alt="标题一图"></a>
						<p><?php echo $vo['content']; ?><br>

						</p>
					</div>
				<?php else: ?>	
					<div class="img_div hide">
						<?php  $page = intval($key/4)+1;   ?>
					<a href="<?php echo url('index/news',['page'=>$page]); ?>"><img src="__STATIC__/index/images/<?php echo $vo['savename']; ?>" alt="标题一图"></a>
						<p class="news_short"><?php echo $vo['content']; ?><br>

						</p>
					</div>
				<?php endif; endforeach; endif; else: echo "" ;endif; ?>		

			</div><!--end of news-->
			</div><!--end of rise_news-->
		</div><!-- end of sty_rise_news -->
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
	var DIZHI = {
		'dizhi_url':"<?php echo url('index/xl'); ?>",
		'tz':"<?php echo url('index/enjoy'); ?>",
		'static':"__STATIC__",
	};

</script>


</body>
</html>