@extends('admin::modal_master')

@section('content')
    <div class="alert alert-info">
        <i class="ace-icon fa fa-hand-o-right"></i>
        请选择你要预览的语言
        <button class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
    </div>
@foreach($questionnaire->lang as $v)
    <a href="{{url('questionnaire/preview',[$questionnaire->id,$v])}}" class="btn btn-primary">问卷语言：{{$v}}</a>
@endforeach
@stop

@section('script')
@stop