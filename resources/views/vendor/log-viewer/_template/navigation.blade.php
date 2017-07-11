<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('log-viewer::dashboard') ? 'active' : '' }}">
                    <a href="{{ route('log-viewer::dashboard') }}">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </a>
                </li>
                <li class="{{ Route::is('log-viewer::logs.list') ? 'active' : '' }}">
                    <a href="{{ route('log-viewer::logs.list') }}">
                        <i class="fa fa-archive"></i> Logs
                    </a>
                </li>
               <li class="">
                    <a href="/dashboard">
                        <i class="fa fa-book"></i>返回系统
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
