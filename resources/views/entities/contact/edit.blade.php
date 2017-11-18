@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-header text-center text-warning">
            <h1>Edit Contact
                <small>{{$contact->name }} {{$contact->surname }} {{$contact->company_name}}</small>
            </h1>
        </div>
        <div class="row-fluid">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Details</h3>
                    </div>
                    <div class="panel-body">

                        {!! html()->modelForm($contact,'PUT',route('contacts.update',['id'=>$contact->id]))->open()->toHtml() !!}
                        <div id="person-group">
                            <div class="form-group required @if ($errors->has('name')) has-error @endif">
                                {!! html()->label('First Name','name')->class('control-label') !!}
                                {!! html()->text('name')->class('form-control')->placeholder('Enter Name')->autofocus() !!}
                                @if ($errors->has('name'))
                                    <p class="help-block">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="form-group required @if ($errors->has('surname')) has-error @endif">
                                {!! html()->label('Last Name','surname')->class('control-label') !!}
                                {!! html()->text('surname')->class('form-control')->placeholder('Enter Last Name') !!}
                                @if ($errors->has('surname'))
                                    <p class="help-block">{{ $errors->first('surname') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group required @if ($errors->has('is_company')) has-error @endif">
                            {!! html()->label('Is Company?','is_company')->class('control-label') !!}
                            {!! html()->select('is_company',[0=>'No',1=>'Yes'],0)->class('form-control') !!}
                            @if ($errors->has('is_company'))
                                <p class="help-block">{{ $errors->first('is_company') }}</p>
                            @endif
                        </div>
                        <div class="form-group required @if ($errors->has('company_name')) has-error @endif hidden" id="company-group">
                            {!! html()->label('Company Name','company_name')->class('control-label') !!}
                            {!! html()->text('company_name')->class('form-control') !!}
                            @if ($errors->has('company_name'))
                                <p class="help-block">{{ $errors->first('company_name') }}</p>
                            @endif
                        </div>
                        <div class="form-group required @if ($errors->has('gender')) has-error @endif">
                            {!! html()->label('Gender','gender')->class('control-label') !!}
                            {!! html()->select('gender',['male'=>'Male','female'=>'Female','neutral'=>'Neutral'],'neutral')->class('form-control') !!}
                            @if ($errors->has('gender'))
                                <p class="help-block">{{ $errors->first('gender') }}</p>
                            @endif
                        </div>
                        <div class="form-group required @if ($errors->has('birth')) has-error @endif">
                            {!! html()->label('Birth Date','birth')->class('control-label') !!}
                            {!! html()->text('birth')->class('form-control')->class('datepicker')->placeholder('Select Birth Date') !!}
                            @if ($errors->has('birth'))
                                <p class="help-block">{{ $errors->first('birth') }}</p>
                            @endif
                        </div>
                        <div class="form-group  @if ($errors->has('occupation')) has-error @endif">
                            {!! html()->label('Occupation','occupation')->class('control-label') !!}
                            {!! html()->text('occupation')->class('form-control')->placeholder('Enter Occupation') !!}
                            @if ($errors->has('occupation'))
                                <p class="help-block">{{ $errors->first('occupation') }}</p>
                            @endif
                        </div>
                        <div class="form-group  @if ($errors->has('notes')) has-error @endif">
                            {!! html()->label('Notes','notes')->class('control-label') !!}
                            {!! html()->textarea('notes')->class('form-control')->placeholder('Enter Notes') !!}
                            @if ($errors->has('notes'))
                                <p class="help-block">{{ $errors->first('notes') }}</p>
                            @endif
                        </div>
                        <div class="form-group center-block text-center">
                            {!! html()->submit('Save')->class('btn btn-success') !!}
                        </div>
                    </div>
                    {!! html()->closeModelForm()->toHtml() !!}
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="row">
                    @include('entities.contact.partials.addresses')
                </div>
                <div class="row">
                    @include('entities.contact.partials.eaddresses')
                </div>
                <div class="row">
                    @include('entities.contact.partials.phones')
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('css/datepicker.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{!! asset('js/datepicker.min.js') !!}"></script>
    <script>
        $(document).ready(function () {
            $('.datepicker').datepicker({
                format: "dd.mm.yyyy",
                endDate: "now",
                clearBtn: true,
                startView: 2
            });
        });
    </script>
@endpush