@extends('admin::master')
@section('before-css')

@stop
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <div class="error-container">
                <div class="well">
                    <h1 class="grey lighter smaller">
                        <span class="blue bigger-125">
                            <i class="ace-icon fa fa-random"></i>
												500
                        </span>

                    </h1>

                    <hr />
                    <h3 class="lighter smaller">
                                                <span class="red bigger-125">

                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        @else
							不知名的错误！
                        @endif
                        </span>
                        <br>
                        But we are working
                        <i class="ace-icon fa fa-wrench icon-animated-wrench bigger-125"></i>
                        on it!
                    </h3>
                    <div class="space"></div>
                    <div>
                        <h4 class="lighter smaller">我们建议你:</h4>

                        <ul class="list-unstyled spaced inline bigger-110 margin-15">
                            <li>
                                <i class="ace-icon fa fa-hand-o-right blue"></i>
                                <a href="" class="">
                                    联系管理员
                                </a>
                            </li>
                        </ul>
                    </div>

                    <hr />
                    <div class="space"></div>
                </div>
            </div>

            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->

@stop
@section('after-javascript')

@stop
