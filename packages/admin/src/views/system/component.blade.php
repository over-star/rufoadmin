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
        <h3 class="header smaller lighter red">组件库</h3>
    </div>
    <input name="" value="" type="file" class="id-input-file-3" />

@stop
@section('after-javascript')
    <script>
        $('.id-input-file-3').ace_file_input({
            style: 'well',
            btn_choose: 'Drop files here or click to choose',
            btn_change: null,
            no_icon: 'ace-icon fa fa-cloud-upload',
            droppable: true,
            thumbnail: 'small',
            preview_error : function(filename, error_code) {

            }
        }).on('change', function(){

        });
    </script>
@stop
