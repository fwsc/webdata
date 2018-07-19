<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;

class Login extends  Controller {

    public $user;
   public function index()
   {
          if(request()->isPost()) {
            // 登录的逻辑
            //获取相关的数据
            $data = input('post.');
            // 通过用户名 获取 用户相关信息
            // 严格的判定

            $ret = model('Admin')->get(['username'=>$data['username']]);
             if (!$ret) {
              $this->error('没有这个用户。');
            }
            if ($ret->password != $data['password']) {
              $this->error('密码错误');
            }
           
           // 保存用户信息  admin是作用域
            $this->user = session('admAccount', $ret, 'admin');
           
//            $this->user2 = session('admAccount','','admin');

        return $this->success('登录成功', url('index/index'));


        }else {
            // 获取session
            $account = session('admAccount', '', 'admin');
            if($account && $account->id) {
                return $this->redirect(url('index/index'));
            }
            return $this->fetch();
        }
   }

   public function tuichu()
   {
    //清除session
    session(null,'admin');

   //跳出
    $this->redirect('login/index');

   }

}