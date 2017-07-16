@extends('admin::master')
@section('before-css')

@stop
@section('content')
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">编辑权限</h4>
            </div>
            <form action="{{url('admin/role/edit',[$id])}}" method="post" class="form-horizontal">
                <div class="modal-body">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 权限标示:</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" id="form-field-1" value="{{$role->name}}" placeholder="权限标识:view-backend" class="col-xs-10 col-sm-10">
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 权限显示名:</label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="display_name" value="{{$role->display_name}}" placeholder="权限显示名" class="col-xs-10 col-sm-10">
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">权限描述:</label>
                        <div class="col-sm-9">
                            <textarea name="description" rows="10" class="col-xs-10 col-sm-10" id="">{{$role->description}}</textarea>
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">关联权限:</label>
                        <div class="col-xs-12 col-sm-9">
                            <select multiple="multiple" id="state" name="permissions[]" class="select2" data-placeholder="Click to Choose...">
                                @foreach($permission as $k=>$v)
                                    <option @foreach($haspremission as $vv)
                                            @if($vv->permission_id==$v->id)  selected @endif
                                            @endforeach value="{{$v->id}}">{{$v->display_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-default" href="{{url('admin/role/index')}}">返回</a>
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>
            </form>
        </div>
@stop
@section('after-javascript')
    <script>
        $('.select2').css('width','350px').select2({allowClear:true}).addClass('tag-input-style');
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>
@stop
