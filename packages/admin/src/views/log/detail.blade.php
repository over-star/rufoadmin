@extends('admin::master')
@section('before-css')
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
    <div class="col-xs-12">
        <div class="bs-example" data-example-id="collapse-accordion">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        @foreach($all as $k=>$v)
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne_{{$k}}" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                        <p class="text-danger">
                                        {{explode('$$$',$v)[0]}}
                                        </p>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne_{{$k}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    <textarea name="env" class="col-sm-12" rows="20">{!! $v !!}</textarea>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
    </div>
@stop
@section('after-javascript')
    <script type="text/javascript" src="{{asset('vendor/plugins/edit-env/wangEditor/js/wangEditor.js')}}"></script>
@stop
