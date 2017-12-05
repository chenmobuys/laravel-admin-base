@foreach($attributes as $k => $attribute)

    <div class="form-group">

        <label for="goods_attribute_type" class="col-sm-2 control-label">{{$attribute['attr_name']}}</label>

        <div class="col-sm-8">
            @if($attribute['attr_input_type'] == 1)
                <input name="goods_attr_items[{{$k}}][attr_value]" class="form-control" value="{{$attribute['value']}}" />
            @elseif($attribute['attr_input_type'] == 2)

                <select name="goods_attr_items[{{$k}}][attr_value]" class="form-control selects"
                        style="width: 100%;">

                    @foreach($attribute['attr_values'] as $val)
                        <option value="{{$attribute['id']}}" {{$attribute['value'] == $val['attr_value']?'selected':''}}>{{$val['attr_value']}}</option>
                    @endforeach

                </select>
            @elseif($attribute['attr_input_type'] == 3)
                <textarea name="goods_attr_items[{{$k}}][attr_value]" class="form-control">{{$attribute['value']}}</textarea>
            @endif

            <input type="hidden" name="goods_attr_items[{{$k}}][attr_name]" value="{{$attribute['attr_name']}}"/>
            <input type="hidden" name="goods_attr_items[{{$k}}][attr_id]" value="{{$attribute['id']}}"/>
            <input type="hidden" name="goods_attr_items[{{$k}}][goods_id]" value="{{$goods_id}}"/>
        </div>


    </div>

@endforeach
