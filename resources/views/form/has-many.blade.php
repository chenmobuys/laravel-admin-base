<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">

        @include('admin::form.error')

        <table class="table table-hover" id="table">
            <thead>
            <tr>
                @foreach($attrs as $attr)
                    @if(!in_array($attr,$hidden))<th>{{ucwords($attr)}}</th>@endif
                @endforeach

                <th width="20">{{ucwords('action')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($value?:[] as $k => $v)
                <tr>
                    @foreach($attrs as $attr)
                        @if(!in_array($attr,$hidden))
                            <td>
                                <input class="form-control {{$class}}" name="{{$name}}[{{$k}}][{{$attr}}]"
                                       {!! $attributes !!} value="{{$v[$attr]}}"/>
                            </td>
                        @endif
                    @endforeach

                    <td>
                        <button type="button" class="btn btn-danger table-field-remove" data-name="{{$name}}[{{$k}}][_remove_]">删除</button>
                    </td>
                </tr>

                @foreach($attrs as $attr)
                    @if(in_array($attr,$hidden))
                        <input type="hidden" name="{{$name}}[{{$k}}][{{$attr}}]" value="{{$v[$attr]}}"/>
                    @endif
                @endforeach
                    <input type="hidden" name="{{$name}}[{{$k}}][_remove_]" value="0"/>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td>
                    <button type="button" class="btn btn-info" id="create">新增</button>
                </td>
                <td></td>
            </tr>
            </tfoot>
        </table>


        @include('admin::form.help-block')

    </div>
</div>

<template id="config-tpl">
    <tr>
        @foreach($attrs as $attr)
            @if(!in_array($attr,$hidden))
                <td>
                    <input class="form-control {{$class}}" name="{{$name}}[__index__][{{$attr}}]"
                           {!! $attributes !!} value=""/>
                </td>
            @endif
        @endforeach

        <td>
            <button type="button" class="btn btn-danger table-field-remove" data-name="{{$name}}[__index__][_remove_]">删除</button>
        </td>
    </tr>
    @foreach($attrs as $attr)
        @if(in_array($attr,$hidden))
            <input type="hidden" name="{{$name}}[__index__][{{$attr}}]" value=""/>
        @endif
    @endforeach
    <input type="hidden" name="{{$name}}[__index__][_remove_]" value="0"/>
</template>
