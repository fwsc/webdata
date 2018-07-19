<?php
namespace app\admin\controller;
use think\Request;
use think\Controller;
use think\Session;
class Index extends  Base
{
    public function index()
    {
        return $this->fetch();
    }
	public function test() {
      
     $huoqu= session::get('admAccount.username');
     var_dump($huoqu);
    

     //   print_r(\Map::getLngLat('北京昌平沙河地铁'));
		 return $this->fetch();
	}
    public function map() {
        return \Map::staticimage('北京昌平沙河地铁');
    }
    public function welcome() {
        //\phpmailer\Email::send('463785435@qq.com','tp5-emaiil','sucess-hala');
        //return '发送邮件成功';
        //return $this->fetch();
        return "这是门业管理后台";
    }
}
