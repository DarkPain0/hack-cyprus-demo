@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-header text-center text-success">
            <h1>Create New Phone</h1>
        </div>
        <div class="row-fluid">
            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Details</h3>
                    </div>
                    <div class="panel-body">
                        {!! html()->modelForm(new App\Phone(),'POST',route('phones.store'))->open()->toHtml() !!}
                        {!! html()->input('hidden','contact_id',request('contact_id')) !!}

                        <div class="form-group required @if ($errors->has('type')) has-error @endif">
                            {!! html()->label('Type','type')->class('control-label') !!}
                            {!! html()->select('type',['email'=>'Email','website'=>'Website'])->class('form-control')->placeholder('Select Type')->required() !!}
                            @if ($errors->has('type'))
                                <p class="help-block">{{ $errors->first('type') }}</p>
                            @endif
                        </div>
                        <div class="form-group required @if ($errors->has('is_main')) has-error @endif">
                            {!! html()->label('Main','is_main')->class('control-label') !!}
                            {!! html()->select('is_main',[0=>'No',1=>'Yes'],1)->class('form-control')->placeholder('Is Main')->required() !!}
                            @if ($errors->has('is_main'))
                                <p class="help-block">{{ $errors->first('is_main') }}</p>
                            @endif
                        </div>

                        <div class="form-group required @if ($errors->has('number')) has-error @endif">
                            {!! html()->label('Number','number')->class('control-label') !!}
                            {!! html()->text('number')->class('form-control')->placeholder('Enter Number')->required() !!}
                            @if ($errors->has('number'))
                                <p class="help-block">{{ $errors->first('number') }}</p>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('country')) has-error @endif">
                            {!! html()->label('Country','country')->class('control-label') !!}
                            {!! html()->text('country')->class('form-control')->placeholder('Enter Country') !!}
                            @if ($errors->has('country'))
                                <p class="help-block">{{ $errors->first('country') }}</p>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('extension')) has-error @endif">
                            {!! html()->label('Extension','extension')->class('control-label') !!}
                            {!! html()->text('extension')->class('form-control')->placeholder('Enter Extension') !!}
                            @if ($errors->has('extension'))
                                <p class="help-block">{{ $errors->first('extension') }}</p>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('notes')) has-error @endif">
                            {!! html()->label('Notes','notes')->class('control-label') !!}
                            {!! html()->textarea('notes')->class('form-control')->placeholder('Enter Notes') !!}
                            @if ($errors->has('notes'))
                                <p class="help-block">{{ $errors->first('notes') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection