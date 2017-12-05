@foreach($attributes as $attribute)

    <div class="form-group">

        <label for="" class="col-sm-2 control-label">{{$attribute['attr_name']}}</label>

        <div class="col-sm-8">

            @foreach($attribute['attr_values'] as $value)
            <button type="button" onclick="createDeleteInput(this)" class="btn btn-spec btn-default" data-attr_id="{{$attribute['id']}}"  data-attr_value="{{$value}}">{{$value}}</button>
            @endforeach

        </div>


    </div>

@endforeach