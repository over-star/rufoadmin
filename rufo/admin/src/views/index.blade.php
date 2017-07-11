@extends('admin::master')
@section('before-css')

@stop
@section('content')
    <div class="page-header">
        <h1>
            Dashboard
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                overview &amp; stats
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="alert alert-block alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>

                <i class="ace-icon fa fa-check green"></i>
                欢迎你登录后台
                <strong class="green">
                    <small>版本(v0.1)</small>
                </strong>
            </div>

            <div class="row">
                <div class="space-6"></div>
                <div class="col-sm-7 infobox-container">
                    <div class="infobox infobox-green">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-comments"></i>
                        </div>

                        <div class="infobox-data">
                            <span class="infobox-data-number">32</span>
                            <div class="infobox-content">comments + 2 reviews</div>
                        </div>

                        <div class="stat stat-success">8%</div>
                    </div>

                    <div class="infobox infobox-blue">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-twitter"></i>
                        </div>

                        <div class="infobox-data">
                            <span class="infobox-data-number">11</span>
                            <div class="infobox-content">new followers</div>
                        </div>

                        <div class="badge badge-success">
                            +32%
                            <i class="ace-icon fa fa-arrow-up"></i>
                        </div>
                    </div>

                    <div class="infobox infobox-pink">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-shopping-cart"></i>
                        </div>

                        <div class="infobox-data">
                            <span class="infobox-data-number">8</span>
                            <div class="infobox-content">new orders</div>
                        </div>
                        <div class="stat stat-important">4%</div>
                    </div>

                    <div class="infobox infobox-red">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-flask"></i>
                        </div>

                        <div class="infobox-data">
                            <span class="infobox-data-number">7</span>
                            <div class="infobox-content">experiments</div>
                        </div>
                    </div>

                    <div class="infobox infobox-orange2">
                        <div class="infobox-chart">
                            <span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"></span>
                        </div>

                        <div class="infobox-data">
                            <span class="infobox-data-number">6,251</span>
                            <div class="infobox-content">pageviews</div>
                        </div>

                        <div class="badge badge-success">
                            7.2%
                            <i class="ace-icon fa fa-arrow-up"></i>
                        </div>
                    </div>

                    <div class="infobox infobox-blue2">
                        <div class="infobox-progress">
                            <div class="easy-pie-chart percentage" data-percent="42" data-size="46">
                                <span class="percent">42</span>%
                            </div>
                        </div>

                        <div class="infobox-data">
                            <span class="infobox-text">traffic used</span>

                            <div class="infobox-content">
                                <span class="bigger-110">~</span>
                                58GB remaining
                            </div>
                        </div>
                    </div>

                    <div class="space-6"></div>

                    <div class="infobox infobox-green infobox-small infobox-dark">
                        <div class="infobox-progress">
                            <div class="easy-pie-chart percentage" data-percent="61" data-size="39">
                                <span class="percent">61</span>%
                            </div>
                        </div>

                        <div class="infobox-data">
                            <div class="infobox-content">Task</div>
                            <div class="infobox-content">Completion</div>
                        </div>
                    </div>

                    <div class="infobox infobox-blue infobox-small infobox-dark">
                        <div class="infobox-chart">
                            <span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
                        </div>

                        <div class="infobox-data">
                            <div class="infobox-content">Earnings</div>
                            <div class="infobox-content">$32,000</div>
                        </div>
                    </div>

                    <div class="infobox infobox-grey infobox-small infobox-dark">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-download"></i>
                        </div>

                        <div class="infobox-data">
                            <div class="infobox-content">Downloads</div>
                            <div class="infobox-content">1,205</div>
                        </div>
                    </div>
                </div>
                <div class="vspace-12-sm"></div>
            </div><!-- /.row -->
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->

@stop
@section('after-javascript')

@stop
