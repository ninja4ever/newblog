@extends('layouts.app')

@section('content')


@if (count($post_category) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            {{trans('messages.post_category_panel_title')}}
        </div>
        <div class="panel-body">
          <div id="no-more-tables">
            <table class="table table-striped task-table table-hover">
                <!-- Table Headings -->
                <thead>
                  <th>{{trans('messages.post_category_table_header_lp')}}</th>
                    <th>{{trans('messages.post_category_table_header_name')}}</th>
                    <th>{{trans('messages.post_category_table_header_actions')}}</th>
                </thead>
                <!-- Table Body -->
                <tbody>
                    @foreach ($post_category as $index => $cpost)
                        <tr >
                          <td data-title="{{trans('messages.post_category_table_header_lp')}}">{{ $index + 1 }}</td>
                          <td class="table-text" data-title="{{trans('messages.post_category_table_header_name')}}">
                              <div>{{ $cpost->name }}</div>
                          </td>
                          <td data-title="{{trans('messages.post_category_table_header_actions')}}">
                              <ul class="list-inline">
                                <li>
                                  <form action="{{url('/post-category/edit/'. $cpost->id)}}" method="GET">
                                    <button type="submit" class="btn btn-warning">
                                        <i class="fa fa-pencil"></i> {{trans('messages.post_category_edit_btn')}}
                                    </button>
                                  </form>
                                </li>
                                <li>
                                  <form action="{{url('/post-category/delete/'. $cpost->id)}}" method="POST">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}
                                      <button type="submit" class="btn btn-danger delete-confirm">
                                          <i class="fa fa-trash"></i> {{trans('messages.post_category_delete_btn')}}
                                      </button>
                                  </form>
                                </li>
                              </ul>
                          </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
@else
<div class="panel panel-default">
    <div class="panel-heading">
        {{trans('messages.post_category_panel_title')}}
    </div>
    <div class="panel-body">
      no records
    </div>
</div>
@endif

@endsection
