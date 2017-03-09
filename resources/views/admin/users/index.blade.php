@extends('layouts.app')

@section('content')
<ul class="list-inline" style="padding-bottom:10px;">
  <li role="presentation"><a class="btn btn-success" href="{{url('/users/add')}}">Dodaj</a></li>

</ul>
<div class="panel panel-default">
    <div class="panel-heading">{{trans('messages.user_panel_title')}}</div>
    <div class="panel-body">
      <div id="no-more-tables">
       <table class="table table-striped task-table table-hover">
           <thead>
               <tr>
                   <th>{{trans('messages.user_table_header_lp')}}</th>
                   <th>{{trans('messages.user_table_header_username')}}</th>
                   <th>{{trans('messages.user_table_header_user_active')}}</th>
                   <th>{{trans('messages.user_table_header_user_role')}}</th>
                   <th>{{trans('messages.user_table_header_actions')}}</th>
               </tr>
           </thead>
           <tbody>
                @foreach ($users as $index => $user)
                <tr>
                    <td data-title="{{trans('messages.user_table_header_lp')}}">{{$index + 1}}</td>
                    <td data-title="{{trans('messages.user_table_header_username')}}">{{$user->name}}</td>
                    <td data-title="{{trans('messages.user_table_header_user_active')}}">

                      @if($user->active == 1 && ($user->id != Auth::user()->id))

                          <form action="{{url('/users/change-status/'.$user->id)}}" method="POST">
                              {{ csrf_field() }}
                              {{ method_field('PATCH') }}

                            <button type="submit" class="btn btn-success">
                              {{trans('messages.user_active')}}
                            </button>
                            </form>

                      @elseif ($user->active == 0 && ($user->id != Auth::user()->id))

                          <form action="{{url('/users/change-status/'.$user->id)}}" method="POST">
                              {{ csrf_field() }}
                              {{ method_field('PATCH') }}
                              <button type="submit" class="btn btn-warning">
                                {{trans('messages.user_inactive')}}
                              </button>
                          </form>

                      @else
                        <button type="submit" class="btn btn-success" disabled="">
                          {{trans('messages.user_active')}}
                        </button>
                      @endif

                    </td>
                    <td data-title="{{trans('messages.user_table_header_user_role')}}">@if($user->role == 1) {{trans('messages.user_role_admin')}} @else {{trans('messages.user_role_user')}} @endif</td>
                    <td data-title="{{trans('messages.user_table_header_actions')}}">
                        @if($user->id != Auth::user()->id)
                        <form action="{{url('/users/delete/'.$user->id)}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-danger delete-confirm">
                                <i class="fa fa-trash"></i> {{trans('messages.user_btn_delete')}}
                            </button>
                        </form>
                        @else
                            <button type="submit" class="btn btn-danger disabled">
                                <i class="fa fa-trash"></i> {{trans('messages.user_btn_deleted')}}
                            </button>
                        @endif
                    </td>
                </tr>
                @endforeach
           </tbody>
       </table>
     </div>
    </div>
</div>
@endsection
