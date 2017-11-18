@extends('layouts.app')

@section('title')
    Users List
@endsection

@section('content')
    <div class="container-fluid">

        <div class="page-header no-margin">
            <h1>Users
                <small> List</small>
            </h1>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <table class="table table-bordered table-hover">
                            @unless (count($users) === 0)
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Admin</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                            @endunless
                            <tbody>
                            @each('entities.partials.user_row', $users, 'user','entities.partials.empty')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('entities.partials.pagination',['data'=>$users])


    </div>

@endsection

@push('styles')
    <link href="{{ asset('css/table.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{!! asset('js/table.min.js') !!}"></script>
@endpush