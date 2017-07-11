@extends('admin::master')
@section('before-css')

@stop
@section('content')
    <div class="alert alert-info">
        <i class="ace-icon fa fa-hand-o-right"></i>
        怎么开发插件呢？我就不告诉你呢
        <button class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
            <button class="close" data-dismiss="alert">
                <i class="ace-icon fa fa-times"></i>
            </button>
        </div>
    @endif
    <div class="col-xs-12">
        <table id="simple-table" class="table  table-bordered table-hover">
            <thead>
            <tr>
                <th>id</th>
                <th>插件唯一标示</th>
                <th>插件名称</th>
                <th>作者</th>
                <th>插件所属命名空间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($all as $k=>$v)
                <tr>
                    <td>
                        <a href="#">{{$k}}</a>
                    </td>
                    <td>{{$v['name']}}</td>
                    <td>{{$v['title']}}</td>
                    <td>{{$v['author']}}</td>
                    <td>{{$v['namespace']}}</td>
                    <td>
                        <div class="btn-group">
                            @if($v['isEnabled'])
                                <a onclick="hidden_self($(this))" class="btn btn-xs btn-warning"
                                   href="{{url('system/plugins/disable',[$v['name']])}}">
                                    <i class="ace-icon fa fa-pencil bigger-120">禁用插件</i>
                                </a>
                            @else
                                <a onclick="hidden_self($(this))" href="{{url('system/plugins/enable',[$v['name']])}}" class="btn btn-xs btn-success show-details-btn">
                                    <i class="ace-icon fa fa-pencil bigger-120">启用插件</i>
                                </a>
                            @endif
                                <a onclick="hidden_self($(this))" class="btn btn-xs btn-danger" data-toggle="modal"  data-target="#confirm-delete"
                                   data-href="{{url('system/plugins/uninstall',[$v['name']])}}">
                                    <i class="ace-icon fa fa-trash-o bigger-120">删除插件</i>
                                </a>
                        </div>
                    </td>
                </tr>
             @endforeach
            </tbody>
        </table>
    </div>
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
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
        function hidden_self(_this){
            _this.remove();
        }
    </script>
@stop
