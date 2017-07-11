@extends('admin::modal_master')

@section('content')
    <form>
        <div class="form-group">
            @foreach($all as $k=>$v)
                @if($v['type']==1)
                    <label for="inputEmail3" class="col-sm-2 control-label">{{$k+1}}.{{$v['title']}}</label>
                    <div class="col-sm-10">
                        @foreach($v['questionnaire_question_item'] as $vv)
                            <label class="radio-inline">
                                <input type="radio" name="" id="inlineRadio1" value="{{$vv['id']}}">{{$vv['title']}}
                            </label>
                        @endforeach
                    </div>
                    @elseif($v['type']==2)
                    <label for="inputEmail3" class="col-sm-2 control-label">{{$k+1}}.{{$v['title']}}</label>
                    <div class="col-sm-10">
                        @foreach($v['questionnaire_question_item'] as $vv)
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox1" value="{{$vv['id']}}">{{$vv['title']}}
                        </label>
                        @endforeach
                    </div>
                @elseif($v['type']==3)
                    <label for="inputEmail3" class="col-sm-2 control-label">{{$k+1}}.{{$v['title']}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="exampleInputEmail3" placeholder="">
                    </div>
                @endif

            @endforeach
        </div>
    </form>
@stop

@section('script')
    <script>
    </script>
@stop