@extends('admin::master')
@section('after-css')
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/plugins/edit-env/wangEditor/css/wangEditor.min.css')}}">
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
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{url('system/env/update')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group">
            <div class="col-sm-12">
                <textarea name="env" class="col-sm-12" id="div1" style="height:500px;max-height:700px;">{!! $str !!}</textarea>
            </div>
        </div>
        <div class="space-4"></div>
        <div class="col-sm-12">
            <button class="btn btn-lg btn-success">
                <i class="ace-icon fa fa-check"></i>
                保存设置
            </button>
        </div>

    </form>


@stop
@section('after-javascript')
    {{--<script type="text/javascript" src="{{ plugin_assets('edit-env','asset/wangEditor/js/wangEditor.js') }}"></script>--}}
    <script type="text/javascript" src="{{asset('vendor/plugins/edit-env/wangEditor/js/wangEditor.js')}}"></script>
    <script type="text/javascript">
        var editor = new wangEditor('div1');
        editor.create();
    </script>
@stop
