<div id="sidebar" class="sidebar  responsive ace-save-state">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>
            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>
            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>
            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>
        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>
            <span class="btn btn-info"></span>
            <span class="btn btn-warning"></span>
            <span class="btn btn-danger"></span>
        </div>
    </div>
    <ul class="nav nav-list">
        <li class="{{url_pattern('dashboard','active open highlight')}}">
            <a href="/dashboard" >
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> 控制台 </span>
            </a>
            <b class="arrow"></b>
        </li>
        @if($menu_info)
            @foreach($menu_info as $key=>$val)
                @if(isset($val['children'])&&count($val['children'])>0)
                    <li class="{{url_pattern($val['active_url'],'active open highlight')}}">
                        <a href="#" class="dropdown-toggle">
                            <i class="{{$val['icon']?:'fa-leaf' }} menu-icon fa "></i>
                            <span class="menu-text">{{ $val['name'] }}</span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            @foreach($val['children'] as $v)
                                <li class="{{url_pattern($v['active_url'])}}">
                                    <a href="{!!url($v['url'])!!}">
                                        <i class="icon-double-angle-right"></i>{{$v['name']}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li class="{{ url_pattern($val['active_url'],'active open highlight') }}">
                        <a href="{!!url($val['url']) !!}">
                            <i class="{{ $val['icon']?:'fa-leaf' }} menu-icon fa"></i>
                            <span class="menu-text">{{$val['name']}}</span>
                        </a>
                    </li>
                @endif
            @endforeach
        @endif
    </ul>
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
