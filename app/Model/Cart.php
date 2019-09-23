<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $pk = 'cart_id';
    public $timestamps = false;
    protected $guarded = [];
}
