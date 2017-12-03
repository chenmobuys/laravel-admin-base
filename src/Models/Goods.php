<?php

namespace Chenmobuys\AdminBase\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    public function goods_category()
    {
        return $this->hasOne(GoodsCategory::class, 'id', 'cat_id');
    }

    public function goods_attr_items()
    {
        return $this->hasMany(GoodsAttrItem::class,'goods_id','id');
    }

    public function setGoodsAlbumAttribute($goods_album)
    {
        if (is_array($goods_album)) {
            $this->attributes['goods_album'] = json_encode($goods_album);
        }
    }

    public function getGoodsAlbumAttribute($goods_album)
    {
        return json_decode($goods_album, true);
    }

}