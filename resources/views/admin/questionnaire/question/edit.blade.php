@extends ('admin::master')
@section('before-styles-end')
@stop
@section ('title',   trans('试题编辑'))

@section('page-header')
    <h1>
        试题编辑
    </h1>
@endsection

@section('content')
    <form action="{{url('questionnaire/question/update',[$all[0]->group_number])}}" method='post'>
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">试题编辑</h3>
                <div class="box-tools pull-right">
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <ul class="nav nav-tabs" role="tablist">
                    @foreach($all as $k=>$v)
                        <li role="presentation" class="@if($k==0) active @endif">
                            <a href="#{{$v->lang}}" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">
                                {{$v->lang}}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-1">问题类型:</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="type">
                                <option @if($all[0]->type==1) selected @endif value="1">单选题</option>
                                <option @if($all[0]->type==2) selected @endif value="2">多选题</option>
                                <option @if($all[0]->type==3) selected @endif value="3">填空题</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    @foreach($all as $k=>$v)
                        <div role="tabpanel" class="tab-pane fade @if($k==0)in  active @endif" id="{{$v->lang}}" aria-labelledby="home-tab">
                            <br>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="form-field-1">标题:</label>
                                <div class="col-sm-10">
                                    <input class="col-sm-10 form-control" value="{{$v->title}}" placeholder="标题" name="title[{{$v->lang}}]" type="text">
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="form-field-1">问卷描述:</label>
                                <div class="col-sm-10">
                                    <textarea class="col-xs-10 col-sm-10 form-control" name="description[{{$v->lang}}]" id="" cols="30" rows="5">{{$v->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="bs-example" data-example-id="simple-table">
                                    <table class="table">
                                        <caption class="text-red">注意：请保证每种语言题目数量相等.
                                            选项为空表示该选项由用户输入</caption>
                                        <thead>
                                        <tr>
                                            <th>{{ trans('标识') }}</th>
                                            <th>{{ trans('选项') }}</th>
                                            <th>{{ trans('操作') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody id="parentC">
                                        @foreach($v->questionnaire_question_item as $vv)
                                        <tr>
                                            <th class="col-xs-3">
                                                <input name="item_code[{{$v->lang}}][]" value="{{$vv->mark}}"  type="text" class="form-control"/>
                                            </th>
                                            <th class="col-xs-5">
                                                <input name="item_title[{{$v->lang}}][]" type="text" value="{{$vv->title}}"  class="form-control"/>
                                            </th>
                                            <td>
                                                <a onclick="addNewQuestion($(this))" class="btn btn-xs btn-primary">
                                                    <i class="fa fa-plus">
                                                    </i>
                                                </a>
                                                <a onclick="deleteQuestion($(this))" class="btn btn-xs btn-danger" style="cursor:pointer;">
                                                    <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="删除"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div><!-- /.box-body -->
        </div><!--box-->
        <br>
        <br>
        <br>
        <div class="box box-info">
            <div class="box-body">
                <a  href="javascript:window.history.back(-1); " class="btn btn-danger">
                    返回
                </a>
                {{ csrf_field() }}
                <div class="pull-right">
                    <input type="submit" class="btn btn-success" value="添加"/>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </form>

@stop
@section('after-scripts-end')
    <script type="text/javascript">
        function addNewQuestion(p) {
            $newHtml=p.parent().parent().clone();
            console.log($newHtml);
            p.parent().parent().parent().append($newHtml)
        }
        function deleteQuestion(p) {
            var par,ppar;
            par=p.parent().parent();
            ppar=p.parent().parent().parent();
            if(ppar.children().length==1){
                alert('至少有一个选项！');
                return false;
            }
            par.remove();
        }
    </script>


    <!-- 编辑器容器 -->
@stop
