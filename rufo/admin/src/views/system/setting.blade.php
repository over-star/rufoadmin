@extends('admin::master')
@section('before-css')

@stop
@section('content')
    <div class="alert alert-info">
        <i class="ace-icon fa fa-hand-o-right"></i>
        怎么获取值呢？
        <span class="red">使用门面：Setting::get('titile');
        </span>
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
        <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#add-permission" style="margin-bottom: 10px">添加新设置</a>
    </div>

    <div class="col-xs-12">
        <h3 class="header smaller lighter red">设置面板</h3>
        <form action="{{url('system/setting/update')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
        {!! csrf_field() !!}
         @foreach($setting as $v)
             @if($v->type=='text')
                    <input type="hidden" name="id[{{$v->id}}][display_name]" value="{{$v->display_name}}">
                    <input type="hidden" name="id[{{$v->id}}][type]" value="{{$v->type}}">
                    <div class="col-sm-6">
                        <a onclick="$(this).parent().remove()" class="remove" href="#" style="border:solid wheat  ;"><i class=" ace-icon fa fa-times">删除</i></a>

                        <div class="well">
                <h4 class="green smaller lighter">{{$v->display_name}}</h4>
                <div class="form-group">
                    <label for="">设置名称(key)</label>
                    <input name="id[{{$v->id}}][key]" type="text" value="{{$v->key}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">设置值(value)</label>
                    <input name="id[{{$v->id}}][value]" type="text" value="{{$v->value}}" class="form-control">
                </div>
            </div>
            </div>
           @elseif($v->type=='file')
                     <div class="col-sm-6">
                         <input type="hidden" name="id[{{$v->id}}][display_name]" value="{{$v->display_name}}">
                         <input type="hidden" name="id[{{$v->id}}][type]" value="{{$v->type}}">
                         <a onclick="$(this).parent().remove()" class="remove" href="#" style="border:solid wheat  ;"><i class=" ace-icon fa fa-times">删除</i></a>
                         <div class="well well-lg">
                            <h4 class="blue">{{$v->display_name}}</h4>
                            <div class="form-group">
                                <label for="">设置名称(key)</label>
                                <input name="id[{{$v->id}}][key]" value="{{$v->key}}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">设置名称(value)</label>
                                @if($v->value)
                                <label class="ace-file-input ace-file-multiple">
                                    <span class="ace-file-container hide-placeholder selected">
                                        <span class="ace-file-name" data-title="{{$v->value}}">
                                            旧文件:
                                            <img class="middle" width="50px;" height="50px;" src="{{$v->value}}"/>
                                            <i class=" ace-icon fa fa-picture-o file-image"></i>
                                        </span>
                                    </span>
                                </label>
                                @endif
                                <input name="id[{{$v->id}}][value]" value="{{$v->value}}" type="file" class="id-input-file-3" />
                            </div>
                        </div>
                    </div>
          @elseif($v->type=='textarea')
              <input type="hidden" name="id[{{$v->id}}][display_name]" value="{{$v->display_name}}">
              <input type="hidden" name="id[{{$v->id}}][type]" value="{{$v->type}}">

                    <div class="col-sm-6">
                        <a onclick="$(this).parent().remove()" class="remove" href="#" style="border:solid wheat  ;"><i class=" ace-icon fa fa-times">删除</i></a>

                        <div class="well well-lg">
                      <h4 class="red">{{$v->display_name}}</h4>
                      <div class="form-group">
                          <label for="">设置名称(key)</label>
                          <input name="id[{{$v->id}}][key]" value="{{$v->key}}" type="text" class="form-control">
                      </div>
                      <div class="form-group">
                          <label for="">设置名称(value)</label>
                          <textarea class="form-control limited" rows="4" maxlength="50" name="id[{{$v->id}}][value]" >{{$v->value}}</textarea>
                      </div>
                  </div>
              </div>
          @endif
        @endforeach

        <div class="col-sm-12">
            <button class="btn btn-lg btn-success">
                <i class="ace-icon fa fa-check"></i>
                保存设置
            </button>
        </div>

        </form>
    </div>

    <div class="modal fade" id="add-permission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">添加新设置</h4>
                </div>
                <form action="{{url('system/setting/index')}}" method="post" class="form-horizontal">
                    <div class="modal-body">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">后台名称:</label>
                            <div class="col-sm-9">
                                <input type="text" name="display_name" id="form-field-1" placeholder="设置名称" class="col-xs-10 col-sm-10">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">设置名(key):</label>
                            <div class="col-sm-9">
                                <input type="text" name="key" id="form-field-1" placeholder="设置名称" class="col-xs-10 col-sm-10">
                            </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 设置值(value):</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="value" placeholder="设置值" class="col-xs-10 col-sm-10">
                            </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">设置类型:</label>
                            <div class="col-xs-12 col-sm-9">
                                <select name="type" class="col-xs-10 col-sm-10" data-placeholder="Click to Choose...">
                                    @foreach($setting_type as $v)
                                        <option value="{{$v}}">{{$v}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="space-4"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{--删除探弹框--}}
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
