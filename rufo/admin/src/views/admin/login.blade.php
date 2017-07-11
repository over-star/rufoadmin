<!DOCTYPE html>
<html lang="en">
<head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
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

<body class="login-layout">
<div class="main-container">
        <div class="main-content">
                <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                                <div class="login-container">
                                        <div class="center">
                                                <h1>
                                                        <i class="ace-icon fa fa-leaf green"></i>
                                                        <span class="red">Rufo</span>
                                                        <span class="white" id="id-text2">Admin</span>
                                                </h1>
                                        </div>

                                        <div class="space-6"></div>

                                        <div class="position-relative">
                                                <div id="login-box" class="login-box visible widget-box no-border">
                                                        <div class="widget-body">
                                                                <div class="widget-main">
                                                                        <h4 class="header blue lighter bigger">
                                                                                <i class="ace-icon fa fa-coffee green"></i>
                                                                                请输入你的用户信息
                                                                        </h4>

                                                                        <div class="space-6"></div>

                                                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/login') }}">
                                                                        {{ csrf_field() }}

                                                                        <fieldset>
                                                                                        <label class="block clearfix">
                                                                                            @if ($errors->has('email'))
                                                                                                <span class="help-block">
                                                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                                                </span>
                                                                                            @endif
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="email" placeholder="email" />
															<i class="ace-icon fa fa-user"></i>
														</span>
                                                                                        </label>

                                                                                        <label class="block clearfix">
                                                                                            @if ($errors->has('password'))
                                                                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                                                            @endif
														<span class="block input-icon input-icon-right">
															<input type="password" name="password" required class="form-control" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                                                                        </label>

                                                                                        <div class="space"></div>

                                                                                        <div class="clearfix">
                                                                                                <label class="inline">
                                                                                                    <input type="checkbox" class="ace" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                                                                    <span class="lbl"> Remember Me</span>
                                                                                                </label>

                                                                                                <button type="submit" class=" width-35 pull-right btn btn-sm btn-primary">
                                                                                                        <i class="ace-icon fa fa-key"></i>
                                                                                                        <span class="bigger-110">Login</span>
                                                                                                </button>
                                                                                        </div>

                                                                                        <div class="space-4"></div>
                                                                                </fieldset>
                                                                        </form>

                                                                        <div class="space-6"></div>
                                                                </div><!-- /.widget-main -->

                                                                <div class="toolbar clearfix">
                                                                        <div>
                                                                                <a href="#" data-target="#forgot-box" class="forgot-password-link">
                                                                                        <i class="ace-icon fa fa-arrow-left"></i>
                                                                                        I forgot my password
                                                                                </a>
                                                                        </div>

                                                                </div>
                                                        </div><!-- /.widget-body -->
                                                </div><!-- /.login-box -->

                                                <div id="forgot-box" class="forgot-box widget-box no-border">
                                                        <div class="widget-body">
                                                                <div class="widget-main">
                                                                        <h4 class="header red lighter bigger">
                                                                                <i class="ace-icon fa fa-key"></i>
                                                                                Retrieve Password
                                                                        </h4>

                                                                        <div class="space-6"></div>
                                                                        <p>
                                                                                Enter your email and to receive instructions
                                                                        </p>

                                                                        <form>
                                                                                <fieldset>
                                                                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
                                                                                        </label>

                                                                                        <div class="clearfix">
                                                                                                <button type="button" class="width-35 pull-right btn btn-sm btn-danger">
                                                                                                        <i class="ace-icon fa fa-lightbulb-o"></i>
                                                                                                        <span class="bigger-110">Send Me!</span>
                                                                                                </button>
                                                                                        </div>
                                                                                </fieldset>
                                                                        </form>
                                                                </div><!-- /.widget-main -->

                                                                <div class="toolbar center">
                                                                        <a href="#" data-target="#login-box" class="back-to-login-link">
                                                                                Back to login
                                                                                <i class="ace-icon fa fa-arrow-right"></i>
                                                                        </a>
                                                                </div>
                                                        </div><!-- /.widget-body -->
                                                </div><!-- /.forgot-box -->

                                        </div><!-- /.position-relative -->

                                        <div class="navbar-fixed-top align-right">
                                                <br />
                                                &nbsp;
                                                <a id="btn-login-dark" href="#">Dark</a>
                                                &nbsp;
                                                <span class="blue">/</span>
                                                &nbsp;
                                                <a id="btn-login-blur" href="#">Blur</a>
                                                &nbsp;
                                                <span class="blue">/</span>
                                                &nbsp;
                                                <a id="btn-login-light" href="#">Light</a>
                                                &nbsp; &nbsp; &nbsp;
                                        </div>
                                </div>
                        </div><!-- /.col -->
                </div><!-- /.row -->
        </div><!-- /.main-content -->
</div><!-- /.main-container -->

<!-- basic scripts -->

<script src="{{admin_asset('js/jquery-2.1.4.min.js')}}"></script>
<!-- <![endif]-->
<!--[if IE]>
<script src="{{admin_asset('js/jquery-2.1.4.min.js')}}assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {
        $(document).on('click', '.toolbar a[data-target]', function(e) {
            e.preventDefault();
            var target = $(this).data('target');
            $('.widget-box.visible').removeClass('visible');//hide others
            $(target).addClass('visible');//show target
        });
    });

    //you don't need this, just used for changing background
    jQuery(function($) {
        $('#btn-login-dark').on('click', function(e) {
            $('body').attr('class', 'login-layout');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'blue');

            e.preventDefault();
        });
        $('#btn-login-light').on('click', function(e) {
            $('body').attr('class', 'login-layout light-login');
            $('#id-text2').attr('class', 'grey');
            $('#id-company-text').attr('class', 'blue');

            e.preventDefault();
        });
        $('#btn-login-blur').on('click', function(e) {
            $('body').attr('class', 'login-layout blur-login');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'light-blue');

            e.preventDefault();
        });

    });
    $('body').attr('class', 'login-layout light-login');
    $('#id-text2').attr('class', 'grey');
    $('#id-company-text').attr('class', 'blue');

</script>
</body>
</html>
