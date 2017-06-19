<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostCategory;
use Validator;

class PostCategoryController extends Controller
{
    // validate messages
    private $messages = [
      'name.required'=>'Nazwa kategorii postów jest wymagana.',
      'name.max'=>'Maksymalna długość nazwy kategorii postów to :max znaków.',
      'name.min'=>'Minimalna długość nazwy kategorii postów to :min znaków.',
    ];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post_category = PostCategory::all();
        return view('admin.post_category.index', compact('post_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post_category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $validator = Validator::make($request->all(), [
        'name' => 'required|min:1,max:255',
      ], $this->messages);

      if ($validator->fails()) {
        \Session::flash('alert-warning', trans('messages.post_category_warning_message'));
          return redirect('/admin/post-category/add')
              ->withInput()
              ->withErrors($validator);
      }
      PostCategory::create([
          'name' => $request->name,
          'slug' => str_slug($request->name, '-')
      ]);

      \Session::flash('alert-success', trans('messages.post_category_message_add'));
      return redirect('/admin/post-category');
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
      $cpost = PostCategory::find($id);
      return view('admin.post_category.edit', ['cpost' => $cpost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
      $cpost = PostCategory::find($id);

      $validator = Validator::make($request->all(), [
        'name' => 'required|min:1,max:255',
      ], $this->messages);

      if ($validator->fails()) {
        \Session::flash('alert-warning', trans('messages.post_category_warning_message'));
          return redirect('/admin/post-category/edit/'.$id)
              ->withInput()
              ->withErrors($validator);
      }

      $cpost->name = $request->input('name');
      $cpost->slug = str_slug($request->name, '-');
      $cpost->update();
      \Session::flash('alert-success', trans('messages.post_category_message_update'));
      return redirect('/admin/post-category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, PostCategory $cpost){
      $cpost->delete();
      \Session::flash('alert-success', trans('messages.post_category_message_delete'));
      return redirect('/admin/post-category');
    }
}
