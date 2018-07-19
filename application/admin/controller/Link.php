<?php
namespace app\admin\controller;
use think\controller;
use think\Db;
/**
* 	友情链接
*/
class Link extends Base
{
	function index()
	{
		$results = Db::name('link')->select();

		return $this->fetch('',[
			'results' => $results
		]);
	}	
	function change()
	{
		//获取链接id
		$data = input('get.');
		
		$link = Db::name('link')->where($data)->find();
		$id = intval($data['id']);
		//guding_id传值给模板
		return $this->fetch('',[
			'link' =>$link,
			'id' =>$id
		]);
	}
	function update()
	{
		//更新链接
		$data = input('post.');
		$id = intval($data['id']);
		$data['id'] = $id;
	//更新数据
	Db::name('link')->where('id',$id)->update($data);
	return $this->success('更新成功');

	}
	function add()
	{
		       //链接查询

       $data = input('post.'); 
       if ($data) {

        $linkdata['link_name'] = $data['link_name'];
        $linkdata['link_addr'] = $data['link_addr'];
        Db::name('link')->insert($linkdata);
        return $this->success("添加成功");
       }else
       {
            return $this->fetch('', [

            ]);
       }
	}
    public function del()
    {	//删除链接
      $getdel = input('get.');
     
        $res = Db::name('link')->where($getdel)->delete();
       if ($res) {
         return $this->success("删除成功");
       }
    }	

}

