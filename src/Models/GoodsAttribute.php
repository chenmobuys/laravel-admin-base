<?php

namespace Chenmobuys\AdminBase\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsAttribute extends Model
{

    public function getAttrValueAttribute($attr_value)
    {
        return explode(PHP_EOL,$attr_value);
    }

    public function goods_type()
    {
        return $this->hasOne(GoodsType::class, 'id', 'type_id');
    }

    /**
     * @param $query
     * @param $attr_type
     * @return mixed
     */
    public function scopeType($query, $attr_type)
    {
        if (!in_array($attr_type, ['0', '1', '2'])) {
            return $query;
        }

        return $query->where('attr_type', $attr_type);
    }
}
