@extends('layouts.app')

@section('content')

@if (count($pages) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        {{ trans('messages.page_panel_title') }}
    </div>
    <div class="panel-body">
      <div id="no-more-tables">
        <table class="table table-striped task-table table-hover">
            <!-- Table Headings -->
            <thead>
                <th>{{trans('messages.posts_table_header_post_lp')}}</th>
                <th>{{trans('messages.posts_table_header_post_title')}}</th>
                <th>{{trans('messages.posts_table_header_post_create_date')}}</th>
                <th>{{trans('messages.posts_table_header_post_slug')}}</th>

                <th>{{trans('messages.posts_table_header_post_actions')}}</th>
            </thead>
            <!-- Table Body -->
            <tbody>
              @if (count($pages) > 0)
                @foreach ($pages as $index => $page)
                    <tr @if($page->active == 1 ) style="border-left: 5px solid #A3D95B;background-color:rgba(137, 209, 128, 0.4);" @endif>
                      <td data-title="{{trans('messages.page_table_header_post_lp')}}">{{$index + 1 }}</td>
                      <!-- Task Name -->
                      <td data-title="{{trans('messages.page_table_header_post_title')}}" class="table-text">
                          <div>{{ $page->title }}</div>
                      </td>
                      <td data-title="{{trans('messages.page_table_header_post_create_date')}}" class="table-text">
                          <div>{{ $page->updated_at }}</div>
                      </td>
                      <td data-title="{{trans('messages.page_table_header_post_slug')}}" class="table-text">
                          <div>{!! $page->slug !!}</div>
                      </td>

                           <td data-title="{{trans('messages.page_table_header_post_actions')}}">
                             <ul class="list-inline">
                               <li>
                                 @if ($page->active != 1)
                          <form action="{{url('/pages/publish/'.$page->id)}}" method="POST">
                              {{ csrf_field() }}
                              <input type="hidden" name="active" value="1">
                              <button type="submit" class="btn btn-success">
                                  <i class="fa fa-check"></i> {{trans('messages.page_active_btn')}}
                              </button>
                          </form>
                          @else
                              <button class="btn btn-success" disabled>{{trans('messages.page_active_btn_done')}}</button>
                          @endif
                        </li>
                        <li>
                          <form action="{{url('/pages/edit/'.$page->id)}}" method="GET">
                              <button type="submit" class="btn btn-warning">
                                  <i class="fa fa-pencil"></i> {{trans('messages.page_edit_btn')}}
                              </button>
                          </form>
                        </li>
                        <li>
                          <form action="{{url('/pages/delete/'.$page->id)}}" method="POST">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <button type="submit" class="btn btn-danger delete-confirm">
                                  <i class="fa fa-trash"></i> {{trans('messages.page_delete_btn')}}
                              </button>
                          </form>
                         </li>
                       </ul>
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
    </div>
</div>


@endif


@endsection
