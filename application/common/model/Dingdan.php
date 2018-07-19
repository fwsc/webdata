<?php
namespace app\common\model;

use think\Model;

class Dingdan extends BaseModel
{
    /**
     * 根据类型来获取列表数据
     * @param $type
     */
    public function getDingdanByType() {
      /* $data = [
            'type' => $type,
            'status' => ['neq', -1],
        ];
        */

        $order = ['id'=>'desc'];

        $result = $this->order($order)->paginate();
        return $result;
    }
}