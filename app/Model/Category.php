<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;



class Category extends Model
{
    protected $table = 'category';
    protected $pk = 'cate_id';
    public $timestamps = false;
    protected $guarded = [];


    public static function createTree($data,$parent_id=0,$level=0)
    {
        if (!$data || !is_array($data)) {
            return;
        }
        static $arr=[];
        foreach ($data as $k=>$v){
            if ($v['parent_id']==$parent_id){
                $v['level']=$level;
                $arr[]=$v;
                self::createTree($data,$v['cate_id'],$level+1);
            }
        }
        return $arr;
    }
    /**
     * 关联插查询
     */
    public function son()
    {
        return $this->hasMany($this,'parent_id','cate_id');
    }
}
