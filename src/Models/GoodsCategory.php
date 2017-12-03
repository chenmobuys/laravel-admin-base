<?php
namespace Chenmobuys\AdminBase\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class GoodsCategory extends Model
{
    use ModelTree,AdminBuilder;

    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTitleColumn('cat_name');
    }


}