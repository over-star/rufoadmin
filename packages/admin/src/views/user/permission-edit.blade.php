@extends('admin::master')
@section('before-css')

@stop
@section('content')
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">编辑权限</h4>
            </div>
            <form action="{{url('admin/permission/edit',[$id])}}" method="post" class="form-horizontal">
                <div class="modal-body">
                    {!! csrf_field() !!}
                    <input type="hidden"  name="id" value="{{$permission->id}}">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 权限标示:</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" id="form-field-1" value="{{$permission->name}}" placeholder="权限标识:view-backend" class="col-xs-10 col-sm-10">
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 权限显示名:</label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="display_name" value="{{$permission->display_name}}" placeholder="权限显示名" class="col-xs-10 col-sm-10">
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">权限描述:</label>
                        <div class="col-sm-9">
                            <textarea name="description" rows="10" class="col-xs-10 col-sm-10" id="">{{$permission->description}}</textarea>
                        </div>
                    </div>
                    <div class="space-4"></div>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-default" href="{{url('admin/permission/index')}}">返回</a>
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>
            </form>
        </div>
@stop
@section('after-javascript')

@stop
