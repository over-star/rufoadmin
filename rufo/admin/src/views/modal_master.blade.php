<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}" />
        <title></title>
        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Default Description')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')
        <link rel="stylesheet" href="{{admin_asset('css/bootstrap.min.css')}}" />

        <!-- Styles -->
        @yield('style')
        @yield('before-styles-end')
        @yield('after-styles-end')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-{!! config('backend.theme') !!}">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        {{--@include('backend.includes.footer')--}}
    </div><!-- ./wrapper -->

    <!-- JavaScripts -->
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>--}}
    <script src="{{admin_asset('js/jquery-2.1.4.min.js')}}"></script>

    <script src="{{admin_asset('js/bootstrap.min.js')}}"></script>
    @yield('script')
    @yield('message_script')
    @yield('before-scripts-end')
    @yield('after-scripts-end')
    </body>
</html>