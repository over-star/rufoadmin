@extends('admin::master')
@section('before-css')

@stop
@section('after-css')
    <link rel="stylesheet" href="{{admin_asset('css/bootstrap-multiselect.min.css')}}" />
@stop
@section('content')
    <div class="col-xs-12">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#add-permission" style="margin-bottom: 10px">添加菜单</a>
    </div>
    <div class="widget-body">
        <div class="widget-main">
            <form action="" method="get" class="form-inline">
                <div class="form-group"></div>
                <div class="form-group">
                    <label for="">业务名称</label>
                    <input name="workflow_name" type="text" class="form-control" placeholder="流程名称">
                </div>
                <div class="form-group">
                    <label for="">用户名</label>
                    <input name="wx_name" type="text" class="form-control" placeholder="用户名">
                </div>
                <div class="form-group"></div>
                <div class="form-group">
                    <label for="exampleInputEmail2">流程状态</label>
                    <select class="form-control" name="has_over">
                        <option value="">所有</option>
                        <option value="-1">已结束</option>
                        <option value="1">正在办理</option>
                    </select>
                </div>
                <button type="button" class="btn btn-purple btn-sm">
                    <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                    Search
                </button>
            </form>
        </div>
    </div>

    <div class="col-xs-12">
        <table id="simple-table" class="table  table-bordered table-hover">
            <thead>
            <tr>
                <th class="center">
                    <label class="pos-rel">
                        <input type="checkbox" class="ace">
                        <span class="lbl"></span>
                    </label>
                </th>
                <th>ID</th>
                <th>菜单名称</th>
                <th>菜单路由</th>
                <th>样式匹配规则</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($all as $k=>$v)
            <tr>
                <td class="center">
                    <label class="pos-rel">
                        <input type="checkbox" class="ace">
                        <span class="lbl"></span>
                    </label>
                </td>
                <td>
                    <a href="#">{{$v->id}}</a>
                </td>
                <td>{{$v->name}}</td>
                <td>{{$v->url}}</td>
                <td>{{$v->active_url}}</td>
                <td>
                    <div class="btn-group">
                        <a href="#" class="btn btn-xs btn-warning show-details-btn" title="Show Details">
                                    <i class="ace-icon fa fa-angle-double-down">
                                        快速编辑
                                    </i>
                                    <span class="sr-only">Details</span>
                        </a>
                        <a class="btn btn-xs btn-info"
                           href="{{url('admin/menu/edit',['id'=>$v->id])}}">
                            <i class="ace-icon fa fa-pencil bigger-120">编辑</i>
                        </a>
                        <a class="btn btn-xs btn-danger" data-toggle="modal"  data-target="#confirm-delete"
                           data-href="{{url('admin/menu/destroy',['id'=>$v->id])}}">
                            <i class="ace-icon fa fa-trash-o bigger-120">删除</i>
                        </a>
                    </div>
                </td>
            </tr>
            <tr class="detail-row">
                <td colspan="8">
                    <div class="table-detail">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <div class="space visible-xs"></div>
                                <form>
                                    <div class="profile-user-info profile-user-info-striped">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name">菜单名称</div>
                                            <div class="profile-info-value">
                                            <span>
                                                <input type="text" value="{{$v->name}}" name="name">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="profile-info-row">
                                            <div class="profile-info-name">菜单路由</div>
                                            <div class="profile-info-value">
                                                <input type="text" value="{{$v->url}}" name="url">
                                            </div>
                                        </div>
                                       <div class="profile-info-row">
                                            <div class="profile-info-name">图标</div>
                                            <div class="profile-info-value">
                                                <input type="text" value="{{$v->icon}}" name="icon">
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                                <div class="profile-info-value pull-right">
                                                    <button class="pull-right btn btn-sm btn-primary btn-white btn-round"
                                                            type="button">
                                                        修改
                                                    </button>
                                                </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            @endforelse
            </tbody>
        </table>
        @if(count($all)==0)
            <div class="alert alert-warning">
                <button class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>
                <i class="ace-icon fa fa-hand-o-right"></i>
                没有数据可以显示。。。
            </div>
        @endif
        {{ $all->links() }}
    </div>

    <div class="modal fade" id="add-permission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">添加菜单</h4>
                </div>
                <form action="{{url('admin/menu/create')}}" method="post" class="form-horizontal">
                    <div class="modal-body">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 菜单名称:</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" id="form-field-1" placeholder="" class="col-xs-10 col-sm-10">
                            </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 菜单路由:</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="url" placeholder="" class="col-xs-10 col-sm-10">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 菜单激活的匹配路由:</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="active_url" placeholder="菜单激活active_url" class="col-xs-10 col-sm-10">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 菜单图标:</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="icon" placeholder="fa-tachometer" class="col-xs-10 col-sm-10">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 父菜单:</label>
                            <div class="col-sm-9">
                                <select name="parent_id" class="col-xs-10 col-sm-10">
                                    <option value="0">顶级菜单</option>
                                    @foreach($menus as $k=>$v)
                                        <option value="{{$v->id}}">@if($v->parent_id!=0)---@endif{{$v->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">是否系统菜单:</label>
                            <div class="col-xs-9">
                                <label>
                                    <input name="is_system" value="1" class="ace ace-switch ace-switch-5" type="checkbox">
                                    <span class="lbl"></span>
                                </label>
                            </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">关联权限:</label>
                            <div class="col-sm-9">
                                <select class="col-xs-10 col-sm-10" name="permission_id">
                                    <option value="0">浏览后台</option>
                                @foreach($permissions as $k=>$v)
                                        <option value="{{$v->id}}">{{$v->display_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{--删除探弹框--}}
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    请确认
                </div>
                <div class="modal-body">
                    确认删除该记录吗？
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <a class="btn btn-danger btn-ok">删除记录</a>
                </div>
            </div>
        </div>
    </div>

@stop
@section('after-javascript')
    <script>
        $('.select2').css('width','350px').addClass('tag-input-style');
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>
    <script>
        var active_class = 'active';
        $('#simple-table').find('> thead > tr > th input[type=checkbox]').eq(0).on('click', function () {
            var th_checked = this.checked;//checkbox inside "TH" table header
            $(this).closest('table').find('tbody > tr').each(function () {
                var row = this;
                if (th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
            });
        });
        //select/deselect a row when the checkbox is checked/unchecked
        $('#simple-table').on('click', 'td input[type=checkbox]', function () {
            var $row = $(this).closest('tr');
            if ($row.is('.detail-row')) return;
            if (this.checked) $row.addClass(active_class);
            else $row.removeClass(active_class);
        });
        $('.show-details-btn').on('click', function (e) {
            e.preventDefault();
            $(this).closest('tr').next().toggleClass('open');
            $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
        });
    </script>
@stop
