@extends('admin::master')

@section('page-header')
    <h1>
        问卷管理
    </h1>
@endsection

@section('content')

    <div class="alert alert-info">
        <i class="ace-icon fa fa-hand-o-right"></i>
        怎么开发插件呢？我就不告诉你呢
        <button class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
    </div>
    <div class="panel panel-default">

        <div class="panel-body">
            <a class="btn btn-primary pull-right"  href="{{url('questionnaire/create')}}">添加问卷</a>
            <br>
            <br>
            <br>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>问卷名</th>
                    <th>问卷描述</th>
                    <th>添加时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all as $v)
                    <tr>
                        <td>{{$v->id}}</td>
                        <td>{{$v->title}}</td>
                        <td>{{$v->description}}</td>
                        <td>{{$v->created_at}}</td>
                        <td>
                            <a class="btn btn-sm btn-info" href="{{route('questionnaire.edit',[$v->id])}}">编辑问卷</a>
                            <a class="btn btn-sm btn-info" href="{{url('questionnaire/question',[$v->id])}}">添加问题</a>
                            <a onclick="previewQuestionnaire({{$v->id}})" class="btn btn-sm btn-info">预览试卷</a>
                            <a data-method="delete" data-trans-button-cancel="取消" data-trans-button-confirm="删除" data-trans-title="你确定?" class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find('form').submit();">
                                <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="删除"></i>
                                <form action="{{route('questionnaire.destroy',[$v->id])}}" method="POST" name="delete_item" style="display:none">
                                    <input name="_method" value="delete" type="hidden">
                                    {{ csrf_field() }}
                                </form>
                            </a>
                        </td>
                    </tr>
                 @endforeach
                </tbody>
            </table>
        </div>
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

@section('after-scripts-end')
    <script src="{{asset('layer/layer.js')}}"></script>
    <script>
        function previewQuestionnaire(pid) {
            layer.open({
                type: 2,
                title: 'handle',
                shadeClose: true,
                maxmin: true, //开启最大化最小化按钮
                shade: 0.8,
                area: ['680px', '90%'],
                content: '/questionnaire/'+pid,
                cancel: function(index, layero){
                    layer.close(index);
                    //location.reload();
                    return false;
                }
            });
        }
    </script>
@stop