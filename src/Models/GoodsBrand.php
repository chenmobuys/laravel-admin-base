<?php

namespace Chenmobuys\AdminBase\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class GoodsBrand extends Model
{
    public $timestamps = false;

    public function goods_categories()
    {
        return $this->belongsToMany(GoodsCategory::class,'goods_brand_categories','brand_id','cat_id');
    }
}