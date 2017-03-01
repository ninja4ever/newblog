@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">{{trans('messages.post_category_edit_panel_title')}} {{$cpost->name}}</div>
    <div class="panel-body">
      <!-- <form> -->
      {{ Form::model($cpost, ['url'=>'/post-category/'.$cpost->id.'/update', 'class'=>'form-horizontal', 'method'=>'post']) }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('name', trans('messages.post_category_name_label'), ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{$cpost->name}}" autofocus>
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
                      <span class="fa fa-floppy-o" aria-hidden="true"></span>  {{trans('messages.post_category_edit_save_btn')}}
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        <!-- </form> -->
    </div>
</div>

@endsection
