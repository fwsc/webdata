<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;


class Index extends Controller
{
	//首页
	public function index()
	{
		//$request = Request::instance();

	//	$getpost = input('post.');

	//	var_dump($getpost);
	//	$jieshou = $request->post();
	//	if($jieshou)
	//		var_dump($jieshou);
/*
$arr1 = ['name'=>'夕阳红','img_url'=>'images/1 (7).jpg'];
	 $arr2 = ['name'=>'草木绿','img_url'=>'images/1 (6).jpg'];
	 $arr3 = ['name'=>'自然白','img_url'=>'images/1 (5).jpg'];
	  $arr4 = ['name'=>'清新紫','img_url'=>'images/1 (4).jpg'];
	foreach ( $arr1 as $key => $value ) {  
        $arr1[$key] = urlencode ( $value );  //防止中文乱码
    } 
    $arr5 = [
    		$arr1,$arr2,$arr3,$arr4
    ];
    echo urldecode ( json_encode ( $arr5 ) );  
*/

		//广告数据
		$lunbo = Db::name('ads')->select();
		$xilie = Db::name('series')->select();
		$news = Db::name('news')->select(); 
		foreach ($xilie as $key => $value) {
			$tuijian[$key] = $value['category'];
		}
		$simxilie = Db::name('series')->find();

	
		$product = Db::name('product')->where(['recommend'=>1,'category'=>$simxilie['category']])->order('id desc')->limit(4)->select();

		//第某个推荐位
		$tuijian1 = $product[0];
	
		$tuijian2 = $product[1];
		$tuijian3 = $product[2];
		$tuijian4 = $product[3];

		//品质位
$pinzhi = Db::name('quality')->order('id desc')->select();

		$pinzhi1 = Db::name('quality')->where('id',$pinzhi[0]['id'])->find();
		$pinzhi2 = Db::name('quality')->where('id',$pinzhi[1]['id'])->find();
		$pinzhi3 = Db::name('quality')->where('id',$pinzhi[2]['id'])->find();
		//新闻位
		$news = Db::name('news')->order('id desc')->limit(8)->select();
	//	var_dump($news);

		$link = Db::name('link')->select();

		return $this->fetch('',[
			'lunbo' => $lunbo,
			'tuijian1' => $tuijian1,
			'tuijian2' => $tuijian2,
			'tuijian3' => $tuijian3,
			'tuijian4' => $tuijian4,
			'xilie' => $xilie,
			'pinzhi1' => $pinzhi1,
			'pinzhi2' => $pinzhi2,
			'pinzhi3' => $pinzhi3,			
			'news' => $news,
			'link' => $link,
			'simxilie'=>$simxilie,
		]);
	}
	//款式欣赏
	public function enjoy()
	{
		//轮播		
		$lunbo = Db::name('ads')->select();
		//全部系列
		$series = Db::name('series')->select();
		$simxilie = Db::name('series')->find();		

		$category = input('get.category');
		if ($category) {
			$simxilie['category']=$category;
			# code...
		}
		//初始系列产品
		$xilie1 = Db::name('product')->where('category',$simxilie['category'])->select();


		$link = Db::name('link')->select();
		return $this->fetch('',[
			'lunbo' => $lunbo,
			'series' => $series,
			'link' => $link,
			'xilie1' => $xilie1,
		]);
	}
	//新闻资讯
	public function news()
	{
		$lunbo = Db::name('ads')->select();
		$link = Db::name('link')->select();

		$news = Db::name('news')->order('id desc')->paginate(4);
		return $this->fetch('',[
			'lunbo' => $lunbo,
			'link' => $link,
			'news' => $news,
		]);
	}
	//联系我们
	public function contact()
	{
		$lunbo = Db::name('ads')->select();

		$link = Db::name('link')->select();	
	//公司简介
		$profile = Db::name('profile')->find();

		return $this->fetch('',[
			'lunbo' => $lunbo,
			'link' => $link,	
			'profile' => $profile,		
		]);	
	}
	public function xl()
	{
		$request = Request::instance();
		    //设置public网址路径
		    $webpublic=$_SERVER['SCRIPT_NAME'];
		    $webpublic =  str_replace("index.php", null, $webpublic);
		$getpost = input('post.xilie');
		
	$qushuju = Db::name('product')->where(['recommend' => 1,'category'=>$getpost])->order('id desc')->limit(4)->select();	
foreach ($qushuju as $key => $value) {
	$xin[$key]['name']=$value['pro_name'];
	$xin[$key]['img_url']=$webpublic."public/static/index/images/".$value['savename'];
	$xin[$key]['category']=$getpost;
}

	echo json_encode($xin);  


	//	unlink("/index/images/xxxx.jpg");
		// echo $jieshou;
/*		$arr1 = ['name'=>'夕阳红','img_url'=>'images/1 (7).jpg'];
	 $arr2 = ['name'=>'草木绿','img_url'=>'images/1 (6).jpg'];
	 $arr3 = ['name'=>'自然白','img_url'=>'images/1 (5).jpg'];
	  $arr4 = ['name'=>'清新紫','img_url'=>'images/1 (4).jpg'];
	foreach ( $arr1 as $key => $value ) {  
        $arr1[$key] = urlencode ( $value );  //防止中文乱码
    } 
    $arr5 = [
    		$arr1,$arr2,$arr3,$arr4
    ];
    echo urldecode ( json_encode ( $arr5 ) );  
	*/
	}
	public function test()
	{

		return $this->fetch();
	}
}