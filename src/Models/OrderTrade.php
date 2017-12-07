<?php
namespace Chenmobuys\AdminBase\Models;

use Illuminate\Database\Eloquent\Model;

class OrderTrade extends Model
{

    public function order_goods()
    {
        return $this->hasMany(OrderGoods::class,'order_id','id');
    }
}