<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';
    protected $pk = 'goods_id';
    public $timestamps = false;
    protected $guarded = [];


    public static function createTree($data,$parent_id = 0,$level = 1)
    {
         static $result = [];
        if ($data) {
            foreach ($data as $key => $val) {
                if ($val['parent_id'] == $parent_id) {
                    $val['level'] = $level;
                    $result[] = $val;
                    self::createTree($data,$val['cate_id'],$level+1);
                }
            }
            return $result;
        }
    
    }


    
}
