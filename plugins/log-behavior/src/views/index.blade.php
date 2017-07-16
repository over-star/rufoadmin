@extends('admin::master')
@section('after-css')
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/plugins/edit-env/wangEditor/css/wangEditor.min.css')}}">
@stop
@section('content')
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
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
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
                <th>ID</th>
                <th>消息</th>
                <th>用户名</th>
                <th>IP地址</th>
                <th>时间</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($all as $k=>$v)
                <tr>
                    <td>
                        <a href="#">{{$v->id}}</a>
                    </td>
                    <td>{{$v->message}}</td>
                    <td>{{$v->user_id}}</td>
                    <td>
                        <span class="label label-sm label-warning">{{$v->ip}}</span>
                    </td>
                    <td>{{$v->created_at}}</td>
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
                                                <div class="profile-info-name">用户名</div>
                                                <div class="profile-info-value">
                                            <span>
                                                <input type="text" value="{{$v->name}}" name="name">
                                                </span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Location</div>
                                                <div class="profile-info-value">
                                                    <input type="text" value="{{$v->email}}" name="email">
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


@stop
@section('after-javascript')

@stop
