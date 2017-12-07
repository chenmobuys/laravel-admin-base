<?php
namespace Chenmobuys\AdminBase\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    public function category()
    {
        return $this->hasOne(PostsCategory::class,'id','cat_id');
    }
}