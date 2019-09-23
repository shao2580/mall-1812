<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $pk = 'cate_id';
    public $timestamps = false;
    protected $guarded = [];


   
}
