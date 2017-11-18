@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-header text-center text-warning">
            <h1>Edit Electronic Address</h1>
        </div>
        <div class="row-fluid">
            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Details</h3>
                    </div>
                    <div class="panel-body">
                        {!! html()->modelForm($electronicAddress,'PUT',route('electronic-addresses.update',['id'=>$electronicAddress]))->open()->toHtml() !!}
                        {!! html()->input('hidden','contact_id',$electronicAddress->contact_id) !!}

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

                        <div class="form-group @if ($errors->has('value')) has-error @endif">
                            {!! html()->label('Value','value')->class('control-label') !!}
                            {!! html()->text('value')->class('form-control')->placeholder('Enter Value')->required() !!}
                            @if ($errors->has('value'))
                                <p class="help-block">{{ $errors->first('value') }}</p>
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