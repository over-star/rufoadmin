@extends('admin::master')

@section('page-header')
    <h1>试题管理</h1>
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
            <a class="btn btn-primary pull-right"  href="{{url('questionnaire/question/create',[$questionnaire_id])}}">添加试题</a>
            <br>
            <br>
            <br>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>问卷ID</th>
                    <th>试题名</th>
                    <th>试题类型</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all as $v)
                    <tr>
                        <td>{{$v->id}}</td>
                        <td>{{$v->title}}</td>
                        <td>
                        @if($v->type==1)
                                单选题
                            @elseif($v->type==1)
                                多选题
                            @else
                                填空题
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-sm btn-info" href="{{url('questionnaire/question/edit',[$v->group_number])}}">编辑问题</a>
                            <a data-method="delete" data-trans-button-cancel="取消" data-trans-button-confirm="删除" data-trans-title="你确定?" class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find('form').submit();">
                                <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="删除"></i>
                                <form action="{{url('questionnaire/question/delete',[$questionnaire_id,$v->group_number])}}" method="POST" name="delete_item" style="display:none">
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

@stop

@section('script')

@stop