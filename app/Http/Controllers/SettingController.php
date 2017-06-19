<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Validator;
use File;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * show settings listing
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * store settings
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $settings = $request->setting;
        foreach ($settings as $key => $value) {
          $setting = Setting::find($value['id']);
          if($value['type'] == 'string'){
            $validator = Validator::make($request->all(), [
              'value' => 'max:255',
            ], [
              'value.max'=>'maksymalnie :max znaków',
            ]);
            if ($validator->fails()) {
              \Session::flash('alert-warning', trans('messages.settings_update_message_warning'));
                return redirect('/settings')
                    ->withInput()
                    ->withErrors($validator);
            }
            $setting->value = $value['value'];
            $setting->update();
          }
          if($value['type'] == 'text'){
            $setting->value = $value['value'];
            $setting->update();
          }
          if($value['type'] == 'image' && isset($settings[$value['id']]['value'])){
            File::delete('uploads/settings/'.$setting->value);
            $image = $request->setting[$value['id']]['value'];
            if($image){
              $extension = $image->getClientOriginalExtension(); // getting image extension
              $fileName = md5(date('Y-m-d H:i:s:u')).rand(11111,99999).'.'.$extension; // renameing image
              $image->move('uploads/settings/', $fileName);

              $setting->value = $fileName;
              $setting->update();
            }
          }
        }
        \Session::flash('alert-success', trans('messages.settins_update_message_success_update'));
        return redirect('/admin/settings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
