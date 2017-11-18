<div class="panel panel-!{!! $class ?? 'default' !!}">
    <div class="panel-heading">
        <h3 class="panel-title">{!! $title !!}</h3>
        @if ($collapsible ??false)
            <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
        @endif
    </div>
    <div class="panel-body">
        {!! $slot !!}
    </div>
    @if (isset($footer))
        <div class="panel-footer">
            {!! $footer !!}
        </div>
    @endif
</div>