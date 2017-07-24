@extends('admin::master')
@section('before-css')

@stop
@section('content')
    <div class="alert alert-info">
        <i class="ace-icon fa fa-hand-o-right"></i>
        怎么获取值呢？我就不告诉你呢
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
                <th>日志路径</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($all as $k=>$v)
                <tr>
                    <td>
                        <a href="#">{{$k}}</a>
                    </td>
                    <td>{{$v['file']}}</td>
                    <td>
                        <a  href="{{url('log-viewer/request/detail',[$v['name']])}}" class="btn btn-xs btn-success show-details-btn">
                            <i class="ace-icon fa fa-pencil bigger-120">查看</i>
                        </a>
                        <div class="btn-group">
                            <a onclick="hidden_self($(this))" class="btn btn-xs btn-danger" data-toggle="modal"
                               data-target="#confirm-delete"
                               data-href="{{url('log-viewer/request/detail',[$v['name']])}}">
                                <i class="ace-icon fa fa-trash-o bigger-120">删除</i>
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

@stop
