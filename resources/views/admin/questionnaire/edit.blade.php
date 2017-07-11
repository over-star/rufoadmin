@extends('admin::master')
@section('before-css')

@stop
@section('content')
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">编辑问卷</h4>
        </div>
        <form action="{{route('questionnaire.update',[$one->id])}}" method="post" class="form-horizontal">
            <div class="modal-body">
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right"> 问卷标题:</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" value="{{$one->title}}" placeholder="问卷标题" class="form-control col-xs-10 col-sm-10">
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 问卷描述:</label>
                    <div class="col-sm-9">
                        <textarea class="col-xs-10 col-sm-10 form-control" name="description" id="" cols="30" rows="5">{{$one->description}}</textarea>
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 问卷语言:</label>
                    <div class="col-sm-9">
                        <div class="col-sm-9">
                            <label class="checkbox-inline">
                                <input type="checkbox" @if(in_array("zh",$one->lang)) checked @endif name="lang[]" value="zh"> 中文
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" @if(in_array("jp",$one->lang)) checked @endif name="lang[]" value="jp"> 日语
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" @if(in_array("en",$one->lang)) checked @endif name="lang[]" value="en"> 英语
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-default" href="javascript:window.history.back(-1); ">返回</a>
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
        </form>
    </div>
@stop
@section('after-javascript')
@stop
