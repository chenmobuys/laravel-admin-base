<?php

namespace Chenmobuys\AdminBase\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use ModelTree,AdminBuilder;

    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTitleColumn('name');
    }

    public function children()
    {
        return $this->hasMany(Area::class,'parent_id','id');
    }

    public function parent()
    {
        return $this->hasOne(Area::class,'id','parent_id');
    }


}