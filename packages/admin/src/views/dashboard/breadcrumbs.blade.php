<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa icon-home home-icon"></i>
            <a href="{{$bread_crumbs[0]['url']}}">{{$bread_crumbs[0]['name']}}</a>
        </li>
        @if(isset($bread_crumbs[1]['name']))
            <li>
                <a href="{{ $bread_crumbs[1]['url'] or '#' }}">{{ $bread_crumbs[1]['name'] or '' }}</a>
            </li>
        @endif
        @if(isset($bread_crumbs[2]['name']))
            <li class="active">{{ $bread_crumbs[2]['name'] or '' }}</li>
        @endif
    </ul><!-- .breadcrumb -->
    <div class="nav-search" id="nav-search">
        <form class="form-search">
            <span class="input-icon">
                <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                <i class="ace-icon fa fa-search nav-search-icon"></i>
            </span>
        </form>
    </div>
</div>
