<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\File;

class News extends  Base
{

    public function index()
    {
         $results= Db::name('news')->order('id desc')->select();

       
         
      
 
       /* return $this->fetch('',[
            'categorys'=>$categorys,
        ]);*/
       return $this->fetch('',[
          //  'categorys'=>$categorys,
            'results' => $results
        ]);
    }
    public function series()
    {
        $proSeries = Db::name('series')->select();

        return $this->fetch('',[
            'proSeries' => $proSeries
        ]);
    }

    public function add() {
       //系列分类
       $categorys = Db::name('series')->select();
       $data = input('post.'); 
       if ($data) {
        var_dump($data);
        $newsdata['category'] = $data['parent_category'];
        $newsdata['pro_name'] = $data['name'];
        Db::name('news')->insert($newsdata);
        return $this->success("添加成功");
       }else
       {
            return $this->fetch('', [
            'categorys'=> $categorys,
            ]);
       }
    }
    /**
     * 上传产品信息  
     */
public function upload()
    {
        $data = input('post.');
     
        //上传文件
         $file = request()->file('news_pic');

         if (empty($file)) {
             return $this->error('上传失败');
         }
      //设置public绝对路径   
             $rootpublic=$_SERVER['SCRIPT_FILENAME'];
    $rootpublic =  str_replace("index.php", null, $rootpublic);         
        //文件地址
        $info = $file->rule('date')->validate(['size'=>15728640,'ext'=>'jpg,jpeg,png,gif'])->move($rootpublic."public".DS."static".DS."index".DS."images");

        //获取文件名
        $savename = $info->getSaveName();
        
        //保存路径
     /*   $savedata['pic_path'] = ROOT_PATH."public".DS."news".DS.$savename;

        //系列
        $savedata['category'] = $data['parent_category'];

        //保存 保存的文件名
        $savedata['savename'] =$savename;
        //保存自定义文件名
        $savedata['pro_name'] = $data['name'];
*/
        $savedata = [
            'title' => $data['title'],
            'content' => $data['description'],
        //    'pic_path' => ROOT_PATH."public".DS."static".DS."index".DS."images".DS.$savename,
            'savename' => $savename,
        ]; 

        //存入数据库
 
        Db::name('news')->insert($savedata);
        return $this->success('上传成功',url('news/add'));
    }

    /**
     * 编辑页面
     */
    public function edit($id=0) {
        if(intval($id) < 1) {
            $this->error('参数不合法');
        }
        $category = $this->obj->get($id);
        $categorys = $this->obj->getNormalFirstCategory();
        return $this->fetch('', [
            'categorys'=> $categorys,
            'category' => $category,
        ]);
    }

    public function update($data) {
        $res =  $this->obj->save($data, ['id' => intval($data['id'])]);
        if($res) {
            $this->success('更新成功');
        } else {
            $this->error('更新失败');
        }
    }
 public function del()
    {
      $getdel = input('get.');
        $filepath=Db::name("news")->where($getdel)->find();
      //设置public绝对路径   
             $rootpublic=$_SERVER['SCRIPT_FILENAME'];
    $rootpublic =  str_replace("index.php", null, $rootpublic);
        $res = Db::name('news')->where($getdel)->delete();
       if ($res) {
        unlink($rootpublic."public".DS."static".DS."index".DS."images".DS.$filepath['savename']);
         return $this->success("删除成功");
       }
    }



}
