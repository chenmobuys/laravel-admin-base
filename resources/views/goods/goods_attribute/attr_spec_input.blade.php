<div class="form-group">

    <label class="col-sm-2 control-label">商品规格</label>

    <div class="col-sm-8">

        <table class='table table-bordered' id='spec_input_table'>
            <thead>

            <tr>
                @foreach($attr_ids as $attr_id)
                    <th>{{$attributes[$attr_id]}}</th>
                @endforeach
                <th>价格</th>
                <th>库存</th>
                <th>SKU</th>
            </tr>

            </thead>

            <tbody>

            @foreach($spec_arr as $k => $v)
                <tr>

                    @foreach($v as $kk => $vv)
                        <td style="vertical-align: middle">{{$attr_values[$vv]['attr_value']}}</td>
                        <?php $attr_names[$k][$vv] = $attributes[$attr_values[$vv]['attr_id']] . ":" . $attr_values[$vv]['attr_value'];?>
                    @endforeach
                    <?php
                    ksort($attr_names[$k]);
                    $attr_ids = implode('_', array_keys($attr_names[$k]));
                    $attr_name = implode(' ', $attr_names[$k]);
                    ?>
                    <td><input type="text" name="goods_attr_specs[{{$attr_ids}}][spec_price]" class="form-control" value="{{$spec[$attr_ids]['spec_price'] or ''}}"/>
                    </td>
                    <td><input type="text" name="goods_attr_specs[{{$attr_ids}}][spec_count]" class="form-control" value="{{$spec[$attr_ids]['spec_count'] or ''}}"/>
                    </td>
                    <td><input type="text" name="goods_attr_specs[{{$attr_ids}}][spec_sku]" class="form-control" value="{{$spec[$attr_ids]['spec_sku'] or ''}}"/></td>
                    <input type="hidden" name="goods_attr_specs[{{$attr_ids}}][attr_ids]"  value="{{$attr_ids}}"/>
                    <input type="hidden" name="goods_attr_specs[{{$attr_ids}}][attr_names]" value="{{$attr_name}}"/>
                        <input type="hidden" name="goods_attr_specs[{{$attr_ids}}][goods_id]" value="{{$goods_id}}"/>
                </tr>
            @endforeach

            </tbody>

        </table>

    </div>

</div>