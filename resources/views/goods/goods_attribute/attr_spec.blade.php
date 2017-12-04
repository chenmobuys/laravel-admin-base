@foreach($attributes as $attribute)

    <div class="form-group">

        <label for="" class="col-sm-2 control-label">{{$attribute['attr_name']}}</label>

        <div class="col-sm-8">

            @foreach($attribute['attr_values'] as $value)
            <button type="button" class="btn btn-default" data-attr_id="{{$attribute['id']}}">{{$value}}</button>
            @endforeach

        </div>


    </div>

@endforeach