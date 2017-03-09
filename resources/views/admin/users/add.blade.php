@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{trans('messages.user_panel_title_add')}}</div>
    <div class="panel-body">
            {!! Form::open(['url' => '/register', 'method' => 'post', 'class'=>'form-horizontal']) !!}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  {!! Form::label('name', trans('messages.user_name_label'), ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('name', null, ['class' => 'form-control', 'id'=>'name']) !!}
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {!! Form::label('email', trans('messages.user_email_label'), ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::email('email', null, ['class' => 'form-control', 'id'=>'email']) !!}
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                {!! Form::label('password', trans('messages.user_password_label'), ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::password('password', ['class' => 'form-control', 'id'=>'password']) !!}
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                {!! Form::label('password_confirmation', trans('messages.user_password_confirm_label'), ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'id'=>'password-confirm']) !!}
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                  {!! Form::label('active', trans('messages.user_active_label'), ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                  {!! Form::select('active', ['1' => trans('messages.user_select_active'), '0' => trans('messages.user_select_not_active')], null, ['placeholder' => trans('messages.user_choose_one_active'), 'class'=>'form-control']) !!}
                    @if ($errors->has('active'))
                        <span class="help-block">
                            <strong>{{ $errors->first('active') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                {!! Form::label('role', trans('messages.user_role_label'), ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                  {!! Form::select('role', ['1' => trans('messages.user_select_admin'), '0' => trans('messages.user_select_user')], null, ['placeholder' => trans('messages.user_choose_one_role'), 'class'=>'form-control']) !!}
                    @if ($errors->has('role'))
                        <span class="help-block">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-floppy-o"></i> {{trans('messages.user_register_btn')}}
                    </button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
