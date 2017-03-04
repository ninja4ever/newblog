@extends('layouts.app')

@section('content')

@if (count($posts) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        {{ trans('messages.posts_panel_title') }}
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
                <th>{{trans('messages.posts_table_header_post_category')}}</th>
                <th>{{trans('messages.posts_table_header_post_actions')}}</th>
            </thead>
            <!-- Table Body -->
            <tbody>
              @if (count($posts) > 0)
                @foreach ($posts as $index => $post)
                    <tr @if($post->active == 1 ) style="border-left: 5px solid #A3D95B;background-color:rgba(137, 209, 128, 0.4);" @endif>
                      <td data-title="{{trans('messages.posts_table_header_post_lp')}}">{{$index + 1 }}</td>
                      <!-- Task Name -->
                      <td data-title="{{trans('messages.posts_table_header_post_title')}}" class="table-text">
                          <div>{{ $post->title }}</div>
                      </td>
                      <td data-title="{{trans('messages.posts_table_header_post_create_date')}}" class="table-text">
                          <div>{{ $post->updated_at }}</div>
                      </td>
                      <td data-title="{{trans('messages.posts_table_header_post_slug')}}" class="table-text">
                          <div>{!! $post->slug !!}</div>
                      </td>
                      <td data-title="{{trans('messages.posts_table_header_post_category')}}" class="table-text">
                          <div>@if($post->category == 0) {!! @trans('messages.post_post_category_select_none') !!} @else{!! $post->postcategory->name !!}@endif</div>
                      </td>
                           <td data-title="{{trans('messages.posts_table_header_post_actions')}}">
                             <ul class="list-inline">
                               <li>
                                 @if ($post->active != 1)
                          <form action="{{url('/post/publish/'.$post->id)}}" method="POST">
                              {{ csrf_field() }}
                              <input type="hidden" name="active" value="1">
                              <button type="submit" class="btn btn-success">
                                  <i class="fa fa-check"></i> {{trans('messages.post_active_btn')}}
                              </button>
                          </form>
                          @else
                              <button class="btn btn-success" disabled>{{trans('messages.post_active_btn_done')}}</button>
                          @endif
                        </li>
                        <li>
                          <form action="{{url('/post/edit/'.$post->id)}}" method="GET">
                              <button type="submit" class="btn btn-warning">
                                  <i class="fa fa-pencil"></i> {{trans('messages.post_edit_btn')}}
                              </button>
                          </form>
                        </li>
                        <li>
                          <form action="{{url('/post/delete/'.$post->id)}}" method="POST">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <button type="submit" class="btn btn-danger delete-confirm">
                                  <i class="fa fa-trash"></i> {{trans('messages.post_delete_btn')}}
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
