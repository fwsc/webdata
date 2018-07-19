<?php
namespace app\admin\controller;
use think\controller;
use think\Db;
/**
* 	公司简介
*/
class Profile extends Base
{
	function index()
	{


		return $this->fetch('',[
	
		]);
	}	
	function upload()
	{
		$data = input('post.');

		Db::name('profile')->where('id',1)->update($data);
		return $this->success('更改公司简介成功');
	}

}

