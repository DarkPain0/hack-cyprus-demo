@if(isset($data) && count($data) > 0)
    <div class="row">
        <div class="pull-left" style="margin-left: 15px;">Showing {!! $data->count() !!} of {!! $data->total() !!} </div>
        <div class="pull-right" style="margin-right: 15px;">Page {!!  $data->currentPage() !!} of {!! $data->lastPage()  !!} pages</div>
    </div>
    <div class="row">
        <div class="center-block text-center">   {!! $data->appends(request()->except('page'))->links() !!}</div>
    </div>
@endif