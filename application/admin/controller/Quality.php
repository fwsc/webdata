<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;
class Quality extends  Base
{

    public function index() {
      //查询数据
       $quality= Db::name('quality')->order(['id'=>'desc'])->select();


       return $this->fetch('',[
        'quality' => $quality,

       ]);


    }

    public function apply() {
  


      return  $this->fetch();
    }
    public function del()
    {
      $getdel = input('get.');
        $filepath=Db::name("quality")->where($getdel)->find();
      //设置public绝对路径   
             $rootpublic=$_SERVER['SCRIPT_FILENAME'];
    $rootpublic =  str_replace("index.php", null, $rootpublic);
        $res = Db::name('quality')->where($getdel)->delete();
       if ($res) {
        unlink($rootpublic."public".DS."static".DS."index".DS."images".DS.$filepath['savename']);
         return $this->success("删除成功");
       }
    }

    public function upload()
    {
        $data = input('post.');
     
        //上传文件
        $file = request()->file('picfile');
      //设置public绝对路径   
    $rootpublic=$_SERVER['SCRIPT_FILENAME'];
    $rootpublic =  str_replace("index.php", null, $rootpublic);
        //文件地址
        $info = $file->rule('')->validate(['size'=>15728640,'ext'=>'jpg,jpeg,png,gif'])->move($rootpublic."public".DS."static".DS."index".DS."images");

        //获取文件名
        $savename = $info->getSaveName();

        //保存路径
        // $savedata['pic_path'] = ROOT_PATH."public".DS."static".DS."index".DS."images".DS.$savename;

        //自定义的文件名
      //  $savedata['filename'] = $data['filename'];

        //保存数据
        $savedata['content'] = $data['content'];
        //保存获取文件名
        $savedata['savename'] = $savename;
        //存入数据库
  

  Db::name('quality')->insert($savedata);
    return $this->success('上传成功',url('quality/apply'));
    }

}


