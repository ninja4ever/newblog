@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="margin-top:100px;">
                <div class="panel-heading">{{ trans('messages.login') }}</div>
                <div class="panel-body">
				          {!! Form::open(['url' => '/login', 'method' => 'post', 'class'=>'form-horizontal']) !!}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::label('email', trans('messages.email_label'), ['class' => 'col-md-4 control-label']) !!}
                      <div class="col-md-6">
                        {!! Form::email('email', null, ['class' => 'form-control', 'id'=>'email', 'autofocus'=>'']) !!}
                          @if ($errors->has('email'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        {!! Form::label('password', trans('messages.password_label'), ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::password('password', ['class' => 'form-control', 'id'=>'password']) !!}
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('remember', '') !!} {{trans('messages.remember_label')}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                {{trans('messages.login_btn')}}
                            </button>
                            <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                {{trans('messages.forgot_pass')}}
                            </a>
                        </div>
                    </div>
						      {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
