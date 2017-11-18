@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-header text-center text-warning">
            <h1>Edit Address</h1>
        </div>
        <div class="row-fluid">
            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Details</h3>
                    </div>
                    <div class="panel-body">
                        {!! html()->modelForm($address,'PUT',route('addresses.update',['id'=>$address->id]))->open()->toHtml() !!}
                        {!! html()->input('hidden','contact_id',$address->contact_id) !!}
                        <div class="form-group required @if ($errors->has('type')) has-error @endif">
                            {!! html()->label('Type','type')->class('control-label') !!}
                            {!! html()->select('type',['work'=>'Work','home'=>'Home','home'])->class('form-control')->placeholder('Select Type')->required() !!}
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
                        <div class="form-group required @if ($errors->has('street')) has-error @endif">
                            {!! html()->label('Street','street')->class('control-label') !!}
                            {!! html()->text('street')->class('form-control')->placeholder('Enter Street Name')->required() !!}
                            @if ($errors->has('street'))
                                <p class="help-block">{{ $errors->first('street') }}</p>
                            @endif
                        </div>
                        <div class="form-group  @if ($errors->has('number')) has-error @endif">
                            {!! html()->label('Phone Number','number')->class('control-label') !!}
                            {!! html()->text('number')->class('form-control')->placeholder('Enter Number') !!}
                            @if ($errors->has('number'))
                                <p class="help-block">{{ $errors->first('number') }}</p>
                            @endif
                        </div>
                        <div class="form-group  @if ($errors->has('building')) has-error @endif">
                            {!! html()->label('Building','building')->class('control-label') !!}
                            {!! html()->text('building')->class('form-control')->placeholder('Enter Building Name') !!}
                            @if ($errors->has('building'))
                                <p class="help-block">{{ $errors->first('building') }}</p>
                            @endif
                        </div>
                        <div class="form-group  @if ($errors->has('floor')) has-error @endif">
                            {!! html()->label('Floor','floor')->class('control-label') !!}
                            {!! html()->text('floor')->class('form-control')->placeholder('Enter Floor Number') !!}
                            @if ($errors->has('floor'))
                                <p class="help-block">{{ $errors->first('floor') }}</p>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('apartment')) has-error @endif">
                            {!! html()->label('Apartment','apartment')->class('control-label') !!}
                            {!! html()->text('apartment')->class('form-control')->placeholder('Enter Apartment number') !!}
                            @if ($errors->has('apartment'))
                                <p class="help-block">{{ $errors->first('apartment') }}</p>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('postal_code')) has-error @endif">
                            {!! html()->label('Postal Code','postal_code')->class('control-label') !!}
                            {!! html()->text('postal_code')->class('form-control')->placeholder('Enter Postal Code') !!}
                            @if ($errors->has('postal_code'))
                                <p class="help-block">{{ $errors->first('postal_code') }}</p>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('city')) has-error @endif">
                            {!! html()->label('City','city')->class('control-label') !!}
                            {!! html()->text('city')->class('form-control')->placeholder('Enter City Name') !!}
                            @if ($errors->has('city'))
                                <p class="help-block">{{ $errors->first('city') }}</p>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('district')) has-error @endif">
                            {!! html()->label('District','district')->class('control-label') !!}
                            {!! html()->text('district')->class('form-control')->placeholder('Enter District Name') !!}
                            @if ($errors->has('district'))
                                <p class="help-block">{{ $errors->first('district') }}</p>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('country')) has-error @endif">
                            {!! html()->label('Country','country')->class('control-label') !!}
                            {!! html()->text('country')->class('form-control')->placeholder('Enter Country') !!}
                            @if ($errors->has('country'))
                                <p class="help-block">{{ $errors->first('country') }}</p>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('notes')) has-error @endif">
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
                </div>
            </div>
        </div>
    </div>
@endsection