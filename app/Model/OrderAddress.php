<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
class OrderAddress

extends Model
{
    protected $table = 'order_address';
    protected $pk = 'id';
    public $timestamps = false;
    protected $guarded =[];

  
}
