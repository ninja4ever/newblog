@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">{{trans('messages.post_category_panel_add_title')}}</div>
    <div class="panel-body">
      <!-- <form> -->
      {!! Form::open(['url' => '/admin/post-category/store', 'method' => 'post', 'class'=>'form-horizontal']) !!}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('name', trans('messages.post_category_name_label'), ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                  {!! Form::text('name', null, ['class' => 'form-control', 'id'=>'name']) !!}
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                      <i class="fa fa-floppy-o"></i>  {{trans('messages.post_category_add_btn')}}
                    </button>
                </div>
            </div>
        {!! Form::close() !!}
        <!-- </form> -->
    </div>
</div>

@endsection
