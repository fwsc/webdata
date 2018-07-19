<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;

class Category extends  Base
{
    private  $obj;
    private  $order;
    public function _initialize() {
        $this->obj = model("Category");
        $this->order = model("Dingdan");
    }
    public function index()
    {
        //提取数据
         $results= Db::name('product')->order('id desc')->select();

        $intrec = 2;
        $intid = -1;
       $getdata = input('get.');
       if($getdata)
       {
      //传值，改变推荐

       $intid = intval($getdata['id']);
       $intrec = intval($getdata['recommend']);
 
        Db::name('product')->where('id',$intid)->update(['recommend' => $intrec]);

       }
 
       /* return $this->fetch('',[
            'categorys'=>$categorys,
        ]);*/
       return $this->fetch('',[
          //  'categorys'=>$categorys,
            'results' => $results,
            'rec' => $intrec,
            'intid' => $intid
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

        $prodata['category'] = $data['parent_category'];
        $prodata['pro_name'] = $data['name'];
        Db::name('product')->insert($prodata);
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
        //设置public网址路径
              $webpublic=$_SERVER['SCRIPT_NAME'];
    $webpublic =  str_replace("index.php", null, $webpublic);
      //设置public绝对路径   
             $rootpublic=$_SERVER['SCRIPT_FILENAME'];
    $rootpublic =  str_replace("index.php", null, $rootpublic);
        //上传文件
       $file = request()->file('picfile');

        //文件地址
        $info = $file->rule('date')->validate(['size'=>15728640,'ext'=>'jpg,jpeg,png,gif'])->move($rootpublic."public".DS."static".DS."index".DS."images");
 
        //获取文件名
        $savename = $info->getSaveName();
        
        //保存路径
   //     $savedata['cat_pic'] =ROOT_PATH."public".DS."static".DS."index".DS."images".DS.$savename;

        //系列
        $savedata['category'] = $data['parent_category'];

        //保存 保存的文件名
        $savedata['savename'] =$savename;
        //保存自定义文件名
        $savedata['pro_name'] = $data['name'];

        $savedata['recommend'] = intval($data['tuijian']);
        //存入数据库
 
        Db::name('product')->insert($savedata);
        return $this->success('上传成功',url('category/add'));
    }

    /**
     * 编辑页面
     */
    public function edit($id=0) {
   
        return $this->fetch('', [

        ]);
    }
    public function save()
    {
        $data = input('post.');
        if(empty($data))
        {
            return error('没有写系列名称');
        }
        $savedata['category'] = $data['name'];
        //保存到系列表里  
         Db::name('series')->insert($savedata);
         return $this->success('添加成功');
    }

    public function update($data) {
        $res =  $this->obj->save($data, ['id' => intval($data['id'])]);
        if($res) {
            $this->success('更新成功');
        } else {
            $this->error('更新失败');
        }
    }
    public function dele()
    {
        $data=input('get.');
//根目录public
    $rootpublic=$_SERVER['SCRIPT_FILENAME'];
    $rootpublic =  str_replace("index.php", null, $rootpublic);
      
        $res = Db::name('product')->where(['id' => $data['id']])->delete();
        unlink($rootpublic."public".DS."static".DS."index".DS."images".DS.$data['savename']);
        if ($res) {
            $this->success("删除成功");
            # code...
        }else{
            $this->error("删除失败");
        }
    }
    public function xldel()
    {
        $data = input('get.');
        //根目录public
    $rootpublic=$_SERVER['SCRIPT_FILENAME'];
    $rootpublic =  str_replace("index.php", null, $rootpublic);

     $data['id'] = intval($data['id']);
     //调出系列 
      $series = Db::name('series')->where(['id' => $data['id']])->find();
      //系列相关系列删除
    $category = Db::name('product')->where(['category' => $series['category']])->select();
    foreach ($category as $key => $value) 
    {
    Db::name('product')->where('id',$value['id'])->delete(); 
    unlink($rootpublic."public".DS."static".DS."index".DS."images".DS.$value['savename']);
    } 
    //系列删除
        $res = Db::name('series')->where(['id' => $data['id']])->delete();

        
        if ($res) {
            $this->success("删除成功");
            # code...
        }else{
            $this->error("删除失败");
        }        
    }

    // 排序逻辑
    public function listorder($id, $listorder) {
        $res = $this->obj->save(['listorder'=>$listorder], ['id'=>$id]);
        if($res) {
            $this->result($_SERVER['HTTP_REFERER'], 1, 'success');
        }else {
            $this->result($_SERVER['HTTP_REFERER'], 0, '更新失败');
        }
    }


}
