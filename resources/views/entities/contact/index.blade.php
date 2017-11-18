@extends('layouts.app')

@section('title')
    Contact List
@endsection

@section('content')
    <div class="container-fluid">

        <div class="page-header no-margin text-center">
            <h1>Contact List</h1>
            <small>{!! 'Sorted by Latest Additions-Updates' !!}</small>
        </div>

        <div class="panel panel-default">
            <a class="btn btn-md btn-success pull-right" href="{!! route('contacts.create') !!}">
                <span class="glyphicon glyphicon-plus"></span> Add New </a>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <table class="table" data-toggle="table" data-id-field="id" data-show-columns="true"
                               data-cookie="true" data-cookie-id-table="contactsIndex" data-filter-control="true"
                               data-filter-show-clear="true">
                            @if (count($contacts) > 0)
                                <thead>
                                <tr>
                                    <th data-field="id">ID</th>
                                    <th data-field="name" data-sortable="true" data-filter-control="input">Name</th>
                                    <th data-field="surname" data-sortable="true" data-filter-control="input">Surname</th>
                                    <th data-field="company_name" data-sortable="true" data-filter-control="select">Company Name</th>
                                    <th data-field="gender" data-sortable="true" data-filter-control="select">Gender</th>
                                    <th data-field="birth" data-sortable="true" data-filter-control="input">Birth Date</th>
                                    <th data-field="occupation" data-sortable="true" data-filter-control="input">Occupation</th>
                                    <th data-field="addresses" data-sortable="true" data-filter-control="input">Addresses</th>
                                    <th data-field="eaddresses" data-sortable="true" data-filter-control="input">Electronic Addresses</th>
                                    <th data-field="phones" data-sortable="true" data-filter-control="input">Phones</th>
                                    <th data-field="actions" data-sortable="false" data-switchable="false" class="col-xs-1 text-center">Actions</th>
                                </tr>
                                </thead>
                            @endif
                            <tbody>
                            @each('entities.partials.contact_row', $contacts, 'contact','entities.partials.empty')
                            </tbody>


                        </table>

                        @include('entities.partials.pagination',['data'=>$contacts])

                    </div>


                </div>
            </div>
        </div>

    </div>

@endsection


@push('styles')
    <link href="{{ asset('css/table.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{!! asset('js/table.min.js') !!}"></script>
@endpush