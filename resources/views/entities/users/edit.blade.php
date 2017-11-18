@extends('layouts.app')

@section('title')
    Edit User
@endsection

@section('content')
    <div class="container-fluid">

        <div class="page-header text-center text-warning">
            <h1>Edit User</h1>
            <small> "{!! $user->contact->info !!} - ({!! $user->email !!})"</small>
        </div>

        <div class="row-fluid">
            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">Details</h3>
                    </div>
                    <div class="panel-body">
                        {!! html()->modelForm($user,'PUT',route('users.update',['id'=>$user->id]))->open()->toHtml() !!}
                        {!! html()->input('hidden','contact_id',$user->contact_id) !!}

                        <div class="form-group required @if ($errors->has('email')) has-error @endif">
                            {!! html()->label('Email','email')->class('control-label') !!}
                            {!! html()->text('email')->class('form-control')->placeholder('Write Email')->required() !!}
                            @if ($errors->has('email'))
                                <p class="help-block">{{ $errors->first('email') }}</p>
                            @endif
                        </div>

                        <div class="form-group required @if ($errors->has('is_admin')) has-error @endif">
                            {!! html()->label('Admin','is_admin')->class('control-label') !!}
                            {!! html()->select('is_admin',[0=>'No',1=>'Yes'])->class('form-control')->placeholder('Select If Admin')->required() !!}
                            @if ($errors->has('is_admin'))
                                <p class="help-block">{{ $errors->first('is_admin') }}</p>
                            @endif
                        </div>

                        <div class="form-group required @if ($errors->has('password')) has-error @endif">
                            {!! html()->label('Password','password')->class('control-label') !!}
                            {!! html()->text('password')->class('form-control')->value('')->placeholder('Write New Password')->required() !!}
                            @if ($errors->has('password'))
                                <p class="help-block">{{ $errors->first('password') }}</p>
                            @endif
                        </div>

                        <div class="form-group required @if ($errors->has('password_confirmation')) has-error @endif">
                            {!! html()->label('Password Confirm','password_confirmation')->class('control-label') !!}
                            {!! html()->text('password_confirmation')->class('form-control')->value('')->placeholder('Write Again New Password')->required() !!}
                            @if ($errors->has('password_confirmation'))
                                <p class="help-block">{{ $errors->first('password_confirmation') }}</p>
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

