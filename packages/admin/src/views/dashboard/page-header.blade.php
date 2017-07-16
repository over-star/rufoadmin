<div class="page-header">
    <h1>
        @if(isset($bread_crumbs[1]['name']))
            {{ $bread_crumbs[1]['name'] or '' }}
        @endif
        @if(isset($bread_crumbs[2]['name']))
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                {{ $bread_crumbs[2]['name'] or '' }}
            </small>
        @endif
    </h1>
</div>
