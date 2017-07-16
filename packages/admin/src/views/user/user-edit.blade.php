@extends('admin::master')
@section('before-css')

@stop
@section('content')
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">编辑用户</h4>
            </div>
            <form action="{{url('admin/user/edit',[$id])}}" method="post" class="form-horizontal">
                <div class="modal-body">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户名:</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" id="form-field-1" value="{{$user->name}}" placeholder="用户名" class="col-xs-10 col-sm-10">
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 邮件:</label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="email" value="{{$user->email}}" placeholder="权限显示名" class="col-xs-10 col-sm-10">
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">关联角色:</label>
                        <div class="col-xs-12 col-sm-9">
                            <select multiple="multiple" id="state" name="roles[]" class="select2 col-sm-10" data-placeholder="Click to Choose...">
                                @foreach($roles as $k=>$v)
                                    <option @foreach($hasroles as $vv)
                                            @if($vv->role_id==$v->id)  selected @endif
                                            @endforeach value="{{$v->id}}">{{$v->display_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-default" href="{{url('admin/user/index')}}">返回</a>
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>
            </form>
        </div>
@stop
@section('after-javascript')
    <script>
        $('.select2').select2({allowClear:true}).addClass('tag-input-style');
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>
@stop
