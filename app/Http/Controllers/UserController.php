<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     * show users listing
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::all();
      return view('admin.users.index', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.users.profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * delete user
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      if($user->id != \Auth::User()->id && \Auth::User()->role == 1){
        $user->delete();
        \Session::flash('alert-success', trans('messages.user_message_success_delete'));
        return redirect('/admin/users');
      }
      else {
      abort(404);
      }
    }
    /**
     * change user status
     * @param  User   $user
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(User $user){
      if($user->id != \Auth::User()->id && \Auth::User()->role == 1){
        $us = User::find($user->id);
        switch($us->active){
          case 1:
            $us->active = 0;
            break;
          case 0:
            $us->active = 1;
            break;
        }
        $us->update();
         \Session::flash('alert-success', trans('messages.user_message_change_status_success'));
         return redirect('/admin/users');
      }
      \Session::flash('alert-danger', trans('messages.user_message_change_status_error'));
      return redirect('/admin/users');
  }
}
