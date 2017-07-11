@extends('admin::master')
@section('before-css')

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
        <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#add-permission" style="margin-bottom: 10px">添加权限</a>
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
                <th>id</th>
                <th>name</th>
                <th>display_name</th>
                <th>description</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($all as $k=>$v)
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
                <td>{{$v->display_name}}</td>
                <td>{{$v->description}}</td>
                <td>
                    <div class="btn-group">
                        <a href="#" class="btn btn-xs btn-warning show-details-btn" title="Show Details">
                                    <i class="ace-icon fa fa-angle-double-down">
                                        快速编辑
                                    </i>
                                    <span class="sr-only">Details</span>
                        </a>
                        <a class="btn btn-xs btn-info"
                           href="{{url('admin/permission/edit',['id'=>$v->id])}}">
                            <i class="ace-icon fa fa-pencil bigger-120">编辑</i>
                        </a>
                        <a class="btn btn-xs btn-danger" data-toggle="modal"  data-target="#confirm-delete"
                           data-href="{{url('admin/permission/destroy',['id'=>$v->id])}}">
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
                                            <div class="profile-info-name">标识</div>
                                            <div class="profile-info-value">
                                            <span>
                                                <input type="text" value="{{$v->name}}">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="profile-info-row">
                                            <div class="profile-info-name">显示名称</div>
                                            <div class="profile-info-value">
                                                <input type="text" value="{{$v->display_name}}">
                                            </div>
                                        </div>
                                        <div class="profile-info-row">
                                            <div class="profile-info-name">描述</div>
                                            <div class="profile-info-value">
                                                <input type="text" value="{{$v->description}}">
                                            </div>
                                        </div>
                                        <div class="profile-info-row">
                                            <div class="profile-info-value">
                                                <div class="profile-info-value">
                                                    <button class="pull-right btn btn-sm btn-primary btn-white btn-round"
                                                            type="button">
                                                        提价
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
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
                    <h4 class="modal-title" id="myModalLabel">添加权限</h4>
                </div>
                <form action="{{url('admin/permission/create')}}" method="post" class="form-horizontal">
                    <div class="modal-body">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 权限标示:</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" id="form-field-1" placeholder="权限标识:view-backend" class="col-xs-10 col-sm-10">
                            </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 权限显示名:</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="display_name" placeholder="权限显示名" class="col-xs-10 col-sm-10">
                            </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">权限描述:</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="" cols="45" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="space-4"></div>
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
        $("#edit-permission").on("hidden.bs.modal", function() {
            $(this).removeData("bs.modal");
        });
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
