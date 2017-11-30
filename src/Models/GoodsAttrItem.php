<?php

namespace Chenmobuys\AdminBase\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsAttrItem extends Model
{
    public $timestamps = false;

    protected $fillable = ['attr_value', 'attr_id', 'attr_name', 'type_id', 'goods_id'];
}