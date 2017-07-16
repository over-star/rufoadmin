@extends('admin::master')
@section('before-css')

@stop
@section('content')
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">编辑菜单</h4>
            </div>
            <form action="{{url('admin/menu/edit',[$id])}}" method="post" class="form-horizontal">
                <div class="modal-body">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 菜单名称:</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" id="form-field-1" value="{{$menu->name}}"  class="col-xs-10 col-sm-10">
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 菜单路由:</label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="url" value="{{$menu->url}}" placeholder="菜单路由" class="col-xs-10 col-sm-10">
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">菜单激活样式规则:</label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="active_url" value="{{$menu->active_url}}" placeholder="菜单激活样式规则" class="col-xs-10 col-sm-10">
                        </div>
                    </div>

                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 菜单图标:</label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="icon" value="{{$menu->icon}}" placeholder="fa-tachometer" class="col-xs-10 col-sm-10">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 父菜单:</label>
                        <div class="col-sm-9">
                            <select name="parent_id" class="col-xs-10 col-sm-10">
                                <option value="0">顶级菜单</option>
                                @foreach($menus as $k=>$v)
                                    <option value="{{$v->id}}" @if($menu->parent_id==$v->id) @endif>@if($v->parent_id!=0)---@endif{{$v->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">是否系统菜单:</label>
                        <div class="col-xs-9">
                            <label>
                                <input name="is_system" @if($menu->is_system) checked @endif value="1" class="ace ace-switch ace-switch-5" type="checkbox">
                                <span class="lbl"></span>
                            </label>
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">关联权限:</label>
                        <div class="col-xs-12 col-sm-9">
                            <select id="state" name="permission_id" class="col-sm-10" >
                                <option value="0">浏览后台</option>
                                @foreach($premissions as $k=>$v)
                                    <option @if($menu->permission_id==$v->id)  selected @endif value="{{$v->id}}">{{$v->display_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-default" href="{{url('admin/menu/index')}}">返回</a>
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
