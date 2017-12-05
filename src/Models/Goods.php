<?php

namespace Chenmobuys\AdminBase\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Goods extends Model
{
    public function goods_category()
    {
        return $this->hasOne(GoodsCategory::class, 'id', 'cat_id');
    }

    public function goods_attr_items()
    {
        return $this->hasMany(GoodsAttrItem::class, 'goods_id', 'id');
    }

    public function goods_attr_specs()
    {
        return $this->hasMany(GoodsAttrSpec::class, 'goods_id', 'id');
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

    public static function addAttrItemAndAttrSpec($attr_items, $attr_specs, $goods_id)
    {
        DB::transaction(function () use ($attr_items, $attr_specs, $goods_id) {
            GoodsAttrItem::where('goods_id', $goods_id)->delete();
            if ($attr_items){
                foreach($attr_items as $k => $v){
                    $attr_items[$k]['goods_id'] = $goods_id;
                }
                GoodsAttrItem::insert($attr_items);
            }

            GoodsAttrSpec::where('goods_id', $goods_id)->delete();
            if ($attr_specs) {
                foreach ($attr_specs as $k => $v) {
                    $attr_specs[$k]['goods_id'] = $goods_id;
                }
                GoodsAttrSpec::insert($attr_specs);
            }

        });
    }

}