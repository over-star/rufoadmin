<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @yield('before-css')
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{admin_asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{admin_asset('font-awesome/4.5.0/css/font-awesome.min.css')}}"/>
    <!-- page specific plugin styles -->
    <!-- text fonts -->
    <link rel="stylesheet" href="{{admin_asset('css/fonts.googleapis.com.css')}}" />
    <!-- ace styles -->
    <link rel="stylesheet" href="{{admin_asset('css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{admin_asset('css/ace-part2.min.css')}}" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="{{admin_asset('css/ace-skins.min.css')}}" />
    <link rel="stylesheet" href="{{admin_asset('css/ace-rtl.min.css')}}" />
    <link rel="stylesheet" href="{{admin_asset('css/select2.min.css')}}" />
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{admin_asset('css/ace-ie.min.css')}}" />
    <![endif]-->
    <!-- inline styles related to this page -->
    <!-- ace settings handler -->
    @yield('after-css')

    <script src="{{admin_asset('js/ace-extra.min.js')}}"></script>
    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
    <!--[if lte IE 8]>
    <script src="{{admin_asset('js/html5shiv.min.js')}}"></script>
    <script src="{{admin_asset('js/respond.min.js')}}"></script>
    <![endif]-->
</head>

<body class="no-skin">
@include('admin::dashboard.navbar')

<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
    </script>

    @include('admin::dashboard.sidebar')

    <div class="main-content">
        <div class="main-content-inner">

            @include('admin::dashboard.breadcrumbs')

            <div class="page-content">
                <div class="ace-settings-container" id="ace-settings-container">
                    <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                        <i class="ace-icon fa fa-cog bigger-130"></i>
                    </div>
                    <div class="ace-settings-box clearfix" id="ace-settings-box">
                        <div class="pull-left width-50">
                            <div class="ace-settings-item">
                                <div class="pull-left">
                                    <select id="skin-colorpicker" class="hide">
                                        <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                        <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                        <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                        <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                    </select>
                                </div>
                                <span>&nbsp;Choose Skin</span>
                            </div>
                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
                                <label class="lbl" for="ace-settings-add-container">
                                    Inside
                                    <b>.container</b>
                                </label>
                            </div>
                        </div><!-- /.pull-left -->

                        <div class="pull-left width-50">
                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
                                <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
                                <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
                                <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                            </div>
                        </div><!-- /.pull-left -->
                    </div><!-- /.ace-settings-box -->
                </div><!-- /.ace-settings-container -->
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                    @include('admin::dashboard.page-header')

                         @yield('content')
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->

            </div><!-- /.page-content -->

        </div>
    </div><!-- /.main-content -->

    @include('admin::dashboard.footer')
</div>
<!-- basic scripts -->
@yield('before-javascript')
<!--[if !IE]> -->
<script src="{{admin_asset('js/jquery-2.1.4.min.js')}}"></script>
<!-- <![endif]-->
<!--[if IE]>
<script src="{{admin_asset('js/jquery-2.1.4.min.js')}}assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement)
        document.write("<script src='{{admin_asset('js/jquery.mobile.custom.min.js')}}'>"+"<"+"/script>");
</script>
<script src="{{admin_asset('js/bootstrap.min.js')}}"></script>
<!-- page specific plugin scripts -->

<!-- ace scripts -->
<script src="{{admin_asset('js/ace-elements.min.js')}}"></script>
<script src="{{admin_asset('js/ace.min.js')}}"></script>
<script src="{{admin_asset('js/select2.min.js')}}"></script>
@yield('after-javascript')
@yield('after-scripts-end')
<script>
    $("#skin-colorpicker").on("change",function(){
        console.log(this)
        localStorage.setItem('styles',$("#skin-colorpicker").find("option:selected").data("skin"))
        localStorage.setItem('styles_value',this.value)
    });
    $(function () {
        var c=$(document.body);
        var b=localStorage.getItem('styles');
        var d=localStorage.getItem('styles_value');
        console.log(b);
        if(isNotNull(b)){
            c.removeClass("no-skin skin-1 skin-2 skin-3");
            c.addClass(b);
            ace.data.set("skin",b);
        }
    });
    function isNotNull(data){
        return data == "" || data == undefined || data == null? false : true;
    }
</script>
<!-- inline scripts related to this page -->
</body>
</html>
