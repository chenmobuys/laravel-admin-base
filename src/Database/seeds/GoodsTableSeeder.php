<?php
namespace Chenmobuys\AdminBase\Database\seeds;

use Chenmobuys\AdminBase\Models\GoodsAttrValue;
use Chenmobuys\AdminBase\Models\GoodsCategory;
use Chenmobuys\AdminBase\Models\GoodsBrand;
use Chenmobuys\AdminBase\Models\GoodsBrandCategory;
use Chenmobuys\AdminBase\Models\Goods;
use Chenmobuys\AdminBase\Models\GoodsAttribute;
use Chenmobuys\AdminBase\Models\GoodsType;

use Illuminate\Database\Seeder;


class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GoodsCategory::truncate();
        $goodsCategory = factory(GoodsCategory::class)->times(30)->make();
        GoodsCategory::insert($goodsCategory->toArray());

        GoodsBrand::truncate();
        $goodsBrand = factory(GoodsBrand::class)->times(35)->make();
        GoodsBrand::insert($goodsBrand->toArray());

        GoodsBrandCategory::truncate();
        $goodsBrandCategory = factory(GoodsBrandCategory::class)->times(35)->make();
        GoodsBrandCategory::insert($goodsBrandCategory->toArray());

        Goods::truncate();
        $goods = factory(Goods::class)->times(100)->make();
        Goods::insert($goods->toArray());

        GoodsType::truncate();
        $goodsType = factory(GoodsType::class)->times(5)->make();
        GoodsType::insert($goodsType->toArray());

        GoodsAttribute::truncate();
        $goodsAttribute = factory(GoodsAttribute::class)->times(35)->make();
        GoodsAttribute::insert($goodsAttribute->toArray());

        GoodsAttrValue::truncate();
        $goodsAttrValue = factory(GoodsAttrValue::class)->times(200)->make();
        GoodsAttrValue::insert($goodsAttrValue->toArray());
    }
}
