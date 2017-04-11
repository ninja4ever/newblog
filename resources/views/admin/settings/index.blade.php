@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        {{ trans('messages.settings_panel_title') }}
    </div>
    <div class="panel-body">
      {!! Form::open(['url' => '/settings/store', 'method' => 'post', 'class'=>'form-horizontal', 'files'=>true]) !!}
      <div id="no-more-tables">
        <table class="table table-striped task-table table-hover">
            <!-- Table Headings -->
            <thead>
                <th>{{trans('messages.settings_table_header_name')}}</th>
                <th>{{trans('messages.settings_table_header_value')}}</th>
            </thead>
            <!-- Table Body -->
            <tbody>
              @if (count($settings) > 0)
                @foreach ($settings as $index => $setting)
                    <tr>
                      <td data-title="{{trans('messages.settings_table_header_name')}}">{{$setting->name}}</td>
                      <td data-title="{{trans('messages.settings_table_header_value')}}" class="table-text">
                            @if($setting->type == 'string')
                            <input type="text" class="form-control" name="setting[{{$setting->id}}][value]" value="{{$setting->value}}">
                            <input type="hidden" name="setting[{{$setting->id}}][id]" value="{{$setting->id}}">
                            <input type="hidden" name="setting[{{$setting->id}}][type]" value="{{$setting->type}}">
                           @endif
                           @if($setting->type == 'text')
                           <textarea name="setting[{{$setting->id}}][value]" class="form-control" rows="8" cols="80">{{$setting->value}}</textarea>
                           <input type="hidden" name="setting[{{$setting->id}}][id]" value="{{$setting->id}}">
                           <input type="hidden" name="setting[{{$setting->id}}][type]" value="{{$setting->type}}">
                           @endif
                           @if($setting->type == 'image')
                            <div style="" class="file_out_wrapper">{!! Form::file('setting['.$setting->id.'][value]', ['class' => '', 'id'=>'image',  'accept'=>'image/*']) !!}</div>
                            <img style="display:block;max-width:300px;" src="{{asset('/uploads/settings/'.$setting->value)}}" alt="">
                            <input type="hidden" name="setting[{{$setting->id}}][id]" value="{{$setting->id}}">
                            <input type="hidden" name="setting[{{$setting->id}}][type]" value="{{$setting->type}}">
                           @endif
                      </td>
                  </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="6">No records</td>
                </tr>
                @endif
            </tbody>
        </table>
      </div>
      <button type="submit" class="btn btn-primary">
        <span class="fa fa-floppy-o" aria-hidden="true"></span>  {{trans('messages.settings_save_btn')}}
      </button>
      {!! Form::close() !!}
    </div>
</div>

@endsection
