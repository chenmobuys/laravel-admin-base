@foreach($attributes as $attribute)

    <div class="form-group">

        <label for="" class="col-sm-2 control-label">{{$attribute['attr_name']}}</label>

        <div class="col-sm-8">

            @foreach($attribute['attr_values'] as $v)
            <button type="button" onclick="createDeleteInput(this)" class="btn btn-spec {{in_array($v['id'],$keys)?'btn-primary':'btn-default'}}" data-attr_id="{{$v['attr_id']}}"  data-attr_value_id="{{$v['id']}}">{{$v['attr_value']}}</button>
            @endforeach

        </div>


    </div>

@endforeach