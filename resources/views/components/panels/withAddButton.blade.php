<div class="panel panel-{!! $class !!}">
    <div class="panel-heading clearfix">
        <h4 class="panel-title pull-left" style="padding-top: 8px;">{!! $title !!}</h4>
        <div class="btn-group pull-right">
            <a href="{!! $action !!}" class="btn btn-sm btn-success">
                Add <span class="glyphicon glyphicon-plus"></span>
            </a>
        </div>
    </div>
    <div class="panel-body">
        <div class="row text-center">
            {!! $slot !!}
        </div>
    </div>
    @if (isset($footer))
        <div class="panel-footer">
            {!! $footer !!}
        </div>
    @endif
</div>