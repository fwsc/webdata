<?php
namespace app\common\model;

use think\Model;

class Admin extends Model
{
	public function updateById($data,$id)
	{
		  // allowField 过滤data数组中非数据表中的数据
        return $this->allowField(true)->save($data, ['id'=>$id]);
	}
}