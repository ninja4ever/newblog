@extends('layouts.app')

@section('content')


<div class="panel panel-default">
    <div class="panel-heading">
        {{trans('messages.post_category_panel_title')}}
    </div>
    <div class="panel-body">
      <div id="no-more-tables">
        <!-- table with post categories -->
        <table class="table table-striped task-table table-hover">
            <!-- Table Headings -->
            <thead>
              <th>{{trans('messages.post_category_table_header_lp')}}</th>
                <th>{{trans('messages.post_category_table_header_name')}}</th>
                <th>{{trans('messages.post_category_table_header_actions')}}</th>
            </thead>
            <!-- Table Body -->
            <tbody>

                @if (count($post_category) > 0)

                @foreach ($post_category as $index => $cpost)
                    <tr >
                      <td data-title="{{trans('messages.post_category_table_header_lp')}}">{{ $index + 1 }}</td>
                      <td class="table-text" data-title="{{trans('messages.post_category_table_header_name')}}">
                          <div>{{ $cpost->name }}</div>
                      </td>
                      <td data-title="{{trans('messages.post_category_table_header_actions')}}">
                          @if ( $cpost->id > 1)
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
                          @endif
                      </td>
                    </tr>
                @endforeach

                @else
                <tr>
                  <td colspan="3">No categories</td>
                </tr>
                @endif
            </tbody>
            <!-- end table body -->
        </table>
        <!-- end table -->
        </div>
    </div>
</div>


@endsection
