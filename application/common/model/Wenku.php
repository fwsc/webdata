<?php
namespace app\common\model;

use think\Model;

class Wenku extends Model
{
    /**
     * 根据上传类型来获取列表数据
     * @param $type
     */
 /*   
    public function getWenkuByUpclass($upclass) {
        $data = [
            'upclass' => $upclass,
        ];

        $order = ['id'=>'desc'];

        $result = $this->where($data)
            ->order($order)
            ->paginate();
        return $result;
    }
        */
    public function getWenkuByDownload($upclass,$paixu)
    {
        $data=[
            'upclass' => $upclass,

        ];
        if ($paixu == 0) {
           $order = ['id'=>'desc'];
        }else{
           $order = ['download' => 'desc'];
        }
       

        $result = $this->where($data)
            ->order($order)
            ->paginate();
            return $result;
    }
}